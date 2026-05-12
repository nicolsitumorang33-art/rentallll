<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $car = null;
        if ($request->has('car_id')) {
            $car = Car::find($request->car_id);
        }
        if (!$car) {
            $car = Car::first();
        }
        $bookingSuccess = null;
        return view('booking', compact('car', 'bookingSuccess'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'with_driver' => 'boolean',
            'with_insurance' => 'boolean',
            'total' => 'required|numeric',
            'proof_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';
        $validated['payment_method'] = 'transfer';
        $validated['with_driver'] = $request->boolean('with_driver');
        $validated['with_insurance'] = $request->boolean('with_insurance');

        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('proofs', 'public');
            $validated['proof_image'] = $path;
        }

        $booking = Booking::create($validated);

        return redirect()->route('booking.success', $booking->id);
    }

    public function success($id)
    {
        $booking = Booking::with('car')->findOrFail($id);
        return view('booking-success', compact('booking'));
    }

    public function myBookings()
    {
        $bookings = Booking::with('car')->where('user_id', auth()->id())->latest()->get();
        return view('my-bookings', compact('bookings'));
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id === auth()->id() && $booking->status === 'pending') {
            $booking->update(['status' => 'cancelled']);
        }
        return redirect('/')->with('cancel_message', 'Booking berhasil dibatalkan.');
    }
}
