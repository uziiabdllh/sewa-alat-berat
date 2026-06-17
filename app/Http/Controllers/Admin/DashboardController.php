<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Equipment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAlat = Equipment::count();

        $alatTersedia = Equipment::where(
            'status',
            'available'
        )->count();

        $alatDisewa = Equipment::where(
            'status',
            'rented'
        )->count();

        $totalKategori = Category::count();

        return view(
            'admin.dashboard',
            compact(
                'totalAlat',
                'alatTersedia',
                'alatDisewa',
                'totalKategori'
            )
        );
    }
}