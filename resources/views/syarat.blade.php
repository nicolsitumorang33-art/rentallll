<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syarat & Ketentuan - OREEN</title>
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
        .hero-syarat {
            position: relative; min-height: 50vh;
            display: flex; align-items: center;
            background: url("{{ asset('images/hero-bg.jpg') }}") center/cover no-repeat;
            padding: 120px 5% 60px;
        }
        .hero-syarat::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(26,26,46,0.92) 0%, rgba(15,52,96,0.85) 100%);
        }
        .hero-syarat-content {
            position: relative; z-index: 2; max-width: 650px;
        }
        .hero-syarat-content h1 {
            font-size: 3rem; font-weight: 800; color: var(--light); margin-bottom: 15px;
        }
        .hero-syarat-content h1 span { color: var(--primary); }
        .hero-syarat-content p {
            color: rgba(255,255,255,0.8); font-size: 1.05rem; line-height: 1.7;
        }

        /* SECTION */
        .section { padding: 80px 5%; }
        .container { max-width: var(--container); margin: 0 auto; }

        /* DESKRIPSI CARD */
        .desc-card {
            background: var(--primary-soft);
            border-radius: var(--radius);
            padding: 35px;
            display: flex; align-items: flex-start; gap: 20px;
        }
        .desc-card-icon {
            width: 55px; height: 55px;
            background: var(--light);
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .desc-card-icon i { color: var(--primary); font-size: 1.4rem; }
        .desc-card h2 { font-size: 1.3rem; font-weight: 700; color: var(--dark); margin-bottom: 8px; }
        .desc-card p { color: var(--text-light); font-size: 0.9rem; line-height: 1.7; }

        /* ACCORDION */
        .accordion-item {
            background: var(--light);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
            margin-bottom: 12px;
        }
        .accordion-btn {
            width: 100%; display: flex; align-items: center; justify-content: space-between;
            padding: 18px 24px; background: var(--light); border: none;
            cursor: pointer; font-family: 'Poppins', sans-serif;
            transition: background 0.3s;
        }
        .accordion-btn:hover { background: var(--primary-soft); }
        .accordion-btn-left {
            display: flex; align-items: center; gap: 16px;
        }
        .accordion-num {
            width: 36px; height: 36px;
            background: var(--primary-soft); border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 0.85rem; color: var(--primary);
            flex-shrink: 0;
        }
        .accordion-btn span { font-weight: 600; color: var(--dark); font-size: 0.95rem; }
        .accordion-arrow { color: #bbb; font-size: 0.8rem; transition: transform 0.3s; }
        .accordion-arrow.open { transform: rotate(180deg); }
        .accordion-body {
            padding: 0 24px 20px;
            color: var(--text-light); font-size: 0.9rem; line-height: 1.7;
        }
        .accordion-body ul { list-style: disc; padding-left: 20px; }
        .accordion-body li { margin-bottom: 6px; }
        .accordion-body p { margin-bottom: 6px; }

        /* BANTUAN */
        .bantuan-card {
            background: var(--primary-soft);
            border-radius: var(--radius);
            padding: 35px 40px;
            display: flex; align-items: center; gap: 20px;
        }
        .bantuan-icon {
            width: 60px; height: 60px;
            background: var(--light); border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .bantuan-icon i { color: var(--primary); font-size: 1.5rem; }
        .bantuan-text { flex: 1; }
        .bantuan-text h3 { font-size: 1.15rem; font-weight: 700; color: var(--dark); }
        .bantuan-text p { color: var(--text-light); font-size: 0.9rem; margin-top: 4px; }
        .btn-bantuan {
            display: inline-block;
            background: var(--primary); color: var(--light);
            padding: 11px 30px; border-radius: 50px;
            font-weight: 600; font-size: 0.9rem; font-family: 'Poppins', sans-serif;
            transition: all 0.3s; white-space: nowrap; border: none; cursor: pointer;
        }
        .btn-bantuan:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 4px 15px rgba(229,57,53,0.4); }

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

        @media (max-width: 768px) {
            .hamburger { display: flex; }
            .navbar-links {
                position: fixed; top: 0; right: -100%; width: 280px; height: 100vh;
                background: var(--light); flex-direction: column;
                padding: 80px 30px 30px; transition: right 0.3s;
                box-shadow: var(--shadow-hover);
            }
            .navbar-links.active { right: 0; }
            .hero-syarat { min-height: 40vh; padding: 100px 5% 40px; }
            .hero-syarat-content h1 { font-size: 2rem; }
            .section { padding: 50px 5%; }
            .desc-card { flex-direction: column; }
            .bantuan-card { flex-direction: column; text-align: center; }
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
            <li><a href="{{ url('/layanan') }}">Layanan</a></li>
            <li><a href="{{ url('/syarat') }}" class="active">S&K</a></li>
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
    <section class="hero-syarat">
        <div class="hero-syarat-content">
            <h1>Syarat & <span>Ketentuan</span></h1>
            <p>Ketentuan yang berlaku dalam penggunaan layanan sewa mobil di OREEN</p>
        </div>
    </section>

    <!-- DESKRIPSI -->
    <section class="section" style="padding-bottom:40px">
        <div class="container">
            <div class="desc-card">
                <div class="desc-card-icon"><i class="fas fa-file-contract"></i></div>
                <div>
                    <h2>Penjelasan Umum</h2>
                    <p>Dengan menggunakan layanan OREEN, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku. Ketentuan ini mengatur hubungan hukum antara penyewa dan OREEN sebagai penyedia layanan rental kendaraan. Kami berhak memperbarui ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ACCORDION -->
    <section class="section" style="padding-top:0">
        <div class="container">
            <h2 style="font-size:1.6rem;font-weight:700;color:var(--dark);text-align:center;margin-bottom:40px">Ketentuan Layanan</h2>

            <div x-data="{ active: null }">

                <div class="accordion-item">
                    <button @click="active === 1 ? active = null : active = 1" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">1</div>
                            <span>Pemesanan</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 1 }"></i>
                    </button>
                    <div x-show="active === 1" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Pemesanan dapat dilakukan melalui website, aplikasi, atau langsung ke kantor OREEN</li>
                            <li>Penyewa wajib mengisi data diri lengkap dan valid saat melakukan pemesanan</li>
                            <li>Pemesanan dianggap sah setelah dilakukan pembayaran uang muka (DP) minimal 30% dari total biaya</li>
                            <li>Konfirmasi pemesanan akan dikirimkan melalui email atau WhatsApp dalam waktu maksimal 2 jam</li>
                            <li>Penyewa wajib menyerahkan KTP/SIM asli yang masih berlaku sebagai jaminan</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 2 ? active = null : active = 2" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">2</div>
                            <span>Pembayaran</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 2 }"></i>
                    </button>
                    <div x-show="active === 2" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Pembayaran dapat dilakukan melalui transfer bank, e-wallet, atau tunai</li>
                            <li>Pelunasan dilakukan saat pengambilan kendaraan di kantor atau lokasi yang disepakati</li>
                            <li>Deposit jaminan kerusakan akan dikembalikan setelah kendaraan dikembalikan dalam kondisi baik</li>
                            <li>Keterlambatan pembayaran lebih dari 24 jam akan dikenakan denda 5% dari total biaya</li>
                            <li>Harga yang tercantum belum termasuk BBM, tol, dan parkir</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 3 ? active = null : active = 3" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">3</div>
                            <span>Penggunaan Kendaraan</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 3 }"></i>
                    </button>
                    <div x-show="active === 3" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Kendaraan hanya boleh dikemudikan oleh penyewa atau orang yang ditunjuk dengan SIM berlaku</li>
                            <li>Dilarang menggunakan kendaraan untuk kegiatan ilegal atau melanggar hukum</li>
                            <li>Kendaraan tidak boleh disewakan kembali kepada pihak lain (sublet)</li>
                            <li>Kepala keluar kota/keluar pulau wajib mendapat izin tertulis dari OREEN</li>
                            <li>Penyewa bertanggung jawab atas tilang dan pelanggaran lalu lintas selama masa sewa</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 4 ? active = null : active = 4" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">4</div>
                            <span>Pembatalan & Pengembalian</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 4 }"></i>
                    </button>
                    <div x-show="active === 4" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Pembatalan H-3 sebelum tanggal sewa: DP dikembalikan 100%</li>
                            <li>Pembatalan H-1 sebelum tanggal sewa: DP dikembalikan 50%</li>
                            <li>Pembatalan pada hari H: DP tidak dapat dikembalikan</li>
                            <li>Keterlambatan pengembalian dikenakan biaya tambahan sesuai tarif per jam</li>
                            <li>Keterlambatan lebih dari 6 jam dihitung sebagai 1 hari sewa penuh</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 5 ? active = null : active = 5" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">5</div>
                            <span>Asuransi</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 5 }"></i>
                    </button>
                    <div x-show="active === 5" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Semua kendaraan telah dilengkapi asuransi all risk</li>
                            <li>Penyewa tetap bertanggung jawab atas self-assured (kerugian yang ditanggung sendiri)</li>
                            <li>Kerusakan akibat kelalaian penyewa tidak ditanggung asuransi</li>
                            <li>Penyewa wajib melaporkan kecelakaan atau kerusakan dalam waktu 1x24 jam</li>
                            <li>Biaya tambahan asuransi premium dapat ditambahkan sesuai permintaan</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 6 ? active = null : active = 6" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">6</div>
                            <span>Kewajiban Penyewa</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 6 }"></i>
                    </button>
                    <div x-show="active === 6" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Menjaga kebersihan dan kondisi kendaraan selama masa sewa</li>
                            <li>Mengisi BBM sesuai jenis yang ditentukan (Pertamax/Pertalite)</li>
                            <li>Tidak merokok di dalam kendaraan</li>
                            <li>Mengembalikan kendaraan dalam kondisi sama seperti saat diterima</li>
                            <li>Bertanggung jawab atas kehilangan barang atau aksesoris kendaraan</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 7 ? active = null : active = 7" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">7</div>
                            <span>Lain-lain</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 7 }"></i>
                    </button>
                    <div x-show="active === 7" x-collapse x-cloak class="accordion-body">
                        <ul>
                            <li>Hal-hal yang tidak diatur dalam ketentuan ini akan dibahas secara musyawarah</li>
                            <li>OREEN berhak menghentikan layanan jika terjadi pelanggaran ketentuan</li>
                            <li>Sengketa akan diselesaikan melalui jalur hukum yang berlaku di Indonesia</li>
                            <li>Domisili hukum berada di wilayah kantor pusat OREEN</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <button @click="active === 8 ? active = null : active = 8" class="accordion-btn">
                        <div class="accordion-btn-left">
                            <div class="accordion-num">8</div>
                            <span>Perubahan Ketentuan</span>
                        </div>
                        <i class="fas fa-chevron-down accordion-arrow" :class="{ 'open': active === 8 }"></i>
                    </button>
                    <div x-show="active === 8" x-collapse x-cloak class="accordion-body">
                        <p>OREEN berhak mengubah syarat dan ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan efektif segera setelah dipublikasikan di website. Penyewa yang telah melakukan pemesanan setelah perubahan dianggap menyetujui ketentuan baru. Kami menyarankan untuk secara berkala memeriksa halaman ini.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BANTUAN -->
    <section class="section" style="padding-top:0">
        <div class="container">
            <div class="bantuan-card">
                <div class="bantuan-icon"><i class="fas fa-phone"></i></div>
                <div class="bantuan-text">
                    <h3>Butuh Bantuan?</h3>
                    <p>Jika ada pertanyaan terkait syarat & ketentuan, silahkan hubungi kami.</p>
                </div>
                <a href="{{ url('/kontak') }}" class="btn-bantuan">Hubungi Kami</a>
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

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }
    </script>

</body>
</html>