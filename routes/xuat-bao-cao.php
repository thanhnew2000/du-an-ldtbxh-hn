<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:19
 */

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'doi-ngu-nha-giao'], function(){
    Route::get('/tong-hop',
        'ExtractController@danhsachnhagiao')

        ->name('xuatbc.ds-nha-giao');

    Route::get('/them-ds-nha-giao',
        'ExtractController@themDanhSachDoiNguNhaGiao')
        ->name('xuatbc.them-ds-nha-giao');  
    Route::get('/sua-ds-nha-giao',
        'ExtractController@suaDanhSachDoiNguNhaGiao')
        ->name('xuatbc.sua-ds-nha-giao');   
        
});


Route::group(['prefix' => 'doi-ngu-quan-ly'], function(){
    Route::get('/tong-hop',
        'ExtractController@danhsachquanly')

        ->name('xuatbc.ds-quan-ly');
});

// cuong nc - tổng hợp sinh viên đang theo học
Route::group(['prefix' => 'so-lieu-sinh-vien-dang-theo-hoc'], function () {
    Route::get('/', 'ExtractController@tonghopsvdanghoc')
        ->name('xuatbc.ds-sv-dang-hoc');

    Route::get('/them-so-lieu-sinh-vien', 'ExtractController@add')
        ->name('xuatbc.them-so-sv');
    Route::post('/them-so-lieu-sinh-vien', 'ExtractController@saveAdd');

    Route::get('/cap-nhat-so-lieu-sinh-vien/{id}', 'ExtractController@edit')
        ->name('xuatbc.sua-so-sv');
    Route::post(
        '/cap-nhat-so-lieu-sinh-vien/{id}','ExtractController@saveEdit'    
    )->name('xuatbc.sua-so-sv');

    Route::get('/chi-tiet-so-lieu-sinh-vien/{co_so_id}','ExtractController@tongHopChiTietSvDangTheoHoc')
    ->name('xuatbc.chi-tiet-so-lieu');
});
// end cuong nc - tổng hợp sinh viên đang theo học

Route::group(['prefix' => 'chinh-sach-sinh-vien'], function(){
    Route::get('/tong-hop',
        'ExtractController@tonghopchinhsachsv')
        ->name('xuatbc.ds-chinh-sach-sv');
});

Route::group(['prefix' => 'ket-qua-tuyen-sinh'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghopkqtuyensinh')

        ->name('xuatbc.ds-ket-qua-ts');
    Route::get('/tong-hop-so-lieu-tuyen-sinh','SoLieuTuyenSinh@tonghopsolieutuyensinh')->name('solieutuyensinh');
    Route::get('/search-co-so-so-lieu-tuyen-sinh','SoLieuTuyenSinh@searchCoSoTongHopSoLieuTuyenSinh')->name('searchCoSoTongHopSoLieuTuyenSinh');
    Route::get('/chi-tiet-so-lieu-tuyen-sinh/{id}','SoLieuTuyenSinh@chitietsolieutuyensinh')->name('chitietsolieutuyensinh');
    Route::get('/sua-so-lieu-tuyen-sinh/{id}','SoLieuTuyenSinh@suasolieutuyensinh')->name('suasolieutuyensinh');
    Route::post('/sua-so-lieu-tuyen-sinh/{id}/edit','SoLieuTuyenSinh@postsuasolieutuyensinh')->name('postsuasolieutuyensinh');
    Route::get('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@themsolieutuyensinh')->name('themsolieutuyensinh');
    Route::post('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@postthemsolieutuyensinh')->name('postthemsolieutuyensinh');
    Route::post('/get-ma-nganh-nghe','SoLieuTuyenSinh@getmanganhnghe');
    
    // thanhnv thêm xuất form nhập cho người dùng nhập Import
    Route::post('form-nhap-sv','ExportSVController@exportFormNhapSinhVien')->name('layformbieumausinhvien');
    //  6/1/2000 Xuất dữ liệu data 
    Route::post('export-data-sv','ExportSVController@exportDataSV')->name('exportdatatuyensinh');



    Route::get('/tong-hop-so-lieu-tuyen-sinh','SoLieuTuyenSinh@tonghopsolieutuyensinh')->name('solieutuyensinh');
    Route::post('/co-so-tuyen-sinh-theo-loai-hinh','SoLieuTuyenSinh@getCoSoTuyenSinhTheoLoaiHinh')->name('csTuyenSinhTheoLoaiHinh');
    Route::post('/xa-phuong-theo-quan-huyen','SoLieuTuyenSinh@getXaPhuongTheoQuanHuyen')->name('getXaPhuongTheoQuanHuyen');
    Route::get('/search-co-so-so-lieu-tuyen-sinh','SoLieuTuyenSinh@searchCoSoTongHopSoLieuTuyenSinh')->name('searchCoSoTongHopSoLieuTuyenSinh');
    Route::get('/chi-tiet-so-lieu-tuyen-sinh/{co_so_id}','SoLieuTuyenSinh@chitietsolieutuyensinh')->name('chitietsolieutuyensinh');
    Route::get('/sua-so-lieu-tuyen-sinh/{id}','SoLieuTuyenSinh@suasolieutuyensinh')->name('suasolieutuyensinh');
    Route::post('/sua-so-lieu-tuyen-sinh/{id}/edit','SoLieuTuyenSinh@postsuasolieutuyensinh')->name('postsuasolieutuyensinh');
    Route::get('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@themsolieutuyensinh')->name('themsolieutuyensinh');
    Route::post('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@postthemsolieutuyensinh')->name('postthemsolieutuyensinh');
    Route::post('/get-ma-nganh-nghe','SoLieuTuyenSinh@getmanganhnghe');
    Route::post('/check-them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@getCheckTonTaiSoLieuTuyenSinh');


});


Route::group(['prefix' => 'ket-qua-xay-dung-giao-trinh'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghopxdchuongtrinh')

        ->name('xuatbc.ds-xd-giao-trinh');
});


Route::group(['prefix' => 'ket-qua-tot-nghiep'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghopkqtotnghiep')

        ->name('xuatbc.ds-tot-nghiep');
});


Route::group(['prefix' => 'dao-tao-nghe-nguoi-khuyet-tat'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaonguoikhuyettat')

        ->name('xuatbc.ds-dao-tao-khuyet-tat');
});

Route::group(['prefix' => 'dao-tao-nghe-thanh-nien'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaothanhnien')

        ->name('xuatbc.ds-dao-tao-thanh-nien');
});


Route::group(['prefix' => 'dao-tao-voi-doanh-nghiep'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaovoidoanhnghiep')

        ->name('xuatbc.ds-dao-tao-voi-doanh-nghiep');
});


Route::group(['prefix' => 'hop-tac-quoc-te'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghophoptacquocte')

        ->name('xuatbc.ds-hop-tact-qte');
});

Route::group(['prefix' => 'chi-tieu-tuyen-sinh'], function(){
    Route::get('/tong-hop', 'ExtractController@tonghoptuyensinh')

        ->name('xuatbc.ds-chi-tieu-ts');
});