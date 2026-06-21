@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h1 class="fw-bold mb-1">
                        Tambah Alat Berat
                    </h1>

                    <p class="text-muted mb-0">
                        Tambahkan data alat berat baru ke sistem rental.
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
                <div class="card-header bg-dark text-white py-3 border-0">

                    <h5 class="mb-0 fw-semibold">
                        Form Tambah Alat
                    </h5>

                </div>

                {{-- BODY --}}
                <div class="card-body p-4">

                    <form action="{{ route('equipments.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            {{-- KATEGORI --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Kategori
                                </label>

                                <select
                                    name="category_id"
                                    class="form-select rounded-3">

                                    <option value="">
                                        Pilih Kategori
                                    </option>

                                    @foreach($categories as $category)

                                        <option value="{{ $category->id }}">
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
                                    class="form-control rounded-3"
                                    placeholder="Contoh : EXC-001">

                            </div>

                            {{-- NAMA --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Nama Alat
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control rounded-3"
                                    placeholder="Masukkan nama alat">

                            </div>

                            {{-- BRAND --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Brand
                                </label>

                                <input
                                    type="text"
                                    name="brand"
                                    class="form-control rounded-3"
                                    placeholder="Masukkan brand alat">

                            </div>

                            {{-- TAHUN --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Tahun
                                </label>

                                <input
                                    type="number"
                                    name="year"
                                    class="form-control rounded-3"
                                    placeholder="2025">

                            </div>

                            {{-- HARGA --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Harga Per Hari
                                </label>

                                <input
                                    type="number"
                                    name="daily_price"
                                    class="form-control rounded-3"
                                    placeholder="Masukkan harga sewa">

                            </div>

                            {{-- STATUS --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="form-select rounded-3">

                                    <option value="available">
                                        Available
                                    </option>

                                    <option value="rented">
                                        Rented
                                    </option>

                                    <option value="maintenance">
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
                                    class="form-control rounded-3"
                                    placeholder="Masukkan stok alat">

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

                            {{-- DESKRIPSI --}}
                            <div class="col-12 mb-4">

                                <label class="form-label fw-semibold">
                                    Deskripsi
                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control rounded-3"
                                    placeholder="Masukkan deskripsi alat berat"></textarea>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-dark rounded-pill px-4">

                                💾 Simpan Data

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
        box-shadow: 0 0 0 0.15rem rgba(13,110,253,.15);
        border-color: #0d6efd;
    }

</style>

@endsection