<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
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

    Route::get('/mobil', [CarController::class, 'index']);

    Route::get('/galeri', function () {
        return view('galeri');
    });

    Route::get('/kontak', function () {
        return view('kontak');
    });

    Route::get('/syarat', function () {
        return view('syarat');
    });

    Route::get('/booking', [BookingController::class, 'create'])->name('booking');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
    Route::post('/booking/cancel/{id}', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.super');
        }
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        $bookings = Booking::with('car')->where('user_id', $user->id)->latest()->get();
        return view('dashboard', compact('bookings'));
    })->name('dashboard');

    Route::get('/admin/cars', [AdminController::class, 'cars'])->middleware('role:admin|super_admin')->name('admin.cars');
    Route::get('/admin/cars/create', [AdminController::class, 'createCar'])->middleware('role:admin|super_admin')->name('admin.cars.create');
    Route::post('/admin/cars', [AdminController::class, 'storeCar'])->middleware('role:admin|super_admin')->name('admin.cars.store');
    Route::get('/admin/cars/{id}/edit', [AdminController::class, 'editCar'])->middleware('role:admin|super_admin')->name('admin.cars.edit');
    Route::put('/admin/cars/{id}', [AdminController::class, 'updateCar'])->middleware('role:admin|super_admin')->name('admin.cars.update');
    Route::delete('/admin/cars/{id}', [AdminController::class, 'deleteCar'])->middleware('role:admin|super_admin')->name('admin.cars.delete');

    Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('role:admin|super_admin')->name('admin.dashboard');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->middleware('role:admin|super_admin')->name('admin.bookings');
    Route::post('/admin/bookings/{id}/approve', [AdminController::class, 'approve'])->middleware('role:admin|super_admin')->name('admin.booking.approve');
    Route::post('/admin/bookings/{id}/reject', [AdminController::class, 'reject'])->middleware('role:admin|super_admin')->name('admin.booking.reject');
    Route::post('/admin/bookings/{id}/complete', [AdminController::class, 'complete'])->middleware('role:admin|super_admin')->name('admin.booking.complete');

    Route::get('/admin/users', [AdminController::class, 'users'])->middleware('role:admin|super_admin')->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->middleware('role:admin|super_admin')->name('admin.user.delete');
    Route::put('/admin/users/{id}/role', [AdminController::class, 'updateUserRole'])->middleware('role:admin|super_admin')->name('admin.user.role');
    Route::get('/admin/reports', [AdminController::class, 'reports'])->middleware('role:admin|super_admin')->name('admin.reports');
    Route::get('/admin/super', [AdminController::class, 'superDashboard'])->middleware('role:super_admin')->name('admin.super');
});
