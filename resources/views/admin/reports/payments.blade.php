<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-6">
                Laporan Payment
            </h1>
            <a href="{{ route('reports.payments.pdf') }}"
                class="bg-red-600 text-white px-4 py-2 rounded">
                    Cetak PDF
            </a>

            <div class="bg-white rounded shadow p-6">

                <h3 class="mb-4">
                    Total Pendapatan :
                    <strong>
                        Rp {{ number_format($totalIncome,0,',','.') }}
                    </strong>
                </h3>

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Booking</th>
                            <th>Customer</th>
                            <th>Metode</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($payments as $payment)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $payment->booking->booking_code }}</td>

                            <td>{{ $payment->booking->user->name }}</td>

                            <td>{{ $payment->payment_method }}</td>

                            <td>
                                Rp {{ number_format($payment->amount,0,',','.') }}
                            </td>

                            <td>
                                {{ ucfirst($payment->status) }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>