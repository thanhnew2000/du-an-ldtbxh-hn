<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:19
 */
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'quan-ly-giao-vien'], function(){
    Route::get('/', 'ImportReportController@quanlygiaovien')->name('nhapbc.giao-vien');
});

Route::group(['prefix' => 'can-bo-quan-ly'], function(){
    Route::get('/', 'ImportReportController@doingucanboquanly')->name('nhapbc.quan-ly');
});

Route::group(['prefix' => 'chinh-sach-cho-sinh-vien'], function(){
    Route::get('/', 'ImportReportController@chinhsachchosinhvien')->name('nhapbc.chinh-sach-sv');
});

Route::group(['prefix' => 'ket-qua-tuyen-sinh'], function(){
    Route::get('/', 'ImportReportController@ketquatuyensinh')->name('nhapbc.ket-qua-ts');
});

Route::group(['prefix' => 'xd-chuong-trinh-giao-trinh'], function(){
    Route::get('/', 'ImportReportController@xaydungchuongtrinh')->name('nhapbc.xd-chuong-trinh');
});

Route::group(['prefix' => 'ket-qua-tot-nghiep'], function(){
    Route::get('/', 'ImportReportController@ketquatotnghiep')->name('nhapbc.kq-tot-nghiep');
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