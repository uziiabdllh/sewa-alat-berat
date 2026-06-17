<x-app-layout>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="flex justify-between mb-6">

<h1 class="text-3xl font-bold">
Data Payment
</h1>

<a href="{{ route('payments.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">
Tambah Payment
</a>

</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
{{ session('success') }}
</div>
@endif

<div class="bg-white p-6 rounded shadow">

@if($payments->count())

<table class="table table-bordered">

<thead>

<tr>
<th>No</th>
<th>Customer</th>
<th>Booking</th>
<th>Metode</th>
<th>Total</th>
<th>Status</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

@foreach($payments as $payment)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $payment->booking->user->name }}</td>

<td>{{ $payment->booking->booking_code }}</td>

<td>{{ $payment->payment_method }}</td>

<td>
Rp {{ number_format($payment->amount,0,',','.') }}
</td>

<td>{{ ucfirst($payment->status) }}</td>

<td>

<a href="{{ route('payments.edit',$payment) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form
action="{{ route('payments.destroy',$payment) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus pembayaran?')">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

{{ $payments->links() }}

@else

Belum ada data pembayaran.

@endif

</div>

</div>
</div>

</x-app-layout>