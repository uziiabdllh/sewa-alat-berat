@extends('layouts.app')

@section('content')

<h1 class="display-5 fw-bold mb-4">
    Katalog Alat Berat
</h1>

<form action="{{ route('customer.katalog') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Cari alat berat...">

        <button class="btn btn-warning">
            🔍 Cari
        </button>
    </div>
</form>

<div class="row">

@forelse($equipments as $equipment)

<div class="col-md-4 mb-4">

    <div class="card shadow h-100">

        <img
            src="{{ asset('images/alat/'.$equipment->image) }}"
            class="card-img-top"
            style="height:220px; object-fit:cover;">

        <div class="card-body">

            <h3>{{ $equipment->name }}</h3>

            <p>
                <strong>Kategori :</strong>
                {{ optional($equipment->category)->name }}
            </p>

            <p>
                <strong>Harga :</strong>
                Rp {{ number_format($equipment->daily_price,0,',','.') }}/hari
            </p>

            @if($equipment->status=='available')
                <span class="badge bg-success">Tersedia</span>
            @elseif($equipment->status=='maintenance')
                <span class="badge bg-warning text-dark">Maintenance</span>
            @else
                <span class="badge bg-danger">Disewa</span>
            @endif

            <br><br>

            <a href="{{ route('customer.detail',$equipment->id) }}"
               class="btn btn-primary">
                Lihat Detail
            </a>

        </div>

    </div>

</div>

@empty

<div class="alert alert-warning">
    Alat tidak ditemukan.
</div>

@endforelse

</div>

@endsection