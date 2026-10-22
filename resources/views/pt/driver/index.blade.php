
@extends('layouts.pt')

@section('content')
<style>
    .driver-page {
        --driver-primary: #4338ca;
        --driver-primary-light: #eef2ff;
        --driver-text: #172033;
        --driver-muted: #718096;
        --driver-border: #e8edf4;
        color: var(--driver-text);
        padding-bottom: 1.5rem;
    }

    .driver-page .page-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .driver-page .breadcrumb {
        margin-bottom: .65rem;
        font-size: .8rem;
    }

    .driver-page .breadcrumb-item a {
        color: var(--driver-muted);
        text-decoration: none;
    }

    .driver-page .page-title {
        font-size: clamp(1.45rem, 2vw, 1.9rem);
        font-weight: 750;
        letter-spacing: -.045em;
        margin-bottom: .45rem;
    }

    .driver-page .page-description {
        color: var(--driver-muted);
        font-size: .92rem;
        margin-bottom: 0;
    }

    .driver-page .btn-add-driver {
        background: var(--driver-primary);
        border: 1px solid var(--driver-primary);
        color: #fff;
        border-radius: 10px;
        padding: .75rem 1rem;
        font-size: .875rem;
        font-weight: 600;
        box-shadow: 0 5px 12px rgba(67, 56, 202, .15);
        transition: .2s ease;
    }

    .driver-page .btn-add-driver:hover {
        background: #3730a3;
        border-color: #3730a3;
        color: #fff;
        transform: translateY(-1px);
    }

    .driver-page .stat-card {
        height: 100%;
        background: #fff;
        border: 1px solid var(--driver-border);
        border-radius: 14px;
        padding: 1.15rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: box-shadow .2s ease, transform .2s ease;
    }

    .driver-page .stat-card:hover {
        box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
        transform: translateY(-2px);
    }

    .driver-page .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.25rem;
    }

    .driver-page .stat-icon.total {
        background: #eef2ff;
        color: #4338ca;
    }

    .driver-page .stat-icon.active {
        background: #dcfce7;
        color: #15803d;
    }

    .driver-page .stat-icon.inactive {
        background: #f1f5f9;
        color: #64748b;
    }

    .driver-page .stat-label {
        font-size: .79rem;
        color: var(--driver-muted);
        margin-bottom: .3rem;
    }

    .driver-page .stat-number {
        font-size: 1.65rem;
        line-height: 1.2;
        font-weight: 750;
        letter-spacing: -.04em;
    }

    .driver-page .driver-card {
        border: 1px solid var(--driver-border);
        border-radius: 15px;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .035);
    }

    .driver-page .driver-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 1.25rem 1.35rem;
        border-bottom: 1px solid var(--driver-border);
    }

    .driver-page .section-title {
        font-size: 1rem;
        font-weight: 700;
        margin: 0 0 .25rem;
    }

    .driver-page .section-description {
        color: var(--driver-muted);
        font-size: .8rem;
        margin: 0;
    }

    .driver-page .search-control {
        position: relative;
        min-width: 250px;
    }

    .driver-page .search-control > i {
        position: absolute;
        top: 50%;
        left: 13px;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
    }

    .driver-page .search-control input {
        width: 100%;
        min-height: 42px;
        padding: .65rem .8rem .65rem 2.35rem;
        border: 1px solid #dfe5ee;
        border-radius: 9px;
        font-size: .83rem;
        background: #fff;
        color: var(--driver-text);
    }

    .driver-page .search-control input:focus,
    .driver-page .filter-select:focus {
        outline: none;
        border-color: #818cf8;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
    }

    .driver-page .filter-select {
        min-height: 42px;
        padding: .6rem 2rem .6rem .8rem;
        border: 1px solid #dfe5ee;
        border-radius: 9px;
        font-size: .83rem;
        color: #334155;
        background-color: #fff;
    }

    .driver-page .table {
        color: #334155;
        font-size: .84rem;
    }

    .driver-page .table thead th {
        background: #f8fafc;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: .045em;
        font-size: .7rem;
        font-weight: 700;
        white-space: nowrap;
        padding: .95rem 1rem;
        border-bottom: 1px solid var(--driver-border);
    }

    .driver-page .table tbody td {
        padding: 1rem;
        border-bottom: 1px solid #edf1f6;
        vertical-align: middle;
    }

    .driver-page .table tbody tr:last-child td {
        border-bottom: 0;
    }

    .driver-page .table tbody tr:hover {
        background: #fafbff;
    }

    .driver-page .driver-identity {
        display: flex;
        align-items: center;
        gap: .75rem;
        min-width: 190px;
    }

    .driver-page .driver-avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: var(--driver-primary-light);
        color: var(--driver-primary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 750;
        font-size: .95rem;
        flex-shrink: 0;
    }

    .driver-page .driver-name {
        font-weight: 650;
        color: #1e293b;
        margin-bottom: .25rem;
    }

    .driver-page .driver-email {
        font-size: .76rem;
        color: #8490a3;
        overflow-wrap: anywhere;
    }

    .driver-page .status-badge {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        border-radius: 999px;
        padding: .4rem .7rem;
        font-size: .73rem;
        font-weight: 650;
        white-space: nowrap;
    }

    .driver-page .status-badge.active {
        background: #dcfce7;
        color: #166534;
    }

    .driver-page .status-badge.inactive {
        background: #f1f5f9;
        color: #475569;
    }

    .driver-page .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .driver-page .action-group {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: .4rem;
    }

    .driver-page .btn-action {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #dbe3ef;
        border-radius: 9px;
        background: #fff;
        color: #475569;
        text-decoration: none;
        transition: .18s ease;
    }

    .driver-page .btn-action.edit:hover {
        background: #eef2ff;
        color: #4338ca;
        border-color: #c7d2fe;
    }

    .driver-page .btn-action.delete {
        color: #dc2626;
    }

    .driver-page .btn-action.delete:hover {
        background: #fef2f2;
        border-color: #fecaca;
    }

    .driver-page .empty-state {
        padding: 3.5rem 1rem;
        text-align: center;
    }

    .driver-page .empty-state-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 1rem;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef2ff;
        color: #4338ca;
        font-size: 1.7rem;
    }

    .driver-page .empty-state h3 {
        font-size: 1rem;
        font-weight: 700;
    }

    .driver-page .empty-state p {
        color: var(--driver-muted);
        font-size: .85rem;
    }

    .driver-page .table-footer {
        padding: 1rem 1.35rem;
        border-top: 1px solid var(--driver-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: .75rem;
    }

    .driver-page .table-footer .pagination {
        margin-bottom: 0;
    }

    .driver-page .pagination .page-link {
        color: #475569;
        border-color: #e2e8f0;
        border-radius: 7px;
        margin-left: 3px;
        font-size: .8rem;
    }

    .driver-page .pagination .page-item.active .page-link {
        background: var(--driver-primary);
        border-color: var(--driver-primary);
        color: #fff;
    }

    .driver-page .alert {
        border-radius: 10px;
        border-width: 1px;
        font-size: .88rem;
    }

    .driver-page .alert ul {
        padding-left: 1.2rem;
    }

    @media (max-width: 767.98px) {
        .driver-page .page-heading {
            align-items: stretch;
        }

        .driver-page .btn-add-driver {
            width: 100%;
        }

        .driver-page .driver-card-header {
            align-items: stretch;
        }

        .driver-page .search-control {
            min-width: 0;
            width: 100%;
        }

        .driver-page .filter-select {
            width: 100%;
        }

        .driver-page .table-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="container-fluid driver-page">

    {{-- Header halaman --}}
    <div class="page-heading">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('pt.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Manajemen Driver
                    </li>
                </ol>
            </nav>

            <h1 class="page-title">Manajemen Driver</h1>
            <p class="page-description">
                Kelola data pengemudi dan akun login perusahaan travel Anda.
            </p>
        </div>

        <div>
            <a href="{{ route('pt.driver.create') }}" class="btn btn-add-driver">
                <i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
                Tambah Driver
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4"
             role="alert">
            <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
            {{ session('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4"
             role="alert">
            <i class="bi bi-exclamation-circle-fill me-2" aria-hidden="true"></i>
            {{ session('error') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-4" role="alert">
            <div class="fw-semibold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"
                   aria-hidden="true"></i>
                Periksa kembali data berikut:
            </div>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Statistik halaman --}}
    @php
        $totalDriverHalaman = $dataDriver->count();
        $driverAktifHalaman = $dataDriver->where('status', 'aktif')->count();
        $driverNonaktifHalaman = $dataDriver->where('status', '!=', 'aktif')->count();
    @endphp

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="bi bi-people-fill" aria-hidden="true"></i>
                </div>
                <div>
                    <div class="stat-label">Driver di Halaman Ini</div>
                    <div class="stat-number">{{ $totalDriverHalaman }}</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="bi bi-person-check-fill" aria-hidden="true"></i>
                </div>
                <div>
                    <div class="stat-label">Driver Aktif</div>
                    <div class="stat-number">{{ $driverAktifHalaman }}</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon inactive">
                    <i class="bi bi-person-dash-fill" aria-hidden="true"></i>
                </div>
                <div>
                    <div class="stat-label">Driver Nonaktif</div>
                    <div class="stat-number">{{ $driverNonaktifHalaman }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel driver --}}
    <section class="driver-card">
        <div class="driver-card-header">
            <div>
                <h2 class="section-title">Daftar Driver</h2>
                <p class="section-description">
                    Informasi pengemudi yang terdaftar pada perusahaan Anda.
                </p>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <div class="search-control">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <input type="search"
                           id="driverSearch"
                           placeholder="Cari nama, NIK, email..."
                           aria-label="Cari driver">
                </div>

                <select id="driverStatusFilter"
                        class="filter-select"
                        aria-label="Filter status driver">
                    <option value="">Semua status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="ps-4" style="width: 65px;">No.</th>
                        <th>Nama Driver</th>
                        <th>NIK</th>
                        <th>Telepon</th>
                        <th>No. SIM</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>

                <tbody id="driverTableBody">
                    @forelse ($dataDriver as $driver)
                        <tr class="driver-row"
                            data-status="{{ strtolower($driver->status) }}"
                            data-search="{{ strtolower($driver->nm_driver . ' ' . $driver->nik . ' ' . $driver->telp . ' ' . $driver->no_sim . ' ' . ($driver->user?->email ?? '')) }}">

                            <td class="ps-4 text-muted">
                                {{ $dataDriver->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <div class="driver-identity">
                                    <div class="driver-avatar">
                                        {{ mb_strtoupper(mb_substr($driver->nm_driver, 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="driver-name">
                                            {{ $driver->nm_driver }}
                                        </div>
                                        <div class="driver-email">
                                            {{ $driver->user?->email ?? 'Email belum tersedia' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>{{ $driver->nik }}</td>
                            <td>{{ $driver->telp }}</td>
                            <td>{{ $driver->no_sim }}</td>

                            <td>
                                @if ($driver->status === 'aktif')
                                    <span class="status-badge active">
                                        <span class="status-dot"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="status-badge inactive">
                                        <span class="status-dot"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="text-end pe-4">
                                <div class="action-group">
                                    <a href="{{ route('pt.driver.edit', $driver->id_driver) }}"
                                       class="btn-action edit"
                                       title="Edit driver"
                                       aria-label="Edit driver {{ $driver->nm_driver }}">
                                        <i class="bi bi-pencil-square"
                                           aria-hidden="true"></i>
                                    </a>

                                    <form action="{{ route('pt.driver.destroy', $driver->id_driver) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus driver {{ addslashes($driver->nm_driver) }} beserta akun loginnya? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-action delete"
                                                title="Hapus driver"
                                                aria-label="Hapus driver {{ $driver->nm_driver }}">
                                            <i class="bi bi-trash3"
                                               aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr id="driverEmptyRow">
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="bi bi-people"
                                           aria-hidden="true"></i>
                                    </div>
                                    <h3>Belum ada driver</h3>
                                    <p>
                                        Tambahkan driver pertama untuk mulai mengelola
                                        pengemudi perusahaan Anda.
                                    </p>
                                    <a href="{{ route('pt.driver.create') }}"
                                       class="btn btn-add-driver mt-2">
                                        <i class="bi bi-plus-lg me-2"
                                           aria-hidden="true"></i>
                                        Tambah Driver Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    <tr id="driverNoMatchRow" style="display: none;">
                        <td colspan="7">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                </div>
                                <h3>Driver tidak ditemukan</h3>
                                <p>
                                    Coba gunakan kata kunci lain atau ubah filter status.
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($dataDriver->hasPages())
            <div class="table-footer">
                <div class="small text-muted">
                    Menampilkan
                    <strong>{{ $dataDriver->firstItem() ?? 0 }}</strong>
                    sampai
                    <strong>{{ $dataDriver->lastItem() ?? 0 }}</strong>
                    dari
                    <strong>{{ $dataDriver->total() }}</strong>
                    data driver
                </div>

                <div>
                    {{ $dataDriver->links() }}
                </div>
            </div>
        @else
            @if ($dataDriver->count() > 0)
                <div class="table-footer">
                    <div class="small text-muted">
                        Menampilkan
                        <strong>{{ $dataDriver->count() }}</strong>
                        driver pada halaman ini
                    </div>
                </div>
            @endif
        @endif
    </section>

    <div class="d-flex align-items-center gap-2 mt-3 small text-muted">
        <i class="bi bi-shield-check" aria-hidden="true"></i>
        Data driver hanya dikelola melalui akun perusahaan yang berwenang.
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('driverSearch');
    const statusFilter = document.getElementById('driverStatusFilter');
    const rows = Array.from(document.querySelectorAll('.driver-row'));
    const noMatchRow = document.getElementById('driverNoMatchRow');

    function filterDrivers() {
        const keyword = searchInput.value.trim().toLowerCase();
        const selectedStatus = statusFilter.value.toLowerCase();
        let visibleCount = 0;

        rows.forEach(function (row) {
            const searchableText = row.dataset.search || '';
            const driverStatus = row.dataset.status || '';

            const matchesSearch = searchableText.includes(keyword);
            const matchesStatus = !selectedStatus || driverStatus === selectedStatus;
            const isVisible = matchesSearch && matchesStatus;

            row.style.display = isVisible ? '' : 'none';

            if (isVisible) {
                visibleCount++;
            }
        });

        if (noMatchRow) {
            noMatchRow.style.display =
                rows.length > 0 && visibleCount === 0 ? '' : 'none';
        }
    }

    if (searchInput && statusFilter) {
        searchInput.addEventListener('input', filterDrivers);
        statusFilter.addEventListener('change', filterDrivers);
    }
});
</script>
@endsection
