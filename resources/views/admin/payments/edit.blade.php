@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-warning fw-bold">
                    Edit Payment
                </div>

                <div class="card-body">

                    <form action="{{ route('payments.update', $payment->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Booking --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Booking
                            </label>

                            <input
                                type="text"
                                class="form-control bg-light"
                                value="{{ $payment->booking->booking_code }}"
                                readonly>

                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select
                                name="payment_method"
                                class="form-select">

                                <option value="Transfer Bank"
                                    {{ $payment->payment_method == 'Transfer Bank' ? 'selected' : '' }}>
                                    Transfer Bank
                                </option>

                                <option value="Cash"
                                    {{ $payment->payment_method == 'Cash' ? 'selected' : '' }}>
                                    Cash
                                </option>

                                <option value="E-Wallet"
                                    {{ $payment->payment_method == 'E-Wallet' ? 'selected' : '' }}>
                                    E-Wallet
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
                                value="{{ $payment->amount }}">

                        </div>

                        {{-- Status --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

                                <option value="pending"
                                    {{ $payment->status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="paid"
                                    {{ $payment->status == 'paid' ? 'selected' : '' }}>
                                    Paid
                                </option>

                                <option value="failed"
                                    {{ $payment->status == 'failed' ? 'selected' : '' }}>
                                    Failed
                                </option>

                            </select>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-warning">

                            Update Payment

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