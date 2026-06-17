<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Equipment;

class HomeController extends Controller
{
    public function index()
    {
        $equipments = Equipment::latest()
            ->take(6)
            ->get();

        return view('customer.home', compact('equipments'));
    }
}