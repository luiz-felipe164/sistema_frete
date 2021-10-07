<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'board',
        'vehicle_owner',
        'amount',
        'start_date',
        'end_date',
        'status'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];
}
