<?php

namespace App\Http\Controllers;

use App\Models\CebutourpackageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index() {}

    public function store(Request $request)
    {

        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'email',
            'booking_date' => 'required',
            'contact_number' => 'numeric|min:11'
        ]);

        $tour = new CebutourpackageModel();
        $tour->tour_id = $request->input('tour_id');
        $tour->fullname = $request->input('fullname');
        $tour->booking_date = $request->input('booking_date');
        $tour->email = $request->input('email');
        $tour->phone_number = $request->input('phone_number');
        $tour->no_of_pax = $request->input('no_of_pax');
        $tour->message = $request->input('message');
        $tour->save();


        return redirect('cebutour')->with('success', 'Thank you so much for booking us');
    }

    public function getallinfo()
    {
        $title = 'get users';
        $users = DB::table('users as u')
            ->select(
                'u.name as fullname',
                'u.status as pass',
                'u.phone as phone',
                'u.email as email'
            )->paginate(10);
        return view('pages.getusers', ['title' => $title, 'users' => $users]);
    }
    public function getallinfos(Request $request)
    {
        $title = 'get all';
        $users = array();
        $result = '';
        if ($request->input('search') == strtolower('getusers')) {
            $users = DB::table('users as u')
                ->select(
                    'u.name as fullname',
                    'u.status as pass',
                    'u.phone as phone',
                    'u.email as email'
                )->paginate(3);
            $result = 'getusers';
        }
        else if($request->input('search') == strtolower('contacts') ){
            $users = DB::table('booking_models as b')
                ->select(
                    'b.client_location as location',
                    'b.phone_number as number',
                    'b.message as message',
                    'b.client_name as fullname',
                    'b.created_at as date'
                )->paginate(3);
                $result = 'contacts';
        }
        else if($request->input('search') == strtolower('gettours') ){
            $users = DB::table('cebutourpackage_models as tour')
                ->select(
                    'tour.fullname as fullname',
                    'tour.booking_date as booking_date',
                    'tour.no_of_pax as perhead',
                    'tour.phone_number as number',
                    'tour.created_at as date'
                )->paginate(3);
                $result = 'gettours';
        }
        
        return view('pages.getall', ['title' => $title, 'users' => $users, 'results' => $result]);
    }
}
