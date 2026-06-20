@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Form Penyewaan Alat Berat
    </h2>

    <div class="card shadow">
        <div class="card-body">
            
            <form action="{{ route('customer.booking.store') }}" method="POST">
                @csrf

                <input type="hidden"
                       name="equipment_id"
                       value="{{ request('equipment_id') }}">

                <div class="mb-3">
                    <label class="form-label">
                        Alamat Proyek
                    </label>

                    <textarea
                        name="project_location"
                        class="form-control"
                        rows="3"
                        required>{{ old('project_location') }}</textarea>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            class="form-control"
                            value="{{ old('start_date') }}"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            class="form-control"
                            value="{{ old('end_date') }}"
                            required>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        Lanjut Pembayaran
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection