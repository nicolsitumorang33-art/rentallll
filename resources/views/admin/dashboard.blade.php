@extends('layouts.admin')

@section('title', 'Dashboard Admin - RennMobil')
@section('page-title', 'Dashboard Admin')
@section('page-desc', 'Selamat datang kembali, ' . auth()->user()->name)

@section('content')

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon red"><i class="fas fa-users"></i></div>
            <div>
                <h3>{{ $totalUsers ?? 0 }}</h3>
                <p>Total Pengguna</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-car"></i></div>
            <div>
                <h3>{{ $totalCars ?? 0 }}</h3>
                <p>Total Mobil</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-calendar-check"></i></div>
            <div>
                <h3>{{ $totalBookings ?? 0 }}</h3>
                <p>Total Booking</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
            <div>
                <h3>{{ $pendingBookings ?? 0 }}</h3>
                <p>Booking Pending</p>
            </div>
        </div>
    </div>

    <!-- RECENT USERS -->
    <div class="section-card">
        <h3><i class="fas fa-users" style="color:#e53935;margin-right:8px"></i> Pengguna Terbaru</h3>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers ?? [] as $user)
                    <tr>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'super_admin')
                                <span class="badge badge-super">Super Admin</span>
                            @elseif($user->role === 'admin')
                                <span class="badge badge-admin">Admin</span>
                            @else
                                <span class="badge badge-customer">Customer</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align:center;padding:30px;color:#999">Belum ada pengguna terdaftar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- QUICK LINKS -->
    <div class="section-card">
        <h3><i class="fas fa-bolt" style="color:#e53935;margin-right:8px"></i> Aksi Cepat</h3>
        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <a href="{{ route('admin.cars.create') }}" style="display:inline-flex;align-items:center;gap:8px;background:#e53935;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-plus"></i> Tambah Mobil
            </a>
            <a href="{{ route('admin.bookings') }}" style="display:inline-flex;align-items:center;gap:8px;background:#1a1a2e;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-search"></i> Lihat Booking
            </a>
            <a href="{{ route('admin.reports') }}" style="display:inline-flex;align-items:center;gap:8px;background:#f5f5f5;color:#333;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif;border:1px solid #e0e0e0">
                <i class="fas fa-file-export"></i> Export Laporan
            </a>
        </div>
    </div>

@endsection