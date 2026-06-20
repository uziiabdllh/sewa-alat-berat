@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <p class="text-uppercase text-muted fw-semibold mb-1">

                Booking Detail

            </p>

            <h2 class="fw-bold mb-0">

                🚜 Booking #{{ $booking->booking_code }}

            </h2>

        </div>

        {{-- STATUS --}}
        <div>

            @if($booking->status == 'pending')

                <span class="badge bg-warning text-dark px-4 py-3 rounded-pill fs-6">

                    ⏳ Pending

                </span>

            @elseif($booking->status == 'approved')

                <span class="badge bg-success px-4 py-3 rounded-pill fs-6">

                    ✅ Approved

                </span>

            @elseif($booking->status == 'completed')

                <span class="badge bg-primary px-4 py-3 rounded-pill fs-6">

                    ✔ Completed

                </span>

            @else

                <span class="badge bg-danger px-4 py-3 rounded-pill fs-6">

                    ❌ Rejected

                </span>

            @endif

        </div>

    </div>

    {{-- MAIN CARD --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- TOP --}}
        <div class="bg-dark text-white p-4">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h3 class="fw-bold mb-2">

                        {{ $equipment->name }}

                    </h3>

                    <p class="mb-0 opacity-75">

                        Informasi lengkap penyewaan alat berat

                    </p>

                </div>

                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

                    <h3 class="fw-bold text-warning mb-0">

                        Rp {{ number_format($booking->total,0,',','.') }}

                    </h3>

                    <small class="opacity-75">

                        Total Pembayaran

                    </small>

                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="card-body p-5">

            {{-- INFORMASI --}}
            <div class="row g-4 mb-4">

                <div class="col-md-6">

                    <div class="border rounded-4 p-4 h-100">

                        <small class="text-muted d-block mb-2">

                            Lokasi Proyek

                        </small>

                        <h6 class="fw-bold mb-0">

                            {{ $booking->project_location }}

                        </h6>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-4 h-100">

                        <small class="text-muted d-block mb-2">

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

                    <div class="border rounded-4 p-4 h-100">

                        <small class="text-muted d-block mb-2">

                            Durasi

                        </small>

                        <h6 class="fw-bold mb-0">

                            {{ $booking->duration }} Hari

                        </h6>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-4 h-100">

                        <small class="text-muted d-block mb-2">

                            Operator

                        </small>

                        <h6 class="fw-bold mb-0">

                            {{ $booking->operator_needed ? 'Ya' : 'Tidak' }}

                        </h6>

                    </div>

                </div>

            </div>

            {{-- DELIVERY --}}
            <div class="border rounded-4 p-4 mb-4">

                <div class="row align-items-center">

                    <div class="col-md-6">

                        <small class="text-muted d-block mb-2">

                            Delivery Alat

                        </small>

                        <h6 class="fw-bold mb-0">

                            {{ $booking->delivery_needed ? 'Ya, diperlukan' : 'Tidak diperlukan' }}

                        </h6>

                    </div>

                    <div class="col-md-6 text-md-end mt-3 mt-md-0">

                        @if($booking->delivery_needed)

                            <span class="badge bg-success px-4 py-3 rounded-pill">

                                Delivery Included

                            </span>

                        @else

                            <span class="badge bg-secondary px-4 py-3 rounded-pill">

                                No Delivery

                            </span>

                        @endif

                    </div>

                </div>

            </div>

           {{-- PAYMENT --}}
            <div class="bg-light rounded-4 p-4 mb-4 border">

                <h5 class="fw-bold mb-4">
                    💰 Rincian Pembayaran
                </h5>

                @php
                    $hargaPerHari = $equipment->daily_price;
                    $biayaSewa = $hargaPerHari * $booking->duration * $booking->quantity;

                    $biayaOperator = $booking->operator_needed
                        ? (500000 * $booking->duration)
                        : 0;

                    $biayaDelivery = $booking->delivery_needed
                        ? (1000000 * $booking->quantity)
                        : 0;
                @endphp

                <table class="table table-borderless align-middle">

                    <tr>
                        <td>Harga Alat / Hari</td>
                        <td class="text-end">
                            Rp {{ number_format($hargaPerHari,0,',','.') }}
                        </td>
                    </tr>

                    <tr>
                        <td>Durasi Sewa</td>
                        <td class="text-end">
                            {{ $booking->duration }} Hari
                        </td>
                    </tr>

                    <tr>
                        <td>Jumlah Alat</td>
                        <td class="text-end">
                            {{ $booking->quantity }} Unit
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Biaya Sewa Alat</strong></td>
                        <td class="text-end fw-bold">
                            Rp {{ number_format($biayaSewa,0,',','.') }}
                        </td>
                    </tr>

                    <tr>
                        <td>Operator</td>
                        <td class="text-end">
                            @if($booking->operator_needed)
                                Rp {{ number_format($biayaOperator,0,',','.') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Delivery</td>
                        <td class="text-end">
                            @if($booking->delivery_needed)
                                Rp {{ number_format($biayaDelivery,0,',','.') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Subtotal</td>
                        <td class="text-end">
                            Rp {{ number_format($booking->subtotal,0,',','.') }}
                        </td>
                    </tr>

                    <tr>
                        <td>PPN (11%)</td>
                        <td class="text-end">
                            Rp {{ number_format($booking->tax,0,',','.') }}
                        </td>
                    </tr>

                    <tr class="border-top">
                        <td class="fw-bold fs-5">
                            Total Pembayaran
                        </td>
                        <td class="text-end fw-bold fs-4 text-success">
                            Rp {{ number_format($booking->total,0,',','.') }}
                        </td>
                    </tr>

                </table>

            </div>

            {{-- BUTTON --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <a href="{{ route('customer.history') }}"
                   class="btn btn-outline-dark rounded-pill px-4 py-2">

                    ← Kembali

                </a>

                @if($booking->status == 'pending' && !$booking->payment)

                    <a href="{{ route('customer.payment', $booking->id) }}"
                       class="btn btn-warning rounded-pill px-4 py-2 fw-bold">

                        Upload Pembayaran

                    </a>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection