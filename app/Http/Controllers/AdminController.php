<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCars = Car::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $recentUsers = User::latest()->take(5)->get();
        return view('admin.dashboard', compact('totalUsers', 'totalCars', 'totalBookings', 'pendingBookings', 'recentUsers'));
    }

    public function bookings()
    {
        $bookings = Booking::with('car', 'user')->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'confirmed']);
        return redirect()->route('admin.bookings')->with('success', 'Booking #' . $booking->id . ' berhasil dikonfirmasi.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'rejected']);
        return redirect()->route('admin.bookings')->with('success', 'Booking #' . $booking->id . ' ditolak.');
    }

    public function complete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'completed']);
        return redirect()->route('admin.bookings')->with('success', 'Booking #' . $booking->id . ' selesai.');
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'Tidak bisa menghapus akun sendiri.');
        }
        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.users')->with('error', 'Tidak bisa menghapus Super Admin.');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Pengguna ' . $user->name . ' berhasil dihapus.');
    }

    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate(['role' => 'required|in:customer,admin,super_admin']);
        if ($user->isSuperAdmin() && auth()->user()->id !== $user->id) {
            return redirect()->route('admin.users')->with('error', 'Tidak bisa mengubah role Super Admin.');
        }
        $user->update(['role' => $request->role]);
        return redirect()->route('admin.users')->with('success', 'Role ' . $user->name . ' diubah menjadi ' . $request->role . '.');
    }

    public function cars()
    {
        $cars = Car::latest()->get();
        return view('admin.cars', compact('cars'));
    }

    public function createCar()
    {
        return view('admin.cars-form');
    }

    public function storeCar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'seats' => 'required|integer|min:1|max:20',
            'transmission' => 'required|string|in:Manual,Automatic',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['price'] = (int) $validated['price'];

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Car::create($validated);

        return redirect()->route('admin.cars')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function editCar($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars-form', compact('car'));
    }

    public function updateCar(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'seats' => 'required|integer|min:1|max:20',
            'transmission' => 'required|string|in:Manual,Automatic',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['price'] = (int) $validated['price'];

        if ($request->hasFile('image')) {
            if ($car->image && file_exists(public_path('images/' . $car->image))) {
                unlink(public_path('images/' . $car->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        $car->update($validated);

        return redirect()->route('admin.cars')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function deleteCar($id)
    {
        $car = Car::findOrFail($id);
        if ($car->image && file_exists(public_path('images/' . $car->image))) {
            unlink(public_path('images/' . $car->image));
        }
        $car->delete();
        return redirect()->route('admin.cars')->with('success', 'Mobil berhasil dihapus.');
    }

    public function reports()
    {
        $totalBookings = Booking::count();
        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total');
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $rejectedBookings = Booking::where('status', 'rejected')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        $monthlyBookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $popularCars = Car::withCount('bookings')->orderBy('bookings_count', 'desc')->take(5)->get();
        $recentBookings = Booking::with('car', 'user')->latest()->take(10)->get();
        return view('admin.reports', compact(
            'totalBookings', 'totalRevenue', 'pendingBookings', 'confirmedBookings',
            'completedBookings', 'rejectedBookings', 'cancelledBookings',
            'monthlyBookings', 'popularCars', 'recentBookings'
        ));
    }

    public function superDashboard()
    {
        $totalUsers = User::count();
        $totalAdmins = User::whereIn('role', ['admin', 'super_admin'])->count();
        $totalCars = Car::count();
        $totalBookings = Booking::count();
        $allUsers = User::latest()->get();
        $adminUsers = User::whereIn('role', ['admin', 'super_admin'])->latest()->get();
        return view('admin.super-dashboard', compact('totalUsers', 'totalAdmins', 'totalCars', 'totalBookings', 'allUsers', 'adminUsers'));
    }
}
