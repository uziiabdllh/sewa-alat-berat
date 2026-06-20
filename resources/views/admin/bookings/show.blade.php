@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-dark text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h2 class="fw-bold mb-1">
                                Detail Booking
                            </h2>

                            <small class="text-light opacity-75">
                                Informasi lengkap penyewaan alat berat
                            </small>

                        </div>

                        <span class="badge bg-warning text-dark px-3 py-2 fs-6">

                            {{ strtoupper($booking->status) }}

                        </span>

                    </div>

                </div>

                {{-- BODY --}}
                <div class="card-body p-5">

                    {{-- KODE BOOKING --}}
                    <div class="mb-5">

                        <label class="text-muted small mb-1">
                            KODE BOOKING
                        </label>

                        <h4 class="fw-bold text-primary">
                            {{ $booking->booking_code }}
                        </h4>

                    </div>

                    {{-- CUSTOMER & ALAT --}}
                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <div class="border rounded-4 p-4 h-100 bg-light">

                                <h5 class="fw-bold mb-3">
                                    Customer
                                </h5>

                                <p class="mb-1 fw-semibold">
                                    {{ $booking->user->name }}
                                </p>

                                <p class="text-muted mb-0">
                                    {{ $booking->user->email }}
                                </p>

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <div class="border rounded-4 p-4 h-100 bg-light">

                                <h5 class="fw-bold mb-3">
                                    Alat Berat
                                </h5>

                                <p class="mb-1 fw-semibold">
                                    {{ $booking->equipment->name }}
                                </p>

                                <p class="text-muted mb-0">
                                    Durasi {{ $booking->duration }} Hari
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- TANGGAL --}}
                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <div class="border rounded-4 p-4">

                                <h6 class="text-muted mb-2">
                                    Tanggal Sewa
                                </h6>

                                <h5 class="fw-bold mb-0">

                                    {{ $booking->start_date }}

                                    <span class="text-muted fw-normal">
                                        s/d
                                    </span>

                                    {{ $booking->end_date }}

                                </h5>

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <div class="border rounded-4 p-4">

                                <h6 class="text-muted mb-2">
                                    Lokasi Proyek
                                </h6>

                                <h5 class="fw-bold mb-0">
                                    {{ $booking->project_location }}
                                </h5>

                            </div>

                        </div>

                    </div>

                    {{-- RINCIAN BIAYA --}}
                    <div class="border rounded-4 p-4 mb-4 bg-light">

                        <h5 class="fw-bold mb-4">
                            Rincian Pembayaran
                        </h5>

                        <div class="row text-center">

                            <div class="col-md-4 mb-3">

                                <div class="p-3 rounded-3 bg-white shadow-sm">

                                    <small class="text-muted d-block mb-1">
                                        Subtotal
                                    </small>

                                    <h5 class="fw-bold mb-0">
                                        Rp {{ number_format($booking->subtotal, 0, ',', '.') }}
                                    </h5>

                                </div>

                            </div>

                            <div class="col-md-4 mb-3">

                                <div class="p-3 rounded-3 bg-white shadow-sm">

                                    <small class="text-muted d-block mb-1">
                                        Pajak
                                    </small>

                                    <h5 class="fw-bold mb-0">
                                        Rp {{ number_format($booking->tax, 0, ',', '.') }}
                                    </h5>

                                </div>

                            </div>

                            <div class="col-md-4 mb-3">

                                <div class="p-3 rounded-3 bg-dark text-white shadow-sm">

                                    <small class="d-block mb-1">
                                        Total
                                    </small>

                                    <h4 class="fw-bold mb-0">
                                        Rp {{ number_format($booking->total, 0, ',', '.') }}
                                    </h4>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- CATATAN --}}
                    <div class="border rounded-4 p-4 mb-4">

                        <h5 class="fw-bold mb-3">
                            Catatan Tambahan
                        </h5>

                        <p class="text-muted mb-0">

                            {{ $booking->notes ?? 'Tidak ada catatan tambahan.' }}

                        </p>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-between align-items-center">

                        <a href="{{ route('bookings.index') }}"
                           class="btn btn-outline-secondary px-4 rounded-pill">

                            ← Kembali

                        </a>

                        <button class="btn btn-dark px-4 rounded-pill">

                            Booking Verified

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection