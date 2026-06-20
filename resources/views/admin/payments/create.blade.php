@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white fw-bold">
                    Tambah Payment
                </div>

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('payments.store') }}"
                          method="POST">

                        @csrf

                        {{-- Booking --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Booking
                            </label>

                            <select
                                name="booking_id"
                                class="form-select">

                                <option value="">
                                    Pilih Booking
                                </option>

                                @foreach($bookings as $booking)

                                    <option value="{{ $booking->id }}">

                                        {{ $booking->booking_code }}
                                        -
                                        {{ $booking->user->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select
                                name="payment_method"
                                class="form-select">

                                <option value="Transfer Bank">
                                    Transfer Bank
                                </option>

                                <option value="Cash">
                                    Cash
                                </option>

                                <option value="QRIS">
                                    QRIS
                                </option>

                            </select>

                        </div>

                        {{-- Jumlah Pembayaran --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Jumlah Pembayaran
                            </label>

                            <input
                                type="number"
                                name="amount"
                                class="form-control"
                                placeholder="Masukkan jumlah pembayaran">

                        </div>

                        {{-- Status --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

                                <option value="pending">
                                    Pending
                                </option>

                                <option value="paid">
                                    Paid
                                </option>

                                <option value="failed">
                                    Failed
                                </option>

                            </select>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Simpan Payment

                        </button>

                        <a href="{{ route('payments.index') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection