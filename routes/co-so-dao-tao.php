<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:13
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'CsdtController@danhsachCSDT')->name('csdt.danh-sach');

Route::get('tao-moi-co-so', 'CsdtController@themCSDT')->name('csdt.tao-moi');
Route::post('tao-moi-co-so', 'CsdtController@taomoiCSDT');

Route::get('chi-tiet-co-so/{id}', 'CsdtController@chitietCSDT')->name('csdt.chi-tiet');

Route::get('cap-nhat-co-so/{id}', 'CsdtController@suaCSDT')->name('csdt.cap-nhat');
Route::post('cap-nhat-co-so/{id}', 'CsdtController@capnhatCSDT');

Route::get('danh-sach-chi-nhanh', 'ChiNhanhController@danhsachchinhanh')->name('csdt.chi-nhanh');

Route::get('tao-moi-chi-nhanh', 'ChiNhanhController@themchinhanh')->name('chi-nhanh.tao-moi');
Route::post('tao-moi-chi-nhanh', 'ChiNhanhController@saveAddChiNhanh');

Route::get('sua-chi-nhanh/{id}', 'ChiNhanhController@suaChiNhanh')->name('chi-nhanh.cap-nhat');
