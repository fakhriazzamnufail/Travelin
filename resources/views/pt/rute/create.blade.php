
@extends('layouts.pt')

@section('content')
<div class="container-fluid travelin-route-create">

    <style>
        .travelin-route-create {
            --route-primary: #2563eb;
            --route-dark: #172554;
            --route-text: #1e293b;
            --route-muted: #64748b;
            --route-border: #e2e8f0;
            color: var(--route-text);
            padding: 22px 18px 40px;
        }

        .travelin-route-create * {
            box-sizing: border-box;
        }

        .travelin-route-create .route-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 24px;
            transition: color .2s;
        }

        .travelin-route-create .route-back:hover {
            color: var(--route-primary);
        }

        .travelin-route-create .route-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 28px;
        }

        .travelin-route-create .route-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--route-primary);
            background: #eff6ff;
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .08em;
            margin-bottom: 13px;
        }

        .travelin-route-create .route-title {
            color: #172033;
            font-size: clamp(25px, 3vw, 32px);
            font-weight: 800;
            letter-spacing: -.8px;
            margin: 0 0 9px;
        }

        .travelin-route-create .route-subtitle {
            color: var(--route-muted);
            font-size: 14px;
            line-height: 1.8;
            max-width: 650px;
            margin: 0;
        }

        .travelin-route-create .route-header-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            border-radius: 17px;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: var(--route-primary);
            font-size: 27px;
        }

        .travelin-route-create .route-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(270px, .8fr);
            gap: 22px;
            align-items: start;
        }

        .travelin-route-create .route-card {
            background: #ffffff;
            border: 1px solid var(--route-border);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 24px rgba(15, 23, 42, .035);
        }

        .travelin-route-create .route-card-header {
            padding: 23px 25px;
            border-bottom: 1px solid #edf0f5;
        }

        .travelin-route-create .route-section-title {
            color: #172033;
            font-size: 16px;
            font-weight: 800;
            margin: 0 0 6px;
        }

        .travelin-route-create .route-section-subtitle {
            color: var(--route-muted);
            font-size: 13px;
            margin: 0;
            line-height: 1.7;
        }

        .travelin-route-create .route-card-body {
            padding: 25px;
        }

        .travelin-route-create .route-field {
            margin-bottom: 24px;
        }

        .travelin-route-create .route-label {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .travelin-route-create .route-required {
            color: #dc2626;
        }

        .travelin-route-create .route-input-wrap {
            position: relative;
        }

        .travelin-route-create .route-input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 17px;
            pointer-events: none;
            z-index: 2;
        }

        .travelin-route-create .route-input {
            width: 100%;
            min-height: 49px;
            padding: 12px 14px 12px 44px;
            color: #1e293b !important;
            background: #ffffff !important;
            border: 1px solid #d7dee9;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .travelin-route-create .route-input::placeholder {
            color: #94a3b8 !important;
            opacity: 1;
        }

        .travelin-route-create .route-input:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .09);
        }

        .travelin-route-create .route-input.is-invalid {
            border-color: #dc2626;
        }

        .travelin-route-create .route-input-help {
            display: block;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 8px;
        }

        .travelin-route-create .route-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 7px;
        }

        .travelin-route-create .route-input-unit {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
            pointer-events: none;
        }

        .travelin-route-create .route-input.has-unit {
            padding-right: 65px;
        }

        .travelin-route-create .route-preview {
            padding: 21px;
            background: linear-gradient(135deg, #f8fbff 0%, #f1f6ff 100%);
            border: 1px solid #dbeafe;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .travelin-route-create .route-preview-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 17px;
        }

        .travelin-route-create .route-preview-line {
            display: flex;
            align-items: stretch;
            gap: 13px;
        }

        .travelin-route-create .route-preview-markers {
            width: 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-shrink: 0;
            padding-top: 4px;
        }

        .travelin-route-create .route-marker {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 3px solid #2563eb;
            background: #ffffff;
        }

        .travelin-route-create .route-marker.destination {
            border-color: #059669;
        }

        .travelin-route-create .route-marker-line {
            flex: 1;
            width: 2px;
            min-height: 25px;
            background: #cbd5e1;
            margin: 5px 0;
        }

        .travelin-route-create .route-preview-content {
            flex: 1;
            min-width: 0;
        }

        .travelin-route-create .route-preview-city {
            color: #172033;
            font-size: 15px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .travelin-route-create .route-preview-caption {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .travelin-route-create .route-preview-destination {
            padding-top: 23px;
        }

        .travelin-route-create .route-preview-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ffffff;
            color: #1d4ed8;
            border: 1px solid #dbeafe;
            border-radius: 7px;
            padding: 8px 10px;
            font-size: 11px;
            font-weight: 700;
            margin-top: 17px;
        }

        .travelin-route-create .route-sidebar {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .travelin-route-create .route-summary {
            padding: 22px;
            background: linear-gradient(145deg, #172554, #1e40af);
            border-radius: 15px;
            color: #ffffff;
            box-shadow: 0 8px 24px rgba(30, 64, 175, .14);
        }

        .travelin-route-create .route-summary-label {
            color: #bfdbfe;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .travelin-route-create .route-summary-price {
            font-size: clamp(24px, 3vw, 30px);
            font-weight: 800;
            letter-spacing: -.7px;
            overflow-wrap: anywhere;
        }

        .travelin-route-create .route-summary-caption {
            color: #dbeafe;
            font-size: 12px;
            margin-top: 5px;
        }

        .travelin-route-create .route-summary-divider {
            height: 1px;
            background: rgba(255,255,255,.18);
            margin: 20px 0;
        }

        .travelin-route-create .route-summary-meta {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .travelin-route-create .route-summary-meta-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255,255,255,.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .travelin-route-create .route-summary-meta-label {
            color: #bfdbfe;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .travelin-route-create .route-summary-meta-value {
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
        }

        .travelin-route-create .route-info-card {
            background: #ffffff;
            border: 1px solid var(--route-border);
            border-radius: 14px;
            padding: 21px;
        }

        .travelin-route-create .route-info-title {
            color: #172033;
            font-size: 14px;
            font-weight: 800;
            margin: 0 0 17px;
        }

        .travelin-route-create .route-info-item {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-bottom: 16px;
        }

        .travelin-route-create .route-info-item:last-child {
            margin-bottom: 0;
        }

        .travelin-route-create .route-info-icon {
            color: #2563eb;
            background: #eff6ff;
            border-radius: 8px;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .travelin-route-create .route-info-text {
            color: #64748b;
            font-size: 12px;
            line-height: 1.7;
        }

        .travelin-route-create .route-info-text strong {
            display: block;
            color: #334155;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .travelin-route-create .route-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 25px;
            background: #fbfcfe;
            border-top: 1px solid #edf0f5;
        }

        .travelin-route-create .route-actions-note {
            color: #64748b;
            font-size: 12px;
        }

        .travelin-route-create .route-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 10px 17px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .travelin-route-create .route-btn-secondary {
            color: #475569;
            background: #ffffff;
            border: 1px solid #cbd5e1;
        }

        .travelin-route-create .route-btn-secondary:hover {
            color: #172033;
            background: #f1f5f9;
        }

        .travelin-route-create .route-btn-primary {
            color: #ffffff;
            background: #2563eb;
            border: 1px solid #2563eb;
            box-shadow: 0 3px 8px rgba(37, 99, 235, .15);
        }

        .travelin-route-create .route-btn-primary:hover {
            color: #ffffff;
            background: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-1px);
        }

        .travelin-route-create .route-alert {
            border-radius: 10px;
        }

        @media (max-width: 991px) {
            .travelin-route-create .route-layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .travelin-route-create .route-sidebar {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .travelin-route-create .route-summary {
                grid-row: span 2;
            }
        }

        @media (max-width: 575px) {
            .travelin-route-create {
                padding: 16px 5px 28px;
            }

            .travelin-route-create .route-header-icon {
                display: none;
            }

            .travelin-route-create .route-card-header,
            .travelin-route-create .route-card-body {
                padding: 19px;
            }

            .travelin-route-create .route-sidebar {
                display: flex;
            }

            .travelin-route-create .route-actions {
                padding: 17px;
            }

            .travelin-route-create .route-actions-note {
                width: 100%;
            }

            .travelin-route-create .route-actions .route-btn {
                flex: 1;
            }
        }
    </style>

    {{-- Breadcrumb --}}
    <a href="{{ route('pt.rute.index') }}" class="route-back">
        <i class="bi bi-arrow-left"></i>
        Kembali ke daftar rute
    </a>

    {{-- Header --}}
    <div class="route-header">
        <div>
            <div class="route-eyebrow">
                <i class="bi bi-signpost-2"></i>
                MANAJEMEN PERJALANAN
            </div>

            <h1 class="route-title">Tambah Rute Baru</h1>

            <p class="route-subtitle">
                Atur perjalanan antarkota dan antarprovinsi perusahaan Anda.
                Lengkapi informasi rute, harga tiket, dan estimasi perjalanan
                sebelum menyimpan data.
            </p>
        </div>

        <div class="route-header-icon">
            <i class="bi bi-map"></i>
        </div>
    </div>

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger route-alert mb-4">
            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-circle me-2"></i>
                Data belum dapat disimpan
            </div>
            <ul class="mb-0 ps-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pt.rute.store') }}" method="POST" id="route-form">
        @csrf

        <div class="route-layout">

            {{-- Form utama --}}
            <div class="route-card">
                <div class="route-card-header">
                    <h2 class="route-section-title">
                        <i class="bi bi-pencil-square text-primary me-2"></i>
                        Detail Rute Perjalanan
                    </h2>
                    <p class="route-section-subtitle">
                        Masukkan informasi sesuai layanan perjalanan yang disediakan.
                    </p>
                </div>

                <div class="route-card-body">

                    {{-- Kota asal --}}
                    <div class="route-field">
                        <label for="kota_asal" class="route-label">
                            Kota Asal <span class="route-required">*</span>
                        </label>

                        <div class="route-input-wrap">
                            <i class="bi bi-geo-alt route-input-icon"></i>
                            <input
                                type="text"
                                id="kota_asal"
                                name="kota_asal"
                                value="{{ old('kota_asal') }}"
                                class="route-input @error('kota_asal') is-invalid @enderror"
                                placeholder="Contoh: Padang"
                                maxlength="100"
                                autocomplete="address-level2"
                                required
                            >
                        </div>

                        @error('kota_asal')
                            <div class="route-error">{{ $message }}</div>
                        @enderror

                        <small class="route-input-help">
                            Kota tempat keberangkatan dimulai.
                        </small>
                    </div>

                    {{-- Kota tujuan --}}
                    <div class="route-field">
                        <label for="kota_tujuan" class="route-label">
                            Kota Tujuan <span class="route-required">*</span>
                        </label>

                        <div class="route-input-wrap">
                            <i class="bi bi-geo-alt-fill route-input-icon"></i>
                            <input
                                type="text"
                                id="kota_tujuan"
                                name="kota_tujuan"
                                value="{{ old('kota_tujuan') }}"
                                class="route-input @error('kota_tujuan') is-invalid @enderror"
                                placeholder="Contoh: Pekanbaru"
                                maxlength="100"
                                autocomplete="address-level2"
                                required
                            >
                        </div>

                        @error('kota_tujuan')
                            <div class="route-error">{{ $message }}</div>
                        @enderror

                        <small class="route-input-help">
                            Kota tujuan harus berbeda dari kota asal.
                        </small>
                    </div>

                    {{-- Pratinjau --}}
                    <div class="route-preview">
                        <div class="route-preview-label">
                            <i class="bi bi-eye me-1"></i>
                            Pratinjau perjalanan
                        </div>

                        <div class="route-preview-line">
                            <div class="route-preview-markers">
                                <span class="route-marker"></span>
                                <span class="route-marker-line"></span>
                                <span class="route-marker destination"></span>
                            </div>

                            <div class="route-preview-content">
                                <div class="route-preview-city" id="preview-asal">
                                    {{ old('kota_asal') ?: 'Kota asal' }}
                                </div>
                                <div class="route-preview-caption">
                                    Titik keberangkatan
                                </div>

                                <div class="route-preview-destination">
                                    <div class="route-preview-city" id="preview-tujuan">
                                        {{ old('kota_tujuan') ?: 'Kota tujuan' }}
                                    </div>
                                    <div class="route-preview-caption">
                                        Tujuan perjalanan
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="route-preview-badge">
                            <i class="bi bi-arrow-left-right"></i>
                            Rute antarkota
                        </div>
                    </div>

                    <div class="row">
                        {{-- Harga --}}
                        <div class="col-md-7">
                            <div class="route-field">
                                <label for="harga" class="route-label">
                                    Harga Tiket <span class="route-required">*</span>
                                </label>

                                <div class="route-input-wrap">
                                    <i class="bi bi-cash-stack route-input-icon"></i>
                                    <input
                                        type="number"
                                        id="harga"
                                        name="harga"
                                        value="{{ old('harga') }}"
                                        class="route-input has-unit @error('harga') is-invalid @enderror"
                                        placeholder="150000"
                                        min="0"
                                        max="9999999999.99"
                                        step="0.01"
                                        required
                                    >
                                    <span class="route-input-unit">IDR</span>
                                </div>

                                @error('harga')
                                    <div class="route-error">{{ $message }}</div>
                                @enderror

                                <small class="route-input-help">
                                    Harga tiket per penumpang.
                                </small>
                            </div>
                        </div>

                        {{-- Estimasi --}}
                        <div class="col-md-5">
                            <div class="route-field">
                                <label for="estimasi_menit" class="route-label">
                                    Estimasi Waktu <span class="route-required">*</span>
                                </label>

                                <div class="route-input-wrap">
                                    <i class="bi bi-clock-history route-input-icon"></i>
                                    <input
                                        type="number"
                                        id="estimasi_menit"
                                        name="estimasi_menit"
                                        value="{{ old('estimasi_menit') }}"
                                        class="route-input has-unit @error('estimasi_menit') is-invalid @enderror"
                                        placeholder="300"
                                        min="1"
                                        max="65535"
                                        step="1"
                                        required
                                    >
                                    <span class="route-input-unit">menit</span>
                                </div>

                                @error('estimasi_menit')
                                    <div class="route-error">{{ $message }}</div>
                                @enderror

                                <small class="route-input-help">
                                    Total waktu perjalanan.
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info route-alert mb-0">
                        <i class="bi bi-info-circle me-2"></i>
                        Rute yang dibuat akan memiliki status <strong>Aktif</strong>.
                        Pastikan informasi yang dimasukkan sudah benar.
                    </div>
                </div>

                <div class="route-actions">
                    <div class="route-actions-note">
                        <i class="bi bi-shield-check me-1"></i>
                        Data rute terhubung dengan perusahaan Anda.
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('pt.rute.index') }}"
                           class="route-btn route-btn-secondary">
                            Batal
                        </a>

                        <button type="submit"
                                id="route-submit"
                                class="route-btn route-btn-primary">
                            <i class="bi bi-check2-circle"></i>
                            Simpan Rute
                        </button>
                    </div>
                </div>
            </div>

            {{-- Sidebar ringkasan --}}
            <aside class="route-sidebar">

                <div class="route-summary">
                    <div class="route-summary-label">
                        <i class="bi bi-card-checklist me-1"></i>
                        Ringkasan Rute
                    </div>

                    <div class="route-summary-caption mb-1">Harga tiket per penumpang</div>
                    <div class="route-summary-price" id="preview-harga">
                        Rp 0
                    </div>

                    <div class="route-summary-divider"></div>

                    <div class="route-summary-meta">
                        <div class="route-summary-meta-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <div class="route-summary-meta-label">
                                Estimasi perjalanan
                            </div>
                            <div class="route-summary-meta-value" id="preview-durasi">
                                Belum ditentukan
                            </div>
                        </div>
                    </div>

                    <div class="route-summary-divider"></div>

                    <div class="route-summary-meta">
                        <div class="route-summary-meta-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div>
                            <div class="route-summary-meta-label">Status awal</div>
                            <div class="route-summary-meta-value">Aktif</div>
                        </div>
                    </div>
                </div>

                <div class="route-info-card">
                    <h3 class="route-info-title">
                        <i class="bi bi-lightbulb text-primary me-2"></i>
                        Panduan Pengisian
                    </h3>

                    <div class="route-info-item">
                        <div class="route-info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="route-info-text">
                            <strong>Kota asal dan tujuan</strong>
                            Gunakan nama kota yang jelas dan pastikan keduanya berbeda.
                        </div>
                    </div>

                    <div class="route-info-item">
                        <div class="route-info-icon">
                            <i class="bi bi-cash"></i>
                        </div>
                        <div class="route-info-text">
                            <strong>Harga tiket</strong>
                            Masukkan harga dalam rupiah untuk satu penumpang.
                        </div>
                    </div>

                    <div class="route-info-item">
                        <div class="route-info-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="route-info-text">
                            <strong>Estimasi waktu</strong>
                            Gunakan satuan menit. Contohnya, 300 menit berarti 5 jam.
                        </div>
                    </div>

                    <div class="route-info-item">
                        <div class="route-info-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="route-info-text">
                            <strong>Data perusahaan</strong>
                            Rute akan dikaitkan dengan akun PT yang sedang login.
                        </div>
                    </div>
                </div>

            </aside>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const asal = document.getElementById('kota_asal');
    const tujuan = document.getElementById('kota_tujuan');
    const harga = document.getElementById('harga');
    const estimasi = document.getElementById('estimasi_menit');

    const previewAsal = document.getElementById('preview-asal');
    const previewTujuan = document.getElementById('preview-tujuan');
    const previewHarga = document.getElementById('preview-harga');
    const previewDurasi = document.getElementById('preview-durasi');

    function formatRupiah(nilai) {
        const angka = Number(nilai);

        if (!Number.isFinite(angka) || nilai === '') {
            return 'Rp 0';
        }

        return 'Rp ' + angka.toLocaleString('id-ID', {
            maximumFractionDigits: 2
        });
    }

    function formatDurasi(nilai) {
        const totalMenit = Number(nilai);

        if (!Number.isInteger(totalMenit) || totalMenit < 1) {
            return 'Belum ditentukan';
        }

        const jam = Math.floor(totalMenit / 60);
        const menit = totalMenit % 60;
        const bagian = [];

        if (jam > 0) {
            bagian.push(jam + ' jam');
        }

        if (menit > 0) {
            bagian.push(menit + ' menit');
        }

        return bagian.join(' ') || '0 menit';
    }

    function perbaruiRingkasan() {
        previewAsal.textContent = asal.value.trim() || 'Kota asal';
        previewTujuan.textContent = tujuan.value.trim() || 'Kota tujuan';
        previewHarga.textContent = formatRupiah(harga.value);
        previewDurasi.textContent = formatDurasi(estimasi.value);
    }

    [asal, tujuan, harga, estimasi].forEach(function (input) {
        input.addEventListener('input', perbaruiRingkasan);
    });

    perbaruiRingkasan();
});
</script>
@endsection
