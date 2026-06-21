<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategory = Category::count();

        $totalEquipment = Equipment::count();

        $totalBooking = Booking::count();

        $totalPayment = Payment::count();

        $totalIncome = Payment::where('status', 'paid')->sum('amount');
        // Booking per bulan
        $bookingChart = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Pendapatan per bulan
        $incomeChart = Payment::where('status', 'paid')
            ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Status alat
        $statusChart = Equipment::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        // Tambahan Statistik
        $pendingBooking = Booking::where('status', 'pending')->count();

        $approvedBooking = Booking::where('status', 'approved')->count();

        $returnPending = Booking::where('return_status', 'pending')->count();

        $latestBookings = Booking::with(['user', 'equipment'])
            ->latest()
            ->take(5)
            ->get();

        $latestPayments = Payment::with('booking.user')
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
            'pendingBooking',
            'approvedBooking',
            'returnPending',
            'latestBookings',
            'latestPayments',
            'latestEquipments',
            'bookingChart',
            'incomeChart',
            'statusChart',
        ));
    }
}