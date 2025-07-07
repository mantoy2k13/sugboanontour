<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;
class HotelController extends Controller
{
    public function index()
    {
        $title = 'Cebu Tour packages';
        $tours = DB::table('files')->where('category', [2,5])->get();
        
        return view('pages.cebutours', compact('tours', 'title'));
    }
}
