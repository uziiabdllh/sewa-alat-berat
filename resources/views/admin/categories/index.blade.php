<x-app-layout>
    <div class="container mx-auto p-6">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">
                Data Kategori
            </h1>

            <a href="{{ route('categories.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Kategori
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-200 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">

            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Deskripsi</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)

                <tr>
                    <td class="border p-2">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $category->name }}
                    </td>

                    <td class="border p-2">
                        {{ $category->description }}
                    </td>

                    <td class="border p-2">

                        <a href="{{ route('categories.edit',$category->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form
                            action="{{ route('categories.destroy',$category->id) }}"
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
                    <td colspan="4" class="text-center p-4">
                        Belum ada data
                    </td>
                </tr>

                @endforelse
            </tbody>

        </table>

    </div>
</x-app-layout>