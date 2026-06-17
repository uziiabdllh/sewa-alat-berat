<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-4xl font-bold mb-6">
                Data Booking
            </h1>

            @if(session('success'))

                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>

            @endif

            <a href="{{ route('bookings.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Booking
            </a>

            <div class="mt-6 bg-white shadow rounded p-6">

                <table class="min-w-full border">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="border p-2">No</th>

                            <th class="border p-2">Kode</th>

                            <th class="border p-2">Customer</th>

                            <th class="border p-2">Alat</th>

                            <th class="border p-2">Tanggal</th>

                            <th class="border p-2">Total</th>

                            <th class="border p-2">Status</th>

                            <th class="border p-2">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                        <tr>

                            <td class="border p-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-2">
                                {{ $booking->booking_code }}
                            </td>

                            <td class="border p-2">
                                {{ $booking->user->name }}
                            </td>

                            <td class="border p-2">
                                {{ $booking->equipment->name }}
                            </td>

                            <td class="border p-2">
                                {{ $booking->start_date }}
                                <br>
                                s/d
                                <br>
                                {{ $booking->end_date }}
                            </td>

                            <td class="border p-2">
                                Rp {{ number_format($booking->total,0,',','.') }}
                            </td>

                            <td class="border p-2">
                                {{ ucfirst($booking->status) }}
                            </td>

                            <td class="border p-2">

                                <a
                                    href="{{ route('bookings.edit',$booking->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('bookings.destroy',$booking->id) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus booking?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center p-4">

                                Belum ada data booking

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>