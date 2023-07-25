<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class WelcomeController extends Controller
{
    protected $slug;

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
        $result = Product::paginate(12);
        return view('layouts.components.shop_component')
                ->with('result', $result);
    }

    public function store($product_id, $product_name, $product_price)
    {
        // code...
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('cart');
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

    // public function render()
    // {
    //     $result = Product::where('slug', $this->slug)->first();
    //     dd($result);
    //     return view('layouts.components.product_detail',['product' => $result]);
    // }

    // this is default product detail page
    // public function productDetail()
    // {
    //     return view('layouts.components.product_detail');
    // }

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

    public function termsConditions()
    {
        return view('layouts.components.terms_conditions');
    }
}
