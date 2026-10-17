
@extends('layouts.pt')

@section('title', 'Tambah Kendaraan')
@section('page-title', 'Tambah Kendaraan')

@section('content')

<style>
    .vehicle-page {
        padding: 4px 8px 30px;
        color: #172554;
    }

    .vehicle-hero {
        position: relative;
        overflow: hidden;
        padding: 26px 30px 36px;
        margin-bottom: -5px;
        background: linear-gradient(120deg, #eff6ff, #eaf3ff);
        border-radius: 18px 18px 0 0;
    }

    .vehicle-hero::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        right: 5%;
        top: -120px;
        border-radius: 50%;
        background: rgba(59, 130, 246, .08);
    }

    .vehicle-hero-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .vehicle-hero-icon {
        width: 68px;
        height: 68px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        background: #fff;
        color: #2563eb;
        font-size: 30px;
        box-shadow: 0 5px 20px rgba(37, 99, 235, .10);
    }

    .vehicle-hero h2 {
        font-size: 26px;
        font-weight: 750;
        margin: 0 0 5px;
        color: #172554;
    }

    .vehicle-hero p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .vehicle-form-card {
        position: relative;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 28px 30px;
        box-shadow: 0 8px 28px rgba(15, 23, 42, .045);
    }

    .vehicle-section-title {
        font-size: 16px;
        font-weight: 700;
        color: #172554;
        margin-bottom: 6px;
    }

    .vehicle-section-desc {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 25px;
    }

    .vehicle-form .form-label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 9px;
        font-size: 14px;
        font-weight: 650;
        color: #1e293b;
    }

    .vehicle-label-icon {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 11px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 16px;
    }

    .vehicle-input-group {
        display: flex;
        width: 100%;
        min-height: 48px;
        border: 1px solid #d7e3f5;
        border-radius: 11px;
        overflow: hidden;
        background: #fff;
        transition: border-color .2s, box-shadow .2s;
    }

    .vehicle-input-group:focus-within {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
    }

    .vehicle-input-icon {
        width: 51px;
        min-width: 51px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        border-right: 1px solid #e2e8f0;
        color: #1e40af;
        font-size: 17px;
    }

    .vehicle-input-group .form-control {
        min-width: 0;
        width: 100%;
        height: 46px;
        padding: 10px 14px;
        border: 0 !important;
        border-radius: 0;
        outline: 0;
        box-shadow: none !important;
        background: #fff !important;
        color: #172554 !important;
        font-size: 14px;
    }

    .vehicle-input-group .form-control::placeholder {
        color: #94a3b8 !important;
        opacity: 1;
    }

    .vehicle-input-group .form-control:focus {
        background: #fff !important;
        color: #172554 !important;
    }

    .vehicle-input-group .form-control.is-invalid {
        background-image: none;
    }

    .vehicle-input-group .input-suffix {
        display: flex;
        align-items: center;
        padding: 0 15px;
        background: #f8fafc;
        border-left: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 13px;
        white-space: nowrap;
    }

    .vehicle-field {
        margin-bottom: 24px;
    }

    .vehicle-error {
        display: block;
        margin-top: 6px;
        font-size: 12px;
        color: #dc2626;
    }

    .vehicle-info {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 5px;
        padding: 16px;
        background: linear-gradient(110deg, #eff6ff, #f5f9ff);
        border: 1px solid #dbeafe;
        border-radius: 12px;
    }

    .vehicle-info-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 39px;
        height: 39px;
        flex-shrink: 0;
        background: #2563eb;
        color: #fff;
        border-radius: 50%;
        font-size: 18px;
    }

    .vehicle-info strong {
        display: block;
        color: #1e3a8a;
        font-size: 14px;
        margin-bottom: 3px;
    }

    .vehicle-info p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
    }

    .vehicle-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        margin-top: 24px;
    }

    .vehicle-btn {
        min-height: 46px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 0 21px;
        border-radius: 11px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all .2s ease;
    }

    .vehicle-btn-cancel {
        color: #1d4ed8 !important;
        background: #fff;
        border: 1px solid #bfdbfe;
    }

    .vehicle-btn-cancel:hover {
        background: #eff6ff;
        color: #1d4ed8 !important;
    }

    .vehicle-btn-save {
        color: #fff !important;
        background: linear-gradient(110deg, #2563eb, #1d4ed8);
        border: 1px solid #2563eb;
        box-shadow: 0 5px 13px rgba(37, 99, 235, .18);
    }

    .vehicle-btn-save:hover {
        color: #fff !important;
        background: #1e40af;
        transform: translateY(-1px);
        box-shadow: 0 7px 17px rgba(37, 99, 235, .24);
    }

    @media (max-width: 767px) {
        .vehicle-page {
            padding: 0 0 20px;
        }

        .vehicle-hero {
            padding: 22px 18px 30px;
        }

        .vehicle-hero-icon {
            width: 53px;
            height: 53px;
            font-size: 24px;
        }

        .vehicle-hero h2 {
            font-size: 21px;
        }

        .vehicle-form-card {
            padding: 22px 17px;
        }

        .vehicle-field {
            margin-bottom: 20px;
        }

        .vehicle-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .vehicle-btn {
            width: 100%;
        }
    }
</style>

<div class="vehicle-page">

    {{-- Header halaman --}}
    <div class="vehicle-hero">
        <div class="vehicle-hero-content">
            <div class="vehicle-hero-icon">
                <i class="bi bi-car-front-fill"></i>
            </div>

            <div>
                <h2>Tambah Kendaraan</h2>
                <p>Lengkapi data kendaraan untuk operasional PT Travel Anda.</p>
            </div>
        </div>
    </div>

    {{-- Form utama --}}
    <div class="vehicle-form-card">

        <div class="vehicle-section-title">
            Informasi Kendaraan
        </div>

        <p class="vehicle-section-desc">
            Masukkan informasi kendaraan dengan benar sebelum menyimpannya.
        </p>

        <form action="{{ route('pt.kendaraan.store') }}"
              method="POST"
              class="vehicle-form">

            @csrf

            <div class="row gx-4">

                {{-- Nomor Polisi --}}
                <div class="col-md-6">
                    <div class="vehicle-field">
                        <label for="no_polisi" class="form-label">
                            <span class="vehicle-label-icon">
                                <i class="bi bi-card-text"></i>
                            </span>
                            Nomor Polisi
                        </label>

                        <div class="vehicle-input-group">
                            <span class="vehicle-input-icon">
                                <i class="bi bi-card-heading"></i>
                            </span>
                            <input
                                type="text"
                                id="no_polisi"
                                name="no_polisi"
                                value="{{ old('no_polisi') }}"
                                class="form-control"
                                placeholder="Contoh: BA 1234 XX"
                                maxlength="15"
                                required
                                @if($errors->has('no_polisi')) aria-invalid="true" @endif
                            >
                        </div>

                        @error('no_polisi')
                            <span class="vehicle-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Merk --}}
                <div class="col-md-6">
                    <div class="vehicle-field">
                        <label for="merk" class="form-label">
                            <span class="vehicle-label-icon">
                                <i class="bi bi-car-front-fill"></i>
                            </span>
                            Merk Kendaraan
                        </label>

                        <div class="vehicle-input-group">
                            <span class="vehicle-input-icon">
                                <i class="bi bi-car-front"></i>
                            </span>
                            <input
                                type="text"
                                id="merk"
                                name="merk"
                                value="{{ old('merk') }}"
                                class="form-control"
                                placeholder="Contoh: Toyota"
                                maxlength="50"
                                required
                                @if($errors->has('merk')) aria-invalid="true" @endif
                            >
                        </div>

                        @error('merk')
                            <span class="vehicle-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Tipe --}}
                <div class="col-md-6">
                    <div class="vehicle-field">
                        <label for="tipe" class="form-label">
                            <span class="vehicle-label-icon">
                                <i class="bi bi-truck"></i>
                            </span>
                            Tipe Kendaraan
                        </label>

                        <div class="vehicle-input-group">
                            <span class="vehicle-input-icon">
                                <i class="bi bi-truck-front"></i>
                            </span>
                            <input
                                type="text"
                                id="tipe"
                                name="tipe"
                                value="{{ old('tipe') }}"
                                class="form-control"
                                placeholder="Contoh: Avanza"
                                maxlength="50"
                                required
                                @if($errors->has('tipe')) aria-invalid="true" @endif
                            >
                        </div>

                        @error('tipe')
                            <span class="vehicle-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Warna --}}
                <div class="col-md-6">
                    <div class="vehicle-field">
                        <label for="warna" class="form-label">
                            <span class="vehicle-label-icon">
                                <i class="bi bi-palette-fill"></i>
                            </span>
                            Warna
                        </label>

                        <div class="vehicle-input-group">
                            <span class="vehicle-input-icon">
                                <i class="bi bi-palette"></i>
                            </span>
                            <input
                                type="text"
                                id="warna"
                                name="warna"
                                value="{{ old('warna') }}"
                                class="form-control"
                                placeholder="Contoh: Hitam"
                                maxlength="30"
                                required
                                @if($errors->has('warna')) aria-invalid="true" @endif
                            >
                        </div>

                        @error('warna')
                            <span class="vehicle-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Kapasitas --}}
                <div class="col-md-6">
                    <div class="vehicle-field">
                        <label for="kapasitas" class="form-label">
                            <span class="vehicle-label-icon">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            Kapasitas Penumpang
                        </label>

                        <div class="vehicle-input-group">
                            <span class="vehicle-input-icon">
                                <i class="bi bi-person"></i>
                            </span>
                            <input
                                type="number"
                                id="kapasitas"
                                name="kapasitas"
                                value="{{ old('kapasitas') }}"
                                class="form-control"
                                placeholder="Contoh: 8"
                                min="1"
                                max="255"
                                required
                                @if($errors->has('kapasitas')) aria-invalid="true" @endif
                            >
                            <span class="input-suffix">Kursi</span>
                        </div>

                        @error('kapasitas')
                            <span class="vehicle-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Tahun --}}
                <div class="col-md-6">
                    <div class="vehicle-field">
                        <label for="tahun" class="form-label">
                            <span class="vehicle-label-icon">
                                <i class="bi bi-calendar3"></i>
                            </span>
                            Tahun Kendaraan
                        </label>

                        <div class="vehicle-input-group">
                            <span class="vehicle-input-icon">
                                <i class="bi bi-calendar-date"></i>
                            </span>
                            <input
                                type="number"
                                id="tahun"
                                name="tahun"
                                value="{{ old('tahun') }}"
                                class="form-control"
                                placeholder="Contoh: 2024"
                                min="1900"
                                max="{{ date('Y') }}"
                                required
                                @if($errors->has('tahun')) aria-invalid="true" @endif
                            >
                        </div>

                        @error('tahun')
                            <span class="vehicle-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- Informasi --}}
            <div class="vehicle-info">
                <div class="vehicle-info-icon">
                    <i class="bi bi-info-lg"></i>
                </div>

                <div>
                    <strong>Informasi</strong>
                    <p>
                        Kendaraan yang ditambahkan akan otomatis terhubung
                        dengan PT Travel yang sedang login.
                    </p>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="vehicle-actions">
                <a href="{{ route('pt.kendaraan.index') }}"
                   class="vehicle-btn vehicle-btn-cancel">
                    <i class="bi bi-arrow-left"></i>
                    Batal
                </a>

                <button type="submit"
                        class="vehicle-btn vehicle-btn-save">
                    <i class="bi bi-check-lg"></i>
                    Simpan Kendaraan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection