<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-6">
                Home Customer
            </h1>

            <p class="mb-6 text-gray-600">
                Selamat datang di sistem sewa alat berat
            </p>

            {{-- List Alat --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @foreach($equipments as $item)

                    <div class="bg-white shadow rounded p-4">
                        <h2 class="font-bold">
                            {{ $item->name }}
                        </h2>

                        <p class="text-gray-600">
                            Status: {{ $item->status }}
                        </p>
                    </div>

                @endforeach

            </div>

        </div>
    </div>

</x-app-layout>