<?php

use Illuminate\Support\Facades\Route;



//2020-06-19 - CuongNC - UpdateMiddleware
Route::group(['middleware' => ['permission:them_tai_khoan|sua_tai_khoan']], function () {
    Route::get('/quan-ly-tai-khoan', 'AccountController@index')->name('account.list');
    Route::post('/edit-status', 'AccountController@editstatus')->name('account.editstatus');
    Route::get('/create', 'AccountController@create')->name('account.create');
    Route::post('/store', 'AccountController@store')->name('account.store');
    Route::get('/edit/{id}', 'AccountController@edit')->name('account.edit');
    Route::post('/update', 'AccountController@updateID')->name('account.update');
    Route::post('/check-email-update', 'AccountController@checkEmailUpdate')->name('account.check_email_update');
    Route::view('/quan-ly-quyen-truy-cap', 'account.quan_ly_quyen_truy_cap')->name('account.quyen-truy-cap');
});;

//2020-06-11 - cuongnc,hieupt - start phân quyền tài khoản
Route::get('/phan-quyen-tai-khoan', 'PhanQuyenController@getQuyen')->name('account.phan-quyen-tk');
Route::view('/chi-tiet-phan-quyen-tai-khoan', 'account.chi_tiet_phan_quyen_tai_khoan')->name('account.chi-tiet-phan-quyen');
Route::get('/them-quyen', 'PhanQuyenController@themQuyen')->name('account.them-quyen');
// end phân quyền tài khoản

Route::get('/cap-nhat-thong-tin-ca-nhan', 'AccountController@capnhatthongtincanhan');
Route::get('/doi-mat-khau', 'AccountController@thaydoimatkhau');

// 2020-05-30 - thienth - chuyển tạo tk sang nhóm account
Route::get('/tao-tai-khoan', 'UserController@getdangkytaikhoan')->name("account.tao-tk");
Route::post('/tao-tai-khoan', 'UserController@dangkytaikhoan');


// 2020-05-31 - phucnv - làm thêm chắc năng search và chắc ten
Route::get('/search', 'AccountController@search')->name('account.search');
Route::post('/check-name', 'AccountController@checkName')->name('account.check-name');