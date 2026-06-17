<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-4xl font-bold mb-8">
                Dashboard Admin
            </h1>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <div class="bg-blue-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Kategori</h2>
                    <p class="text-3xl font-bold">{{ $totalCategory }}</p>
                </div>

                <div class="bg-green-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Alat</h2>
                    <p class="text-3xl font-bold">{{ $totalEquipment }}</p>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Booking</h2>
                    <p class="text-3xl font-bold">{{ $totalBooking }}</p>
                </div>

                <div class="bg-purple-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Payment</h2>
                    <p class="text-3xl font-bold">{{ $totalPayment }}</p>
                </div>

                <div class="bg-red-500 text-white p-6 rounded shadow">
                    <h2 class="text-lg">Pendapatan</h2>
                    <p class="text-2xl font-bold">
                        Rp {{ number_format($totalIncome,0,',','.') }}
                    </p>
                </div>

            </div>

            {{-- Booking & Alat Terbaru --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

                {{-- Booking --}}
                <div class="bg-white rounded shadow p-6">

                    <h2 class="text-xl font-bold mb-4">
                        Booking Terbaru
                    </h2>

                    <table class="min-w-full border">

                        <thead class="bg-gray-100">

                            <tr>
                                <th class="border p-2">Kode</th>
                                <th class="border p-2">Customer</th>
                                <th class="border p-2">Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestBookings as $booking)

                                <tr>

                                    <td class="border p-2">
                                        {{ $booking->booking_code }}
                                    </td>

                                    <td class="border p-2">
                                        {{ $booking->user->name }}
                                    </td>

                                    <td class="border p-2">
                                        {{ ucfirst($booking->status) }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center p-3">
                                        Belum ada data booking
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- Alat --}}
                <div class="bg-white rounded shadow p-6">

                    <h2 class="text-xl font-bold mb-4">
                        Alat Terbaru
                    </h2>

                    <table class="min-w-full border">

                        <thead class="bg-gray-100">

                            <tr>
                                <th class="border p-2">Kode</th>
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestEquipments as $equipment)

                                <tr>

                                    <td class="border p-2">
                                        {{ $equipment->code }}
                                    </td>

                                    <td class="border p-2">
                                        {{ $equipment->name }}
                                    </td>

                                    <td class="border p-2">
                                        {{ ucfirst($equipment->status) }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center p-3">
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

</x-app-layout>