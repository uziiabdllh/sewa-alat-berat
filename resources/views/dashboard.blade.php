@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->

<div class="position-relative">

    <img
        src="https://images.unsplash.com/photo-1504307651254-35680f356dfd"
        class="w-100"
        style="height: 700px; object-fit: cover;">

    <div
        class="position-absolute top-50 start-50 translate-middle text-center text-white">

        <h1 class="display-2 fw-bold">
            Sewa Alat Berat Online
        </h1>

        <p class="fs-4">
            Temukan alat berat terbaik untuk proyek konstruksi Anda
        </p>

        <div class="input-group mt-4 shadow">

            <input
                type="text"
                class="form-control form-control-lg"
                placeholder="Cari alat berat...">

            <button class="btn btn-warning fw-bold">
                Cari
            </button>

        </div>

    </div>

</div>

@endsection