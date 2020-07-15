<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 7/14/20
 * Time: 11:19
 */

use Illuminate\Support\Facades\Route;

Route::get('', 'MangLuoiController@index')->name('mang-luoi.index');
Route::get('tao-moi-co-so-dao-tao', 'MangLuoiController@ViewTaoMoiCoSoDaoTao')->name('mang-luoi.tao-csdt');
Route::post('tao-moi-co-so-dao-tao', 'MangLuoiController@SaveTaoMoiCoSoDaoTao');