<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking - RennMobil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:#f5f5f5; }
        .navbar {
            position:fixed; top:0; left:0; right:0; z-index:1000;
            background:#fff; box-shadow:0 2px 10px rgba(0,0,0,0.08);
            padding:15px 5%; display:flex; justify-content:space-between; align-items:center;
        }
        .navbar-logo { font-size:1.5rem; font-weight:800; color:#e53935; text-decoration:none; }
        .navbar-links { display:flex; align-items:center; gap:24px; list-style:none; }
        .navbar-links a { color:#555; text-decoration:none; font-size:0.85rem; font-weight:500; transition:color 0.3s; }
        .navbar-links a:hover, .navbar-links a.active { color:#e53935; }
        .container { max-width:1000px; margin:100px auto 60px; padding:0 20px; }
        .page-title { font-size:1.8rem; font-weight:800; color:#1a1a2e; margin-bottom:6px; }
        .page-desc { color:#999; font-size:0.9rem; margin-bottom:30px; }
        .card { background:#fff; border-radius:16px; box-shadow:0 2px 12px rgba(0,0,0,0.04); overflow:hidden; }
        table { width:100%; border-collapse:collapse; font-size:0.85rem; }
        th { text-align:left; padding:14px 18px; font-weight:600; color:#999; font-size:0.75rem; text-transform:uppercase; letter-spacing:0.5px; border-bottom:2px solid #f0f0f0; background:#fafafa; }
        td { padding:14px 18px; border-bottom:1px solid #f5f5f5; color:#555; }
        tr:hover td { background:#fafafa; }
        .badge { display:inline-block; padding:4px 14px; border-radius:50px; font-size:0.7rem; font-weight:600; }
        .badge-pending { background:#fef3e7; color:#f97316; }
        .badge-confirmed { background:#eafaee; color:#22c55e; }
        .badge-rejected { background:#fff0f0; color:#ef4444; }
        .badge-completed { background:#eef3ff; color:#3b82f6; }
        .badge-cancelled { background:#f5f5f5; color:#999; }
        .btn-detail { display:inline-flex; align-items:center; gap:6px; color:#e53935; font-weight:600; font-size:0.8rem; text-decoration:none; }
        .btn-detail:hover { text-decoration:underline; }
        .empty { text-align:center; padding:60px 20px; color:#999; }
        .empty i { font-size:3rem; color:#ddd; display:block; margin-bottom:12px; }
        .empty a { color:#e53935; font-weight:600; text-decoration:none; }
        .empty a:hover { text-decoration:underline; }
        .alert { background:#fef3e7; border:1px solid #fde68a; border-radius:12px; padding:14px 18px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:0.85rem; color:#92400e; }
        footer { text-align:center; padding:30px; color:#bbb; font-size:0.75rem; }
        @media(max-width:768px) {
            .navbar-links { gap:12px; }
            .navbar-links a { font-size:0.75rem; }
            th, td { padding:10px 12px; font-size:0.75rem; }
            .container { margin-top:80px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-logo">RennMobil</a>
        <ul class="navbar-links">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/tentang') }}">Tentang</a></li>
            <li><a href="{{ url('/mobil') }}">Mobil</a></li>
            <li><a href="{{ url('/layanan') }}">Layanan</a></li>
            <li><a href="{{ url('/kontak') }}">Kontak</a></li>
            <li><a href="{{ url('/my-bookings') }}" class="active">Riwayat</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" style="background:#374151;color:#fff;border:none;padding:8px 20px;border-radius:50px;font-weight:600;font-family:'Poppins',sans-serif;font-size:0.8rem;cursor:pointer">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="page-title">Riwayat <span style="color:#e53935">Booking</span></h1>
        <p class="page-desc">Lihat status pemesanan mobil Anda</p>

        @if(session('cancel_message'))
        <div class="alert"><i class="fas fa-info-circle"></i> {{ session('cancel_message') }}</div>
        @endif

        <div class="card">
            @if($bookings->isEmpty())
            <div class="empty">
                <i class="fas fa-inbox"></i>
                <p style="margin-bottom:8px">Belum ada booking</p>
                <a href="{{ url('/mobil') }}">Booking Sekarang <i class="fas fa-arrow-right" style="font-size:0.7rem"></i></a>
            </div>
            @else
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mobil</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $b)
                    <tr>
                        <td><strong>#{{ $b->id }}</strong></td>
                        <td>
                            <div style="font-weight:600;color:#333">{{ $b->car->name ?? '-' }}</div>
                            <div style="font-size:0.7rem;color:#999">{{ $b->car->transmission ?? '' }} &middot; {{ $b->car->seats ?? '' }} kursi</div>
                        </td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($b->start_date)->format('d M Y') }}</div>
                            <div style="font-size:0.7rem;color:#999">sd {{ \Carbon\Carbon::parse($b->end_date)->format('d M Y') }}</div>
                        </td>
                        <td style="font-weight:600">Rp {{ number_format($b->total, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $map = [
                                    'pending' => ['badge-pending', 'Pending'],
                                    'confirmed' => ['badge-confirmed', 'Dikonfirmasi'],
                                    'rejected' => ['badge-rejected', 'Ditolak'],
                                    'completed' => ['badge-completed', 'Selesai'],
                                    'cancelled' => ['badge-cancelled', 'Dibatalkan'],
                                ];
                            @endphp
                            <span class="badge {{ $map[$b->status][0] ?? 'badge-pending' }}">{{ $map[$b->status][1] ?? $b->status }}</span>
                        </td>
                        <td><a href="{{ route('booking.success', $b->id) }}" class="btn-detail">Detail <i class="fas fa-chevron-right" style="font-size:0.6rem"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <footer>&copy; {{ date('Y') }} RennMobil Indonesia.</footer>
</body>
</html>
