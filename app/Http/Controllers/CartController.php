<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    protected $slug;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function cart()
    {
        return view('layouts.components.cart');
    }

    public function storeCart($product_id, $product_price)
    {
        $product_name = Product::where('id',$product_id)->pluck('name');
        Cart::add($product_id,$product_name[0],1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('cart');
    }

    public function increaseQuantity($prodId)
    {
        $product_name = Product::where('id',$prodId)->pluck('name','regular_price')->toArray();
        Cart::add($prodId,reset($product_name),1,key($product_name))->associate('App\Models\Product');
        // dd();
        // $product = Cart::get($prodId);
        // $newQty = $product->qty;
        // Cart::update($prodId, $newQty);
        // return 'inclrousing '.$newQty;
    }

    public function decreaseQuantity($prodId)
    {
        $product_name = Product::where('id',$prodId)->pluck('name','regular_price')->toArray();
        Cart::add($prodId,reset($product_name),-1,key($product_name))->associate('App\Models\Product');
        // $product = Cart::get($prodId);
        // $newQty = $product->qty;
        // Cart::update($prodId, $newQty);
        // return 'decreasing '.$newQty;
    }

    public function removeItem($prodId)
    {
        Cart::remove($prodId);
    }

    public function clearCart()
    {
        Cart::destroy();
        session()->flash('success_message','Cart is cleard now');
    }

}
