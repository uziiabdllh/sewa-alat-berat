<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <h1 class="text-3xl font-bold mb-6">
                    Tambah Payment
                </h1>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('payments.store') }}" method="POST">

                    @csrf

                    {{-- Booking --}}
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Booking
                        </label>

                        <select
                            name="booking_id"
                            class="w-full border rounded p-2">

                            <option value="">
                                Pilih Booking
                            </option>

                            @foreach($bookings as $booking)

                                <option value="{{ $booking->id }}">
                                    {{ $booking->booking_code }}
                                    -
                                    {{ $booking->user->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Metode --}}
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Metode Pembayaran
                        </label>

                        <select
                            name="payment_method"
                            class="w-full border rounded p-2">

                            <option value="Transfer Bank">
                                Transfer Bank
                            </option>

                            <option value="Cash">
                                Cash
                            </option>

                            <option value="QRIS">
                                QRIS
                            </option>

                        </select>

                    </div>

                    {{-- Jumlah --}}
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Jumlah Pembayaran
                        </label>

                        <input
                            type="number"
                            name="amount"
                            class="w-full border rounded p-2">

                    </div>

                    {{-- Status --}}
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded p-2">

                            <option value="pending">
                                Pending
                            </option>

                            <option value="paid">
                                Paid
                            </option>

                            <option value="failed">
                                Failed
                            </option>

                        </select>

                    </div>

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded">

                        Simpan Payment

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>