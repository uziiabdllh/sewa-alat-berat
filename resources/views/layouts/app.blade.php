<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sistem Penyewaan Alat Berat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

    <a class="nav-link" href="/dashboard">
    Home
</a>

<a class="nav-link" href="#tentang">
    Tentang Kami
</a>

<a class="nav-link" href="/alat">
    Produk
</a>

<a class="nav-link" href="#">
    Login
</a>    
    <a class="navbar-brand" href="/dashboard">
            Penyewaan Alat Berat
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="/dashboard">
                Dashboard
            </a>

            <a class="nav-link" href="/alat">
                Data Alat
            </a>

            <a class="nav-link" href="/pelanggan">
                Pelanggan
            </a>

            <a class="nav-link" href="/penyewaan">
                Penyewaan
            </a>

            <a class="nav-link" href="/laporan">
                Laporan
            </a>

        </div>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>