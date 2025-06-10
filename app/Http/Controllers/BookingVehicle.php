<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingVehicle extends Controller
{
    public function getvehicle($id, Request $request){
        echo $id;
        echo 'This is vehicle';
    }
    public function contact(Request $request){
            $title = 'Contact Page';
            return view('pages.contact', ['title'=>$title]);
    }
}
