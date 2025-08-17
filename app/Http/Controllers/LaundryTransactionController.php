<?php

namespace App\Http\Controllers;

use App\Models\LaundryTransaction;
use Illuminate\Http\Request;

class LaundryTransactionController extends Controller
{
    public function index()
    {
        $transactions = LaundryTransaction::latest()->paginate(10);
        return view('laundry_transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('laundry_transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'laundry_booking_id' => 'required|exists:laundry_bookings,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        LaundryTransaction::create($validated);

        return redirect()->route('laundry-transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(LaundryTransaction $laundryTransaction)
    {
        return view('laundry_transactions.show', compact('laundryTransaction'));
    }

    public function edit(LaundryTransaction $laundryTransaction)
    {
        return view('laundry_transactions.edit', compact('laundryTransaction'));
    }

    public function update(Request $request, LaundryTransaction $laundryTransaction)
    {
        $validated = $request->validate([
            'laundry_booking_id' => 'required|exists:laundry_bookings,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $laundryTransaction->update($validated);

        return redirect()->route('laundry-transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(LaundryTransaction $laundryTransaction)
    {
        $laundryTransaction->delete();

        return redirect()->route('laundry-transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
