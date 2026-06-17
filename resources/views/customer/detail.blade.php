@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-md-6">

            <img src="{{ asset('images/alat/excavator.jpg') }}"
                 class="img-fluid rounded shadow">

        </div>

        <div class="col-md-6">

    <h1 class="fw-bold">
        Excavator Mini
    </h1>

    <h3 class="text-warning mb-3">
        Rp 1.500.000 / Hari
    </h3>

    <span class="badge bg-success mb-3">
        Tersedia
    </span>

    <hr>

    <h5>Deskripsi Alat</h5>

    <p>
        Excavator Mini merupakan alat berat yang digunakan untuk
        pekerjaan penggalian, pemindahan material, pembuatan saluran,
        dan pekerjaan konstruksi lainnya. Alat ini cocok digunakan
        pada area proyek yang memiliki ruang terbatas.
    </p>

    <h5>Spesifikasi</h5>

    <table class="table table-bordered">

        <tr>
            <th>Berat Operasional</th>
            <td>5 Ton</td>
        </tr>

        <tr>
            <th>Kapasitas Bucket</th>
            <td>0.25 m³</td>
        </tr>

        <tr>
            <th>Bahan Bakar</th>
            <td>Solar</td>
        </tr>

        <tr>
            <th>Tahun Unit</th>
            <td>2024</td>
        </tr>

    </table>

    <div class="d-flex gap-2">

        <a href="/booking"
           class="btn btn-warning">

            Sewa Sekarang

        </a>

        <a href="/dashboard"
           class="btn btn-outline-secondary">

            Kembali

        </a>

    </div>

</div>
@endsection