
@extends('layouts.pt')

@section('content')
<div class="container-fluid rute-edit-page">
    <style>
        .rute-edit-page {
            color: #172033;
            padding: 8px 6px 30px;
        }

        .rute-edit-page .edit-card {
            background: #fff;
            border: 1px solid #e5eaf2;
            border-radius: 16px;
            box-shadow: 0 8px 28px rgba(15, 23, 42, .05);
            overflow: hidden;
        }

        .rute-edit-page .edit-header {
            padding: 24px 26px;
            border-bottom: 1px solid #edf0f5;
        }

        .rute-edit-page .edit-title {
            font-size: 23px;
            font-weight: 750;
            color: #172033;
            margin: 0 0 7px;
        }

        .rute-edit-page .edit-description {
            color: #64748b;
            margin: 0;
            font-size: 14px;
        }

        .rute-edit-page .edit-body {
            padding: 26px;
        }

        .rute-edit-page .form-label {
            display: block;
            color: #334155;
            font-weight: 650;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .rute-edit-page .form-control,
        .rute-edit-page .form-select {
            min-height: 46px;
            color: #172033;
            background-color: #fff;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            padding: 10px 13px;
            box-shadow: none;
        }

        .rute-edit-page .form-control:focus,
        .rute-edit-page .form-select:focus {
            border-color: #6455f5;
            box-shadow: 0 0 0 3px rgba(99, 85, 245, .12);
        }

        .rute-edit-page .form-text {
            color: #64748b;
            font-size: 12px;
            margin-top: 7px;
        }

        .rute-edit-page .section-label {
            color: #172033;
            font-weight: 750;
            font-size: 15px;
            margin-bottom: 18px;
        }

        .rute-edit-page .route-summary {
            display: flex;
            align-items: center;
            gap: 13px;
            background: #f8f9ff;
            border: 1px solid #e6e8ff;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .rute-edit-page .route-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #e9e7ff;
            color: #5545e8;
            border-radius: 12px;
            font-size: 19px;
        }

        .rute-edit-page .route-summary-title {
            font-weight: 750;
            color: #172033;
            margin-bottom: 4px;
        }

        .rute-edit-page .route-summary-text {
            color: #64748b;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .rute-edit-page .btn {
            min-height: 43px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 650;
            padding: 10px 17px;
        }

        .rute-edit-page .btn-save {
            color: #fff;
            background: #4f46e5;
            border: 1px solid #4f46e5;
        }

        .rute-edit-page .btn-save:hover {
            color: #fff;
            background: #4338ca;
        }

        .rute-edit-page .btn-cancel {
            color: #334155;
            background: #fff;
            border: 1px solid #dbe2ea;
        }

        .rute-edit-page .btn-cancel:hover {
            background: #f8fafc;
        }

        .rute-edit-page .required-mark {
            color: #dc2626;
        }

        @media (max-width: 576px) {
            .rute-edit-page .edit-header,
            .rute-edit-page .edit-body {
                padding: 18px;
            }

            .rute-edit-page .form-actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .rute-edit-page .form-actions .btn {
                width: 100%;
            }
        }
    </style>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <a href="{{ route('pt.rute.index') }}"
               class="text-decoration-none small"
               style="color:#64748b;">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke daftar rute
            </a>

            <h1 class="h3 mt-3 mb-1" style="color:#172033;font-weight:750;">
                Edit Rute Perjalanan
            </h1>

            <p class="mb-0" style="color:#64748b;font-size:14px;">
                Perbarui informasi perjalanan yang dikelola perusahaan Anda.
            </p>
        </div>

        <span class="badge rounded-pill px-3 py-2"
              style="background:#eeecff;color:#5145cd;">
            <i class="bi bi-pencil-square me-1"></i>
            Mode pengeditan
        </span>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 rounded-3 mb-4">
            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-circle me-1"></i>
                Periksa kembali data yang dimasukkan.
            </div>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="edit-card">
        <div class="edit-header">
            <h2 class="edit-title">Informasi rute</h2>
            <p class="edit-description">
                Pastikan kota asal, tujuan, harga, dan estimasi perjalanan sudah benar.
            </p>
        </div>

        <div class="edit-body">
            <div class="route-summary">
                <div class="route-icon">
                    <i class="bi bi-signpost-2"></i>
                </div>
                <div>
                    <div class="route-summary-title">
                        {{ $rute->kota_asal }} → {{ $rute->kota_tujuan }}
                    </div>
                    <div class="route-summary-text">
                        ID Rute: {{ $rute->id_rute }}
                        · Data rute perusahaan Anda
                    </div>
                </div>
            </div>

            <form action="{{ route('pt.rute.update', $rute->id_rute) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="section-label">
                    <i class="bi bi-geo-alt me-2" style="color:#5545e8;"></i>
                    Detail perjalanan
                </div>

                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <label for="kota_asal" class="form-label">
                            Kota asal <span class="required-mark">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control @error('kota_asal') is-invalid @enderror"
                            id="kota_asal"
                            name="kota_asal"
                            value="{{ old('kota_asal', $rute->kota_asal) }}"
                            maxlength="100"
                            placeholder="Contoh: Padang"
                            autocomplete="address-level2"
                            required
                        >
                        @error('kota_asal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Kota tempat perjalanan dimulai.</div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="kota_tujuan" class="form-label">
                            Kota tujuan <span class="required-mark">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control @error('kota_tujuan') is-invalid @enderror"
                            id="kota_tujuan"
                            name="kota_tujuan"
                            value="{{ old('kota_tujuan', $rute->kota_tujuan) }}"
                            maxlength="100"
                            placeholder="Contoh: Pekanbaru"
                            required
                        >
                        @error('kota_tujuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Kota tujuan akhir perjalanan.</div>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#edf0f5;">
                        <div class="section-label">
                            <i class="bi bi-cash-stack me-2" style="color:#5545e8;"></i>
                            Harga dan estimasi
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="harga" class="form-label">
                            Harga tiket per penumpang (Rp)
                            <span class="required-mark">*</span>
                        </label>
                        <input
                            type="number"
                            class="form-control @error('harga') is-invalid @enderror"
                            id="harga"
                            name="harga"
                            value="{{ old('harga', $rute->harga) }}"
                            min="0"
                            max="9999999999.99"
                            step="0.01"
                            placeholder="Contoh: 150000"
                            required
                        >
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            Masukkan harga dalam rupiah, tanpa pemisah ribuan.
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="estimasi_menit" class="form-label">
                            Estimasi perjalanan (menit)
                            <span class="required-mark">*</span>
                        </label>
                        <input
                            type="number"
                            class="form-control @error('estimasi_menit') is-invalid @enderror"
                            id="estimasi_menit"
                            name="estimasi_menit"
                            value="{{ old('estimasi_menit', $rute->estimasi_menit) }}"
                            min="1"
                            max="65535"
                            step="1"
                            placeholder="Contoh: 300"
                            required
                        >
                        @error('estimasi_menit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            Gunakan menit. Contoh: 300 menit = 5 jam.
                        </div>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#edf0f5;">
                        <div class="section-label">
                            <i class="bi bi-toggle-on me-2" style="color:#5545e8;"></i>
                            Status rute
                        </div>

                        <label for="status" class="form-label">
                            Status operasional
                            <span class="required-mark">*</span>
                        </label>

                        <select
                            class="form-select @error('status') is-invalid @enderror"
                            id="status"
                            name="status"
                            required
                        >
                            <option value="aktif"
                                {{ old('status', $rute->status) === 'aktif' ? 'selected' : '' }}>
                                Aktif — rute tersedia
                            </option>
                            <option value="nonaktif"
                                {{ old('status', $rute->status) === 'nonaktif' ? 'selected' : '' }}>
                                Nonaktif — rute tidak tersedia
                            </option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="form-text">
                            Rute nonaktif sebaiknya tidak ditawarkan untuk pemesanan.
                            Pastikan fitur booking nantinya memeriksa status ini.
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-color:#edf0f5;">

                <div class="form-actions d-flex flex-wrap justify-content-end gap-2">
                    <a href="{{ route('pt.rute.index') }}"
                       class="btn btn-cancel text-decoration-none">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-check2-circle me-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
