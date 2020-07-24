<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 7/14/20
 * Time: 11:19
 */

use Illuminate\Support\Facades\Route;



// Route::get('so-lieu-tuyen-sinh','@SoLieuTuyenSinhController')->name('tuyen-sinh.so-lieu-tuyen-sinh');
Route::get('them-so-lieu-tuyen-sinh','SoLieuTuyenSinhController@themSoLieuTuyenSinh')->name('tuyen-sinh.them-so-lieu-tuyen-sinh');
Route::post('get-nganh-nghe-phan-loai-nganh-nghe-co-so','SoLieuTuyenSinhController@getNganhNgheHavePhanLoaiFolowCoSo')->name('get-nganh-nghe-phan-loai-co-so');

Route::post('get-nghe-da-nhap-cua-co-so','SoLieuTuyenSinhController@getNganhNgheDaNhapOfCoSo')->name('get-nghe-da-nhap-cua-co-so');

Route::post('tao-one-moi-tuyen-sinh','SoLieuTuyenSinhController@store')->name('tao-one-tuyen-sinh');

Route::post('co-so-tuyen-sinh-nghe','SoLieuTuyenSinhController@getNganhNgheOneOfCoSo')->name('get-one-nghe-tuyen-sinh');
