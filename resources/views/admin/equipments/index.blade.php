<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <h1 class="text-3xl font-bold">
                    Data Alat Berat
                </h1>

                <a href="{{ route('equipments.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded">
                    Tambah Alat
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-200 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded">
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 border">No</th>
                            <th class="p-3 border">Kode</th>
                            <th class="p-3 border">Nama</th>
                            <th class="p-3 border">Kategori</th>
                            <th class="p-3 border">Brand</th>
                            <th class="p-3 border">Tahun</th>
                            <th class="p-3 border">Harga/Hari</th>
                            <th class="p-3 border">Status</th>
                            <th class="p-3 border">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($equipments as $equipment)

                        <tr>
                            <td class="border p-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-3">
                                {{ $equipment->code }}
                            </td>

                            <td class="border p-3">
                                {{ $equipment->name }}
                            </td>

                            <td class="border p-3">
                                {{ $equipment->category->name ?? '-' }}
                            </td>

                            <td class="border p-3">
                                {{ $equipment->brand }}
                            </td>

                            <td class="border p-3">
                                {{ $equipment->year }}
                            </td>

                            <td class="border p-3">
                                Rp {{ number_format($equipment->daily_price) }}
                            </td>

                            <td class="border p-3">
                                {{ $equipment->status }}
                            </td>

                            <td class="border p-3">
                                <a href="{{ route('equipments.edit', $equipment->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('equipments.destroy', $equipment->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus data?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="text-center p-4">
                                Belum ada data alat
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>