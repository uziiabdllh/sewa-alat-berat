<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded shadow">

                <h2 class="text-2xl font-bold mb-6">
                    Tambah Booking
                </h2>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST">

                    @csrf

                    {{-- Customer --}}
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Customer
                        </label>

                        <select
                            name="user_id"
                            class="w-full border rounded p-2">

                            <option value="">
                                Pilih Customer
                            </option>

                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
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

                            <option value="">
                                Pilih Alat
                            </option>

                            @foreach($equipments as $equipment)
                                <option value="{{ $equipment->id }}">
                                    {{ $equipment->name }}
                                    -
                                    {{ $equipment->brand }}
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
                            class="w-full border rounded p-2"></textarea>
                    </div>

                    {{-- Operator --}}
                    <div class="mb-4">

                        <label>

                            <input
                                type="checkbox"
                                name="operator_needed"
                                value="1">

                            Butuh Operator

                        </label>

                    </div>

                    {{-- Pengiriman --}}
                    <div class="mb-4">

                        <label>

                            <input
                                type="checkbox"
                                name="delivery_needed"
                                value="1">

                            Butuh Pengiriman

                        </label>

                    </div>

                    {{-- Catatan --}}
                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Catatan
                        </label>

                        <textarea
                            name="notes"
                            rows="3"
                            class="w-full border rounded p-2"></textarea>

                    </div>

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded">

                        Simpan Booking

                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>