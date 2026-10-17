<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Travelin - Perjalanan Lebih Mudah</title>

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #07152f;
            color: #ffffff;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* =====================================================
           BACKGROUND
        ===================================================== */

        .page {
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(37, 99, 235, 0.18),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 30%,
                    rgba(59, 130, 246, 0.14),
                    transparent 32%
                ),
                linear-gradient(
                    135deg,
                    #07152f 0%,
                    #0b1b38 45%,
                    #102b55 100%
                );
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            position: absolute;
            top: 0;
            left: 0;

            width: 100%;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 25px 7%;

            z-index: 20;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            color: #ffffff;
        }

        .brand-icon {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.18);

            backdrop-filter: blur(15px);

            font-size: 21px;
        }

        .brand-name {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-login {
            padding: 11px 21px;

            color: #ffffff;

            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 10px;

            background: rgba(255, 255, 255, 0.06);

            backdrop-filter: blur(12px);

            transition: 0.3s;
        }

        .nav-login:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        .nav-register {
            padding: 11px 21px;

            color: #0f172a;
            background: #ffffff;

            border-radius: 10px;

            font-weight: 600;

            transition: 0.3s;
        }

        .nav-register:hover {
            transform: translateY(-2px);
        }

        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            min-height: 760px;

            display: flex;
            align-items: center;

            position: relative;
            overflow: hidden;
        }

        .hero-container {
            width: 86%;
            max-width: 1200px;

            margin: 0 auto;

            padding-top: 80px;

            display: grid;
            grid-template-columns: 1.05fr 0.95fr;

            align-items: center;

            gap: 65px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 9px 15px;

            margin-bottom: 23px;

            border-radius: 50px;

            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.15);

            color: #bfdbfe;

            font-size: 13px;

            backdrop-filter: blur(15px);
        }

        .hero-badge i {
            color: #60a5fa;
        }

        .hero-title {
            max-width: 650px;

            font-size: clamp(45px, 5.2vw, 70px);

            line-height: 1.05;

            letter-spacing: -2.5px;

            margin-bottom: 25px;
        }

        .hero-title span {
            color: #60a5fa;
        }

        .hero-description {
            max-width: 610px;

            color: #a9b9d1;

            font-size: 17px;

            line-height: 1.8;

            margin-bottom: 33px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            padding: 14px 23px;

            border-radius: 11px;

            background: #2563eb;
            color: #ffffff;

            font-weight: 600;

            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.25);

            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            padding: 14px 23px;

            border-radius: 11px;

            color: #dbeafe;

            border: 1px solid rgba(255, 255, 255, 0.18);

            background: rgba(255, 255, 255, 0.05);

            backdrop-filter: blur(10px);

            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.10);
        }

        /* =====================================================
           HERO VISUAL
        ===================================================== */

        .hero-visual {
            display: flex;
            justify-content: center;

            position: relative;
        }

        .visual-glow {
            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.20);

            filter: blur(80px);
        }

        .travel-card {
            width: 410px;
            max-width: 100%;

            padding: 28px;

            position: relative;
            z-index: 2;

            border-radius: 26px;

            background: rgba(255, 255, 255, 0.075);

            border: 1px solid rgba(255, 255, 255, 0.18);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.30);

            backdrop-filter: blur(22px);
        }

        .travel-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 30px;
        }

        .card-label {
            color: #8fa4c3;

            font-size: 11px;

            letter-spacing: 1.3px;

            font-weight: 600;
        }

        .card-status {
            display: flex;
            align-items: center;
            gap: 6px;

            padding: 6px 10px;

            border-radius: 20px;

            background: rgba(34, 197, 94, 0.10);

            color: #86efac;

            font-size: 11px;
        }

        .route-section {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .location-icon {
            width: 48px;
            height: 48px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: rgba(37, 99, 235, 0.14);

            color: #60a5fa;

            font-size: 19px;
        }

        .location-text small {
            display: block;

            color: #8295b1;

            font-size: 11px;

            margin-bottom: 5px;
        }

        .location-text strong {
            color: #ffffff;

            font-size: 17px;
        }

        .route-line {
            flex: 1;

            height: 1px;

            background: linear-gradient(
                90deg,
                rgba(96, 165, 250, 0.5),
                rgba(255, 255, 255, 0.08)
            );
        }

        .card-divider {
            height: 1px;

            margin: 28px 0 22px;

            background: rgba(255, 255, 255, 0.10);
        }

        .card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-info small {
            display: block;

            color: #8295b1;

            font-size: 11px;

            margin-bottom: 5px;
        }

        .card-info strong {
            color: #ffffff;

            font-size: 17px;
        }

        .car-symbol {
            width: 58px;
            height: 58px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 17px;

            background: rgba(255, 255, 255, 0.08);

            color: #93c5fd;

            font-size: 27px;
        }

        /* Floating cards */

        .floating-card {
            position: absolute;

            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 15px;

            border-radius: 13px;

            background: rgba(15, 32, 61, 0.80);

            border: 1px solid rgba(255, 255, 255, 0.14);

            backdrop-filter: blur(18px);

            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.20);

            z-index: 3;
        }

        .floating-card i {
            color: #60a5fa;

            font-size: 18px;
        }

        .floating-card span {
            color: #dbeafe;

            font-size: 12px;
        }

        .floating-one {
            left: -35px;
            top: 45px;
        }

        .floating-two {
            right: -30px;
            bottom: 45px;
        }

        /* =====================================================
           INTRODUCTION
        ===================================================== */

        .introduction {
            padding: 100px 7%;

            background:
                linear-gradient(
                    180deg,
                    #0b1b38 0%,
                    #08172f 100%
                );
        }

        .section-header {
            max-width: 680px;

            margin: 0 auto 55px;

            text-align: center;
        }

        .section-label {
            color: #60a5fa;

            font-size: 12px;

            text-transform: uppercase;

            letter-spacing: 1.5px;

            font-weight: 600;
        }

        .section-header h2 {
            margin: 12px 0 15px;

            font-size: 38px;

            letter-spacing: -1px;
        }

        .section-header p {
            color: #8fa4c3;

            line-height: 1.7;
        }

        .feature-grid {
            max-width: 1100px;

            margin: 0 auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 20px;
        }

        .feature-card {
            padding: 30px;

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.045);

            border: 1px solid rgba(255, 255, 255, 0.10);

            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);

            background: rgba(255, 255, 255, 0.065);

            border-color: rgba(96, 165, 250, 0.25);
        }

        .feature-icon {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            border-radius: 15px;

            background: rgba(37, 99, 235, 0.13);

            color: #60a5fa;

            font-size: 22px;
        }

        .feature-card h3 {
            font-size: 19px;

            margin-bottom: 10px;
        }

        .feature-card p {
            color: #8fa4c3;

            font-size: 14px;

            line-height: 1.7;
        }

        /* =====================================================
           HOW IT WORKS
        ===================================================== */

        .steps {
            padding: 90px 7%;

            background: #07152f;
        }

        .steps-container {
            max-width: 1050px;

            margin: 0 auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 30px;
        }

        .step {
            text-align: center;

            position: relative;
        }

        .step-number {
            width: 52px;
            height: 52px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.13);

            border: 1px solid rgba(96, 165, 250, 0.20);

            color: #60a5fa;

            font-weight: 700;
        }

        .step h3 {
            font-size: 17px;

            margin-bottom: 8px;
        }

        .step p {
            color: #7f93b0;

            font-size: 14px;

            line-height: 1.6;
        }

        /* =====================================================
           CTA
        ===================================================== */

        .cta {
            padding: 90px 7%;

            background: #07152f;
        }

        .cta-box {
            max-width: 1100px;

            margin: 0 auto;

            padding: 60px 40px;

            text-align: center;

            border-radius: 28px;

            background:
                linear-gradient(
                    135deg,
                    rgba(37, 99, 235, 0.20),
                    rgba(30, 64, 175, 0.12)
                );

            border: 1px solid rgba(96, 165, 250, 0.20);

            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.20);
        }

        .cta-box h2 {
            font-size: 36px;

            margin-bottom: 13px;
        }

        .cta-box p {
            color: #9eb1cb;

            line-height: 1.7;

            margin-bottom: 28px;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            padding: 28px 7%;

            background: #050f23;

            border-top: 1px solid rgba(255, 255, 255, 0.07);

            text-align: center;

            color: #71839e;

            font-size: 13px;
        }

        footer strong {
            color: #cbd5e1;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 950px) {

            .hero-container {
                grid-template-columns: 1fr;

                text-align: center;

                padding-top: 120px;
                padding-bottom: 80px;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                margin-top: 20px;
            }

            .feature-grid,
            .steps-container {
                grid-template-columns: 1fr;

                max-width: 550px;
            }

        }

        @media (max-width: 600px) {

            .navbar {
                padding: 18px 5%;
            }

            .brand-name {
                font-size: 20px;
            }

            .brand-icon {
                width: 39px;
                height: 39px;
            }

            .nav-buttons {
                gap: 7px;
            }

            .nav-login,
            .nav-register {
                padding: 9px 12px;

                font-size: 12px;
            }

            .hero-container {
                width: 90%;
            }

            .hero-title {
                font-size: 43px;

                letter-spacing: -1.5px;
            }

            .hero-description {
                font-size: 15px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }

            .travel-card {
                padding: 22px;
            }

            .floating-card {
                display: none;
            }

            .introduction,
            .steps,
            .cta {
                padding-left: 5%;
                padding-right: 5%;
            }

            .section-header h2 {
                font-size: 29px;
            }

            .cta-box {
                padding: 45px 25px;
            }

            .cta-box h2 {
                font-size: 28px;
            }
        }
    </style>
</head>


<body>

<div class="page">

    {{-- =====================================================
         NAVBAR
    ===================================================== --}}

    <nav class="navbar">

        <a href="{{ route('home') }}" class="brand">

            <div class="brand-icon">
                <i class="bi bi-car-front-fill"></i>
            </div>

            <span class="brand-name">
                Travelin
            </span>

        </a>


        <div class="nav-buttons">

            <a href="{{ route('login') }}" class="nav-login">
                Masuk
            </a>

            <a href="{{ route('pt.register') }}" class="nav-register">
                Daftar PT
            </a>

        </div>

    </nav>


    {{-- =====================================================
         HERO
    ===================================================== --}}

    <section class="hero">

        <div class="hero-container">

            <div class="hero-content">

                <div class="hero-badge">

                    <i class="bi bi-stars"></i>

                    Platform Travel Antar Kota & Provinsi

                </div>


                <h1 class="hero-title">

                    Perjalanan Lebih
                    <span>Mudah</span>
                    Bersama Travelin.

                </h1>


                <p class="hero-description">

                    Travelin adalah platform yang membantu mempermudah
                    perjalanan antar kota dan provinsi melalui sistem
                    pemesanan travel yang praktis, terorganisir,
                    dan mudah digunakan.

                </p>


                <div class="hero-buttons">

                    <a href="{{ route('login') }}" class="btn-primary">

                        Mulai Perjalanan

                        <i class="bi bi-arrow-right"></i>

                    </a>


                    <a href="#tentang" class="btn-secondary">

                        <i class="bi bi-info-circle"></i>

                        Tentang Travelin

                    </a>

                </div>

            </div>


            {{-- =================================================
                 VISUAL PERJALANAN
            ================================================= --}}

            <div class="hero-visual">

                <div class="visual-glow"></div>


                <div class="floating-card floating-one">

                    <i class="bi bi-shield-check"></i>

                    <span>
                        Sistem Terorganisir
                    </span>

                </div>


                <div class="travel-card">

                    <div class="travel-card-top">

                        <span class="card-label">
                            PERJALANAN ANDA
                        </span>

                        <span class="card-status">

                            <i class="bi bi-check-circle-fill"></i>

                            Siap

                        </span>

                    </div>


                    <div class="route-section">

                        <div class="location-icon">

                            <i class="bi bi-geo-alt-fill"></i>

                        </div>


                        <div class="location-text">

                            <small>
                                Keberangkatan
                            </small>

                            <strong>
                                Padang
                            </strong>

                        </div>


                        <div class="route-line"></div>


                        <div class="location-text">

                            <small>
                                Tujuan
                            </small>

                            <strong>
                                Bukittinggi
                            </strong>

                        </div>


                        <div class="location-icon">

                            <i class="bi bi-geo-alt-fill"></i>

                        </div>

                    </div>


                    <div class="card-divider"></div>


                    <div class="card-bottom">

                        <div class="card-info">

                            <small>
                                Layanan Travel
                            </small>

                            <strong>
                                Nyaman & Praktis
                            </strong>

                        </div>


                        <div class="car-symbol">

                            <i class="bi bi-car-front-fill"></i>

                        </div>

                    </div>

                </div>


                <div class="floating-card floating-two">

                    <i class="bi bi-ticket-perforated"></i>

                    <span>
                        Pemesanan Mudah
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         TENTANG TRAVELIN
    ===================================================== --}}

    <section class="introduction" id="tentang">

        <div class="section-header">

            <span class="section-label">
                Tentang Travelin
            </span>

            <h2>
                Satu platform untuk perjalanan yang lebih teratur.
            </h2>

            <p>
                Travelin dirancang untuk mempertemukan kebutuhan
                perjalanan pengguna dengan pengelolaan operasional
                perusahaan travel dalam satu sistem.
            </p>

        </div>


        <div class="feature-grid">

            {{-- Feature 1 --}}

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-ticket-perforated"></i>

                </div>

                <h3>
                    Pemesanan Mudah
                </h3>

                <p>
                    Pengguna dapat melakukan proses pemesanan
                    perjalanan melalui sistem yang sederhana
                    dan mudah digunakan.
                </p>

            </div>


            {{-- Feature 2 --}}

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-buildings"></i>

                </div>

                <h3>
                    Pengelolaan PT Travel
                </h3>

                <p>
                    Perusahaan travel dapat mengelola kendaraan,
                    sopir, dan perjalanan melalui sistem yang
                    terintegrasi.
                </p>

            </div>


            {{-- Feature 3 --}}

            <div class="feature-card">

                <div class="feature-icon">

                    <i class="bi bi-database-check"></i>

                </div>

                <h3>
                    Data Terorganisir
                </h3>

                <p>
                    Informasi pengguna dan operasional travel
                    dikelola secara terstruktur sehingga lebih
                    mudah digunakan dan dipantau.
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
         CARA KERJA
    ===================================================== --}}

    <section class="steps">

        <div class="section-header">

            <span class="section-label">
                Cara Kerja
            </span>

            <h2>
                Sederhana untuk digunakan.
            </h2>

            <p>
                Travelin dirancang agar proses perjalanan
                dapat dilakukan secara lebih teratur.
            </p>

        </div>


        <div class="steps-container">

            <div class="step">

                <div class="step-number">
                    01
                </div>

                <h3>
                    Pilih Perjalanan
                </h3>

                <p>
                    Tentukan kota keberangkatan dan tujuan
                    perjalanan Anda.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    02
                </div>

                <h3>
                    Pesan Travel
                </h3>

                <p>
                    Pilih layanan travel yang tersedia
                    sesuai kebutuhan perjalanan.
                </p>

            </div>


            <div class="step">

                <div class="step-number">
                    03
                </div>

                <h3>
                    Nikmati Perjalanan
                </h3>

                <p>
                    Perjalanan menjadi lebih mudah dengan
                    informasi yang terorganisir.
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
         CTA
    ===================================================== --}}

    <section class="cta">

        <div class="cta-box">

            <h2>
                Mulai perjalanan Anda bersama Travelin.
            </h2>

            <p>
                Gunakan Travelin untuk membantu mengatur
                perjalanan antar kota dan provinsi dengan
                lebih mudah.
            </p>

            <a href="{{ route('login') }}" class="btn-primary">

                Mulai Sekarang

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </section>


    {{-- =====================================================
         FOOTER
    ===================================================== --}}

    <footer>

        <p>

            © {{ date('Y') }}

            <strong>
                Travelin
            </strong>

            . Semua hak dilindungi.

        </p>

    </footer>

</div>

</body>

</html>