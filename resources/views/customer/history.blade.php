@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="fw-bold mb-1">
                Riwayat Booking
            </h2>

            <p class="text-muted mb-0">
                Lihat seluruh aktivitas penyewaan alat berat Anda
            </p>

        </div>

        <div class="bg-dark text-white px-4 py-3 rounded-4 shadow-sm">

            <small class="d-block opacity-75">
                Total Booking
            </small>

            <h4 class="fw-bold mb-0">
                {{ $bookings->count() }}
            </h4>

        </div>

    </div>

    {{-- LIST BOOKING --}}
    @forelse($bookings as $booking)

        <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">

            <div class="card-body p-4">

                {{-- TOP --}}
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">

                    <div>

                        <p class="text-muted small mb-1">

                            BOOKING CODE

                        </p>

                        <h4 class="fw-bold mb-0">

                            🚜 #{{ $booking->booking_code }}

                        </h4>

                    </div>

                    <div>

                        @if($booking->status == 'pending')

                            <span class="badge bg-warning text-dark px-4 py-3 rounded-pill">

                                ⏳ Menunggu Verifikasi

                            </span>

                        @elseif($booking->status == 'approved')

                            <span class="badge bg-success px-4 py-3 rounded-pill">

                                ✅ Disetujui

                            </span>

                        @elseif($booking->status == 'completed')

                            <span class="badge bg-primary px-4 py-3 rounded-pill">

                                ✔ Selesai

                            </span>

                        @else

                            <span class="badge bg-danger px-4 py-3 rounded-pill">

                                ❌ Ditolak

                            </span>

                        @endif

                    </div>

                </div>

                {{-- CONTENT --}}
                <div class="row g-4">

                    {{-- LEFT --}}
                    <div class="col-lg-8">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <div class="border rounded-4 p-3 h-100">

                                    <small class="text-muted d-block mb-1">

                                        Alat Berat

                                    </small>

                                    <h6 class="fw-bold mb-0">

                                        {{ $booking->equipment->name }}

                                    </h6>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="border rounded-4 p-3 h-100">

                                    <small class="text-muted d-block mb-1">

                                        Tanggal Sewa

                                    </small>

                                    <h6 class="fw-bold mb-0">

                                        {{ $booking->start_date }}

                                        -

                                        {{ $booking->end_date }}

                                    </h6>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="border rounded-4 p-3 h-100">

                                    <small class="text-muted d-block mb-1">

                                        Total Pembayaran

                                    </small>

                                    <h5 class="fw-bold text-warning mb-0">

                                        Rp {{ number_format($booking->total, 0, ',', '.') }}

                                    </h5>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="border rounded-4 p-3 h-100">

                                    <small class="text-muted d-block mb-1">

                                        Bukti Pembayaran

                                    </small>

                                    <h6 class="fw-bold mb-0">

                                        @if($booking->payment)

                                            ✅ Sudah Dikirim

                                        @else

                                            ⏳ Belum Upload

                                        @endif

                                    </h6>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="col-lg-4">

                        <div class="bg-light rounded-4 p-4 h-100 d-flex flex-column justify-content-between">

                            <div>

                                <small class="text-muted d-block mb-2">

                                    Status Booking

                                </small>

                                <h5 class="fw-bold mb-3">

                                    {{ ucfirst($booking->status) }}

                                </h5>

                                <p class="text-muted small mb-0">

                                    Pantau status booking dan pembayaran Anda secara realtime.

                                </p>

                            </div>

                           <div class="mt-4 d-grid gap-2">

                                <a href="{{ route('customer.booking.detail', $booking->id) }}"
                                class="btn btn-dark rounded-pill">

                                    Lihat Detail

                                </a>

                                @if(
                                    $booking->status == 'approved'
                                    &&
                                    $booking->return_status != 'pending'
                                    &&
                                    $booking->return_status != 'returned'
                                )

                                    <form action="{{ route('customer.return.request', $booking->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-warning rounded-pill w-100">

                                            Ajukan Pengembalian

                                        </button>

                                    </form>

                                @endif

                                @if($booking->return_status == 'pending')

                                    <button class="btn btn-secondary rounded-pill" disabled>

                                        Menunggu Approval Return

                                    </button>

                                @endif

                                @if($booking->return_status == 'returned')

                                    <button class="btn btn-success rounded-pill" disabled>

                                        Alat Sudah Dikembalikan

                                    </button>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center py-5">

                <h4 class="fw-bold mb-3">

                    Belum Ada Riwayat Booking

                </h4>

                <p class="text-muted mb-4">

                    Anda belum melakukan penyewaan alat berat.

                </p>

                <a href="{{ route('customer.katalog') }}"
                   class="btn btn-warning rounded-pill px-4">

                    Lihat Katalog

                </a>

            </div>

        </div>

    @endforelse

</div>

@endsection