<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-4xl font-bold mb-6">
                Data Booking
            </h1>

            <a href="{{ route('bookings.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Booking
            </a>

            <div class="mt-6 bg-white shadow rounded p-6">
                Belum ada data booking
            </div>

        </div>
    </div>
</x-app-layout>