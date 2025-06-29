<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomAuthController extends Controller
{

    
    public function index()
    {
        $title = 'Login';
        return view('auth.login', ['title' => $title]);

    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success','Welcome, Cebu Car BNB');
        }
        else{
            return redirect("login")->with('success','Incorrect password / or user does not exists please try again...');
        }

        
    }

    public function registration()
    {
        $title = 'Registration';
        return view('auth.registration', ['tours' => [], 'cars' => [], 'title'=>$title ]); 
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);
        
        $data = $request->all();
        $check = $this->create($data);

        // return redirect("")->with('success','Welcome to car rental');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'status' => $data['password'],
        'password' => Hash::make($data['password']) 
      ]
      )->redirect('dashobard')->with('success','Welcome to our page');
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        if(Auth::check() ){
            $user_id = (Auth::user()->id) ? Auth::user()->id :  0 ; 
            
            $tour_packages = DB::table('files')->get();

            $cars = DB::table('cars as c')
            ->select('c.vehicle_name as name',
             'c.path as img',
             'users.name as fullname',
              'c.location as location',
              'c.book_date as rate',
              'c.year as year',
              'c.vehicle_type as vehicle_type',
              'c.model as model',
              'c.id as id',
              'c.book_status as book_status'
              )
            ->join('users', 'users.id', '=', 'c.user_id')
            ->where('c.user_id', $user_id)
            ->get()->toArray();
            return view('auth.dashboard', ['tours' => $tour_packages, 'cars' => $cars, 'title'=>$title]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
