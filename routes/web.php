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

// Route::get('/', HomeController::class)->name('home.index');
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', ['as' => 'homesss','uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/', 'App\Http\Controllers\HomeController@index');

Auth::routes([
  'reset' => false, // Password Reset Routes...
  'verify' => false // Email Verification Routes...
]);

// Route::get('/shop', ShopComponent::class)->name('shop');

// Route::get('/cart', CartComponent::class)->name('shop.cart');

// Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
