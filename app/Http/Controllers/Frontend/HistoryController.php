<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class HistoryController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
                'equipment',
                'payment'
            ])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'customer.history',
            compact('bookings')
        );
    }
}