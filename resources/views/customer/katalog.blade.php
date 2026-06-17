<x-app-layout>

    <div class="max-w-7xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-8">
            Katalog Alat Berat
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($equipments as $equipment)

                <div class="bg-white rounded-lg shadow p-4">

                    @if($equipment->image)
                        <img
                            src="{{ asset('storage/' . $equipment->image) }}"
                            class="w-full h-48 object-cover rounded">
                    @else
                        <img
                            src="https://via.placeholder.com/400x250"
                            class="w-full h-48 object-cover rounded">
                    @endif

                    <div class="mt-4">

                        <h2 class="text-xl font-bold">
                            {{ $equipment->name }}
                        </h2>

                        <p class="text-gray-600">
                            {{ $equipment->category->name }}
                        </p>

                        <p class="text-blue-600 font-bold mt-2">
                            Rp {{ number_format($equipment->daily_price,0,',','.') }}/hari
                        </p>

                        <p class="mt-2">
                            Status :
                            <span class="font-semibold">
                                {{ ucfirst($equipment->status) }}
                            </span>
                        </p>

                        <a
                            href="{{ route('customer.detail', $equipment->id) }}"
                            class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center">

                    Belum ada data alat.

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>