<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:13
 */

use Illuminate\Support\Facades\Route;

    Route::group(['middleware' => ['permission:them_moi_co_so_dao_tao|xem_chi_tiet_co_so_dao_tao|cap_nhat_co_so_dao_tao|
                                    them_moi_dia_diem_dao_tao|cap_nhat_dia_diem_dao_tao|xoa_dia_diem_dao_tao']], function () {

    Route::get('/', 'CoSoDaoTaoController@danhsachCSDT')->name('csdt.danh-sach');
    Route::get('tao-moi-co-so', 'CoSoDaoTaoController@themCSDT')->name('csdt.tao-moi');
    Route::post('tao-moi-co-so', 'CoSoDaoTaoController@taomoiCSDT');
    Route::get('chi-tiet-co-so/{id}', 'CoSoDaoTaoController@chitietCSDT')->name('csdt.chi-tiet');
    Route::get('cap-nhat-co-so/{id}', 'CoSoDaoTaoController@suaCSDT')->name('csdt.cap-nhat');
    Route::post('cap-nhat-co-so/{id}', 'CoSoDaoTaoController@capnhatCSDT');
    Route::get('danh-sach-dia-diem-dao-tao/{id?}', 'ChiNhanhController@danhsachchinhanh')->name('csdt.chi-nhanh');
    Route::get('tao-moi-dia-diem-dao-tao', 'ChiNhanhController@themchinhanh')->name('chi-nhanh.tao-moi');
    Route::post('tao-moi-dia-diem-dao-tao', 'ChiNhanhController@savethemchinhanh');
    Route::get('/cap-nhat-dia-diem-dao-tao/{id}', 'ChiNhanhController@suachinhanh')->name('chi-nhanh.cap-nhat');
    Route::post('/cap-nhat-dia-diem-dao-tao/{id}', 'ChiNhanhController@capnhatchinhanh');
    Route::post('/xoa-dia-diem-dao-tao/{id}', 'ChiNhanhController@xoachinhanh')->name('chi-nhanh.xoa');
    Route::post('/them-co-quan-chu-quan', 'CoSoDaoTaoController@addCoQuanChuQuan')->name('co-quan-chu-quan.them');
    Route::post('/them-quyet-dinh-thanh-lap-co-so', 'CoSoDaoTaoController@addQuyetDinh')->name('quyet-dinh.add');
    Route::get('/danh-sach-nganh-nghe-cua-co-so-dao-tao/{csdtid?}', 'NganhNgheController@thietlapnghechocosodaotao')->name('csdt.thiet-lap-nghe-cs');
    });;