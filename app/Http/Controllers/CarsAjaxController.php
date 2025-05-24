<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tours = DB::table('files')->where('category', 1)->get();
        
       return view('pages.carsajax',compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        echo 'This is creating form pages';
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        echo 'The next step store cars';

          $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image',
            'details' => 'required',
            'category' => 'required',
            'title' => 'required',
            'rate' => 'required'
            ]);
        //   $request->validate([
        //     'vehicle_name' => 'required|string|max:255',
        //     ]);

        //     $car = new Cars();
        //     $car->user_id = $request->input('user_id');
        //     $car->vehicle_name = $request->input('vehicle_name');
        //     $car->user_id = $request->input('vehicle_model');
        //     $car->user_id = $request->input('book_date');
        //     $car->user_id = $request->input('location');
        //     $car->user_id = $request->input('vehicle_type');
        //     $car->user_id = $request->input('book_status');
        //     $car->user_id = $request->input('driver_status');
        //     $car->save();

        //     return back()->with('success', 'Item added successfully!');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $cars)
    {
        echo 'testing';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $cars)
    {
        //
    }
}
