<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RenterController extends Controller
{
    public function dashboard()
    {
        return view('renter.dashboard');
    }
}