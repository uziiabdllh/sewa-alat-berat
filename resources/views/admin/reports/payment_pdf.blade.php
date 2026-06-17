<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<title>Laporan Payment</title>

<style>

body{
    font-family: DejaVu Sans;
    font-size:12px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table,th,td{
    border:1px solid black;
}

th,td{
    padding:8px;
    text-align:left;
}

h2{
    text-align:center;
}

</style>

</head>

<body>

<h2>LAPORAN PAYMENT</h2>

<p>
Total Pendapatan :
<strong>
Rp {{ number_format($totalIncome,0,',','.') }}
</strong>
</p>

<table>

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

<td>{{ ucfirst($payment->status) }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>