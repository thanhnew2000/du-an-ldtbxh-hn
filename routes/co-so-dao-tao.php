<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:13
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'CoSoController@danhsachcosodaotao')->name('csdt.danh-sach');
Route::get('/chi-nhanh', 'CoSoController@danhsachchinhanh')->name('csdt.chi-nhanh');