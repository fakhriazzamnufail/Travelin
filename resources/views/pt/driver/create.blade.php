
@extends('layouts.pt')

@section('content')


<style>


    /* ==================================================
    PERBAIKAN KONTRAS TEKS FORMULIR TRAVELIN
    ================================================== */

    /* Tulisan yang diketik pengguna */
    .driver-form-page input.form-control,
    .driver-form-page textarea.form-control,
    .driver-form-page select.form-select {
        color: #1e293b !important;
        -webkit-text-fill-color: #1e293b !important;
        background-color: #ffffff !important;
        opacity: 1 !important;
        font-size: 14px !important;
        font-weight: 500 !important;
    }

    /* Teks petunjuk di dalam input */
    .driver-form-page input.form-control::placeholder,
    .driver-form-page textarea.form-control::placeholder {
        color: #64748b !important;
        -webkit-text-fill-color: #64748b !important;
        opacity: 1 !important;
        font-weight: 400 !important;
    }

    /* Label formulir */
    .driver-form-page label.form-label {
        color: #1e293b !important;
        font-size: 13px !important;
        font-weight: 650 !important;
    }

    /* Teks bantuan di bawah input */
    .driver-form-page .form-hint,
    .driver-form-page .password-feedback,
    .driver-form-page .password-match {
        color: #475569;
        font-size: 12px;
    }

    /* Ikon di samping kolom */
    .driver-form-page .input-group-text {
        color: #475569 !important;
        background-color: #f8fafc !important;
    }

    /* Pastikan teks pada tombol mata tetap terlihat */
    .driver-form-page .password-toggle {
        color: #475569 !important;
        -webkit-text-fill-color: #475569 !important;
    }

    /* Tulisan pada panel panduan */
    .driver-form-page .section-description,
    .driver-form-page .step-description,
    .driver-form-page .info-item p,
    .driver-form-page .privacy-note {
        color: #475569 !important;
    }

    /* Teks judul dan keterangan panel */
    .driver-form-page .section-title,
    .driver-form-page .step-title,
    .driver-form-page .sidebar-title,
    .driver-form-page .info-item strong {
        color: #172033 !important;
    }

    /* Teks breadcrumb */
    .driver-form-page .breadcrumb-item,
    .driver-form-page .breadcrumb-item.active {
        color: #475569 !important;
    }

    /* Fokus input tetap jelas */
    .driver-form-page input.form-control:focus,
    .driver-form-page textarea.form-control:focus,
    .driver-form-page select.form-select:focus {
        color: #1e293b !important;
        -webkit-text-fill-color: #1e293b !important;
        background-color: #ffffff !important;
        border-color: #818cf8 !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .15) !important;
    }

    .driver-form-page {
        --form-primary: #4338ca;
        --form-primary-light: #eef2ff;
        --form-text: #172033;
        --form-muted: #718096;
        --form-border: #e5eaf2;
        color: var(--form-text);
        padding-bottom: 2rem;
    }

    .driver-form-page .form-breadcrumb {
        font-size: .8rem;
        margin-bottom: 1rem;
    }

    .driver-form-page .form-breadcrumb a {
        color: var(--form-muted);
        text-decoration: none;
    }

    .driver-form-page .form-breadcrumb a:hover {
        color: var(--form-primary);
    }

    .driver-form-page .form-page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 1.75rem;
    }

    .driver-form-page .form-page-title {
        font-size: clamp(1.45rem, 2vw, 1.85rem);
        font-weight: 750;
        letter-spacing: -.045em;
        margin-bottom: .45rem;
    }

    .driver-form-page .form-page-description {
        color: var(--form-muted);
        font-size: .9rem;
        margin: 0;
        max-width: 620px;
        line-height: 1.7;
    }

    .driver-form-page .back-link {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        color: #475569;
        text-decoration: none;
        font-size: .85rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .driver-form-page .back-link:hover {
        color: var(--form-primary);
    }

    .driver-form-page .secure-label {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        padding: .55rem .75rem;
        border: 1px solid #dbeafe;
        border-radius: 9px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: .78rem;
        font-weight: 600;
    }

    .driver-form-page .form-step {
        display: flex;
        align-items: center;
        gap: .85rem;
        padding: 1rem 1.15rem;
        border: 1px solid var(--form-border);
        border-radius: 12px;
        background: #fff;
        margin-bottom: 1.25rem;
    }

    .driver-form-page .step-number {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 10px;
        background: var(--form-primary-light);
        color: var(--form-primary);
        font-size: .9rem;
        font-weight: 750;
    }

    .driver-form-page .step-title {
        font-size: .85rem;
        font-weight: 700;
        margin-bottom: .15rem;
    }

    .driver-form-page .step-description {
        font-size: .76rem;
        color: var(--form-muted);
        margin: 0;
    }

    .driver-form-page .form-section {
        border: 1px solid var(--form-border);
        border-radius: 14px;
        background: #fff;
        overflow: hidden;
        margin-bottom: 1.25rem;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .025);
    }

    .driver-form-page .form-section-header {
        display: flex;
        align-items: center;
        gap: .85rem;
        padding: 1.2rem 1.35rem;
        border-bottom: 1px solid var(--form-border);
    }

    .driver-form-page .section-icon {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 11px;
        background: var(--form-primary-light);
        color: var(--form-primary);
        font-size: 1.15rem;
    }

    .driver-form-page .section-title {
        font-size: .96rem;
        font-weight: 750;
        margin: 0 0 .25rem;
    }

    .driver-form-page .section-description {
        color: var(--form-muted);
        font-size: .78rem;
        line-height: 1.5;
        margin: 0;
    }

    .driver-form-page .form-section-body {
        padding: 1.35rem;
    }

    .driver-form-page .form-label {
        color: #334155;
        font-size: .82rem;
        font-weight: 650;
        margin-bottom: .5rem;
    }

    .driver-form-page .required-mark {
        color: #dc2626;
        margin-left: .15rem;
    }

    .driver-form-page .input-group-text {
        background: #f8fafc;
        border-color: #dce3ed;
        color: #8490a3;
        border-radius: 9px 0 0 9px;
        min-width: 43px;
        justify-content: center;
    }

    .driver-form-page .form-control,
    .driver-form-page .form-select {
        min-height: 45px;
        border: 1px solid #dce3ed;
        border-radius: 9px;
        font-size: .85rem;
        color: #1e293b;
        background-color: #fff;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .driver-form-page .input-group .form-control {
        border-radius: 0 9px 9px 0;
    }

    .driver-form-page .form-control:focus,
    .driver-form-page .form-select:focus {
        border-color: #818cf8;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
    }

    .driver-form-page textarea.form-control {
        min-height: 112px;
        resize: vertical;
        line-height: 1.65;
    }

    .driver-form-page .form-hint {
        color: #8792a5;
        font-size: .75rem;
        line-height: 1.55;
        margin-top: .4rem;
    }

    .driver-form-page .form-control.is-invalid {
        border-color: #dc3545;
    }

    .driver-form-page .password-toggle {
        border: 1px solid #dce3ed;
        border-left: 0;
        border-radius: 0 9px 9px 0;
        background: #fff;
        color: #64748b;
        padding: 0 .9rem;
    }

    .driver-form-page .password-toggle:hover {
        color: var(--form-primary);
        background: #f8fafc;
    }

    .driver-form-page .password-strength {
        height: 4px;
        background: #e2e8f0;
        border-radius: 999px;
        margin-top: .6rem;
        overflow: hidden;
    }

    .driver-form-page .password-strength-bar {
        height: 100%;
        width: 0;
        border-radius: inherit;
        transition: width .2s ease, background-color .2s ease;
    }

    .driver-form-page .password-feedback {
        color: var(--form-muted);
        font-size: .74rem;
        margin-top: .35rem;
    }

    .driver-form-page .password-match {
        font-size: .75rem;
        margin-top: .4rem;
    }

    .driver-form-page .password-match.match {
        color: #15803d;
    }

    .driver-form-page .password-match.no-match {
        color: #dc2626;
    }

    .driver-form-page .form-sidebar-card {
        border: 1px solid var(--form-border);
        border-radius: 14px;
        background: #fff;
        padding: 1.25rem;
        margin-bottom: 1rem;
    }

    .driver-form-page .sidebar-title {
        font-size: .9rem;
        font-weight: 750;
        margin-bottom: 1rem;
    }

    .driver-form-page .info-item {
        display: flex;
        align-items: flex-start;
        gap: .7rem;
        margin-bottom: 1rem;
    }

    .driver-form-page .info-item:last-child {
        margin-bottom: 0;
    }

    .driver-form-page .info-icon {
        color: var(--form-primary);
        font-size: 1rem;
        margin-top: .1rem;
    }

    .driver-form-page .info-item strong {
        display: block;
        font-size: .8rem;
        margin-bottom: .2rem;
    }

    .driver-form-page .info-item p {
        color: var(--form-muted);
        font-size: .76rem;
        line-height: 1.55;
        margin: 0;
    }

    .driver-form-page .privacy-note {
        padding: 1rem;
        background: #f8fafc;
        border: 1px solid var(--form-border);
        border-radius: 11px;
        color: #64748b;
        font-size: .77rem;
        line-height: 1.65;
    }

    .driver-form-page .privacy-note i {
        color: #4338ca;
    }

    .driver-form-page .form-actions {
        position: sticky;
        bottom: 0;
        z-index: 5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        padding: 1rem 1.25rem;
        border: 1px solid var(--form-border);
        border-radius: 13px;
        background: rgba(255, 255, 255, .96);
        backdrop-filter: blur(10px);
        box-shadow: 0 -5px 20px rgba(15, 23, 42, .035);
    }

    .driver-form-page .btn-cancel {
        border: 1px solid #dce3ed;
        border-radius: 9px;
        padding: .7rem 1rem;
        color: #475569;
        background: #fff;
        font-size: .83rem;
        font-weight: 600;
        text-decoration: none;
    }

    .driver-form-page .btn-cancel:hover {
        background: #f8fafc;
    }

    .driver-form-page .btn-save {
        border: 1px solid var(--form-primary);
        border-radius: 9px;
        padding: .75rem 1.1rem;
        color: #fff;
        background: var(--form-primary);
        font-size: .83rem;
        font-weight: 650;
        box-shadow: 0 4px 10px rgba(67, 56, 202, .14);
    }

    .driver-form-page .btn-save:hover {
        color: #fff;
        background: #3730a3;
        border-color: #3730a3;
    }

    .driver-form-page .btn-save:disabled {
        opacity: .65;
        cursor: not-allowed;
    }

    .driver-form-page .alert {
        border-radius: 10px;
        font-size: .85rem;
    }

    @media (max-width: 767.98px) {
        .driver-form-page .form-section-header,
        .driver-form-page .form-section-body {
            padding: 1rem;
        }

        .driver-form-page .form-actions {
            position: static;
        }

        .driver-form-page .form-actions .action-buttons {
            width: 100%;
            display: flex;
        }

        .driver-form-page .form-actions .action-buttons > * {
            flex: 1;
            text-align: center;
        }
    }
</style>

<div class="container-fluid driver-form-page">

    {{-- Navigasi dan judul --}}
    <a href="{{ route('pt.driver.index') }}" class="back-link">
        <i class="bi bi-arrow-left" aria-hidden="true"></i>
        Kembali ke daftar driver
    </a>

    <div class="form-page-header">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb form-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('pt.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('pt.driver.index') }}">Manajemen Driver</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Driver
                    </li>
                </ol>
            </nav>

            <h1 class="form-page-title">Tambah Driver Baru</h1>
            <p class="form-page-description">
                Lengkapi identitas pengemudi dan buat akun login agar driver
                dapat menggunakan sistem Travelin.
            </p>
        </div>

        <div class="secure-label">
            <i class="bi bi-shield-lock" aria-hidden="true"></i>
            Formulir aman
        </div>
    </div>

    {{-- Indikator tahapan --}}
    <div class="form-step">
        <div class="step-number">01</div>
        <div>
            <div class="step-title">Identitas dan akun pengemudi</div>
            <p class="step-description">
                Isi data dengan benar sebelum menyimpan informasi driver.
            </p>
        </div>
    </div>

    {{-- Pesan validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-4" role="alert">
            <div class="fw-semibold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"
                   aria-hidden="true"></i>
                Data belum dapat disimpan
            </div>
            <ul class="mb-0 ps-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pt.driver.store') }}"
          method="POST"
          id="createDriverForm">
        @csrf

        <div class="row g-4">
            <div class="col-12 col-xl-8">

                {{-- Informasi pribadi --}}
                <section class="form-section">
                    <div class="form-section-header">
                        <div class="section-icon">
                            <i class="bi bi-person-vcard" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2 class="section-title">Informasi Pribadi</h2>
                            <p class="section-description">
                                Identitas pengemudi yang tercatat di perusahaan.
                            </p>
                        </div>
                    </div>

                    <div class="form-section-body">
                        <div class="row g-4">

                            <div class="col-12 col-md-6">
                                <label for="nm_driver" class="form-label">
                                    Nama lengkap <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person" aria-hidden="true"></i>
                                    </span>
                                    <input type="text"
                                           name="nm_driver"
                                           id="nm_driver"
                                           class="form-control @error('nm_driver') is-invalid @enderror"
                                           value="{{ old('nm_driver') }}"
                                           maxlength="100"
                                           placeholder="Masukkan nama lengkap"
                                           autocomplete="name"
                                           required
                                           autofocus>
                                </div>
                                @error('nm_driver')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="nik" class="form-label">
                                    Nomor Induk Kependudukan (NIK)
                                    <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-text" aria-hidden="true"></i>
                                    </span>
                                    <input type="text"
                                           name="nik"
                                           id="nik"
                                           class="form-control @error('nik') is-invalid @enderror"
                                           value="{{ old('nik') }}"
                                           maxlength="20"
                                           placeholder="Masukkan NIK"
                                           inputmode="numeric"
                                           required>
                                </div>
                                @error('nik')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-hint">
                                    Pastikan NIK sesuai dengan dokumen identitas.
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="telp" class="form-label">
                                    Nomor telepon <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-telephone" aria-hidden="true"></i>
                                    </span>
                                    <input type="tel"
                                           name="telp"
                                           id="telp"
                                           class="form-control @error('telp') is-invalid @enderror"
                                           value="{{ old('telp') }}"
                                           maxlength="20"
                                           placeholder="Contoh: 081234567890"
                                           autocomplete="tel"
                                           required>
                                </div>
                                @error('telp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="no_sim" class="form-label">
                                    Nomor SIM <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-credit-card-2-front"
                                           aria-hidden="true"></i>
                                    </span>
                                    <input type="text"
                                           name="no_sim"
                                           id="no_sim"
                                           class="form-control @error('no_sim') is-invalid @enderror"
                                           value="{{ old('no_sim') }}"
                                           maxlength="30"
                                           placeholder="Masukkan nomor SIM"
                                           required>
                                </div>
                                @error('no_sim')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label">
                                    Alamat lengkap <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text align-items-start pt-3">
                                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                    </span>
                                    <textarea name="alamat"
                                              id="alamat"
                                              class="form-control @error('alamat') is-invalid @enderror"
                                              rows="3"
                                              placeholder="Masukkan alamat sesuai identitas atau tempat tinggal"
                                              autocomplete="street-address"
                                              required>{{ old('alamat') }}</textarea>
                                </div>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </section>

                {{-- Akun login --}}
                <section class="form-section">
                    <div class="form-section-header">
                        <div class="section-icon">
                            <i class="bi bi-shield-lock" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2 class="section-title">Akun Login Driver</h2>
                            <p class="section-description">
                                Data ini digunakan untuk masuk ke akun Travelin.
                            </p>
                        </div>
                    </div>

                    <div class="form-section-body">
                        <div class="row g-4">

                            <div class="col-12">
                                <label for="email" class="form-label">
                                    Alamat email <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope" aria-hidden="true"></i>
                                    </span>
                                    <input type="email"
                                           name="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="nama@contoh.com"
                                           autocomplete="email"
                                           required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-hint">
                                    Email harus unik dan belum terdaftar pada akun Travelin lain.
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="password" class="form-label">
                                    Kata sandi awal
                                    <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-key" aria-hidden="true"></i>
                                    </span>
                                    <input type="password"
                                           name="password"
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           minlength="8"
                                           autocomplete="new-password"
                                           placeholder="Minimal 8 karakter"
                                           required>
                                    <button type="button"
                                            class="password-toggle"
                                            data-toggle-password="password"
                                            aria-label="Tampilkan kata sandi">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="password-strength">
                                    <div class="password-strength-bar"
                                         id="passwordStrengthBar"></div>
                                </div>
                                <div class="password-feedback" id="passwordFeedback">
                                    Gunakan minimal 8 karakter.
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="password_confirmation" class="form-label">
                                    Konfirmasi kata sandi
                                    <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-shield-check"
                                           aria-hidden="true"></i>
                                    </span>
                                    <input type="password"
                                           name="password_confirmation"
                                           id="password_confirmation"
                                           class="form-control"
                                           minlength="8"
                                           autocomplete="new-password"
                                           placeholder="Ulangi kata sandi"
                                           required>
                                    <button type="button"
                                            class="password-toggle"
                                            data-toggle-password="password_confirmation"
                                            aria-label="Tampilkan konfirmasi kata sandi">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div id="passwordMatchMessage"
                                     class="password-match"
                                     aria-live="polite"></div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>

            {{-- Panel bantuan --}}
            <aside class="col-12 col-xl-4">
                <div class="form-sidebar-card">
                    <h2 class="sidebar-title">
                        <i class="bi bi-info-circle me-2 text-primary"
                           aria-hidden="true"></i>
                        Panduan pengisian
                    </h2>

                    <div class="info-item">
                        <i class="bi bi-person-vcard info-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Identitas harus benar</strong>
                            <p>
                                Periksa nama, NIK, nomor telepon, SIM, dan alamat
                                sebelum menyimpan data.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-envelope-check info-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Gunakan email unik</strong>
                            <p>
                                Satu email hanya dapat digunakan oleh satu akun
                                pengguna Travelin.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-key info-icon" aria-hidden="true"></i>
                        <div>
                            <strong>Buat kata sandi yang aman</strong>
                            <p>
                                Gunakan setidaknya 8 karakter. Hindari kata sandi
                                yang mudah ditebak.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-sidebar-card">
                    <h2 class="sidebar-title">
                        <i class="bi bi-list-check me-2 text-primary"
                           aria-hidden="true"></i>
                        Sebelum menyimpan
                    </h2>

                    <div class="info-item">
                        <i class="bi bi-check-circle info-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Periksa data pribadi</strong>
                            <p>Pastikan semua kolom wajib telah diisi.</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-check-circle info-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Pastikan kata sandi cocok</strong>
                            <p>Kata sandi dan konfirmasinya harus sama.</p>
                        </div>
                    </div>

                    <div class="privacy-note mt-3">
                        <i class="bi bi-shield-lock me-1"
                           aria-hidden="true"></i>
                        Data driver akan dikaitkan dengan perusahaan PT yang sedang
                        login. Jangan membagikan kata sandi melalui tempat umum.
                    </div>
                </div>
            </aside>
        </div>

        {{-- Tombol tindakan --}}
        <div class="form-actions mt-2">
            <div class="small text-muted">
                <i class="bi bi-asterisk text-danger me-1"
                   style="font-size: .55rem;"
                   aria-hidden="true"></i>
                Kolom bertanda bintang wajib diisi.
            </div>

            <div class="action-buttons d-flex gap-2">
                <a href="{{ route('pt.driver.index') }}" class="btn-cancel">
                    <i class="bi bi-x-lg me-1" aria-hidden="true"></i>
                    Batal
                </a>

                <button type="submit" class="btn btn-save" id="saveDriverButton">
                    <i class="bi bi-check2-circle me-1" aria-hidden="true"></i>
                    Simpan Driver
                </button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmationInput = document.getElementById('password_confirmation');
    const strengthBar = document.getElementById('passwordStrengthBar');
    const strengthFeedback = document.getElementById('passwordFeedback');
    const matchMessage = document.getElementById('passwordMatchMessage');
    const form = document.getElementById('createDriverForm');
    const saveButton = document.getElementById('saveDriverButton');

    document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
        button.addEventListener('click', function () {
            const input = document.getElementById(button.dataset.togglePassword);
            const icon = button.querySelector('i');

            if (!input || !icon) return;

            const shouldShow = input.type === 'password';
            input.type = shouldShow ? 'text' : 'password';
            icon.className = shouldShow ? 'bi bi-eye-slash' : 'bi bi-eye';
            button.setAttribute(
                'aria-label',
                shouldShow ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'
            );
        });
    });

    function updatePasswordStrength() {
        const value = passwordInput.value;
        let score = 0;

        if (value.length >= 8) score++;
        if (/[a-z]/.test(value) && /[A-Z]/.test(value)) score++;
        if (/\d/.test(value)) score++;
        if (/[^A-Za-z0-9]/.test(value)) score++;

        const levels = [
            { width: '0%', color: '#e2e8f0', text: 'Gunakan minimal 8 karakter.' },
            { width: '25%', color: '#ef4444', text: 'Kekuatan kata sandi: lemah.' },
            { width: '50%', color: '#f59e0b', text: 'Kekuatan kata sandi: cukup.' },
            { width: '75%', color: '#3b82f6', text: 'Kekuatan kata sandi: baik.' },
            { width: '100%', color: '#16a34a', text: 'Kekuatan kata sandi: kuat.' }
        ];

        const level = value.length === 0
            ? levels[0]
            : levels[Math.max(1, score)];

        strengthBar.style.width = level.width;
        strengthBar.style.backgroundColor = level.color;
        strengthFeedback.textContent = level.text;
    }

    function updatePasswordMatch() {
        if (!confirmationInput.value) {
            matchMessage.textContent = '';
            matchMessage.className = 'password-match';
            confirmationInput.setCustomValidity('');
            return;
        }

        const matches = passwordInput.value === confirmationInput.value;

        matchMessage.textContent = matches
            ? 'Kata sandi sudah cocok.'
            : 'Kata sandi belum cocok.';

        matchMessage.className = matches
            ? 'password-match match'
            : 'password-match no-match';

        confirmationInput.setCustomValidity(
            matches ? '' : 'Konfirmasi kata sandi harus sama.'
        );
    }

    passwordInput.addEventListener('input', function () {
        updatePasswordStrength();
        updatePasswordMatch();
    });

    confirmationInput.addEventListener('input', updatePasswordMatch);

    form.addEventListener('submit', function (event) {
        updatePasswordMatch();

        if (!form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        saveButton.disabled = true;
        saveButton.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Menyimpan...';
    });

    updatePasswordStrength();
});
</script>
@endsection
