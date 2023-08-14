<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('authadmin');
    }

    public function dashboard()
    {
        // dd(route('admin::category.store'));
        return view('dashboard.admin_dashboard');
    }

    public function userDashboard()
    {
        return view('dashboard.user_dashboard');
    }
}
