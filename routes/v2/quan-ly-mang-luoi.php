<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 7/14/20
 * Time: 11:19
 */

use Illuminate\Support\Facades\Route;

Route::get('', 'MangLuoiController@index')->name('mang-luoi.index');
Route::get('tao-moi-co-so-dao-tao', 'CoSoDaoTaoController@create')->name('mang-luoi.tao-csdt');

Route::group(['prefix' => 'giay-phep-hoat-dong'], function () {
    Route::get('/', 'QuanLyGiayPhepHoatDongController@index')->name('giay-phep-hoat-dong.index');
    Route::get('/create', 'QuanLyGiayPhepHoatDongController@create')->name('giay-phep-hoat-dong.create');
    Route::get('/edit', 'QuanLyGiayPhepHoatDongController@edit')->name('giay-phep-hoat-dong.edit');
    Route::get('/thu-hoi', 'QuanLyGiayPhepHoatDongController@thuHoi')->name('giay-phep-hoat-dong.thuhoi');

    Route::post('/get-giay-phep', 'QuanLyGiayPhepHoatDongController@getGiayPhep')->name('giay-phep-hoat-dong.get-giay-phep');
    Route::post('/get-giay-phep-id', 'QuanLyGiayPhepHoatDongController@getGiayPhepId')->name('giay-phep-hoat-dong.get-giay-phep-id');
    Route::post('/store', 'QuanLyGiayPhepHoatDongController@store')->name('giay-phep-hoat-dong.store');
    Route::post('/update', 'QuanLyGiayPhepHoatDongController@update')->name('giay-phep-hoat-dong.update');
});

Route::group(['prefix' => 'giay-chung-nhan-dao-tao-nghe'], function () {
    // Route::get('/', 'QuanLyGiayChungNhanDaoTaoNgheController@index')->name('giay-chung-nhan-dao-tao-nghe.index');
    Route::get('/create', 'QuanLyGiayChungNhanDaoTaoNgheController@create')->name('giay-chung-nhan-dao-tao-nghe.create');
    Route::get('/edit', 'QuanLyGiayChungNhanDaoTaoNgheController@edit')->name('giay-chung-nhan-dao-tao-nghe.edit');
    // Route::get('/thu-hoi', 'QuanLyGiayChungNhanDaoTaoNgheController@thuHoi')->name('giay-chung-nhan-dao-tao-nghe.thuhoi');

    Route::post('/get-giay-phep', 'QuanLyGiayChungNhanDaoTaoNgheController@getGiayPhep')->name('giay-chung-nhan-dao-tao-nghe.get-giay-phep');
    Route::post('/get-giay-phep-id', 'QuanLyGiayChungNhanDaoTaoNgheController@getGiayPhepId')->name('giay-chung-nhan-dao-tao-nghe.get-giay-phep-id');
    Route::post('/store', 'QuanLyGiayChungNhanDaoTaoNgheController@store')->name('giay-chung-nhan-dao-tao-nghe.store');
    Route::post('/update', 'QuanLyGiayChungNhanDaoTaoNgheController@update')->name('giay-chung-nhan-dao-tao-nghe.update');
    Route::post('/update-nghe', 'QuanLyGiayChungNhanDaoTaoNgheController@updateNghe')->name('giay-chung-nhan-dao-tao-nghe.update-nghe');
});


Route::get('tao-moi-co-so-dao-tao', 'MangLuoiController@ViewTaoMoiCoSoDaoTao')->name('mang-luoi.tao-csdt');
Route::post('tao-moi-co-so-dao-tao', 'MangLuoiController@SaveTaoMoiCoSoDaoTao');
