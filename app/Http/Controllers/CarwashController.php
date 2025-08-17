<?php

namespace App\Http\Controllers;

// 1. Use the correct Model that matches your Filament Resource
use App\Models\Carwash;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarwashController extends Controller
{
    /**
     * Display the carwash homepage with active carwash images.
     */
    public function index()
    {
         // Ambil data pengaturan (selalu ambil yang pertama)
        $pageSettings = PageSetting::first();

        // 2. Query the 'Carwash' model and use the 'is_active' column
        $carwashes = Carwash::where('is_active', true)
            // ->orderBy('order') // This line is commented out as 'order' column may not exist
            ->get()
            ->map(function ($carwash) {
                // This logic correctly processes the JSON 'images' field from your repeater
                $images = $carwash->images ?? [];

                if (!empty($images) && isset($images[0]['image'])) {
                    // Ensure forward slashes for web paths
                    $path = str_replace('\\', '/', $images[0]['image']);
                    // Create a new property for easy access in the Blade file
                    $carwash->image_path = $path;
                } else {
                    $carwash->image_path = null;
                }

                return $carwash;
            });

        // 3. Send the correct variable '$carwashes' to the view
        return view('carwash.index-carwash', compact('carwashes','pageSettings'));
    }
}
