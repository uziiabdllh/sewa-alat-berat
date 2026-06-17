<x-app-layout>
<div class="py-12">
<div class="max-w-4xl mx-auto">

<h1 class="text-3xl font-bold mb-6">
Edit Customer
</h1>

<form
action="{{ route('customers.update',$customer->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-4">
<label>Nama</label>
<input
type="text"
name="name"
value="{{ $customer->name }}"
class="w-full border rounded p-3">
</div>

<div class="mb-4">
<label>Telepon</label>
<input
type="text"
name="phone"
value="{{ $customer->phone }}"
class="w-full border rounded p-3">
</div>

<div class="mb-4">
<label>Email</label>
<input
type="email"
name="email"
value="{{ $customer->email }}"
class="w-full border rounded p-3">
</div>

<div class="mb-4">
<label>Alamat</label>
<textarea
name="address"
class="w-full border rounded p-3">{{ $customer->address }}</textarea>
</div>

<button
class="bg-green-500 text-white px-6 py-3 rounded">
Update
</button>

</form>

</div>
</div>
</x-app-layout>