<?php
use Illuminate\Support\Facades\Route;

Route::get('/quan-ly-tai-khoan', 'AccountController@index')->name('account.list');
Route::post('/edit-status', 'AccountController@editstatus')->name('account.editstatus');
Route::get('/create', 'AccountController@create')->name('account.create');
Route::post('/store', 'AccountController@store')->name('account.store');
Route::get('/edit/{id}', 'AccountController@edit')->name('account.edit');
Route::post('/update', 'AccountController@updateID')->name('account.update');
Route::post('/check-email-update','AccountController@checkEmailUpdate')->name('account.check_email_update');

Route::view('/quan-ly-quyen-truy-cap', 'account.quan_ly_quyen_truy_cap')->name('account.quyen-truy-cap');
Route::view('/phan-quyen-tai-khoan', 'account.phan_quyen_tai_khoan')->name('account.phan-quyen-tk');

Route::get('/cap-nhat-thong-tin-ca-nhan', 'AccountController@capnhatthongtincanhan');
Route::get('/doi-mat-khau', 'AccountController@thaydoimatkhau');

// 2020-05-30 - thienth - chuyển tạo tk sang nhóm account
Route::get('/tao-tai-khoan','UserController@getdangkytaikhoan')->name("account.tao-tk");
Route::post('/tao-tai-khoan','UserController@dangkytaikhoan');

?>