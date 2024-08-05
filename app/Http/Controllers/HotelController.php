<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\DB;
class HotelController extends Controller
{
    public function index()
    {
        $tours = DB::table('files')->where('category', 1)->get();
        return view('pages.hotel', compact('tours'));
    }
}
