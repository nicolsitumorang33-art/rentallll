<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Mobil - RenMobil</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-[Poppins] bg-gray-50">

    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm border-t-4 border-[#8B0000]" x-data="{ open: false }">
        <div class="max-w-6xl mx-auto px-6 h-[70px] flex justify-between items-center">
            <a href="<?php echo e(url('/')); ?>" class="text-2xl font-extrabold text-red-600">RenMobil</a>
            <div class="hidden md:flex items-center gap-7">
                <a href="<?php echo e(url('/')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Beranda</a>
                <a href="<?php echo e(url('/mobil')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Mobil</a>
                <a href="<?php echo e(url('/kontak')); ?>" class="text-gray-700 hover:text-red-600 font-medium transition">Kontak</a>

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
        <div x-show="open" @click.away="open = false" x-cloak class="md:hidden bg-white border-t shadow-lg px-6 py-4 space-y-3">
            <a href="<?php echo e(url('/')); ?>" class="block text-gray-700 font-medium">Beranda</a>
            <a href="<?php echo e(url('/mobil')); ?>" class="block text-gray-700 font-medium">Mobil</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="block w-full text-left bg-gray-700 text-white px-4 py-2 rounded-full font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <div x-data="bookingForm()" class="pt-20 pb-20 px-6">
        
        <div class="w-full max-w-3xl mx-auto">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Booking <span class="text-red-600">Mobil</span></h1>
                <p class="text-gray-500 text-sm">Lengkapi data berikut untuk melakukan pemesanan</p>
            </div>

            <div class="flex items-center justify-center mb-12">
                <template x-for="(step, index) in steps" :key="index">
                    <div class="flex items-center">
                        <div class="flex flex-col items-center">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300"
                                 :class="currentStep > index + 1 ? 'bg-green-500 text-white' : currentStep === index + 1 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">
                                <template x-if="currentStep > index + 1"><i class="fas fa-check text-xs"></i></template>
                                <template x-if="currentStep <= index + 1"><span x-text="index + 1"></span></template>
                            </div>
                        </div>
                        <div class="w-12 md:w-16 h-0.5 mx-2"
                             :class="currentStep > index + 1 ? 'bg-green-500' : 'bg-gray-200'"
                             x-show="index < 3"></div>
                    </div>
                </template>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-full max-w-[300px] h-40 flex items-center justify-center mb-4">
                            <img src="<?php echo e(asset('images/car-avanza.jpg')); ?>" alt="Toyota Avanza" class="max-h-full max-w-full object-contain">
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Toyota Avanza</h2>
                        <div class="flex items-center gap-1 mt-1 text-sm justify-center">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="font-semibold text-gray-700">4.8</span>
                            <span class="text-gray-400">(120 review)</span>
                        </div>
                        <div class="mt-4 flex gap-3 justify-center">
                            <span class="text-xs bg-gray-50 text-gray-600 px-3 py-1.5 rounded-full border border-gray-100"><i class="fas fa-users mr-1"></i> 7 Penumpang</span>
                            <span class="text-xs bg-gray-50 text-gray-600 px-3 py-1.5 rounded-full border border-gray-100"><i class="fas fa-gas-pump mr-1"></i> Irit BBM</span>
                        </div>
                        <p class="text-red-600 font-bold text-xl mt-4">Rp 350.000 <span class="text-sm font-normal text-gray-500">/ hari</span></p>
                    </div>
                </div>

                <div x-show="currentStep === 1" x-transition>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-6">
                        <h3 class="text-md font-bold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-red-600"></i> Detail Pemesanan
                        </h3>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Tanggal Mulai</label>
                                <input type="date" x-model="startDate" @change="calculateTotal()" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none text-sm transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Tanggal Selesai</label>
                                <input type="date" x-model="endDate" @change="calculateTotal()" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none text-sm transition">
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-50">
                            <h4 class="text-md font-bold text-gray-800 mb-4 flex items-center gap-2">
                                <i class="fas fa-user text-red-600"></i> Data Penyewa
                            </h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nama Lengkap</label>
                                    <input type="text" x-model="customerName" placeholder="Sesuai KTP" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none text-sm transition">
                                </div>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">No HP</label>
                                        <input type="tel" x-model="customerPhone" placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none text-sm transition">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Email</label>
                                        <input type="email" x-model="customerEmail" placeholder="email@contoh.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none text-sm transition">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-50">
                            <h4 class="text-md font-bold text-gray-800 mb-4">Opsi Tambahan</h4>
                            <div class="grid gap-3">
                                <label class="flex items-center gap-3 p-4 border border-gray-100 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                                    <input type="checkbox" x-model="withDriver" @change="calculateTotal()" class="w-5 h-5 text-red-600 rounded">
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-800 text-sm">Dengan Supir</p>
                                        <p class="text-xs text-gray-500">Supir profesional</p>
                                    </div>
                                    <span class="text-red-600 font-bold text-xs">+Rp 100k</span>
                                </label>
                                <label class="flex items-center gap-3 p-4 border border-gray-100 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                                    <input type="checkbox" x-model="withInsurance" @change="calculateTotal()" class="w-5 h-5 text-red-600 rounded">
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-800 text-sm">Asuransi</p>
                                        <p class="text-xs text-gray-500">Perlindungan All Risk</p>
                                    </div>
                                    <span class="text-red-600 font-bold text-xs">+Rp 50k</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="currentStep === 2" x-transition>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
                        <h3 class="text-md font-bold text-gray-800">Konfirmasi Detail</h3>
                        <div class="bg-gray-50 rounded-xl p-5 space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Penyewa</span>
                                <span class="font-bold" x-text="customerName"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Durasi</span>
                                <span class="font-bold" x-text="days + ' hari'"></span>
                            </div>
                            <div class="flex justify-between border-t border-gray-200 pt-3">
                                <span class="font-bold text-gray-800">Total Pembayaran</span>
                                <span class="text-red-600 font-bold text-lg" x-text="'Rp ' + total.toLocaleString('id-ID')"></span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Metode Pembayaran</label>
                            <select x-model="paymentMethod" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none text-sm bg-white transition">
                                <option value="">Pilih Metode</option>
                                <option value="transfer">Transfer Bank</option>
                                <option value="cash">Bayar di Tempat</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div x-show="currentStep === 3" x-transition>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                        <i class="fas fa-university text-red-600 text-4xl mb-4"></i>
                        <h3 class="font-bold text-gray-800 mb-2">Transfer Pembayaran</h3>
                        <div class="bg-gray-50 rounded-xl p-4 my-4">
                            <p class="text-xs text-gray-500 uppercase">Bank BCA</p>
                            <p class="text-xl font-extrabold text-gray-800 tracking-wider">1234 5678 9012</p>
                        </div>
                        <p class="text-sm text-gray-500">Total: <span class="text-red-600 font-bold" x-text="'Rp ' + total.toLocaleString('id-ID')"></span></p>
                    </div>
                </div>

                <div x-show="currentStep === 4" x-transition>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">
                        <div class="w-16 h-16 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-check text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Pesanan Terkirim!</h3>
                        <p class="text-sm text-gray-500 mb-6">Kode Booking Anda: <span class="font-bold text-red-600">RM-202605</span></p>
                        <a href="<?php echo e(url('/')); ?>" class="inline-block bg-gray-800 text-white px-8 py-3 rounded-xl font-bold text-sm">Kembali Ke Beranda</a>
                    </div>
                </div>

                <div class="flex gap-4 mt-6" x-show="currentStep <= 3">
                    <button x-show="currentStep > 1" @click="currentStep--" class="flex-1 bg-white text-gray-700 py-4 rounded-xl font-bold text-sm border border-gray-200 hover:bg-gray-50 transition">
                         Kembali
                    </button>
                    <button x-show="currentStep === 1" @click="goToStep(2)" :disabled="!canProceed" :class="!canProceed ? 'opacity-50' : ''" class="flex-1 bg-red-600 text-white py-4 rounded-xl font-bold text-sm hover:bg-red-700 transition">
                        Lanjut ke Konfirmasi
                    </button>
                    <button x-show="currentStep === 2" @click="goToStep(3)" :disabled="!paymentMethod" :class="!paymentMethod ? 'opacity-50' : ''" class="flex-1 bg-red-600 text-white py-4 rounded-xl font-bold text-sm hover:bg-red-700 transition">
                        Konfirmasi & Bayar
                    </button>
                    <button x-show="currentStep === 3" @click="goToStep(4)" class="flex-1 bg-green-600 text-white py-4 rounded-xl font-bold text-sm hover:bg-green-700 transition">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        <p>&copy; <?php echo e(date('Y')); ?> RenMobil Indonesia.</p>
    </footer>

    <script>
        function bookingForm() {
            return {
                currentStep: 1,
                steps: ['Data', 'Cek', 'Bayar', 'Done'],
                startDate: '',
                endDate: '',
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
                    let totalVal = this.rentalPrice * this.days;
                    if (this.withDriver) totalVal += 100000;
                    if (this.withInsurance) totalVal += 50000;
                    this.total = totalVal;
                },

                goToStep(step) {
                    this.currentStep = step;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            }
        }
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/booking.blade.php ENDPATH**/ ?>