@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                <div>

                    <h1 class="fw-bold mb-1">
                        ✏️ Edit Alat Berat
                    </h1>

                    <p class="text-muted mb-0">
                        Perbarui informasi alat berat dengan mudah.
                    </p>

                </div>

                <a href="{{ route('equipments.index') }}"
                   class="btn btn-outline-secondary rounded-pill px-4">

                    ← Kembali

                </a>

            </div>

            {{-- CARD --}}
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- HEADER CARD --}}
                <div class="card-header bg-warning text-dark py-3 border-0">

                    <h5 class="mb-0 fw-semibold">
                        Form Edit Alat
                    </h5>

                </div>

                {{-- BODY --}}
                <div class="card-body p-4">

                    <form action="{{ route('equipments.update', $equipment->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- KATEGORI --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Kategori
                                </label>

                                <select
                                    name="category_id"
                                    class="form-select rounded-3">

                                    @foreach($categories as $category)

                                        <option
                                            value="{{ $category->id }}"
                                            {{ $equipment->category_id == $category->id ? 'selected' : '' }}>

                                            {{ $category->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            {{-- KODE --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Kode Alat
                                </label>

                                <input
                                    type="text"
                                    name="code"
                                    value="{{ $equipment->code }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- NAMA --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Nama Alat
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ $equipment->name }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- BRAND --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Brand
                                </label>

                                <input
                                    type="text"
                                    name="brand"
                                    value="{{ $equipment->brand }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- TAHUN --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Tahun
                                </label>

                                <input
                                    type="number"
                                    name="year"
                                    value="{{ $equipment->year }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- HARGA --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Harga Per Hari
                                </label>

                                <input
                                    type="number"
                                    name="daily_price"
                                    value="{{ $equipment->daily_price }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- STATUS --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="form-select rounded-3">

                                    <option value="available"
                                        {{ $equipment->status == 'available' ? 'selected' : '' }}>
                                        Available
                                    </option>

                                    <option value="rented"
                                        {{ $equipment->status == 'rented' ? 'selected' : '' }}>
                                        Rented
                                    </option>

                                    <option value="maintenance"
                                        {{ $equipment->status == 'maintenance' ? 'selected' : '' }}>
                                        Maintenance
                                    </option>

                                </select>

                            </div>

                            {{-- STOK --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Stok
                                </label>

                                <input
                                    type="number"
                                    name="stok"
                                    value="{{ $equipment->stok }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- FOTO --}}
                            <div class="col-12 mb-4">

                                <label class="form-label fw-semibold">
                                    Foto Alat
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control rounded-3">

                            </div>

                            {{-- PREVIEW FOTO --}}
                            @if($equipment->image)

                            <div class="col-12 mb-4">

                                <label class="form-label fw-semibold d-block">
                                    Foto Saat Ini
                                </label>

                                <img src="{{ asset('images/alat/'.$equipment->image) }}"
                                     class="rounded-4 shadow-sm border"
                                     width="180">

                            </div>

                            @endif

                            {{-- DESKRIPSI --}}
                            <div class="col-12 mb-4">

                                <label class="form-label fw-semibold">
                                    Deskripsi
                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control rounded-3">{{ $equipment->description }}</textarea>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill px-4 fw-semibold">

                                💾 Update Data

                            </button>

                            <a href="{{ route('equipments.index') }}"
                               class="btn btn-outline-secondary rounded-pill px-4">

                                Batal

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    body{
        background: #f4f7fb;
    }

    .card{
        border-radius: 24px;
    }

    .form-control,
    .form-select{
        padding: 12px;
        border: 1px solid #dee2e6;
    }

    .form-control:focus,
    .form-select:focus{
        box-shadow: 0 0 0 0.15rem rgba(255,193,7,.25);
        border-color: #ffc107;
    }

</style>

@endsection