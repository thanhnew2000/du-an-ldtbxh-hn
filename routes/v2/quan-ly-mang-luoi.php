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
});