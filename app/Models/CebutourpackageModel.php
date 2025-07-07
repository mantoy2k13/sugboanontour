<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CebutourpackageModel extends Model
{
    use HasFactory;
     protected $fillable =
    [
        'id',
        'tour_id',
        'fullname',
        'booking_date',
        'no_of_pax',
        'cl_location',
        'phone_number',
        'message',
        'email',
        'category_title'
        
    ];

}
