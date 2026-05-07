<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - RenMobil</title>
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
                <a href="{{ url('/galeri') }}" class="text-red-600 font-semibold relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[3px] after:bg-red-600 after:rounded">Galeri</a>
                <a href="{{ url('/layanan') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Layanan</a>
                <a href="{{ url('/syarat') }}" class="text-gray-700 hover:text-red-600 font-medium transition">S&K</a>
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
            <a href="{{ url('/galeri') }}" class="block text-red-600 font-semibold">Galeri</a>
            <a href="{{ url('/layanan') }}" class="block text-gray-700 font-medium">Layanan</a>
            <a href="{{ url('/syarat') }}" class="block text-gray-700 font-medium">S&K</a>
            <a href="{{ url('/kontak') }}" class="block text-gray-700 font-medium">Kontak Kami</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left bg-gray-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <!-- HERO -->
    <section class="relative py-28 px-5 bg-gradient-to-br from-gray-900 to-blue-900 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3">Galeri <span class="text-red-500">Perjalanan</span></h1>
        <p class="text-gray-300 text-lg max-w-xl mx-auto">Momen-momen perjalanan bersama pelanggan kami</p>
    </section>

    <!-- GALERI GRID -->
    <section class="py-16 px-5">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-1.jpg') }}" alt="Trip 1" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-2.jpg') }}" alt="Trip 2" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-3.jpg') }}" alt="Trip 3" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-4.jpg') }}" alt="Trip 4" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-5.jpg') }}" alt="Trip 5" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-6.jpg') }}" alt="Trip 6" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-7.jpg') }}" alt="Trip 7" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-8.jpg') }}" alt="Trip 8" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-9.jpg') }}" alt="Trip 9" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-10.jpg') }}" alt="Trip 10" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-11.jpg') }}" alt="Trip 11" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
                <div class="rounded-2xl overflow-hidden group relative aspect-[4/3]">
                    <img src="{{ asset('images/gallery-12.jpg') }}" alt="Trip 12" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-all duration-300"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-8 px-5 text-center text-sm">
        <p>&copy; {{ date('Y') }} RenMobil. All rights reserved.</p>
    </footer>

</body>
</html>
