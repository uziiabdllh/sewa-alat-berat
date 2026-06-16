@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Dashboard Sistem Penyewaan Alat Berat</h2>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Alat</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Alat Tersedia</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Sedang Disewa</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Total Customer</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection