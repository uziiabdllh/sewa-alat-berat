@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">

    <div class="col-lg-3">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body">

                <small class="text-muted">
                    Total Alat
                </small>

                <h2 class="fw-bold">

                    {{ $equipments->total() }}

                </h2>

            </div>

        </div>

    </div>

    </div>
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                Data Alat Berat
            </h1>

            <p class="text-muted mb-0">
                Kelola seluruh data alat berat dengan mudah.
            </p>

        </div>

        <a href="{{ route('equipments.create') }}"
           class="btn btn-dark rounded-pill px-4 shadow-sm">

            + Tambah Alat

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            {{ session('success') }}

        </div>

    @endif
    <div class="row mb-4">

    <div class="col-md-4">

        <input
            type="text"
            id="searchEquipment"
            class="form-control rounded-pill"
            placeholder="Cari alat...">

    </div>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- TOP BAR --}}
        <div class="card-header bg-dark text-white py-3 border-0">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <h5 class="mb-0 fw-semibold">
                    Daftar Alat Berat
                </h5>

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">

                    Total :
                    {{ $equipments->count() }} Alat

                </span>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <tbody id="equipmentTable">

                        <tr>

                            <th class="px-4 py-3">#</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Kode</th>
                            <th class="py-3">Nama Alat</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Brand</th>
                            <th class="py-3">Tahun</th>
                            <th class="py-3">Harga / Hari</th>
                            <th class="py-3 text-center">Stok</th>
                            <th class="py-3">Deskripsi</th>
                            <th class="py-3 text-center">Status</th>
                            <th class="py-3 text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($equipments as $equipment)

                        <tr>

                            {{-- NO --}}
                            <td class="px-4 fw-semibold">

                                {{ $equipments->firstItem() + $loop->index }}

                            </td>

                            {{-- FOTO --}}
                            <td>

                                @if($equipment->image)

                                    <img
                                        src="{{ asset('images/alat/'.$equipment->image) }}"
                                        width="85"
                                        height="85"
                                        class="rounded-4 shadow-sm"
                                        style="object-fit:cover;">

                                @else

                                    <div class="bg-light rounded-4 d-flex align-items-center justify-content-center shadow-sm"
                                         style="width:85px;height:85px;">

                                        📷

                                    </div>

                                @endif

                            </td>

                            {{-- KODE --}}
                            <td>

                                <span class="fw-bold text-dark">

                                    {{ $equipment->code }}

                                </span>

                            </td>

                            {{-- NAMA --}}
                            <td>

                                <div class="fw-bold">

                                    {{ $equipment->name }}

                                </div>

                                <small class="text-muted">

                                    Heavy Equipment

                                </small>

                            </td>

                            {{-- KATEGORI --}}
                            <td>

                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">

                                    {{ $equipment->category->name ?? '-' }}

                                </span>

                            </td>

                            {{-- BRAND --}}
                            <td>

                                {{ $equipment->brand }}

                            </td>

                            {{-- TAHUN --}}
                            <td>

                                {{ $equipment->year }}

                            </td>

                            {{-- HARGA --}}
                            <td>

                                <div class="fw-bold text-success">

                                    Rp {{ number_format($equipment->daily_price,0,',','.') }}

                                </div>

                            </td>

                            {{-- STOK --}}
                            <td class="text-center">

                                <span class="badge bg-primary px-3 py-2 rounded-pill">

                                    {{ $equipment->stok }}

                                </span>

                            </td>

                            {{-- DESKRIPSI --}}
                            <td style="max-width:250px;">

                                <small class="text-muted">

                                    {{ $equipment->description }}

                                </small>

                            </td>

                            {{-- STATUS --}}
                            <td class="text-center">

                                @if($equipment->status == 'available')

                                    <span class="badge bg-success px-3 py-2 rounded-pill">
                                        Tersedia
                                    </span>

                                @elseif($equipment->status == 'rented')

                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                        Disewa
                                    </span>

                                @else

                                    <span class="badge bg-danger px-3 py-2 rounded-pill">
                                        Maintenance
                                    </span>

                                @endif

                            </td>

                            {{-- AKSI --}}
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('equipments.edit', $equipment->id) }}"
                                       class="btn btn-warning btn-sm rounded-pill px-3 shadow-sm">

                                        ✏ Edit

                                    </a>

                                    <form action="{{ route('equipments.destroy', $equipment->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm"
                                            onclick="return confirm('Hapus data?')">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="12" class="text-center py-5">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                    width="90"
                                    class="mb-3">

                                <h5 class="fw-bold">

                                    Belum Ada Data Alat

                                </h5>

                                <p class="text-muted mb-0">

                                    Data alat berat akan muncul di sini.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>
                <div class="card-footer bg-white">

                    {{ $equipments->links() }}

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    body{
        background: #f4f7fb;
    }

    .card{
        border-radius: 24px;
    }

    .table tbody tr{
        transition: 0.25s ease;
    }

    .table tbody tr:hover{
        background: #fafafa;
        transform: scale(1.002);
    }

    .btn{
        transition: 0.2s ease;
    }

    .btn:hover{
        transform: translateY(-2px);
    }

</style>
<script>

document.addEventListener("DOMContentLoaded", function () {

    const search = document.getElementById("searchEquipment");

    const rows = document.querySelectorAll("#equipmentTable tr");

    search.addEventListener("keyup", function () {

        let keyword = this.value.toLowerCase();

        rows.forEach(function(row){

            row.style.display =
                row.innerText.toLowerCase().includes(keyword)
                ? ""
                : "none";

        });

    });

});

</script>
@endsection