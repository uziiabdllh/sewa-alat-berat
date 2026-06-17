
@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold">
            Halo, Customer 👋
        </h2>

        <p class="text-muted">
            Temukan alat berat terbaik untuk kebutuhan proyek Anda.
        </p>
    </div>

    <!-- Search -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">

            <div class="input-group">

                <input
                    type="text"
                    class="form-control"
                    placeholder="Cari Excavator, Crane, Bulldozer...">

                <button class="btn btn-warning">
                    Cari
                </button>

<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-4xl font-bold mb-8">
                Dashboard Admin
            </h1>

            {{-- Card Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <div class="bg-blue-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Kategori</h2>
                    <p class="text-3xl font-bold">
                        {{ $totalCategory }}
                    </p>
                </div>

                <div class="bg-green-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Alat</h2>
                    <p class="text-3xl font-bold">
                        {{ $totalEquipment }}
                    </p>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Booking</h2>
                    <p class="text-3xl font-bold">
                        {{ $totalBooking }}
                    </p>
                </div>

                <div class="bg-purple-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Payment</h2>
                    <p class="text-3xl font-bold">
                        {{ $totalPayment }}
                    </p>
                </div>

                <div class="bg-red-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Pendapatan</h2>
                    <p class="text-2xl font-bold">
                        Rp {{ number_format($totalIncome,0,',','.') }}
                    </p>
                </div>

            </div>

            {{-- Tabel --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                {{-- Booking Terbaru --}}
                <div class="bg-white rounded shadow p-6">

                    <h2 class="text-xl font-bold mb-4">
                        Booking Terbaru
                    </h2>

                    <table class="min-w-full border">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="border px-3 py-2 text-left">
                                    Kode
                                </th>

                                <th class="border px-3 py-2 text-left">
                                    Customer
                                </th>

                                <th class="border px-3 py-2 text-left">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestBookings as $booking)

                                <tr>

                                    <td class="border px-3 py-2">
                                        {{ $booking->booking_code }}
                                    </td>

                                    <td class="border px-3 py-2">
                                        {{ $booking->user->name }}
                                    </td>

                                    <td class="border px-3 py-2">
                                        {{ ucfirst($booking->status) }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3" class="text-center py-4">
                                        Belum ada booking
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- Alat Terbaru --}}
                <div class="bg-white rounded shadow p-6">

                    <h2 class="text-xl font-bold mb-4">
                        Alat Terbaru
                    </h2>

                    <table class="min-w-full border">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="border px-3 py-2">
                                    Kode
                                </th>

                                <th class="border px-3 py-2">
                                    Nama
                                </th>

                                <th class="border px-3 py-2">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestEquipments as $equipment)

                                <tr>

                                    <td class="border px-3 py-2">
                                        {{ $equipment->code }}
                                    </td>

                                    <td class="border px-3 py-2">
                                        {{ $equipment->name }}
                                    </td>

                                    <td class="border px-3 py-2">
                                        {{ ucfirst($equipment->status) }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3" class="text-center py-4">
                                        Belum ada alat
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <!-- Produk -->
    <!-- Produk -->
<h3 class="fw-bold mb-4">
    Alat Tersedia
</h3>

<div class="row">

    @php
        $alat = [
            ['excavator.jpg','Excavator Mini','Rp 1.500.000 / hari','success','Tersedia'],
            ['bulldozer.jpg','Bulldozer','Rp 2.000.000 / hari','success','Tersedia'],
            ['crane.jpg','Crane','Rp 2.500.000 / hari','danger','Disewa'],
            ['forklift.jpg','Forklift','Rp 1.200.000 / hari','success','Tersedia'],
            ['loader.jpg','Wheel Loader','Rp 2.200.000 / hari','success','Tersedia'],
            ['grader.jpg','Motor Grader','Rp 2.300.000 / hari','success','Tersedia'],
            ['dumptruck.jpg','Dump Truck','Rp 1.800.000 / hari','success','Tersedia'],
            ['compactor.jpg','Compactor','Rp 1.700.000 / hari','danger','Disewa'],
            ['backhoe.jpg','Backhoe Loader','Rp 1.900.000 / hari','success','Tersedia'],
            ['roller.jpg','Vibro Roller','Rp 1.600.000 / hari','success','Tersedia'],
        ];
    @endphp

    @foreach($alat as $item)

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <img
                src="{{ asset('images/alat/'.$item[0]) }}"
                class="card-img-top"
                style="height:220px; object-fit:cover;">

            <div class="card-body">

                <h5>{{ $item[1] }}</h5>

                <p class="text-muted">
                    {{ $item[2] }}
                </p>

                <span class="badge bg-{{ $item[3] }}">
                    {{ $item[4] }}
                </span>

            </div>

            <div class="card-footer bg-white">

                <a href="#"
                   class="btn btn-warning w-100">

                    Detail

                </a>

            </div>

        </div>

    </div>

    @endforeach

</div>
</div>

@endsection
</x-app-layout>
