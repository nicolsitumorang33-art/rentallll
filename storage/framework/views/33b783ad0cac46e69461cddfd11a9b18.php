<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak - RennMobil</title>
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
            background: var(--gray);
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
        .hero-kontak {
            position: relative; min-height: 50vh;
            display: flex; align-items: center; justify-content: center; text-align: center;
            background: url("<?php echo e(asset('images/hero-bg.jpg')); ?>") center/cover no-repeat;
            padding: 120px 5% 60px;
        }
        .hero-kontak::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.92) 0%, rgba(15,52,96,0.85) 100%);
        }
        .hero-kontak-content {
            position: relative; z-index: 2; max-width: 700px;
        }
        .hero-kontak-content h1 {
            font-size: 3rem; font-weight: 800; color: var(--light); margin-bottom: 15px;
        }
        .hero-kontak-content h1 span { color: var(--primary); }
        .hero-kontak-content p {
            color: rgba(255,255,255,0.8); font-size: 1.05rem;
        }

        /* SECTION */
        .section { padding: 80px 5%; }
        .container { max-width: var(--container); margin: 0 auto; }

        /* KONTAK GRID */
        .kontak-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: var(--container);
            margin: 0 auto;
        }

        /* FORM */
        .form-card {
            background: var(--light);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: var(--shadow-soft);
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block; font-size: 0.85rem; font-weight: 600;
            color: var(--text); margin-bottom: 6px;
        }
        .form-control {
            width: 100%; padding: 12px 16px;
            border: 1px solid var(--gray-2); border-radius: var(--radius-sm);
            font-family: 'Poppins', sans-serif; font-size: 0.9rem;
            outline: none; transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--primary); box-shadow: 0 0 0 3px rgba(229,57,53,0.1);
        }
        .form-row {
            display: grid; grid-template-columns: 1fr 1fr; gap: 16px;
        }
        .form-control-textarea {
            resize: none; min-height: 130px;
        }
        .btn-submit {
            background: var(--primary); color: var(--light);
            padding: 13px 35px; border: none; border-radius: 50px;
            font-weight: 600; font-size: 0.9rem; font-family: 'Poppins', sans-serif;
            cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-submit:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 4px 15px rgba(229,57,53,0.4); }

        /* INFO */
        .info-card {
            background: var(--light);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: var(--shadow-soft);
            margin-bottom: 24px;
        }
        .info-item {
            display: flex; align-items: flex-start; gap: 16px;
            padding: 16px 0;
        }
        .info-item + .info-item { border-top: 1px solid var(--gray-2); }
        .info-icon {
            width: 46px; height: 46px;
            background: var(--primary-soft); border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .info-icon i { color: var(--primary); font-size: 1.15rem; }
        .info-text h4 { font-size: 0.9rem; font-weight: 600; color: var(--dark); margin-bottom: 4px; }
        .info-text p { color: var(--text-light); font-size: 0.85rem; line-height: 1.5; }

        /* MAPS */
        .maps-card {
            background: var(--light);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow-soft);
        }
        .maps-container {
            width: 100%;
            border-radius: var(--radius-sm);
            overflow: hidden;
        }
        .maps-container iframe {
            width: 100%;
            height: 250px;
            display: block;
        }

        /* FOOTER */
        .footer {
            background: var(--dark); color: rgba(255,255,255,0.7);
            padding: 50px 5% 30px;
        }
        .footer-grid {
            display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 40px;
            max-width: var(--container);
            margin: 0 auto;
        }
        .footer-brand h3 {
            font-size: 1.5rem; font-weight: 800; color: var(--primary); margin-bottom: 12px;
        }
        .footer-brand p { font-size: 0.85rem; line-height: 1.7; }
        .footer-social { display: flex; gap: 10px; margin-top: 16px; }
        .footer-social a {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.6); font-size: 0.8rem;
            transition: all 0.3s;
        }
        .footer-social a:hover { background: var(--primary); color: var(--light); }
        .footer-col h4 {
            font-size: 0.9rem; font-weight: 600; color: var(--light); margin-bottom: 16px;
        }
        .footer-col ul { list-style: none; }
        .footer-col li { margin-bottom: 8px; }
        .footer-col a {
            color: rgba(255,255,255,0.6); font-size: 0.85rem; transition: color 0.3s;
        }
        .footer-col a:hover { color: var(--light); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 20px; margin-top: 30px;
            text-align: center; font-size: 0.8rem;
            max-width: var(--container); margin-left: auto; margin-right: auto;
        }

        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; }
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
            .hero-kontak { min-height: 40vh; padding: 100px 5% 40px; }
            .hero-kontak-content h1 { font-size: 2rem; }
            .section { padding: 50px 5%; }
            .kontak-grid { grid-template-columns: 1fr; gap: 24px; }
            .form-row { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; gap: 30px; }
            .footer-bottom { margin-top: 20px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="<?php echo e(url('/')); ?>" class="navbar-logo">Renn<span style="color:var(--primary)">Mobil</span></a>
        <ul class="navbar-links" id="navLinks">
            <li><a href="<?php echo e(url('/')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(url('/tentang')); ?>">Tentang</a></li>
            <li><a href="<?php echo e(url('/mobil')); ?>">Mobil</a></li>
            <li><a href="<?php echo e(url('/galeri')); ?>">Galeri</a></li>
            <li><a href="<?php echo e(url('/layanan')); ?>">Layanan</a></li>
            <li><a href="<?php echo e(url('/syarat')); ?>">S&K</a></li>
            <li><a href="<?php echo e(url('/kontak')); ?>" class="active">Kontak kami</a></li>
            <li><a href="<?php echo e(url('/my-bookings')); ?>">Riwayat</a></li>
            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background:#374151;color:#fff;border:none;padding:8px 24px;border-radius:50px;font-weight:600;font-family:'Poppins',sans-serif;font-size:0.85rem;cursor:pointer">Logout</button>
                </form>
            </li>
        </ul>
        <div class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-kontak">
        <div class="hero-kontak-content">
            <h1>Kontak <span>Kami</span></h1>
            <p>Hubungi tim kami untuk informasi lebih lanjut</p>
        </div>
    </section>

    <!-- KONTAK -->
    <section class="section">
        <div class="kontak-grid">

            <!-- FORM -->
            <div class="form-card">
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan email Anda">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No Handphone</label>
                        <input type="tel" class="form-control" placeholder="Contoh: 08123456789">
                    </div>
                    <div class="form-group">
                        <label>Pesan Anda</label>
                        <textarea class="form-control form-control-textarea" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> Kirim Pesan</button>
                </form>
            </div>

            <!-- INFO -->
            <div>
                <div class="info-card">
                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-text">
                            <h4>Email</h4>
                            <p>info@rennmobil.com</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-phone"></i></div>
                        <div class="info-text">
                            <h4>Telepon</h4>
                            <p>+62 81338044279</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-clock"></i></div>
                        <div class="info-text">
                            <h4>Jam Operasional</h4>
                            <p>Senin - Sabtu: 08:00 - 20:00<br>Minggu: 09:00 - 17:00</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-text">
                            <h4>Alamat</h4>
                            <p>Jl.Berdikari,Padang Bulan Selayang II</p>
                        </div>
                    </div>
                </div>

                <div class="maps-card">
                    <div class="maps-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.1360863420605!2d98.64885307423755!3d3.556104750517775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fe6f7a0c5d9%3A0x8c07e4ad80b29ab7!2sGEArental!5e0!3m2!1sid!2sid!4v1778380752137!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>RennMobil</h3>
                <p>Penyedia layanan rental mobil terpercaya dengan pengalaman terbaik untuk setiap perjalanan Anda.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Perusahaan</h4>
                <ul>
                    <li><a href="<?php echo e(url('/tentang')); ?>">Tentang Kami</a></li>
                    <li><a href="<?php echo e(url('/mobil')); ?>">Mobil</a></li>
                    <li><a href="<?php echo e(url('/galeri')); ?>">Galeri</a></li>
                    <li><a href="<?php echo e(url('/kontak')); ?>">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="<?php echo e(url('/layanan')); ?>">Sewa Lepas Kunci</a></li>
                    <li><a href="<?php echo e(url('/layanan')); ?>">Sewa Dengan Sopir</a></li>
                    <li><a href="<?php echo e(url('/layanan')); ?>">Paket Bulanan</a></li>
                    <li><a href="<?php echo e(url('/syarat')); ?>">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Bantuan</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="<?php echo e(url('/kontak')); ?>">Hubungi Kami</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> OREEN. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }
    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/kontak.blade.php ENDPATH**/ ?>