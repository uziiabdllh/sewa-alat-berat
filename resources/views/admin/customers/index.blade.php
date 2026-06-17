<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-6">
                <h1 class="text-4xl font-bold">
                    Data Customer
                </h1>

                <a href="{{ route('customers.create') }}"
                   class="bg-blue-500 text-white px-6 py-3 rounded">
                    Tambah Customer
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full bg-white shadow">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3">No</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Telepon</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Alamat</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($customers as $customer)
                    <tr>
                        <td class="p-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-3">
                            {{ $customer->name }}
                        </td>

                        <td class="p-3">
                            {{ $customer->phone }}
                        </td>

                        <td class="p-3">
                            {{ $customer->email }}
                        </td>

                        <td class="p-3">
                            {{ $customer->address }}
                        </td>

                        <td class="p-3">
                            <a href="{{ route('customers.edit',$customer->id) }}"
                               class="bg-yellow-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form
                                action="{{ route('customers.destroy',$customer->id) }}"
                                method="POST"
                                class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus customer?')"
                                    class="bg-red-500 text-white px-3 py-2 rounded">
                                    Hapus
                                </button>

                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-5">
                            Belum ada customer
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>