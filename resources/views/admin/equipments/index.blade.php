@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Data Alat Berat
        </h1>

        <a href="{{ route('equipments.create') }}"
           class="btn btn-primary">

            Tambah Alat

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">No</th>
                            <th>Foto</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Tahun</th>
                            <th>Harga/Hari</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($equipments as $equipment)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>

                                @if($equipment->image)

                                    <img src="{{ asset('images/alat/'.$equipment->image) }}"
                                        width="80"
                                        class="rounded">

                                @endif

                            </td>
                            <td>
                                {{ $equipment->code }}
                            </td>

                            <td>
                                {{ $equipment->name }}
                            </td>

                            <td>
                                {{ $equipment->category->name ?? '-' }}
                            </td>

                            <td>
                                {{ $equipment->brand }}
                            </td>

                            <td>
                                {{ $equipment->year }}
                            </td>

                            <td>
                                Rp {{ number_format($equipment->daily_price,0,',','.') }}
                            </td>
                            <td>
                                {{ $equipment->stok }}
                            </td>
                            <td>
                                {{ $equipment->description }}
                            </td>
                            <td>

                                @if($equipment->status == 'available')

                                    <span class="badge bg-success">
                                        Available
                                    </span>

                                @elseif($equipment->status == 'rented')

                                    <span class="badge bg-warning text-dark">
                                        Rented
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Maintenance
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('equipments.edit', $equipment->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('equipments.destroy', $equipment->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="12" class="text-center py-4">

                                Belum ada data alat

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection