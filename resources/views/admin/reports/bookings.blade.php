<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-6">
                Laporan Booking
            </h1>
            <a href="{{ route('reports.bookings.pdf') }}"
                class="bg-red-600 text-white px-4 py-2 rounded">
                Cetak PDF
            </a>

            <div class="bg-white rounded shadow p-6">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Kode Booking</th>
                            <th>Customer</th>
                            <th>Alat</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($bookings as $booking)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $booking->booking_code }}</td>

                            <td>{{ $booking->user->name }}</td>

                            <td>{{ $booking->equipment->name }}</td>

                            <td>
                                {{ $booking->start_date }}
                                <br>
                                s/d
                                <br>
                                {{ $booking->end_date }}
                            </td>

                            <td>
                                Rp {{ number_format($booking->total,0,',','.') }}
                            </td>

                            <td>
                                {{ ucfirst($booking->status) }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>