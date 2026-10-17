@extends('layouts.admin')

@section('title', 'Detail PT Travel')
@section('page-title', 'Detail PT Travel')

@section('content')

<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Detail PT Travel
            </h4>

            <p class="text-muted mb-0">
                Periksa informasi perusahaan sebelum memberikan persetujuan.
            </p>

        </div>

        <a href="{{ route('admin.pt.index') }}" class="btn btn-light border">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    {{-- ================= NOTIFIKASI ================= --}}
    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert">
        </button>

    </div>

    @endif


    <div class="row g-4">

        {{-- ================= INFORMASI PERUSAHAAN ================= --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">
                        Informasi Perusahaan
                    </h6>

                </div>


                <div class="card-body">

                    <div class="row mb-4">

                        <div class="col-md-4 text-muted">
                            Nama PT
                        </div>

                        <div class="col-md-8 fw-semibold">
                            {{ $pt->nm_pt }}
                        </div>

                    </div>


                    <div class="row mb-4">

                        <div class="col-md-4 text-muted">
                            Nomor Telepon
                        </div>

                        <div class="col-md-8">
                            {{ $pt->telp }}
                        </div>

                    </div>


                    <div class="row mb-4">

                        <div class="col-md-4 text-muted">
                            Alamat
                        </div>

                        <div class="col-md-8">
                            {{ $pt->alamat }}
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-4 text-muted">
                            Tanggal Daftar
                        </div>

                        <div class="col-md-8">
                            {{ $pt->created_at?->format('d M Y H:i') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= INFORMASI AKUN ================= --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">
                        Akun Pemilik
                    </h6>

                </div>


                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted">
                            Nama
                        </small>

                        <div class="fw-semibold">
                            {{ $pt->user?->name ?? '-' }}
                        </div>

                    </div>


                    <div>

                        <small class="text-muted">
                            Email
                        </small>

                        <div class="fw-semibold">
                            {{ $pt->user?->email ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= STATUS ================= --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">
                        Status Pendaftaran
                    </h6>

                </div>


                <div class="card-body">

                    <div class="text-center mb-4">

                        @if($pt->status === 'pending')

                        <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                            Menunggu Verifikasi
                        </span>

                        @elseif($pt->status === 'aktif')

                        <span class="badge bg-success fs-6 px-3 py-2">
                            Aktif
                        </span>

                        @elseif($pt->status === 'ditolak')

                        <span class="badge bg-danger fs-6 px-3 py-2">
                            Ditolak
                        </span>

                        @endif

                    </div>


                    {{-- Tombol hanya muncul ketika pending --}}
                    @if($pt->status === 'pending')

                    <div class="d-grid gap-2">

                        {{-- Setujui --}}
                        <form action="{{ route('admin.pt.approve', $pt->id_pt) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-success w-100"
                                onclick="return confirm('Apakah kamu yakin ingin menyetujui PT ini?')">

                                <i class="bi bi-check-circle me-1"></i>
                                Setujui PT

                            </button>

                        </form>


                        {{-- Tolak --}}
                        <form action="{{ route('admin.pt.reject', $pt->id_pt) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-outline-danger w-100"
                                onclick="return confirm('Apakah kamu yakin ingin menolak PT ini?')">

                                <i class="bi bi-x-circle me-1"></i>
                                Tolak PT

                            </button>

                        </form>

                    </div>

                    @else

                    <div class="text-center">

                        @if($pt->status === 'aktif')

                        <div class="text-success mb-2">
                            <i class="bi bi-check-circle fs-3"></i>
                        </div>

                        <p class="fw-semibold text-success mb-1">
                            PT Telah Disetujui
                        </p>

                        <small class="text-muted">
                            PT Travel ini sudah aktif dan dapat menggunakan sistem Travelin.
                        </small>

                        @elseif($pt->status === 'ditolak')

                        <div class="text-danger mb-2">
                            <i class="bi bi-x-circle fs-3"></i>
                        </div>

                        <p class="fw-semibold text-danger mb-1">
                            Pendaftaran Ditolak
                        </p>

                        <small class="text-muted">
                            Pendaftaran PT Travel ini telah ditolak oleh admin.
                        </small>

                        @endif

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection