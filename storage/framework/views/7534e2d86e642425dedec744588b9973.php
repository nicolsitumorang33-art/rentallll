<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kami - RenMobil</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-[Poppins] bg-white">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-5 py-4 flex justify-between items-center">
            <a href="<?php echo e(url('/')); ?>" class="text-2xl font-extrabold text-red-600">RenMobil</a>
            <div class="hidden md:flex items-center gap-7">
                <a href="<?php echo e(url('/')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Beranda</a>
                <a href="<?php echo e(url('/tentang')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Tentang</a>
                <a href="<?php echo e(url('/mobil')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Mobil</a>
                <a href="<?php echo e(url('/galeri')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Galeri</a>
                <a href="<?php echo e(url('/layanan')); ?>" class="text-red-600 font-semibold relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[3px] after:bg-red-600 after:rounded">Layanan</a>
                <a href="<?php echo e(url('/syarat')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">S&K</a>
                <a href="<?php echo e(url('/kontak')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Kontak Kami</a>

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
            <a href="<?php echo e(url('/layanan')); ?>" class="block text-red-600 font-semibold">Layanan</a>
            <a href="<?php echo e(url('/syarat')); ?>" class="block text-gray-700 font-medium">S&K</a>
            <a href="<?php echo e(url('/kontak')); ?>" class="block text-gray-700 font-medium">Kontak Kami</a>

            <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="block w-full text-left bg-gray-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <!-- HERO BANNER -->
    <section class="relative h-[400px] md:h-[500px] flex items-center bg-cover bg-center" style="background-image: url('<?php echo e(asset('images/hero-bg.jpg')); ?>')">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-5 w-full">
            <div class="max-w-xl">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Layanan <span class="text-red-500">Kami</span></h1>
                <p class="text-gray-200 text-lg leading-relaxed">Kami menyediakan layanan terbaik untuk kebutuhan perjalanan Anda</p>
            </div>
        </div>
    </section>

    <!-- INTRO LAYANAN -->
    <section class="py-16 px-5">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-red-500 font-semibold text-sm tracking-widest uppercase mb-3">LAYANAN KAMI</p>
            <p class="text-gray-600 text-base leading-relaxed">Layanan kami tidak hanya menyediakan sewa mobil, tetapi juga menghadirkan sopir profesional serta paket perjalanan yang dirancang khusus untuk memenuhi kebutuhan transportasi Anda. Kami berkomitmen memberikan pengalaman terbaik dalam setiap perjalanan.</p>
        </div>
    </section>

    <!-- CARD LAYANAN -->
    <section class="pb-20 px-5">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-6">

            <!-- CARD 1: Sewa Mobil Lepas Kunci -->
            <div class="group relative rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:scale-105 transition-all duration-300">
                <div class="h-[420px] bg-cover bg-center" style="background-image: url('<?php echo e(asset('images/layanan-1.jpg')); ?>')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-red-900/90 via-red-900/50 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center px-6 text-center">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-5">
                        <i class="fas fa-key text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Sewa Mobil Lepas Kunci</h3>
                    <p class="text-gray-200 text-sm leading-relaxed mb-6 max-w-xs">Kami menyediakan layanan sewa mobil tanpa sopir dengan proses cepat dan mudah.</p>
                    <a href="<?php echo e(url('/booking')); ?>" class="bg-red-600 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-red-700 transition">Selengkapnya</a>
                </div>
            </div>

            <!-- CARD 2: Sewa Mobil Dengan Sopir -->
            <div class="group relative rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:scale-105 transition-all duration-300">
                <div class="h-[420px] bg-cover bg-center" style="background-image: url('<?php echo e(asset('images/layanan-2.jpg')); ?>')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center px-6 text-center">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-5">
                        <i class="fas fa-user-tie text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Sewa Mobil Dengan Sopir</h3>
                    <p class="text-gray-200 text-sm leading-relaxed mb-6 max-w-xs">Kami menyediakan sopir profesional untuk menemani perjalanan Anda dengan aman dan nyaman.</p>
                    <a href="<?php echo e(url('/booking')); ?>" class="bg-white/90 text-gray-800 border border-gray-300 px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-gray-100 hover:border-gray-400 transition">Selengkapnya</a>
                </div>
            </div>

            <!-- CARD 3: Sewa Mobil Bulanan & Harian -->
            <div class="group relative rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:scale-105 transition-all duration-300">
                <div class="h-[420px] bg-cover bg-center" style="background-image: url('<?php echo e(asset('images/layanan-3.jpg')); ?>')"></div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-8 px-5 text-center text-sm">
        <p>&copy; <?php echo e(date('Y')); ?> RenMobil. All rights reserved.</p>
    </footer>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/layanan.blade.php ENDPATH**/ ?>