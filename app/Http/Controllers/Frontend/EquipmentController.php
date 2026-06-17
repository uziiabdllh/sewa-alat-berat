<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Menampilkan semua alat + search
    public function index(Request $request)
    {
        $search = $request->search;

        $equipments = Equipment::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('customer.katalog', compact('equipments'));
    }

    // Detail alat
    public function show($id)
    {
        $equipment = Equipment::with('category')->findOrFail($id);

        return view('customer.detail', compact('equipment'));
    }
}