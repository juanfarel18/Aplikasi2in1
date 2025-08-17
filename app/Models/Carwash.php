<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carwash extends Model
{
    protected $fillable = [
        'images',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array', // simpan banyak foto dalam urutan
        
    ];
}
