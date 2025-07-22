<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;
class HotelController extends Controller
{
    public function index()
    {
        $title = 'cebutour';
        $tours = DB::table('files')->where('category', [2,5])->get();
        
        return view('pages.cebutours', compact('tours', 'title'));
    }

    // accomodation pages
    public function accomodation(){
        $title = 'Oslob accomodations';
        $tours = DB::table('files')
        ->where('category', [1])
        ->where('path', '=', 'oslob')
        ->get();
        
        return view('pages.oslob', compact('tours', 'title'));
    }

    public function moalboal(){
        $title = 'Moalboal accomodations';
        $tours = DB::table('files')
        ->where('category', [1])
        ->where('path', '=', 'moalboal')
        ->get();
        
        return view('pages.moalboal', compact('tours', 'title'));
    }
}
