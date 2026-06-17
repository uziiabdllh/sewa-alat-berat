<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index');
    }

    public function create()
    {
        return view('admin.bookings.create');
    }

    public function store(Request $request)
    {
        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.bookings.edit');
    }

    public function update(Request $request, string $id)
    {
        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil diupdate');
    }

    public function destroy(string $id)
    {
        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus');
    }
}