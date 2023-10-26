<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');


Route::middleware('auth:api')->group(function () {
    //IndexController
    Route::get('banners', 'IndexController@getBanners');
    //UserController
    Route::put('users/{id}', 'UserController@update');
    Route::get('users/{id}', 'UserController@show');
    Route::get('users', 'UserController@index');
    //ProductController
    Route::get('products', 'ProductController@index');


    //CategoryController
    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{id}', 'CategoryController@show');

    //AddressController
    Route::post('shipping-addresses', 'AddressController@storeShippingAddress');
    Route::put('shipping-addresses/{id}', 'AddressController@updateShippingAddress');
    Route::get('shipping-addresses', 'AddressController@shippingAddresses');
});

// Route::middleware('guest')->group(function () {


//     Route::post('forgot-password', [AuthController::class, 'store'])
//         ->name('password.email');
// });
