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

// Route::get('/', WelcomeController::class)->name('home.index');
// Route::get('/', [WelcomeController::class, 'index']);
Route::get('/', ['as' => 'homesss','uses' => 'App\Http\Controllers\WelcomeController@index']);
Route::get('/home', 'App\Http\Controllers\WelcomeController@index')->name('home');
// Route::get('/', 'App\Http\Controllers\WelcomeController@index');


// Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/shop', 'App\Http\Controllers\WelcomeController@shop')->name('shop');
Route::get('/about', 'App\Http\Controllers\WelcomeController@about')->name('about');
Route::get('/about-detail', 'App\Http\Controllers\WelcomeController@aboutDetail');
Route::get('/blog', 'App\Http\Controllers\WelcomeController@blog');
Route::get('/cart', 'App\Http\Controllers\WelcomeController@cart');
Route::get('/check-out', 'App\Http\Controllers\WelcomeController@checkOut');
Route::get('/contact', 'App\Http\Controllers\WelcomeController@contact');
Route::get('/my-account', 'App\Http\Controllers\WelcomeController@myAccount');
Route::get('/privacy-policy', 'App\Http\Controllers\WelcomeController@privacyPolicy');
Route::get('/product-detail/{slug}', 'App\Http\Controllers\WelcomeController@productDetail')->name('product-datail');
Route::get('/terms-conditions', 'App\Http\Controllers\WelcomeController@termsConditions');

// Route::get('/cart', CartComponent::class)->name('shop.cart');

// Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
