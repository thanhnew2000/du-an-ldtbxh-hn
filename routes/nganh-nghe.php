<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:15
 */
use Illuminate\Support\Facades\Route;

Route::get('/danh-sach', 'CareerController@danhsachnganhnghe')->name('nghe.danh-sach');
Route::get('/thiet-lap-chi-tieu-tuyen-sinh', 'CareerController@thietlapchitieutuyensinh')->name('nghe.chi-tieu-ts');
Route::get('/thiet-lap-nghe-cho-co-so-dao-tao', 'CareerController@thietlapnghechocosodaotao')->name('nghe.thiet-lap-nghe-cs');