<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <h2 class="text-2xl font-bold mb-6">
                    Edit Payment
                </h2>

                <form action="{{ route('payments.update', $payment->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Booking
                        </label>

                        <input
                            type="text"
                            class="w-full border rounded p-2 bg-gray-100"
                            value="{{ $payment->booking->booking_code }}"
                            readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Metode Pembayaran
                        </label>

                        <select
                            name="payment_method"
                            class="w-full border rounded p-2">

                            <option value="Transfer Bank"
                                {{ $payment->payment_method=='Transfer Bank' ? 'selected' : '' }}>
                                Transfer Bank
                            </option>

                            <option value="Cash"
                                {{ $payment->payment_method=='Cash' ? 'selected' : '' }}>
                                Cash
                            </option>

                            <option value="E-Wallet"
                                {{ $payment->payment_method=='E-Wallet' ? 'selected' : '' }}>
                                E-Wallet
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Jumlah Pembayaran
                        </label>

                        <input
                            type="number"
                            name="amount"
                            class="w-full border rounded p-2"
                            value="{{ $payment->amount }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded p-2">

                            <option value="pending"
                                {{ $payment->status=='pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="paid"
                                {{ $payment->status=='paid' ? 'selected' : '' }}>
                                Paid
                            </option>

                            <option value="failed"
                                {{ $payment->status=='failed' ? 'selected' : '' }}>
                                Failed
                            </option>

                        </select>
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded">
                        Update Payment
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>