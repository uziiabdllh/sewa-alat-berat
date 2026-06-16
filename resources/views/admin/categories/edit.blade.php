<x-app-layout>
    <div class="container mx-auto p-6">

        <h1 class="text-2xl font-bold mb-4">
            Edit Kategori
        </h1>

        <form
            action="{{ route('categories.update',$category->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Nama Kategori</label>

                <input
                    type="text"
                    name="name"
                    value="{{ $category->name }}"
                    class="border w-full p-2">
            </div>

            <div class="mb-4">
                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="border w-full p-2">{{ $category->description }}</textarea>
            </div>

            <button
                class="bg-green-500 text-white px-4 py-2 rounded">
                Update
            </button>

        </form>

    </div>
</x-app-layout>