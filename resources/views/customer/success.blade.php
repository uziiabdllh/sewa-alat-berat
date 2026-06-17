@extends('layouts.app')

@section('content')

<div class="container py-5 text-center">

    <h1 class="text-success">
        ✅ Pembayaran Berhasil
    </h1>

    <p class="mt-3">
        Terima kasih telah melakukan penyewaan alat berat di TREK.
    </p>

    <a
        href="/history"
        class="btn btn-warning">

        Lihat Riwayat

    </a>

</div>

@endsection