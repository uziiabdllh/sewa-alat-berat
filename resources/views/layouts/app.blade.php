<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TREK - Rental Alat Berat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3"
           href="/dashboard">

            🚜 TREK

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">

                    <a class="nav-link fw-semibold"
                       href="/dashboard">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link fw-semibold"
                       href="/dashboard">

                        Katalog Alat

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link fw-semibold"
                       href="/history">

                        Riwayat Sewa

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link fw-semibold"
                       href="#">

                        Profil

                    </a>

                </li>

                <li class="nav-item ms-3">

                    <a href="/"
                       class="btn btn-warning fw-semibold">

                        Logout

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- Content -->

<div class="container mt-4">

    @yield('content')

</div>

<footer class="bg-dark text-white text-center py-3 mt-5">

    <p class="mb-0">

        © 2026 TREK - Sistem Penyewaan Alat Berat

    </p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>