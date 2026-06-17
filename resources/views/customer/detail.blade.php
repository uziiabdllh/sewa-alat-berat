@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-md-6">

            <img src="{{ asset('images/alat/excavator.jpg') }}"
                 class="img-fluid rounded shadow">

        </div>

        <div class="col-md-6">

            <h2 class="fw-bold">
                Excavator Mini
            </h2>

            <h4 class="text-warning">
                Rp 1.500.000 / hari
            </h4>

            <span class="badge bg-success mb-3">
                Tersedia
            </span>

            <p>
                Excavator mini cocok digunakan untuk pekerjaan
                konstruksi, penggalian tanah, dan proyek skala kecil
                hingga menengah.
            </p>

            <a href="/booking"
               class="btn btn-warning">

                Sewa Sekarang

            </a>

            <a href="/booking"
   class="btn btn-warning">

    Sewa Sekarang

</a>
        </div>

    </div>

</div>

@endsection