<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
        // dd("a");
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();
        dd($user);
    }
}
