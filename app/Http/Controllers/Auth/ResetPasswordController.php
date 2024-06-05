<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = RouteServiceProvider::HOME;

    // public function showResetForm($token)
    // {
    //     return view('auth.passwords.reset')->with(['token' => $token]);
    // }

    // public function reset($token)
    // {
    //     return view('auth.passwords.reset')->with(['token' => $token]);
    // }
}

