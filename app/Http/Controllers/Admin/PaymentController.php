<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.index');
    }

    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(Request $request)
    {
        return redirect()
            ->route('payments.index')
            ->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.payments.edit');
    }

    public function update(Request $request, string $id)
    {
        return redirect()
            ->route('payments.index')
            ->with('success', 'Pembayaran berhasil diupdate');
    }

    public function destroy(string $id)
    {
        return redirect()
            ->route('payments.index')
            ->with('success', 'Pembayaran berhasil dihapus');
    }
}