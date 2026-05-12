@extends('layouts.admin')

@section('title', 'Laporan - RennMobil')
@section('page-title', 'Laporan & Statistik')
@section('page-desc', 'Overview data booking dan pendapatan')

@section('content')

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-calendar-check"></i></div>
            <div>
                <h3>{{ $totalBookings }}</h3>
                <p>Total Booking</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-money-bill-wave"></i></div>
            <div>
                <h3>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                <p>Total Pendapatan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
            <div>
                <h3>{{ $pendingBookings }}</h3>
                <p>Pending</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon red"><i class="fas fa-check-circle"></i></div>
            <div>
                <h3>{{ $confirmedBookings }}</h3>
                <p>Dikonfirmasi</p>
            </div>
        </div>
    </div>

    <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr); margin-top:-10px">
        <div class="stat-card">
            <div class="stat-icon" style="background:#eef3ff;color:#3b82f6"><i class="fas fa-flag-checkered"></i></div>
            <div>
                <h3>{{ $completedBookings }}</h3>
                <p>Selesai</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#fff0f0;color:#ef4444"><i class="fas fa-times-circle"></i></div>
            <div>
                <h3>{{ $rejectedBookings + $cancelledBookings }}</h3>
                <p>Gagal / Dibatalkan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef3e7;color:#f97316"><i class="fas fa-chart-line"></i></div>
            <div>
                <h3>{{ $totalRevenue > 0 ? number_format($totalRevenue / max($totalBookings, 1), 0, ',', '.') : 0 }}</h3>
                <p>Rata-rata per Booking</p>
            </div>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px">
        <div class="section-card">
            <h3><i class="fas fa-calendar-alt" style="color:#e53935;margin-right:8px"></i> Booking per Bulan ({{ date('Y') }})</h3>
            <div style="display:flex;align-items:flex-end;gap:6px;height:160px;padding:10px 0">
                @php
                    $maxMonth = $monthlyBookings->max('total') ?: 1;
                    $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                @endphp
                @for($m = 1; $m <= 12; $m++)
                    @php
                        $count = $monthlyBookings->firstWhere('month', $m)->total ?? 0;
                        $height = max(round(($count / $maxMonth) * 140), 5);
                    @endphp
                    <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:4px">
                        <span style="font-size:0.65rem;color:#999;font-weight:600">{{ $count }}</span>
                        <div style="width:100%;background:#e53935;border-radius:6px 6px 0 0;height:{{ $height }}px;transition:all 0.3s;opacity:0.8" title="{{ $months[$m-1] }}: {{ $count }}"></div>
                        <span style="font-size:0.6rem;color:#bbb;font-weight:500">{{ $months[$m-1] }}</span>
                    </div>
                @endfor
            </div>
        </div>

        <div class="section-card">
            <h3><i class="fas fa-trophy" style="color:#e53935;margin-right:8px"></i> Mobil Terpopuler</h3>
            @forelse($popularCars as $car)
            <div style="display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f5f5f5">
                <div style="font-weight:700;color:#999;font-size:0.85rem;width:20px">{{ $loop->iteration }}.</div>
                <div style="flex:1">
                    <div style="font-weight:600;color:#333;font-size:0.85rem">{{ $car->name }}</div>
                    <div style="font-size:0.7rem;color:#999">{{ $car->bookings_count }} booking</div>
                </div>
                <div style="background:#eafaee;color:#22c55e;padding:3px 12px;border-radius:50px;font-size:0.7rem;font-weight:600">{{ $car->bookings_count }}x</div>
            </div>
            @empty
            <p style="text-align:center;padding:30px;color:#999">Belum ada data booking</p>
            @endforelse
        </div>
    </div>

    <div class="section-card">
        <h3><i class="fas fa-history" style="color:#e53935;margin-right:8px"></i> Booking Terbaru</h3>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings as $b)
                    <tr>
                        <td><strong>#{{ $b->id }}</strong></td>
                        <td>{{ $b->customer_name }}</td>
                        <td>{{ $b->car->name ?? '-' }}</td>
                        <td>Rp {{ number_format($b->total, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $map = ['pending'=>'badge-pending','confirmed'=>'badge-confirmed','rejected'=>'badge-rejected','completed'=>'badge-completed','cancelled'=>'badge-cancelled'];
                                $label = ['pending'=>'Pending','confirmed'=>'Dikonfirmasi','rejected'=>'Ditolak','completed'=>'Selesai','cancelled'=>'Dibatalkan'];
                            @endphp
                            <span class="badge {{ $map[$b->status] ?? 'badge-pending' }}">{{ $label[$b->status] ?? $b->status }}</span>
                        </td>
                        <td style="font-size:0.8rem">{{ $b->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="6" style="text-align:center;padding:30px;color:#999">Belum ada booking</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .badge-pending { background:#fef3e7; color:#f97316; }
        .badge-confirmed { background:#eafaee; color:#22c55e; }
        .badge-rejected { background:#fff0f0; color:#ef4444; }
        .badge-completed { background:#eef3ff; color:#3b82f6; }
        .badge-cancelled { background:#f5f5f5; color:#999; }
    </style>

@endsection
