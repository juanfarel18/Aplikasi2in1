<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'type',        // laundry atau carwash
        'title',       // judul gambar
        'image_path',  // path atau url gambar
        'description', // deskripsi opsional
    ];

    // Scope untuk filter tipe laundry
    public function scopeLaundry($query)
    {
        return $query->where('type', 'laundry');
    }

    // Scope untuk filter tipe carwash
    public function scopeCarwash($query)
    {
        return $query->where('type', 'carwash');
    }
}
