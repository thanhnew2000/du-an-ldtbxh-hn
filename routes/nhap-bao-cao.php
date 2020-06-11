<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:19
 */
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'quan-ly-giao-vien'], function(){
    Route::get('/', 'QuanLyGiaoVienController@index')->name('ql-giao-vien.index');
    Route::get('create', 'QuanLyGiaoVienController@create')->name('ql-giao-vien.create');
    Route::post('store', 'QuanLyGiaoVienController@store')->name('ql-giao-vien.store');
    Route::get('edit/{giaoVien}', 'QuanLyGiaoVienController@edit')->name('ql-giao-vien.edit');
    Route::post('update/{giaoVien}', 'QuanLyGiaoVienController@update')->name('ql-giao-vien.update');
});

Route::resource('so-lieu-can-bo-quan-ly', 'SoLieuCanBoQuanLyController');
// thanhnv import export
Route::post('so-lieu-can-bo-quan-ly/import-so-lieu-quan-ly', 'ImportSoLieuCanBoQlController@importFile')
->name('import-so-lieu-quan-ly');
Route::post('so-lieu-can-bo-quan-ly/import-error-so-lieu-quan-ly', 'ImportSoLieuCanBoQlController@importError')
->name('import-error-so-lieu-quan-ly');

Route::group(['prefix' => 'can-bo-quan-ly'], function(){
    Route::get('/', 'ImportReportController@doingucanboquanly')->name('nhapbc.quan-ly');
});

Route::group(['prefix' => 'chinh-sach-cho-sinh-vien'], function(){
    Route::get('/', 'ImportReportController@chinhsachchosinhvien')->name('nhapbc.chinh-sach-sv');
});

Route::group(['prefix' => 'ket-qua-tuyen-sinh'], function(){
    Route::get('/', 'ImportReportController@ketquatuyensinh')->name('nhapbc.ket-qua-ts');

    Route::post('import-kq-sv', 'ImportKqtsController@importFile')->name('import.ket-qua-ts');
    Route::post('import-error-kq-sv', 'ImportKqtsController@importError')->name('import.error.ket-qua-ts');


});

Route::group(['prefix' => 'xd-chuong-trinh-giao-trinh'], function(){
    Route::get('/', 'ImportReportController@xaydungchuongtrinh')->name('nhapbc.xd-chuong-trinh');
});

Route::group(['prefix' => 'ket-qua-tot-nghiep'], function(){
    Route::get('/', 'ImportReportController@ketquatotnghiep')->name('nhapbc.kq-tot-nghiep');

    Route::post('import-kq-tot_nghiep', 'ImportKqTotNghiepController@importFile')->name('import.ket-qua-tot-nghiep');
    Route::post('import-error-kq-tot_nghiep', 'ImportKqTotNghiepController@importError')->name('import.error.ket-qua-tot-nghiep');
});

Route::group(['prefix' => 'dao-tao-nghe-cho-nguoi-khuyet-tat'], function(){
    Route::get('/', 'ImportReportController@daotaonguoikhuyetat')->name('nhapbc.dao-tao-khuye-tat');
});

Route::group(['prefix' => 'dao-tao-nghe-cho-thanh-nien'], function(){
    Route::get('/', 'ImportReportController@daotaothanhnien')->name('nhapbc.dao-tao-thanh-nien');
});

Route::group(['prefix' => 'dao-tao-nghe-doanh-nghiep'], function(){
    Route::get('/', 'ImportReportController@ketquadaotaovoidoanhnghiep')->name('nhapbc.dao-tao-nghe-doanh-nghiep');
});

Route::group(['prefix' => 'lien-ket-dao-tao'], function(){
    Route::get('/', 'ImportReportController@lienketdaotao')->name('nhapbc.lien-ket-dao-tao');
});

Route::group(['prefix' => 'thiet-lap-deadline-bao-cao'], function(){
    Route::get('/', 'ImportReportController@deadlinebaocao')->name('nhapbc.deadline-bao-cao');
});

Route::group(['prefix' => 'kiem-soat-tien-do-nop-bao-cao'], function(){
    Route::get('/', 'ImportReportController@tiendonopbaocao')->name('nhapbc.tien-do-nop-bao-cao');
});

Route::group(['prefix' => 'phe-duyet-bao-cao'], function(){
    Route::get('/', 'ImportReportController@pheduyetbaocao')->name('nhapbc.phe-duyet-bao-cao');
});

// thanhnv them group
Route::group(['prefix' => 'so-lieu-sinh-vien-dang-theo-hoc'], function(){
    Route::post('import-hs-sv-quan-li', 'ImportHsQlController@importFileHsQl')->name('import.hssv.ql');
    Route::post('import-error-hs-sv-quan-li', 'ImportHsQlController@importErrorHsQl')->name('import.error.hssv-ql');
});
