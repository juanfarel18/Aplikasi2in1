<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarwashTransaction extends Model
{
    protected $fillable = [
        'carwash_booking_id',
        'status',
        'total_price',
        // kolom lain jika ada
    ];

    // Relasi ke booking
    public function carwashBooking()
    {
        return $this->belongsTo(CarwashBooking::class);
    }
}
