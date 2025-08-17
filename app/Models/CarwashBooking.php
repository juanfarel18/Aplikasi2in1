<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarwashBooking extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'booking_date',
        'status',
        'total_price',
        // kolom lain sesuai kebutuhan
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke transaksi carwash
    public function transactions()
    {
        return $this->hasMany(CarwashTransaction::class);
    }

    // Relasi ke pricelist/service (optional)
    // public function service()
    // {
    //     return $this->belongsTo(Pricelist::class, 'service_id');
    // }
}
