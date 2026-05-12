@extends('layouts.admin')

@section('title', 'Kelola Booking - RennMobil')
@section('page-title', 'Kelola Booking')
@section('page-desc', 'Daftar semua pemesanan mobil')

@section('content')

    @if(session('success'))
    <div style="background:#eafaee;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#166534">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <div class="section-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid #f0f0f0">
            <h3 style="margin:0;padding:0;border:none"><i class="fas fa-calendar-check" style="color:#e53935;margin-right:8px"></i> Semua Booking</h3>
            <span style="font-size:0.75rem;color:#999;background:#f5f5f5;padding:4px 14px;border-radius:50px">{{ $bookings->count() }} total</span>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Tanggal Sewa</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td><strong>#{{ $booking->id }}</strong></td>
                        <td>
                            <div style="font-weight:600;color:#333">{{ $booking->customer_name }}</div>
                            <div style="font-size:0.75rem;color:#999">{{ $booking->customer_email }}</div>
                        </td>
                        <td>{{ $booking->car->name ?? '-' }}</td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</div>
                            <div style="font-size:0.75rem;color:#999">s/d {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</div>
                        </td>
                        <td>Rp {{ number_format($booking->total, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $statusClasses = [
                                    'pending' => 'badge badge-pending',
                                    'confirmed' => 'badge badge-confirmed',
                                    'rejected' => 'badge badge-rejected',
                                    'completed' => 'badge badge-completed',
                                    'cancelled' => 'badge badge-cancelled',
                                ];
                                $statusLabels = [
                                    'pending' => 'Pending',
                                    'confirmed' => 'Dikonfirmasi',
                                    'rejected' => 'Ditolak',
                                    'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan',
                                ];
                            @endphp
                            <span class="{{ $statusClasses[$booking->status] ?? 'badge' }}">{{ $statusLabels[$booking->status] ?? $booking->status }}</span>
                        </td>
                        <td>
                            @if($booking->status === 'pending')
                            <div style="display:flex;gap:6px">
                                <form method="POST" action="{{ route('admin.booking.approve', $booking->id) }}" style="display:inline">
                                    @csrf
                                    <button type="submit" style="background:#22c55e;color:#fff;border:none;padding:6px 14px;border-radius:8px;font-size:0.75rem;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif" onclick="return confirm('Konfirmasi booking #{{ $booking->id }}?')">
                                        <i class="fas fa-check"></i> Setuju
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.booking.reject', $booking->id) }}" style="display:inline">
                                    @csrf
                                    <button type="submit" style="background:#ef4444;color:#fff;border:none;padding:6px 14px;border-radius:8px;font-size:0.75rem;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif" onclick="return confirm('Tolak booking #{{ $booking->id }}?')">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </form>
                            </div>
                            @elseif($booking->status === 'confirmed')
                            <form method="POST" action="{{ route('admin.booking.complete', $booking->id) }}" style="display:inline">
                                @csrf
                                <button type="submit" style="background:#3b82f6;color:#fff;border:none;padding:6px 14px;border-radius:8px;font-size:0.75rem;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif" onclick="return confirm('Tandai selesai booking #{{ $booking->id }}?')">
                                    <i class="fas fa-flag-checkered"></i> Selesai
                                </button>
                            </form>
                            @else
                            <span style="color:#999;font-size:0.75rem">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align:center;padding:40px;color:#999">
                            <i class="fas fa-inbox" style="font-size:2rem;display:block;margin-bottom:10px;color:#ddd"></i>
                            Belum ada booking
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .badge-pending { background: #fef3e7; color: #f97316; }
        .badge-confirmed { background: #eafaee; color: #22c55e; }
        .badge-rejected { background: #fff0f0; color: #ef4444; }
        .badge-completed { background: #eef3ff; color: #3b82f6; }
        .badge-cancelled { background: #f5f5f5; color: #999; }
    </style>

@endsection
