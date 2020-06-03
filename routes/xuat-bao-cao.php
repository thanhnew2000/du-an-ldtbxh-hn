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
        'ExtractReportController@danhsachnhagiao')
        ->name('xuatbc.ds-nha-giao');
});

Route::group(['prefix' => 'doi-ngu-quan-ly'], function(){
    Route::get('/tong-hop',
        'ExtractReportController@danhsachquanly')
        ->name('xuatbc.ds-quan-ly');
});

// cuong nc - tổng hợp sinh viên đang theo học
Route::group(['prefix' => 'so-lieu-sinh-vien-dang-theo-hoc'], function(){
    Route::get('/', 'ExtractController@tonghopsvdanghoc')
        ->name('xuatbc.ds-sv-dang-hoc');

    Route::get('/them-so-lieu-sinh-vien', 'ExtractController@add')
        ->name('xuatbc.them-so-sv');
    Route::post('/them-so-lieu-sinh-vien', 'ExtractController@saveAdd');

    Route::get('/cap-nhat-so-lieu-sinh-vien/{id}', 'ExtractController@edit')
        ->name('xuatbc.sua-so-sv');
    Route::post('/cap-nhat-so-lieu-sinh-vien/{id?}',
        'ExtractController@saveEdit')->name('xuatbc.sua-so-sv');
});

// end cuong nc - tổng hợp sinh viên đang theo học
Route::group(['prefix' => 'chinh-sach-sinh-vien'], function(){
    Route::get('/tong-hop',
        'ExtractReportController@tonghopchinhsachsv')
        ->name('xuatbc.ds-chinh-sach-sv');
});

Route::group(['prefix' => 'ket-qua-tuyen-sinh'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghopkqtuyensinh')
        ->name('xuatbc.ds-ket-qua-ts');

    Route::get('/tong-hop-so-lieu-tuyen-sinh','SoLieuTuyenSinh@tonghopsolieutuyensinh')->name('solieutuyensinh');
    Route::get('/search-co-so-so-lieu-tuyen-sinh','SoLieuTuyenSinh@searchCoSoTongHopSoLieuTuyenSinh')->name('searchCoSoTongHopSoLieuTuyenSinh');
    Route::get('/chi-tiet-so-lieu-tuyen-sinh/{nam}/{dot}/{co_so_id}','SoLieuTuyenSinh@chitietsolieutuyensinh')->name('chitietsolieutuyensinh');
    Route::get('/sua-so-lieu-tuyen-sinh/{id}','SoLieuTuyenSinh@suasolieutuyensinh')->name('suasolieutuyensinh');
    Route::post('/sua-so-lieu-tuyen-sinh/{id}/edit','SoLieuTuyenSinh@postsuasolieutuyensinh')->name('postsuasolieutuyensinh');
    Route::get('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@themsolieutuyensinh')->name('themsolieutuyensinh');
    Route::post('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@postthemsolieutuyensinh')->name('postthemsolieutuyensinh');
    Route::post('/get-ma-nganh-nghe','SoLieuTuyenSinh@getmanganhnghe');
    Route::post('/check-them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@getCheckTonTaiSoLieuTuyenSinh');

});

Route::group(['prefix' => 'ket-qua-xay-dung-giao-trinh'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghopxdchuongtrinh')
        ->name('xuatbc.ds-xd-giao-trinh');

});

Route::group(['prefix' => 'ket-qua-tot-nghiep'], function(){
    Route::get('/', 'ExtractController@tonghopkqtotnghiep')
        ->name('xuatbc.ds-tot-nghiep');
    Route::get('/tong-hop-ket-qua-nghiep','ExtractController@tonghopkqtotnghiep')
        ->name('xuatbc.tong-hop-ket-qua-tot-nghiep');
    Route::get('/chi-tiet-tong-hop-ket-qua-tot-nghiep', 'ExtractController@chitiettonghopkqtotnghiep')
        ->name('xuatbc.chi-tiet-tong-hop');  
    Route::get('/sua-tong-hop-ket-qua-tot-nghiep', 'ExtractController@suatonghopkqtotnghiep')
        ->name('xuatbc.sua-tong-hop');  
});

Route::group(['prefix' => 'dao-tao-nghe-nguoi-khuyet-tat'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghopdaotaonguoikhuyettat')
        ->name('xuatbc.ds-dao-tao-khuyet-tat');

});

Route::group(['prefix' => 'dao-tao-nghe-thanh-nien'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghopdaotaothanhnien')
        ->name('xuatbc.ds-dao-tao-thanh-nien');

});

Route::group(['prefix' => 'dao-tao-voi-doanh-nghiep'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghopdaotaovoidoanhnghiep')
        ->name('xuatbc.ds-dao-tao-voi-doanh-nghiep');

});

Route::group(['prefix' => 'hop-tac-quoc-te'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghophoptacquocte')
        ->name('xuatbc.ds-hop-tact-qte');

});

Route::group(['prefix' => 'chi-tieu-tuyen-sinh'], function(){
    Route::get('/tong-hop', 'ExtractReportController@tonghoptuyensinh')
        ->name('xuatbc.ds-chi-tieu-ts');

});
