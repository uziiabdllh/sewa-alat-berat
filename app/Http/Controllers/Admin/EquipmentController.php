<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    /**
     * Menampilkan daftar alat.
     */
    public function index()
    {
        $equipments = Equipment::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.equipments.index', compact('equipments'));
    }

    /**
     * Form tambah alat.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.equipments.create', compact('categories'));
    }

    /**
     * Simpan alat baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|unique:equipments,code',
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'year' => 'required|digits:4',
            'daily_price' => 'required|numeric|min:1',
            'status' => 'required',
        ]);

        Equipment::create($request->all());

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data alat berhasil ditambahkan.');
    }

    /**
     * Detail alat.
     */
    public function show($id)
    {
        $equipment = Equipment::with('category')->findOrFail($id);

        return view('admin.equipments.show', compact('equipment'));
    }

    /**
     * Form edit alat.
     */
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);

        $categories = Category::all();

        return view(
            'admin.equipments.edit',
            compact('equipment', 'categories')
        );
    }

    /**
     * Update alat.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|unique:equipments,code,' . $id,
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'year' => 'required|digits:4',
            'daily_price' => 'required|numeric|min:1',
            'status' => 'required',
        ]);

        $equipment = Equipment::findOrFail($id);

        $equipment->update($request->all());

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data alat berhasil diperbarui.');
    }

    /**
     * Hapus alat.
     */
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data alat berhasil dihapus.');
    }
}