<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryBooking extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',      // bisa refer ke pricelist atau service
        'booking_date',
        'status',          // contoh: pending, completed, canceled
        'total_price',
        // tambahkan kolom lain sesuai kebutuhan
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke transaksi laundry
    public function transactions()
    {
        return $this->hasMany(LaundryTransaction::class);
    }

    // Relasi ke pricelist/service (optional)
    // public function service()
    // {
    //     return $this->belongsTo(Pricelist::class, 'service_id');
    // }
}
