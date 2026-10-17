<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') - Travelin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        {{-- ================= NAVBAR ================= --}}
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">

                {{-- Sidebar Toggle --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>

                {{-- Right Navbar --}}
                <ul class="navbar-nav ms-auto align-items-center">

                    {{-- Notifications --}}
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown">

                            <i class="bi bi-bell fs-5"></i>

                            <span class="navbar-badge badge rounded-pill text-bg-danger">
                                3
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow-sm">

                            <span class="dropdown-item dropdown-header">
                                3 Notifikasi
                            </span>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="bi bi-building text-primary me-2"></i>
                                PT baru mendaftar
                            </a>

                            <a href="#" class="dropdown-item">
                                <i class="bi bi-ticket-perforated text-success me-2"></i>
                                Booking baru
                            </a>

                            <a href="#" class="dropdown-item">
                                <i class="bi bi-car-front text-warning me-2"></i>
                                Kendaraan baru
                            </a>

                        </div>
                    </li>

                    {{-- Profile --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                            data-bs-toggle="dropdown">

                            <span class="admin-avatar">
                                A
                            </span>

                            <span class="d-none d-md-inline">
                                Admin
                            </span>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person me-2"></i>
                                    Profil
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>
        </nav>
        {{-- ================= SIDEBAR ================= --}}
        <aside class="app-sidebar travelin-sidebar shadow-none">

            {{-- ================= BRAND ================= --}}
            <div class="sidebar-brand travelin-brand">

                <a href="#" class="brand-link text-decoration-none">

                    <div class="travelin-brand-icon">
                        <i class="bi bi-bus-front-fill"></i>
                    </div>

                    <div class="travelin-brand-text">
                        <span>TRAVEL</span><strong>IN</strong>
                    </div>

                </a>

            </div>


            {{-- ================= SIDEBAR MENU ================= --}}
            <div class="sidebar-wrapper">

                <nav class="travelin-nav">

                    <ul class="nav sidebar-menu flex-column" role="menu">


                        {{-- ================= DASHBOARD ================= --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link travelin-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                                <i class="nav-icon bi bi-grid-1x2-fill"></i>

                                <p>Dashboard</p>

                            </a>
                        </li>


                        {{-- ================= MANAJEMEN ================= --}}
                        <li class="nav-header travelin-header">
                            <span>Manajemen</span>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('admin.pt.index') }}"
                                class="nav-link travelin-menu-link {{ request()->routeIs('admin.pt.*') ? 'active' : '' }}">

                                <i class="nav-icon bi bi-building"></i>

                                <p>PT Travel</p>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-people"></i>

                                <p>Pengguna</p>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-car-front-fill"></i>

                                <p>Kendaraan</p>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-person-badge"></i>

                                <p>Sopir</p>

                            </a>
                        </li>


                        {{-- ================= OPERASIONAL ================= --}}
                        <li class="nav-header travelin-header">
                            <span>Operasional</span>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-signpost-2"></i>

                                <p>Perjalanan</p>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-ticket-perforated"></i>

                                <p>Booking</p>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-credit-card"></i>

                                <p>Pembayaran</p>

                            </a>
                        </li>


                        {{-- ================= LAPORAN ================= --}}
                        <li class="nav-header travelin-header">
                            <span>Laporan</span>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-bar-chart-line"></i>

                                <p>Laporan</p>

                            </a>
                        </li>


                        {{-- ================= SISTEM ================= --}}
                        <li class="nav-header travelin-header">
                            <span>Sistem</span>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link travelin-menu-link">

                                <i class="nav-icon bi bi-gear"></i>

                                <p>Pengaturan</p>

                            </a>
                        </li>
                        {{-- ================= LOGOUT ================= --}}
                        <li class="nav-header travelin-header">
                            <span>Akun</span>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                    class="nav-link travelin-menu-link text-danger border-0 bg-transparent w-100 text-start">

                                    <i class="nav-icon bi bi-box-arrow-right"></i>

                                    <p>Logout</p>

                                </button>
                            </form>
                        </li>

                    </ul>

                </nav>

            </div>

        </aside>

        {{-- ================= MAIN CONTENT ================= --}}
        <main class="app-main">

            {{-- Content Header --}}
            <div class="app-content-header">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-6">
                            <h3 class="mb-0">
                                @yield('page-title', 'Dashboard')
                            </h3>
                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-end">

                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>

                                <li class="breadcrumb-item active">
                                    @yield('page-title', 'Dashboard')
                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Page Content --}}
            <div class="app-content">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

        </main>


        {{-- ================= FOOTER ================= --}}
        <footer class="app-footer">

            <div class="float-end d-none d-sm-inline">
                Travelin
            </div>

            <strong>
                © 2026 Travelin.
            </strong>

            All rights reserved.

        </footer>

    </div>

</body>

</html>