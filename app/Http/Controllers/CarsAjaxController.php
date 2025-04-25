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
    public function store($id, Request $request)
    {
        echo 'This is adding';
        return 'H';
        // $this->validate($request, [
        //     'filenames' => 'required',
        //     'filenames.*' => 'image',
        //     'details' => 'required',
        //     'category' => 'required',
        //     'title' => 'required',
        //     'rate' => 'required'
        // ]);

        // $files = [];
        // if($request->hasfile('filenames'))
        // {
        //     foreach($request->file('filenames') as $file)
        //     {
        //         $name = time().rand(1,100).'.'.$file->extension();
        //         $file->move(public_path('files'), $name);  
        //         $files[] = $name;  
        //     }
        // }
        
        // $file= new Cars();
        // $file->name = json_encode($files);
        // $file->path = '1';
        // $file->rate = $request->input('rate');
        // $file->details = $request->input('details');
        // $file->category = $request->input('category');
        // $file->title = $request->input('title');
        // $file->save();
        
        // return back()->with('status', 'Data Your files has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $cars)
    {
        //
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
