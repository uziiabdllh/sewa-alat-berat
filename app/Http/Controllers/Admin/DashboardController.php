<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Booking;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategory = Category::count();

        $totalEquipment = Equipment::count();

        $totalBooking = Booking::count();

        $totalPayment = Payment::count();

        $totalIncome = Payment::where('status', 'paid')->sum('amount');

        $latestBookings = Booking::with(['user','equipment'])
                    ->latest()
                    ->take(5)
                    ->get();

        $latestEquipments = Equipment::latest()
                    ->take(5)
                    ->get();

        return view('admin.dashboard', compact(
            'totalCategory',
            'totalEquipment',
            'totalBooking',
            'totalPayment',
            'totalIncome',
            'latestBookings',
            'latestEquipments'
        ));
    }
}