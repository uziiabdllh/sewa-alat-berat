@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white fw-bold">
                    Tambah Alat Berat
                </div>

                <div class="card-body">

                    <form action="{{ route('equipments.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="form-select">

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

                        <div class="mb-3">

                            <label class="form-label">
                                Kode Alat
                            </label>

                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                placeholder="Masukkan kode alat">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Alat
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan nama alat">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Brand
                            </label>

                            <input
                                type="text"
                                name="brand"
                                class="form-control"
                                placeholder="Masukkan brand">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Tahun
                            </label>

                            <input
                                type="number"
                                name="year"
                                class="form-control"
                                placeholder="Masukkan tahun">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Harga Per Hari
                            </label>

                            <input
                                type="number"
                                name="daily_price"
                                class="form-control"
                                placeholder="Masukkan harga">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

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
                        <div class="mb-3">

                        <label class="form-label">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Foto Alat
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="form-control">

                    </div>
                        <div class="mb-3">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                class="form-control"
                                placeholder="Masukkan deskripsi alat"></textarea>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Simpan

                        </button>

                        <a href="{{ route('equipments.index') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection