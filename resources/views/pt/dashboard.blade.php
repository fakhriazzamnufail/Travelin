@extends('layouts.pt')

@section('title', 'Dashboard PT')

@section('page-title', 'Dashboard PT')

@section('content')

<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="mb-4">

        <h4 class="fw-bold mb-1">
            Selamat Datang, {{ $dataPT->nm_pt }}
        </h4>

        <p class="text-muted mb-0">
            Kelola operasional perusahaan travel Anda di Travelin.
        </p>

    </div>


    {{-- ================= INFORMASI PERUSAHAAN ================= --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Perusahaan Travel
                    </small>

                    <h5 class="fw-bold mb-1">
                        {{ $dataPT->nm_pt }}
                    </h5>

                    <small class="text-muted">
                        {{ $dataPT->alamat }}
                    </small>

                </div>

                <div>

                    <span class="badge bg-success px-3 py-2">
                        <i class="bi bi-check-circle me-1"></i>
                        PT Aktif
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= STATISTIK PT ================= --}}
    <div class="row g-3 mb-4">

        {{-- Kendaraan --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Kendaraan
                            </p>

                            <h2 class="fw-bold mb-0">{{ $jumlahKendaraan }}</h2>

                            <small class="text-muted">
                                kendaraan terdaftar
                            </small>

                        </div>

                        <div class="fs-1 text-primary">
                            <i class="bi bi-car-front"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Driver --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Driver
                            </p>

                            <h2 class="fw-bold mb-0">{{ $jumlahDriver }}</h2>

                            <small class="text-muted">
                                driver terdaftar
                            </small>

                        </div>

                        <div class="fs-1 text-success">
                            <i class="bi bi-person-badge"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Perjalanan --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Perjalanan
                            </p>

                            <h2 class="fw-bold mb-0">{{ $jumlahPerjalanan }}</h2>

                            <small class="text-muted">
                                perjalanan tersedia
                            </small>

                        </div>

                        <div class="fs-1 text-warning">
                            <i class="bi bi-signpost-2"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= MENU OPERASIONAL ================= --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white border-0 py-3">

            <h6 class="fw-bold mb-0">
                Operasional Travel
            </h6>

            <small class="text-muted">
                Kelola kebutuhan operasional perusahaan Anda.
            </small>

        </div>


        <div class="card-body">

            <div class="row g-3">


                {{-- Kendaraan --}}
                <div class="col-md-4">

                    <a href="{{ route('pt.kendaraan.index') }}"
                       class="text-decoration-none">

                        <div class="border rounded p-4 h-100">

                            <div class="fs-1 text-primary mb-3">
                                <i class="bi bi-car-front"></i>
                            </div>

                            <h6 class="fw-bold text-dark">
                                Kendaraan
                            </h6>

                            <p class="text-muted small mb-0">
                                Tambahkan dan kelola kendaraan
                                yang digunakan untuk perjalanan.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- Driver --}}
                <div class="col-md-4">

                    <a href="#"
                       class="text-decoration-none">

                        <div class="border rounded p-4 h-100">

                            <div class="fs-1 text-success mb-3">
                                <i class="bi bi-person-badge"></i>
                            </div>

                            <h6 class="fw-bold text-dark">
                                Driver
                            </h6>

                            <p class="text-muted small mb-0">
                                Kelola driver yang bekerja
                                pada perusahaan travel Anda.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- Perjalanan --}}
                <div class="col-md-4">

                    <a href="#"
                       class="text-decoration-none">

                        <div class="border rounded p-4 h-100">

                            <div class="fs-1 text-warning mb-3">
                                <i class="bi bi-signpost-2"></i>
                            </div>

                            <h6 class="fw-bold text-dark">
                                Perjalanan
                            </h6>

                            <p class="text-muted small mb-0">
                                Atur rute, jadwal, kendaraan,
                                dan driver perjalanan.
                            </p>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= BOOKING ================= --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="fw-bold mb-1">
                        Booking Terbaru
                    </h6>

                    <small class="text-muted">
                        Pesanan perjalanan dari pelanggan.
                    </small>

                </div>

                <span class="badge bg-light text-dark">
                    0 Booking
                </span>

            </div>

        </div>


        <div class="card-body text-center py-5">

            <i class="bi bi-calendar2-check fs-1 text-muted"></i>

            <h6 class="fw-semibold mt-3">
                Belum ada booking
            </h6>

            <p class="text-muted mb-0">
                Booking pelanggan akan muncul di sini.
            </p>

        </div>

    </div>

</div>

@endsection