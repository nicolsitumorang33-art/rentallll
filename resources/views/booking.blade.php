<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Mobil - RennMobil</title>
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
        input[type="file"]::file-selector-button:hover {
            background: #b91c1c;
        }
    </style>
</head>
<body class="font-[Poppins] bg-gray-50" x-data="bookingForm()">

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

    <div class="pb-20 px-6" style="padding-top: 30px;">
        <div class="w-full max-w-xl mx-auto px-4">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Booking <span class="text-red-600">Mobil</span></h1>
                <p class="text-gray-500 text-sm">Lengkapi data berikut untuk melakukan pemesanan</p>
            </div>

            <div class="flex items-center justify-center gap-4 mb-12 flex-wrap">
                <template x-for="(step, index) in steps" :key="index">
                    <div class="flex items-center">
                        <div class="flex flex-col items-center">
                            <div class="w-11 h-11 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 shadow-sm"
                                 :class="currentStep > index + 1 ? 'bg-green-500 text-white' : currentStep === index + 1 ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-500'">
                                <template x-if="currentStep > index + 1"><i class="fas fa-check text-xs"></i></template>
                                <template x-if="currentStep <= index + 1"><span x-text="index + 1"></span></template>
                            </div>
                        </div>
                        <div class="w-10 md:w-14 h-0.5"
                             :class="currentStep > index + 1 ? 'bg-green-500' : 'bg-gray-200'"
                             x-show="index < 3"></div>
                    </div>
                </template>
            </div>

            @if($bookingSuccess)
            <!-- STEP 4: Selesai (via query parameter) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-green-500 text-4xl"></i>
                </div>
                <h3 class="text-2xl font-extrabold text-gray-800 mb-2">Pesanan Terkirim!</h3>
                <p class="text-sm text-gray-500 mb-4">Terima kasih. Pesanan Anda sedang kami proses.</p>
                <div class="bg-gray-50 rounded-xl p-5 mb-6 text-left space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Kode Booking</span>
                        <span class="font-bold text-red-600">#{{ $bookingSuccess->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Mobil</span>
                        <span class="font-bold">{{ $bookingSuccess->car->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Total</span>
                        <span class="text-red-600 font-bold">Rp {{ number_format($bookingSuccess->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Status</span>
                        <span class="font-bold text-yellow-600 uppercase">{{ $bookingSuccess->status }}</span>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mb-6">Tim kami akan memeriksa pembayaran dan menghubungi Anda.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ url('/mobil') }}" class="bg-red-600 text-white px-6 py-3 rounded-xl font-semibold text-sm hover:bg-red-700 transition">Booking Lagi</a>
                    <a href="{{ url('/') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold text-sm hover:bg-gray-200 transition">Kembali ke Beranda</a>
                </div>
                @if($bookingSuccess->status === 'pending')
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <form method="POST" action="{{ route('booking.cancel', $bookingSuccess->id) }}" onsubmit="return confirm('Yakin ingin membatalkan booking ini?')">
                        @csrf
                        <button type="submit" class="text-red-500 text-sm font-semibold hover:text-red-700 transition">
                            <i class="fas fa-times-circle mr-1"></i> Batalkan Booking
                        </button>
                    </form>
                </div>
                @endif
            </div>
            @else
            <form method="POST" action="{{ route('booking.store') }}" id="bookingForm" enctype="multipart/form-data" @submit.prevent="submitBooking()">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <input type="hidden" name="customer_name">
                <input type="hidden" name="customer_phone">
                <input type="hidden" name="customer_email">
                <input type="hidden" name="start_date">
                <input type="hidden" name="end_date">
                <input type="hidden" name="with_driver">
                <input type="hidden" name="with_insurance">
                <input type="hidden" name="total">

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-full max-w-[300px] h-40 flex items-center justify-center mb-4">
                            <img src="{{ asset('images/' . $car->image) }}" alt="{{ $car->name }}" class="max-h-full max-w-full object-contain">
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $car->name }}</h2>
                        <div class="flex items-center gap-1 mt-1 text-sm justify-center">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="font-semibold text-gray-700">4.8</span>
                            <span class="text-gray-400">(120 review)</span>
                        </div>
                        <div class="mt-4 flex gap-3 justify-center">
                            <span class="text-xs bg-gray-50 text-gray-600 px-3 py-1.5 rounded-full border border-gray-100"><i class="fas fa-users mr-1"></i> {{ $car->seats }} Penumpang</span>
                            <span class="text-xs bg-gray-50 text-gray-600 px-3 py-1.5 rounded-full border border-gray-100"><i class="fas fa-gas-pump mr-1"></i> {{ $car->transmission }}</span>
                        </div>
                        <p class="text-red-600 font-bold text-xl mt-4">Rp {{ number_format($car->price, 0, ',', '.') }} <span class="text-sm font-normal text-gray-500">/ hari</span></p>
                    </div>
                </div>

                <!-- STEP 1: Detail Pemesanan -->
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

                <!-- STEP 2: Detail Penyewaan (Konfirmasi) -->
                <div x-show="currentStep === 2" x-transition>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
                        <h3 class="text-md font-bold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-clipboard-list text-red-600"></i> Detail Penyewaan
                        </h3>
                        <div class="bg-gray-50 rounded-xl p-5 space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Mobil</span>
                                <span class="font-bold">{{ $car->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Penyewa</span>
                                <span class="font-bold" x-text="customerName || '-'"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">No. HP</span>
                                <span class="font-bold" x-text="customerPhone || '-'"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Tanggal Sewa</span>
                                <span class="font-bold" x-text="startDate + ' s/d ' + endDate"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Durasi</span>
                                <span class="font-bold" x-text="days + ' hari'"></span>
                            </div>
                            <div class="flex justify-between" x-show="withDriver">
                                <span class="text-gray-500">Supir</span>
                                <span class="font-bold text-green-600">Ya (+Rp 100k)</span>
                            </div>
                            <div class="flex justify-between" x-show="withInsurance">
                                <span class="text-gray-500">Asuransi</span>
                                <span class="font-bold text-green-600">Ya (+Rp 50k)</span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="font-bold text-gray-800">Total Pembayaran</span>
                                <span class="text-red-600 font-bold text-lg" x-text="'Rp ' + total.toLocaleString('id-ID')"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Pembayaran -->
                <div x-show="currentStep === 3" x-transition>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-6">
                        <h3 class="text-md font-bold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-university text-red-600"></i> Pembayaran Transfer
                        </h3>
                        <p class="text-sm text-gray-500">Silakan transfer ke salah satu rekening <strong>a.n RennMobil Indonesia</strong>:</p>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase font-semibold">Bank BCA</p>
                                    <p class="font-extrabold text-gray-800 text-lg tracking-wider">1234 5678 9012</p>
                                </div>
                                <button type="button" @click="copyRek('1234 5678 9012')" class="text-red-600 text-xs font-bold border border-red-200 px-4 py-2 rounded-lg hover:bg-red-50 transition">Salin</button>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase font-semibold">Bank Mandiri</p>
                                    <p class="font-extrabold text-gray-800 text-lg tracking-wider">1234 9876 5432</p>
                                </div>
                                <button type="button" @click="copyRek('1234 9876 5432')" class="text-red-600 text-xs font-bold border border-red-200 px-4 py-2 rounded-lg hover:bg-red-50 transition">Salin</button>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase font-semibold">Bank BRI</p>
                                    <p class="font-extrabold text-gray-800 text-lg tracking-wider">5678 1234 5678</p>
                                </div>
                                <button type="button" @click="copyRek('5678 1234 5678')" class="text-red-600 text-xs font-bold border border-red-200 px-4 py-2 rounded-lg hover:bg-red-50 transition">Salin</button>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <i class="fas fa-upload text-red-600 mr-1"></i> Upload Bukti Transfer
                            </label>
                            <input type="file" name="proof_image" accept="image/*" @change="fileSelected = $event.target.files[0]; proofFileName = $event.target.files[0] ? $event.target.files[0].name : ''" class="w-full text-sm text-gray-600 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-red-600 file:text-white hover:file:bg-red-700 file:cursor-pointer cursor-pointer border border-gray-200 rounded-xl p-2">
                            <p x-show="proofFileName" class="text-xs text-green-600 mt-2" x-text="'Terpilih: ' + proofFileName"></p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 text-center">
                            <p class="text-sm text-gray-500">Total yang harus dibayar:</p>
                            <p class="text-2xl font-extrabold text-red-600" x-text="'Rp ' + total.toLocaleString('id-ID')"></p>
                        </div>
                    </div>
                </div>

                <!-- NAVIGATION BUTTONS -->
                <div class="flex gap-4 mt-6" x-show="currentStep <= 3">
                    <button type="button" x-show="currentStep > 1" @click="currentStep--" class="flex-1 bg-white text-gray-700 py-4 rounded-xl font-bold text-sm border border-gray-200 hover:bg-gray-50 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </button>
                    <button type="button" x-show="currentStep === 1" @click="goToStep(2)" :disabled="!canProceed" :class="!canProceed ? 'opacity-50 cursor-not-allowed' : 'hover:bg-red-700'" class="flex-1 bg-red-600 text-white py-4 rounded-xl font-bold text-sm transition">
                        Lanjut ke Konfirmasi <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <button type="button" x-show="currentStep === 2" @click="goToStep(3)" class="flex-1 bg-red-600 text-white py-4 rounded-xl font-bold text-sm hover:bg-red-700 transition">
                        Lanjut ke Pembayaran <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                <!-- SUBMIT BUTTON (STEP 3) -->
                <div x-show="currentStep === 3" class="mt-6">
                    <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-xl font-bold text-base hover:bg-green-700 transition shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i> Kirim & Konfirmasi Pembayaran
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-2">Pastikan semua data sudah benar sebelum mengirim</p>
                </div>

                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                        <ul class="text-sm text-red-600 space-y-1">
                            @foreach($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            </form>
            @endif
        </div>
    </div>

    <footer class="bg-white border-t border-gray-100 py-8 text-center text-xs text-gray-400">
        <p>&copy; {{ date('Y') }} RennMobil Indonesia.</p>
    </footer>

    <script>
        function bookingForm() {
            return {
                currentStep: 1,
                steps: ['Data', 'Cek', 'Bayar', 'Selesai'],
                startDate: '',
                endDate: '',
                customerName: '',
                customerPhone: '',
                customerEmail: '',
                withDriver: false,
                withInsurance: false,
                days: 1,
                rentalPrice: {{ $car->price }},
                total: {{ $car->price }},
                fileSelected: null,
                proofFileName: '',

                get canProceed() {
                    return this.startDate && this.endDate && this.customerName && this.customerPhone;
                },

                get proofFileSelected() {
                    return this.fileSelected !== null;
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
                },

                submitBooking() {
                    const f = document.getElementById('bookingForm');
                    f.querySelector('[name="customer_name"]').value = this.customerName;
                    f.querySelector('[name="customer_phone"]').value = this.customerPhone;
                    f.querySelector('[name="customer_email"]').value = this.customerEmail;
                    f.querySelector('[name="start_date"]').value = this.startDate;
                    f.querySelector('[name="end_date"]').value = this.endDate;
                    f.querySelector('[name="with_driver"]').value = this.withDriver ? '1' : '0';
                    f.querySelector('[name="with_insurance"]').value = this.withInsurance ? '1' : '0';
                    f.querySelector('[name="total"]').value = this.total;
                    f.submit();
                },

                copyRek(no) {
                    navigator.clipboard.writeText(no).then(() => {
                        alert('Nomor rekening berhasil disalin!');
                    });
                }
            }
        }
    </script>
</body>
</html>
