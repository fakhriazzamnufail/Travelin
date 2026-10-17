@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')

{{-- =========================================================
     WELCOME
========================================================= --}}
<div class="travelin-welcome mb-4">

    <div class="d-flex align-items-center justify-content-between">

        <div>
            <h4 class="fw-bold mb-2">
                Selamat datang di Travelin 👋
            </h4>

            <p class="mb-0">
                Kelola perjalanan, perusahaan travel, kendaraan,
                sopir, dan booking dari satu tempat.
            </p>
        </div>

        <div class="travelin-welcome-icon d-none d-md-flex">
            🚐
        </div>

    </div>

</div>


{{-- =========================================================
     STATISTIK
========================================================= --}}
<div class="row g-4 mb-4">

    {{-- PT TRAVEL --}}
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-stat-card stat-pt h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>
                        <p class="stat-label mb-2">
                            PT Travel
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahPT }}
                        </h2>

                        <small class="stat-description">
                            Perusahaan terdaftar
                        </small>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="bi bi-building"></i>
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- PENGGUNA --}}
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-stat-card stat-user h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>
                        <p class="stat-label mb-2">
                            Pengguna
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahPengguna }}
                        </h2>

                        <small class="stat-description">
                            Pengguna terdaftar
                        </small>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- KENDARAAN --}}
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-stat-card stat-car h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>
                        <p class="stat-label mb-2">
                            Kendaraan
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahKendaraan }}
                        </h2>

                        <small class="stat-description">
                            Kendaraan terdaftar
                        </small>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="bi bi-car-front-fill"></i>
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- BOOKING --}}
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-stat-card stat-booking h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>
                        <p class="stat-label mb-2">
                            Booking
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahBooking ?? 0 }}
                        </h2>

                        <small class="stat-description">
                            Total booking
                        </small>
                    </div>

                    <div class="dashboard-stat-icon">
                        <i class="bi bi-ticket-perforated-fill"></i>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


{{-- =========================================================
     PERJALANAN TERBARU
========================================================= --}}
<div class="card travelin-panel border-0 shadow-sm">

    <div class="card-body p-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h5 class="fw-bold mb-1">
                    Perjalanan Terbaru
                </h5>

                <p class="text-muted small mb-0">
                    Perjalanan yang tersedia di Travelin
                </p>
            </div>

            <a href="#" class="btn btn-outline-primary btn-sm">
                Lihat Semua
            </a>

        </div>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table travelin-table align-middle mb-0">

                <thead>
                    <tr>
                        <th>Rute</th>
                        <th>PT Travel</th>
                        <th>Keberangkatan</th>
                        <th>Kursi</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    {{-- DATA CONTOH 1 --}}
                    <tr>

                        <td>
                            <div class="fw-semibold">
                                Padang → Bukittinggi
                            </div>

                            <small class="text-muted">
                                Sumatera Barat
                            </small>
                        </td>

                        <td>
                            Travelin Express
                        </td>

                        <td>
                            <div class="fw-semibold">
                                08:00
                            </div>

                            <small class="text-muted">
                                Hari ini
                            </small>
                        </td>

                        <td>
                            <span class="fw-semibold">
                                8
                            </span>

                            <span class="text-muted">
                                / 10
                            </span>
                        </td>

                        <td>
                            <span class="badge travelin-badge-success">
                                Tersedia
                            </span>
                        </td>

                    </tr>


                    {{-- DATA CONTOH 2 --}}
                    <tr>

                        <td>
                            <div class="fw-semibold">
                                Padang → Payakumbuh
                            </div>

                            <small class="text-muted">
                                Sumatera Barat
                            </small>
                        </td>

                        <td>
                            Minang Travel
                        </td>

                        <td>
                            <div class="fw-semibold">
                                09:30
                            </div>

                            <small class="text-muted">
                                Hari ini
                            </small>
                        </td>

                        <td>
                            <span class="fw-semibold">
                                5
                            </span>

                            <span class="text-muted">
                                / 10
                            </span>
                        </td>

                        <td>
                            <span class="badge travelin-badge-success">
                                Tersedia
                            </span>
                        </td>

                    </tr>


                    {{-- DATA CONTOH 3 --}}
                    <tr>

                        <td>
                            <div class="fw-semibold">
                                Padang → Pekanbaru
                            </div>

                            <small class="text-muted">
                                Antar Provinsi
                            </small>
                        </td>

                        <td>
                            Sumbar Travel
                        </td>

                        <td>
                            <div class="fw-semibold">
                                20:00
                            </div>

                            <small class="text-muted">
                                Hari ini
                            </small>
                        </td>

                        <td>
                            <span class="fw-semibold">
                                10
                            </span>

                            <span class="text-muted">
                                / 10
                            </span>
                        </td>

                        <td>
                            <span class="badge travelin-badge-danger">
                                Penuh
                            </span>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection