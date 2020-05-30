<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'account'], function(){

    Route::get('/quan-ly-tai-khoan', 'AccountController@index')->name('account.list');
    Route::post('/edit-status', 'AccountController@editstatus')->name('account.editstatus');
    Route::get('/create', 'AccountController@create')->name('account.create');
    Route::post('/store', 'AccountController@store')->name('account.store');
    Route::get('/edit/{id}', 'AccountController@edit')->name('account.edit');
    Route::post('/update', 'AccountController@updateID')->name('account.update');
    Route::post('/check-email-update','AccountController@checkEmailUpdate')->name('account.check_email_update');
    Route::get('/quan-ly-quyen-truy-cap', 'AccountController@quanlyquyentruycap');
    Route::get('/phan-quyen-tai-khoan', 'AccountController@phanquyentaikhoan');
    Route::get('/cap-nhat-thong-tin-ca-nhan', 'AccountController@capnhatthongtincanhan');
    Route::get('/doi-mat-khau', 'AccountController@thaydoimatkhau');
});

?>