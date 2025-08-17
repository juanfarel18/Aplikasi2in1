<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    //
    // app/Models/Carwash.php
protected $fillable = [
    'images',
    'is_active',
    'cta_image', // <-- TAMBAHKAN INI
];
}
