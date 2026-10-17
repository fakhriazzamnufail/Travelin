
@extends('layouts.pt')

@section('title', 'Edit Kendaraan')
@section('page-title', 'Edit Kendaraan')

@section('content')

<style>
    .edit-page {
        padding: 8px;
        color: #172554;
    }

    .edit-hero {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 25px;
        margin-bottom: 20px;
        border-radius: 16px;
        background: linear-gradient(120deg, #eff6ff, #e0edff);
    }

    .edit-hero-icon {
        width: 58px;
        height: 58px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        color: #2563eb;
        border-radius: 15px;
        font-size: 27px;
    }

    .edit-hero h2 {
        font-size: 24px;
        font-weight: 750;
        margin: 0 0 5px;
    }

    .edit-hero p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .edit-card {
        padding: 28px;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .04);
    }

    .edit-field {
        margin-bottom: 23px;
    }

    .edit-field label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 14px;
        font-weight: 650;
    }

    .edit-field .form-control,
    .edit-field .form-select {
        min-height: 46px;
        border: 1px solid #dbe3ef;
        border-radius: 10px;
        background-color: #fff;
        color: #172554;
        box-shadow: none;
    }

    .edit-field .form-control:focus,
    .edit-field .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
    }

    .edit-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }

    .edit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 19px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none !important;
    }

    .edit-btn-cancel {
        border: 1px solid #cbd5e1;
        background: #fff;
        color: #334155 !important;
    }

    .edit-btn-save {
        border: 1px solid #2563eb;
        background: #2563eb;
        color: #fff !important;
    }

    .edit-btn-save:hover {
        background: #1d4ed8;
    }

    @media(max-width: 600px) {
        .edit-card {
            padding: 20px 16px;
        }

        .edit-hero {
            padding: 20px 16px;
        }

        .edit-actions {
            flex-direction: column-reverse;
        }

        .edit-btn {
            width: 100%;
        }
    }
</style>

<div class="edit-page">

    <div class="edit-hero">
        <div class="edit-hero-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <div>
            <h2>Edit Kendaraan</h2>
            <p>Perbarui informasi kendaraan milik PT Travel Anda.</p>
        </div>
    </div>

    <div class="edit-card">

        <h5 class="fw-bold mb-2">Informasi Kendaraan</h5>
        <p class="text-muted small mb-4">
            Periksa data berikut sebelum menyimpan perubahan.
        </p>

        <form action="{{ route('pt.kendaraan.update', $kendaraan->id_kendaraan) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="no_polisi">Nomor Polisi</label>
                        <input
                            type="text"
                            id="no_polisi"
                            name="no_polisi"
                            class="form-control @error('no_polisi') is-invalid @enderror"
                            value="{{ old('no_polisi', $kendaraan->no_polisi) }}"
                            maxlength="15"
                            required
                        >
                        @error('no_polisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="merk">Merk Kendaraan</label>
                        <input
                            type="text"
                            id="merk"
                            name="merk"
                            class="form-control @error('merk') is-invalid @enderror"
                            value="{{ old('merk', $kendaraan->merk) }}"
                            maxlength="50"
                            required
                        >
                        @error('merk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="tipe">Tipe Kendaraan</label>
                        <input
                            type="text"
                            id="tipe"
                            name="tipe"
                            class="form-control @error('tipe') is-invalid @enderror"
                            value="{{ old('tipe', $kendaraan->tipe) }}"
                            maxlength="50"
                            required
                        >
                        @error('tipe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="warna">Warna Kendaraan</label>
                        <input
                            type="text"
                            id="warna"
                            name="warna"
                            class="form-control @error('warna') is-invalid @enderror"
                            value="{{ old('warna', $kendaraan->warna) }}"
                            maxlength="30"
                            required
                        >
                        @error('warna')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="kapasitas">Kapasitas Penumpang</label>
                        <input
                            type="number"
                            id="kapasitas"
                            name="kapasitas"
                            class="form-control @error('kapasitas') is-invalid @enderror"
                            value="{{ old('kapasitas', $kendaraan->kapasitas) }}"
                            min="1"
                            max="255"
                            required
                        >
                        @error('kapasitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="tahun">Tahun Kendaraan</label>
                        <input
                            type="number"
                            id="tahun"
                            name="tahun"
                            class="form-control @error('tahun') is-invalid @enderror"
                            value="{{ old('tahun', $kendaraan->tahun) }}"
                            min="1900"
                            max="{{ date('Y') }}"
                            required
                        >
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="edit-field">
                        <label for="status">Status Kendaraan</label>
                        <select
                            id="status"
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required
                        >
                            <option value="aktif"
                                {{ old('status', $kendaraan->status) === 'aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                {{ old('status', $kendaraan->status) === 'nonaktif' ? 'selected' : '' }}>
                                Nonaktif
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="edit-actions">
                <a href="{{ route('pt.kendaraan.index') }}"
                   class="edit-btn edit-btn-cancel">
                    <i class="bi bi-arrow-left"></i>
                    Batal
                </a>

                <button type="submit" class="edit-btn edit-btn-save">
                    <i class="bi bi-check-lg"></i>
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
