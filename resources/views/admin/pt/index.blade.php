@extends('layouts.admin')

@section('title', 'PT Travel')
@section('page-title', 'PT Travel')

@section('content')

<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="mb-4">

        <h4 class="fw-bold mb-1">
            PT Travel
        </h4>

        <p class="text-muted mb-0">
            Kelola dan verifikasi perusahaan travel yang mendaftar di Travelin.
        </p>

    </div>


    {{-- ================= NOTIFIKASI ================= --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- ================= RINGKASAN ================= --}}
    <div class="row g-3 mb-4">

        {{-- Total --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Total PT
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $dataPT->count() }}
                            </h3>

                        </div>

                        <div class="fs-2 text-primary">
                            <i class="bi bi-building"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Pending --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Menunggu Verifikasi
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $dataPT->where('status', 'pending')->count() }}
                            </h3>

                        </div>

                        <div class="fs-2 text-warning">
                            <i class="bi bi-hourglass-split"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Aktif --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                PT Aktif
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $dataPT->where('status', 'aktif')->count() }}
                            </h3>

                        </div>

                        <div class="fs-2 text-success">
                            <i class="bi bi-check-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= DAFTAR PT ================= --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <h6 class="fw-bold mb-0">
                Daftar Perusahaan Travel
            </h6>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                #
                            </th>

                            <th>
                                Nama PT
                            </th>

                            <th>
                                Pemilik
                            </th>

                            <th>
                                Telepon
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($dataPT as $pt)

                            <tr>

                                {{-- Nomor --}}
                                <td class="px-4">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Nama PT --}}
                                <td>

                                    <div class="fw-semibold">
                                        {{ $pt->nm_pt }}
                                    </div>

                                    <small class="text-muted">
                                        Terdaftar {{ $pt->created_at?->format('d M Y') }}
                                    </small>

                                </td>


                                {{-- Pemilik --}}
                                <td>

                                    @if($pt->user)

                                        {{ $pt->user->name }}

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- Telepon --}}
                                <td>
                                    {{ $pt->telp }}
                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($pt->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            Menunggu
                                        </span>

                                    @elseif($pt->status === 'aktif')

                                        <span class="badge bg-success">
                                            Aktif
                                        </span>

                                    @elseif($pt->status === 'ditolak')

                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ ucfirst($pt->status) }}
                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="text-center">

                                    <a href="{{ route('admin.pt.show', $pt->id_pt) }}"
                                       class="btn btn-sm btn-outline-primary">

                                        <i class="bi bi-eye me-1"></i>
                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="bi bi-building fs-1 text-muted"></i>

                                    <h6 class="fw-semibold mt-3">
                                        Belum ada PT Travel
                                    </h6>

                                    <p class="text-muted mb-0">
                                        Belum ada perusahaan yang mendaftar.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection