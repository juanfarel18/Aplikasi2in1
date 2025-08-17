<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingCar;
use Illuminate\Support\Facades\Auth;

class BookingCarController extends Controller
{
    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'service' => 'required|string',
        ]);

        BookingCar::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'date' => $request->date,
            'service' => $request->service,
        ]);

        return redirect()->route('bookings.create')->with('success', 'Booking berhasil dibuat!');
    }
}
