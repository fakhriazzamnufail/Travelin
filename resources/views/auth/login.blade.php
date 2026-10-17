<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login - Travelin</title>

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
            color: #ffffff;
            overflow-x: hidden;
        }


        /* =====================================================
           BACKGROUND
        ===================================================== */

        .login-page {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #07111f 0%,
                    #0c1c32 45%,
                    #102b4c 100%
                );
        }


        /* Cahaya besar */

        .light {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(2px);
        }

        .light-one {
            width: 500px;
            height: 500px;

            top: -250px;
            left: -180px;

            background:
                radial-gradient(
                    circle,
                    rgba(59, 130, 246, 0.30),
                    transparent 70%
                );
        }

        .light-two {
            width: 550px;
            height: 550px;

            right: -250px;
            bottom: -250px;

            background:
                radial-gradient(
                    circle,
                    rgba(14, 165, 233, 0.22),
                    transparent 70%
                );
        }

        .light-three {
            width: 300px;
            height: 300px;

            top: 35%;
            right: 35%;

            background:
                radial-gradient(
                    circle,
                    rgba(96, 165, 250, 0.10),
                    transparent 70%
                );
        }


        /* =====================================================
           GLASS CONTAINER
        ===================================================== */

        .glass-container {

            width: min(1100px, 100%);

            min-height: 650px;

            display: grid;
            grid-template-columns: 1.05fr 0.95fr;

            position: relative;
            z-index: 2;

            border-radius: 30px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255, 255, 255, 0.13),
                    rgba(255, 255, 255, 0.045)
                );

            border: 1px solid rgba(255, 255, 255, 0.18);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.40),
                inset 0 1px 0 rgba(255, 255, 255, 0.20);

            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);

            overflow: hidden;
        }


        /* Kilauan bagian atas */

        .glass-container::before {

            content: "";

            position: absolute;

            top: 0;
            left: 0;
            right: 0;

            height: 1px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,0.65),
                    transparent
                );
        }


        /* =====================================================
           LEFT
        ===================================================== */

        .login-intro {

            position: relative;

            display: flex;
            flex-direction: column;
            justify-content: center;

            padding: 70px;

            border-right:
                1px solid rgba(255,255,255,0.10);
        }


        /* Brand */

        .brand {

            display: flex;
            align-items: center;
            gap: 14px;

            margin-bottom: 55px;
        }

        .brand-icon {

            width: 56px;
            height: 56px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 17px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.22),
                    rgba(255,255,255,0.07)
                );

            border:
                1px solid rgba(255,255,255,0.20);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.25),
                0 10px 30px rgba(0,0,0,0.15);

            backdrop-filter: blur(15px);
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
            opacity: 0.80;
        }


        /* Hero */

        .hero-title {

            margin: 0 0 22px;

            font-size: clamp(42px, 5vw, 62px);

            line-height: 1.05;

            letter-spacing: -3px;

            font-weight: 800;
        }

        .hero-title span {

            display: block;

            background:
                linear-gradient(
                    90deg,
                    #ffffff,
                    rgba(255,255,255,0.45)
                );

            -webkit-background-clip: text;
            background-clip: text;

            color: transparent;
        }

        .hero-description {

            max-width: 440px;

            margin: 0 0 42px;

            color:
                rgba(255,255,255,0.64);

            font-size: 15px;

            line-height: 1.8;
        }


        /* Features */

        .features {

            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feature {

            display: flex;
            align-items: center;
            gap: 13px;

            color:
                rgba(255,255,255,0.78);

            font-size: 13px;
        }

        .feature-icon {

            width: 34px;
            height: 34px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background:
                rgba(255,255,255,0.08);

            border:
                1px solid rgba(255,255,255,0.10);

            color:
                rgba(255,255,255,0.90);
        }


        /* =====================================================
           RIGHT LOGIN
        ===================================================== */

        .login-section {

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 55px;
        }

        .login-card {

            width: 100%;
            max-width: 370px;
        }


        /* Heading */

        .login-heading {

            margin-bottom: 32px;
        }

        .login-heading h1 {

            margin: 0 0 9px;

            font-size: 31px;

            font-weight: 800;

            letter-spacing: -1px;
        }

        .login-heading p {

            margin: 0;

            color:
                rgba(255,255,255,0.52);

            font-size: 14px;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert-box {

            padding: 13px 15px;

            border-radius: 14px;

            margin-bottom: 20px;

            font-size: 13px;

            background:
                rgba(255,255,255,0.08);

            border:
                1px solid rgba(255,255,255,0.12);

            backdrop-filter: blur(10px);
        }

        .alert-error {

            color: #fecaca;

            background:
                rgba(239,68,68,0.10);

            border-color:
                rgba(248,113,113,0.20);
        }

        .alert-success {

            color: #bbf7d0;

            background:
                rgba(34,197,94,0.10);

            border-color:
                rgba(74,222,128,0.20);
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {

            display: block;

            margin-bottom: 8px;

            font-size: 13px;

            font-weight: 600;

            color:
                rgba(255,255,255,0.75);
        }


        .input-wrapper {
            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 16px;
            top: 50%;

            transform: translateY(-50%);

            color:
                rgba(255,255,255,0.38);

            font-size: 17px;

            pointer-events: none;

            z-index: 2;
        }


        .form-input {

            width: 100%;

            height: 54px;

            padding:
                0 48px;

            border-radius: 15px;

            outline: none;

            color: white;

            font-size: 14px;

            background:
                rgba(255,255,255,0.075);

            border:
                1px solid rgba(255,255,255,0.13);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.06);

            transition:
                0.25s ease;

            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
        }

        .form-input:hover {

            background:
                rgba(255,255,255,0.095);

            border-color:
                rgba(255,255,255,0.20);
        }

        .form-input:focus {

            background:
                rgba(255,255,255,0.12);

            border-color:
                rgba(147,197,253,0.60);

            box-shadow:
                0 0 0 4px rgba(59,130,246,0.10),
                inset 0 1px 0 rgba(255,255,255,0.10);
        }

        .form-input::placeholder {

            color:
                rgba(255,255,255,0.32);
        }


        /* Password */

        .password-toggle {

            position: absolute;

            right: 13px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color:
                rgba(255,255,255,0.40);

            cursor: pointer;

            font-size: 17px;

            padding: 6px;

            transition: 0.2s;
        }

        .password-toggle:hover {

            color: white;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .login-button {

            width: 100%;

            height: 54px;

            margin-top: 7px;

            border: 1px solid
                rgba(255,255,255,0.25);

            border-radius: 15px;

            color: white;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            background:
                linear-gradient(
                    135deg,
                    rgba(59,130,246,0.90),
                    rgba(37,99,235,0.72)
                );

            box-shadow:
                0 12px 30px rgba(37,99,235,0.22),
                inset 0 1px 0 rgba(255,255,255,0.25);

            backdrop-filter: blur(15px);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .login-button:hover {

            transform: translateY(-2px);

            background:
                linear-gradient(
                    135deg,
                    rgba(96,165,250,0.95),
                    rgba(37,99,235,0.82)
                );

            box-shadow:
                0 17px 35px rgba(37,99,235,0.30),
                inset 0 1px 0 rgba(255,255,255,0.30);
        }

        .login-button:active {

            transform: translateY(0);
        }


        /* =====================================================
           REGISTER
        ===================================================== */

        .register-area {

            margin-top: 25px;

            text-align: center;

            font-size: 13px;

            color:
                rgba(255,255,255,0.45);
        }

        .register-area a {

            color:
                rgba(147,197,253,0.95);

            font-weight: 700;

            text-decoration: none;

            transition: 0.2s;
        }

        .register-area a:hover {

            color: white;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .login-footer {

            margin-top: 42px;

            text-align: center;

            font-size: 11px;

            color:
                rgba(255,255,255,0.25);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .glass-container {

                grid-template-columns: 1fr;

                max-width: 500px;

                min-height: auto;
            }

            .login-intro {

                padding: 45px;

                border-right: none;

                border-bottom:
                    1px solid rgba(255,255,255,0.10);
            }

            .brand {

                margin-bottom: 35px;
            }

            .hero-title {

                font-size: 45px;
            }

            .features {

                display: none;
            }

            .login-section {

                padding: 45px;
            }
        }


        @media (max-width: 500px) {

            .login-page {

                padding: 15px;
            }

            .glass-container {

                border-radius: 24px;
            }

            .login-intro {

                padding: 35px 25px;
            }

            .login-section {

                padding: 35px 25px;
            }

            .hero-title {

                font-size: 39px;

                letter-spacing: -2px;
            }

            .hero-description {

                font-size: 13px;
            }
        }

    </style>

</head>


<body>


    <div class="login-page">


        {{-- =====================================================
             BACKGROUND LIGHT
        ====================================================== --}}

        <div class="light light-one"></div>

        <div class="light light-two"></div>

        <div class="light light-three"></div>



        {{-- =====================================================
             GLASS CONTAINER
        ====================================================== --}}

        <div class="glass-container">


            {{-- =================================================
                 LEFT SECTION
            ================================================== --}}

            <section class="login-intro">


                {{-- Brand --}}
                <div class="brand">

                    <div class="brand-icon">

                        <i class="bi bi-bus-front-fill"></i>

                    </div>


                    <div class="brand-name">

                        <span>TRAVEL</span>IN

                    </div>

                </div>



                {{-- Hero --}}
                <h2 class="hero-title">

                    Perjalanan
                    <span>tanpa ribet.</span>

                </h2>


                <p class="hero-description">

                    Satu platform untuk mengelola
                    perjalanan antar kota dan provinsi
                    dengan lebih mudah, cepat, dan
                    terorganisir.

                </p>



                {{-- Features --}}
                <div class="features">


                    <div class="feature">

                        <div class="feature-icon">

                            <i class="bi bi-shield-check"></i>

                        </div>

                        <span>
                            Aman dan terpercaya
                        </span>

                    </div>


                    <div class="feature">

                        <div class="feature-icon">

                            <i class="bi bi-calendar-check"></i>

                        </div>

                        <span>
                            Kelola perjalanan dengan mudah
                        </span>

                    </div>


                    <div class="feature">

                        <div class="feature-icon">

                            <i class="bi bi-lightning-charge"></i>

                        </div>

                        <span>
                            Cepat dan efisien
                        </span>

                    </div>


                </div>


            </section>



            {{-- =================================================
                 RIGHT SECTION
            ================================================== --}}

            <section class="login-section">


                <div class="login-card">


                    {{-- Heading --}}
                    <div class="login-heading">

                        <h1>
                            Selamat datang 👋
                        </h1>

                        <p>
                            Masuk untuk melanjutkan ke Travelin.
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



                    {{-- Success --}}
                    @if (session('success'))

                        <div class="alert-box alert-success">

                            {{ session('success') }}

                        </div>

                    @endif



                    {{-- Login Form --}}
                    <form action="{{ route('login.process') }}"
                        method="POST">

                        @csrf


                        {{-- Email --}}
                        <div class="form-group">

                            <label
                                for="email"
                                class="form-label">

                                Email

                            </label>


                            <div class="input-wrapper">

                                <i class="bi bi-envelope input-icon"></i>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-input"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email"
                                    autocomplete="email"
                                    required>

                            </div>

                        </div>



                        {{-- Password --}}
                        <div class="form-group">

                            <label
                                for="password"
                                class="form-label">

                                Password

                            </label>


                            <div class="input-wrapper">

                                <i class="bi bi-lock input-icon"></i>


                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-input"
                                    placeholder="Masukkan password"
                                    autocomplete="current-password"
                                    required>


                                <button
                                    type="button"
                                    class="password-toggle"
                                    id="togglePassword">

                                    <i
                                        class="bi bi-eye"
                                        id="passwordIcon">
                                    </i>

                                </button>

                            </div>

                        </div>



                        {{-- Login --}}
                        <button
                            type="submit"
                            class="login-button">

                            <i class="bi bi-arrow-right-circle me-2"></i>

                            Masuk ke Travelin

                        </button>


                    </form>



                    {{-- Register --}}
                    <div class="register-area">

                        Belum memiliki akun PT?

                        <a href="{{ route('pt.register') }}">
                            Daftar sebagai PT
                        </a>

                    </div>



                    {{-- Footer --}}
                    <div class="login-footer">

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

    </script>


</body>

</html>