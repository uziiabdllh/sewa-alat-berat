@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Form Penyewaan
    </h2>

    <form>

        <div class="mb-3">
            <label>Nama Penyewa</label>
            <input type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Sewa</label>
            <input type="date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Durasi (Hari)</label>
            <input type="number" class="form-control">
        </div>

        <button class="btn btn-warning">
            Ajukan Penyewaan
        </button>

    </form>

</div>

@endsection