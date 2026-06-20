@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- WELCOME --}}
    <div class="card border-0 shadow-lg rounded-5 overflow-hidden mb-5">

        <div class="row g-0 align-items-center">

            <div class="col-lg-7 p-5">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">
                    👋 Selamat Datang Kembali
                </span>

                <h1 class="fw-bold display-5 mb-3">

                    Halo,
                    <span class="text-warning">
                        {{ auth()->user()->name }}
                    </span>

                </h1>

                <p class="text-muted fs-5 mb-4">

                    Siap melanjutkan proyek hari ini?
                    Temukan alat berat terbaik dan lakukan booking
                    dengan cepat & mudah bersama TREK.

                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a href="{{ route('customer.katalog') }}"
                       class="btn btn-warning btn-lg rounded-pill px-4 fw-semibold shadow-sm">

                        🚜 Sewa Alat

                    </a>

                    <a href="{{ route('customer.history') }}"
                       class="btn btn-outline-dark btn-lg rounded-pill px-4">

                        📄 Riwayat Booking

                    </a>

                </div>

            </div>

            <div class="col-lg-5">

                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200&auto=format&fit=crop"
                     class="img-fluid w-100"
                     style="height:100%; min-height:400px; object-fit:cover;">

            </div>

        </div>

    </div>

    {{-- SEARCH --}}
    <div class="card border-0 shadow-sm rounded-5 mb-5">

        <div class="card-body p-4">

            <form action="{{ route('customer.katalog') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-lg-10">

                        <input
                            type="text"
                            name="search"
                            class="form-control form-control-lg rounded-pill border-0 shadow-sm px-4"
                            placeholder="Cari alat berat..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-lg-2 d-grid">

                        <button class="btn btn-warning btn-lg rounded-pill fw-bold">

                            🔍 Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- FITUR --}}
    <div class="row g-4 mb-5">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-5 h-100">

                <div class="card-body p-4 text-center">

                    <div class="fs-1 mb-3">
                        🚜
                    </div>

                    <h4 class="fw-bold">
                        Alat Lengkap
                    </h4>

                    <p class="text-muted mb-0">

                        Excavator, crane, bulldozer,
                        dan berbagai alat berat tersedia
                        untuk kebutuhan proyek Anda.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-5 h-100">

                <div class="card-body p-4 text-center">

                    <div class="fs-1 mb-3">
                        ⚡
                    </div>

                    <h4 class="fw-bold">
                        Booking Cepat
                    </h4>

                    <p class="text-muted mb-0">

                        Proses penyewaan lebih mudah,
                        cepat, dan dapat dilakukan
                        langsung secara online.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-5 h-100">

                <div class="card-body p-4 text-center">

                    <div class="fs-1 mb-3">
                        🛠️
                    </div>

                    <h4 class="fw-bold">
                        Alat Terawat
                    </h4>

                    <p class="text-muted mb-0">

                        Semua alat rutin maintenance
                        dan siap digunakan untuk proyek
                        skala kecil maupun besar.

                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- REKOMENDASI --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Rekomendasi Alat Berat
            </h2>

            <p class="text-muted mb-0">

                Pilihan alat terbaik untuk proyek Anda.

            </p>

        </div>

        <a href="{{ route('customer.katalog') }}"
           class="btn btn-outline-dark rounded-pill">

            Lihat Semua

        </a>

    </div>

    <div class="row g-4">

        @forelse($equipments->take(3) as $item)

            <div class="col-lg-4">

                <div class="card border-0 shadow-lg rounded-5 overflow-hidden h-100 hover-card">

                    {{-- IMAGE --}}
                    <div class="position-relative">

                        @if($item->image)

                            <img src="{{ asset('images/alat/' . $item->image) }}"
                                 class="card-img-top"
                                 style="height:260px; object-fit:cover;">

                        @else

                            <img src="https://via.placeholder.com/600x400"
                                 class="card-img-top"
                                 style="height:260px; object-fit:cover;">

                        @endif

                        {{-- STATUS --}}
                        <div class="position-absolute top-0 end-0 m-3">

                            @if($item->status == 'available')

                                <span class="badge bg-success px-3 py-2 rounded-pill">
                                    Tersedia
                                </span>

                            @elseif($item->status == 'maintenance')

                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                    Maintenance
                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2 rounded-pill">
                                    Disewa
                                </span>

                            @endif

                        </div>

                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4 d-flex flex-column">

                        <h4 class="fw-bold mb-2">

                            {{ $item->name }}

                        </h4>

                        <p class="text-muted mb-4">

                            {{ Str::limit($item->description, 80) }}

                        </p>

                        <div class="mt-auto">

                            <h3 class="text-warning fw-bold">

                                Rp {{ number_format($item->daily_price,0,',','.') }}

                                <small class="fs-6 text-muted">
                                    / hari
                                </small>

                            </h3>

                            <a href="{{ route('customer.detail',$item->id) }}"
                               class="btn btn-dark w-100 rounded-pill py-3 mt-3 fw-semibold">

                                Lihat Detail →

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning rounded-4 shadow-sm border-0">

                    Belum ada alat tersedia.

                </div>

            </div>

        @endforelse

    </div>

</div>

<style>

body{
    background: #f5f7fb;
}

.hover-card{
    transition: .3s ease;
}

.hover-card:hover{
    transform: translateY(-8px);
}

</style>

@endsection