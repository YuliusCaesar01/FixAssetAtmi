<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $dataUser = User::where('email', $user->email)->first();

        $emailDomain = explode("@", $user->email)[1];
        //dd($dataUser);
        if ($emailDomain !== 'student.atmi.ac.id' && $emailDomain !== 'atmi.ac.id' && $emailDomain !== 'gmail.com') {
            return redirect(route('login'))->withErrors('Email tidak terdaftar.');
        }
        if (empty($dataUser)) {
            return redirect(route('login'))->withErrors('Email tidak terdaftar.');
        }

        // Login user
        auth()->login($dataUser); //session data 


        return redirect()->route('dashboard');
    }
}
