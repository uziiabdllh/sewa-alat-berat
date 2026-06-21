@extends('layouts.admin')

@section('content')

<div class="container-fluid pt-2 pb-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

    <div>

        <h2 class="fw-bold mb-1">

            Selamat Datang,
            {{ auth()->user()->name }} 👋

        </h2>

        <p class="text-muted mb-0">

            Monitoring Sistem Informasi Penyewaan Alat Berat

        </p>

    </div>

    <div class="text-end">

        <span class="badge bg-primary px-3 py-2 rounded-pill">

            {{ now()->format('d F Y') }}

        </span>

    </div>

    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-4">

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">
                                Total Kategori
                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalCategory }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            📂

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Total Alat

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalEquipment }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            🚜

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Total Booking

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalBooking }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            📋

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <small class="text-muted">

                                Total Payment

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $totalPayment }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            💳

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Statistik Kedua --}}
    <div class="row g-4 mb-5">

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">

                        Total Pendapatan

                    </small>

                    <h2 class="fw-bold text-success mt-2">

                        Rp {{ number_format($totalIncome,0,',','.') }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">

                        Booking Pending

                    </small>

                    <h2 class="fw-bold text-warning mt-2">

                        {{ $pendingBooking }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">

                        Return Pending

                    </small>

                    <h2 class="fw-bold text-danger mt-2">

                        {{ $returnPending }}

                    </h2>

                </div>

            </div>

        </div>

    </div>
   
    {{-- GRAFIK --}}

    <div class="row g-4">

        {{-- Booking --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">
                        📈 Booking per Bulan
                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="bookingChart" height="120"></canvas>

                </div>

            </div>

        </div>

        {{-- Status --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">
                        🚜 Status Alat
                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="statusChart"></canvas>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-12">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">
                        💰 Pendapatan Bulanan
                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="incomeChart" height="100"></canvas>

                </div>

            </div>

        </div>

    </div>
<script>

const months = [
    '', 'Jan','Feb','Mar','Apr','Mei','Jun',
    'Jul','Agu','Sep','Okt','Nov','Des'
];


// ==========================
// Booking Chart
// ==========================

new Chart(document.getElementById('bookingChart'), {

    type:'line',

    data:{

        labels:[
            @foreach($bookingChart as $item)
                months[{{ $item->month }}],
            @endforeach
        ],

        datasets:[{

            label:'Booking',

            data:[
                @foreach($bookingChart as $item)
                    {{ $item->total }},
                @endforeach
            ],

            borderWidth:3,

            fill:true,

            tension:0.4

        }]

    }

});


// ==========================
// Income Chart
// ==========================

new Chart(document.getElementById('incomeChart'),{

    type:'bar',

    data:{

        labels:[
            @foreach($incomeChart as $item)
                months[{{ $item->month }}],
            @endforeach
        ],

        datasets:[{

            label:'Pendapatan',

            data:[
                @foreach($incomeChart as $item)
                    {{ $item->total }},
                @endforeach
            ],

            borderWidth:1

        }]

    }

});


// ==========================
// Status Chart
// ==========================

new Chart(document.getElementById('statusChart'),{

    type:'doughnut',

    data:{

        labels:[
            @foreach($statusChart as $item)
                '{{ ucfirst($item->status) }}',
            @endforeach
        ],

        datasets:[{

            data:[
                @foreach($statusChart as $item)
                    {{ $item->total }},
                @endforeach
            ]

        }]

    }

});

</script>
{{-- ===================================== --}}
{{-- Booking Terbaru & Alat Terbaru --}}
{{-- ===================================== --}}

<div class="row mt-4">

    {{-- Booking Terbaru --}}
    <div class="col-lg-7">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    📋 Booking Terbaru
                </h5>

                <span class="badge bg-primary">
                    {{ $latestBookings->count() }}
                </span>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>Customer</th>
                            <th>Alat</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($latestBookings as $booking)

                        <tr>

                            <td>

                                <strong>

                                    {{ $booking->user->name }}

                                </strong>

                            </td>

                            <td>

                                {{ $booking->equipment->name }}

                            </td>

                            <td>

                                @if($booking->status == 'approved')

                                    <span class="badge bg-success">

                                        Approved

                                    </span>

                                @elseif($booking->status == 'pending')

                                    <span class="badge bg-warning text-dark">

                                        Pending

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Rejected

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center py-4">

                                Belum ada booking.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- Alat Terbaru --}}
    <div class="col-lg-5">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    🚜 Alat Terbaru

                </h5>

            </div>

            <div class="card-body">

                @foreach($latestEquipments as $equipment)

                    <div class="d-flex align-items-center mb-3">

                        @if($equipment->image)

                            <img src="{{ asset('images/alat/'.$equipment->image) }}"
                                 width="55"
                                 height="55"
                                 class="rounded shadow-sm me-3"
                                 style="object-fit:cover;">

                        @else

                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                                 style="width:55px;height:55px;">

                                🚜

                            </div>

                        @endif

                        <div class="flex-grow-1">

                            <strong>

                                {{ $equipment->name }}

                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ $equipment->category->name ?? '-' }}

                            </small>

                        </div>

                        @if($equipment->status == 'available')

                            <span class="badge bg-success">

                                Ready

                            </span>

                        @elseif($equipment->status == 'rented')

                            <span class="badge bg-warning text-dark">

                                Rent

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Service

                            </span>

                        @endif

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>
{{-- ========================================= --}}
{{-- WIDGET DASHBOARD --}}
{{-- ========================================= --}}

<div class="row mt-4">

    {{-- Quick Action --}}
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    ⚡ Quick Action
                </h5>

            </div>

            <div class="card-body d-grid gap-3">

                <a href="{{ route('equipments.create') }}"
                    class="btn btn-primary rounded-pill">

                    ➕ Tambah Alat

                </a>

                <a href="{{ route('bookings.index') }}"
                    class="btn btn-success rounded-pill">

                    📋 Kelola Booking

                </a>

                <a href="{{ route('payments.index') }}"
                    class="btn btn-warning rounded-pill">

                    💳 Verifikasi Payment

                </a>

            </div>

        </div>

    </div>

    {{-- Ringkasan --}}
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">
                    📊 Ringkasan Sistem
                </h5>

            </div>

            <div class="card-body">

                <div class="mb-3">

                    <small class="text-muted">

                        Booking Pending

                    </small>

                    <div class="progress mt-1">

                        <div class="progress-bar bg-warning"
                             style="width: {{ min($pendingBooking*10,100) }}%">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <small class="text-muted">

                        Booking Approved

                    </small>

                    <div class="progress mt-1">

                        <div class="progress-bar bg-success"
                             style="width: {{ min($approvedBooking*10,100) }}%">

                        </div>

                    </div>

                </div>

                <div>

                    <small class="text-muted">

                        Return Pending

                    </small>

                    <div class="progress mt-1">

                        <div class="progress-bar bg-danger"
                             style="width: {{ min($returnPending*10,100) }}%">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Jam Digital --}}
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    🕒 Waktu

                </h5>

            </div>

            <div class="card-body text-center">

                <h2 id="clock" class="fw-bold text-primary">

                    00:00:00

                </h2>

                <p class="text-muted mb-0">

                    {{ now()->format('l, d F Y') }}

                </p>

            </div>

        </div>

    </div>

</div>
<script>

function updateClock(){

    const now = new Date();

    document.getElementById('clock').innerHTML =
        now.toLocaleTimeString('id-ID');

}

setInterval(updateClock,1000);

updateClock();

</script>
@endsection