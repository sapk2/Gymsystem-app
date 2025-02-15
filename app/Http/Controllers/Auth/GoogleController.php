<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function  redirectTOGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser= User::where('google_id',$user->getId())->first();
        if (!is_null($finduser)) {
            Auth::login($finduser);
            return redirect()->intended('/');
        }
        else {
            $finduser =User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => encrypt('123456dummy'),
                'role' => 'member'
            ]);
            Auth::login($finduser);     
        }
       return redirect()->intended('/');
    }
}
