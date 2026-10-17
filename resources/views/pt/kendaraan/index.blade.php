@extends('layouts.pt')

@section('title', 'Kendaraan')

@section('page-title', 'Kendaraan')

@section('content')

<div class="container-fluid">

    {{-- Pesan sukses --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert">
        </button>
    </div>
    @endif


    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Daftar Kendaraan
            </h4>

            <p class="text-muted mb-0">
                Kelola kendaraan milik {{ $dataPT->nm_pt }}.
            </p>
        </div>

        <a href="{{ route('pt.kendaraan.create') }}" class="btn btn-primary" style="color: #ffffff !important;">

            <i class="bi bi-plus-lg me-1"></i>
            Tambah Kendaraan

        </a>

    </div>


    {{-- Tabel kendaraan --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>No. Polisi</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Warna</th>
                            <th>Kapasitas</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($dataKendaraan as $kendaraan)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <span class="fw-semibold">
                                    {{ $kendaraan->no_polisi }}
                                </span>
                            </td>

                            <td>
                                {{ $kendaraan->merk }}
                            </td>

                            <td>
                                {{ $kendaraan->tipe }}
                            </td>

                            <td>
                                {{ $kendaraan->warna }}
                            </td>

                            <td>
                                {{ $kendaraan->kapasitas }} kursi
                            </td>

                            <td>
                                {{ $kendaraan->tahun }}
                            </td>

                            <td>

                                @if($kendaraan->status === 'aktif')

                                <span class="badge bg-success">
                                    Aktif
                                </span>

                                @else

                                <span class="badge bg-secondary">
                                    Nonaktif
                                </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('pt.kendaraan.edit', $kendaraan->id_kendaraan) }}"
                                    class="btn btn-sm btn-outline-primary me-1" title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>


                                <form action="{{ route('pt.kendaraan.destroy', $kendaraan->id_kendaraan) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9" class="text-center py-5">

                                <div class="text-muted">

                                    <i class="bi bi-car-front fs-1 d-block mb-3"></i>

                                    <h6 class="fw-semibold">
                                        Belum Ada Kendaraan
                                    </h6>

                                    <p class="mb-3">
                                        PT Anda belum memiliki kendaraan.
                                    </p>

                                    <a href="{{ route('pt.kendaraan.create') }}" class="btn btn-primary"
                                        style="color: #ffffff !important;">

                                        <i class="bi bi-plus-lg me-1"></i>
                                        Tambah Kendaraan

                                    </a>

                                </div>

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