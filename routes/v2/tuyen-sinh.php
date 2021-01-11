<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 7/14/20
 * Time: 11:19
 */

use Illuminate\Support\Facades\Route;



// Route::get('so-lieu-tuyen-sinh','@SoLieuTuyenSinhController')->name('tuyen-sinh.so-lieu-tuyen-sinh');
Route::get('/tong-hop-so-lieu-tuyen-sinh', 'SoLieuTuyenSinhController@index')->name('solieutuyensinh');
Route::get('ke-hoach-tuyen-sinh','SoLieuTuyenSinhController@keHoachTuyenSinh')->name('tuyen-sinh.ke_hoach_tuyen_sinh');


Route::get('them-so-lieu-tuyen-sinh','SoLieuTuyenSinhController@themSoLieuTuyenSinh')->name('tuyen-sinh.them-so-lieu-tuyen-sinh');
Route::post('get-nganh-nghe-phan-loai-nganh-nghe-co-so','SoLieuTuyenSinhController@getNganhNgheHavePhanLoaiFolowCoSo')->name('get-nganh-nghe-phan-loai-co-so');
Route::post('get-nghe-da-nhap-cua-co-so','SoLieuTuyenSinhController@getNganhNgheDaNhapOfCoSo')->name('get-nghe-da-nhap-cua-co-so');
Route::post('tao-one-moi-tuyen-sinh','SoLieuTuyenSinhController@store')->name('tao-one-tuyen-sinh');
Route::post('co-so-tuyen-sinh-nghe','SoLieuTuyenSinhController@getNganhNgheOneOfCoSo')->name('get-one-nghe-tuyen-sinh');


Route::post('/co-so-tuyen-sinh-theo-loai-hinh', 'SoLieuTuyenSinhController@getCoSoTuyenSinhTheoLoaiHinh')->name('csTuyenSinhTheoLoaiHinh');
Route::post('/xa-phuong-theo-quan-huyen', 'QuanHuyenController@getXaPhuongTheoQuanHuyen')->name('getXaPhuongTheoQuanHuyen');
Route::post('/get-ma-nganh-nghe', 'SoLieuTuyenSinhController@getmanganhnghe')->name('get_ma_nganh_nghe');
Route::post('/check-them-so-lieu-tuyen-sinh', 'SoLieuTuyenSinhController@getCheckTonTaiSoLieuTuyenSinh')->name('so_lieu_tuyen_sinh.check_so_lieu');
Route::post('/get-nghe-theo-cap-bac', 'SoLieuTuyenSinhController@getNgheTheoCapBac')->name('getNgheTheoCapBac');
Route::post('export-sreach', 'SoLieuTuyenSinhController@exportFollowSreach')->name('exportsreach');
Route::post('form-nhap-sv', 'SoLieuTuyenSinhController@exportBieuMau')->name('layformbieumausinhvien');
Route::post('export-data-sv', 'SoLieuTuyenSinhController@exportData')->name('exportdatatuyensinh');

// kế hoạch tuyển sinh
Route::post('get-ke-hoach_tuyen_sinh_co_so','SoLieuTuyenSinhController@getDataKeHoachTuyenSinhCs')->name('getKeHoachTuyenSinhTheoCs');
Route::post('get-mot-nghe_ke_hoach_tuyen_sinh','SoLieuTuyenSinhController@getOneChiTietKeHoachTuyenSinh')->name('getOneNgheKeHoachTuyenSinh');
Route::post('store-ke-hoach-tuyen-sinh','SoLieuTuyenSinhController@storeKeHoachTuyenSinh')->name('store.update.kehoachtuyensinh');
