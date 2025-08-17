<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    protected $fillable = [
        'type',          // laundry atau carwash
        'service_name',  // nama layanan
        'description',   // deskripsi opsional
        'price',         // harga layanan
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
