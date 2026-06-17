<x-app-layout>
<div class="py-12">
<div class="max-w-4xl mx-auto">

<h1 class="text-3xl font-bold mb-6">
Tambah Customer
</h1>

<form action="{{ route('customers.store') }}" method="POST">

@csrf

<div class="mb-4">
<label>Nama</label>
<input type="text"
name="name"
class="w-full border rounded p-3">
</div>

<div class="mb-4">
<label>Telepon</label>
<input type="text"
name="phone"
class="w-full border rounded p-3">
</div>

<div class="mb-4">
<label>Email</label>
<input type="email"
name="email"
class="w-full border rounded p-3">
</div>

<div class="mb-4">
<label>Alamat</label>
<textarea
name="address"
class="w-full border rounded p-3"></textarea>
</div>

<button
class="bg-blue-500 text-white px-6 py-3 rounded">
Simpan
</button>

</form>

</div>
</div>
</x-app-layout>