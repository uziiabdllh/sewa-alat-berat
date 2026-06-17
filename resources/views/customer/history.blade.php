@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Riwayat Transaksi
    </h2>

    <div class="card shadow">

        <div class="card-body">

            <table class="table">

                <thead>

                    <tr>
                        <th>Kode</th>
                        <th>Alat</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>BK001</td>
                        <td>Excavator Mini</td>
                        <td>Rp 7.500.000</td>
                        <td>
                            <span class="badge bg-warning">
                                Menunggu
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>BK002</td>
                        <td>Bulldozer</td>
                        <td>Rp 4.000.000</td>
                        <td>
                            <span class="badge bg-success">
                                Disetujui
                            </span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection