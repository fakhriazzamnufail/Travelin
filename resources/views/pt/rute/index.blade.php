
@extends('layouts.pt')

@section('content')
<div class="container-fluid travelin-rute-index">

    <style>
        .travelin-rute-index {
            --ri-primary: #2563eb;
            --ri-dark: #172033;
            --ri-text: #334155;
            --ri-muted: #64748b;
            --ri-border: #e2e8f0;
            color: var(--ri-text);
            padding: 22px 18px 40px;
        }

        .travelin-rute-index * {
            box-sizing: border-box;
        }

        .travelin-rute-index .ri-heading {
            color: var(--ri-dark);
            font-size: clamp(25px, 3vw, 32px);
            font-weight: 800;
            letter-spacing: -.7px;
            margin: 0 0 9px;
        }

        .travelin-rute-index .ri-description {
            color: var(--ri-muted);
            font-size: 14px;
            line-height: 1.7;
            margin: 0;
        }

        .travelin-rute-index .ri-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--ri-primary);
            background: #eff6ff;
            border-radius: 7px;
            padding: 7px 10px;
            margin-bottom: 12px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .08em;
        }

        .travelin-rute-index .ri-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .travelin-rute-index .ri-primary-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            min-height: 45px;
            padding: 11px 17px;
            border: 1px solid #2563eb;
            border-radius: 9px;
            background: #2563eb;
            color: #ffffff !important;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            box-shadow: 0 4px 10px rgba(37, 99, 235, .14);
            transition: .2s ease;
        }

        .travelin-rute-index .ri-primary-btn:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
        }

        .travelin-rute-index .ri-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .travelin-rute-index .ri-stat-card {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
            background: #ffffff;
            border: 1px solid var(--ri-border);
            border-radius: 13px;
            padding: 20px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .025);
        }

        .travelin-rute-index .ri-stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            flex-shrink: 0;
            font-size: 21px;
        }

        .travelin-rute-index .ri-stat-icon.blue {
            color: #2563eb;
            background: #eff6ff;
        }

        .travelin-rute-index .ri-stat-icon.green {
            color: #047857;
            background: #ecfdf5;
        }

        .travelin-rute-index .ri-stat-icon.orange {
            color: #c2410c;
            background: #fff7ed;
        }

        .travelin-rute-index .ri-stat-label {
            color: var(--ri-muted);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .travelin-rute-index .ri-stat-number {
            color: var(--ri-dark);
            font-size: 26px;
            line-height: 1.15;
            font-weight: 800;
        }

        .travelin-rute-index .ri-card {
            background: #ffffff;
            border: 1px solid var(--ri-border);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 24px rgba(15, 23, 42, .035);
        }

        .travelin-rute-index .ri-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            padding: 22px 24px;
            border-bottom: 1px solid #edf0f5;
        }

        .travelin-rute-index .ri-section-title {
            color: var(--ri-dark);
            font-size: 16px;
            font-weight: 800;
            margin: 0 0 5px;
        }

        .travelin-rute-index .ri-section-description {
            color: var(--ri-muted);
            font-size: 12px;
            line-height: 1.6;
            margin: 0;
        }

        .travelin-rute-index .ri-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 17px 24px;
            border-bottom: 1px solid #edf0f5;
            background: #fcfdff;
        }

        .travelin-rute-index .ri-search {
            position: relative;
            flex: 1 1 240px;
            max-width: 360px;
        }

        .travelin-rute-index .ri-search i {
            position: absolute;
            top: 50%;
            left: 13px;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .travelin-rute-index .ri-search input {
            width: 100%;
            height: 41px;
            padding: 9px 12px 9px 38px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            background: #ffffff;
            color: #1e293b !important;
            font-size: 13px;
            outline: none;
        }

        .travelin-rute-index .ri-search input::placeholder {
            color: #94a3b8 !important;
            opacity: 1;
        }

        .travelin-rute-index .ri-search input:focus,
        .travelin-rute-index .ri-filter:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
        }

        .travelin-rute-index .ri-filter {
            height: 41px;
            min-width: 145px;
            padding: 8px 12px;
            color: #334155;
            background: #ffffff;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        .travelin-rute-index .ri-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .travelin-rute-index .ri-table {
            width: 100%;
            min-width: 850px;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            color: var(--ri-text);
            vertical-align: middle;
        }

        .travelin-rute-index .ri-table thead th {
            padding: 14px 17px;
            color: #64748b;
            background: #f8fafc;
            border-bottom: 1px solid var(--ri-border);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .07em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .travelin-rute-index .ri-table tbody td {
            padding: 18px 17px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }

        .travelin-rute-index .ri-table tbody tr:last-child td {
            border-bottom: none;
        }

        .travelin-rute-index .ri-table tbody tr {
            transition: background .15s;
        }

        .travelin-rute-index .ri-table tbody tr:hover {
            background: #fafcff;
        }

        .travelin-rute-index .ri-route-pair {
            display: flex;
            align-items: stretch;
            gap: 11px;
            min-width: 190px;
        }

        .travelin-rute-index .ri-route-track {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 4px 0;
            flex-shrink: 0;
        }

        .travelin-rute-index .ri-route-dot {
            width: 10px;
            height: 10px;
            border: 2px solid #2563eb;
            border-radius: 50%;
            background: #ffffff;
        }

        .travelin-rute-index .ri-route-dot.destination {
            border-color: #059669;
        }

        .travelin-rute-index .ri-route-line {
            width: 2px;
            height: 17px;
            background: #cbd5e1;
            margin: 3px 0;
        }

        .travelin-rute-index .ri-route-cities {
            min-width: 0;
        }

        .travelin-rute-index .ri-city {
            color: #172033;
            font-weight: 750;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .travelin-rute-index .ri-city-caption {
            color: #94a3b8;
            font-size: 10px;
            margin: 3px 0;
        }

        .travelin-rute-index .ri-price {
            color: #047857;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .travelin-rute-index .ri-duration {
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .travelin-rute-index .ri-duration-sub {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 4px;
        }

        .travelin-rute-index .ri-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 750;
            white-space: nowrap;
        }

        .travelin-rute-index .ri-status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .travelin-rute-index .ri-status-aktif {
            color: #047857;
            background: #ecfdf5;
        }

        .travelin-rute-index .ri-status-nonaktif {
            color: #b91c1c;
            background: #fef2f2;
        }

        .travelin-rute-index .ri-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 7px;
        }

        .travelin-rute-index .ri-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 34px;
            padding: 7px 10px;
            border: 1px solid #dbe2ea;
            border-radius: 7px;
            background: #ffffff;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none !important;
            cursor: pointer;
            transition: .15s ease;
        }

        .travelin-rute-index .ri-edit {
            color: #1d4ed8 !important;
        }

        .travelin-rute-index .ri-edit:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        .travelin-rute-index .ri-delete {
            color: #b91c1c;
        }

        .travelin-rute-index .ri-delete:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        .travelin-rute-index .ri-empty {
            display: none;
            padding: 55px 20px;
            text-align: center;
        }

        .travelin-rute-index .ri-empty-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 27px;
            margin-bottom: 17px;
        }

        .travelin-rute-index .ri-empty-title {
            color: #172033;
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .travelin-rute-index .ri-empty-text {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            max-width: 400px;
            margin: 0 auto 20px;
        }

        .travelin-rute-index .ri-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 17px 24px;
            border-top: 1px solid #edf0f5;
        }

        .travelin-rute-index .ri-count {
            color: #64748b;
            font-size: 12px;
        }

        .travelin-rute-index .ri-pagination nav {
            display: flex;
            justify-content: flex-end;
        }

        .travelin-rute-index .ri-pagination p {
            margin-bottom: 0;
        }

        .travelin-rute-index .ri-pagination svg {
            width: 18px;
            height: 18px;
        }

        .travelin-rute-index .ri-pagination a,
        .travelin-rute-index .ri-pagination span {
            font-size: 12px;
        }

        .travelin-rute-index .ri-alert {
            border-radius: 10px;
            color: #1e293b;
        }

        .travelin-rute-index .ri-no-results td {
            padding: 0 !important;
        }

        @media (max-width: 900px) {
            .travelin-rute-index .ri-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .travelin-rute-index .ri-stats .ri-stat-card:last-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 575px) {
            .travelin-rute-index {
                padding: 16px 5px 28px;
            }

            .travelin-rute-index .ri-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .travelin-rute-index .ri-primary-btn {
                width: 100%;
            }

            .travelin-rute-index .ri-stats {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .travelin-rute-index .ri-stats .ri-stat-card:last-child {
                grid-column: auto;
            }

            .travelin-rute-index .ri-stat-card {
                padding: 16px;
            }

            .travelin-rute-index .ri-card-header,
            .travelin-rute-index .ri-toolbar,
            .travelin-rute-index .ri-footer {
                padding-left: 16px;
                padding-right: 16px;
            }

            .travelin-rute-index .ri-filter {
                flex: 1;
            }
        }
    </style>

    {{-- Header halaman --}}
    <div class="ri-header">
        <div>
            <div class="ri-eyebrow">
                <i class="bi bi-signpost-2"></i>
                OPERASIONAL PERUSAHAAN
            </div>

            <h1 class="ri-heading">Manajemen Rute</h1>

            <p class="ri-description">
                Kelola jalur perjalanan, harga tiket, dan estimasi waktu
                untuk layanan antarkota perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('pt.rute.create') }}" class="ri-primary-btn">
            <i class="bi bi-plus-lg"></i>
            Tambah Rute Baru
        </a>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success ri-alert alert-dismissible fade show mb-4"
             role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger ri-alert alert-dismissible fade show mb-4"
             role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger ri-alert mb-4" role="alert">
            <strong>Terjadi kesalahan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Statistik dari data pada halaman --}}
    <div class="ri-stats">
        <div class="ri-stat-card">
            <div class="ri-stat-icon blue">
                <i class="bi bi-signpost-split"></i>
            </div>
            <div>
                <div class="ri-stat-label">Total Rute</div>
                <div class="ri-stat-number">{{ $rute->total() }}</div>
            </div>
        </div>

        <div class="ri-stat-card">
            <div class="ri-stat-icon green">
                <i class="bi bi-check-circle"></i>
            </div>
            <div>
                <div class="ri-stat-label">Rute Aktif</div>
                <div class="ri-stat-number">
                    {{ (clone $rute)->getCollection()->where('status', 'aktif')->count() }}
                </div>
            </div>
        </div>

        <div class="ri-stat-card">
            <div class="ri-stat-icon orange">
                <i class="bi bi-pause-circle"></i>
            </div>
            <div>
                <div class="ri-stat-label">Rute Nonaktif</div>
                <div class="ri-stat-number">
                    {{ (clone $rute)->getCollection()->where('status', 'nonaktif')->count() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Konten tabel --}}
    <div class="ri-card">

        <div class="ri-card-header">
            <div>
                <h2 class="ri-section-title">Daftar Rute Perjalanan</h2>
                <p class="ri-section-description">
                    Informasi rute yang dikelola oleh perusahaan Anda.
                </p>
            </div>
            <div class="ri-section-description">
                <i class="bi bi-database me-1"></i>
                {{ $rute->total() }} data tersimpan
            </div>
        </div>

        {{-- Pencarian dan filter --}}
        <div class="ri-toolbar">
            <div class="ri-search">
                <i class="bi bi-search"></i>
                <input type="search"
                       id="ri-search"
                       placeholder="Cari kota asal atau tujuan..."
                       aria-label="Cari rute perjalanan">
            </div>

            <select id="ri-filter" class="ri-filter" aria-label="Filter status rute">
                <option value="">Semua status</option>
                <option value="aktif">Rute aktif</option>
                <option value="nonaktif">Rute nonaktif</option>
            </select>
        </div>

        @if ($rute->count() > 0)
            <div class="ri-table-wrap">
                <table class="ri-table">
                    <thead>
                        <tr>
                            <th style="width:55px;">No.</th>
                            <th>Rute Perjalanan</th>
                            <th>Harga Tiket</th>
                            <th>Estimasi Waktu</th>
                            <th>Status</th>
                            <th style="text-align:right;">Tindakan</th>
                        </tr>
                    </thead>

                    <tbody id="ri-table-body">
                        @foreach ($rute as $item)
                            <tr class="ri-route-row"
                                data-search="{{ strtolower($item->kota_asal . ' ' . $item->kota_tujuan) }}"
                                data-status="{{ strtolower($item->status) }}">

                                <td style="color:#94a3b8;font-weight:700;">
                                    {{ $rute->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <div class="ri-route-pair">
                                        <div class="ri-route-track">
                                            <span class="ri-route-dot"></span>
                                            <span class="ri-route-line"></span>
                                            <span class="ri-route-dot destination"></span>
                                        </div>

                                        <div class="ri-route-cities">
                                            <div class="ri-city">
                                                {{ $item->kota_asal }}
                                            </div>
                                            <div class="ri-city-caption">MENUJU</div>
                                            <div class="ri-city">
                                                {{ $item->kota_tujuan }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="ri-price">
                                        Rp {{ number_format((float) $item->harga, 0, ',', '.') }}
                                    </div>
                                    <div class="ri-duration-sub">Per penumpang</div>
                                </td>

                                <td>
                                    @php
                                        $totalMenit = (int) $item->estimasi_menit;
                                        $jumlahJam = intdiv($totalMenit, 60);
                                        $sisaMenit = $totalMenit % 60;
                                    @endphp

                                    <div class="ri-duration">
                                        @if ($jumlahJam > 0)
                                            {{ $jumlahJam }} jam
                                        @endif
                                        @if ($sisaMenit > 0)
                                            {{ $sisaMenit }} menit
                                        @endif
                                        @if ($totalMenit < 1)
                                            —
                                        @endif
                                    </div>
                                    <div class="ri-duration-sub">
                                        <i class="bi bi-clock me-1"></i>
                                        Estimasi perjalanan
                                    </div>
                                </td>

                                <td>
                                    @if ($item->status === 'aktif')
                                        <span class="ri-status ri-status-aktif">Aktif</span>
                                    @else
                                        <span class="ri-status ri-status-nonaktif">Nonaktif</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="ri-actions">
                                        <a href="{{ route('pt.rute.edit', $item->id_rute) }}"
                                           class="ri-action-btn ri-edit"
                                           title="Edit rute"
                                           aria-label="Edit rute {{ $item->kota_asal }} ke {{ $item->kota_tujuan }}">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('pt.rute.destroy', $item->id_rute) }}"
                                              method="POST"
                                              class="ri-delete-form"
                                              data-route-name="{{ $item->kota_asal }} ke {{ $item->kota_tujuan }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="ri-action-btn ri-delete"
                                                    title="Hapus rute"
                                                    aria-label="Hapus rute {{ $item->kota_asal }} ke {{ $item->kota_tujuan }}">
                                                <i class="bi bi-trash3"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr id="ri-no-results" class="ri-no-results" style="display:none;">
                            <td colspan="6">
                                <div class="ri-empty" style="display:block;">
                                    <div class="ri-empty-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                    <div class="ri-empty-title">Rute tidak ditemukan</div>
                                    <p class="ri-empty-text">
                                        Coba gunakan kata kunci lain atau ubah filter status.
                                    </p>
                                    <button type="button" class="ri-action-btn ri-edit"
                                            id="ri-reset-search">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                        Reset pencarian
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="ri-footer">
                <div class="ri-count" id="ri-count">
                    Menampilkan {{ $rute->firstItem() ?? 0 }}–{{ $rute->lastItem() ?? 0 }}
                    dari {{ $rute->total() }} rute pada halaman ini
                </div>

                <div class="ri-pagination">
                    {{ $rute->links() }}
                </div>
            </div>
        @else
            <div class="ri-empty" style="display:block;">
                <div class="ri-empty-icon">
                    <i class="bi bi-signpost-split"></i>
                </div>
                <div class="ri-empty-title">Belum ada rute perjalanan</div>
                <p class="ri-empty-text">
                    Mulai kelola perjalanan perusahaan dengan menambahkan
                    rute pertama Anda.
                </p>
                <a href="{{ route('pt.rute.create') }}" class="ri-primary-btn">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Rute Pertama
                </a>
            </div>
        @endif
    </div>

    <div class="mt-3" style="color:#94a3b8;font-size:11px;">
        <i class="bi bi-shield-lock me-1"></i>
        Data pada halaman ini ditampilkan sesuai akses akun perusahaan Anda.
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('ri-search');
    const statusFilter = document.getElementById('ri-filter');
    const rows = Array.from(document.querySelectorAll('.ri-route-row'));
    const noResults = document.getElementById('ri-no-results');
    const countLabel = document.getElementById('ri-count');
    const resetButton = document.getElementById('ri-reset-search');

    function filterRoutes() {
        const keyword = searchInput.value.trim().toLocaleLowerCase('id-ID');
        const status = statusFilter.value;
        let visible = 0;

        rows.forEach(function (row) {
            const searchableText = row.dataset.search || '';
            const rowStatus = row.dataset.status || '';

            const matchesKeyword = searchableText.includes(keyword);
            const matchesStatus = !status || rowStatus === status;
            const show = matchesKeyword && matchesStatus;

            row.style.display = show ? '' : 'none';

            if (show) {
                visible++;
            }
        });

        if (noResults) {
            noResults.style.display = visible === 0 ? '' : 'none';
        }

        if (countLabel) {
            countLabel.textContent = keyword || status
                ? 'Menampilkan ' + visible + ' rute yang cocok pada halaman ini'
                : 'Menampilkan {{ $rute->firstItem() ?? 0 }}–{{ $rute->lastItem() ?? 0 }} dari {{ $rute->total() }} rute pada halaman ini';
        }
    }

    if (searchInput && statusFilter) {
        searchInput.addEventListener('input', filterRoutes);
        statusFilter.addEventListener('change', filterRoutes);
    }

    if (resetButton) {
        resetButton.addEventListener('click', function () {
            searchInput.value = '';
            statusFilter.value = '';
            filterRoutes();
            searchInput.focus();
        });
    }

    document.querySelectorAll('.ri-delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const routeName = form.dataset.routeName || 'rute ini';

            if (!window.confirm('Apakah Anda yakin ingin menghapus rute ' + routeName + '? Tindakan ini tidak dapat dibatalkan.')) {
                event.preventDefault();
            }
        });
    });
});
</script>
@endsection
