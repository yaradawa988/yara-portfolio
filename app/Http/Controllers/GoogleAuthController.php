<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class GoogleAuthController extends Controller
{
   
     public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
       $googleUser = Socialite::driver('google')->stateless()->user();


        
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(str()->random(16)),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

}
