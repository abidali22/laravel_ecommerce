<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function adminDashboard()
    {
        dd('are you there yet abid in urser controller');
        return view('dashboard.user_dashboard');
    }
}
