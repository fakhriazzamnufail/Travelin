
@extends('layouts.pt')

@section('content')

<style>
    /* =========================================
       TRAVELIN - EDIT JADWAL
       Professional High Contrast UI
    ========================================= */

    .jadwal-edit {
        --primary: #1749b8;
        --primary-hover: #103b9c;
        --dark: #172b4d;
        --text: #26364d;
        --muted: #53647b;
        --border: #dce3ed;

        color: var(--text) !important;
        font-size: 14px;
    }

    .jadwal-edit h1,
    .jadwal-edit h2,
    .jadwal-edit h3,
    .jadwal-edit h4,
    .jadwal-edit h5 {
        color: var(--dark) !important;
    }

    .jadwal-edit .page-heading {
        font-weight: 800;
        letter-spacing: -.6px;
    }

    .jadwal-edit .page-subtitle,
    .jadwal-edit .breadcrumb-text {
        color: var(--muted) !important;
    }

    .jadwal-edit .breadcrumb-text {
        font-size: 12px;
        font-weight: 600;
    }

    /* COMPANY INFORMATION */

    .jadwal-edit .company-box {
        background: #f1f5ff !important;
        border: 1px solid #d5e1fa;
        border-radius: 10px;
        padding: 16px 18px;
    }

    .jadwal-edit .company-label {
        color: #53647b !important;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .6px;
    }

    .jadwal-edit .company-name {
        color: #172b4d !important;
        font-size: 15px;
        font-weight: 800;
    }

    /* FORM CARD */

    .jadwal-edit .form-card {
        background: #ffffff !important;
        border: 1px solid var(--border);
        border-radius: 13px;
        overflow: hidden;
        box-shadow: 0 3px 14px rgba(26, 45, 78, .045);
    }

    .jadwal-edit .form-card-header {
        padding: 21px 24px;
        background: #ffffff !important;
        border-bottom: 1px solid var(--border);
    }

    .jadwal-edit .form-card-body {
        padding: 25px;
    }

    .jadwal-edit .section-title {
        color: #172b4d !important;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .jadwal-edit .section-description {
        color: #53647b !important;
        font-size: 12px;
        margin-bottom: 20px;
    }

    .jadwal-edit .section-divider {
        border: 0;
        border-top: 1px solid #e5eaf1;
        margin: 25px 0;
    }

    /* FORM INPUT */

    .jadwal-edit .form-label {
        color: #26364d !important;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .jadwal-edit .required-mark {
        color: #c62828 !important;
    }

    .jadwal-edit .form-control,
    .jadwal-edit .form-select {
        min-height: 44px;
        color: #26364d !important;
        background: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 8px;
        font-size: 13px;
        box-shadow: none !important;
    }

    .jadwal-edit .form-control:focus,
    .jadwal-edit .form-select:focus {
        border-color: #1749b8 !important;
        box-shadow: 0 0 0 3px rgba(23, 73, 184, .12) !important;
    }

    .jadwal-edit .form-control::placeholder {
        color: #8996a8 !important;
    }

    .jadwal-edit .form-hint {
        color: #64748b !important;
        font-size: 11px;
        margin-top: 6px;
    }

    .jadwal-edit .invalid-feedback {
        font-size: 12px;
        font-weight: 600;
    }

    /* CURRENT SCHEDULE */

    .jadwal-edit .current-info {
        background: #f8faff !important;
        border: 1px solid #dce6f7;
        border-radius: 9px;
        padding: 15px;
    }

    .jadwal-edit .current-info-label {
        color: #64748b !important;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .jadwal-edit .current-info-value {
        color: #172b4d !important;
        font-size: 13px;
        font-weight: 800;
    }

    /* STATUS */

    .jadwal-edit .status-hint {
        color: #53647b !important;
        font-size: 11px;
        margin-top: 7px;
    }

    /* INFORMATION BOX */

    .jadwal-edit .information-box {
        background: #eaf1ff !important;
        border: 1px solid #c8d8f5;
        border-radius: 9px;
        padding: 15px;
        color: #243d65 !important;
    }

    .jadwal-edit .information-box p,
    .jadwal-edit .information-box div {
        color: #243d65 !important;
    }

    /* BUTTONS */

    .jadwal-edit .btn-primary {
        background: #1749b8 !important;
        border: 1px solid #1749b8 !important;
        color: #ffffff !important;
        font-weight: 700;
        border-radius: 8px;
        padding: 10px 19px;
    }

    .jadwal-edit .btn-primary:hover {
        background: #103b9c !important;
        border-color: #103b9c !important;
        color: #ffffff !important;
    }

    .jadwal-edit .btn-light {
        background: #f1f4f9 !important;
        border: 1px solid #d5deea !important;
        color: #26364d !important;
        font-weight: 600;
        border-radius: 8px;
        padding: 10px 19px;
    }

    .jadwal-edit .btn-light:hover {
        background: #e5ebf4 !important;
        color: #172b4d !important;
    }

    /* ALERT */

    .jadwal-edit .alert-danger {
        background: #ffebeb !important;
        border: 1px solid #f2c5c5 !important;
        color: #92252c !important;
    }

    .jadwal-edit .alert-danger li {
        color: #92252c !important;
    }

    /* RESPONSIVE */

    @media (max-width: 767px) {
        .jadwal-edit .form-card-body {
            padding: 18px;
        }

        .jadwal-edit .form-card-header {
            padding: 17px;
        }

        .jadwal-edit .page-heading {
            font-size: 23px;
        }

        .jadwal-edit .form-actions {
            flex-direction: column-reverse;
        }

        .jadwal-edit .form-actions a,
        .jadwal-edit .form-actions button {
            width: 100%;
        }
    }
</style>


<div class="container-fluid jadwal-edit">

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

                <span class="breadcrumb-text">Edit Jadwal</span>

            </div>

            <h1 class="page-heading h3 mb-2">
                Edit Jadwal Keberangkatan
            </h1>

            <p class="page-subtitle mb-0">
                Perbarui informasi perjalanan dan keberangkatan perusahaan Anda.
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


    {{-- INFORMASI JADWAL SAAT INI --}}
    <div class="current-info mb-4">

        <div class="d-flex align-items-center mb-3">
            <i class="bi bi-info-circle-fill text-primary me-2"></i>

            <span class="fw-bold" style="color:#172b4d;">
                Informasi Jadwal Saat Ini
            </span>
        </div>

        <div class="row">

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="current-info-label">
                    ID JADWAL
                </div>

                <div class="current-info-value">
                    #{{ $jadwal->id_jadwal }}
                </div>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="current-info-label">
                    RUTE PERJALANAN
                </div>

                <div class="current-info-value">
                    {{ $jadwal->rute->kota_asal ?? '-' }}
                    →
                    {{ $jadwal->rute->kota_tujuan ?? '-' }}
                </div>
            </div>

            <div class="col-md-4">
                <div class="current-info-label">
                    STATUS SEKARANG
                </div>

                <div class="current-info-value">
                    {{ ucfirst($jadwal->status) }}
                </div>
            </div>

        </div>

    </div>


    {{-- FORM EDIT JADWAL --}}
    <form action="{{ route('pt.jadwal.update', $jadwal->id_jadwal) }}"
          method="POST">

        @csrf
        @method('PUT')


        <div class="form-card mb-4">

            {{-- HEADER FORM --}}
            <div class="form-card-header">

                <div class="d-flex align-items-center">

                    <div class="me-3">
                        <div class="d-flex align-items-center justify-content-center rounded-3"
                             style="width:43px;height:43px;background:#edf3ff;color:#2457d6;">
                            <i class="bi bi-pencil-square fs-4"></i>
                        </div>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Formulir Perubahan Jadwal
                        </h5>

                        <p class="text-muted small mb-0">
                            Periksa kembali informasi sebelum menyimpan perubahan.
                        </p>
                    </div>

                </div>

            </div>


            {{-- BODY FORM --}}
            <div class="form-card-body">


                {{-- BAGIAN 1: RUTE --}}
                <div>

                    <h5 class="section-title">
                        <i class="bi bi-signpost-2 text-primary me-2"></i>
                        Informasi Rute Perjalanan
                    </h5>

                    <p class="section-description">
                        Perbarui rute perjalanan yang digunakan.
                    </p>

                    <div class="mb-3">

                        <label for="id_rute" class="form-label">
                            Rute Perjalanan
                            <span class="required-mark">*</span>
                        </label>

                        <select name="id_rute"
                                id="id_rute"
                                class="form-select @error('id_rute') is-invalid @enderror"
                                required>

                            <option value="">
                                -- Pilih Rute Perjalanan --
                            </option>

                            @foreach($dataRute as $rute)

                                <option value="{{ $rute->id_rute }}"
                                    {{ old('id_rute', $jadwal->id_rute) == $rute->id_rute ? 'selected' : '' }}>

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

                    </div>

                </div>


                <hr class="section-divider">


                {{-- BAGIAN 2: ARMADA DAN DRIVER --}}
                <div>

                    <h5 class="section-title">
                        <i class="bi bi-truck text-primary me-2"></i>
                        Armada dan Pengemudi
                    </h5>

                    <p class="section-description">
                        Perbarui kendaraan dan driver yang bertugas.
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

                                <option value="">
                                    -- Pilih Kendaraan --
                                </option>

                                @foreach($dataKendaraan as $kendaraan)

                                    <option value="{{ $kendaraan->id_kendaraan }}"
                                        {{ old('id_kendaraan', $jadwal->id_kendaraan) == $kendaraan->id_kendaraan ? 'selected' : '' }}>

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

                                <option value="">
                                    -- Pilih Driver --
                                </option>

                                @foreach($dataDriver as $driver)

                                    <option value="{{ $driver->id_driver }}"
                                        {{ old('id_driver', $jadwal->id_driver) == $driver->id_driver ? 'selected' : '' }}>

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


                {{-- BAGIAN 3: WAKTU --}}
                <div>

                    <h5 class="section-title">
                        <i class="bi bi-clock-history text-primary me-2"></i>
                        Waktu Keberangkatan
                    </h5>

                    <p class="section-description">
                        Atur ulang tanggal dan jam keberangkatan.
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
                                   value="{{ old('tanggal_berangkat', $jadwal->tanggal_berangkat?->format('Y-m-d')) }}"
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
                                   value="{{ old('jam_berangkat', substr($jadwal->jam_berangkat, 0, 5)) }}"
                                   class="form-control @error('jam_berangkat') is-invalid @enderror"
                                   required>

                            @error('jam_berangkat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                <hr class="section-divider">


                {{-- BAGIAN 4: HARGA --}}
                <div>

                    <h5 class="section-title">
                        <i class="bi bi-cash-coin text-primary me-2"></i>
                        Harga Tiket
                    </h5>

                    <p class="section-description">
                        Perbarui harga tiket untuk setiap penumpang.
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
                                       value="{{ old('harga', (float) $jadwal->harga) }}"
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


                <hr class="section-divider">


                {{-- BAGIAN 5: STATUS --}}
                <div>

                    <h5 class="section-title">
                        <i class="bi bi-toggle-on text-primary me-2"></i>
                        Status Jadwal
                    </h5>

                    <p class="section-description">
                        Tentukan status terbaru dari jadwal perjalanan.
                    </p>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="status" class="form-label">
                                Status Jadwal
                                <span class="required-mark">*</span>
                            </label>

                            <select name="status"
                                    id="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required>

                                <option value="aktif"
                                    {{ old('status', $jadwal->status) == 'aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>

                                <option value="nonaktif"
                                    {{ old('status', $jadwal->status) == 'nonaktif' ? 'selected' : '' }}>
                                    Nonaktif
                                </option>

                                <option value="dibatalkan"
                                    {{ old('status', $jadwal->status) == 'dibatalkan' ? 'selected' : '' }}>
                                    Dibatalkan
                                </option>

                                <option value="selesai"
                                    {{ old('status', $jadwal->status) == 'selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>

                            </select>

                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="status-hint">
                                Status aktif memungkinkan jadwal digunakan untuk proses pemesanan.
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER FORM --}}
            <div class="border-top p-3 p-md-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 form-actions">

                    <a href="{{ route('pt.jadwal.index') }}"
                       class="btn btn-light">
                        <i class="bi bi-x-lg me-2"></i>
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>
                        Simpan Perubahan
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
                Informasi Perubahan Jadwal
            </div>

            <p class="small mb-0">
                Perubahan kendaraan, driver, tanggal, atau jam keberangkatan
                akan diperiksa oleh sistem untuk memastikan tidak terjadi
                bentrok dengan jadwal aktif lainnya.
                Pastikan semua informasi sudah benar sebelum menyimpan.
            </p>

        </div>

    </div>

</div>

@endsection
