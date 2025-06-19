<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'car_id',
        'pick_up_date',
        'return_date',
        'booking_status',
        'client_location',
        'phone_number',
        'message',
        'client_name',
        'column1'
    ];

}
