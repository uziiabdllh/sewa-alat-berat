<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-8">
                Dashboard Admin
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Total Alat -->
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-lg">Total Alat</h2>
                    <p class="text-4xl font-bold mt-2">
                        {{ $totalAlat }}
                    </p>
                </div>

                <!-- Alat Tersedia -->
                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-lg">Alat Tersedia</h2>
                    <p class="text-4xl font-bold mt-2">
                        {{ $alatTersedia }}
                    </p>
                </div>

                <!-- Alat Disewa -->
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-lg">Alat Disewa</h2>
                    <p class="text-4xl font-bold mt-2">
                        {{ $alatDisewa }}
                    </p>
                </div>

                <!-- Total Kategori -->
                <div class="bg-purple-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-lg">Total Kategori</h2>
                    <p class="text-4xl font-bold mt-2">
                        {{ $totalKategori }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>