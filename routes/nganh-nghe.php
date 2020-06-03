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
Route::get('/thiet-lap-nghe-cho-co-so-dao-tao', 'NganhNgheController@thietlapnghechocosodaotao')->name('nghe.thiet-lap-nghe-cs');
