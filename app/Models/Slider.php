<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'link',
        'order',
        'status',
        'page' => 'carwash', // <-- slider khusus halaman carwash
    ];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            // Kalau tidak ada gambar, pakai gambar default
            return asset('images/no-image.png');
        }

        // Kalau path sudah berupa URL penuh
        if (filter_var($this->image_path, FILTER_VALIDATE_URL)) {
            return $this->image_path;
        }

        // Ambil dari public/storage
        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}
