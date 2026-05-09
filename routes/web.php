<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/layanan', function () {
        return view('layanan');
    });

    Route::get('/tentang', function () {
        return view('about');
    });

    Route::get('/mobil', function () {
        return view('cars');
    });

    Route::get('/galeri', function () {
        return view('galeri');
    });

    Route::get('/kontak', function () {
        return view('kontak');
    });

    Route::get('/syarat', function () {
        return view('syarat');
    });

    Route::get('/booking', function () {
        return view('booking');
    });

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.super');
        }
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        $user = auth()->user();
        $totalUsers = \App\Models\User::count();
        $totalCars = 0; // placeholder until Car model exists
        $totalBookings = 0; // placeholder until Booking model exists
        $pendingBookings = 0;
        $recentUsers = \App\Models\User::latest()->take(5)->get();
        return view('admin.dashboard', compact('totalUsers', 'totalCars', 'totalBookings', 'pendingBookings', 'recentUsers'));
    })->middleware('role:admin|super_admin')->name('admin.dashboard');

    Route::get('/admin/super', function () {
        $totalUsers = \App\Models\User::count();
        $totalAdmins = \App\Models\User::whereIn('role', ['admin', 'super_admin'])->count();
        $totalCars = 0;
        $totalBookings = 0;
        $allUsers = \App\Models\User::latest()->get();
        $adminUsers = \App\Models\User::whereIn('role', ['admin', 'super_admin'])->latest()->get();
        return view('admin.super-dashboard', compact('totalUsers', 'totalAdmins', 'totalCars', 'totalBookings', 'allUsers', 'adminUsers'));
    })->middleware('role:super_admin')->name('admin.super');
});
