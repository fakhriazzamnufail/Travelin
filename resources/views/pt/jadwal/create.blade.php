
@extends('layouts.pt')

@section('content')

<style>
    /* =========================================
       TRAVELIN - FORM TAMBAH JADWAL
       Professional High Contrast UI
    ========================================= */

    .jadwal-create {
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

    .jadwal-create h1,
    .jadwal-create h2,
    .jadwal-create h3,
    .jadwal-create h4,
    .jadwal-create h5 {
        color: var(--dark) !important;
    }

    .jadwal-create .page-heading {
        font-weight: 800;
        letter-spacing: -.6px;
    }

    .jadwal-create .page-subtitle {
        color: var(--muted) !important;
        font-size: 14px;
    }

    .jadwal-create .breadcrumb-text {
        color: var(--muted) !important;
        font-size: 12px;
        font-weight: 600;
    }

    /* FORM CARD */

    .jadwal-create .form-card {
        background: #ffffff !important;
        border: 1px solid var(--border);
        border-radius: 13px;
        overflow: hidden;
        box-shadow: 0 3px 14px rgba(26, 45, 78, .045);
    }

    .jadwal-create .form-card-header {
        padding: 21px 24px;
        background: #ffffff !important;
        border-bottom: 1px solid var(--border);
    }

    .jadwal-create .form-card-body {
        padding: 25px;
    }

    .jadwal-create .section-title {
        color: #172b4d !important;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .jadwal-create .section-description {
        color: #53647b !important;
        font-size: 12px;
        margin-bottom: 20px;
    }

    .jadwal-create .section-divider {
        border: 0;
        border-top: 1px solid #e5eaf1;
        margin: 25px 0;
    }

    /* FORM INPUT */

    .jadwal-create .form-label {
        color: #26364d !important;
        font-weight: 700;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .jadwal-create .required-mark {
        color: #c62828 !important;
    }

    .jadwal-create .form-control,
    .jadwal-create .form-select {
        min-height: 44px;
        color: #26364d !important;
        background-color: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 8px;
        font-size: 13px;
        box-shadow: none !important;
    }

    .jadwal-create .form-control:focus,
    .jadwal-create .form-select:focus {
        border-color: #1749b8 !important;
        box-shadow: 0 0 0 3px rgba(23, 73, 184, .12) !important;
    }

    .jadwal-create .form-control::placeholder {
        color: #8996a8 !important;
    }

    .jadwal-create .form-hint {
        color: #64748b !important;
        font-size: 11px;
        margin-top: 6px;
    }

    .jadwal-create .invalid-feedback {
        font-size: 12px;
        font-weight: 600;
    }

    /* COMPANY INFORMATION */

    .jadwal-create .company-box {
        background: #f1f5ff !important;
        border: 1px solid #d5e1fa;
        border-radius: 10px;
        padding: 15px 17px;
    }

    .jadwal-create .company-label {
        color: #53647b !important;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .6px;
    }

    .jadwal-create .company-name {
        color: #172b4d !important;
        font-size: 15px;
        font-weight: 800;
    }

    /* INFORMATION BOX */

    .jadwal-create .information-box {
        background: #eaf1ff !important;
        border: 1px solid #c8d8f5;
        border-radius: 9px;
        padding: 15px;
        color: #243d65 !important;
    }

    .jadwal-create .information-box p,
    .jadwal-create .information-box div {
        color: #243d65 !important;
    }

    /* BUTTONS */

    .jadwal-create .btn-primary {
        background: #1749b8 !important;
        border: 1px solid #1749b8 !important;
        color: #ffffff !important;
        font-weight: 700;
        border-radius: 8px;
        padding: 10px 19px;
    }

    .jadwal-create .btn-primary:hover {
        background: #103b9c !important;
        border-color: #103b9c !important;
        color: #ffffff !important;
    }

    .jadwal-create .btn-light {
        background: #f1f4f9 !important;
        border: 1px solid #d5deea !important;
        color: #26364d !important;
        font-weight: 600;
        border-radius: 8px;
        padding: 10px 19px;
    }

    .jadwal-create .btn-light:hover {
        background: #e5ebf4 !important;
        color: #172b4d !important;
    }

    .jadwal-create .alert-danger {
        background: #ffebeb !important;
        border: 1px solid #f2c5c5 !important;
        color: #92252c !important;
    }

    .jadwal-create .alert-danger li {
        color: #92252c !important;
    }

    /* RESPONSIVE */

    @media (max-width: 767px) {
        .jadwal-create .form-card-body {
            padding: 18px;
        }

        .jadwal-create .form-card-header {
            padding: 17px;
        }

        .jadwal-create .page-heading {
            font-size: 23px;
        }

        .jadwal-create .form-actions {
            flex-direction: column-reverse;
        }

        .jadwal-create .form-actions a,
        .jadwal-create .form-actions button {
            width: 100%;
        }
    }
</style>


<div class="container-fluid jadwal-create">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div class="mb-3 mb-md-0">

            <div class="d-flex align-items-center mb-2">
                <span class="text-primary small fw-semibold">
                    <i class="bi bi-grid-1x2 me-1"></i>
                    DASHBOARD PT
                </span>

                <span class="breadcrumb-text mx-2">/</span>

                <a href="{{ route('pt.jadwal.index') }}"
                   class="breadcrumb-text text-decoration-none">
                    Manajemen Jadwal
                </a>

                <span class="breadcrumb-text mx-2">/</span>

                <span class="breadcrumb-text">Tambah Jadwal</span>
            </div>

            <h1 class="page-heading h3 mb-2">
                Tambah Jadwal Keberangkatan
            </h1>

            <p class="page-subtitle mb-0">
                Lengkapi informasi perjalanan untuk membuat jadwal keberangkatan baru.
            </p>

        </div>

        <a href="{{ route('pt.jadwal.index') }}"
           class="btn btn-light">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>

    </div>


    {{-- VALIDASI ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger shadow-sm mb-4">
            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Terdapat kesalahan pada pengisian formulir.
            </div>

            <ul class="mb-0 ps-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- IDENTITAS PERUSAHAAN --}}
    <div class="company-box mb-4">

        <div class="d-flex align-items-center">

            <div class="me-3">
                <i class="bi bi-building fs-3 text-primary"></i>
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
                <span class="badge rounded-pill px-3 py-2"
                      style="background:#d9f3e3;color:#12643b;">
                    <i class="bi bi-shield-check me-1"></i>
                    Terverifikasi
                </span>
            </div>

        </div>

    </div>


    {{-- FORM TAMBAH JADWAL --}}
    <form action="{{ route('pt.jadwal.store') }}"
          method="POST">

        @csrf

        <div class="form-card mb-4">

            {{-- CARD HEADER --}}
            <div class="form-card-header">

                <div class="d-flex align-items-center">

                    <div class="me-3">
                        <div class="d-flex align-items-center justify-content-center rounded-3"
                             style="width:43px;height:43px;background:#edf3ff;color:#2457d6;">
                            <i class="bi bi-calendar-plus fs-4"></i>
                        </div>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Formulir Jadwal Perjalanan
                        </h5>

                        <p class="text-muted small mb-0">
                            Informasi yang bertanda <span class="required-mark">*</span> wajib diisi.
                        </p>
                    </div>

                </div>

            </div>


            {{-- CARD BODY --}}
            <div class="form-card-body">

                {{-- BAGIAN 1: INFORMASI RUTE --}}
                <div class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-signpost-2 text-primary me-2"></i>
                        Informasi Rute Perjalanan
                    </h5>

                    <p class="section-description">
                        Tentukan rute perjalanan yang akan digunakan.
                    </p>

                    <div class="row">

                        <div class="col-md-12 mb-3">

                            <label for="id_rute" class="form-label">
                                Rute Perjalanan
                                <span class="required-mark">*</span>
                            </label>

                            <select name="id_rute"
                                    id="id_rute"
                                    class="form-select @error('id_rute') is-invalid @enderror"
                                    required>

                                <option value="">-- Pilih Rute Perjalanan --</option>

                                @foreach($dataRute as $rute)
                                    <option value="{{ $rute->id_rute }}"
                                        {{ old('id_rute') == $rute->id_rute ? 'selected' : '' }}>

                                        {{ $rute->kota_asal }}
                                        →
                                        {{ $rute->kota_tujuan }}

                                    </option>
                                @endforeach

                            </select>

                            @error('id_rute')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-hint">
                                Pilih rute yang sudah didaftarkan oleh perusahaan Anda.
                            </div>

                        </div>

                    </div>

                </div>


                <hr class="section-divider">


                {{-- BAGIAN 2: ARMADA DAN DRIVER --}}
                <div class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-truck text-primary me-2"></i>
                        Armada dan Pengemudi
                    </h5>

                    <p class="section-description">
                        Tentukan kendaraan dan driver yang bertugas pada perjalanan ini.
                    </p>

                    <div class="row">

                        {{-- KENDARAAN --}}
                        <div class="col-md-6 mb-3">

                            <label for="id_kendaraan" class="form-label">
                                Kendaraan
                                <span class="required-mark">*</span>
                            </label>

                            <select name="id_kendaraan"
                                    id="id_kendaraan"
                                    class="form-select @error('id_kendaraan') is-invalid @enderror"
                                    required>

                                <option value="">-- Pilih Kendaraan --</option>

                                @foreach($dataKendaraan as $kendaraan)
                                    <option value="{{ $kendaraan->id_kendaraan }}"
                                        {{ old('id_kendaraan') == $kendaraan->id_kendaraan ? 'selected' : '' }}>

                                        {{ $kendaraan->merk }}
                                        - {{ $kendaraan->tipe }}
                                        ({{ $kendaraan->no_polisi }})

                                    </option>
                                @endforeach

                            </select>

                            @error('id_kendaraan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DRIVER --}}
                        <div class="col-md-6 mb-3">

                            <label for="id_driver" class="form-label">
                                Driver
                                <span class="required-mark">*</span>
                            </label>

                            <select name="id_driver"
                                    id="id_driver"
                                    class="form-select @error('id_driver') is-invalid @enderror"
                                    required>

                                <option value="">-- Pilih Driver --</option>

                                @foreach($dataDriver as $driver)
                                    <option value="{{ $driver->id_driver }}"
                                        {{ old('id_driver') == $driver->id_driver ? 'selected' : '' }}>

                                        {{ $driver->nm_driver }}

                                    </option>
                                @endforeach

                            </select>

                            @error('id_driver')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <hr class="section-divider">


                {{-- BAGIAN 3: WAKTU KEBERANGKATAN --}}
                <div class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-clock-history text-primary me-2"></i>
                        Waktu Keberangkatan
                    </h5>

                    <p class="section-description">
                        Atur tanggal dan jam keberangkatan kendaraan.
                    </p>

                    <div class="row">

                        {{-- TANGGAL --}}
                        <div class="col-md-6 mb-3">

                            <label for="tanggal_berangkat" class="form-label">
                                Tanggal Keberangkatan
                                <span class="required-mark">*</span>
                            </label>

                            <input type="date"
                                   name="tanggal_berangkat"
                                   id="tanggal_berangkat"
                                   min="{{ now()->toDateString() }}"
                                   value="{{ old('tanggal_berangkat') }}"
                                   class="form-control @error('tanggal_berangkat') is-invalid @enderror"
                                   required>

                            @error('tanggal_berangkat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- JAM --}}
                        <div class="col-md-6 mb-3">

                            <label for="jam_berangkat" class="form-label">
                                Jam Keberangkatan
                                <span class="required-mark">*</span>
                            </label>

                            <input type="time"
                                   name="jam_berangkat"
                                   id="jam_berangkat"
                                   value="{{ old('jam_berangkat') }}"
                                   class="form-control @error('jam_berangkat') is-invalid @enderror"
                                   required>

                            @error('jam_berangkat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-hint">
                                Gunakan waktu lokal sesuai lokasi keberangkatan.
                            </div>

                        </div>

                    </div>

                </div>


                <hr class="section-divider">


                {{-- BAGIAN 4: HARGA --}}
                <div class="form-section">

                    <h5 class="section-title">
                        <i class="bi bi-cash-coin text-primary me-2"></i>
                        Harga Tiket
                    </h5>

                    <p class="section-description">
                        Tentukan harga tiket untuk setiap penumpang.
                    </p>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="harga" class="form-label">
                                Harga Tiket
                                <span class="required-mark">*</span>
                            </label>

                            <div class="input-group">

                                <span class="input-group-text"
                                      style="background:#f1f4f9;color:#26364d;border-color:#cbd5e1;font-weight:700;">
                                    Rp
                                </span>

                                <input type="number"
                                       name="harga"
                                       id="harga"
                                       min="0"
                                       step="1000"
                                       value="{{ old('harga') }}"
                                       placeholder="Contoh: 150000"
                                       class="form-control @error('harga') is-invalid @enderror"
                                       required>

                            </div>

                            @error('harga')
                                <div class="text-danger small fw-semibold mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-hint">
                                Masukkan harga dalam Rupiah tanpa tanda titik atau koma.
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- CARD FOOTER --}}
            <div class="border-top p-3 p-md-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 form-actions">

                    <a href="{{ route('pt.jadwal.index') }}"
                       class="btn btn-light">
                        <i class="bi bi-x-lg me-2"></i>
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>
                        Simpan Jadwal
                    </button>

                </div>

            </div>

        </div>

    </form>


    {{-- INFORMASI --}}
    <div class="information-box d-flex align-items-start mb-4">

        <i class="bi bi-info-circle-fill text-primary me-3 mt-1"></i>

        <div>
            <div class="fw-bold mb-1">
                Informasi Sebelum Menyimpan Jadwal
            </div>

            <p class="small mb-0">
                Pastikan rute, kendaraan, driver, tanggal, jam keberangkatan,
                dan harga tiket sudah benar. Sistem akan memeriksa
                ketersediaan driver dan kendaraan agar tidak terjadi bentrok
                dengan jadwal aktif lainnya.
            </p>
        </div>

    </div>

</div>

@endsection
