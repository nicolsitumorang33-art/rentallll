<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Mobil - RenMobil</title>
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
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm border-t-4 border-[#8B0000]" x-data="{ open: false }">
        <div class="px-[5%] h-[70px] flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-red-600">RenMobil</a>
            <div class="hidden md:flex items-center gap-7">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Beranda</a>
                <a href="{{ url('/tentang') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Tentang</a>
                <a href="{{ url('/mobil') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Mobil</a>
                <a href="{{ url('/galeri') }}" class="text-gray-700 hover:text-red-600 font-medium transition">Galeri</a>
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
        <div x-show="open" @click.away="open = false" x-cloak class="md:hidden bg-white border-t shadow-lg px-[5%] py-4 space-y-3">
            <a href="{{ url('/') }}" class="block text-gray-700 font-medium">Beranda</a>
            <a href="{{ url('/tentang') }}" class="block text-gray-700 font-medium">Tentang</a>
            <a href="{{ url('/mobil') }}" class="block text-gray-700 font-medium">Mobil</a>
            <a href="{{ url('/galeri') }}" class="block text-gray-700 font-medium">Galeri</a>
            <a href="{{ url('/layanan') }}" class="block text-gray-700 font-medium">Layanan</a>
            <a href="{{ url('/syarat') }}" class="block text-gray-700 font-medium">S&K</a>
            <a href="{{ url('/kontak') }}" class="block text-gray-700 font-medium">Kontak Kami</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left bg-gray-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <!-- BOOKING FORM WITH ALPINE -->
    <div x-data="bookingForm()" class="pt-[90px] pb-16 px-[5%]">
        <div class="w-full px-[5%] max-w-7xl mx-auto">

            <!-- HEADER -->
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-2">Booking <span class="text-red-600">Mobil</span></h1>
                <p class="text-gray-500">Lengkapi data berikut untuk melakukan pemesanan</p>
            </div>

            <!-- PROGRESS STEPS -->
            <div class="flex items-center justify-center mb-12">
                <template x-for="(step, index) in steps" :key="index">
                    <div class="flex items-center">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300"
                                 :class="currentStep > index + 1 ? 'bg-green-500 text-white' : currentStep === index + 1 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">
                                <template x-if="currentStep > index + 1"><i class="fas fa-check"></i></template>
                                <template x-if="currentStep <= index + 1"><span x-text="index + 1"></span></template>
                            </div>
                            <p class="text-xs mt-2 font-medium hidden md:block"
                               :class="currentStep === index + 1 ? 'text-red-600' : 'text-gray-500'"
                               x-text="step"></p>
                        </div>
                        <div class="w-8 md:w-16 h-0.5 mx-2"
                             :class="currentStep > index + 1 ? 'bg-green-500' : 'bg-gray-200'"
                             x-show="index < 3"></div>
                    </div>
                </template>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- FORM SECTION -->
                <div class="lg:col-span-2">

                    <!-- CARD MOBIL -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
                        <div class="flex flex-col sm:flex-row gap-5">
                            <img src="{{ asset('images/car-avanza.jpg') }}" alt="Toyota Avanza" class="w-full sm:w-48 h-32 object-cover rounded-xl">
                            <div class="flex-1">
                                <h2 class="text-xl font-bold text-gray-800">Toyota Avanza</h2>
                                <div class="flex items-center gap-1 mt-1">
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    <span class="text-sm font-semibold text-gray-700">4.8</span>
                                    <span class="text-sm text-gray-400">(120 review)</span>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-3">
                                    <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded-full"><i class="fas fa-users mr-1"></i> 7 Penumpang</span>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded-full"><i class="fas fa-door-open mr-1"></i> 4 Pintu</span>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded-full"><i class="fas fa-gas-pump mr-1"></i> Irit BBM</span>
                                </div>
                                <p class="text-red-600 font-bold text-lg mt-3">Rp 350.000 <span class="text-sm font-normal text-gray-500">/ hari</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 1: DETAIL BOOKING -->
                    <div x-show="currentStep === 1" x-transition>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-6">
                            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-calendar-days text-red-600"></i> Detail Booking
                            </h3>

                            <!-- Tanggal -->
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" x-model="startDate" @change="calculateTotal()" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Selesai</label>
                                    <input type="date" x-model="endDate" @change="calculateTotal()" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                                </div>
                            </div>

                            <!-- Jam -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jam Pengambilan</label>
                                <input type="time" x-model="pickupTime" class="w-full sm:w-48 px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Penjemputan</label>
                                <div class="flex gap-3">
                                    <div class="flex-1 relative">
                                        <i class="fas fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" x-model="location" placeholder="Masukkan lokasi penjemputan" class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                                    </div>
                                    <button @click="getLocation()" class="bg-gray-100 text-gray-600 px-4 py-3 rounded-xl hover:bg-gray-200 transition flex-shrink-0" title="Gunakan lokasi saya">
                                        <i class="fas fa-crosshairs"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Data Penyewa -->
                            <div class="pt-4 border-t border-gray-100">
                                <h4 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <i class="fas fa-user text-red-600"></i> Data Penyewa
                                </h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                        <input type="text" x-model="customerName" placeholder="Sesuai KTP" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                                    </div>
                                    <div class="grid sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">No HP</label>
                                            <input type="tel" x-model="customerPhone" placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                            <input type="email" x-model="customerEmail" placeholder="email@contoh.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Opsi Tambahan -->
                            <div class="pt-4 border-t border-gray-100">
                                <h4 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <i class="fas fa-plus-circle text-red-600"></i> Opsi Tambahan
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-red-300 transition">
                                        <input type="checkbox" x-model="withDriver" @change="calculateTotal()" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-800">Dengan Supir</p>
                                            <p class="text-sm text-gray-500">Termasuk biaya supir profesional</p>
                                        </div>
                                        <span class="text-red-600 font-semibold text-sm">+Rp 100.000</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-red-300 transition">
                                        <input type="checkbox" x-model="withInsurance" @change="calculateTotal()" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-800">Asuransi</p>
                                            <p class="text-sm text-gray-500">Perlindungan all risk selama sewa</p>
                                        </div>
                                        <span class="text-red-600 font-semibold text-sm">+Rp 50.000</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: KONFIRMASI -->
                    <div x-show="currentStep === 2" x-transition>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
                            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-clipboard-check text-red-600"></i> Konfirmasi Booking
                            </h3>

                            <div class="bg-gray-50 rounded-xl p-5 space-y-3">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Mobil</span>
                                    <span class="font-semibold text-gray-800">Toyota Avanza</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Penyewa</span>
                                    <span class="font-semibold text-gray-800" x-text="customerName || '-'"></span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Tanggal</span>
                                    <span class="font-semibold text-gray-800" x-text="startDate + ' s/d ' + endDate"></span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Durasi</span>
                                    <span class="font-semibold text-gray-800" x-text="days + ' hari'"></span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Lokasi</span>
                                    <span class="font-semibold text-gray-800" x-text="location || '-'"></span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Supir</span>
                                    <span class="font-semibold" :class="withDriver ? 'text-green-600' : 'text-gray-500'" x-text="withDriver ? 'Ya' : 'Tidak'"></span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Asuransi</span>
                                    <span class="font-semibold" :class="withInsurance ? 'text-green-600' : 'text-gray-500'" x-text="withInsurance ? 'Ya' : 'Tidak'"></span>
                                </div>
                                <hr class="border-gray-200">
                                <div class="flex justify-between">
                                    <span class="font-bold text-gray-800">Total</span>
                                    <span class="text-red-600 font-bold text-lg" x-text="'Rp ' + total.toLocaleString('id-ID')"></span>
                                </div>
                            </div>

                            <!-- Metode Pembayaran -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Metode Pembayaran</label>
                                <select x-model="paymentMethod" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-100 outline-none transition bg-white">
                                    <option value="">Pilih metode pembayaran</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="ewallet">E-Wallet (GoPay/OVO/Dana)</option>
                                    <option value="cash">Bayar di Tempat (Cash)</option>
                                    <option value="cc">Kartu Kredit</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: PEMBAYARAN -->
                    <div x-show="currentStep === 3" x-transition>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center space-y-6">
                            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto">
                                <i class="fas fa-credit-card text-red-600 text-3xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Pembayaran</h3>
                            <p class="text-gray-500">Silakan transfer ke rekening berikut:</p>

                            <div class="bg-gray-50 rounded-xl p-5 text-left space-y-3">
                                <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200">
                                    <div>
                                        <p class="text-sm text-gray-500">Bank BCA</p>
                                        <p class="font-bold text-gray-800 text-lg">1234 5678 9012</p>
                                        <p class="text-sm text-gray-500">a.n PT RenMobil Indonesia</p>
                                    </div>
                                    <button @click="copyRek()" class="text-red-600 text-sm font-semibold hover:underline">Salin</button>
                                </div>
                            </div>

                            <div class="text-left">
                                <p class="text-sm font-semibold text-gray-700 mb-2">Total Pembayaran:</p>
                                <p class="text-2xl font-bold text-red-600" x-text="'Rp ' + total.toLocaleString('id-ID')"></p>
                            </div>

                            <p class="text-xs text-gray-400">Konfirmasi pembayaran melalui WhatsApp setelah transfer</p>
                        </div>
                    </div>

                    <!-- STEP 4: SELESAI -->
                    <div x-show="currentStep === 4" x-transition>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center space-y-5">
                            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                                <i class="fas fa-circle-check text-green-500 text-5xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Booking Berhasil!</h3>
                            <p class="text-gray-500 max-w-md mx-auto">Terima kasih telah melakukan pemesanan. Tim kami akan menghubungi Anda untuk konfirmasi lebih lanjut.</p>
                            <div class="bg-gray-50 rounded-xl p-4 inline-block">
                                <p class="text-sm text-gray-500">Kode Booking</p>
                                <p class="text-2xl font-bold text-red-600 tracking-wider">RM-2026-0507</p>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 justify-center pt-4">
                                <a href="{{ url('/mobil') }}" class="bg-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition">Booking Lagi</a>
                                <a href="{{ url('/') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition">Kembali ke Beranda</a>
                            </div>
                        </div>
                    </div>

                    <!-- NAVIGATION BUTTONS -->
                    <div class="flex gap-4 mt-6" x-show="currentStep <= 3">
                        <button x-show="currentStep > 1" @click="currentStep--" class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </button>
                        <button x-show="currentStep === 1" @click="goToStep(2)" :disabled="!canProceed" :class="!canProceed ? 'opacity-50 cursor-not-allowed' : ''" class="flex-1 bg-red-600 text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition">
                            Lanjut ke Konfirmasi <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        <button x-show="currentStep === 2" @click="goToStep(3)" :disabled="!paymentMethod" :class="!paymentMethod ? 'opacity-50 cursor-not-allowed' : ''" class="flex-1 bg-red-600 text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition">
                            Lanjut ke Pembayaran <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        <button x-show="currentStep === 3" @click="goToStep(4)" class="flex-1 bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition">
                            <i class="fas fa-check mr-2"></i> Sudah Bayar
                        </button>
                    </div>
                </div>

                <!-- SIDEBAR RINGKASAN -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24 space-y-4">
                        <h3 class="text-lg font-bold text-gray-800">Ringkasan Harga</h3>

                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Harga sewa (<span x-text="days"></span> hari)</span>
                                <span class="font-semibold text-gray-800" x-text="'Rp ' + rentalPrice.toLocaleString('id-ID')"></span>
                            </div>
                            <div class="flex justify-between" x-show="withDriver">
                                <span class="text-gray-500">Biaya supir</span>
                                <span class="font-semibold text-gray-800">Rp 100.000</span>
                            </div>
                            <div class="flex justify-between" x-show="withInsurance">
                                <span class="text-gray-500">Asuransi</span>
                                <span class="font-semibold text-gray-800">Rp 50.000</span>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <div class="flex justify-between items-center">
                            <span class="font-bold text-gray-800">Total</span>
                            <span class="text-red-600 font-bold text-xl" x-text="'Rp ' + total.toLocaleString('id-ID')"></span>
                        </div>

                        <div class="bg-red-50 rounded-xl p-4 text-center">
                            <p class="text-xs text-gray-500">Butuh bantuan?</p>
                            <a href="{{ url('/kontak') }}" class="text-red-600 font-semibold text-sm hover:underline">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-8 px-[5%] text-center text-sm">
        <p>&copy; {{ date('Y') }} RenMobil. All rights reserved.</p>
    </footer>

    <script>
        function bookingForm() {
            return {
                currentStep: 1,
                steps: ['Detail Booking', 'Konfirmasi', 'Pembayaran', 'Selesai'],
                startDate: '',
                endDate: '',
                pickupTime: '',
                location: '',
                customerName: '',
                customerPhone: '',
                customerEmail: '',
                withDriver: false,
                withInsurance: false,
                paymentMethod: '',
                days: 1,
                rentalPrice: 350000,
                total: 350000,

                get canProceed() {
                    return this.startDate && this.endDate && this.customerName && this.customerPhone;
                },

                calculateTotal() {
                    if (this.startDate && this.endDate) {
                        const start = new Date(this.startDate);
                        const end = new Date(this.endDate);
                        const diff = (end - start) / (1000 * 60 * 60 * 24);
                        this.days = diff > 0 ? Math.ceil(diff) : 1;
                    } else {
                        this.days = 1;
                    }
                    let total = this.rentalPrice * this.days;
                    if (this.withDriver) total += 100000;
                    if (this.withInsurance) total += 50000;
                    this.total = total;
                },

                goToStep(step) {
                    this.currentStep = step;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },

                getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(pos => {
                            this.location = `Lat: ${pos.coords.latitude.toFixed(5)}, Lng: ${pos.coords.longitude.toFixed(5)}`;
                        }, () => {
                            alert('Tidak dapat mengakses lokasi. Pastikan izin lokasi aktif.');
                        });
                    }
                },

                copyRek() {
                    navigator.clipboard.writeText('123456789012');
                    alert('Nomor rekening berhasil disalin!');
                }
            }
        }
    </script>

</body>
</html>
