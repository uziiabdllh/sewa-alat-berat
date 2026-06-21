<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController1 extends Controller
{
    // Menampilkan semua alat + search
  public function index(Request $request)
{
    $search = $request->search;

    // AUTO UPDATE STATUS
    Equipment::where('stok', 0)
        ->update([
            'status' => 'rented'
        ]);

    Equipment::where('stok', '>', 0)
        ->update([
            'status' => 'available'
        ]);

    $equipments = Equipment::with('category')

        ->when($search, function ($query) use ($search) {

            $query->where('name', 'like', '%' . $search . '%');

        })

        // STOK ADA = ATAS
        // STOK HABIS = BAWAH
        ->orderByRaw('stok <= 0')

        ->latest()

        ->get();

    return view('customer.katalog', compact('equipments'));
}

    // Detail alat
   public function show($id)
{
    $equipment = Equipment::with('category')->findOrFail($id);

    if ($equipment->stok == 0) {
        return redirect()
            ->route('customer.katalog')
            ->with('error', 'Alat ini sedang tidak tersedia (stok habis).');
    }

    return view('customer.detail', compact('equipment'));
}
}