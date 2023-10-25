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

Route::post('sign-up', 'AuthController@');


Route::middleware('auth:api')->group(function () {
    //UserController
    // Route::resource('users', UserController::class);
 
});

// Route::middleware('guest')->group(function () {


//     Route::post('forgot-password', [AuthController::class, 'store'])
//         ->name('password.email');
// });
