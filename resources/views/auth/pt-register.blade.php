<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar PT Travel - Travelin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            background: #07111f;
            color: white;
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .register-page {

            min-height: 100vh;

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 30px;

            overflow: hidden;

            background:
                linear-gradient(135deg,
                    #07111f 0%,
                    #0c1c32 45%,
                    #102b4c 100%);
        }


        /* =====================================================
           BACKGROUND LIGHT
        ===================================================== */

        .light {

            position: absolute;

            border-radius: 50%;

            pointer-events: none;
        }


        .light-one {

            width: 500px;
            height: 500px;

            top: -250px;
            left: -180px;

            background:
                radial-gradient(circle,
                    rgba(59, 130, 246, 0.28),
                    transparent 70%);
        }


        .light-two {

            width: 550px;
            height: 550px;

            right: -250px;
            bottom: -250px;

            background:
                radial-gradient(circle,
                    rgba(14, 165, 233, 0.20),
                    transparent 70%);
        }


        .light-three {

            width: 350px;
            height: 350px;

            top: 25%;
            right: 35%;

            background:
                radial-gradient(circle,
                    rgba(96, 165, 250, 0.08),
                    transparent 70%);
        }


        /* =====================================================
           GLASS CARD
        ===================================================== */

        .register-container {

            width: min(1050px, 100%);

            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns: 0.85fr 1.15fr;

            border-radius: 30px;

            overflow: hidden;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, 0.13),
                    rgba(255, 255, 255, 0.045));

            border:
                1px solid rgba(255, 255, 255, 0.18);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.40),
                inset 0 1px 0 rgba(255, 255, 255, 0.20);

            backdrop-filter: blur(30px);

            -webkit-backdrop-filter: blur(30px);
        }


        /* =====================================================
           LEFT INFORMATION
        ===================================================== */

        .register-info {

            padding: 60px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            border-right:
                1px solid rgba(255, 255, 255, 0.10);
        }


        /* Brand */

        .brand {

            display: flex;

            align-items: center;

            gap: 14px;

            margin-bottom: 45px;
        }


        .brand-icon {

            width: 55px;

            height: 55px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 16px;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, 0.20),
                    rgba(255, 255, 255, 0.06));

            border:
                1px solid rgba(255, 255, 255, 0.18);

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.25);
        }


        .brand-icon i {

            font-size: 27px;
        }


        .brand-name {

            font-size: 25px;

            font-weight: 800;

            letter-spacing: -1px;
        }


        .brand-name span {

            font-weight: 400;

            opacity: 0.75;
        }


        /* Heading */

        .info-title {

            margin: 0 0 20px;

            font-size: 42px;

            line-height: 1.08;

            letter-spacing: -2px;

            font-weight: 800;
        }


        .info-title span {

            display: block;

            color:
                rgba(255, 255, 255, 0.45);
        }


        .info-description {

            margin: 0 0 35px;

            max-width: 390px;

            color:
                rgba(255, 255, 255, 0.58);

            font-size: 14px;

            line-height: 1.8;
        }


        /* Steps */

        .steps {

            display: flex;

            flex-direction: column;

            gap: 16px;
        }


        .step {

            display: flex;

            align-items: center;

            gap: 13px;

            color:
                rgba(255, 255, 255, 0.72);

            font-size: 13px;
        }


        .step-number {

            width: 32px;

            height: 32px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

            background:
                rgba(255, 255, 255, 0.08);

            border:
                1px solid rgba(255, 255, 255, 0.12);

            font-size: 12px;

            font-weight: 700;
        }


        /* =====================================================
           REGISTER FORM
        ===================================================== */

        .register-form-section {

            padding: 50px 60px;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .register-card {

            width: 100%;

            max-width: 470px;
        }


        /* Heading */

        .form-heading {

            margin-bottom: 28px;
        }


        .form-heading h1 {

            margin: 0 0 8px;

            font-size: 30px;

            font-weight: 800;

            letter-spacing: -1px;
        }


        .form-heading p {

            margin: 0;

            color:
                rgba(255, 255, 255, 0.48);

            font-size: 13px;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert-box {

            padding: 13px 15px;

            margin-bottom: 18px;

            border-radius: 13px;

            font-size: 13px;

            background:
                rgba(255, 255, 255, 0.07);

            border:
                1px solid rgba(255, 255, 255, 0.12);
        }


        .alert-error {

            color: #fecaca;

            background:
                rgba(239, 68, 68, 0.10);

            border-color:
                rgba(248, 113, 113, 0.20);
        }


        /* =====================================================
           FORM GRID
        ===================================================== */

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 16px;
        }


        .form-group {

            margin-bottom: 17px;
        }


        .form-group.full {

            grid-column: 1 / -1;
        }


        .form-label {

            display: block;

            margin-bottom: 7px;

            font-size: 12px;

            font-weight: 600;

            color:
                rgba(255, 255, 255, 0.70);
        }


        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color:
                rgba(255, 255, 255, 0.35);

            font-size: 16px;

            pointer-events: none;
        }


        .form-input,
        .form-textarea {

            width: 100%;

            border-radius: 13px;

            outline: none;

            color: white;

            font-size: 13px;

            background:
                rgba(255, 255, 255, 0.07);

            border:
                1px solid rgba(255, 255, 255, 0.12);

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.05);

            transition: 0.25s ease;
        }


        .form-input {

            height: 49px;

            padding:
                0 14px 0 43px;
        }


        .form-textarea {

            min-height: 90px;

            padding: 13px 14px;

            resize: vertical;
        }


        .form-input:focus,
        .form-textarea:focus {

            background:
                rgba(255, 255, 255, 0.11);

            border-color:
                rgba(147, 197, 253, 0.60);

            box-shadow:
                0 0 0 4px rgba(59, 130, 246, 0.09);
        }


        .form-input::placeholder,
        .form-textarea::placeholder {

            color:
                rgba(255, 255, 255, 0.28);
        }


        /* =====================================================
           PASSWORD
        ===================================================== */

        .password-toggle {

            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color:
                rgba(255, 255, 255, 0.38);

            cursor: pointer;

            padding: 5px;

            font-size: 16px;
        }


        .password-toggle:hover {

            color: white;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .register-button {

            width: 100%;

            height: 52px;

            border-radius: 14px;

            border:
                1px solid rgba(255, 255, 255, 0.22);

            color: white;

            background:
                linear-gradient(135deg,
                    rgba(59, 130, 246, 0.90),
                    rgba(37, 99, 235, 0.70));

            box-shadow:
                0 12px 30px rgba(37, 99, 235, 0.20),
                inset 0 1px 0 rgba(255, 255, 255, 0.25);

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s ease;
        }


        .register-button:hover {

            transform: translateY(-2px);

            box-shadow:
                0 16px 35px rgba(37, 99, 235, 0.28),
                inset 0 1px 0 rgba(255, 255, 255, 0.30);
        }


        /* =====================================================
           LOGIN LINK
        ===================================================== */

        .login-link {

            text-align: center;

            margin-top: 20px;

            font-size: 13px;

            color:
                rgba(255, 255, 255, 0.42);
        }


        .login-link a {

            color:
                rgba(147, 197, 253, 0.95);

            text-decoration: none;

            font-weight: 700;
        }


        .login-link a:hover {

            color: white;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .register-footer {

            margin-top: 25px;

            text-align: center;

            font-size: 10px;

            color:
                rgba(255, 255, 255, 0.22);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .register-container {

                grid-template-columns: 1fr;

                max-width: 550px;
            }


            .register-info {

                padding: 40px;

                border-right: none;

                border-bottom:
                    1px solid rgba(255, 255, 255, 0.10);
            }


            .info-title {

                font-size: 38px;
            }


            .steps {

                display: none;
            }


            .register-form-section {

                padding: 40px;
            }
        }


        @media (max-width: 520px) {

            .register-page {

                padding: 15px;
            }


            .register-container {

                border-radius: 24px;
            }


            .register-info {

                padding: 30px 25px;
            }


            .register-form-section {

                padding: 30px 25px;
            }


            .form-grid {

                grid-template-columns: 1fr;
            }


            .form-group.full {

                grid-column: auto;
            }


            .info-title {

                font-size: 34px;
            }
        }

        .alert-success-custom {
            display: flex;
            align-items: flex-start;
            gap: 15px;

            padding: 18px 20px;
            margin-bottom: 25px;

            border: 1px solid #bbf7d0;
            border-radius: 15px;

            background: #f0fdf4;
            color: #166534;
        }

        .success-icon {
            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #dcfce7;
            color: #16a34a;

            font-size: 21px;
        }

        .success-content h5 {
            margin: 0 0 6px;

            font-size: 16px;
            font-weight: 700;
        }

        .success-content p {
            margin: 0 0 5px;

            font-size: 14px;
            line-height: 1.6;
        }

        .success-content small {
            color: #4d7c0f;
            line-height: 1.5;
        }
    </style>

</head>


<body>


    <div class="register-page">


        {{-- Background --}}
        <div class="light light-one"></div>

        <div class="light light-two"></div>

        <div class="light light-three"></div>



        {{-- =====================================================
        GLASS CONTAINER
        ====================================================== --}}

        <div class="register-container">


            {{-- =================================================
            LEFT INFORMATION
            ================================================== --}}

            <section class="register-info">


                {{-- Brand --}}
                <div class="brand">

                    <div class="brand-icon">

                        <i class="bi bi-bus-front-fill"></i>

                    </div>


                    <div class="brand-name">

                        <span>TRAVEL</span>IN

                    </div>

                </div>



                {{-- Title --}}
                <h2 class="info-title">

                    Bergabung
                    <span>bersama Travelin.</span>

                </h2>


                <p class="info-description">

                    Daftarkan perusahaan travel Anda
                    dan mulai kelola kendaraan, driver,
                    perjalanan, serta booking melalui
                    satu platform.

                </p>



                {{-- Steps --}}
                <div class="steps">


                    <div class="step">

                        <div class="step-number">
                            01
                        </div>

                        <span>
                            Isi data perusahaan
                        </span>

                    </div>


                    <div class="step">

                        <div class="step-number">
                            02
                        </div>

                        <span>
                            Tunggu verifikasi admin
                        </span>

                    </div>


                    <div class="step">

                        <div class="step-number">
                            03
                        </div>

                        <span>
                            Mulai kelola Travel Anda
                        </span>

                    </div>


                </div>

            </section>



            {{-- =================================================
            REGISTER FORM
            ================================================== --}}

            <section class="register-form-section">


                <div class="register-card">


                    {{-- Heading --}}
                    <div class="form-heading">

                        <h1>
                            Daftar PT Travel
                        </h1>

                        <p>
                            Lengkapi data berikut untuk mendaftarkan
                            perusahaan Anda.
                        </p>

                    </div>



                    {{-- Error --}}
                    @if ($errors->any())

                    <div class="alert-box alert-error">

                        @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                        @endforeach

                    </div>

                    @endif
                    @if(session('success'))
                    <div class="alert-success-custom">

                        <div class="success-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                        <div class="success-content">
                            <h5>Pendaftaran PT Berhasil</h5>

                            <p>
                                PT Anda berhasil mendaftar di Travelin.
                                Pendaftaran Anda saat ini sedang menunggu
                                konfirmasi dari admin.
                            </p>

                            <small>
                                Setelah disetujui admin, Anda dapat masuk ke
                                sistem menggunakan akun yang telah didaftarkan.
                            </small>
                        </div>

                    </div>
                    @endif


                    {{-- Form --}}
                    <form action="{{ route('pt.register.store') }}" method="POST">

                        @csrf

                        <div class="form-grid">

                            {{-- =================================================
                            NAMA PEMILIK
                            ================================================== --}}
                            <div class="form-group">

                                <label for="name" class="form-label">

                                    Nama Pemilik / Penanggung Jawab

                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-person input-icon"></i>

                                    <input type="text" id="name" name="name" class="form-input"
                                        value="{{ old('name') }}" placeholder="Nama lengkap" autocomplete="name"
                                        required>

                                </div>

                            </div>


                            {{-- =================================================
                            EMAIL
                            ================================================== --}}
                            <div class="form-group">

                                <label for="email" class="form-label">

                                    Email

                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-envelope input-icon"></i>

                                    <input type="email" id="email" name="email" class="form-input"
                                        value="{{ old('email') }}" placeholder="Email perusahaan" autocomplete="email"
                                        required>

                                </div>

                            </div>


                            {{-- =================================================
                            PASSWORD
                            ================================================== --}}
                            <div class="form-group">

                                <label for="password" class="form-label">

                                    Password

                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-lock input-icon"></i>

                                    <input type="password" id="password" name="password" class="form-input"
                                        placeholder="Buat password" autocomplete="new-password" required>

                                    <button type="button" class="password-toggle" id="togglePassword">

                                        <i class="bi bi-eye" id="passwordIcon">
                                        </i>

                                    </button>

                                </div>

                                @error('password')
                                <small style="color: #fecaca;">
                                    {{ $message }}
                                </small>
                                @enderror

                            </div>


                            {{-- =================================================
                            KONFIRMASI PASSWORD
                            ================================================== --}}
                            <div class="form-group">

                                <label for="password_confirmation" class="form-label">

                                    Konfirmasi Password

                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-lock input-icon"></i>

                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-input" placeholder="Ulangi password" autocomplete="new-password"
                                        required>

                                    <button type="button" class="password-toggle" id="togglePasswordConfirmation">

                                        <i class="bi bi-eye" id="passwordConfirmationIcon">
                                        </i>

                                    </button>

                                </div>

                                @error('password_confirmation')
                                <small style="color: #fecaca;">
                                    {{ $message }}
                                </small>
                                @enderror

                            </div>


                            {{-- =================================================
                            NAMA PT
                            ================================================== --}}
                            <div class="form-group">

                                <label for="nm_pt" class="form-label">

                                    Nama PT Travel

                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-building input-icon"></i>

                                    <input type="text" id="nm_pt" name="nm_pt" class="form-input"
                                        value="{{ old('nm_pt') }}" placeholder="Contoh: PT Travelin Jaya" required>

                                </div>

                            </div>


                            {{-- =================================================
                            NOMOR TELEPON
                            ================================================== --}}
                            <div class="form-group">

                                <label for="telp" class="form-label">

                                    Nomor Telepon

                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-telephone input-icon"></i>

                                    <input type="text" id="telp" name="telp" class="form-input"
                                        value="{{ old('telp') }}" placeholder="08xxxxxxxxxx" required>

                                </div>

                            </div>


                            {{-- =================================================
                            ALAMAT
                            ================================================== --}}
                            <div class="form-group full">

                                <label for="alamat" class="form-label">

                                    Alamat PT Travel

                                </label>

                                <div class="input-wrapper">



                                    <textarea id="alamat" name="alamat" class="form-textarea"
                                        placeholder="Masukkan alamat lengkap perusahaan"
                                        required>{{ old('alamat') }}</textarea>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                        TOMBOL DAFTAR
                        ================================================== --}}
                        <button type="submit" class="register-button">

                            <i class="bi bi-building-add me-2"></i>

                            Daftarkan PT Travel

                        </button>

                    </form>



                    {{-- Login --}}
                    <div class="login-link">

                        Sudah memiliki akun?

                        <a href="{{ route('login') }}">
                            Masuk ke Travelin
                        </a>

                    </div>



                    {{-- Footer --}}
                    <div class="register-footer">

                        © 2026 Travelin · All rights reserved.

                    </div>


                </div>

            </section>


        </div>

    </div>



    {{-- =====================================================
    PASSWORD TOGGLE
    ====================================================== --}}

    <script>

        // =====================================================
        // PASSWORD
        // =====================================================

        const togglePassword =
            document.getElementById('togglePassword');

        const password =
            document.getElementById('password');

        const passwordIcon =
            document.getElementById('passwordIcon');


        togglePassword.addEventListener('click', function () {

            const isPassword =
                password.type === 'password';

            password.type =
                isPassword ? 'text' : 'password';

            passwordIcon.classList.toggle(
                'bi-eye',
                !isPassword
            );

            passwordIcon.classList.toggle(
                'bi-eye-slash',
                isPassword
            );

        });


        // =====================================================
        // KONFIRMASI PASSWORD
        // =====================================================

        const togglePasswordConfirmation =
            document.getElementById('togglePasswordConfirmation');

        const passwordConfirmation =
            document.getElementById('password_confirmation');

        const passwordConfirmationIcon =
            document.getElementById('passwordConfirmationIcon');


        togglePasswordConfirmation.addEventListener('click', function () {

            const isPassword =
                passwordConfirmation.type === 'password';

            passwordConfirmation.type =
                isPassword ? 'text' : 'password';

            passwordConfirmationIcon.classList.toggle(
                'bi-eye',
                !isPassword
            );

            passwordConfirmationIcon.classList.toggle(
                'bi-eye-slash',
                isPassword
            );

        });

    </script>


</body>

</html>