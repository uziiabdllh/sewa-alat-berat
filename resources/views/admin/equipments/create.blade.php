<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <h1 class="text-2xl font-bold mb-6">
                    Tambah Alat Berat
                </h1>

                <form action="{{ route('equipments.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Kategori</label>

                        <select
                            name="category_id"
                            class="w-full border rounded p-2">

                            <option value="">
                                Pilih Kategori
                            </option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Kode Alat</label>

                        <input
                            type="text"
                            name="code"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Nama Alat</label>

                        <input
                            type="text"
                            name="name"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Brand</label>

                        <input
                            type="text"
                            name="brand"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Tahun</label>

                        <input
                            type="number"
                            name="year"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Harga Per Hari</label>

                        <input
                            type="number"
                            name="daily_price"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Status</label>

                        <select
                            name="status"
                            class="w-full border rounded p-2">

                            <option value="available">
                                Available
                            </option>

                            <option value="rented">
                                Rented
                            </option>

                            <option value="maintenance">
                                Maintenance
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Deskripsi</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full border rounded p-2"></textarea>
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">

                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>