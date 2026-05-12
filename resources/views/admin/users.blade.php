@extends('layouts.admin')

@section('title', 'Kelola Pengguna - RennMobil')
@section('page-title', 'Kelola Pengguna')
@section('page-desc', 'Daftar semua pengguna RennMobil')

@section('content')

    @if(session('success'))
    <div style="background:#eafaee;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#166534">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div style="background:#fff0f0;border:1px solid #fecaca;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#dc2626">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
    </div>
    @endif

    <div class="section-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid #f0f0f0">
            <h3 style="margin:0;padding:0;border:none"><i class="fas fa-users" style="color:#e53935;margin-right:8px"></i> Semua Pengguna</h3>
            <span style="font-size:0.75rem;color:#999;background:#f5f5f5;padding:4px 14px;border-radius:50px">{{ $users->count() }} total</span>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:34px;height:34px;border-radius:50%;background:#e53935;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.8rem;flex-shrink:0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div style="font-weight:600;color:#333">{{ $user->name }}</div>
                                    <div style="font-size:0.7rem;color:#999">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
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
                        <td>
                            <div style="display:flex;gap:6px;align-items:center">
                                @if(auth()->user()->isSuperAdmin() && $user->role !== 'super_admin')
                                <form method="POST" action="{{ route('admin.user.role', $user->id) }}" style="display:inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" onchange="this.form.submit()" style="padding:5px 8px;border-radius:8px;border:1px solid #e0e0e0;font-size:0.75rem;font-family:'Poppins',sans-serif;background:#fff;cursor:pointer">
                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                </form>
                                @endif
                                @if($user->id !== auth()->id() && !$user->isSuperAdmin())
                                <form method="POST" action="{{ route('admin.user.delete', $user->id) }}" style="display:inline" onsubmit="return confirm('Hapus pengguna {{ $user->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none;border:none;color:#ef4444;cursor:pointer;font-size:0.9rem;padding:5px" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:40px;color:#999">Belum ada pengguna</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
