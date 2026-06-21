@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            {{-- CARD --}}
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- HEADER --}}
                <div class="card-header bg-dark text-white py-4 border-0">

                    <h3 class="fw-bold mb-1">
                        📦 Tambah Kategori
                    </h3>

                    <p class="mb-0 text-light opacity-75">
                        Tambahkan kategori alat berat baru.
                    </p>

                </div>

                {{-- BODY --}}
                <div class="card-body p-4">

                    <form action="{{ route('categories.store') }}"
                          method="POST">

                        @csrf

                        {{-- NAMA --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Nama Kategori

                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Contoh : Excavator">

                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Deskripsi

                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control rounded-3"
                                placeholder="Masukkan deskripsi kategori alat berat"></textarea>

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-dark rounded-pill px-4 shadow-sm">

                                💾 Simpan

                            </button>

                            <a href="{{ route('categories.index') }}"
                               class="btn btn-light border rounded-pill px-4">

                                ← Kembali

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
        border-radius: 22px;
    }

    .form-control{
        border: 1px solid #e2e8f0;
        padding: 14px;
    }

    .form-control:focus{
        box-shadow: 0 0 0 0.15rem rgba(0,0,0,0.08);
        border-color: #111827;
    }

    .btn{
        transition: 0.2s ease;
    }

    .btn:hover{
        transform: translateY(-2px);
    }

</style>

@endsection