<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/taste', function () {
    return view('welcome');
});

Route::get('/', ['as' => 'homesss','uses' => 'App\Http\Controllers\WelcomeController@index']);
Route::get('/home', 'App\Http\Controllers\WelcomeController@index')->name('home');
// Route::get('/', 'App\Http\Controllers\WelcomeController@index');

Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart');
Route::get('/store-cart/{prdId}/{prdPrice}', 'App\Http\Controllers\CartController@storeCart');
Route::get('/add-qty/{prdId}', 'App\Http\Controllers\CartController@increaseQuantity');
Route::get('/subtract-qty/{prdId}', 'App\Http\Controllers\CartController@decreaseQuantity');
Route::get('/remove-prdct/{prdId}', 'App\Http\Controllers\CartController@removeItem');
Route::get('/clear-cart', 'App\Http\Controllers\CartController@clearCart');

Route::get('/shop', 'App\Http\Controllers\WelcomeController@shop')->name('shop');
Route::get('/check-out', 'App\Http\Controllers\WelcomeController@checkOut')->name('check-out');
Route::get('/about', 'App\Http\Controllers\WelcomeController@about')->name('about');
Route::get('/about-detail', 'App\Http\Controllers\WelcomeController@aboutDetail');
Route::get('/blog', 'App\Http\Controllers\WelcomeController@blog')->name('blog');
Route::get('/contact', 'App\Http\Controllers\WelcomeController@contact')->name('contact');
Route::get('/my-account', 'App\Http\Controllers\WelcomeController@myAccount');
Route::get('/privacy-policy', 'App\Http\Controllers\WelcomeController@privacyPolicy');
Route::get('/product-detail/{slug}', 'App\Http\Controllers\WelcomeController@productDetail')->name('product-datail');
Route::get('/terms-conditions', 'App\Http\Controllers\WelcomeController@termsConditions');

// Route::get('/cart', CartComponent::class)->name('shop.cart');

// Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
