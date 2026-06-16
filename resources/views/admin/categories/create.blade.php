<x-app-layout>
    <div class="container mx-auto p-6">

        <h1 class="text-2xl font-bold mb-4">
            Tambah Kategori
        </h1>

        <form action="{{ route('categories.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">
                <label>Nama Kategori</label>

                <input
                    type="text"
                    name="name"
                    class="border w-full p-2">
            </div>

            <div class="mb-4">
                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="border w-full p-2"></textarea>
            </div>

            <button
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan
            </button>

        </form>

    </div>
</x-app-layout>