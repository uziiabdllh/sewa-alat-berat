@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5 text-center">

                    <!-- Icon -->
                    <div class="mb-4">

                        <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center"
                             style="width:90px;height:90px;font-size:45px;">

                            ✓

                        </div>

                    </div>

                    <!-- Judul -->
                    <h2 class="fw-bold mb-3">

                        Bukti Pembayaran Berhasil Dikirim

                    </h2>

                    <!-- Deskripsi -->
                    <p class="text-muted fs-5">

                        Terima kasih telah melakukan pembayaran melalui QRIS.

                    </p>

                    <p class="text-secondary">

                        Bukti pembayaran telah berhasil dikirim dan saat ini
                        sedang menunggu proses verifikasi oleh admin.

                    </p>

                    <!-- Status -->
                    <div class="card bg-light border-0 mt-4">

                        <div class="card-body">

                            <h5 class="fw-bold mb-3">

                                Status Booking

                            </h5>

                            <span class="badge bg-warning text-dark px-4 py-2 fs-6">

                                Menunggu Verifikasi Admin

                            </span>

                            <hr>

                            <p class="text-muted mb-1">

                                Estimasi Verifikasi

                            </p>

                            <h6 class="fw-bold">

                                Maksimal 1 x 24 Jam

                            </h6>

                        </div>

                    </div>

                    <!-- Informasi -->
                    <div class="alert alert-info mt-4">

                        Setelah pembayaran diverifikasi,
                        status penyewaan akan berubah menjadi
                        <strong>"Disetujui"</strong> dan alat siap disewa.

                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-center gap-3 mt-4">

                        <a href="{{ route('customer.history') }}"
                           class="btn btn-warning px-4">

                            Riwayat Booking

                        </a>

                        <a href="{{ route('customer.katalog') }}"
                           class="btn btn-outline-dark px-4">

                            Sewa Alat Lain

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection