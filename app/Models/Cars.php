<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    
    protected $fillable = [
        'id', 
        'user_id', 
        'vehicle_name',
        'path',
        'model',
        'year',
        'book_date',
        'location',
        'vehicle_type',
        'book_status',
        'driver_status'
    ];
}
