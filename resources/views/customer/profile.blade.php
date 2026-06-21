@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    {{-- Pesan sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Foto Profil --}}
                    <div class="text-center mb-5">

                        <div class="rounded-circle bg-warning text-dark d-inline-flex align-items-center justify-content-center"
                             style="width:120px;height:120px;font-size:48px;font-weight:bold;">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </div>

                        <h2 class="fw-bold mt-3">
                            {{ auth()->user()->name }}
                        </h2>

                        <span class="badge bg-success px-3 py-2">
                            Customer
                        </span>

                    </div>

                    <hr>

                    {{-- Informasi Profil --}}
                    <div class="row mt-4">

                        <div class="col-md-6 mb-4">

                            <h6 class="text-muted">
                                Nama
                            </h6>

                            <h5>
                                {{ auth()->user()->name }}
                            </h5>

                        </div>

                        <div class="col-md-6 mb-4">

                            <h6 class="text-muted">
                                Email
                            </h6>

                            <h5>
                                {{ auth()->user()->email }}
                            </h5>

                        </div>

                        <div class="col-md-6 mb-4">

                            <h6 class="text-muted">
                                Nomor HP
                            </h6>

                            <h5>
                                {{ auth()->user()->phone ?? '-' }}
                            </h5>

                        </div>

                        <div class="col-md-6 mb-4">

                            <h6 class="text-muted">
                                Bergabung
                            </h6>

                            <h5>
                                {{ auth()->user()->created_at->format('d F Y') }}
                            </h5>

                        </div>

                        <div class="col-12 mb-4">

                            <h6 class="text-muted">
                                Alamat
                            </h6>

                            <h5>
                                {{ auth()->user()->address ?? '-' }}
                            </h5>

                        </div>

                    </div>

                    <hr>

                    {{-- Statistik Booking --}}
                    <div class="row text-center">

                        <div class="col-md-4">

                            <h2 class="fw-bold text-warning">
                                {{ auth()->user()->bookings()->count() }}
                            </h2>

                            <p>Total Booking</p>

                        </div>

                        <div class="col-md-4">

                            <h2 class="fw-bold text-success">
                                {{ auth()->user()->bookings()->where('status','approved')->count() }}
                            </h2>

                            <p>Booking Disetujui</p>

                        </div>

                        <div class="col-md-4">

                            <h2 class="fw-bold text-danger">
                                {{ auth()->user()->bookings()->where('status','pending')->count() }}
                            </h2>

                            <p>Pending</p>

                        </div>

                    </div>

                    {{-- Tombol --}}
                    <div class="text-center mt-5">

                        <a href="{{ route('profile.edit') }}"
                           class="btn btn-warning btn-lg rounded-pill px-5">

                            ✏ Edit Profil

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection