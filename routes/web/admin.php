<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
  'reset' => false, // Password Reset Routes...
  'verify' => false // Email Verification Routes...
]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::middleware(['auth'])->group(function(){
//     Route::get('admin.dashboard', '\App\Http\Controllers\AdminController@adminDashboard')->name('admin.dashboard');
// });

Route::group(['middleware' => 'auth'], function () {

  Route::get('/guest', '\App\Http\Controllers\AdminController@userDashboard')->name('user.dashboard');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
        /**
         * Admin Access
         */
        Route::group(['middleware' => 'authadmin'], function () {
            Route::get('/', '\App\Http\Controllers\AdminController@dashboard')->name('dashboard');
            Route::resource('category', '\App\Http\Controllers\CategoryController');
        });
    });
    // Route::get('/', ['as' => 'homesss','uses' => 'App\Http\Controllers\WelcomeController@index']);
});
