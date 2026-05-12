<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - RennMobil</title>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background: var(--light);
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--light);
            box-shadow: var(--shadow-soft);
        }

        .navbar-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .navbar-links a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
            position: relative;
        }

        .navbar-links a:hover,
        .navbar-links a.active {
            color: var(--primary);
        }

        .navbar-links a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
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
            background: var(--dark);
            border-radius: 2px;
            transition: 0.3s;
        }

        /* HERO SECTION */
        .hero-about {
            position: relative;
            min-height: 70vh;
            display: flex;
            align-items: center;
            padding: 120px 5% 80px;
            background: url("{{ asset('images/hero-about.jpg') }}") center/cover no-repeat;
        }

        .hero-about::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.95) 0%, rgba(15,52,96,0.8) 100%);
        }

        .hero-about-content {
            position: relative;
            z-index: 2;
            max-width: var(--container);
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-about-text h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--light);
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-about-text h1 span {
            color: var(--primary);
        }

        .hero-about-text p {
            color: rgba(255,255,255,0.75);
            font-size: 1.1rem;
            line-height: 1.8;
            max-width: 500px;
        }

        .hero-about-img {
            text-align: right;
        }

        .hero-about-img img {
            max-width: 100%;
            border-radius: var(--radius);
            box-shadow: var(--shadow-hover);
        }

        /* SECTION STYLES */
        .section {
            padding: 80px 5%;
        }

        .section-container {
            max-width: var(--container);
            margin: 0 auto;
        }

        .section-label {
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 2.4rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .section-title span {
            color: var(--primary);
        }

        .section-desc {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.8;
            max-width: 600px;
        }

        /* TENTANG OREN */
        .tentang-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .tentang-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .feature-card {
            background: var(--light);
            padding: 28px 22px;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-soft);
            transition: all 0.3s;
            border: 1px solid var(--gray-2);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-soft);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .feature-icon i {
            font-size: 1.3rem;
            color: var(--primary);
        }

        .feature-card h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .feature-card p {
            font-size: 0.85rem;
            color: var(--text-light);
            line-height: 1.5;
        }

        /* VISI MISI */
        .visimisi-section {
            background: var(--primary-soft);
        }

        .visimisi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .visimisi-card {
            background: var(--light);
            padding: 40px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-soft);
        }

        .visimisi-card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .visimisi-icon {
            width: 55px;
            height: 55px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-size: 1.4rem;
        }

        .visimisi-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .visimisi-card p {
            color: var(--text-light);
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .visimisi-card ul {
            list-style: none;
            padding: 0;
        }

        .visimisi-card li {
            padding: 10px 0;
            padding-left: 25px;
            position: relative;
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .visimisi-card li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* TIM KAMI */
        .tim-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .tim-card {
            background: var(--light);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s;
            text-align: center;
        }

        .tim-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow);
        }

        .tim-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: var(--gray);
        }

        .tim-info {
            padding: 25px 20px;
        }

        .tim-info h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .tim-info .jabatan {
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .tim-socials {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .tim-socials a {
            width: 35px;
            height: 35px;
            background: var(--gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .tim-socials a:hover {
            background: var(--primary);
            color: var(--light);
        }

        /* CTA SECTION */
        .cta-section {
            background: var(--primary-soft);
        }

        .cta-content {
            max-width: var(--container);
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .cta-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cta-icon {
            width: 65px;
            height: 65px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-size: 1.5rem;
        }

        .cta-text h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .cta-text p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary);
            color: var(--light);
            padding: 16px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-cta:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 57, 53, 0.4);
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            color: rgba(255,255,255,0.7);
            padding: 40px 5% 25px;
        }

        .footer-content {
            max-width: var(--container);
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 25px;
            text-align: center;
            font-size: 0.85rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .hero-about-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-about-img {
                display: none;
            }

            .hero-about-text p {
                max-width: 100%;
            }

            .tentang-grid {
                grid-template-columns: 1fr;
            }

            .tim-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .cta-content {
                flex-direction: column;
                text-align: center;
            }

            .cta-left {
                flex-direction: column;
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
                background: var(--light);
                flex-direction: column;
                padding: 80px 30px 30px;
                transition: right 0.3s;
                box-shadow: var(--shadow-hover);
            }

            .navbar-links.active {
                right: 0;
            }

            .hero-about {
                min-height: 50vh;
                padding: 100px 5% 60px;
            }

            .hero-about-text h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .tentang-features {
                grid-template-columns: 1fr;
            }

            .visimisi-grid {
                grid-template-columns: 1fr;
            }

            .tim-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-logo">RennMobil</a>
        <ul class="navbar-links" id="navLinks">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/tentang') }}" class="active">Tentang</a></li>
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
    <section class="hero-about">
        <div class="hero-about-content">
            <div class="hero-about-text">
                <h1>Tentang <span>Kami</span></h1>
                <p>RennMobil adalah platform rental mobil terpercaya yang menyediakan layanan sewa kendaraan berkualitas dengan harga terjangkau. Kami berkomitmen memberikan pengalaman perjalanan terbaik untuk setiap pelanggan.</p>
            </div>
            <div class="hero-about-img">
                <img src="{{ asset('images/about-car.jpg') }}" alt="RennMobil">
            </div>
        </div>
    </section>

    <!-- TENTANG OREN -->
    <section class="section">
        <div class="section-container">
            <div class="tentang-grid">
                <div>
                    <p class="section-label">TENTANG KAMI</p>
                    <h2 class="section-title">Perjalanan Lebih Menyenangkan Bersama <span>RennMobil</span></h2>
                    <p class="section-desc">Sejak didirikan, RennMobil telah melayani ribuan pelanggan dengan armada kendaraan yang terawat dan berkualitas. Kami menyediakan berbagai jenis mobil mulai dari MPV, SUV, Sedan, hingga minibus untuk memenuhi kebutuhan transportasi Anda.</p>
                    <br>
                    <p class="section-desc">Dengan tim profesional dan sistem pemesanan yang mudah, kami memastikan setiap perjalanan Anda menjadi pengalaman yang menyenangkan, aman, dan nyaman.</p>
                </div>
                <div class="tentang-features">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <h4>Aman & Terpercaya</h4>
                        <p>Semua unit dilengkapi asuransi dan GPS tracking</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h4>Armada Berkualitas</h4>
                        <p>Kendaraan terawat dengan servis berkala rutin</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Layanan 24/7</h4>
                        <p>Customer service siap membantu kapan saja</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h4>Harga Terbaik</h4>
                        <p>Harga kompetitif tanpa biaya tersembunyi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI MISI -->
    <section class="section visimisi-section">
        <div class="section-container">
            <div class="visimisi-grid">
                <div class="visimisi-card">
                    <div class="visimisi-card-header">
                        <div class="visimisi-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Visi</h3>
                    </div>
                    <p>Menjadi perusahaan rental mobil terdepan di Indonesia yang menyediakan layanan transportasi terbaik dengan mengutamakan kepuasan pelanggan, keamanan, dan kenyamanan dalam setiap perjalanan.</p>
                </div>
                <div class="visimisi-card">
                    <div class="visimisi-card-header">
                        <div class="visimisi-icon">
                            <i class="fas fa-flag"></i>
                        </div>
                        <h3>Misi</h3>
                    </div>
                    <ul>
                        <li>Menyediakan armada kendaraan berkualitas dengan harga terjangkau</li>
                        <li>Memberikan pelayanan profesional dan ramah kepada setiap pelanggan</li>
                        <li>Mengutamakan keselamatan dan kenyamanan dalam setiap perjalanan</li>
                        <li>Mengembangkan inovasi teknologi untuk kemudahan pemesanan</li>
                        <li>Membangun kepercayaan melalui transparansi dan integritas</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- TIM KAMI -->
    <section class="section">
        <div class="section-container">
            <div style="text-align: center; margin-bottom: 50px;">
                <p class="section-label">TIM KAMI</p>
                <h2 class="section-title">Profesional & <span>Berdedikasi</span></h2>
                <p class="section-desc" style="margin: 0 auto;">Tim kami terdiri dari orang-orang berpengalaman yang siap memberikan pelayanan terbaik untuk Anda</p>
            </div>

            <div class="tim-grid">
                <div class="tim-card">
                    <img src="{{ asset('images/team-1.jpeg') }}" alt="CEO" class="tim-img">
                    <div class="tim-info">
                        <h4>Elisabeth Margaret Lumbantoruan</h4>
                        <div class="tim-socials">
                            <a href="https://wa.me/6283116498229?text=Hallo%20RennMobil"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/elisalumbantoruan_?igsh=MTBlaWVxcm15cHY2NA=="><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="tim-card">
                    <img src="{{ asset('images/team-2.jpeg') }}" alt="COO" class="tim-img">
                    <div class="tim-info">
                        <h4>Kemulian Anggun br Rumapea</h4>
                        <div class="tim-socials">
                            <a href="https://wa.me/6281436103052?text=Hallo%20RennMobil"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/angggun_rumapea?igsh=aHZnNG9nbnh4dGp5"><i class="fab fa-instagram"></i></a>
            
                        </div>
                    </div>
                </div>
                <div class="tim-card">
                    <img src="{{ asset('images/team-3.jpeg') }}" alt="CTO" class="tim-img">
                    <div class="tim-info">
                        <h4>Nicol Savarola br Situmorang</h4>
                        <div class="tim-socials">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="https://wa.me/6281338044279?text=Hallo%20RennMobil"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="section cta-section">
        <div class="cta-content">
            <div class="cta-left">
                <div class="cta-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="cta-text">
                    <h3>Butuh Bantuan?</h3>
                    <p>Tim kami siap membantu anda kapan saja</p>
                </div>
            </div>
            <a href="{{ url('/kontak') }}" class="btn-cta">
                Hubungi Kami <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">RennMobil</div>
            <p style="font-size: 0.9rem;">Penyedia jasa rental mobil terpercaya</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} RennMobil. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }

        document.querySelectorAll('.navbar-links a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('navLinks').classList.remove('active');
            });
        });
    </script>
</body>
</html>
