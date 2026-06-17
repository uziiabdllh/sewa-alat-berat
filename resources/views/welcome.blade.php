<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREK - Rental Alat Berat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
        }

        /* Navbar */
        nav{
            background: white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:20px 80px;
        }

        .logo{
            font-size:40px;
            font-weight:bold;
        }

        .menu a{
            text-decoration:none;
            color:black;
            margin-left:30px;
            font-weight:600;
        }

        /* Hero */
        .hero{
            height:90vh;
            background-image:
                linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                url('https://images.unsplash.com/photo-1504307651254-35680f356dfd');
            background-size:cover;
            background-position:center;

            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;

            color:white;
            text-align:center;
        }

        .hero h1{
            font-size:70px;
            margin-bottom:20px;
        }

        .hero p{
            font-size:22px;
            margin-bottom:30px;
        }

        .search-box{
            display:flex;
        }

        .search-box input{
            width:500px;
            padding:15px;
            border:none;
            border-radius:10px 0 0 10px;
            font-size:18px;
        }

        .search-box button{
            background:#FFD400;
            border:none;
            padding:15px 30px;
            font-weight:bold;
            cursor:pointer;
            border-radius:0 10px 10px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="logo">TREK</div>

        <div class="menu">
            <a href="#">Katalog Produk</a>
            <a href="#">Menjadi Mitra</a>

            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                @endauth

            @endif
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">

        <h1>Cari Rental Alat Online</h1>

        <p>
            Booking mudah, cepat, dan terpercaya untuk kebutuhan proyek Anda.
        </p>

        <div class="search-box">
            <input type="text" placeholder="Cari alat...">

            <button>
                CARI
            </button>
        </div>

    </section>

</body>
</html>