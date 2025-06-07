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

       return view('pages.carsajax');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
         $tours = DB::table('files')->where('category', 1)->get();
        
       return view('pages.carsajax',compact('tours'));
        
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
            'book_date'          => 'required',
            'vehicle_type'       => 'required',
            // 'book_status'        => 'required'
            
            
            ]);
        
              $files = [];
            if($request->hasfile('filenames'))
            {
                foreach($request->file('filenames') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
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
            $car->book_date = $request->input('book_date'); /*temporary sa rate*/ 
            $car->location = $request->input('location');
            $car->vehicle_type = $request->input('vehicle_type');
            $car->book_status = 1;
            $car->driver_status = 1;
            
            $car->save();
            
            return redirect('/dashboard')->with('success', 'Cars added successfully!');
            
    }

    public function findcars(Cars $cars){
        $findcars = DB::table('cars as c')
            ->select('c.vehicle_name as name',
             'c.path as img',
              'c.location as location',
              'c.book_date as rate',
              'c.year as year',
              'c.vehicle_type as vehicle_type',
              'c.model as model',
              'c.id as id',
              'c.book_status as book_status'
              )->get()->toArray();
            return view('pages.findcars', [ 'findcars' => $findcars]);
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
    public function update(Request $request, $id)
    {        
        
        $msg = ($request->input('book_status') == 1) ? 'set available was successfully' : 'set Not Avilable was successfully';
        
        if($request->has('id')){
             Cars::find($request->input('id'))->update($request->all());
            
        }
       
        return response()->json(['success'=> $msg]);
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

    public function getvehicle($id, Request $request){
        echo $id;
    }

    public function delete($id, Request $request ){

        $data = Cars::find($id);
        $imgs_unlink = json_decode($data->path, true);
        
        foreach($imgs_unlink as $imgunlink){

            
            $path = public_path().'/files/'.$imgunlink;
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
