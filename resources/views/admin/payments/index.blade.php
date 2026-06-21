@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                💳 Data Payment
            </h1>

            <p class="text-muted mb-0">
                Kelola seluruh data pembayaran customer.
            </p>

        </div>

        <a href="{{ route('reports.payments.pdf') }}"
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
                    Daftar Payment
                </h5>

                <span class="badge bg-warning text-dark px-3 py-2">

                    Total :
                    {{ $payments->total() }} Payment

                </span>

            </div>

        </div>

        <div class="card-body p-0">

            @if($payments->count())

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead style="background:#f8f9fa;">

                            <tr>

                                <th class="px-4 py-3">#</th>
                                <th class="py-3">Customer</th>
                                <th class="py-3">Booking</th>
                                <th class="py-3">Metode</th>
                                <th class="py-3">Total</th>
                                <th class="py-3 text-center">Bukti</th>
                                <th class="py-3 text-center">Status</th>
                                <th class="py-3 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($payments as $payment)

                            <tr>

                                {{-- NO --}}
                                <td class="px-4 fw-semibold">

                                    {{ $payments->firstItem() + $loop->index }}

                                </td>

                                {{-- CUSTOMER --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $payment->booking->user->name }}

                                    </div>

                                </td>

                                {{-- BOOKING --}}
                                <td>

                                    <span class="badge bg-dark px-3 py-2 rounded-pill">

                                        {{ $payment->booking->booking_code }}

                                    </span>

                                </td>

                                {{-- METODE --}}
                                <td>

                                    {{ $payment->payment_method }}

                                </td>

                                {{-- TOTAL --}}
                                <td>

                                    <div class="fw-bold text-success fs-6">

                                        Rp {{ number_format($payment->amount,0,',','.') }}

                                    </div>

                                </td>

                                {{-- FOTO --}}
                                <td class="text-center">

                                    @if($payment->proof)

                                        <a href="{{ asset('images/bukti/' . $payment->proof) }}"
                                           target="_blank">

                                            <img
                                                src="{{ asset('images/bukti/' . $payment->proof) }}"
                                                width="85"
                                                height="85"
                                                class="rounded-4 shadow-sm border"
                                                style="object-fit:cover;">

                                        </a>

                                    @else

                                        <span class="text-muted small">

                                            Tidak ada foto

                                        </span>

                                    @endif

                                </td>

                                {{-- STATUS --}}
                                <td class="text-center">

                                    @if($payment->status == 'paid')

                                        <span class="badge bg-success px-3 py-2 rounded-pill">

                                            Paid

                                        </span>

                                    @elseif($payment->status == 'pending')

                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">

                                            Pending

                                        </span>

                                    @else

                                        <span class="badge bg-danger px-3 py-2 rounded-pill">

                                            Failed

                                        </span>

                                    @endif

                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">

                                    <form
                                        action="{{ route('payments.updateStatus', $payment->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('PUT')

                                        @if($payment->status == 'pending')

                                            <input type="hidden"
                                                   name="status"
                                                   value="paid">

                                            <button
                                                type="submit"
                                                class="btn btn-success btn-sm rounded-pill px-3">

                                                Approve

                                            </button>

                                        @elseif($payment->status == 'paid')

                                            <input type="hidden"
                                                   name="status"
                                                   value="failed">

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm rounded-pill px-3">

                                                Fail

                                            </button>

                                        @else

                                            <input type="hidden"
                                                   name="status"
                                                   value="paid">

                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-sm rounded-pill px-3">

                                                Paid

                                            </button>

                                        @endif

                                    </form>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                {{-- PAGINATION --}}
                <div class="p-4 border-top">

                    <div class="d-flex justify-content-center">

                        {{ $payments->links() }}

                    </div>

                </div>

            @else

                <div class="text-center py-5">

                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
                         width="100"
                         class="mb-3">

                    <h5 class="fw-bold">

                        Belum Ada Payment

                    </h5>

                    <p class="text-muted mb-0">

                        Data pembayaran akan muncul di sini.

                    </p>

                </div>

            @endif

        </div>

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