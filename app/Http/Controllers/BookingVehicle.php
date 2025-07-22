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
        $title = 'contact';
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
        $text = 'Your book has been sent successfully, is this correct number ' . $number . ' ?, If not please rebook.';
        return redirect('/findcars')->with('success', $text);
    }

    public function bookinglist( Request $request)
    {
    $id = (Auth::check()) ? Auth::user()->id : 0;    
    $title = 'Booking lists';
    $currentdate = date('Y-m-d', strtotime(now()->subDays(7) ) );
    
     $bookings = DB::table('cars as c')
    ->join('booking_models as b', 'c.id', '=', 'b.car_id')
    ->select(
        'c.vehicle_name as vehicle',
        'c.path as img',
        'c.model as model',
        'c.location as location_owner',
        'c.vehicle_type as vtype',
        'b.pick_up_date as pick_date',
        'b.return_date as return_date',
        'b.client_location as client_location',
        'b.phone_number as number',
        'b.client_name as name',
        'b.created_at'
        
        )->where('b.created_at', '>', $currentdate)
        ->orderBy('b.id', 'DESC')
        ->get();
        
    return view('pages.bookinglist', ['bookings'=>$bookings, 'title'=>$title ] );
    }

    public function addcontacts(Request $request){
         $this->validate($request, [

            'name'       => 'required',
            'email'       => 'required',
            'subject'      => 'required',
            'message'           => 'required',
            'phonenumber'   =>'required'
        ]);



        $book_car = new BookingModel();
        $book_car->car_id = 0;
        $book_car->pick_up_date = now();
        $book_car->return_date = now();
        $book_car->phone_number = $request->input('phonenumber');
        $book_car->client_location = $request->input('location');
        $book_car->client_name = $request->input('name');
        $book_car->message = $request->input('message');
        $book_car->save();
        $number = $request->input('phonenumber');
        $text = 'Your message has been sent successfully, is this correct number ' . $number . ' ?, If not please rebook.';
        return redirect('/contact')->with('success', $text);
    }
}

