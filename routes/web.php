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
})->name('login')->middleware("CheckLogin");

Route::post('/dang-nhap','AuthController@login')->name('post_login');
Route::get('/logout','AuthController@logout');
Route::post('/quen-mat-khau','AuthController@forgot_pass')->name('forgot_pass');
Route::get('/thay-doi-mat-khau','AuthController@reset_pass')->name('link_reset_password');
Route::post('/thay-doi-mat-khau','AuthController@post_reset_pass');
Route::get('/dang-ky-tai-khoan','AuthController@dangkytaikhoan');
Route::get('/dashboard', function () {
     return view('index');
})->middleware("CheckLogout");


Route::get('/getdatauser','AuthController@getdata');
