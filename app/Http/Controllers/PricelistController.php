<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    public function index()
    {
        $pricelists = Pricelist::latest()->paginate(10);
        return view('pricelists.index', compact('pricelists'));
    }

    public function create()
    {
        return view('pricelists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:laundry,carwash',
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        Pricelist::create($validated);

        return redirect()->route('pricelists.index')->with('success', 'Pricelist item created successfully.');
    }

    public function show(Pricelist $pricelist)
    {
        return view('pricelists.show', compact('pricelist'));
    }

    public function edit(Pricelist $pricelist)
    {
        return view('pricelists.edit', compact('pricelist'));
    }

    public function update(Request $request, Pricelist $pricelist)
    {
        $validated = $request->validate([
            'type' => 'required|in:laundry,carwash',
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $pricelist->update($validated);

        return redirect()->route('pricelists.index')->with('success', 'Pricelist item updated successfully.');
    }

    public function destroy(Pricelist $pricelist)
    {
        $pricelist->delete();

        return redirect()->route('pricelists.index')->with('success', 'Pricelist item deleted successfully.');
    }
}
