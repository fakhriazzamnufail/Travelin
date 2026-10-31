@extends('layouts.pt')

@section('content')


<style>
    /* =========================================
       TRAVELIN - JADWAL DASHBOARD
       High Contrast UI
    ========================================= */

    .jadwal-page {
        --primary: #1749b8;
        --primary-hover: #103b9c;
        --dark: #172b4d;
        --text: #26364d;
        --muted: #53647b;
        --border: #dce3ed;
        --surface: #ffffff;
        --surface-soft: #f3f6fb;

        color: var(--text) !important;
        font-size: 14px;
    }

    /* GENERAL TEXT */

    .jadwal-page h1,
    .jadwal-page h2,
    .jadwal-page h3,
    .jadwal-page h4,
    .jadwal-page h5,
    .jadwal-page h6 {
        color: var(--dark) !important;
    }

    .jadwal-page p,
    .jadwal-page span,
    .jadwal-page div {
        text-shadow: none;
    }

    .jadwal-page .text-muted {
        color: var(--muted) !important;
    }

    .jadwal-page .page-heading {
        color: var(--dark) !important;
        font-weight: 800;
        letter-spacing: -0.6px;
    }

    .jadwal-page .page-subtitle {
        color: var(--muted) !important;
        font-size: 14px;
    }

    /* BUTTON */

    .jadwal-page .btn-primary {
        background: var(--primary) !important;
        border: 1px solid var(--primary) !important;
        color: #ffffff !important;
        font-weight: 600;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(23, 73, 184, .16);
    }

    .jadwal-page .btn-primary:hover {
        background: var(--primary-hover) !important;
        border-color: var(--primary-hover) !important;
        color: #ffffff !important;
    }

    .jadwal-page .btn-light {
        background: #f1f4f9 !important;
        color: #26364d !important;
        border-color: #d5deea !important;
    }

    /* SUMMARY CARD */

    .jadwal-page .summary-card {
        background: #ffffff !important;
        border: 1px solid var(--border);
        border-radius: 13px;
        padding: 21px;
        height: 100%;
        box-shadow: 0 3px 12px rgba(23, 43, 77, .035);
        transition: .2s ease;
    }

    .jadwal-page .summary-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(23, 43, 77, .09);
    }

    .jadwal-page .summary-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .jadwal-page .summary-label {
        color: #53647b !important;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .jadwal-page .summary-value {
        color: #172b4d !important;
        font-size: 26px;
        font-weight: 800;
        line-height: 1.2;
    }

    /* COMPANY INFORMATION */

    .jadwal-page .company-label {
        color: #53647b !important;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .7px;
    }

    .jadwal-page .company-name {
        color: #172b4d !important;
        font-size: 16px;
        font-weight: 800;
    }

    /* CONTENT CARD */

    .jadwal-page .content-card {
        background: #ffffff !important;
        border: 1px solid var(--border);
        border-radius: 13px;
        overflow: hidden;
        box-shadow: 0 3px 14px rgba(26, 45, 78, .045);
    }

    .jadwal-page .content-card-header {
        background: #ffffff !important;
        border-bottom: 1px solid var(--border);
        padding: 20px 23px;
    }

    /* TABLE */

    .jadwal-page .table {
        background: #ffffff !important;
        margin-bottom: 0;
        color: #26364d !important;
    }

    .jadwal-page .table thead th {
        background: #eaf0f8 !important;
        color: #263c5a !important;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 17px 15px;
        border-top: 0 !important;
        border-bottom: 1px solid #d5dfed !important;
        white-space: nowrap;
    }

    .jadwal-page .table tbody tr {
        background: #ffffff !important;
    }

    .jadwal-page .table tbody td {
        color: #26364d !important;
        background: #ffffff !important;
        padding: 17px 15px;
        border-color: #e6ebf2 !important;
        vertical-align: middle;
        font-size: 13px;
    }

    .jadwal-page .table tbody tr:hover td {
        background: #f3f7fd !important;
    }

    .jadwal-page .route-point {
        color: #172b4d !important;
        font-weight: 750;
        font-size: 13px;
    }

    .jadwal-page .route-destination {
        color: #53647b !important;
        font-size: 12px;
    }

    .jadwal-page .detail-primary {
        color: #26364d !important;
        font-weight: 700;
    }

    .jadwal-page .detail-secondary {
        color: #53647b !important;
        font-size: 12px;
        margin-top: 4px;
    }

    /* STATUS BADGES */

    .jadwal-page .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .jadwal-page .status-aktif {
        color: #12643b !important;
        background: #d9f3e3 !important;
    }

    .jadwal-page .status-nonaktif {
        color: #39485d !important;
        background: #e6ebf2 !important;
    }

    .jadwal-page .status-dibatalkan {
        color: #a51e28 !important;
        background: #ffe0e2 !important;
    }

    .jadwal-page .status-selesai {
        color: #1749a1 !important;
        background: #dce9ff !important;
    }

    /* ACTION BUTTONS */

    .jadwal-page .action-btn {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        padding: 0;
        background: #ffffff !important;
    }

    .jadwal-page .btn-outline-primary {
        color: #1749b8 !important;
        border-color: #1749b8 !important;
    }

    .jadwal-page .btn-outline-primary:hover {
        background: #1749b8 !important;
        color: #ffffff !important;
    }

    .jadwal-page .btn-outline-danger {
        color: #b4232e !important;
        border-color: #b4232e !important;
    }

    .jadwal-page .btn-outline-danger:hover {
        background: #b4232e !important;
        color: #ffffff !important;
    }

    /* PAGINATION */

    .jadwal-page .pagination {
        margin-bottom: 0;
        gap: 4px;
    }

    .jadwal-page .page-link {
        color: #1749a1 !important;
        background: #ffffff !important;
        border: 1px solid #d5dfed !important;
        border-radius: 6px !important;
        font-weight: 600;
    }

    .jadwal-page .page-link:hover {
        background: #eaf0ff !important;
        color: #103b9c !important;
    }

    .jadwal-page .page-item.active .page-link {
        background: #1749b8 !important;
        border-color: #1749b8 !important;
        color: #ffffff !important;
    }

    .jadwal-page .page-item.disabled .page-link {
        background: #f1f4f8 !important;
        color: #75839a !important;
    }

    /* EMPTY STATE */

    .jadwal-page .empty-state {
        background: #ffffff !important;
        padding: 65px 20px;
        text-align: center;
    }

    .jadwal-page .empty-icon {
        width: 76px;
        height: 76px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e5edff !important;
        color: #1749b8 !important;
        border-radius: 22px;
        font-size: 32px;
    }

    /* INFORMATION BOX */

    .jadwal-page .information-box {
        background: #eaf1ff !important;
        border: 1px solid #c8d8f5 !important;
        border-radius: 9px;
        padding: 16px;
    }

    .jadwal-page .information-box,
    .jadwal-page .information-box p,
    .jadwal-page .information-box div {
        color: #243d65 !important;
    }

    /* ALERT */

    .jadwal-page .alert-success {
        background: #e1f5e8 !important;
        border: 1px solid #b8e5c7 !important;
        color: #155b35 !important;
    }

    .jadwal-page .alert-danger {
        background: #ffebeb !important;
        border: 1px solid #f2c5c5 !important;
        color: #92252c !important;
    }

    /* RESPONSIVE */

    @media (max-width: 767px) {
        .jadwal-page .page-heading {
            font-size: 23px;
        }

        .jadwal-page .summary-card {
            padding: 16px;
        }

        .jadwal-page .summary-value {
            font-size: 22px;
        }

        .jadwal-page .content-card-header {
            padding: 17px;
        }

        .jadwal-page .table tbody td {
            padding: 14px 12px;
        }
    }
</style>


<div class="container-fluid jadwal-page">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div class="mb-3 mb-md-0">
            <div class="d-flex align-items-center mb-2">
                <span class="text-primary small fw-semibold">
                    <i class="bi bi-grid-1x2 me-1"></i>
                    DASHBOARD PT
                </span>
                <span class="text-muted mx-2">/</span>
                <span class="text-muted small">Manajemen Jadwal</span>
            </div>

            <h1 class="page-heading h3 mb-2">
                Manajemen Jadwal
            </h1>

            <p class="page-subtitle mb-0">
                Kelola perjalanan dan jadwal keberangkatan perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('pt.jadwal.create') }}" class="btn btn-primary px-4 py-2">
            <i class="bi bi-plus-lg me-2"></i>
            Tambah Jadwal
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm">
        <i class="bi bi-exclamation-circle-fill me-2"></i>
        {{ session('error') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- IDENTITAS PERUSAHAAN --}}
    <div class="summary-card mb-4">
        <div class="d-flex align-items-center">
            <div class="summary-icon me-3" style="background:#edf3ff;color:#2457d6;">
                <i class="bi bi-building"></i>
            </div>

            <div>
                <div class="company-label mb-1">
                    Perusahaan Terdaftar
                </div>

                <div class="company-name">
                    {{ $dataPT->nm_pt }}
                </div>
            </div>

            <div class="ms-auto d-none d-md-block">
                <span class="status-badge status-aktif">
                    <i class="bi bi-shield-check"></i>
                    Perusahaan Terverifikasi
                </span>
            </div>
        </div>
    </div>

    {{-- RINGKASAN --}}
    <div class="row mb-4">

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="summary-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="summary-label">
                            Total Jadwal
                        </div>

                        <div class="summary-value">
                            {{ $jadwal->total() }}
                        </div>

                        <div class="detail-secondary">
                            Seluruh jadwal terdaftar
                        </div>
                    </div>

                    <div class="summary-icon" style="background:#edf3ff;color:#2457d6;">
                        <i class="bi bi-calendar-week"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="summary-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="summary-label">
                            Jadwal Ditampilkan
                        </div>

                        <div class="summary-value">
                            {{ $jadwal->count() }}
                        </div>

                        <div class="detail-secondary">
                            Pada halaman ini
                        </div>
                    </div>

                    <div class="summary-icon" style="background:#e9f8ef;color:#16834c;">
                        <i class="bi bi-list-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="summary-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="summary-label">
                            Status Pengelolaan
                        </div>

                        <div class="summary-value" style="font-size:21px;">
                            Aktif
                        </div>

                        <div class="detail-secondary">
                            Modul manajemen jadwal
                        </div>
                    </div>

                    <div class="summary-icon" style="background:#fff5e8;color:#d58a22;">
                        <i class="bi bi-activity"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- DAFTAR JADWAL --}}
    <div class="content-card mb-4">

        <div class="content-card-header">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1 fw-bold" style="color:#172b4d;font-size:16px;">
                        Daftar Keberangkatan
                    </h5>

                    <p class="text-muted small mb-0">
                        Informasi rute, armada, driver, dan harga perjalanan.
                    </p>
                </div>

                <div class="mt-3 mt-md-0">
                    <span class="badge bg-light text-secondary border px-3 py-2">
                        <i class="bi bi-database me-1"></i>
                        {{ $jadwal->total() }} Data
                    </span>
                </div>
            </div>
        </div>

        @if($jadwal->count() > 0)

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th class="ps-4">NO</th>
                        <th>RUTE PERJALANAN</th>
                        <th>KEBERANGKATAN</th>
                        <th>KENDARAAN</th>
                        <th>DRIVER</th>
                        <th>HARGA TIKET</th>
                        <th>STATUS</th>
                        <th class="text-center pe-4">AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($jadwal as $item)

                    @php
                    $statusClass = [
                    'aktif' => 'status-aktif',
                    'nonaktif' => 'status-nonaktif',
                    'dibatalkan' => 'status-dibatalkan',
                    'selesai' => 'status-selesai',
                    ];

                    $statusIcon = [
                    'aktif' => 'bi-check-circle-fill',
                    'nonaktif' => 'bi-pause-circle-fill',
                    'dibatalkan' => 'bi-x-circle-fill',
                    'selesai' => 'bi-check2-all',
                    ];
                    @endphp

                    <tr>

                        {{-- NOMOR --}}
                        <td class="ps-4">
                            <span class="text-muted fw-semibold">
                                {{ $jadwal->firstItem() + $loop->index }}
                            </span>
                        </td>

                        {{-- RUTE --}}
                        <td>
                            <div class="d-flex align-items-start">
                                <div class="me-2 mt-1" style="color:#2457d6;">
                                    <i class="bi bi-signpost-2 fs-5"></i>
                                </div>

                                <div>
                                    <div class="route-point">
                                        {{ $item->rute->kota_asal ?? 'Tidak tersedia' }}
                                    </div>

                                    <div class="route-destination my-1">
                                        <i class="bi bi-arrow-down me-1"></i>
                                        {{ $item->rute->kota_tujuan ?? 'Tidak tersedia' }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- TANGGAL DAN JAM --}}
                        <td>
                            <div class="detail-primary">
                                <i class="bi bi-calendar3 text-primary me-1"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal_berangkat)->translatedFormat('d M Y') }}
                            </div>

                            <div class="detail-secondary">
                                <i class="bi bi-clock me-1"></i>
                                {{ substr($item->jam_berangkat, 0, 5) }} WIB
                            </div>
                        </td>

                        {{-- KENDARAAN --}}
                        <td>
                            <div class="detail-primary">
                                {{ $item->kendaraan->merk ?? '-' }}
                            </div>

                            <div class="detail-secondary">
                                <i class="bi bi-car-front me-1"></i>
                                {{ $item->kendaraan->no_polisi ?? 'Tidak tersedia' }}
                            </div>
                        </td>

                        {{-- DRIVER --}}
                        <td>
                            <div class="detail-primary">
                                {{ $item->driver->nm_driver ?? 'Belum tersedia' }}
                            </div>
                        </td>

                        {{-- HARGA --}}
                        <td>
                            <div class="detail-primary text-nowrap">
                                Rp{{ number_format((float) $item->harga, 0, ',', '.') }}
                            </div>

                            <div class="detail-secondary">
                                Per penumpang
                            </div>
                        </td>

                        {{-- STATUS --}}
                        <td>
                            <span class="status-badge {{ $statusClass[$item->status] ?? 'status-nonaktif' }}">
                                <i class="bi {{ $statusIcon[$item->status] ?? 'bi-question-circle' }}"></i>
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('pt.jadwal.edit', $item->id_jadwal) }}"
                                    class="btn btn-outline-primary action-btn" title="Edit jadwal">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('pt.jadwal.destroy', $item->id_jadwal) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger action-btn"
                                        title="Hapus jadwal">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- FOOTER DAN PAGINATION --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center p-3 border-top">

            <div class="text-muted small mb-2 mb-md-0">
                Menampilkan
                <strong>{{ $jadwal->firstItem() }}</strong>
                sampai
                <strong>{{ $jadwal->lastItem() }}</strong>
                dari
                <strong>{{ $jadwal->total() }}</strong>
                jadwal
            </div>

            <div>
                {{ $jadwal->links('pagination::bootstrap-5') }}
            </div>

        </div>

        @else

        {{-- EMPTY STATE --}}
        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-calendar2-x"></i>
            </div>

            <h5 class="fw-bold mb-2" style="color:#172b4d;">
                Belum Ada Jadwal Keberangkatan
            </h5>

            <p class="text-muted small mb-4" style="max-width:420px;margin:auto;">
                Anda belum menambahkan jadwal perjalanan.
                Mulai buat jadwal agar perjalanan perusahaan dapat dikelola.
            </p>

            <a href="{{ route('pt.jadwal.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-plus-lg me-2"></i>
                Tambahkan Jadwal Pertama
            </a>

        </div>

        @endif

    </div>

    {{-- INFORMASI --}}
    <div class="information-box d-flex align-items-start">
        <i class="bi bi-info-circle-fill text-primary me-3 mt-1"></i>

        <div>
            <div class="fw-bold mb-1">
                Informasi Manajemen Jadwal
            </div>

            <p class="small mb-0">
                Pastikan informasi rute, kendaraan, driver, tanggal,
                dan jam keberangkatan sudah benar sebelum jadwal digunakan
                untuk pemesanan tiket.
            </p>
        </div>
    </div>

</div>

@endsection