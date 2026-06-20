<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking.user')
            ->latest()
            ->paginate(10);

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::whereDoesntHave('payment')->get();

        return view('admin.payments.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        Payment::create([
            'booking_id' => $request->booking_id,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'status' => $request->status,
            'paid_at' => $request->status == 'paid'
                ? now()
                : null,
        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Payment $payment)
    {
        $bookings = Booking::all();

        return view('admin.payments.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'payment_method' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        $payment->update([
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'status' => $request->status,
            'paid_at' => $request->status == 'paid'
                ? now()
                : null,
        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Pembayaran berhasil diupdate.');
    }

    public function updateStatus(Request $request, Payment $payment)
{
    // update payment
    $payment->update([

        'status' => $request->status,

        'paid_at' => $request->status == 'paid'
            ? now()
            : null,

    ]);

    // update booking otomatis
    if ($request->status == 'paid') {

        $payment->booking->update([
            'status' => 'approved'
        ]);

    } elseif ($request->status == 'failed') {

        $payment->booking->update([
            'status' => 'rejected'
        ]);

    }

    return redirect()
        ->route('payments.index')
        ->with('success', 'Status payment berhasil diupdate.');
}

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}