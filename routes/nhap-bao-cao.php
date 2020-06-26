<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:19
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'quan-ly-giao-vien',
    'middleware' => ['permission:them_moi_quan_ly_giao_vien|cap_nhat_quan_ly_giao_vien']
], function () {
    Route::get('/', 'QuanLyGiaoVienController@index')->name('ql-giao-vien.index');
    Route::get('create', 'QuanLyGiaoVienController@create')->name('ql-giao-vien.create');
    Route::post('store', 'QuanLyGiaoVienController@store')->name('ql-giao-vien.store');
    Route::get('edit/{giaoVien}', 'QuanLyGiaoVienController@edit')->name('ql-giao-vien.edit');
    Route::post('update/{giaoVien}', 'QuanLyGiaoVienController@update')->name('ql-giao-vien.update');

    // thanhnv import export doi ngu nha giao bm-9
    Route::post('import-file-ql-giao-vien', 'QuanLyGiaoVienController@importFile')
        ->name('import-quan-ly-giao-vien');
    Route::post('import-error-ql-giao-vien', 'QuanLyGiaoVienController@importError')
        ->name('import-error-quan-ly-giao-vien');
});
//CườngNC - Update Middleware - 
Route::group(['middleware' => ['permission:publish them_moi_danh_sach_doi_ngu_quan_ly
                            |cap_nhat_danh_sach_doi_ngu_quan_ly
                            |xem_chi_tiet_danh_sach_doi_ngu_quan_ly']], function () {
    Route::resource('so-lieu-can-bo-quan-ly', 'SoLieuCanBoQuanLyController');
    // thanhnv import export
    Route::post('so-lieu-can-bo-quan-ly/import-so-lieu-quan-ly', 'ImportSoLieuCanBoQlController@importFile')
        ->name('import-so-lieu-quan-ly');
    Route::post('so-lieu-can-bo-quan-ly/import-error-so-lieu-quan-ly', 'ImportSoLieuCanBoQlController@importError')
        ->name('import-error-so-lieu-quan-ly');
});


Route::group(['prefix' => 'can-bo-quan-ly'], function () {
    Route::get('/', 'ImportReportController@doingucanboquanly')->name('nhapbc.quan-ly');
});

Route::group(['prefix' => 'chinh-sach-cho-sinh-vien'], function () {
    Route::get('/', 'ImportReportController@chinhsachchosinhvien')->name('nhapbc.chinh-sach-sv');


    // thanhnv import export
    Route::post('import-bieu-mau-chinh-sach-sv', 'ImportChinhSachSinhVienController@importFile')
        ->name('import-chinh-sach-sinh-vien');
    Route::post('import-error-bieu-mau-chinh-sach-sv', 'ImportChinhSachSinhVienController@importError')
        ->name('import-error-chinh-sach-sinh-vien');
});

Route::group(['prefix' => 'ket-qua-tuyen-sinh'], function () {
    Route::get('/', 'ImportReportController@ketquatuyensinh')->name('nhapbc.ket-qua-ts');

    Route::post('import-kq-sv', 'ImportKqtsController@importFile')->name('import.ket-qua-ts');
    Route::post('import-error-kq-sv', 'ImportKqtsController@importError')->name('import.error.ket-qua-ts');
});

Route::group(['prefix' => 'xd-chuong-trinh-giao-trinh'], function () {
    Route::get('/', 'ImportReportController@xaydungchuongtrinh')->name('nhapbc.xd-chuong-trinh');
});

Route::group(['prefix' => 'ket-qua-tot-nghiep'], function () {
    Route::get('/', 'ImportReportController@ketquatotnghiep')->name('nhapbc.kq-tot-nghiep');

    Route::post('import-kq-tot_nghiep', 'ImportKqTotNghiepController@importFile')->name('import.ket-qua-tot-nghiep');
    Route::post('import-error-kq-tot_nghiep', 'ImportKqTotNghiepController@importError')->name('import.error.ket-qua-tot-nghiep');
});

Route::group(['prefix' => 'dao-tao-nghe-cho-nguoi-khuyet-tat'], function () {
    Route::get('/', 'DaoTaoNgheChoNguoiKhuyetTatController@index')->name('nhapbc.dao-tao-khuyet-tat');
    Route::get('/create', 'DaoTaoNgheChoNguoiKhuyetTatController@create')->name('nhapbc.dao-tao-khuyet-tat.create');
    Route::post('/store', 'DaoTaoNgheChoNguoiKhuyetTatController@store')->name('nhapbc.dao-tao-khuyet-tat.store');
    Route::get('/show/{id}', 'DaoTaoNgheChoNguoiKhuyetTatController@show')->name('nhapbc.dao-tao-khuyet-tat.show');
    Route::get('/edit/{id}', 'DaoTaoNgheChoNguoiKhuyetTatController@edit')->name('nhapbc.dao-tao-khuyet-tat.edit');
    Route::post('/update/{id}', 'DaoTaoNgheChoNguoiKhuyetTatController@update')->name('nhapbc.dao-tao-khuyet-tat.update');
    Route::post('/check-them-dao-tao-cho-nguoi-khuyet-tat', 'DaoTaoNgheChoNguoiKhuyetTatController@getCheckTonTaiDaoTaoChoNguoiKhuyetTat')->name('nhapbc.dao-tao-khuyet-tat.check_so_lieu');

    //thanhnv import
    Route::post('import-kq-dao-tao-nguoi-khuyet-tat', 'DaoTaoNgheChoNguoiKhuyetTatController@importFile')->name('importketqua.dao-tao-nguoi-khuyet-tat');
    Route::post('import-error-kq-dao-tao-nguoi-khuyet-tat', 'DaoTaoNgheChoNguoiKhuyetTatController@importError')->name('import.error.kq-dao-tao-nguoi-khuyet-tat');
});

Route::group(['prefix' => 'dao-tao-nghe-cho-thanh-nien'], function () {
    Route::get('/', 'DaoTaoNgheThanhNienController@index')->name('nhapbc.dao-tao-thanh-nien.index');
    Route::get('/edit/{id}', 'DaoTaoNgheThanhNienController@edit')->name('nhapbc.dao-tao-thanh-nien.edit');
    Route::post('/update/{id}', 'DaoTaoNgheThanhNienController@update')->name('nhapbc.dao-tao-thanh-nien.update');
    Route::get('/create', 'DaoTaoNgheThanhNienController@create')->name('nhapbc.dao-tao-thanh-nien.create');
    Route::post('/store', 'DaoTaoNgheThanhNienController@store')->name('nhapbc.dao-tao-thanh-nien.store');
    Route::get('/show/{id}', 'DaoTaoNgheThanhNienController@show')->name('nhapbc.dao-tao-thanh-nien.show');
    Route::post('/check-them-dao-tao-thanh-nien', 'DaoTaoNgheThanhNienController@getCheckDaoTaoThanhNien')->name('nhapbc.dao-tao-thanh-nien.check_so_lieu');

    //thanhnv import
    Route::post('import-kq-dao-tao-thanh-nien', 'DaoTaoNgheThanhNienController@importFile')->name('importketqua.dao-tao-thanh-nien');
    Route::post('import-error-kq-dao-tao-thanh-nien', 'DaoTaoNgheThanhNienController@importError')->name('import.error.kq-dao-tao-thanh-nien');
});

Route::group(['prefix' => 'dao-tao-nghe-doanh-nghiep'], function () {
    Route::get('/', 'ImportReportController@ketquadaotaovoidoanhnghiep')->name('nhapbc.dao-tao-nghe-doanh-nghiep');
});

Route::group(['prefix' => 'lien-ket-dao-tao'], function () {
    Route::get('/', 'ImportReportController@lienketdaotao')->name('nhapbc.lien-ket-dao-tao');
    Route::get('/chi-tiet-lien-ket-dao-tao', 'ImportReportController@chitietlienketdaotao')->name('nhapbc.chi-tiet-lien-ket-dao-tao');
    Route::get('/them-moi-lien-ket-dao-tao', 'ImportReportController@themmoilienketdaotao')->name('nhapbc.them-moi-lien-ket-dao-tao');
    Route::get('/chinh-sua-lien-ket-dao-tao', 'ImportReportController@chinhsualienketdaotao')->name('nhapbc.chinh-sua-lien-ket-dao-tao');
});

Route::group(['prefix' => 'thiet-lap-deadline-bao-cao'], function () {
    Route::get('/', 'ImportReportController@deadlinebaocao')->name('nhapbc.deadline-bao-cao');
});

Route::group(['prefix' => 'kiem-soat-tien-do-nop-bao-cao'], function () {
    Route::get('/', 'ImportReportController@tiendonopbaocao')->name('nhapbc.tien-do-nop-bao-cao');
});

Route::group(['prefix' => 'phe-duyet-bao-cao'], function () {
    Route::get('/', 'ImportReportController@pheduyetbaocao')->name('nhapbc.phe-duyet-bao-cao');
});

// thanhnv them group
Route::group(['prefix' => 'so-lieu-sinh-vien-dang-theo-hoc'], function () {
    Route::post('import-hs-sv-quan-li', 'ImportHsQlController@importFileHsQl')->name('import.hssv.ql');
    Route::post('import-error-hs-sv-quan-li', 'ImportHsQlController@importErrorHsQl')->name('import.error.hssv-ql');
});