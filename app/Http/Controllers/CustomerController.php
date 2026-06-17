<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view(
            'admin.customers.index',
            compact('customers')
        );
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()
            ->route('customers.index')
            ->with(
                'success',
                'Customer berhasil ditambahkan'
            );
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        return view(
            'admin.customers.edit',
            compact('customer')
        );
    }

    public function update(
        Request $request,
        Customer $customer
    )
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()
            ->route('customers.index')
            ->with(
                'success',
                'Customer berhasil diupdate'
            );
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with(
                'success',
                'Customer berhasil dihapus'
            );
    }
}