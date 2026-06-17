@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Form Penyewaan Alat Berat
    </h2>

    <div class="card shadow">

        <div class="card-body">

            <form>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Penyewa
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Masukkan nama lengkap">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        class="form-control"
                        placeholder="Masukkan email">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="08xxxxxxxxxx">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Alamat Proyek
                    </label>

                    <textarea
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan alamat proyek"></textarea>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            class="form-control">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            class="form-control">

                    </div>

                </div>

                <div class="mt-4">

                    <a
                        href="/payment"
                        class="btn btn-warning">

                        Lanjut Pembayaran

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection