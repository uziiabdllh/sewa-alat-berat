@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Riwayat Penyewaan
    </h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Alat</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Excavator Mini</td>
                <td>17 Juni 2026</td>
                <td>
                    <span class="badge bg-success">
                        Disetujui
                    </span>
                </td>
            </tr>
        </tbody>

    </table>

</div>

@endsection