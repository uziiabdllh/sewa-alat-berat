@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold mb-0">
            Data Payment
        </h2>

        <a href="{{ route('payments.create') }}"
           class="btn btn-primary">

            Tambah Payment

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            @if($payments->count())

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-light text-center">

                            <tr>

                                <th>No</th>
                                <th>Customer</th>
                                <th>Booking</th>
                                <th>Metode</th>
                                <th>Total</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($payments as $payment)

                                <tr>

                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $payment->booking->user->name }}
                                    </td>

                                    <td>
                                        {{ $payment->booking->booking_code }}
                                    </td>

                                    <td>
                                        {{ $payment->payment_method }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($payment->amount,0,',','.') }}
                                    </td>

                                  <td class="text-center">

                                    {{-- FOTO BUKTI --}}
                                    @if($payment->proof)

                                        <a href="{{ asset('images/bukti/' . $payment->proof) }}"
                                        target="_blank">

                                            <img
                                                src="{{ asset('images/bukti/' . $payment->proof) }}"
                                                width="80"
                                                class="img-thumbnail"
                                                style="height:80px; object-fit:cover;">

                                        </a>

                                    @else

                                        <span class="text-muted">
                                            Tidak ada foto
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    {{-- STATUS --}}
                                    @if($payment->status == 'paid')

                                        <span class="badge bg-success">
                                            Paid
                                        </span>

                                    @elseif($payment->status == 'pending')

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Failed
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    {{-- UBAH STATUS --}}
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
                                                class="btn btn-success btn-sm">

                                                Approve

                                            </button>

                                        @elseif($payment->status == 'paid')

                                            <input type="hidden"
                                                name="status"
                                                value="failed">

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm">

                                                Fail

                                            </button>

                                        @else

                                            <input type="hidden"
                                                name="status"
                                                value="paid">

                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-sm">

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

                <div class="mt-3">

                    {{ $payments->links() }}

                </div>

            @else

                <div class="alert alert-info mb-0">

                    Belum ada data pembayaran.

                </div>

            @endif

        </div>

    </div>

</div>

@endsection