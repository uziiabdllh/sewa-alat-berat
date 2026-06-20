@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning fw-bold">
                    Edit Alat Berat
                </div>

                <div class="card-body">

                    <form action="{{ route('equipments.update', $equipment->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- Kategori --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="form-select">

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ $equipment->category_id == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Kode --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Kode Alat
                            </label>

                            <input
                                type="text"
                                name="code"
                                value="{{ $equipment->code }}"
                                class="form-control">

                        </div>

                        {{-- Nama --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Nama Alat
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $equipment->name }}"
                                class="form-control">

                        </div>

                        {{-- Brand --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Brand
                            </label>

                            <input
                                type="text"
                                name="brand"
                                value="{{ $equipment->brand }}"
                                class="form-control">

                        </div>

                        {{-- Tahun --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Tahun
                            </label>

                            <input
                                type="number"
                                name="year"
                                value="{{ $equipment->year }}"
                                class="form-control">

                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Harga Per Hari
                            </label>

                            <input
                                type="number"
                                name="daily_price"
                                value="{{ $equipment->daily_price }}"
                                class="form-control">

                        </div>

                        {{-- Status --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

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
                        <div class="mb-3">

                            <label class="form-label">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stok"
                                value="{{ $equipment->stok }}"
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

                        @if($equipment->image)

                            <img src="{{ asset('images/alat/'.$equipment->image) }}"
                                width="120"
                                class="mt-2 rounded">

                        @endif

                        {{-- Deskripsi --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                class="form-control">{{ $equipment->description }}</textarea>

                        </div>

                        {{-- Button --}}
                        <button
                            type="submit"
                            class="btn btn-warning">

                            Update

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