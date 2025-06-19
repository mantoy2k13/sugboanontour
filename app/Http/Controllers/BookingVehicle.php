<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\BookingModel;

class BookingVehicle extends Controller
{
    public function getvehicle($id, Request $request)
    {
        $title = 'Booking Vehicle';

        $cars = DB::table('cars as c')
            ->select(
                'c.vehicle_name as name',
                'c.path as img',
                'c.location as location',
                'c.book_date as rate',
                'c.year as year',
                'c.vehicle_type as vehicle_type',
                'c.model as model',
                'c.id as id',
                'c.book_status as book_status',
                'c.book_date as rate'
            )
            ->where('c.id', $id)
            ->get()->toArray();
        return view('pages.bookingvehicle', ['title' => $title, 'car' => $cars]);
    }
    public function contact(Request $request)
    {
        $title = 'Contact Page';
        return view('pages.contact', ['title' => $title]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [

            'pickup_date'       => 'required',
            'return_date'       => 'required',
            'phone_number'      => 'required',
            'location'           => 'required',
            'client_name'          => 'required',
            
        ]);



        $book_car = new BookingModel();
        $book_car->car_id = $request->input('car_id');
        $book_car->pick_up_date = $request->input('pickup_date');
        $book_car->return_date = $request->input('return_date');
        $book_car->phone_number = $request->input('phone_number');
        $book_car->client_location = $request->input('location');
        $book_car->client_name = $request->input('client_name');
        $book_car->save();
        $number = $request->input('phone_number');
        $text = 'Your book has been sent successfully, is this correct number ' .$number. ' ?, If not please rebook.'  ;
        return redirect('/findcars')->with('success', $text);
    }
}
