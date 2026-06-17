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
