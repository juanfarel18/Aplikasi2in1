<?php

namespace App\Http\Controllers;

use App\Models\LaundryBooking;
use Illuminate\Http\Request;

class LaundryBookingController extends Controller
{
    public function index()
    {
        $bookings = LaundryBooking::latest()->paginate(10);
        return view('laundry_bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('laundry_bookings.create');
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

        LaundryBooking::create($validated);

        return redirect()->route('laundry-bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(LaundryBooking $laundryBooking)
    {
        return view('laundry_bookings.show', compact('laundryBooking'));
    }

    public function edit(LaundryBooking $laundryBooking)
    {
        return view('laundry_bookings.edit', compact('laundryBooking'));
    }

    public function update(Request $request, LaundryBooking $laundryBooking)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required',
            'booking_date' => 'required|date',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $laundryBooking->update($validated);

        return redirect()->route('laundry-bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(LaundryBooking $laundryBooking)
    {
        $laundryBooking->delete();

        return redirect()->route('laundry-bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
