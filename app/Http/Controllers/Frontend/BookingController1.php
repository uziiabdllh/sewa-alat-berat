<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk fitur Transaction

class BookingController1 extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'equipment_id'     => 'required|exists:equipments,id',
            'start_date'       => 'required|date',
            'end_date'         => 'required|date|after_or_equal:start_date',
            'project_location' => 'required',
            'quantity'         => 'required|integer|min:1',
            'phone'            => 'required',
        ]);

        $equipment = Equipment::findOrFail($request->equipment_id);
        
        // 1. Cek ketersediaan stok sebelum memproses biaya
        if ($request->quantity > $equipment->stok) {
            return back()
                ->withInput()
                ->withErrors([
                    'quantity' => 'Stok tidak mencukupi. Stok tersedia hanya ' . $equipment->stok . ' unit.'
                ]);
        }

        $start    = Carbon::parse($request->start_date);
        $end      = Carbon::parse($request->end_date);
        $duration = $start->diffInDays($end) + 1;

        // --- HITUNG BIAYA ---
        // Biaya sewa alat
        $biayaSewa = $duration * $equipment->daily_price * $request->quantity;

        // Biaya operator
        $biayaOperator = 0;
        if ($request->boolean('operator_needed')) {
            $jumlahOperator = $request->operator_quantity ?? 1;
            $biayaOperator  = 500000 * $duration * $jumlahOperator;
        }

        // Biaya delivery (per unit)
        $biayaDelivery = 0;
        if ($request->boolean('delivery_needed')) {
            $biayaDelivery = 1000000 * $request->quantity;
        }

        // Subtotal, Tax (PPN 11%), dan Total
        $subtotal = $biayaSewa + $biayaOperator + $biayaDelivery;
        $tax      = $subtotal * 0.11;
        $total    = $subtotal + $tax;

        try {
            // Gunakan Database Transaction agar aman
            $booking = DB::transaction(function () use ($request, $equipment, $duration, $subtotal, $tax, $total) {
                
                // 2. Simpan data booking ke database
                $newBooking = Booking::create([
                    'user_id'           => auth()->id(),
                    'equipment_id'      => $request->equipment_id,
                    'booking_code'      => 'BK-' . now()->format('YmdHis'),
                    'start_date'        => $request->start_date,
                    'end_date'          => $request->end_date,
                    'duration'          => $duration,
                    'project_location'  => $request->project_location,
                    'quantity'          => $request->quantity,
                    'phone'             => $request->phone,
                    'operator_needed'   => $request->boolean('operator_needed'),
                    'operator_quantity' => $request->operator_quantity ?? 1,
                    'delivery_needed'   => $request->boolean('delivery_needed'),
                    'subtotal'          => $subtotal,
                    'tax'               => $tax,
                    'total'             => $total,
                    'status'            => 'pending',
                ]);

                // 3. KURANGI STOK ALAT SEARA OTOMATIS
                $equipment->decrement('stok', $request->quantity);

                // Jika stok hasil decrement menjadi 0, Anda bisa mengubah status alat menjadi 'disewa' (opsional)
                // if ($equipment->fresh()->stok <= 0) {
                //     $equipment->update(['status' => 'disewa']);
                // }

                return $newBooking;
            });

            return redirect()->route('customer.payment', $booking->id);

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $booking = Booking::with([
            'user',
            'equipment'
        ])->findOrFail($id);

        return view('customer.booking-detail', [
            'booking'   => $booking,
            'equipment' => $booking->equipment
        ]);
    }
public function requestReturn($id)
{
    $booking = Booking::with('equipment')->findOrFail($id);

    // kalau sudah pernah request
    if ($booking->return_status === 'pending') {
        return redirect()->back()->with('error', 'Sudah mengajukan pengembalian.');
    }

    // update status return
    $booking->return_status = 'pending';
    $booking->save();

    return redirect()->back()->with('success', 'Pengajuan pengembalian berhasil dikirim.');
}
}