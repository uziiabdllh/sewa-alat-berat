@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Riwayat Booking
    </h2>

    @forelse($bookings as $booking)

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    🚜 Booking #{{ $booking->booking_code }}
                </h5>

                @if($booking->status == 'pending')

                    <span class="badge bg-warning text-dark px-3 py-2">
                        Menunggu Verifikasi
                    </span>

                @elseif($booking->status == 'approved')

                    <span class="badge bg-success px-3 py-2">
                        Disetujui
                    </span>

                @else

                    <span class="badge bg-danger px-3 py-2">
                        Ditolak
                    </span>

                @endif

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <p>
                        <strong>Alat</strong><br>

                        {{ $booking->equipment->name }}
                    </p>

                    <p>
                        <strong>Tanggal Sewa</strong><br>

                        {{ $booking->start_date }}
                        -
                        {{ $booking->end_date }}

                    </p>

                </div>

                <div class="col-md-6">

                    <p>
                        <strong>Total Pembayaran</strong><br>

                        Rp {{ number_format($booking->total, 0, ',', '.') }}

                    </p>

                    <p>
                        <strong>Bukti Pembayaran</strong><br>

                        @if($booking->payment)

                            Sudah Dikirim

                        @else

                            Belum Upload

                        @endif

                    </p>

                </div>

            </div>

            <div class="text-end">

                <a href="#"
                   class="btn btn-outline-primary">

                    Lihat Detail

                </a>

            </div>

        </div>

    </div>

    @empty

        <div class="alert alert-warning">
            Belum ada riwayat booking.
        </div>

    @endforelse

</div>

@endsection