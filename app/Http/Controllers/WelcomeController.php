<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.components.home-component');
    }

    public function shop()
    {
        return view('layouts.components.shop_component');
    }

    public function about()
    {
        return view('layouts.components.about');
    }

    public function aboutDetail()
    {
        return view('layouts.components.about_detail');
    }

    public function blog()
    {
        return view('layouts.components.blog');
    }

    public function cart()
    {
        return view('layouts.components.cart');
    }

    public function checkOut()
    {
        return view('layouts.components.check_out');
    }

    public function contact()
    {
        return view('layouts.components.contact');
    }

    public function myAccount()
    {
        return view('layouts.components.my_account');
    }

    public function privacyPolicy()
    {
        return view('layouts.components.privacy_policy');
    }

    public function productDetail()
    {
        return view('layouts.components.product_detail');
    }

    public function termsConditions()
    {
        return view('layouts.components.terms_conditions');
    }
}
