<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TREK Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f4f7fb;
            overflow-x:hidden;
        }

        /* Sidebar */

        .sidebar{

            position:fixed;
            left:0;
            top:0;

            width:260px;
            height:100vh;

            background:#1e293b;

            transition:.35s;

            z-index:1000;

        }

        .sidebar-header{

            height:70px;

            display:flex;
            align-items:center;
            justify-content:center;

            border-bottom:1px solid rgba(255,255,255,.08);

        }

        .sidebar-header h3{

            color:white;

            font-weight:700;

            margin:0;

            transition:.3s;

        }

        .sidebar-menu{

            padding:20px 0;

        }

        .sidebar-menu a{

            display:flex;

            align-items:center;

            color:#cbd5e1;

            padding:14px 25px;

            text-decoration:none;

            transition:.25s;

            font-weight:500;

        }

        .sidebar-menu a:hover{

            background:#334155;

            color:white;

        }

        .sidebar-menu a.active{

            background:#f59e0b;

            color:white;

        }

        .sidebar-menu i{

            font-size:20px;

            width:30px;

        }

        .sidebar-menu span{

            transition:.3s;

        }

        .logout{

            position:absolute;

            bottom:20px;

            width:100%;

            padding:20px;

        }

        /* Topbar */

        .content{

            margin-left:260px;

            transition:.35s;

        }

        .topbar{

            height:70px;

            background:white;

            display:flex;

            align-items:center;

            justify-content:space-between;

            padding:0 30px;

            box-shadow:0 2px 10px rgba(0,0,0,.05);

        }

        .page{

            padding:30px;

        }

        /* Mini Sidebar */

        .sidebar.hide{

            width:90px;

        }

        .sidebar.hide h3{
            opacity:0;
            width:0;
            overflow:hidden;
        }

        .sidebar.hide span{
            display:none;
        }

        .sidebar.hide a{

            justify-content:center;

            padding:18px;

        }

        .sidebar.hide i{

            margin:0;

            font-size:22px;

        }

        .sidebar.hide .logout button{

            font-size:0;

        }

        .sidebar.hide .logout i{

            font-size:20px;

        }

        .content.hide{

            margin-left:90px;

        }

        #toggleSidebar{

            border:none;

            background:none;

            font-size:28px;

        }
        .card{
            transition: .3s;
        }

        .card:hover{
            transform: translateY(-6px);
            box-shadow:0 15px 35px rgba(0,0,0,.12)!important;
        }

    </style>

</head>

<body>

<div class="sidebar hide" id="sidebar">

    <div class="sidebar-header">

        <h3>TREK</h3>

    </div>

    <div class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('categories.index') }}">
            <i class="bi bi-tags-fill"></i>
            <span>Kategori</span>
        </a>

        <a href="{{ route('equipments.index') }}">
            <i class="bi bi-truck"></i>
            <span>Alat Berat</span>
        </a>

        <a href="{{ route('bookings.index') }}">
            <i class="bi bi-journal-text"></i>
            <span>Booking</span>
        </a>

        <a href="{{ route('payments.index') }}">
            <i class="bi bi-credit-card"></i>
            <span>Payment</span>
        </a>

        <a href="{{ route('admin.return.index') }}">
            <i class="bi bi-arrow-repeat"></i>
            <span>Return</span>
        </a>

    </div>

    <div class="logout">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-warning w-100">

                <i class="bi bi-box-arrow-right"></i>

                <span> Logout</span>

            </button>

        </form>

    </div>

</div>

<div class="content hide" id="content">

    <div class="topbar">

        <div class="d-flex align-items-center">

            <button id="toggleSidebar">

                <i class="bi bi-list"></i>

            </button>

            <div class="ms-3">

                <h5 class="fw-bold mb-0">

                    Admin Panel

                </h5>

                <small class="text-muted">

                    Sistem Informasi Penyewaan Alat Berat

                </small>

            </div>

        </div>

        <div class="text-end">

            <strong>

                {{ auth()->user()->name }}

            </strong>

            <br>

            <small class="text-muted">

                Administrator

            </small>

        </div>

    </div>

    <div class="page">

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggle = document.getElementById('toggleSidebar');

toggle.onclick = function () {
    sidebar.classList.toggle('hide');
    content.classList.toggle('hide');
}
</script>

@stack('scripts')

</body>
</html>