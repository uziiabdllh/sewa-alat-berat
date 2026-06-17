@extends('layouts.app')

@section('content')

<div class="text-center mb-5">

    <h1 class="display-4 fw-bold">
        Selamat Datang di Sistem Penyewaan Alat Berat
    </h1>

    <p class="text-muted">
        Temukan berbagai alat berat terbaik untuk proyek Anda.
    </p>

</div>
<form action="{{ route('customer.katalog') }}" method="GET" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari alat berat...">

        <button class="btn btn-warning">

            🔍 Cari

        </button>

    </div>

</form>
<div class="row">

    @forelse($equipments as $item)

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm h-100">

                {{-- Gambar Alat --}}
                <img src="{{ asset('images/alat/' . $item->image) }}"
                     class="card-img-top"
                     alt="{{ $item->name }}"
                     style="height:220px; object-fit:cover;">

                <div class="card-body">

                    <h4>{{ $item->name }}</h4>

                    <p>
                        <strong>Kode :</strong>
                        {{ $item->code }}
                    </p>

                    <p>
                        <strong>Harga :</strong>
                        Rp {{ number_format($item->daily_price,0,',','.') }}/hari
                    </p>

                    <p>

                        @if($item->status == 'available')

                            <span class="badge bg-success">
                                Tersedia
                            </span>

                        @elseif($item->status == 'maintenance')

                            <span class="badge bg-warning text-dark">
                                Maintenance
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Disewa
                            </span>

                        @endif

                    </p>

                    <a href="{{ route('customer.detail',$item->id) }}"
                       class="btn btn-primary">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="alert alert-warning">

                Belum ada alat tersedia.

            </div>

        </div>

    @endforelse

</div>

@endsection