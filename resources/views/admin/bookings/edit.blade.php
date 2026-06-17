<x-app-layout>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <h2 class="text-2xl font-bold mb-6">
                    Edit Booking
                </h2>

                <form action="{{ route('bookings.update', $booking->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Customer --}}
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Customer
                        </label>

                        <select
                            name="user_id"
                            class="w-full border rounded p-2">

                            @foreach($users as $user)

                                <option
                                    value="{{ $user->id }}"
                                    {{ $booking->user_id == $user->id ? 'selected' : '' }}>

                                    {{ $user->name }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    {{-- Alat --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Alat Berat
                        </label>

                        <select
                            name="equipment_id"
                            class="w-full border rounded p-2">

                            @foreach($equipments as $equipment)

                                <option
                                    value="{{ $equipment->id }}"
                                    {{ $booking->equipment_id == $equipment->id ? 'selected' : '' }}>

                                    {{ $equipment->name }} - {{ $equipment->brand }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ $booking->start_date }}"
                            class="w-full border rounded p-2">

                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ $booking->end_date }}"
                            class="w-full border rounded p-2">

                    </div>

                    {{-- Lokasi --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Lokasi Proyek
                        </label>

                        <textarea
                            name="project_location"
                            rows="3"
                            class="w-full border rounded p-2">{{ $booking->project_location }}</textarea>

                    </div>

                    {{-- Operator --}}
                    <div class="mb-4">

                        <label>

                            <input
                                type="checkbox"
                                name="operator_needed"
                                value="1"
                                {{ $booking->operator_needed ? 'checked' : '' }}>

                            Butuh Operator

                        </label>

                    </div>

                    {{-- Pengiriman --}}
                    <div class="mb-4">

                        <label>

                            <input
                                type="checkbox"
                                name="delivery_needed"
                                value="1"
                                {{ $booking->delivery_needed ? 'checked' : '' }}>

                            Butuh Pengiriman

                        </label>

                    </div>

                    {{-- Status --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded p-2">

                            <option value="pending" {{ $booking->status=='pending'?'selected':'' }}>
                                Pending
                            </option>

                            <option value="approved" {{ $booking->status=='approved'?'selected':'' }}>
                                Approved
                            </option>

                            <option value="rejected" {{ $booking->status=='rejected'?'selected':'' }}>
                                Rejected
                            </option>

                            <option value="completed" {{ $booking->status=='completed'?'selected':'' }}>
                                Completed
                            </option>

                        </select>

                    </div>

                    {{-- Catatan --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Catatan
                        </label>

                        <textarea
                            name="notes"
                            rows="3"
                            class="w-full border rounded p-2">{{ $booking->notes }}</textarea>

                    </div>

                    <button
                        type="submit"
                        class="bg-yellow-500 text-white px-5 py-2 rounded">

                        Update Booking

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>