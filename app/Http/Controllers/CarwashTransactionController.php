<?php

namespace App\Http\Controllers;

use App\Models\CarwashTransaction;
use Illuminate\Http\Request;

class CarwashTransactionController extends Controller
{
    public function index()
    {
        $transactions = CarwashTransaction::latest()->paginate(10);
        return view('carwash_transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('carwash_transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'carwash_booking_id' => 'required|exists:carwash_bookings,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        CarwashTransaction::create($validated);

        return redirect()->route('carwash-transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(CarwashTransaction $carwashTransaction)
    {
        return view('carwash_transactions.show', compact('carwashTransaction'));
    }

    public function edit(CarwashTransaction $carwashTransaction)
    {
        return view('carwash_transactions.edit', compact('carwashTransaction'));
    }

    public function update(Request $request, CarwashTransaction $carwashTransaction)
    {
        $validated = $request->validate([
            'carwash_booking_id' => 'required|exists:carwash_bookings,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $carwashTransaction->update($validated);

        return redirect()->route('carwash-transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(CarwashTransaction $carwashTransaction)
    {
        $carwashTransaction->delete();

        return redirect()->route('carwash-transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
