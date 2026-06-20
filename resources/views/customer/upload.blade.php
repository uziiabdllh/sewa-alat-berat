@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="text-center mb-4">
                        Upload Bukti Pembayaran
                    </h2>

                    <p class="text-center text-muted">
                        Setelah melakukan pembayaran, silakan upload bukti pembayaran Anda.
                    </p>

                    <form action="{{ route('customer.payment.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Bukti Pembayaran
                            </label>

                            <input
                                type="file"
                                name="payment_proof"
                                class="form-control"
                                accept="image/*"
                                required>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success w-100">

                            Kirim Bukti Pembayaran

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection