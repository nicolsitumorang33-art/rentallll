<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - RenMobil</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
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
            <a href="<?php echo e(url('/')); ?>" class="text-2xl font-extrabold text-red-600">RenMobil</a>
            <div class="hidden md:flex items-center gap-7">
                <a href="<?php echo e(url('/')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Beranda</a>
                <a href="<?php echo e(url('/tentang')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Tentang</a>
                <a href="<?php echo e(url('/mobil')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Mobil</a>
                <a href="<?php echo e(url('/galeri')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Galeri</a>
                <a href="<?php echo e(url('/layanan')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Layanan</a>
                <a href="<?php echo e(url('/syarat')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">S&K</a>
                <a href="<?php echo e(url('/kontak')); ?>" class="text-red-600 font-semibold relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[3px] after:bg-red-600 after:rounded">Kontak Kami</a>

                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
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
            <a href="<?php echo e(url('/')); ?>" class="block text-gray-700 font-medium">Beranda</a>
            <a href="<?php echo e(url('/tentang')); ?>" class="block text-gray-700 font-medium">Tentang</a>
            <a href="<?php echo e(url('/mobil')); ?>" class="block text-gray-700 font-medium">Mobil</a>
            <a href="<?php echo e(url('/galeri')); ?>" class="block text-gray-700 font-medium">Galeri</a>
            <a href="<?php echo e(url('/layanan')); ?>" class="block text-gray-700 font-medium">Layanan</a>
            <a href="<?php echo e(url('/syarat')); ?>" class="block text-gray-700 font-medium">S&K</a>
            <a href="<?php echo e(url('/kontak')); ?>" class="block text-red-600 font-semibold">Kontak Kami</a>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="block w-full text-left bg-gray-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <!-- HERO -->
    <section class="relative py-28 px-5 bg-gradient-to-br from-gray-900 to-blue-900 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3">Kontak <span class="text-red-500">Kami</span></h1>
        <p class="text-gray-300 text-lg max-w-xl mx-auto">Punya pertanyaan atau ingin menghubungi kami? Isi form di bawah ini atau hubungi kami langsung</p>
    </section>

    <!-- FORM KONTAK -->
    <section class="py-16 px-5 -mt-8">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 mb-16">
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan nama lengkap" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" placeholder="Masukkan email Anda" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No Handphone</label>
                        <input type="tel" placeholder="Contoh: 08123456789" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                        <textarea rows="5" placeholder="Tulis pesan Anda di sini..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition resize-none"></textarea>
                    </div>
                    <button type="submit" class="bg-red-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-red-700 transition flex items-center gap-2">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- INFO + MAPS -->
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Email</p>
                                <p class="text-gray-600">info@renmobil.com</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Telepon</p>
                                <p class="text-gray-600">+62 812-3456-7890</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Jam Operasional</p>
                                <p class="text-gray-600">Senin - Sabtu: 08.00 - 20.00</p>
                                <p class="text-gray-600">Minggu: 09.00 - 17.00</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-location-dot text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Alamat</p>
                                <p class="text-gray-600">Jl. Contoh No. 123, Jakarta Selatan, DKI Jakarta 12345</p>
                            </div>
                        </div>
                    </div>

                    <!-- SOCIAL MEDIA -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <p class="text-sm font-semibold text-gray-700 mb-4">Ikuti Kami</p>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-red-600 hover:text-white transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-red-600 hover:text-white transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-red-600 hover:text-white transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-red-600 hover:text-white transition">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-red-600 hover:text-white transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- MAPS -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.26149896694!2d106.6894!3d-6.2297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C+Indonesia!5e0!3m2!1sen!2s!4v1234567890" class="w-full h-full min-h-[400px]" style="border:0;" allowfullscreen loading="lazy"></iframe>
                    <div class="p-5">
                        <a href="https://maps.google.com" target="_blank" class="bg-red-600 text-white w-full block text-center px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition">
                            <i class="fas fa-map-location-dot mr-2"></i> Lihat Lokasi Kantor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-8 px-5 text-center text-sm">
        <p>&copy; <?php echo e(date('Y')); ?> RenMobil. All rights reserved.</p>
    </footer>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/kontak.blade.php ENDPATH**/ ?>