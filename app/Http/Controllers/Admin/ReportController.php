<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function bookings()
    {
        $bookings = Booking::with(['user','equipment'])->get();

        return view('admin.reports.bookings', compact('bookings'));
    }

    public function payments()
    {
        $payments = Payment::with('booking.user')->get();

        $totalIncome = Payment::where('status','paid')->sum('amount');

        return view('admin.reports.payments', compact(
            'payments',
            'totalIncome'
        ));
    }

    public function bookingPdf()
    {
        $bookings = Booking::with(['user','equipment'])->get();

        $pdf = Pdf::loadView(
            'admin.reports.booking_pdf',
            compact('bookings')
        );

        return $pdf->download('laporan-booking.pdf');
    }

    public function paymentPdf()
    {
        $payments = Payment::with('booking.user')->get();

        $totalIncome = Payment::where('status','paid')->sum('amount');

        $pdf = Pdf::loadView(
            'admin.reports.payment_pdf',
            compact('payments','totalIncome')
        );

        return $pdf->download('laporan-payment.pdf');
    }
}