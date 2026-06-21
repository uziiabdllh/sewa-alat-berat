@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                📦 Data Kategori
            </h1>

            <p class="text-muted mb-0">
                Kelola kategori alat berat dengan tampilan modern.
            </p>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            {{ session('success') }}

        </div>

    @endif
    <div class="row mb-4">

    <div class="col-md-5">

        <input
            type="text"
            id="searchCategory"
            class="form-control rounded-pill shadow-sm"
            placeholder="Cari kategori...">

    </div>

    <div class="col-md-7 text-end">

        <a href="{{ route('categories.create') }}"
           class="btn btn-warning rounded-pill px-4 shadow-sm">

            <i class="bi bi-plus-circle"></i>

            Tambah Kategori

        </a>

    </div>

    </div>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- TOP BAR --}}
        <div class="card-header bg-dark text-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <h5 class="mb-0 fw-semibold">
                    Daftar Kategori
                </h5>

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">

                    Total :
                    {{ $categories->count() }} Kategori

                </span>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle table-hover mb-0">

                    <thead style="background:#f8f9fa;">

                        <tr>

                            <th class="px-4 py-3">#</th>
                            <!-- <th class="py-3">Foto</th> -->
                            <th class="py-3">Nama Kategori</th>
                            <th class="py-3">Deskripsi</th>
                            <!-- <th class="py-3 text-center">Stok</th> -->
                            <th class="py-3 text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody id="categoryTable">

                        @forelse($categories as $category)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="px-4 fw-semibold">

                                {{ $loop->iteration }}

                            </td>

                            <!-- {{-- FOTO --}}
                            <td>

                                @if($category->image)

                                    <img
                                        src="{{ asset('images/alat/'.$category->image) }}"
                                        width="80"
                                        height="80"
                                        class="rounded-4 shadow-sm"
                                        style="object-fit:cover;">

                                @else

                                    <div class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                                         style="width:80px;height:80px;">

                                        📷

                                    </div>

                                @endif

                            </td> -->

                            {{-- NAMA --}}
                            <td>

                                <div class="fw-bold fs-6 text-dark">

                                    {{ $category->name }}

                                </div>

                                <small class="text-muted">

                                    Kategori alat berat

                                </small>

                            </td>

                            {{-- DESKRIPSI --}}
                            <td style="max-width:300px;">

                                <span class="text-muted">

                                    {{ $category->description }}

                                </span>

                            </td>

                            <!-- {{-- STOK --}}
                            <td class="text-center">

                                <span class="badge bg-success px-3 py-2 rounded-pill">

                                    {{ $category->stok }}

                                </span>

                            </td> -->

                            {{-- AKSI --}}
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('categories.edit',$category->id) }}"
                                       class="btn btn-warning btn-sm rounded-pill px-3 shadow-sm">

                                        ✏ Edit

                                    </a>

                                    <form action="{{ route('categories.destroy',$category->id) }}"
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

                            <td colspan="6" class="text-center py-5">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                    width="90"
                                    class="mb-3">

                                <h5 class="fw-bold">

                                    Belum Ada Kategori

                                </h5>

                                <p class="text-muted mb-0">

                                    Data kategori akan muncul di sini.

                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

    body{
        background: #f4f7fb;
    }

    .card{
        border-radius: 22px;
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

document.getElementById("searchCategory").addEventListener("keyup", function () {

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll("#categoryTable tr");

    rows.forEach(function(row){

        row.style.display =
            row.innerText.toLowerCase().includes(value)
            ? ""
            : "none";

    });

});

</script>
@endsection