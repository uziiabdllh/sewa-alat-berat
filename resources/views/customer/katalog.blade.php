@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-5">

        <div>
            <h1 class="fw-bold display-6 mb-2">
                🚜 Katalog Alat Berat
            </h1>

            <p class="text-muted mb-0">
                Pilih alat terbaik untuk mendukung proyek Anda.
            </p>
        </div>

        <div class="mt-3 mt-md-0">
            <span class="badge bg-dark px-4 py-3 fs-6 shadow-sm">
                {{ $equipments->count() }} Alat Tersedia
            </span>
        </div>

    </div>

    {{-- Search --}}
    <div class="card border-0 shadow-sm mb-5 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('customer.katalog') }}" method="GET">

                <div class="row g-3 align-items-center">

                    <div class="col-md-10">

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-white border-end-0">
                                🔍
                            </span>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control border-start-0 shadow-none"
                                placeholder="Cari excavator, bulldozer, crane...">

                        </div>

                    </div>

                    <div class="col-md-2 d-grid">

                        <button class="btn btn-warning btn-lg fw-semibold shadow-sm">

                            Cari Alat

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Card Alat --}}
    <div class="row">

        @forelse($equipments as $equipment)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 equipment-card">

                {{-- Image --}}
                <div class="position-relative">

                    <img
                        src="{{ asset('images/alat/'.$equipment->image) }}"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;">

                    {{-- Status --}}
                    <div class="position-absolute top-0 end-0 m-3">

                        @if($equipment->status == 'available')

                            <span class="badge bg-success px-3 py-2 shadow-sm">
                                Tersedia
                            </span>

                        @elseif($equipment->status == 'maintenance')

                            <span class="badge bg-warning text-dark px-3 py-2 shadow-sm">
                                Maintenance
                            </span>

                        @else

                            <span class="badge bg-danger px-3 py-2 shadow-sm">
                                Disewa
                            </span>

                        @endif

                    </div>

                </div>

                {{-- Body --}}
                <div class="card-body p-4 d-flex flex-column">

                    <div class="mb-3">

                        <h4 class="fw-bold mb-2">
                            {{ $equipment->name }}
                        </h4>

                        <p class="text-muted small mb-0">
                            {{ optional($equipment->category)->name }}
                        </p>

                    </div>

                    {{-- Harga --}}
                    <div class="bg-light rounded-4 p-3 mb-4">

                        <small class="text-muted d-block mb-1">
                            Harga Sewa / Hari
                        </small>

                        <h3 class="fw-bold text-warning mb-0">

                            Rp {{ number_format($equipment->daily_price,0,',','.') }}

                        </h3>

                    </div>

                    {{-- Info --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-muted">
                                Kode Alat
                            </span>

                            <strong>
                                {{ $equipment->code }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Stok
                            </span>

                            <strong>
                                {{ $equipment->stok ?? 0 }} Unit
                            </strong>

                        </div>

                    </div>

                    {{-- Button --}}
                    <div class="mt-auto d-grid">

                        <a href="{{ route('customer.detail',$equipment->id) }}"
                           class="btn btn-dark btn-lg rounded-pill">

                            Lihat Detail →

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center py-5">

                    <h4 class="fw-bold mb-3">
                        😢 Alat tidak ditemukan
                    </h4>

                    <p class="text-muted mb-0">
                        Coba gunakan kata kunci lain.
                    </p>

                </div>

            </div>

        </div>

        @endforelse

    </div>

</div>

<style>

    body{
        background: #f5f7fb;
    }

    .equipment-card{
        transition: 0.3s ease;
    }

    .equipment-card:hover{
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08) !important;
    }

</style>

@endsection