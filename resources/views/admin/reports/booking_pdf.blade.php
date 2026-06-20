<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Booking</title>

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
            border:1px solid #000;
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

<h2>LAPORAN BOOKING</h2>

<table>

    <thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Customer</th>
        <th>Alat</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Status</th>
    </tr>
    </thead>

    <tbody>

    @foreach($bookings as $booking)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $booking->booking_code }}</td>

        <td>{{ $booking->user->name }}</td>

        <td>
                @if($booking->equipment)
                    {{ $booking->equipment->name }}
                @else
                    <span style="color: red;">Alat tidak ditemukan</span>
                @endif
            </td>

        <td>
            {{ $booking->start_date }}
            <br>
            s/d
            <br>
            {{ $booking->end_date }}
        </td>

        <td>
            Rp {{ number_format($booking->total,0,',','.') }}
        </td>

        <td>{{ ucfirst($booking->status) }}</td>

    </tr>

    @endforeach

    </tbody>

</table>

</body>

</html>