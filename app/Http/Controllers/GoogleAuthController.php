<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(){
        try{

            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId() )->first();
            
            if(!$user){
                $new_user = User::create([
                    'id' => $google_user->getId(),
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                    
                ]);

                Auth::login($new_user);

                return redirect()->intended('dashboard');
            }
            else{
                Auth::login($user);
                return redirect()->intended('dashboard');
                
            }

        }
        catch(\Throwable $e){
            return ('Something went wrong!'.$e->getMessage() );
        }
    }
}
