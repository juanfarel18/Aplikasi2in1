<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Menampilkan daftar semua slider di halaman admin.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Menampilkan formulir untuk membuat slider baru.
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Menyimpan slider baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'nullable|string|max:255',
            'image'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link'     => 'nullable|url',
            'order'    => 'nullable|integer|min:0',
            'status'   => 'nullable|boolean',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title'      => $request->input('title'),
            'image_path' => $imagePath,
            'link'       => $request->input('link'),
            'order'      => $request->input('order', 0),
            'status'     => $request->boolean('status', true),
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit slider.
     */
    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    /**
     * Memperbarui slider yang sudah ada.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link'  => 'nullable|url',
            'order' => 'nullable|integer',
            'status'=> 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($slider->image_path);
            $path = $request->file('image')->store('sliders', 'public');
            $slider->image_path = $path;
        }

        $slider->update([
            'title'  => $request->title,
            'link'   => $request->link,
            'order'  => $request->order ?? 0,
            'status' => $request->boolean('status', true),
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider berhasil diperbarui.');
    }

    /**
     * Menghapus slider dari database.
     */
    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image_path);
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider berhasil dihapus.');
    }

    /**
     * Mengambil slider yang aktif untuk halaman promo.
     */
    public function promo()
    {
        $sliders = Slider::where('status', true)->orderBy('order')->get();
        return view('promo.index', compact('sliders'));
    }

    /**
     * Memperbarui urutan slider melalui AJAX.
     */
    public function updateOrder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            Slider::where('id', $id)->update(['order' => $index]);
        }
        return response()->json(['success' => true]);
    }

    /**
     * Mengubah status (aktif/non-aktif) slider.
     */
    public function toggle($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = !$slider->status;
        $slider->save();
        return back();
    }
}