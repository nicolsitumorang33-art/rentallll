<?php
    $cars = [
        ['name' => 'Toyota Avanza', 'desc' => '4 Pintu · 7 Penumpang · Manual', 'price' => '350.000', 'img' => 'car-avanza.jpg'],
        ['name' => 'Mitsubishi Xpander', 'desc' => '4 Pintu · 7 Penumpang · Automatic', 'price' => '400.000', 'img' => 'car-xpander.jpg'],
        ['name' => 'Toyota Innova', 'desc' => '4 Pintu · 7 Penumpang · Automatic', 'price' => '500.000', 'img' => 'car-innova.jpg'],
        ['name' => 'Honda Brio', 'desc' => '4 Pintu · 5 Penumpang · Manual', 'price' => '250.000', 'img' => 'car-brio.jpg'],
        ['name' => 'Toyota Fortuner', 'desc' => '4 Pintu · 7 Penumpang · Automatic', 'price' => '900.000', 'img' => 'car-fortuner.jpg'],
        ['name' => 'Suzuki Ertiga', 'desc' => '4 Pintu · 7 Penumpang · Manual', 'price' => '300.000', 'img' => 'car-ertiga.jpg'],
        ['name' => 'Isuzu Elf', 'desc' => '4 Pintu · 19 Penumpang · Manual', 'price' => '1.200.000', 'img' => 'car-elf.jpg'],
        ['name' => 'Mitsubishi Pajero Sport', 'desc' => '4 Pintu · 7 Penumpang · Automatic', 'price' => '800.000', 'img' => 'car-pajero.jpg'],
        ['name' => 'Daihatsu Ayla', 'desc' => '4 Pintu · 5 Penumpang · Manual', 'price' => '200.000', 'img' => 'car-ayla.jpg'],
        ['name' => 'Daihatsu Sigra', 'desc' => '4 Pintu · 7 Penumpang · Manual', 'price' => '250.000', 'img' => 'car-sigra.jpg'],
    ];
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mobil - RenMobil</title>
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
            background: var(--gray);
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
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
            bottom: -5px; left: 0;
            width: 100%; height: 3px;
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
            width: 25px; height: 3px;
            background: var(--dark);
            border-radius: 2px;
            transition: 0.3s;
        }

        /* HERO */
        .hero-cars {
            position: relative;
            padding: 140px 5% 60px;
            background: url("<?php echo e(asset('images/hero-bg.jpg')); ?>") center/cover no-repeat;
            text-align: center;
        }

        .hero-cars::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.93) 0%, rgba(15,52,96,0.85) 100%);
        }

        .hero-cars-content {
            position: relative;
            z-index: 2;
        }

        .hero-cars h1 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 10px;
        }

        .hero-cars h1 span {
            color: var(--primary);
        }

        .hero-cars p {
            color: rgba(255,255,255,0.7);
            font-size: 1.05rem;
            margin-bottom: 35px;
        }

        .search-bar {
            display: inline-flex;
            align-items: center;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 6px;
            width: 100%;
            max-width: 550px;
        }

        .search-bar input {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            padding: 12px 20px;
            color: var(--light);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
        }

        .search-bar input::placeholder {
            color: rgba(255,255,255,0.5);
        }

        .btn-search {
            background: var(--primary);
            color: var(--light);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-search:hover {
            background: var(--primary-dark);
        }

        /* CAR LIST */
        .car-list-section {
            padding: 60px 5% 80px;
        }

        .car-list-container {
            width: 100%;
        }

        .car-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .car-list-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .car-count {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .car-count span {
            color: var(--primary);
            font-weight: 600;
        }

        .car-card {
            background: var(--light);
            border-radius: var(--radius);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
            display: grid;
            grid-template-columns: 280px 1fr auto;
            align-items: center;
            margin-bottom: 20px;
            transition: all 0.3s;
            border: 1px solid transparent;
        }

        .car-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
            border-color: var(--primary-soft);
        }

        .car-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: var(--gray);
        }

        .car-card-info {
            padding: 30px 35px;
        }

        .car-card-info h3 {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .car-card-info .desc {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 12px;
        }

        .car-specs {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .car-spec {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .car-spec i {
            color: var(--primary);
            font-size: 0.9rem;
        }

        .car-card-action {
            padding: 30px 35px;
            text-align: right;
            min-width: 220px;
            border-left: 1px solid var(--gray-2);
        }

        .car-price {
            color: var(--primary);
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .car-price small {
            font-size: 0.8rem;
            font-weight: 400;
            color: var(--text-light);
        }

        .btn-order {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            color: var(--light);
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
        }

        .btn-order:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(229, 57, 53, 0.4);
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            display: none;
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--gray-2);
            margin-bottom: 15px;
        }

        .empty-state p {
            color: var(--text-light);
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            color: rgba(255,255,255,0.7);
            padding: 40px 5% 25px;
        }

        .footer-content {
            width: 100%;
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
            .car-card {
                grid-template-columns: 220px 1fr;
            }

            .car-card-action {
                grid-column: 1 / -1;
                border-left: none;
                border-top: 1px solid var(--gray-2);
                text-align: left;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 30px;
            }
        }

        @media (max-width: 768px) {
            .hamburger { display: flex; }

            .navbar-links {
                position: fixed;
                top: 0; right: -100%;
                width: 280px; height: 100vh;
                background: var(--light);
                flex-direction: column;
                padding: 80px 30px 30px;
                transition: right 0.3s;
                box-shadow: var(--shadow-hover);
            }

            .navbar-links.active { right: 0; }

            .hero-cars h1 { font-size: 2.2rem; }

            .car-card {
                grid-template-columns: 1fr;
            }

            .car-card-img { height: 180px; }

            .car-card-action {
                border-top: 1px solid var(--gray-2);
                text-align: left;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 30px;
            }

            .car-list-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .footer-content {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
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
            <li><a href="<?php echo e(url('/mobil')); ?>" class="active">Mobil</a></li>
            <li><a href="<?php echo e(url('/galeri')); ?>">Galeri</a></li>
            <li><a href="<?php echo e(url('/layanan')); ?>">Layanan</a></li>
            <li><a href="<?php echo e(url('/syarat')); ?>">S&K</a></li>
            <li><a href="<?php echo e(url('/kontak')); ?>">Kontak Kami</a></li>

            <li>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-login" style="background:#374151;">Logout</button>
                </form>
            </li>
        </ul>
        <div class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-cars">
        <div class="hero-cars-content">
            <h1>Pilihan Mobil <span>Terbaik</span></h1>
            <p>Temukan mobil yang sesuai dengan kebutuhan perjalanan Anda</p>
            <form class="search-bar" id="searchForm">
                <input type="text" id="searchInput" placeholder="Cari mobil atau tipe..." autocomplete="off">
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
    </section>

    <!-- CAR LIST -->
    <section class="car-list-section">
        <div class="car-list-container">
            <div class="car-list-header">
                <h2>Daftar Mobil Tersedia</h2>
                <p class="car-count">Menampilkan <span id="carCount"><?php echo e(count($cars)); ?></span> mobil</p>
            </div>

            <div id="carList">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="car-card" data-name="<?php echo e(strtolower($car['name'])); ?>">
                    <img src="<?php echo e(asset('images/' . $car['img'])); ?>" alt="<?php echo e($car['name']); ?>" class="car-card-img">
                    <div class="car-card-info">
                        <h3><?php echo e($car['name']); ?></h3>
                        <p class="desc"><?php echo e($car['desc']); ?></p>
                        <div class="car-specs">
                            <span class="car-spec"><i class="fas fa-users"></i> Tersedia</span>
                            <span class="car-spec"><i class="fas fa-gas-pump"></i> BBM Iririt</span>
                            <span class="car-spec"><i class="fas fa-snowflake"></i> AC Double</span>
                        </div>
                    </div>
                    <div class="car-card-action">
                        <div class="car-price">Rp <?php echo e($car['price']); ?> <small>/Hari</small></div>
                        <a href="<?php echo e(url('/booking')); ?>" class="btn-order">
                            Sewa Sekarang <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="empty-state" id="emptyState">
                <i class="fas fa-car-side"></i>
                <p>Mobil tidak ditemukan</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">RenMobil</div>
            <p style="font-size: 0.9rem;">Penyedia jasa rental mobil terpercaya</p>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> RenMobil. All rights reserved.</p>
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

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');
        const carList = document.getElementById('carList');
        const emptyState = document.getElementById('emptyState');
        const carCount = document.getElementById('carCount');

        function filterCars() {
            const query = searchInput.value.toLowerCase();
            const cards = carList.querySelectorAll('.car-card');
            let visible = 0;

            cards.forEach(card => {
                const name = card.dataset.name;
                if (name.includes(query)) {
                    card.style.display = 'grid';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });

            carCount.textContent = visible;
            emptyState.style.display = visible === 0 ? 'block' : 'none';
        }

        searchForm.addEventListener('submit', e => {
            e.preventDefault();
            filterCars();
        });

        searchInput.addEventListener('input', filterCars);
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/cars.blade.php ENDPATH**/ ?>