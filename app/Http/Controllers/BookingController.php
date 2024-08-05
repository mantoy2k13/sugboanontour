<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $this->validate($request, [
               'name' => 'required',
               'email' => 'email',
               'contact_number'=> 'numeric|min:11|max:12'
        ]);
    }
}
