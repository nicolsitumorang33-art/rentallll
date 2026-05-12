@extends('layouts.admin')

@section('title', 'Kelola Mobil - RennMobil')
@section('page-title', 'Kelola Mobil')
@section('page-desc', 'Daftar semua unit mobil RennMobil')

@section('content')

    @if(session('success'))
    <div style="background:#eafaee;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#166534">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <div style="display:flex;justify-content:flex-end;margin-bottom:20px">
        <a href="{{ route('admin.cars.create') }}" style="display:inline-flex;align-items:center;gap:8px;background:#e53935;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
            <i class="fas fa-plus"></i> Tambah Mobil
        </a>
    </div>

    <div class="section-card">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga/hari</th>
                        <th>Kursi</th>
                        <th>Transmisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cars as $car)
                    <tr>
                        <td>
                            <img src="{{ asset('images/' . $car->image) }}" alt="{{ $car->name }}" style="width:60px;height:45px;object-fit:cover;border-radius:8px">
                        </td>
                        <td>
                            <div style="font-weight:600;color:#333">{{ $car->name }}</div>
                            <div style="font-size:0.75rem;color:#999;max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $car->description }}</div>
                        </td>
                        <td style="font-weight:600">Rp {{ number_format($car->price, 0, ',', '.') }}</td>
                        <td>{{ $car->seats }} kursi</td>
                        <td><span style="background:#f5f5f5;padding:3px 12px;border-radius:50px;font-size:0.75rem">{{ $car->transmission }}</span></td>
                        <td>
                            <div style="display:flex;gap:8px">
                                <a href="{{ route('admin.cars.edit', $car->id) }}" style="color:#3b82f6;text-decoration:none;font-size:0.9rem;padding:5px" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.cars.delete', $car->id) }}" style="display:inline" onsubmit="return confirm('Hapus mobil {{ $car->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none;border:none;color:#ef4444;cursor:pointer;font-size:0.9rem;padding:5px" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:40px;color:#999">
                            <i class="fas fa-car" style="font-size:2rem;display:block;margin-bottom:10px;color:#ddd"></i>
                            Belum ada mobil
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
