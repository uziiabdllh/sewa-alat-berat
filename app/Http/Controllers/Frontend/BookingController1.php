<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController1 extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
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
        try {
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'equipment_id' => $request->equipment_id,
            'booking_code' => 'BK-' . now()->format('YmdHis'),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $duration,
            'project_location' => $request->project_location,
            'operator_needed' => false,
            'delivery_needed' => false,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'status' => 'pending',
        ]);
        return redirect()->route('customer.payment', $booking->id);
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }
}