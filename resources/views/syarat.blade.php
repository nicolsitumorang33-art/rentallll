<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - RenMobil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-[Poppins] bg-gray-50">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-5 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-red-600">RenMobil</a>
            <div class="hidden md:flex items-center gap-7">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Beranda</a>
                <a href="{{ url('/tentang') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Tentang</a>
                <a href="{{ url('/mobil') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Mobil</a>
                <a href="{{ url('/galeri') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Galeri</a>
                <a href="{{ url('/layanan') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Layanan</a>
                <a href="{{ url('/syarat') }}" class="text-red-600 font-semibold relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[3px] after:bg-red-600 after:rounded">S&K</a>
                <a href="{{ url('/kontak') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Kontak Kami</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-gray-700 text-white px-6 py-2 rounded-full font-semibold hover:bg-gray-800 transition">Logout</button>
                </form>
            </div>
            <button @click="open = !open" class="md:hidden flex flex-col gap-1.5">
                <span class="w-6 h-0.5 bg-gray-800 rounded"></span>
                <span class="w-6 h-0.5 bg-gray-800 rounded"></span>
                <span class="w-6 h-0.5 bg-gray-800 rounded"></span>
            </button>
        </div>
        <div x-show="open" @click.away="open = false" x-cloak class="md:hidden bg-white border-t shadow-lg px-5 py-4 space-y-3">
            <a href="{{ url('/') }}" class="block text-gray-700 font-medium">Beranda</a>
            <a href="{{ url('/tentang') }}" class="block text-gray-700 font-medium">Tentang</a>
            <a href="{{ url('/mobil') }}" class="block text-gray-700 font-medium">Mobil</a>
            <a href="{{ url('/galeri') }}" class="block text-gray-700 font-medium">Galeri</a>
            <a href="{{ url('/layanan') }}" class="block text-gray-700 font-medium">Layanan</a>
            <a href="{{ url('/syarat') }}" class="block text-red-600 font-semibold">S&K</a>
            <a href="{{ url('/kontak') }}" class="block text-gray-700 font-medium">Kontak Kami</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left bg-gray-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <!-- HERO -->
    <section class="relative min-h-[55vh] flex items-center pt-24 pb-20 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-bg.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900/95 to-blue-900/85"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-5 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Syarat & <span class="text-red-500">Ketentuan</span></h1>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto">Harap baca dan pahami ketentuan berikut sebelum menggunakan layanan rental RenMobil</p>
        </div>
    </section>

    <!-- ISI UMUM -->
    <section class="py-16 px-5">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-contract text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Penjelasan Umum</h2>
                        <p class="text-gray-600 leading-relaxed">Dengan menggunakan layanan RenMobil, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku. Ketentuan ini mengatur hubungan hukum antara penyewa dan RenMobil sebagai penyedia layanan rental kendaraan. Kami berhak memperbarui ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ACCORDION -->
    <section class="pb-20 px-5">
        <div class="max-w-4xl mx-auto" x-data="{ active: null }">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Ketentuan Layanan</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 1 ? active = null : active = 1" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-check text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">1. Pemesanan</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 1 }"></i>
                    </button>
                    <div x-show="active === 1" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Pemesanan dapat dilakukan melalui website, aplikasi, atau langsung ke kantor RenMobil</li>
                            <li>Penyewa wajib mengisi data diri lengkap dan valid saat melakukan pemesanan</li>
                            <li>Pemesanan dianggap sah setelah dilakukan pembayaran uang muka (DP) minimal 30% dari total biaya</li>
                            <li>Konfirmasi pemesanan akan dikirimkan melalui email atau WhatsApp dalam waktu maksimal 2 jam</li>
                            <li>Penyewa wajib menyerahkan KTP/SIM asli yang masih berlaku sebagai jaminan</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 2 ? active = null : active = 2" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-credit-card text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">2. Pembayaran</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 2 }"></i>
                    </button>
                    <div x-show="active === 2" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Pembayaran dapat dilakukan melalui transfer bank, e-wallet, atau tunai</li>
                            <li>Pelunasan dilakukan saat pengambilan kendaraan di kantor atau lokasi yang disepakati</li>
                            <li>Deposit jaminan kerusakan akan dikembalikan setelah kendaraan dikembalikan dalam kondisi baik</li>
                            <li>Keterlambatan pembayaran lebih dari 24 jam akan dikenakan denda 5% dari total biaya</li>
                            <li>Harga yang tercantum belum termasuk BBM, tol, dan parkir</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 3 ? active = null : active = 3" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-car text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">3. Penggunaan Kendaraan</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 3 }"></i>
                    </button>
                    <div x-show="active === 3" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Kendaraan hanya boleh dikemudikan oleh penyewa atau orang yang ditunjuk dengan SIM berlaku</li>
                            <li>Dilarang menggunakan kendaraan untuk kegiatan ilegal atau melanggar hukum</li>
                            <li>Kendaraan tidak boleh disewakan kembali kepada pihak lain (sublet)</li>
                            <li>Kepala keluar kota/keluar pulau wajib mendapat izin tertulis dari RenMobil</li>
                            <li>Penyewa bertanggung jawab atas tilang dan pelanggaran lalu lintas selama masa sewa</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 4 ? active = null : active = 4" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-undo text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">4. Pembatalan & Pengembalian</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 4 }"></i>
                    </button>
                    <div x-show="active === 4" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Pembatalan H-3 sebelum tanggal sewa: DP dikembalikan 100%</li>
                            <li>Pembatalan H-1 sebelum tanggal sewa: DP dikembalikan 50%</li>
                            <li>Pembatalan pada hari H: DP tidak dapat dikembalikan</li>
                            <li>Keterlambatan pengembalian dikenakan biaya tambahan sesuai tarif per jam</li>
                            <li>Keterlambatan lebih dari 6 jam dihitung sebagai 1 hari sewa penuh</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 5 ? active = null : active = 5" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-shield-halved text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">5. Asuransi</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 5 }"></i>
                    </button>
                    <div x-show="active === 5" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Semua kendaraan telah dilengkapi asuransi all risk</li>
                            <li>Penyewa tetap bertanggung jawab atas self-assured (kerugian yang ditanggung sendiri)</li>
                            <li>Kerusakan akibat kelalaian penyewa tidak ditanggung asuransi</li>
                            <li>Penyewa wajib melaporkan kecelakaan atau kerusakan dalam waktu 1x24 jam</li>
                            <li>Biaya tambahan asuransi premium dapat ditambahkan sesuai permintaan</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 6 ? active = null : active = 6" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-check text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">6. Kewajiban Penyewa</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 6 }"></i>
                    </button>
                    <div x-show="active === 6" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Menjaga kebersihan dan kondisi kendaraan selama masa sewa</li>
                            <li>Mengisi BBM sesuai jenis yang ditentukan (Pertamax/Pertalite)</li>
                            <li>Tidak merokok di dalam kendaraan</li>
                            <li>Mengembalikan kendaraan dalam kondisi sama seperti saat diterima</li>
                            <li>Bertanggung jawab atas kehilangan barang atau aksesoris kendaraan</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 7 ? active = null : active = 7" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-circle-info text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">7. Lain-lain</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 7 }"></i>
                    </button>
                    <div x-show="active === 7" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Hal-hal yang tidak diatur dalam ketentuan ini akan dibahas secara musyawarah</li>
                            <li>RenMobil berhak menghentikan layanan jika terjadi pelanggaran ketentuan</li>
                            <li>Sengketa akan diselesaikan melalui jalur hukum yang berlaku di Indonesia</li>
                            <li>Domisili hukum berada di wilayah kantor pusat RenMobil</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <button @click="active === 8 ? active = null : active = 8" class="w-full flex items-center justify-between p-5 text-left">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-pen-to-square text-red-600"></i>
                            </div>
                            <span class="font-semibold text-gray-800">8. Perubahan Ketentuan</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': active === 8 }"></i>
                    </button>
                    <div x-show="active === 8" x-collapse x-cloak class="px-5 pb-5 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <p>RenMobil berhak mengubah syarat dan ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan efektif segera setelah dipublikasikan di website. Penyewa yang telah melakukan pemesanan setelah perubahan dianggap menyetujui ketentuan baru. Kami menyarankan untuk secara berkala memeriksa halaman ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA BANTUAN -->
    <section class="bg-red-50 py-14 px-5">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-red-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-phone text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Butuh Bantuan?</h3>
                    <p class="text-gray-600 text-sm">Tim kami siap membantu anda kapan saja</p>
                </div>
            </div>
            <a href="{{ url('/kontak') }}" class="bg-red-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-red-700 transition flex items-center gap-2">
                Hubungi Kami <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-8 px-5 text-center text-sm">
        <p>&copy; {{ date('Y') }} RenMobil. All rights reserved.</p>
    </footer>

</body>
</html>
