@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row g-5 align-items-start">

        {{-- Gambar --}}
        <div class="col-lg-7">

            @if($equipment->image)

<img src="{{ asset('images/alat/' . $equipment->image) }}"
     class="img-fluid rounded shadow"
     style="width:100%; height:500px; object-fit:cover;">

@else

<img src="https://via.placeholder.com/800x500"
     class="img-fluid rounded shadow"
     style="width:100%; height:500px; object-fit:cover;">

@endif

        </div>

        {{-- Informasi --}}
        <div class="col-lg-5">

            <h1 class="fw-bold mb-2">
                {{ $equipment->name }}
            </h1>

            <p class="text-muted mb-3">
                ⭐⭐⭐⭐⭐ (4.9) • 120+ Penyewaan
            </p>

            <h2 class="text-warning fw-bold mb-4">
                Rp {{ number_format($equipment->daily_price,0,',','.') }}
                <small class="fs-5 text-dark">/ Hari</small>
            </h2>

            {{-- Status --}}
            @if($equipment->status == 'available')

                <span class="badge bg-success fs-6 px-3 py-2 mb-4">
                    Tersedia
                </span>

            @elseif($equipment->status == 'rented')

                <span class="badge bg-danger fs-6 px-3 py-2 mb-4">
                    Sedang Disewa
                </span>

            @else

                <span class="badge bg-warning text-dark fs-6 px-3 py-2 mb-4">
                    Maintenance
                </span>

            @endif

            <hr>

            <div class="row">

                <div class="col-6 mb-3">
                    <strong>Kategori</strong><br>
                    {{ optional($equipment->category)->name }}
                </div>

                <div class="col-6 mb-3">
                    <strong>Kode Alat</strong><br>
                    EX{{ str_pad($equipment->id,3,'0',STR_PAD_LEFT) }}
                </div>

                <div class="col-6 mb-3">
                    <strong>Minimal Sewa</strong><br>
                    1 Hari
                </div>

                <div class="col-6 mb-3">
                    <strong>Lokasi</strong><br>
                    Gudang TREK
                </div>

            </div>

            <hr>

            <h5 class="fw-bold">
                Deskripsi
            </h5>

            <p class="text-muted">

                {{ $equipment->description }}

            </p>

            <div class="alert alert-light border">

                <h6 class="fw-bold mb-3">
                    Fasilitas
                </h6>

                ✅ Operator tersedia (Opsional)<br>
                ✅ Kondisi alat terawat<br>
                ✅ Siap digunakan setiap hari<br>
                ✅ Support proyek konstruksi

            </div>

            {{-- Tombol --}}
            @if($equipment->status == 'available')

                @auth

<a href="{{ route('customer.booking', ['equipment_id' => $equipment->id]) }}"
   class="btn btn-warning btn-lg w-100 mb-3">
    Sewa Sekarang
</a>

@else

<a href="{{ route('login') }}"
   class="btn btn-warning btn-lg w-100 mb-3">

    Sewa Sekarang

</a>

@endauth

            @else

                <button class="btn btn-secondary btn-lg w-100 mb-3" disabled>

                    Tidak Tersedia

                </button>

            @endif

            <a href="{{ route('customer.katalog') }}"
               class="btn btn-outline-dark w-100">

                ← Kembali ke Katalog

            </a>

        </div>

    </div>

</div>

@endsection