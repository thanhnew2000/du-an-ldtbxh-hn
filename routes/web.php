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
     return view('account.login');
})->name('login')->middleware("CheckLogin");



Route::post('/dang-nhap','AuthController@login')->name('post_login');

Route::get('/logout','AuthController@logout');

Route::post('/quen-mat-khau-gui-mail','AuthController@forgot_pass')->name('forgot_pass');

Route::get('/quen-mat-khau','AuthController@reset_pass')->name('link_reset_password');

Route::post('/quen-mat-khau','AuthController@post_reset_pass');


Route::group(['middleware' => 'auth'], function () {
     Route::get('/dashboard','AnalysisController@index')->name('dashboard');

     Route::get('/tao-tai-khoan','UserController@getdangkytaikhoan')->name("dangkytaikhoan");
     Route::post('/tao-tai-khoan','UserController@dangkytaikhoan');

     Route::get('/doi-mat-khau','UserController@getdoimatkhau')->name("doimatkhau");
     Route::post('/doi-mat-khau','UserController@doimatkhau');
     
     Route::get('/thong-tin-tai-khoan','UserController@getcapnhattaikhoan')->name('capnhattaikhoan');
     Route::post('/thong-tin-tai-khoan','UserController@capnhattaikhoan');

     Route::post('/check-email','UserController@checkemail')->name('check-email');
     Route::post('/check-phone','UserController@checkphone')->name('check-phone');
});

