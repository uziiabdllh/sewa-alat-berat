<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Category;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::with('category')->latest()->get();

        return view('admin.equipments.index', compact('equipments'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.equipments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required',
            'daily_price' => 'required',
            'status' => 'required',
        ]);

        Equipment::create($request->all());

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Alat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        $categories = Category::all();

        return view(
            'admin.equipments.edit',
            compact('equipment', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->update($request->all());

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Alat berhasil diupdate');
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Alat berhasil dihapus');
    }
}