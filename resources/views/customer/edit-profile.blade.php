@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <h2 class="text-center fw-bold mb-4">
                        Edit Profil
                    </h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', auth()->user()->name) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', auth()->user()->email) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone', auth()->user()->phone) }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea
                                name="address"
                                rows="4"
                                class="form-control">{{ old('address', auth()->user()->address) }}</textarea>

                        </div>

                        <div class="text-center">

                            <button
                                class="btn btn-warning px-5 rounded-pill">

                                Simpan Perubahan

                            </button>

                            <a href="{{ route('profile') }}"
                               class="btn btn-secondary rounded-pill">

                                Batal

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection