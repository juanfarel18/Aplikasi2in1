<?php

namespace App\Http\Controllers;

use App\Models\CarwashBooking;
use Illuminate\Http\Request;

class CarwashBookingController extends Controller
{
    public function index()
    {
        $bookings = CarwashBooking::latest()->paginate(10);
        return view('carwash_bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('carwash_bookings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required',
            'booking_date' => 'required|date',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        CarwashBooking::create($validated);

        return redirect()->route('carwash-bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(CarwashBooking $carwashBooking)
    {
        return view('carwash_bookings.show', compact('carwashBooking'));
    }

    public function edit(CarwashBooking $carwashBooking)
    {
        return view('carwash_bookings.edit', compact('carwashBooking'));
    }

    public function update(Request $request, CarwashBooking $carwashBooking)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required',
            'booking_date' => 'required|date',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $carwashBooking->update($validated);

        return redirect()->route('carwash-bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(CarwashBooking $carwashBooking)
    {
        $carwashBooking->delete();

        return redirect()->route('carwash-bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
