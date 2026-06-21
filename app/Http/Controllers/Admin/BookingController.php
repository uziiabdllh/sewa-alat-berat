<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Equipment;
use App\Models\User;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'equipment'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::all();
        $equipments = Equipment::where('status', 'available')->get();

        return view(
            'admin.bookings.create',
            compact('users', 'equipments')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'equipment_id' => 'required|exists:equipments,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'project_location' => 'required',
        ]);

        $equipment = Equipment::findOrFail($request->equipment_id);

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        $duration = $start->diffInDays($end) + 1;

        $subtotal = $duration * $equipment->daily_price;

        $tax = $subtotal * 0.11;

        $total = $subtotal + $tax;

        Booking::create([
            'user_id' => $request->user_id,
            'equipment_id' => $request->equipment_id,
            'booking_code' => 'BK-' . now()->format('YmdHis'),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $duration,
            'project_location' => $request->project_location,
            'operator_needed' => $request->has('operator_needed'),
            'delivery_needed' => $request->has('delivery_needed'),
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $booking = Booking::with(['user', 'equipment', 'payment'])
            ->findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);

        $users = User::all();

        $equipments = Equipment::all();

        return view(
            'admin.bookings.edit',
            compact(
                'booking',
                'users',
                'equipments'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'equipment_id' => 'required|exists:equipments,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'project_location' => 'required',
        ]);

        $booking = Booking::findOrFail($id);

        $equipment = Equipment::findOrFail($request->equipment_id);

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        $duration = $start->diffInDays($end) + 1;

        $subtotal = $duration * $equipment->daily_price;

        $tax = $subtotal * 0.11;

        $total = $subtotal + $tax;

        $booking->update([

            'user_id' => $request->user_id,

            'equipment_id' => $request->equipment_id,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'duration' => $duration,

            'project_location' => $request->project_location,

            'operator_needed' => $request->has('operator_needed'),

            'delivery_needed' => $request->has('delivery_needed'),

            'subtotal' => $subtotal,

            'tax' => $tax,

            'total' => $total,

            'status' => $request->status,

            'notes' => $request->notes,

        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil diupdate.');
    }
    public function returnIndex()
    {
        $bookings = Booking::with('equipment','user')
            ->whereNotNull('return_status')
            ->latest()
            ->get();

        return view(
            'admin.returns.index',
            compact('bookings')
        );
    }
    public function approveReturn($id)
    {
        $booking = Booking::with('equipment')->findOrFail($id);

        $booking->return_status = 'returned';
        $booking->status = 'completed';
        $booking->save();

    // BALIKIN STOK
    $equipment = $booking->equipment;
    $equipment->stok += 1;
    $equipment->status = 'available';
    $equipment->save();

    return redirect()->back()->with('success', 'Return disetujui dan stok dikembalikan.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}