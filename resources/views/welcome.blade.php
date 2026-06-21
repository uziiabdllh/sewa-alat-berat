<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREK - Rental Alat Berat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> 

        body{
            margin: 0;
            font-family: Arial, sans-serif;
        }

        a{
            text-decoration: none;
        }

        /* ======================
           NAVBAR
        ====================== */

        nav{
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 80px;
        }

        .logo{
            font-size: 40px;
            font-weight: bold;
        }

        .menu a{
            color: black;
            margin-left: 30px;
            font-weight: 600;
        }

        /* ======================
           HERO SECTION
        ====================== */

        .hero{
            height: 90vh;

            background-image:
                linear-gradient(
                    rgba(0,0,0,0.4),
                    rgba(0,0,0,0.4)
                ),
                url('https://images.unsplash.com/photo-1504307651254-35680f356dfd');

            background-size: cover;
            background-position: center;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            color: white;
            text-align: center;
        }

        .hero h1{
            font-size: 70px;
            margin-bottom: 20px;
        }

        .hero p{
            font-size: 22px;
            margin-bottom: 30px;
        }

        .search-box{
            display: flex;
        }

        .search-box input{
            width: 500px;
            padding: 15px;
            border: none;
            border-radius: 10px 0 0 10px;
            font-size: 18px;
        }

        .search-box button{
            background: #FFD400;
            border: none;
            padding: 15px 30px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 0 10px 10px 0;
        }

        /* ======================
           ABOUT
        ====================== */

        .about{
            padding: 80px 100px;
            text-align: center;
        }

        .about h2{
            font-size: 40px;
            margin-bottom: 20px;
        }

        .about p{
            max-width: 800px;
            margin: auto;
            line-height: 1.8;
            color: #555;
        }

        /* ======================
           WHY US
        ====================== */

        .why-us{
            background: #f5f5f5;
            padding: 80px 100px;
            text-align: center;
        }

        .why-us h2{
            font-size: 40px;
            margin-bottom: 50px;
        }

        .feature-container{
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .feature-card{
            width: 250px;
            padding: 30px;
            background: white;

            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .feature-card h3{
            margin-top: 20px;
        }

        .feature-card p{
            color: #666;
            line-height: 1.6;
        }

    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav>

        <div class="logo">
            TREK
        </div>

        <div class="menu">

            <a href="{{ route('customer.katalog') }}">
                Katalog Produk
            </a>
            
            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        Log In
                    </a>
                @endauth

            @endif

        </div>

    </nav>

    <!-- ================= HERO ================= -->

    <section class="hero">

        <h1>Cari Rental Alat Online</h1>

        <p>
            Booking mudah, cepat, dan terpercaya untuk kebutuhan proyek Anda.
        </p>

        <form action="{{ route('customer.katalog') }}" method="GET" class="search-box">

    <input
        type="text"
        name="search"
        placeholder="Cari Excavator, Crane, Bulldozer..."
    >

    <button type="submit">
        CARI
    </button>

</form>

    </section>

    <!-- ================= ABOUT ================= -->

    <section class="about">

        <h2>Tentang TREK</h2>

        <p>
            TREK merupakan Sistem Informasi Penyewaan Alat Berat berbasis web
            yang dirancang untuk membantu customer dalam mencari, memesan,
            dan memantau penyewaan alat berat secara online. Sistem ini
            menyediakan informasi ketersediaan alat secara real-time sehingga
            proses penyewaan menjadi lebih cepat, mudah, dan transparan.
        </p>

    </section>

    <!-- ================= WHY US ================= -->

    <section class="why-us">

        <h2>Kenapa Memilih Kami?</h2>

        <div class="feature-container">

            <div class="feature-card">
                🚜
                <h3>Unit Berkualitas</h3>
                <p>Alat berat terawat dan siap digunakan.</p>
            </div>

            <div class="feature-card">
                📅
                <h3>Booking Real-Time</h3>
                <p>Cek ketersediaan alat tanpa bentrok jadwal.</p>
            </div>

            <div class="feature-card">
                💰
                <h3>Harga Transparan</h3>
                <p>Estimasi biaya otomatis tanpa biaya tersembunyi.</p>
            </div>

            <div class="feature-card">
                🛠️
                <h3>Dukungan Profesional</h3>
                <p>Tim siap membantu kebutuhan proyek Anda.</p>
            </div>

        </div>

    </section>

</body>
</html>