<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('cancel_message'))
                    <div style="background:#fef3e7;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.9rem;color:#92400e">
                        <i class="fas fa-info-circle"></i> {{ session('cancel_message') }}
                    </div>
                    @endif

                    <h3 class="text-lg font-bold mb-4">Riwayat Booking Saya</h3>

                    @if($bookings->isEmpty())
                    <div style="text-align:center;padding:40px;color:#999">
                        <i class="fas fa-inbox" style="font-size:3rem;display:block;margin-bottom:12px;color:#ddd"></i>
                        <p>Belum ada booking. <a href="{{ url('/mobil') }}" style="color:#e53935;font-weight:600;text-decoration:none">Booking sekarang</a></p>
                    </div>
                    @else
                    <div style="overflow-x:auto">
                        <table style="width:100%;border-collapse:collapse;font-size:0.9rem">
                            <thead>
                                <tr style="border-bottom:2px solid #f0f0f0">
                                    <th style="text-align:left;padding:10px 14px;font-weight:600;color:#999;font-size:0.8rem;text-transform:uppercase">#</th>
                                    <th style="text-align:left;padding:10px 14px;font-weight:600;color:#999;font-size:0.8rem;text-transform:uppercase">Mobil</th>
                                    <th style="text-align:left;padding:10px 14px;font-weight:600;color:#999;font-size:0.8rem;text-transform:uppercase">Tanggal</th>
                                    <th style="text-align:left;padding:10px 14px;font-weight:600;color:#999;font-size:0.8rem;text-transform:uppercase">Total</th>
                                    <th style="text-align:left;padding:10px 14px;font-weight:600;color:#999;font-size:0.8rem;text-transform:uppercase">Status</th>
                                    <th style="text-align:left;padding:10px 14px;font-weight:600;color:#999;font-size:0.8rem;text-transform:uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr style="border-bottom:1px solid #f5f5f5">
                                    <td style="padding:12px 14px;font-weight:600">#{{ $booking->id }}</td>
                                    <td style="padding:12px 14px">{{ $booking->car->name ?? '-' }}</td>
                                    <td style="padding:12px 14px;font-size:0.85rem">
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }} - {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}
                                    </td>
                                    <td style="padding:12px 14px;font-weight:600">Rp {{ number_format($booking->total, 0, ',', '.') }}</td>
                                    <td style="padding:12px 14px">
                                        @php
                                            $statusBadge = [
                                                'pending' => 'background:#fef3e7;color:#f97316',
                                                'confirmed' => 'background:#eafaee;color:#22c55e',
                                                'rejected' => 'background:#fff0f0;color:#ef4444',
                                                'completed' => 'background:#eef3ff;color:#3b82f6',
                                                'cancelled' => 'background:#f5f5f5;color:#999',
                                            ];
                                            $statusLabel = [
                                                'pending' => 'Pending',
                                                'confirmed' => 'Dikonfirmasi',
                                                'rejected' => 'Ditolak',
                                                'completed' => 'Selesai',
                                                'cancelled' => 'Dibatalkan',
                                            ];
                                        @endphp
                                        <span style="display:inline-block;padding:3px 12px;border-radius:50px;font-size:0.75rem;font-weight:600;{{ $statusBadge[$booking->status] ?? 'background:#f5f5f5;color:#999' }}">
                                            {{ $statusLabel[$booking->status] ?? $booking->status }}
                                        </span>
                                    </td>
                                    <td style="padding:12px 14px">
                                        <a href="{{ route('booking.success', $booking->id) }}" style="color:#e53935;font-size:0.85rem;font-weight:600;text-decoration:none">
                                            Detail <i class="fas fa-arrow-right" style="font-size:0.7rem"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
