<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactioncar extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'user_id', 'service_name', 'date', 'amount', 'status',
    ];

    protected $dates = ['date'];
}