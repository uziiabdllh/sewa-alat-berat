@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            {{-- CARD --}}
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- HEADER --}}
                <div class="card-header bg-warning text-dark py-4 border-0">

                    <h3 class="fw-bold mb-1">
                        ✏ Edit Kategori
                    </h3>

                    <p class="mb-0 opacity-75">
                        Ubah data kategori alat berat.
                    </p>

                </div>

                {{-- BODY --}}
                <div class="card-body p-4">

                    <form action="{{ route('categories.update',$category->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        {{-- NAMA --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Nama Kategori

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $category->name }}"
                                class="form-control form-control-lg rounded-3"
                                placeholder="Masukkan nama kategori">

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
                                placeholder="Masukkan deskripsi kategori">{{ $category->description }}</textarea>

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill px-4 shadow-sm fw-semibold">

                                💾 Update

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
        box-shadow: 0 0 0 0.15rem rgba(255,193,7,0.25);
        border-color: #ffc107;
    }

    .btn{
        transition: 0.2s ease;
    }

    .btn:hover{
        transform: translateY(-2px);
    }

</style>

@endsection