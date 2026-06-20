@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                📋 Data Booking
            </h1>

            <p class="text-muted mb-0">
                Kelola seluruh data booking penyewaan alat berat.
            </p>

        </div>

        <a href="{{ route('reports.bookings.pdf') }}"
           class="btn btn-danger rounded-pill px-4 shadow-sm">

            📄 Export PDF

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            {{ session('success') }}

        </div>

    @endif

    {{-- CARD --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- TOP BAR --}}
        <div class="card-header bg-dark text-white py-3 border-0">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <h5 class="mb-0 fw-semibold">
                    Daftar Booking
                </h5>

                <span class="badge bg-warning text-dark px-3 py-2">

                    Total :
                    {{ $bookings->total() }} Booking

                </span>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead style="background:#f8f9fa;">

                        <tr>

                            <th class="px-4 py-3">#</th>
                            <th class="py-3">Kode Booking</th>
                            <th class="py-3">Customer</th>
                            <th class="py-3">Alat</th>
                            <th class="py-3">Tanggal Sewa</th>
                            <th class="py-3">Total</th>
                            <th class="py-3 text-center">Status</th>
                            <th class="py-3 text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                        <tr>

                            <td class="px-4 fw-semibold">

                                {{ $bookings->firstItem() + $loop->index }}

                            </td>

                            {{-- KODE --}}
                            <td>

                                <div class="fw-bold text-dark">

                                    {{ $booking->booking_code }}

                                </div>

                                <small class="text-muted">
                                    {{ $booking->created_at->format('d M Y') }}
                                </small>

                            </td>

                            {{-- CUSTOMER --}}
                            <td>

                                <div class="fw-semibold">

                                    {{ $booking->user->name }}

                                </div>

                                <small class="text-muted">

                                    {{ $booking->user->email ?? '-' }}

                                </small>

                            </td>

                            {{-- ALAT --}}
                            <td>

                                <div class="fw-semibold">

                                    @if($booking->equipment)
                                    {{ $booking->equipment->name }}
                                @else
                                    <span class="text-danger">Alat tidak ditemukan</span>
                                @endif

                                </div>

                                <small class="text-muted">

                                    Qty :
                                    {{ $booking->quantity ?? 1 }}

                                </small>

                            </td>

                            {{-- TANGGAL --}}
                            <td>

                                <div class="small text-muted mb-1">

                                    Mulai

                                </div>

                                <div class="fw-semibold">

                                    {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}

                                </div>

                                <div class="small text-muted mt-2 mb-1">

                                    Selesai

                                </div>

                                <div class="fw-semibold">

                                    {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}

                                </div>

                            </td>

                            {{-- TOTAL --}}
                            <td>

                                <div class="fw-bold text-success fs-6">

                                    Rp {{ number_format($booking->total,0,',','.') }}

                                </div>

                            </td>

                            {{-- STATUS --}}
                            <td class="text-center">

                                @if($booking->status == 'approved')

                                    <span class="badge bg-success px-3 py-2 rounded-pill">
                                        Approved
                                    </span>

                                @elseif($booking->status == 'pending')

                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                        Pending
                                    </span>

                                @elseif($booking->status == 'rejected')

                                    <span class="badge bg-danger px-3 py-2 rounded-pill">
                                        Rejected
                                    </span>

                                @else

                                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                                        Completed
                                    </span>

                                @endif

                            </td>

                            {{-- AKSI --}}
                            <td class="text-center">

                                <a href="{{ route('bookings.show', $booking->id) }}"
                                   class="btn btn-dark btn-sm rounded-pill px-3">

                                    👁 Detail

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center py-5">

                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                     width="90"
                                     class="mb-3">

                                <h5 class="fw-bold">

                                    Belum Ada Booking

                                </h5>

                                <p class="text-muted mb-0">

                                    Data booking akan muncul di sini.

                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 d-flex justify-content-center">

        {{ $bookings->links() }}

    </div>

</div>

<style>

    body{
        background: #f4f7fb;
    }

    .table tbody tr{
        transition: 0.2s ease;
    }

    .table tbody tr:hover{
        background: #fafafa;
        transform: scale(1.002);
    }

    .card{
        border-radius: 20px;
    }

</style>

@endsection