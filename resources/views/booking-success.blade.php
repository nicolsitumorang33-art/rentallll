<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil - RennMobil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
        input[type="file"]::file-selector-button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
        }
    </style>
</head>
<body class="font-[Poppins] bg-gray-50">

    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm border-t-4 border-[#8B0000]" x-data="{ open: false }">
        <div class="max-w-6xl mx-auto px-6 h-[70px] flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-red-600">RennMobil</a>
            <div class="hidden md:flex items-center gap-7">
                <a href="{{ url('/my-bookings') }}" style="color:#555;text-decoration:none;font-size:0.85rem;font-weight:500">Riwayat</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" style="background:#374151;color:#fff;border:none;padding:8px 24px;border-radius:50px;font-weight:600;font-family:'Poppins',sans-serif;font-size:0.85rem;cursor:pointer">Logout</button>
                </form>
            </div>
            <button @click="open = !open" class="md:hidden flex flex-col gap-1.5">
                <span class="w-6 h-0.5 bg-gray-800 rounded"></span>
                <span class="w-6 h-0.5 bg-gray-800 rounded"></span>
                <span class="w-6 h-0.5 bg-gray-800 rounded"></span>
            </button>
        </div>
        <div x-show="open" @click.away="open = false" x-cloak class="md:hidden bg-white border-t shadow-lg px-6 py-4 space-y-3">
            <a href="{{ url('/my-bookings') }}" style="display:block;color:#555;text-decoration:none;font-size:0.9rem;font-weight:500">Riwayat</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:#374151;color:#fff;border:none;padding:8px 24px;border-radius:50px;font-weight:600;font-family:'Poppins',sans-serif;font-size:0.85rem;cursor:pointer">Logout</button>
            </form>
        </div>
    </nav>

    <div class="pt-20 pb-20 px-6">
        <div class="w-full max-w-lg mx-auto mt-10">

            @if($booking->status === 'cancelled')
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">
                <div class="w-20 h-20 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-times text-3xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-800 mb-2">Booking Dibatalkan</h1>
                <p class="text-gray-500 text-sm mb-6">Booking #{{ $booking->id }} telah dibatalkan.</p>
                <a href="{{ url('/') }}" class="inline-block bg-gray-800 text-white px-8 py-3 rounded-xl font-bold text-sm hover:bg-gray-700 transition">Kembali ke Beranda</a>
            </div>
            @else
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">
                <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-3xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-800 mb-2">Pesanan Terkirim!</h1>
                <p class="text-gray-500 text-sm mb-6">Terima kasih, <strong>{{ $booking->customer_name }}</strong>.</p>

                <div class="bg-gray-50 rounded-xl p-5 mb-6 text-left space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Kode Booking</span>
                        <span class="font-bold text-red-600">#{{ $booking->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Mobil</span>
                        <span class="font-bold">{{ $booking->car->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Total</span>
                        <span class="font-bold text-red-600">Rp {{ number_format($booking->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Status</span>
                        <span class="font-bold text-yellow-600 uppercase">{{ $booking->status }}</span>
                    </div>
                    @if($booking->proof_image)
                    <div class="flex justify-between">
                        <span class="text-gray-500">Bukti Transfer</span>
                        <span class="font-bold text-green-600"><i class="fas fa-check-circle"></i> Terupload</span>
                    </div>
                    @endif
                </div>

                <p class="text-xs text-gray-400 mb-6">Tim kami akan memeriksa pembayaran dan menghubungi Anda.</p>

                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ url('/mobil') }}" class="bg-red-600 text-white px-6 py-3 rounded-xl font-semibold text-sm hover:bg-red-700 transition">Booking Lagi</a>
                    <a href="{{ url('/') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold text-sm hover:bg-gray-200 transition">Kembali ke Beranda</a>
                </div>

                @if($booking->status === 'pending')
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <form method="POST" action="{{ route('booking.cancel', $booking->id) }}" onsubmit="return confirm('Yakin ingin membatalkan booking ini?')">
                        @csrf
                        <button type="submit" class="text-red-500 text-sm font-semibold hover:text-red-700 transition">
                            <i class="fas fa-times-circle mr-1"></i> Batalkan Booking
                        </button>
                    </form>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>

    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        <p>&copy; {{ date('Y') }} RennMobil Indonesia.</p>
    </footer>
</body>
</html>
