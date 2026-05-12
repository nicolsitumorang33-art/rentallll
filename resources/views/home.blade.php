
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RennMobil - Rental Mobil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #e53935;
            --primary-dark: #b71c1c;
            --primary-light: #ff6f61;
            --dark: #1a1a2e;
            --dark-2: #16213e;
            --dark-3: #0f3460;
            --light: #ffffff;
            --gray: #f5f5f5;
            --gray-2: #e0e0e0;
            --text: #333333;
            --text-light: #666666;
            --shadow: 0 4px 20px rgba(0,0,0,0.1);
            --shadow-hover: 0 8px 30px rgba(0,0,0,0.15);
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            background: transparent;
        }

        .navbar.scrolled {
            background: var(--dark);
            box-shadow: var(--shadow);
        }

        .navbar-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--light);
            text-decoration: none;
        }

        .navbar-logo span {
            color: var(--primary);
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 30px;
            list-style: none;
        }

        .navbar-links a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .navbar-links a:hover {
            color: var(--primary);
        }

        .btn-login {
            background: var(--primary);
            color: var(--light);
            padding: 10px 28px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            display: inline-block;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(229, 57, 53, 0.4);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--light);
            border-radius: 2px;
            transition: 0.3s;
        }

        /* HERO SECTION */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url("{{ asset('images/hero-bg.jpg') }}") center/cover no-repeat;
            padding: 100px 5% 60px;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.92) 0%, rgba(15,52,96,0.85) 100%);
            backdrop-filter: blur(3px);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 900px;
        }

        .hero h1 {
            font-size: 3.2rem;
            font-weight: 800;
            color: var(--light);
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            color: rgba(255,255,255,0.8);
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        /* SEARCH FORM */
        .search-form {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: var(--radius);
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            align-items: end;
        }

        .form-group {
            text-align: left;
        }

        .form-group label {
            display: block;
            color: rgba(255,255,255,0.7);
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 10px;
            background: rgba(255,255,255,0.08);
            color: var(--light);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-group input::placeholder {
            color: rgba(255,255,255,0.5);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255,255,255,0.15);
        }

        .form-group select option {
            background: var(--dark);
            color: var(--light);
        }

        .btn-search {
            background: var(--primary);
            color: var(--light);
            padding: 14px 35px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-search:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 57, 53, 0.4);
        }

        /* SECTION STYLES */
        .section {
            padding: 80px 5%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .section-title h2 span {
            color: var(--primary);
        }

        .section-title p {
            color: var(--text-light);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* PILIHAN MOBIL */
        .car-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .car-card {
            background: var(--light);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s;
        }

        .car-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        .car-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: var(--gray);
        }

        .car-card-body {
            padding: 25px;
        }

        .car-card-body h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .car-card-body .price {
            color: var(--primary);
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .car-card-body .price small {
            font-size: 0.8rem;
            font-weight: 400;
            color: var(--text-light);
        }

        .btn-order {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: var(--light);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-order:hover {
            background: var(--primary-dark);
        }

        /* LAYANAN SECTION */
        .layanan-section {
            background: var(--dark);
            position: relative;
        }

        .layanan-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("{{ asset('images/hero-bg.jpg') }}") center/cover no-repeat;
            opacity: 0.1;
        }

        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .layanan-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: var(--radius);
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s;
        }

        .layanan-card:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-5px);
        }

        .layanan-icon {
            width: 70px;
            height: 70px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 1.8rem;
            color: var(--light);
        }

        .layanan-card h3 {
            color: var(--light);
            font-size: 1.3rem;
            margin-bottom: 12px;
        }

        .layanan-card p {
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .btn-outline {
            display: inline-block;
            padding: 10px 25px;
            border: 2px solid var(--primary);
            color: var(--primary);
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--light);
        }

        /* KEUNGGULAN SECTION */
        .keunggulan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .keunggulan-item {
            background: var(--light);
            padding: 35px 25px;
            border-radius: var(--radius);
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 1px solid transparent;
        }

        .keunggulan-item:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .keunggulan-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.5rem;
            color: var(--light);
        }

        .keunggulan-item h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .keunggulan-item p {
            color: var(--text-light);
            font-size: 0.88rem;
            line-height: 1.5;
        }

        /* TENTANG KAMI */
        .tentang-section {
            background: var(--gray);
        }

        .tentang-content {
            max-width: 900px;
            margin: 0 auto;
            background: var(--light);
            border-radius: var(--radius);
            padding: 50px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .tentang-content p {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .tentang-content p:last-child {
            margin-bottom: 0;
        }

        .tentang-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
            padding-top: 40px;
            border-top: 1px solid var(--gray-2);
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-item p {
            font-size: 0.9rem;
            margin: 0;
        }

        /* GALERI SECTION */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .galeri-item {
            border-radius: 10px;
            overflow: hidden;
            aspect-ratio: 4/3;
            position: relative;
        }

        .galeri-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }

        .galeri-item:hover img {
            transform: scale(1.1);
        }

        .galeri-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(229, 57, 53, 0);
            transition: all 0.3s;
        }

        .galeri-item:hover::after {
            background: rgba(229, 57, 53, 0.3);
        }

        /* KONTAK SECTION */
        .kontak-section {
            background: var(--gray);
        }

        .kontak-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .kontak-info {
            background: var(--light);
            padding: 40px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .kontak-info h3 {
            font-size: 1.4rem;
            margin-bottom: 25px;
            color: var(--dark);
        }

        .kontak-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
        }

        .kontak-item:last-child {
            margin-bottom: 0;
        }

        .kontak-item-icon {
            width: 45px;
            height: 45px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            flex-shrink: 0;
        }

        .kontak-item h4 {
            font-size: 1rem;
            margin-bottom: 4px;
        }

        .kontak-item p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .kontak-map {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            min-height: 350px;
        }

        .kontak-map iframe {
            width: 100%;
            height: 100%;
            min-height: 350px;
            border: none;
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            color: rgba(255,255,255,0.7);
            padding: 60px 5% 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto 40px;
        }

        .footer-about h3 {
            color: var(--light);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .footer-about h3 span {
            color: var(--primary);
        }

        .footer-about p {
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            transition: all 0.3s;
        }

        .footer-social a:hover {
            background: var(--primary);
        }

        .footer-col h4 {
            color: var(--light);
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col li {
            margin-bottom: 10px;
        }

        .footer-col a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-col a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 25px;
            text-align: center;
            font-size: 0.85rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .search-form {
                grid-template-columns: repeat(2, 1fr);
            }

            .car-grid,
            .layanan-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .keunggulan-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .galeri-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .navbar-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: var(--dark);
                flex-direction: column;
                padding: 80px 30px 30px;
                transition: right 0.3s;
                box-shadow: -5px 0 20px rgba(0,0,0,0.3);
            }

            .navbar-links.active {
                right: 0;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .car-grid,
            .layanan-grid,
            .keunggulan-grid {
                grid-template-columns: 1fr;
            }

            .kontak-grid {
                grid-template-columns: 1fr;
            }

            .tentang-stats {
                grid-template-columns: repeat(3, 1fr);
            }

            .galeri-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .tentang-content {
                padding: 30px 20px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .section-title h2 {
                font-size: 1.6rem;
            }

            .galeri-grid {
                grid-template-columns: 1fr;
            }

            .tentang-stats {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <a href="#" class="navbar-logo">Renn<span>Mobil</span></a>
        <ul class="navbar-links" id="navLinks">
            <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
            <li><a href="{{ url('/tentang') }}">Tentang</a></li>
            <li><a href="{{ url('/mobil') }}">Mobil</a></li>
            <li><a href="{{ url('/galeri') }}">Galeri</a></li>
            <li><a href="{{ url('/layanan') }}">Layanan</a></li>
            <li><a href="{{ url('/syarat') }}">S&K</a></li>
            <li><a href="{{ url('/kontak') }}">Kontak Kami</a></li>
            <li><a href="{{ url('/my-bookings') }}">Riwayat</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" style="background:#374151;color:#fff;border:none;padding:8px 24px;border-radius:50px;font-weight:600;font-family:'Poppins',sans-serif;font-size:0.85rem;cursor:pointer">Logout</button>
                </form>
            </li>
        </ul>
        <div class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Perjalanan lebih menyenangkan <br>bersama <span>RennMobil</span></h1>
            <p>Sewa mobil terpercaya dengan harga terjangkau, unit terawat, dan pelayanan profesional</p>

            <form class="search-form">
                <div class="form-group">
                    <label><i class="fas fa-calendar-alt"></i> Tanggal Mulai</label>
                    <input type="date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-calendar-check"></i> Tanggal Selesai</label>
                    <input type="date" name="end_date" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-users"></i> Jumlah Penumpang</label>
                    <select name="passengers">
                        <option value="">Pilih</option>
                        <option value="2">2 Orang</option>
                        <option value="4">4 Orang</option>
                        <option value="6">6 Orang</option>
                        <option value="8">8+ Orang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-car"></i> Jenis Mobil</label>
                    <select name="car_type">
                        <option value="">Pilih</option>
                        <option value="suv">SUV</option>
                        <option value="sedan">Sedan</option>
                        <option value="mpv">MPV</option>
                        <option value="hatchback">Hatchback</option>
                    </select>
                </div>
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i> Cari Mobil
                </button>
            </form>
        </div>
    </section>

    <!-- PILIHAN MOBIL -->
    <section class="section" id="mobil">
        <div class="section-title">
            <h2>Pilihan Mobil <span>Terbaik</span> untuk Anda Sewa</h2>
            <p>Koleksi mobil berkualitas dengan kondisi prima siap menemani perjalanan Anda</p>
        </div>

        <div class="car-grid">
            <div class="car-card">
                <img src="{{ asset('images/car-avanza.jpg') }}" alt="Toyota Avanza" class="car-card-img">
                <div class="car-card-body">
                    <h3>Toyota Avanza</h3>
                    <p class="price">Rp 350.000 <small>/ hari</small></p>
                    <a href="{{ url('/booking') }}" class="btn-order">Pesan Sekarang</a>
                </div>
            </div>
            <div class="car-card">
                <img src="{{ asset('images/car-xpander.jpg') }}" alt="Mitsubishi Xpander" class="car-card-img">
                <div class="car-card-body">
                    <h3>Mitsubishi Xpander</h3>
                    <p class="price">Rp 500.000 <small>/ hari</small></p>
                    <a href="{{ url('/booking') }}" class="btn-order">Pesan Sekarang</a>
                </div>
            </div>
            <div class="car-card">
                <img src="{{ asset('images/car-pajero.jpg') }}" alt="Mitsubishi Pajero Sport" class="car-card-img">
                <div class="car-card-body">
                    <h3>Mitsubishi Pajero Sport</h3>
                    <p class="price">Rp 800.000 <small>/ hari</small></p>
                    <a href="{{ url('/booking') }}" class="btn-order">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN -->
    <section class="section layanan-section" id="layanan">
        <div class="section-title">
            <h2 style="color: #fff;">Layanan <span>Kami</span></h2>
            <p style="color: rgba(255,255,255,0.6);">Berbagai pilihan layanan rental untuk kebutuhan Anda</p>
        </div>

        <div class="layanan-grid">
            <div class="layanan-card">
                <div class="layanan-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h3>Sewa Mobil</h3>
                <p>Sewa mobil lepas kunci atau dengan driver untuk perjalanan bisnis maupun wisata</p>
                <a href="{{ url('/booking') }}" class="btn-outline">Selengkapnya</a>
            </div>
            <div class="layanan-card">
                <div class="layanan-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Sewa Sopir</h3>
                <p>Driver profesional berpengalaman siap mengantar Anda ke tujuan dengan aman</p>
                <a href="{{ url('/booking') }}" class="btn-outline">Selengkapnya</a>
            </div>
            <div class="layanan-card">
                <div class="layanan-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <h3>Rental Harian</h3>
                <p>Paket rental harian dengan harga terjangkau untuk kebutuhan transportasi Anda</p>
                <a href="{{ url('/booking') }}" class="btn-outline">Selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN -->
    <section class="section" id="keunggulan">
        <div class="section-title">
            <h2>Kenapa Harus <span>Kami?</span></h2>
            <p>Komitmen kami memberikan pelayanan terbaik untuk setiap pelanggan</p>
        </div>

        <div class="keunggulan-grid">
            <div class="keunggulan-item">
                <div class="keunggulan-icon">
                    <i class="fas fa-sparkles"></i>
                </div>
                <h4>Unit Bersih</h4>
                <p>Setiap unit dibersihkan dan disterilkan sebelum diserahkan kepada pelanggan</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">
                    <i class="fas fa-route"></i>
                </div>
                <h4>Mudah Akses</h4>
                <p>Proses pemesanan mudah dan cepat melalui website atau langsung ke kantor</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h4>Harga Terjangkau</h4>
                <p>Harga kompetitif dan transparan tanpa biaya tersembunyi</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h4>Keamanan Mobil</h4>
                <p>Semua unit dilengkapi asuransi dan GPS tracking untuk keamanan</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">
                    <i class="fas fa-truck-fast"></i>
                </div>
                <h4>Pengantaran Gratis</h4>
                <p>Layanan antar jemput mobil gratis untuk area tertentu</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">
                    <i class="fas fa-helmet-safety"></i>
                </div>
                <h4>Sopir Kompeten</h4>
                <p>Driver berpengalaman, ramah, dan熟悉 dengan rute perjalanan</p>
            </div>
        </div>
    </section>

    <!-- TENTANG KAMI -->
    <section class="section tentang-section">
        <div class="section-title">
            <h2>Tentang <span>Kami</span></h2>
        </div>

        <div class="tentang-content">
            <p>RennMobil adalah penyedia jasa rental mobil terpercaya yang telah melayani ribuan pelanggan di seluruh Indonesia. Dengan armada kendaraan yang terawat dan berkualitas, kami berkomitmen memberikan pengalaman perjalanan terbaik.</p>
            <p>Kami menyediakan berbagai jenis mobil mulai dari MPV, SUV, Sedan, hingga minibus untuk memenuhi kebutuhan transportasi Anda, baik untuk perjalanan bisnis, wisata, maupun acara spesial.</p>

            <div class="tentang-stats">
                <div class="stat-item">
                    <h3>500+</h3>
                    <p>Pelanggan Puas</p>
                </div>
                <div class="stat-item">
                    <h3>50+</h3>
                    <p>Unit Armada</p>
                </div>
                <div class="stat-item">
                    <h3>5+</h3>
                    <p>Tahun Pengalaman</p>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI -->
    <section class="section" id="galeri">
        <div class="section-title">
            <h2>Galeri <span>Perjalanan</span></h2>
            <p>Momen-momen perjalanan bersama pelanggan kami</p>
        </div>

        <div class="galeri-grid">
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-1.jpg') }}" alt="Galeri 1">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-2.jpg') }}" alt="Galeri 2">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-3.jpg') }}" alt="Galeri 3">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-4.jpg') }}" alt="Galeri 4">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-5.jpg') }}" alt="Galeri 5">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-6.jpg') }}" alt="Galeri 6">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-7.jpg') }}" alt="Galeri 7">
            </div>
            <div class="galeri-item">
                <img src="{{ asset('images/gallery-8.jpg') }}" alt="Galeri 8">
            </div>
        </div>
    </section>

    <!-- KONTAK -->
    <section class="section kontak-section" id="kontak">
        <div class="section-title">
            <h2>Hubungi <span>Kami</span></h2>
            <p>Jangan ragu untuk menghubungi kami jika ada pertanyaan</p>
        </div>

        <div class="kontak-grid">
            <div class="kontak-info">
                <h3>Informasi Kontak</h3>

                <div class="kontak-item">
                    <div class="kontak-item-icon">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <div>
                        <h4>Alamat</h4>
                        <p>Jl.Berdikari,Padang Bulan Selayang II</p>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-item-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <p>info@rennmobil.com</p>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-item-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h4>Telepon</h4>
                        <p>+62 813-3804-4279</p>
                    </div>
                </div>

                <a href="https://wa.me/6281338044279" style="text-decoration:none;color:inherit">
                <div class="kontak-item" style="cursor:pointer">
                    <div class="kontak-item-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div>
                        <h4>WhatsApp</h4>
                        <p>+62 813-3804-4279</p>
                    </div>
                </div>
                </a>
            </div>

            <div class="kontak-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.1360863420605!2d98.64885307423755!3d3.556104750517775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fe6f7a0c5d9%3A0x8c07e4ad80b29ab7!2sGEArental!5e0!3m2!1sid!2sid!4v1778380752137!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-about">
                <h3>Renn<span>Mobil</span></h3>
                <p>Penyedia jasa rental mobil terpercaya dengan armada berkualitas dan pelayanan profesional untuk perjalanan Anda.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Menu</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/mobil') }}">Mobil</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="{{ url('/booking') }}">Sewa Mobil</a></li>
                    <li><a href="{{ url('/booking') }}">Sewa Sopir</a></li>
                    <li><a href="{{ url('/booking') }}">Rental Harian</a></li>
                    <li><a href="{{ url('/booking') }}">Rental Bulanan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Bantuan</h4>
                <ul>
                    <li><a href="{{ url('/syarat') }}">Syarat & Ketentuan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="{{ url('/kontak') }}">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} RennMobil. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.querySelectorAll('.navbar-links a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('navLinks').classList.remove('active');
            });
        });
    </script>
</body>
</html>
