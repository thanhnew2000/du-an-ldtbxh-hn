<?php

//Created:  17/06/2020 Tuanbt - chia thêm Route giấy phép

use Illuminate\Support\Facades\Route;

Route::get('danh-sach-giay-phep/{id?}', 'GiayPhepController@danhSachGiayPhep')->name('giay-phep.danh-sach');

Route::get('tao-moi-giay-phep/{id?}', 'GiayPhepController@themGiayPhep')->name('giay-phep.tao-moi');
Route::post('tao-moi-giay-phep', 'GiayPhepController@taoMoiGiayPhep')->name('giay-phep.luu-giay-phep');

Route::get('/cap-nhat-giay-phep/{id}', 'GiayPhepController@suaGiayPhep')->name('giay-phep.cap-nhat');
Route::post('/cap-nhat-giay-phep/{id}', 'GiayPhepController@capNhatGiayPhep');
