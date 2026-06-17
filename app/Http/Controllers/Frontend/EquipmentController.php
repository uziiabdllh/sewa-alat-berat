<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    // Menampilkan semua alat
    public function index()
    {
        $equipments = Equipment::latest()->get();

        return view('customer.katalog', compact('equipments'));
    }

    // Menampilkan detail alat
    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);

        return view('customer.detail', compact('equipment'));
    }
}