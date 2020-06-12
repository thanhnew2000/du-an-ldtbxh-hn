<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['permission:them_so_luong_sinh_vien_dang_theo_hoc
                                |sua_so_luong_sinh_vien_dang_theo_hoc
                                |xem_so_luong_sinh_vien_dang_theo_hoc']], function () {
    Route::get('/', 'ExtractController@tonghopsvdanghoc')
    ->name('xuatbc.ds-sv-dang-hoc');

Route::get('/them-so-lieu-sinh-vien', 'ExtractController@add')
    ->name('xuatbc.them-so-sv');
Route::post('/them-so-lieu-sinh-vien', 'ExtractController@saveAdd')
    ->name('xuatbc.them-so-sv');
Route::get('/cap-nhat-so-lieu-sinh-vien/{id}', 'ExtractController@edit')
    ->name('xuatbc.sua-so-sv');
Route::post(
    '/cap-nhat-so-lieu-sinh-vien/{id}','ExtractController@saveEdit'    
)->name('xuatbc.sua-so-lieu-sv');

Route::get('/chi-tiet-so-lieu-sinh-vien/{co_so_id}','ExtractController@tongHopChiTietSvDangTheoHoc')
->name('xuatbc.chi-tiet-so-lieu');
});