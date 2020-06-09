<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:13
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'CoSoDaoTaoController@danhsachCSDT')->name('csdt.danh-sach');

Route::get('tao-moi-co-so', 'CoSoDaoTaoController@themCSDT')->name('csdt.tao-moi');
Route::post('tao-moi-co-so', 'CoSoDaoTaoController@taomoiCSDT');

Route::get('chi-tiet-co-so/{id}', 'CoSoDaoTaoController@chitietCSDT')->name('csdt.chi-tiet');

Route::get('cap-nhat-co-so/{id}', 'CoSoDaoTaoController@suaCSDT')->name('csdt.cap-nhat');
Route::post('cap-nhat-co-so/{id}', 'CoSoDaoTaoController@capnhatCSDT');

Route::get('danh-sach-chi-nhanh/{id?}', 'ChiNhanhController@danhsachchinhanh')->name('csdt.chi-nhanh');

Route::get('tao-moi-chi-nhanh', 'ChiNhanhController@themchinhanh')->name('chi-nhanh.tao-moi');
Route::post('tao-moi-chi-nhanh', 'ChiNhanhController@savethemchinhanh');

Route::get('sua-chi-nhanh/{id}', 'ChiNhanhController@suachinhanh')->name('chi-nhanh.cap-nhat');
Route::post('sua-chi-nhanh/{id}', 'ChiNhanhController@capnhatchinhanh');

Route::post('xoa-chi-nhanh/{id}', 'ChiNhanhController@xoachinhanh')->name('chi-nhanh.xoa');

Route::post('them-co-quan-chu-quan', 'CoSoDaoTaoController@addCoQuanChuQuan')->name('co-quan-chu-quan.add');
