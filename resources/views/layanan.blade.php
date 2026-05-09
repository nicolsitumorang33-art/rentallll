<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan - OREEN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #e53935;
            --primary-dark: #b71c1c;
            --primary-light: #ff6f61;
            --primary-soft: #ffebee;
            --dark: #1a1a2e;
            --dark-2: #16213e;
            --dark-3: #0f3460;
            --light: #ffffff;
            --gray: #f8f9fa;
            --gray-2: #e9ecef;
            --text: #333333;
            --text-light: #666666;
            --shadow-soft: 0 4px 20px rgba(0,0,0,0.05);
            --shadow: 0 4px 20px rgba(0,0,0,0.1);
            --shadow-hover: 0 8px 30px rgba(0,0,0,0.15);
            --radius: 16px;
            --radius-sm: 12px;
            --container: 1200px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background: var(--light);
        }
        a { text-decoration: none; }

        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            padding: 18px 5%;
            display: flex; justify-content: space-between; align-items: center;
            background: var(--light); box-shadow: var(--shadow-soft);
        }
        .navbar-logo {
            font-size: 1.8rem; font-weight: 800; color: var(--primary);
            letter-spacing: -0.5px;
        }
        .navbar-links {
            display: flex; align-items: center; gap: 28px; list-style: none;
        }
        .navbar-links a {
            color: var(--text); font-weight: 500; font-size: 0.95rem;
            transition: color 0.3s; position: relative;
        }
        .navbar-links a:hover,
        .navbar-links a.active { color: var(--primary); }
        .navbar-links a.active::after {
            content: ''; position: absolute; bottom: -5px; left: 0;
            width: 100%; height: 3px; background: var(--primary); border-radius: 2px;
        }
        .hamburger {
            display: none; flex-direction: column; cursor: pointer; gap: 5px;
        }
        .hamburger span {
            width: 25px; height: 3px; background: var(--dark); border-radius: 2px;
        }
        .btn-login {
            background: var(--dark); color: var(--light);
            padding: 8px 24px; border: none; border-radius: 50px;
            font-weight: 600; font-family: 'Poppins', sans-serif;
            font-size: 0.85rem; cursor: pointer; transition: all 0.3s;
        }
        .btn-login:hover { background: #2a2a4a; transform: translateY(-1px); }

        /* HERO */
        .hero-layanan {
            position: relative;
            min-height: 55vh;
            display: flex;
            align-items: center;
            background: url("{{ asset('images/hero-bg.jpg') }}") center/cover no-repeat;
            padding: 120px 5% 60px;
        }
        .hero-layanan::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.92) 0%, rgba(15,52,96,0.85) 100%);
        }
        .hero-layanan-content {
            position: relative; z-index: 2; max-width: 650px;
        }
        .hero-layanan-content h1 {
            font-size: 3.2rem; font-weight: 800; color: var(--light); margin-bottom: 15px;
        }
        .hero-layanan-content h1 span { color: var(--primary); }
        .hero-layanan-content p {
            color: rgba(255,255,255,0.8); font-size: 1.05rem; line-height: 1.7;
        }

        /* SECTION */
        .section {
            padding: 80px 5%;
        }
        .section-title {
            text-align: center; margin-bottom: 50px;
        }
        .section-title h2 {
            font-size: 2rem; font-weight: 700; color: var(--dark); margin-bottom: 10px;
        }
        .section-title h2 span { color: var(--primary); }
        .section-title p {
            color: var(--text-light); font-size: 0.95rem; max-width: 600px; margin: 0 auto; line-height: 1.7;
        }

        /* CARD LAYANAN */
        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: var(--container);
            margin: 0 auto;
        }
        .layanan-card {
            position: relative;
            border-radius: var(--radius-sm);
            overflow: hidden;
            height: 400px;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s;
        }
        .layanan-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        .layanan-card-bg {
            width: 100%; height: 100%;
            background-size: cover; background-position: center;
            transition: transform 0.5s;
        }
        .layanan-card:hover .layanan-card-bg { transform: scale(1.05); }
        .layanan-card-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(26,26,46,0.95) 0%, rgba(26,26,46,0.3) 100%);
        }
        .layanan-card-overlay.maroon {
            background: linear-gradient(to top, rgba(183,28,28,0.95) 0%, rgba(183,28,28,0.3) 100%);
        }
        .layanan-card-body {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 30px; text-align: center;
        }
        .layanan-card-body .icon {
            width: 55px; height: 55px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(6px);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .layanan-card-body .icon i { color: var(--light); font-size: 1.3rem; }
        .layanan-card-body h3 {
            font-size: 1.1rem; font-weight: 700; color: var(--light); margin-bottom: 8px;
        }
        .layanan-card-body p {
            color: rgba(255,255,255,0.75); font-size: 0.85rem; line-height: 1.6; margin-bottom: 16px; max-width: 280px; margin-left: auto; margin-right: auto;
        }
        .layanan-card-body .btn-order {
            display: inline-block;
            padding: 10px 28px;
            border-radius: 50px;
            font-size: 0.85rem; font-weight: 600; font-family: 'Poppins', sans-serif;
            cursor: pointer; transition: all 0.3s; border: none;
        }
        .btn-order-primary { background: var(--primary); color: var(--light); }
        .btn-order-primary:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 4px 15px rgba(229,57,53,0.4); }
        .btn-order-white { background: rgba(255,255,255,0.9); color: var(--text); border: 1px solid var(--gray-2); }
        .btn-order-white:hover { background: var(--light); border-color: #bbb; transform: translateY(-2px); }

        /* FOOTER */
        .footer {
            background: var(--dark); color: rgba(255,255,255,0.7);
            padding: 40px 5% 25px;
        }
        .footer-content {
            max-width: var(--container); margin: 0 auto;
            display: flex; justify-content: space-between; align-items: center;
        }
        .footer-logo { font-size: 1.5rem; font-weight: 800; color: var(--primary); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px; margin-top: 25px; text-align: center; font-size: 0.85rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .layanan-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
        }
        @media (max-width: 768px) {
            .hamburger { display: flex; }
            .navbar-links {
                position: fixed; top: 0; right: -100%; width: 280px; height: 100vh;
                background: var(--light); flex-direction: column;
                padding: 80px 30px 30px; transition: right 0.3s;
                box-shadow: var(--shadow-hover);
            }
            .navbar-links.active { right: 0; }
            .hero-layanan { min-height: 45vh; padding: 100px 5% 40px; }
            .hero-layanan-content h1 { font-size: 2rem; }
            .section { padding: 50px 5%; }
            .section-title h2 { font-size: 1.5rem; }
            .layanan-grid { grid-template-columns: 1fr; gap: 18px; }
            .layanan-card { height: 360px; }
            .footer-content { flex-direction: column; gap: 15px; text-align: center; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-logo">OREEN</a>
        <ul class="navbar-links" id="navLinks">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/tentang') }}">Tentang</a></li>
            <li><a href="{{ url('/mobil') }}">Mobil</a></li>
            <li><a href="{{ url('/galeri') }}">Galeri</a></li>
            <li><a href="{{ url('/layanan') }}" class="active">Layanan</a></li>
            <li><a href="{{ url('/syarat') }}">S&K</a></li>
            <li><a href="{{ url('/kontak') }}">Kontak Kami</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="btn-login">Logout</button>
                </form>
            </li>
        </ul>
        <div class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-layanan">
        <div class="hero-layanan-content">
            <h1>Layanan <span>Kami</span></h1>
            <p>Kami menyediakan layanan terbaik untuk kebutuhan perjalanan Anda</p>
        </div>
    </section>

    <!-- INTRO -->
    <section class="section" style="padding-top:50px;padding-bottom:30px">
        <div class="section-title">
            <h2>Layanan <span>Kami</span></h2>
            <p>Layanan kami tidak hanya menyediakan sewa mobil, tetapi juga menghadirkan sopir profesional serta paket perjalanan untuk mendukung kebutuhan perjalanan Anda.</p>
        </div>
    </section>

    <!-- CARDS -->
    <section class="section" style="padding-top:30px">
        <div class="layanan-grid">

            <div class="layanan-card">
                <div class="layanan-card-bg" style="background-image: url('{{ asset('images/layanan-1.jpg') }}')"></div>
                <div class="layanan-card-overlay maroon"></div>
                <div class="layanan-card-body">
                    <div class="icon"><i class="fas fa-key"></i></div>
                    <h3>Sewa Mobil Lepas Kunci</h3>
                    <p>Kami menyediakan layanan sewa mobil tanpa sopir dengan proses cepat dan mudah.</p>
                    <a href="{{ url('/booking') }}" class="btn-order btn-order-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="layanan-card">
                <div class="layanan-card-bg" style="background-image: url('{{ asset('images/layanan-2.jpg') }}')"></div>
                <div class="layanan-card-overlay"></div>
                <div class="layanan-card-body">
                    <div class="icon"><i class="fas fa-user-tie"></i></div>
                    <h3>Sewa Mobil Dengan Sopir</h3>
                    <p>Kami menyediakan sopir profesional untuk menemani perjalanan Anda dengan aman dan nyaman.</p>
                    <a href="{{ url('/booking') }}" class="btn-order btn-order-white">Selengkapnya</a>
                </div>
            </div>

            <div class="layanan-card">
                <div class="layanan-card-bg" style="background-image: url('{{ asset('images/layanan-3.jpg') }}')"></div>
                <div class="layanan-card-overlay"></div>
                <div class="layanan-card-body">
                    <div class="icon"><i class="fas fa-road"></i></div>
                    <h3>Sewa Mobil Bulanan & Harian</h3>
                    <p>Tersedia paket sewa fleksibel untuk kebutuhan perjalanan jarak dekat maupun jauh.</p>
                    <a href="{{ url('/booking') }}" class="btn-order btn-order-white">Selengkapnya</a>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">OREEN</div>
            <p>Kepuasan Anda adalah prioritas kami</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} OREEN. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }
    </script>

</body>
</html>