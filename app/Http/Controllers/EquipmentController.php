<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    /**
     * Menampilkan semua data alat
     */
    public function index()
    {
        $equipments = Equipment::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.equipments.index', compact('equipments'));
    }

    /**
     * Form tambah alat
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.equipments.create', compact('categories'));
    }

    /**
     * Simpan alat
     */
    public function store(StoreEquipmentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('equipments', 'public');
        }

        Equipment::create($data);

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data alat berhasil ditambahkan.');
    }

    /**
     * Detail alat
     */
    public function show(Equipment $equipment)
    {
        return view('admin.equipments.show', compact('equipment'));
    }

    /**
     * Form edit alat
     */
    public function edit(Equipment $equipment)
    {
        $categories = Category::all();

        return view('admin.equipments.edit', compact('equipment', 'categories'));
    }

    /**
     * Update alat
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($equipment->image) {
                Storage::disk('public')->delete($equipment->image);
            }

            $data['image'] = $request->file('image')
                ->store('equipments', 'public');
        }

        $equipment->update($data);

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data alat berhasil diperbarui.');
    }

    /**
     * Hapus alat
     */
    public function destroy(Equipment $equipment)
    {
        if ($equipment->image) {
            Storage::disk('public')->delete($equipment->image);
        }

        $equipment->delete();

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data alat berhasil dihapus.');
    }
}