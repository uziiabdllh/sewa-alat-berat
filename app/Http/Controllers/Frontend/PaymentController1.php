<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;

class PaymentController1 extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $booking = Booking::where('user_id', auth()->id())
            ->latest()
            ->first();

        $file = $request->file('payment_proof');

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images/bukti'), $filename);

        Payment::create([
            'booking_id' => $booking->id,
            'payment_method' => 'QRIS',
            'amount' => $booking->total,
            'proof' => $filename,
            'status' => 'pending',
            'paid_at' => now(),
        ]);

        return redirect()->route('customer.success');
    }
}