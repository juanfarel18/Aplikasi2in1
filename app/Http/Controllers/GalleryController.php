<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:laundry,carwash',
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Gallery::create($validated);

        return redirect()->route('galleries.index')->with('success', 'Gallery item created successfully.');
    }

    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'type' => 'required|in:laundry,carwash',
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $gallery->update($validated);

        return redirect()->route('galleries.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery item deleted successfully.');
    }
}
