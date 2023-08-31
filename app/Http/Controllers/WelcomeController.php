<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
//use Illuminate\Support\Facades\Http;
// use GuzzleHttp\Client;

class WelcomeController extends Controller
{
    protected $slug;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
    //     $client = Http::get('https://jsonplaceholder.typicode.com/posts');
    //     // $client = new Client([
    //     //     // Base URI is used with relative requests
    //     //     'base_uri' => 'http://httpbin.org',
    //     //     // You can set any number of default request options.
    //     //     'timeout'  => 2.0,
    //     // ]);
    //     return $client;
        return view('layouts.components.home-component');
    }

    public function shop()
    {
        $result = Product::paginate(12);
        return view('layouts.components.shop_component')
                ->with('result', $result);
    }

    //product details
    public function productDetail($slug)
    {
        $result = Product::where('slug', $slug)->first();
        $reltvProducts = Product::where('category_id', $result->category_id)->inRandomOrder()->limit(5)->get();
        $newProducts = Product::latest()->take(4)->get();
        // dd($newProducts);
        return view('layouts.components.product_details')
              ->with('product', $result)
              ->with('reltvProducts', $reltvProducts)
              ->with('newProducts', $newProducts);
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

    public function termsConditions()
    {
        return view('layouts.components.terms_conditions');
    }
}
