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
        $title = 'Cars';
        return view('pages.carsajax', ['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tours = DB::table('files')->where('category', 1)->get();

        return view('pages.carsajax', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());


        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image',
            'vehicle_name'       => 'required',
            'model'              => 'required',
            'year'               => 'required',
            'location'           => 'required',
            'rate'          => 'required|numeric',
            'vehicle_type'       => 'required',
            'fuel_type'               => 'required',
            'transmission_type'       => 'required'
            // 'book_status'        => 'required'


        ]);

        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }
        $json_ncode = json_encode($files);
        $car = new Cars();
        $car->user_id = $request->input('user_id');
        $car->vehicle_name = $request->input('vehicle_name');
        $car->path = $json_ncode;
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->book_date = $request->input('rate'); /*temporary sa rate*/
        $car->location = $request->input('location');
        $car->vehicle_type = $request->input('vehicle_type');
        $car->book_status = 1;
        $car->driver_status = 1;
        $car->transmission_type = $request->input('transmission_type');
        $car->fuel_type = $request->input('fuel_type');

        $car->save();

        return redirect('/dashboard')->with('success', 'Cars added successfully!');
    }

    public function findcars(Cars $cars)
    {
        $title = 'Find cars Page';
        $findcars = DB::table('cars as c')
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
                'c.transmission_type as t_type',
                'c.fuel_type as f_type',
                'u.phone as phone'
            )
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->where('c.book_status', 1)
            ->paginate(20);

        return view('pages.findcars', ['findcars' => $findcars, 'title' => $title]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $cars)
    {
        echo 'testing pag sure oi';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Update car';
        $car = DB::table('cars as c')
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
                'c.book_date as book_date',
                'c.transmission_type as t_type',
                'c.fuel_type as f_type'
            )
            ->where('c.id', $id)
            ->get();

        return view('pages.editcars', ['title' => $title, 'car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $msg = ($request->input('book_status') == 1) ? 'set available was successfully' : 'set Not Avilable was successfully';

        if ($request->has('id')) {
            Cars::find($request->input('id'))->update($request->all());
        }

        return response()->json(['success' => $msg]);
    }

    public function updateall(Request $request)
    {

        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image',
            'rate'          => 'required|numeric'
        ]);

        if ($request->has('car_id')) {
            $files = [];

            // $car = Cars::find($request->car_id)->update($request->all());

            if ($request->hasfile('filenames')) {
                foreach ($request->file('filenames') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('files'), $name);
                    $files[] = $name;
                }
            }
            $json_ncode = json_encode($files);
            $car =  Cars::find($request->car_id);
            $imgs_unlink = json_decode($car->path, true);
            foreach ($imgs_unlink as $imgunlink) {
                $path = public_path() . '/files/' . $imgunlink;
                if (file_exists($path)) {
                    unlink($path);

                    $mssg = " also deleted images  Successfully ";
                } else {

                    $mssg = "Does not exists";
                }
            }
            $car->vehicle_name = $request->input('vehicle_name');
            $car->path = $json_ncode;
            $car->model = $request->input('model');
            $car->year = $request->input('year');
            $car->book_date = $request->input('rate'); /*temporary sa rate*/
            $car->location = $request->input('location');
            $car->vehicle_type = $request->input('vehicle_type');
            $car->transmission_type = $request->input('transmission_type');
            $car->fuel_type = $request->input('fuel_type');
            $car->save();
        }

        $msg_suc = 'Cars updated successfully' . $mssg;
        return redirect('/dashboard')->with('success', 'Cars updated successfully!' . $mssg,);
    }
    /* params user and login or registration
        user: cebucarbnb
        pass:testing123
    */
    public function srchlocation(Request $request)
    {
        return 'searching';
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

    // searching for vehicle informations
    public function searchvehicle(Request $request)
    {
        $title = 'search vehicle';
        if (empty($request->input('search_vehicle'))) {

            $vehicle_name = '';
        } else {
            $vehicle_name = $request->input('search_vehicle');
        }
        
        if (empty($request->input('vehicle_type'))) {
            $vehicle_type = '';
        } else {
            $vehicle_type = $request->input('vehicle_type');
        }

        if (empty($request->input('vehicle_address'))) {
            $vehicle_address = '';
        } else {
            $vehicle_address = $request->input('vehicle_address');
        }

        $findcars = DB::table('cars as c')
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
                'c.transmission_type as t_type',
                'c.fuel_type as f_type',
                'u.phone as phone',
                'u.name as full_name',
                'u.role as role'
            )
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->where([
                ['c.vehicle_type', 'LIKE', '%' . $vehicle_type . '%'],
                ['c.vehicle_name', 'LIKE', '%' . $vehicle_name . '%'],
                ['c.location', 'LIKE', '%' . $vehicle_address . '%']
            ])
            ->get();
        return view('pages.findcars', ['title' => $title, 'findcars'=>$findcars]);
        
    }

    public function delete($id, Request $request)
    {

        $data = Cars::find($id);
        $imgs_unlink = json_decode($data->path, true);

        foreach ($imgs_unlink as $imgunlink) {


            $path = public_path() . '/files/' . $imgunlink;
            if (file_exists($path)) {
                unlink($path);

                $mssg = "Deleted Cars Successfully ";
            } else {

                $mssg = "Does not exists";
            }
        }

        $data->delete();
        return response()->json(['success' => $mssg]);
    }
}
