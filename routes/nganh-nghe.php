<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:15
 */

use Illuminate\Support\Facades\Route;

Route::get('/danh-sach', 'NganhNgheController@danhsachnganhnghe')->name('nghe.danh-sach');
Route::get('/chi-tiet-nghe/{ma_nghe}', 'NganhNgheController@chitietnghe')->name('nghe.chi-tiet-nghe');
Route::get('/thiet-lap-chi-tieu-tuyen-sinh', 'NganhNgheController@thietlapchitieutuyensinh')->name('nghe.chi-tieu-ts');

Route::post('/bo-sung-nganh-nghe-vao-co-so', 'NganhNgheController@boSungNganhNgheVaoCoSo')->name('nghe.bo-sung-vao-co-so');

Route::get('cap-nhat-nganh-nghe/{id}', 'NganhNgheController@capNhatNganhNghe')->name('nghe.cap-nhat');
Route::get('search', 'NganhNgheController@search')->name('nghe.search');
