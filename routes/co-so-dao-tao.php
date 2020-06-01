<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:13
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'CsdtController@danhsachcosodaotao')->name('csdt.danh-sach');
Route::get('/them-co-so', 'CsdtController@themCsdt')->name('csdt.them');
Route::post('/saveAddCsdt}', 'CsdtController@saveAddCsdt')->name('saveAddCsdt');
Route::get('/sua-co-so/{id}', 'CsdtController@suaCsdt')->name('csdt.sua');
Route::get('/chi-tiet-co-so/{id}', 'CsdtController@chi_tiet_co_so')->name('csdt.chitiet');
Route::post('saveEditCsdt/{id?}', 'CsdtController@saveEditCsdt')->name('saveEditCsdt');

Route::get('/chi-nhanh', 'ChiNhanhController@danhsachchinhanh')->name('csdt.chi-nhanh');
Route::get('/them-chi-nhanh', 'ChiNhanhController@themchinhanh')->name('chinhanh.them');
Route::post('/saveAddChiNhanh', 'ChiNhanhController@saveAddChiNhanh')->name('saveAddChiNhanh');
Route::get('/sua-chi-nhanh/{id}', 'ChiNhanhController@suaChiNhanh')->name('chinhanh.sua');




