@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-body text-center">

            <h2 class="fw-bold mb-4">
                Pembayaran QRIS
            </h2>

            <p>
                Silakan scan QRIS berikut untuk melakukan pembayaran.
            </p>

            <img
                src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=TREK-PAYMENT"
                class="img-fluid mb-4">
            <p>
                Kode Booking:
                <strong>{{ $booking->booking_code }}</strong>
            </p>
            <h4 class="text-warning">
                Total Pembayaran
            </h4>

            <h3 class="fw-bold">
                Rp {{ number_format($booking->total, 0, ',', '.') }}
            </h3>

            <a href="{{ route('customer.upload') }}"
   class="btn btn-warning">
    Konfirmasi Pembayaran
</a>

        </div>

    </div>

</div>

@endsection