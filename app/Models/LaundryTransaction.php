<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryTransaction extends Model
{
    protected $fillable = [
        'laundry_booking_id',
        'status',        // pending, completed, canceled
        'total_price',
        // kolom payment_method dan paid_at kalau ada
    ];

    // Relasi ke booking
    public function laundryBooking()
    {
        return $this->belongsTo(LaundryBooking::class);
    }
}
