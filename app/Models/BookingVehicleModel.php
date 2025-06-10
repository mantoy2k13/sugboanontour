<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingVehicleModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'car_id',
        'location',
        'phone_number',
        'pick_up_date',
        'return_date',
        'message',
        'booking_status',
        'subject',
        'name_renter',
        'email'
    ];
    protected $table = 'my_custom_booking_vehicle_table';
}
