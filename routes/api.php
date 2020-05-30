<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 2020-05-30 - thienth - chuyển check-email, check-phone sang api
Route::post('/check-email','UserController@checkemail')->name('check-email');
Route::post('/check-phone','UserController@checkphone')->name('check-phone');
