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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
     return view('login');
})->middleware("CheckLogin");

Route::post('/post_login','AuthController@login')->name('post_login');
Route::get('/logout','AuthController@logout');


Route::get('/dashboard', function () {
     return view('index');
})->middleware("CheckLogout");

Route::get('/getdatauser','AuthController@getdata');
