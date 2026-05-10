<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri - RenMobil</title>
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

        /* HERO */
        .hero-galeri {
            position: relative;
            min-height: 55vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: url('<?php echo e(asset("images/hero-bg.jpg")); ?>') center/cover no-repeat;
            padding: 120px 5% 60px;
        }
        .hero-galeri::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.93), rgba(15,52,96,0.85));
        }
        .hero-galeri-content {
            position: relative; z-index: 2; max-width: 700px;
        }
        .hero-galeri-content h1 {
            font-size: 3rem; font-weight: 800; color: var(--light); margin-bottom: 15px;
        }
        .hero-galeri-content h1 span { color: var(--primary); }
        .hero-galeri-content p {
            color: rgba(255,255,255,0.75); font-size: 1.05rem;
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
            color: var(--text-light); font-size: 0.95rem; max-width: 600px; margin: 0 auto;
        }

        /* GALERI GRID */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: var(--container);
            margin: 0 auto;
        }
        .galeri-card {
            background: var(--light);
            border-radius: var(--radius-sm);
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s;
        }
        .galeri-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }
        .galeri-card-img {
            width: 100%;
            aspect-ratio: 4 / 3;
            object-fit: cover;
            display: block;
            transition: transform 0.4s;
        }
        .galeri-card:hover .galeri-card-img {
            transform: scale(1.04);
        }
        .galeri-card-body {
            padding: 14px 18px 18px;
        }
        .galeri-card-body h3 {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--dark);
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
            font-size: 1.5rem; font-weight: 800; color: var(--primary);
        }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px; margin-top: 25px;
            text-align: center; font-size: 0.85rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .galeri-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
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
            .hero-galeri { min-height: 45vh; padding: 100px 5% 40px; }
            .hero-galeri-content h1 { font-size: 2rem; }
            .section { padding: 50px 5%; }
            .section-title h2 { font-size: 1.5rem; }
            .galeri-grid { grid-template-columns: 1fr; gap: 18px; }
            .footer-content { flex-direction: column; gap: 15px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="<?php echo e(url('/')); ?>" class="navbar-logo">RenMobil</a>
        <ul class="navbar-links" id="navLinks">
            <li><a href="<?php echo e(url('/')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(url('/tentang')); ?>">Tentang</a></li>
            <li><a href="<?php echo e(url('/mobil')); ?>">Mobil</a></li>
            <li><a href="<?php echo e(url('/galeri')); ?>" class="active">Galeri</a></li>
            <li><a href="<?php echo e(url('/layanan')); ?>">Layanan</a></li>
            <li><a href="<?php echo e(url('/syarat')); ?>">S&K</a></li>
            <li><a href="<?php echo e(url('/kontak')); ?>">Kontak Kami</a></li>
            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline" style="display:inline">
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
    <section class="hero-galeri">
        <div class="hero-galeri-content">
            <h1>Galeri <span>Kami</span></h1>
            <p>Momen terbaik perjalanan bersama pelanggan setia RenMobil</p>
        </div>
    </section>

    <!-- GALERI -->
    <section class="section">
        <div class="section-title">
            <h2>Galeri <span>Perjalanan</span></h2>
            <p>Dokumentasi aktivitas dan momen kebersamaan dalam setiap perjalanan bersama RenMobil</p>
        </div>
        <div class="galeri-grid">
            <div class="galeri-card">
                <img src="<?php echo e(asset('images/gallery-1.jpg')); ?>" alt="Pelanggan di mobil" class="galeri-card-img">
                <div class="galeri-card-body"><h3>Pelanggan di Mobil</h3></div>
            </div>
            <div class="galeri-card">
                <img src="<?php echo e(asset('images/gallery-2.jpg')); ?>" alt="Serah terima mobil" class="galeri-card-img">
                <div class="galeri-card-body"><h3>Serah Terima Mobil</h3></div>
            </div>
            <div class="galeri-card">
                <img src="<?php echo e(asset('images/gallery-3.jpg')); ?>" alt="Tim rental" class="galeri-card-img">
                <div class="galeri-card-body"><h3>Tim Rental</h3></div>
            </div>
            <div class="galeri-card">
                <img src="<?php echo e(asset('images/gallery-4.jpg')); ?>" alt="Perjalanan keluarga" class="galeri-card-img">
                <div class="galeri-card-body"><h3>Perjalanan Keluarga</h3></div>
            </div>
            <div class="galeri-card">
                <img src="<?php echo e(asset('images/gallery-5.jpg')); ?>" alt="Driver profesional" class="galeri-card-img">
                <div class="galeri-card-body"><h3>Driver Profesional</h3></div>
            </div>
            <div class="galeri-card">
                <img src="<?php echo e(asset('images/gallery-6.jpg')); ?>" alt="Aktivitas rental" class="galeri-card-img">
                <div class="galeri-card-body"><h3>Aktivitas Rental</h3></div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">RenMobil</div>
            <p style="font-size:0.9rem">Kepuasan Anda adalah prioritas kami</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> RenMobil. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }
    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/galeri.blade.php ENDPATH**/ ?>