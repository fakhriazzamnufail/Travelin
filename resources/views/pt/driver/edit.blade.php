
@extends('layouts.pt')

@section('content')
<style>
    .edit-driver-page {
        --ed-primary: #4338ca;
        --ed-text: #172033;
        --ed-muted: #64748b;
        --ed-border: #e2e8f0;
        color: var(--ed-text);
        padding-bottom: 2rem;
    }

    .edit-driver-page,
    .edit-driver-page * {
        box-sizing: border-box;
    }

    .edit-driver-page .page-title {
        color: #172033 !important;
        font-size: 1.8rem;
        font-weight: 750;
        letter-spacing: -.04em;
        margin-bottom: .45rem;
    }

    .edit-driver-page .page-description {
        color: #64748b !important;
        font-size: .9rem;
        line-height: 1.7;
    }

    .edit-driver-page .back-link {
        color: #475569 !important;
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        font-size: .85rem;
        font-weight: 600;
        text-decoration: none;
        margin-bottom: 1.25rem;
    }

    .edit-driver-page .back-link:hover {
        color: var(--ed-primary) !important;
    }

    .edit-driver-page .breadcrumb {
        font-size: .8rem;
        margin-bottom: .7rem;
    }

    .edit-driver-page .breadcrumb a {
        color: #64748b !important;
        text-decoration: none;
    }

    .edit-driver-page .breadcrumb-item.active {
        color: #334155 !important;
    }

    .edit-driver-page .secure-label {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        padding: .6rem .8rem;
        border-radius: 9px;
        background: #eef2ff;
        color: #3730a3 !important;
        font-size: .78rem;
        font-weight: 650;
    }

    .edit-driver-page .form-section,
    .edit-driver-page .side-card {
        background: #ffffff !important;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 1.25rem;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .035);
    }

    .edit-driver-page .section-header {
        display: flex;
        align-items: center;
        gap: .85rem;
        padding: 1.2rem 1.35rem;
        border-bottom: 1px solid #e8edf4;
        background: #ffffff !important;
    }

    .edit-driver-page .section-icon {
        width: 43px;
        height: 43px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 12px;
        background: #eef2ff;
        color: #4338ca !important;
        font-size: 1.15rem;
    }

    .edit-driver-page .section-title {
        color: #172033 !important;
        font-size: .98rem;
        font-weight: 750;
        margin: 0 0 .25rem;
    }

    .edit-driver-page .section-description {
        color: #64748b !important;
        font-size: .78rem;
        margin: 0;
        line-height: 1.5;
    }

    .edit-driver-page .section-body {
        padding: 1.35rem;
        background: #ffffff !important;
    }

    .edit-driver-page .form-label {
        display: block;
        color: #334155 !important;
        font-size: .82rem;
        font-weight: 650;
        margin-bottom: .5rem;
    }

    .edit-driver-page .required-mark {
        color: #dc2626 !important;
    }

    .edit-driver-page .form-control,
    .edit-driver-page .form-select {
        min-height: 45px;
        width: 100%;
        background-color: #ffffff !important;
        color: #172033 !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 9px;
        font-size: .86rem;
        box-shadow: none;
    }

    .edit-driver-page textarea.form-control {
        min-height: 110px;
        resize: vertical;
        line-height: 1.65;
    }

    .edit-driver-page .form-control::placeholder {
        color: #94a3b8 !important;
        opacity: 1;
    }

    .edit-driver-page .form-control:focus,
    .edit-driver-page .form-select:focus {
        border-color: #818cf8 !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .13) !important;
        outline: none;
    }

    .edit-driver-page .input-group-text {
        min-width: 43px;
        justify-content: center;
        background: #f8fafc !important;
        color: #64748b !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 9px 0 0 9px;
    }

    .edit-driver-page .input-group .form-control {
        border-radius: 0 9px 9px 0;
    }

    .edit-driver-page .form-hint {
        display: block;
        color: #64748b !important;
        font-size: .75rem;
        line-height: 1.6;
        margin-top: .45rem;
    }

    .edit-driver-page .password-toggle {
        border: 1px solid #cbd5e1;
        border-left: 0;
        border-radius: 0 9px 9px 0;
        padding: 0 .9rem;
        color: #475569 !important;
        background: #fff !important;
    }

    .edit-driver-page .password-toggle:hover {
        color: #4338ca !important;
        background: #f8fafc !important;
    }

    .edit-driver-page .status-info {
        padding: .85rem 1rem;
        border: 1px solid #dbeafe;
        border-radius: 10px;
        background: #eff6ff !important;
        color: #1e40af !important;
        font-size: .78rem;
        line-height: 1.6;
    }

    .edit-driver-page .side-card {
        padding: 1.25rem;
    }

    .edit-driver-page .side-title {
        color: #172033 !important;
        font-size: .92rem;
        font-weight: 750;
        margin-bottom: 1.1rem;
    }

    .edit-driver-page .guide-item {
        display: flex;
        align-items: flex-start;
        gap: .7rem;
        margin-bottom: 1.1rem;
    }

    .edit-driver-page .guide-item:last-child {
        margin-bottom: 0;
    }

    .edit-driver-page .guide-icon {
        color: #4338ca !important;
        font-size: 1rem;
        margin-top: .1rem;
    }

    .edit-driver-page .guide-item strong {
        display: block;
        color: #334155 !important;
        font-size: .8rem;
        margin-bottom: .25rem;
    }

    .edit-driver-page .guide-item p {
        color: #64748b !important;
        font-size: .76rem;
        line-height: 1.65;
        margin: 0;
    }

    .edit-driver-page .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 1rem 1.25rem;
        background: #ffffff !important;
        border: 1px solid #e2e8f0;
        border-radius: 13px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
    }

    .edit-driver-page .btn-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .4rem;
        padding: .72rem 1rem;
        color: #475569 !important;
        background: #ffffff !important;
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        font-size: .84rem;
        font-weight: 600;
        text-decoration: none;
    }

    .edit-driver-page .btn-cancel:hover {
        background: #f8fafc !important;
    }

    .edit-driver-page .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .45rem;
        padding: .75rem 1.1rem;
        color: #ffffff !important;
        background: #4338ca !important;
        border: 1px solid #4338ca !important;
        border-radius: 9px;
        font-size: .84rem;
        font-weight: 650;
    }

    .edit-driver-page .btn-save:hover {
        background: #3730a3 !important;
        border-color: #3730a3 !important;
    }

    .edit-driver-page .alert {
        color: #7f1d1d;
        border-radius: 10px;
        font-size: .85rem;
    }

    .edit-driver-page .invalid-feedback {
        font-size: .78rem;
    }

    @media (max-width: 767.98px) {
        .edit-driver-page .page-title {
            font-size: 1.5rem;
        }

        .edit-driver-page .section-header,
        .edit-driver-page .section-body {
            padding: 1rem;
        }

        .edit-driver-page .form-actions {
            align-items: stretch;
            flex-direction: column;
        }

        .edit-driver-page .form-actions > div:last-child {
            display: flex;
            width: 100%;
        }

        .edit-driver-page .form-actions > div:last-child > * {
            flex: 1;
        }
    }
</style>

<div class="container-fluid edit-driver-page">

    <a href="{{ route('pt.driver.index') }}" class="back-link">
        <i class="bi bi-arrow-left" aria-hidden="true"></i>
        Kembali ke daftar driver
    </a>

    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('pt.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('pt.driver.index') }}">Manajemen Driver</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Driver
                    </li>
                </ol>
            </nav>

            <h1 class="page-title">Edit Data Driver</h1>
            <p class="page-description">
                Perbarui informasi pribadi, status, dan akun login pengemudi.
            </p>
        </div>

        <div class="secure-label">
            <i class="bi bi-shield-check" aria-hidden="true"></i>
            Pengelolaan data driver
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-4" role="alert">
            <strong>
                <i class="bi bi-exclamation-triangle-fill me-2"
                   aria-hidden="true"></i>
                Periksa kembali data berikut:
            </strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pt.driver.update', $driver->id_driver) }}"
          method="POST"
          id="editDriverForm">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-12 col-xl-8">

                {{-- Identitas pengemudi --}}
                <section class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="bi bi-person-vcard" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2 class="section-title">Informasi Pribadi</h2>
                            <p class="section-description">
                                Data identitas pengemudi yang terdaftar.
                            </p>
                        </div>
                    </div>

                    <div class="section-body">
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
                                           value="{{ old('nm_driver', $driver->nm_driver) }}"
                                           maxlength="100"
                                           autocomplete="name"
                                           required>
                                </div>
                                @error('nm_driver')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="nik" class="form-label">
                                    NIK <span class="required-mark">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-text" aria-hidden="true"></i>
                                    </span>
                                    <input type="text"
                                           name="nik"
                                           id="nik"
                                           class="form-control @error('nik') is-invalid @enderror"
                                           value="{{ old('nik', $driver->nik) }}"
                                           maxlength="20"
                                           inputmode="numeric"
                                           required>
                                </div>
                                @error('nik')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
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
                                           value="{{ old('telp', $driver->telp) }}"
                                           maxlength="20"
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
                                           value="{{ old('no_sim', $driver->no_sim) }}"
                                           maxlength="30"
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
                                              autocomplete="street-address"
                                              required>{{ old('alamat', $driver->alamat) }}</textarea>
                                </div>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="status" class="form-label">
                                    Status driver <span class="required-mark">*</span>
                                </label>
                                <select name="status"
                                        id="status"
                                        class="form-select @error('status') is-invalid @enderror"
                                        required>
                                    <option value="aktif"
                                        {{ old('status', $driver->status) === 'aktif' ? 'selected' : '' }}>
                                        Aktif — driver dapat beroperasi
                                    </option>
                                    <option value="nonaktif"
                                        {{ old('status', $driver->status) === 'nonaktif' ? 'selected' : '' }}>
                                        Nonaktif — driver tidak beroperasi
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                                <div class="form-hint">
                                    Pilih status sesuai kondisi pengemudi saat ini.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Akun login --}}
                <section class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="bi bi-shield-lock" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h2 class="section-title">Akun Login Driver</h2>
                            <p class="section-description">
                                Perbarui email atau kata sandi jika diperlukan.
                            </p>
                        </div>
                    </div>

                    <div class="section-body">
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
                                           value="{{ old('email', $driver->user?->email) }}"
                                           maxlength="255"
                                           autocomplete="email"
                                           required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-hint">
                                    Email harus unik di antara seluruh akun Travelin.
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="password" class="form-label">
                                    Kata sandi baru (opsional)
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
                                           placeholder="Kosongkan jika tidak diubah">
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
                                <div class="form-hint">
                                    Minimal 8 karakter. Kosongkan untuk mempertahankan kata sandi lama.
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="password_confirmation" class="form-label">
                                    Konfirmasi kata sandi baru
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
                                           placeholder="Ulangi kata sandi baru">
                                    <button type="button"
                                            class="password-toggle"
                                            data-toggle-password="password_confirmation"
                                            aria-label="Tampilkan konfirmasi kata sandi">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div id="passwordMatchMessage"
                                     class="form-hint"
                                     aria-live="polite"></div>
                            </div>

                            <div class="col-12">
                                <div class="status-info">
                                    <i class="bi bi-info-circle me-1"
                                       aria-hidden="true"></i>
                                    Kata sandi lama tidak ditampilkan demi keamanan.
                                    Isi kedua kolom kata sandi hanya jika ingin menggantinya.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            {{-- Panduan samping --}}
            <aside class="col-12 col-xl-4">
                <div class="side-card">
                    <h2 class="side-title">
                        <i class="bi bi-info-circle me-2"
                           style="color: #4338ca;"
                           aria-hidden="true"></i>
                        Panduan perubahan
                    </h2>

                    <div class="guide-item">
                        <i class="bi bi-person-check guide-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Periksa identitas</strong>
                            <p>Pastikan data pengemudi sesuai dengan dokumen yang valid.</p>
                        </div>
                    </div>

                    <div class="guide-item">
                        <i class="bi bi-toggle-on guide-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Perhatikan status driver</strong>
                            <p>Status harus sesuai dengan kondisi operasional pengemudi.</p>
                        </div>
                    </div>

                    <div class="guide-item">
                        <i class="bi bi-envelope-check guide-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Gunakan email aktif</strong>
                            <p>Pastikan email benar dan belum digunakan akun lain.</p>
                        </div>
                    </div>

                    <div class="guide-item">
                        <i class="bi bi-shield-lock guide-icon"
                           aria-hidden="true"></i>
                        <div>
                            <strong>Kata sandi bersifat opsional</strong>
                            <p>Biarkan kosong jika tidak ingin mengubah kata sandi saat ini.</p>
                        </div>
                    </div>
                </div>

                <div class="side-card">
                    <h2 class="side-title">
                        <i class="bi bi-shield-check me-2"
                           style="color: #4338ca;"
                           aria-hidden="true"></i>
                        Keamanan data
                    </h2>
                    <p class="small mb-0" style="color: #64748b; line-height: 1.8;">
                        Perubahan hanya akan diproses setelah formulir dikirim dan
                        lolos validasi server. Pastikan seluruh informasi telah benar
                        sebelum menyimpan.
                    </p>
                </div>
            </aside>
        </div>

        {{-- Tombol aksi --}}
        <div class="form-actions mt-2">
            <div class="small" style="color: #64748b;">
                <i class="bi bi-asterisk text-danger me-1"
                   style="font-size: .55rem;"
                   aria-hidden="true"></i>
                Kolom bertanda bintang wajib diisi.
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('pt.driver.index') }}" class="btn-cancel">
                    <i class="bi bi-x-lg" aria-hidden="true"></i>
                    Batal
                </a>

                <button type="submit" class="btn btn-save" id="saveDriverButton">
                    <i class="bi bi-check2-circle" aria-hidden="true"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');
    const matchMessage = document.getElementById('passwordMatchMessage');
    const form = document.getElementById('editDriverForm');
    const saveButton = document.getElementById('saveDriverButton');

    document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
        button.addEventListener('click', function () {
            const input = document.getElementById(button.dataset.togglePassword);
            const icon = button.querySelector('i');

            if (!input || !icon) return;

            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';

            button.setAttribute(
                'aria-label',
                show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'
            );
        });
    });

    function checkPasswordMatch() {
        if (!password.value && !confirmation.value) {
            matchMessage.textContent = '';
            confirmation.setCustomValidity('');
            return true;
        }

        if (password.value === confirmation.value && password.value.length >= 8) {
            matchMessage.textContent = 'Konfirmasi kata sandi cocok.';
            matchMessage.style.color = '#15803d';
            confirmation.setCustomValidity('');
            return true;
        }

        if (!confirmation.value) {
            matchMessage.textContent = 'Isi konfirmasi jika ingin mengganti kata sandi.';
            matchMessage.style.color = '#b45309';
            confirmation.setCustomValidity('Konfirmasi kata sandi wajib diisi jika kata sandi baru diisi.');
            return false;
        }

        matchMessage.textContent = 'Kata sandi baru dan konfirmasi belum cocok.';
        matchMessage.style.color = '#dc2626';
        confirmation.setCustomValidity('Konfirmasi kata sandi harus sama dengan kata sandi baru.');
        return false;
    }

    password.addEventListener('input', checkPasswordMatch);
    confirmation.addEventListener('input', checkPasswordMatch);

    form.addEventListener('submit', function (event) {
        if (!checkPasswordMatch() || !form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        saveButton.disabled = true;
        saveButton.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Menyimpan...';
    });
});
</script>
@endsection
