<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('authadmin');
    }

    public function adminDashboard()
    {
        return view('dashboard.admin_dashboard');
    }

    public function categories()
    {
        return view('dashboard.admin_categories');
    }

    public function userDashboard()
    {
        return view('dashboard.user_dashboard');
    }
}
