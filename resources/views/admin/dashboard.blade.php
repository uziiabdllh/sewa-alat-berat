@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                📊 Dashboard Admin
            </h1>

            <p class="text-muted mb-0">
                Monitoring data penyewaan alat berat secara realtime.
            </p>

        </div>

        <div class="bg-white shadow-sm rounded-4 px-4 py-3">

            <small class="text-muted d-block">
                Hari Ini
            </small>

            <strong>
                {{ now()->format('d F Y') }}
            </strong>

        </div>

    </div>

    {{-- STATISTIC CARD --}}
    <div class="row g-4">

        {{-- KATEGORI --}}
        <div class="col-xl-2 col-md-4">

            <div class="card stat-card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted mb-2">
                                Kategori
                            </p>

                            <h2 class="fw-bold mb-0">

                                {{ $totalCategory }}

                            </h2>

                        </div>

                        <div class="icon-box bg-primary-subtle text-primary">
                            📂
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- ALAT --}}
        <div class="col-xl-2 col-md-4">

            <div class="card stat-card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted mb-2">
                                Alat
                            </p>

                            <h2 class="fw-bold mb-0">

                                {{ $totalEquipment }}

                            </h2>

                        </div>

                        <div class="icon-box bg-success-subtle text-success">
                            🚜
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- BOOKING --}}
        <div class="col-xl-2 col-md-4">

            <div class="card stat-card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted mb-2">
                                Booking
                            </p>

                            <h2 class="fw-bold mb-0">

                                {{ $totalBooking }}

                            </h2>

                        </div>

                        <div class="icon-box bg-warning-subtle text-warning">
                            📋
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- PAYMENT --}}
        <div class="col-xl-2 col-md-4">

            <div class="card stat-card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-muted mb-2">
                                Payment
                            </p>

                            <h2 class="fw-bold mb-0">

                                {{ $totalPayment }}

                            </h2>

                        </div>

                        <div class="icon-box bg-info-subtle text-info">
                            💳
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- PENDAPATAN --}}
        <div class="col-xl-4 col-md-8">

            <div class="card border-0 shadow-sm income-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <p class="text-light opacity-75 mb-2">
                                Total Pendapatan
                            </p>

                            <h2 class="fw-bold text-white mb-0">

                                Rp {{ number_format($totalIncome,0,',','.') }}

                            </h2>

                        </div>

                        <div class="income-icon">
                            💰
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- TABLE SECTION --}}
    <div class="row mt-5">

        {{-- BOOKING TERBARU --}}
        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 pt-4 px-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="fw-bold mb-0">
                            📋 Booking Terbaru
                        </h5>

                        <span class="badge bg-warning text-dark">

                            {{ count($latestBookings) }} Data

                        </span>

                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead class="table-light">

                                <tr>
                                    <th>Kode</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($latestBookings as $booking)

                                <tr>

                                    <td>

                                        <strong>

                                            {{ $booking->booking_code }}

                                        </strong>

                                    </td>

                                    <td>

                                        {{ $booking->user?->name ?? 'User telah dihapus' }}

                                    </td>

                                    <td>

                                        @if($booking->status == 'approved')

                                            <span class="badge bg-success rounded-pill px-3">
                                                Approved
                                            </span>

                                        @elseif($booking->status == 'pending')

                                            <span class="badge bg-warning text-dark rounded-pill px-3">
                                                Pending
                                            </span>

                                        @else

                                            <span class="badge bg-danger rounded-pill px-3">
                                                Rejected
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="3" class="text-center text-muted py-4">

                                        Belum ada booking

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        {{-- ALAT TERBARU --}}
        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 pt-4 px-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="fw-bold mb-0">
                            🚜 Alat Terbaru
                        </h5>

                        <span class="badge bg-primary">

                            {{ count($latestEquipments) }} Data

                        </span>

                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead class="table-light">

                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($latestEquipments as $equipment)

                                <tr>

                                    <td>

                                        <strong>

                                            {{ $equipment->code }}

                                        </strong>

                                    </td>

                                    <td>

                                        {{ $equipment->name }}

                                    </td>

                                    <td>

                                        @if($equipment->status == 'available')

                                            <span class="badge bg-success rounded-pill px-3">
                                                Tersedia
                                            </span>

                                        @elseif($equipment->status == 'maintenance')

                                            <span class="badge bg-warning text-dark rounded-pill px-3">
                                                Maintenance
                                            </span>

                                        @else

                                            <span class="badge bg-danger rounded-pill px-3">
                                                Disewa
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="3" class="text-center text-muted py-4">

                                        Belum ada alat

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    body{
        background: #f4f7fb;
    }

    .stat-card{
        border-radius: 20px;
        transition: 0.3s ease;
    }

    .stat-card:hover{
        transform: translateY(-5px);
    }

    .icon-box{
        width: 55px;
        height: 55px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .income-card{
        border-radius: 20px;
        background: linear-gradient(135deg, #ff9800, #ff5722);
    }

    .income-icon{
        font-size: 45px;
        opacity: .85;
    }

    .table tbody tr{
        transition: 0.2s ease;
    }

    .table tbody tr:hover{
        background: #fafafa;
    }

</style>

@endsection