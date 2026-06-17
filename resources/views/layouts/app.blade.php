<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TREK - Rental Alat Berat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar Customer -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3" href="/dashboard">
            🚜 TREK
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="/dashboard">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">
                        Katalog Alat
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">
                        Riwayat Sewa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">
                        Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-warning ms-3">
                        Logout
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="container mt-4">

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>