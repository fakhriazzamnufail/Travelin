
@extends('layouts.pt')

@section('content')
<div class="container-fluid vk-page">

    <style>
        .vk-page {
            --vk-primary: #4f46e5;
            --vk-primary-dark: #4338ca;
            --vk-text: #172033;
            --vk-muted: #64748b;
            --vk-border: #e2e8f0;
            padding: 24px 18px 36px;
            color: var(--vk-text);
        }

        .vk-page *,
        .vk-page *::before,
        .vk-page *::after {
            box-sizing: border-box;
        }

        .vk-page .vk-heading {
            margin: 0 0 8px;
            color: var(--vk-text);
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .vk-page .vk-description {
            margin: 0;
            color: var(--vk-muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .vk-page .vk-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding: 7px 10px;
            border-radius: 7px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .09em;
        }

        .vk-page .vk-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .vk-page .vk-add-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 44px;
            padding: 11px 17px;
            border: 1px solid var(--vk-primary);
            border-radius: 9px;
            background: var(--vk-primary);
            color: #fff !important;
            font-size: 12px;
            font-weight: 750;
            text-decoration: none !important;
            white-space: nowrap;
            box-shadow: 0 5px 12px rgba(79, 70, 229, .16);
            transition: .2s ease;
        }

        .vk-page .vk-add-btn:hover {
            background: var(--vk-primary-dark);
            border-color: var(--vk-primary-dark);
            transform: translateY(-1px);
        }

        .vk-page .vk-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 23px;
        }

        .vk-page .vk-stat {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
            padding: 20px;
            border: 1px solid var(--vk-border);
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .025);
        }

        .vk-page .vk-stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 12px;
            font-size: 20px;
        }

        .vk-page .vk-icon-purple {
            background: #eef2ff;
            color: #4f46e5;
        }

        .vk-page .vk-icon-green {
            background: #ecfdf5;
            color: #047857;
        }

        .vk-page .vk-icon-gray {
            background: #f1f5f9;
            color: #475569;
        }

        .vk-page .vk-stat-label {
            margin-bottom: 5px;
            color: var(--vk-muted);
            font-size: 11px;
            font-weight: 650;
        }

        .vk-page .vk-stat-number {
            color: var(--vk-text);
            font-size: 25px;
            font-weight: 800;
            line-height: 1.2;
        }

        .vk-page .vk-card {
            overflow: hidden;
            border: 1px solid var(--vk-border);
            border-radius: 13px;
            background: #fff;
            box-shadow: 0 5px 22px rgba(15, 23, 42, .035);
        }

        .vk-page .vk-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 21px 23px;
            border-bottom: 1px solid #edf0f5;
        }

        .vk-page .vk-card-title {
            margin: 0 0 5px;
            color: var(--vk-text);
            font-size: 15px;
            font-weight: 800;
        }

        .vk-page .vk-card-subtitle {
            margin: 0;
            color: var(--vk-muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .vk-page .vk-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 16px 23px;
            border-bottom: 1px solid #edf0f5;
            background: #fcfdff;
        }

        .vk-page .vk-search {
            position: relative;
            flex: 1 1 240px;
            max-width: 380px;
        }

        .vk-page .vk-search i {
            position: absolute;
            top: 50%;
            left: 13px;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .vk-page .vk-search input,
        .vk-page .vk-filter {
            width: 100%;
            height: 41px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            background: #fff;
            color: #334155 !important;
            font-size: 12px;
            outline: none;
        }

        .vk-page .vk-search input {
            padding: 9px 12px 9px 37px;
        }

        .vk-page .vk-search input::placeholder {
            color: #94a3b8 !important;
            opacity: 1;
        }

        .vk-page .vk-filter {
            width: auto;
            min-width: 155px;
            padding: 8px 12px;
        }

        .vk-page .vk-search input:focus,
        .vk-page .vk-filter:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .09);
        }

        .vk-page .vk-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .vk-page .vk-table {
            width: 100%;
            min-width: 850px;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            color: #334155;
        }

        .vk-page .vk-table thead th {
            padding: 14px 16px;
            border-bottom: 1px solid var(--vk-border);
            background: #f8fafc;
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .055em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .vk-page .vk-table tbody td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 12px;
            vertical-align: middle;
        }

        .vk-page .vk-table tbody tr:last-child td {
            border-bottom: none;
        }

        .vk-page .vk-table tbody tr.vk-row:hover {
            background: #fafaff;
        }

        .vk-page .vk-number {
            color: #94a3b8;
            font-weight: 750;
        }

        .vk-page .vk-vehicle {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 170px;
        }

        .vk-page .vk-vehicle-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: 1px solid #e0e7ff;
            border-radius: 11px;
            background: #eef2ff;
            color: #4f46e5;
            font-size: 19px;
        }

        .vk-page .vk-plate {
            color: #172033;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .025em;
        }

        .vk-page .vk-subtext {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 10px;
        }

        .vk-page .vk-cell-main {
            color: #334155;
            font-weight: 650;
        }

        .vk-page .vk-capacity {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            background: #f8fafc;
            color: #475569;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .vk-page .vk-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .vk-page .vk-status::before {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            content: "";
        }

        .vk-page .vk-status-aktif {
            background: #ecfdf5;
            color: #047857;
        }

        .vk-page .vk-status-nonaktif {
            background: #f1f5f9;
            color: #64748b;
        }

        .vk-page .vk-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 7px;
        }

        .vk-page .vk-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 34px;
            padding: 7px 10px;
            border: 1px solid #dbe2ea;
            border-radius: 7px;
            background: #fff;
            font-size: 11px;
            font-weight: 750;
            text-decoration: none !important;
            cursor: pointer;
            transition: .15s ease;
        }

        .vk-page .vk-edit {
            color: #4338ca !important;
        }

        .vk-page .vk-edit:hover {
            border-color: #c7d2fe;
            background: #eef2ff;
        }

        .vk-page .vk-delete {
            color: #b91c1c !important;
        }

        .vk-page .vk-delete:hover {
            border-color: #fecaca;
            background: #fef2f2;
        }

        .vk-page .vk-delete-form {
            margin: 0;
        }

        .vk-page .vk-empty {
            padding: 48px 20px;
            text-align: center;
        }

        .vk-page .vk-empty-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            margin-bottom: 15px;
            border-radius: 17px;
            background: #eef2ff;
            color: #4f46e5;
            font-size: 26px;
        }

        .vk-page .vk-empty-title {
            margin-bottom: 7px;
            color: #172033;
            font-size: 16px;
            font-weight: 800;
        }

        .vk-page .vk-empty-description {
            max-width: 390px;
            margin: 0 auto 18px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.8;
        }

        .vk-page .vk-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 23px;
            border-top: 1px solid #edf0f5;
        }

        .vk-page .vk-footer-text {
            color: #64748b;
            font-size: 11px;
        }

        .vk-page .vk-no-results {
            display: none;
        }

        .vk-page .vk-alert {
            border-radius: 9px;
            font-size: 13px;
        }

        @media (max-width: 850px) {
            .vk-page .vk-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .vk-page .vk-stats .vk-stat:last-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 575px) {
            .vk-page {
                padding: 16px 5px 28px;
            }

            .vk-page .vk-header {
                align-items: stretch;
                flex-direction: column;
            }

            .vk-page .vk-heading {
                font-size: 25px;
            }

            .vk-page .vk-add-btn {
                width: 100%;
            }

            .vk-page .vk-stats {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .vk-page .vk-stats .vk-stat:last-child {
                grid-column: auto;
            }

            .vk-page .vk-stat {
                padding: 15px;
            }

            .vk-page .vk-card-header,
            .vk-page .vk-toolbar,
            .vk-page .vk-footer {
                padding-right: 15px;
                padding-left: 15px;
            }

            .vk-page .vk-search {
                max-width: none;
            }

            .vk-page .vk-filter {
                width: 100%;
            }
        }
    </style>

    @php
        /*
         * Controller mengirim Collection bernama $dataKendaraan.
         * Seluruh statistik dihitung dari Collection tersebut.
         */
        $kendaraan = $dataKendaraan;
        $totalKendaraan = $dataKendaraan->count();
        $kendaraanAktif = $dataKendaraan
            ->where('status', 'aktif')
            ->count();
        $kendaraanNonaktif = $dataKendaraan
            ->where('status', 'nonaktif')
            ->count();
    @endphp

    {{-- HEADER --}}
    <div class="vk-header">
        <div>
            <div class="vk-eyebrow">
                <i class="bi bi-truck-front"></i>
                MANAJEMEN ARMADA
            </div>

            <h1 class="vk-heading">Kendaraan</h1>

            <p class="vk-description">
                Kelola armada perusahaan untuk mendukung operasional
                perjalanan antarkota dan antarprovinsi.
            </p>
        </div>

        <a href="{{ route('pt.kendaraan.create') }}" class="vk-add-btn">
            <i class="bi bi-plus-lg"></i>
            Tambah Kendaraan
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="alert alert-success vk-alert alert-dismissible fade show mb-4"
             role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger vk-alert alert-dismissible fade show mb-4"
             role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger vk-alert mb-4" role="alert">
            <strong>Periksa kembali data kendaraan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="vk-stats">
        <div class="vk-stat">
            <div class="vk-stat-icon vk-icon-purple">
                <i class="bi bi-truck-front"></i>
            </div>
            <div>
                <div class="vk-stat-label">Total Kendaraan</div>
                <div class="vk-stat-number">{{ $totalKendaraan }}</div>
            </div>
        </div>

        <div class="vk-stat">
            <div class="vk-stat-icon vk-icon-green">
                <i class="bi bi-check-circle"></i>
            </div>
            <div>
                <div class="vk-stat-label">Kendaraan Aktif</div>
                <div class="vk-stat-number">{{ $kendaraanAktif }}</div>
            </div>
        </div>

        <div class="vk-stat">
            <div class="vk-stat-icon vk-icon-gray">
                <i class="bi bi-pause-circle"></i>
            </div>
            <div>
                <div class="vk-stat-label">Kendaraan Nonaktif</div>
                <div class="vk-stat-number">{{ $kendaraanNonaktif }}</div>
            </div>
        </div>
    </div>

    {{-- DAFTAR ARMADA --}}
    <div class="vk-card">
        <div class="vk-card-header">
            <div>
                <h2 class="vk-card-title">Daftar Armada</h2>
                <p class="vk-card-subtitle">
                    Informasi kendaraan yang terdaftar pada perusahaan Anda.
                </p>
            </div>

            <p class="vk-card-subtitle">
                <i class="bi bi-database me-1"></i>
                {{ $totalKendaraan }} kendaraan terdaftar
            </p>
        </div>

        @if ($totalKendaraan > 0)
            <div class="vk-toolbar">
                <div class="vk-search">
                    <i class="bi bi-search"></i>
                    <input type="search"
                           id="vk-search"
                           placeholder="Cari nomor polisi, merek, tipe, atau warna..."
                           aria-label="Cari kendaraan">
                </div>

                <select id="vk-filter" class="vk-filter"
                        aria-label="Filter status kendaraan">
                    <option value="">Semua status</option>
                    <option value="aktif">Kendaraan aktif</option>
                    <option value="nonaktif">Kendaraan nonaktif</option>
                </select>
            </div>

            <div class="vk-table-wrap">
                <table class="vk-table">
                    <thead>
                        <tr>
                            <th style="width:55px;">No.</th>
                            <th>Kendaraan</th>
                            <th>Warna</th>
                            <th>Kapasitas</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th style="text-align:right;">Tindakan</th>
                        </tr>
                    </thead>

                    <tbody id="vk-table-body">
                        @foreach ($dataKendaraan as $item)
                            <tr class="vk-row"
                                data-search="{{ strtolower($item->no_polisi . ' ' . $item->merk . ' ' . $item->tipe . ' ' . $item->warna . ' ' . $item->tahun) }}"
                                data-status="{{ strtolower($item->status) }}">

                                <td class="vk-number">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="vk-vehicle">
                                        <div class="vk-vehicle-icon">
                                            <i class="bi bi-truck-front"></i>
                                        </div>

                                        <div>
                                            <div class="vk-plate">
                                                {{ $item->no_polisi }}
                                            </div>
                                            <div class="vk-subtext">
                                                {{ $item->merk }} · {{ $item->tipe }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <span class="vk-cell-main">
                                        {{ $item->warna }}
                                    </span>
                                </td>

                                <td>
                                    <span class="vk-capacity">
                                        <i class="bi bi-people"></i>
                                        {{ $item->kapasitas }} kursi
                                    </span>
                                </td>

                                <td>
                                    <span class="vk-cell-main">
                                        {{ $item->tahun }}
                                    </span>
                                </td>

                                <td>
                                    @if ($item->status === 'aktif')
                                        <span class="vk-status vk-status-aktif">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="vk-status vk-status-nonaktif">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="vk-actions">
                                        <a href="{{ route('pt.kendaraan.edit', $item->id_kendaraan) }}"
                                           class="vk-action vk-edit"
                                           title="Edit kendaraan"
                                           aria-label="Edit kendaraan {{ $item->no_polisi }}">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('pt.kendaraan.destroy', $item->id_kendaraan) }}"
                                              method="POST"
                                              class="vk-delete-form"
                                              data-plate="{{ $item->no_polisi }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="vk-action vk-delete"
                                                    title="Hapus kendaraan"
                                                    aria-label="Hapus kendaraan {{ $item->no_polisi }}">
                                                <i class="bi bi-trash3"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr id="vk-no-results" class="vk-no-results">
                            <td colspan="7">
                                <div class="vk-empty">
                                    <div class="vk-empty-icon">
                                        <i class="bi bi-search"></i>
                                    </div>

                                    <div class="vk-empty-title">
                                        Kendaraan tidak ditemukan
                                    </div>

                                    <p class="vk-empty-description">
                                        Coba kata kunci lain atau ubah filter status.
                                    </p>

                                    <button type="button" id="vk-reset"
                                            class="vk-action vk-edit">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                        Reset pencarian
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="vk-footer">
                <div id="vk-count" class="vk-footer-text">
                    Menampilkan {{ $totalKendaraan }} kendaraan
                </div>
            </div>
        @else
            <div class="vk-empty">
                <div class="vk-empty-icon">
                    <i class="bi bi-truck-front"></i>
                </div>

                <div class="vk-empty-title">Belum ada kendaraan</div>

                <p class="vk-empty-description">
                    Daftarkan kendaraan perusahaan agar armada dapat dikelola
                    melalui dashboard Travelin.
                </p>

                <a href="{{ route('pt.kendaraan.create') }}" class="vk-add-btn">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Kendaraan Pertama
                </a>
            </div>
        @endif
    </div>

    <div class="mt-3" style="color:#94a3b8;font-size:11px;">
        <i class="bi bi-shield-lock me-1"></i>
        Data armada ditampilkan berdasarkan perusahaan yang sedang login.
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const search = document.getElementById('vk-search');
    const filter = document.getElementById('vk-filter');
    const rows = Array.from(document.querySelectorAll('.vk-row'));
    const emptyRow = document.getElementById('vk-no-results');
    const count = document.getElementById('vk-count');
    const reset = document.getElementById('vk-reset');

    function applyFilters() {
        const keyword = search ? search.value.trim().toLowerCase() : '';
        const status = filter ? filter.value : '';
        let visible = 0;

        rows.forEach(function (row) {
            const rowText = row.dataset.search || '';
            const rowStatus = row.dataset.status || '';

            const matchesKeyword = rowText.includes(keyword);
            const matchesStatus = !status || rowStatus === status;
            const show = matchesKeyword && matchesStatus;

            row.style.display = show ? '' : 'none';

            if (show) {
                visible++;
            }
        });

        if (emptyRow) {
            emptyRow.style.display = visible === 0 ? 'table-row' : 'none';
        }

        if (count) {
            if (keyword || status) {
                count.textContent =
                    'Menampilkan ' + visible + ' dari ' +
                    rows.length + ' kendaraan pada daftar ini';
            } else {
                count.textContent =
                    'Menampilkan {{ $totalKendaraan }} kendaraan';
            }
        }
    }

    if (search) {
        search.addEventListener('input', applyFilters);
    }

    if (filter) {
        filter.addEventListener('change', applyFilters);
    }

    if (reset) {
        reset.addEventListener('click', function () {
            if (search) search.value = '';
            if (filter) filter.value = '';

            applyFilters();

            if (search) search.focus();
        });
    }

    document.querySelectorAll('.vk-delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const plate = form.dataset.plate || 'kendaraan ini';

            const confirmed = window.confirm(
                'Apakah Anda yakin ingin menghapus kendaraan ' +
                plate + '?\n\nTindakan ini tidak dapat dibatalkan.'
            );

            if (!confirmed) {
                event.preventDefault();
            }
        });
    });
});
</script>
@endsection
