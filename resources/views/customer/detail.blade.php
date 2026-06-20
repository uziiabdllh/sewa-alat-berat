@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row g-5 align-items-start">

        {{-- IMAGE --}}
        <div class="col-lg-7">

            <div class="position-relative">

                @if($equipment->image)

                    <img src="{{ asset('images/alat/' . $equipment->image) }}"
                         class="img-fluid rounded-4 shadow-lg border"
                         style="width:100%; height:550px; object-fit:cover;">

                @else

                    <img src="https://via.placeholder.com/800x500"
                         class="img-fluid rounded-4 shadow-lg border"
                         style="width:100%; height:550px; object-fit:cover;">

                @endif

                {{-- BADGE STATUS --}}
                <div class="position-absolute top-0 end-0 m-4">

                    @if($equipment->status == 'available')

                        <span class="badge bg-success px-4 py-3 fs-6 shadow">

                            ● Tersedia

                        </span>

                    @elseif($equipment->status == 'rented')

                        <span class="badge bg-danger px-4 py-3 fs-6 shadow">

                            ● Sedang Disewa

                        </span>

                    @else

                        <span class="badge bg-warning text-dark px-4 py-3 fs-6 shadow">

                            ● Maintenance

                        </span>

                    @endif

                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="col-lg-5">

            {{-- TITLE --}}
            <div class="mb-4">

                <p class="text-uppercase text-warning fw-bold mb-2">

                    Heavy Equipment

                </p>

                <h1 class="fw-bold display-6 mb-3">

                    {{ $equipment->name }}

                </h1>

                <div class="d-flex align-items-center gap-2 text-muted">

                    <span class="text-warning fs-5">
                        ★★★★★
                    </span>

                    <span>
                        4.9 Rating • 120+ Penyewaan
                    </span>

                </div>

            </div>

            {{-- PRICE --}}
            <div class="bg-light rounded-4 p-4 mb-4 border">

                <small class="text-muted d-block mb-1">

                    Harga Sewa

                </small>

                <h2 class="fw-bold text-warning mb-0">

                    Rp {{ number_format($equipment->daily_price,0,',','.') }}

                    <span class="fs-5 text-dark fw-normal">
                        / Hari
                    </span>

                </h2>

            </div>

            {{-- INFO --}}
            <div class="row g-3 mb-4">

                <div class="col-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block">

                            Kategori

                        </small>

                        <strong>

                            {{ optional($equipment->category)->name }}

                        </strong>

                    </div>

                </div>

                <div class="col-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block">

                            Kode Alat

                        </small>

                        <strong>

                            EX{{ str_pad($equipment->id,3,'0',STR_PAD_LEFT) }}

                        </strong>

                    </div>

                </div>

                <div class="col-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block">

                            Minimal Sewa

                        </small>

                        <strong>

                            1 Hari

                        </strong>

                    </div>

                </div>

                <div class="col-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block">

                            Lokasi

                        </small>

                        <strong>

                            Gudang TREK

                        </strong>

                    </div>

                </div>

            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-4">

                <h5 class="fw-bold mb-3">

                    Deskripsi

                </h5>

                <p class="text-muted lh-lg">

                    {{ $equipment->description }}

                </p>

            </div>

            {{-- FACILITY --}}
            <div class="bg-light border rounded-4 p-4 mb-4">

                <h5 class="fw-bold mb-3">

                    Fasilitas

                </h5>

                <div class="row">

                    <div class="col-12 mb-2">
                        ✅ Operator tersedia (Opsional)
                    </div>

                    <div class="col-12 mb-2">
                        ✅ Kondisi alat terawat
                    </div>

                    <div class="col-12 mb-2">
                        ✅ Siap digunakan setiap hari
                    </div>

                    <div class="col-12">
                        ✅ Support proyek konstruksi
                    </div>

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="d-grid gap-3">

                @if($equipment->status == 'available')

                    @auth

                        <a href="{{ route('customer.booking', ['equipment_id' => $equipment->id]) }}"
                           class="btn btn-warning btn-lg fw-bold rounded-pill shadow-sm py-3">

                            🚜 Sewa Sekarang

                        </a>

                    @else

                        <a href="{{ route('login') }}"
                           class="btn btn-warning btn-lg fw-bold rounded-pill shadow-sm py-3">

                            Login untuk Menyewa

                        </a>

                    @endauth

                @else

                    <button class="btn btn-secondary btn-lg rounded-pill py-3" disabled>

                        Tidak Tersedia

                    </button>

                @endif

                <a href="{{ route('customer.katalog') }}"
                   class="btn btn-outline-dark rounded-pill py-3">

                    ← Kembali ke Katalog

                </a>

            </div>

        </div>

    </div>

</div>

@endsection