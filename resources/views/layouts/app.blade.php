<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TREK - Rental Alat Berat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background:#f4f7fb;
        }

        /* NAVBAR */

        .navbar{
            background:#fff;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            padding:16px 0;
        }

        .navbar-brand{
            font-weight:700;
            font-size:30px;
            color:#1f2937!important;
        }

        .navbar-brand span{
            color:#fbbf24;
        }

        .nav-link{
            font-weight:500;
            color:#374151!important;
            margin-left:8px;
            transition:.3s;
            border-radius:10px;
            padding:10px 16px!important;
        }

        .nav-link:hover{
            background:#fbbf24;
            color:#000!important;
        }

        .btn-warning{
            background:#fbbf24;
            border:none;
            border-radius:12px;
            padding:10px 22px;
            font-weight:600;
        }

        .btn-warning:hover{
            background:#f59e0b;
        }

        .btn-primary{
            border-radius:12px;
        }

        .btn-success{
            border-radius:12px;
        }

        .btn-danger{
            border-radius:12px;
        }

        .btn-secondary{
            border-radius:12px;
        }

        /* CARD */

        .card{
            border:none;
            border-radius:22px;
            box-shadow:0 8px 25px rgba(0,0,0,.08);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-4px);
            box-shadow:0 18px 35px rgba(0,0,0,.12);
        }

        /* TABLE */

        .table{
            border-radius:18px;
            overflow:hidden;
        }

        .table thead{
            background:#1f2937;
            color:#fff;
        }

        .table thead th{
            border:none;
            padding:16px;
            font-weight:600;
        }

        .table tbody td{
            vertical-align:middle;
            padding:16px;
        }

        .table tbody tr:hover{
            background:#fff8e7;
        }

        /* BADGE */

        .badge{
            border-radius:30px;
            padding:8px 14px;
            font-size:13px;
        }

        /* ALERT */

        .alert{
            border:none;
            border-radius:16px;
        }

        /* PAGE TITLE */

        h1,h2,h3,h4,h5{
            font-weight:700;
            color:#1f2937;
        }

        /* FOOTER */

        footer{
            background:#111827;
            color:#fff;
            margin-top:70px;
        }

        footer h5{
            color:#fff;
        }

        footer a{
            color:#d1d5db;
            text-decoration:none;
        }

        footer a:hover{
            color:#fbbf24;
        }

    </style>

</head>

<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg sticky-top">

<div class="container">

<a class="navbar-brand"
   href="{{ auth()->check() ? route('home') : route('welcome') }}">
    TREK
</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto align-items-center">

@guest

<li class="nav-item">

<a class="nav-link" href="{{ route('login') }}">

<i class="bi bi-box-arrow-in-right"></i>

Login

</a>

</li>

@endguest

@auth

@if(auth()->user()->role=='admin')

<li class="nav-item">

<a class="nav-link"
href="{{ route('admin.dashboard') }}">

<i class="bi bi-speedometer2"></i>

Dashboard

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('categories.index') }}">

Kategori

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('equipments.index') }}">

Katalog Alat

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('bookings.index') }}">

Booking

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('payments.index') }}">

Payment

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('admin.return.index') }}">

Return

</a>

</li>

@else

<li class="nav-item">

<a class="nav-link"
href="{{ route('home') }}">

Home

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('customer.katalog') }}">

Katalog

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('customer.history') }}">

Riwayat

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('profile') }}">

Profil

</a>

</li>

@endif

<li class="nav-item ms-3">

<span class="me-3 fw-semibold">

<i class="bi bi-person-circle"></i>

{{ auth()->user()->name }}

</span>

</li>

<li class="nav-item">

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-warning">

<i class="bi bi-box-arrow-right"></i>

Logout

</button>

</form>

</li>

@endauth

</ul>

</div>

</div>

</nav>

<main class="container py-5 flex-grow-1">

@yield('content')

</main>

<footer class="py-5">

<div class="container">

<div class="row">

<div class="col-md-6">

<h5>TREK Rental</h5>

<p class="text-light">

Sistem Informasi Penyewaan Alat Berat berbasis Laravel.

</p>

</div>

<div class="col-md-3">

<h6>Menu</h6>

<p class="mb-1">Dashboard</p>
<p class="mb-1">Booking</p>
<p class="mb-1">Payment</p>

</div>

<div class="col-md-3 text-md-end">

<p class="mb-0">

© 2026 TREK

</p>

<p class="text-secondary">

All Rights Reserved

</p>

</div>

</div>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>