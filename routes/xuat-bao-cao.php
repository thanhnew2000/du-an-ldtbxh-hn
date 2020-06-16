<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 5/31/20
 * Time: 00:19
 */

use Illuminate\Support\Facades\Route;

//phucnv - Tổng hợp đội ngũ nhà giáo
Route::group(['prefix' => 'doi-ngu-nha-giao'], function () {
    Route::get('/tong-hop', 'ExtractController@danhsachnhagiao')
        ->name('xuatbc.ds-nha-giao');

    Route::get('/them-ds-nha-giao', 'ExtractController@themDanhSachDoiNguNhaGiao')
        ->name('xuatbc.them-ds-nha-giao');
    Route::post('/them-ds-nha-giao', 'ExtractController@saveDanhSachDoiNguNhaGiao');

    Route::get(
        '/sua-ds-nha-giao/{id}',
        'ExtractController@suaDanhSachDoiNguNhaGiao'
    )
        ->name('xuatbc.sua-ds-nha-giao');
    Route::post(
        '/sua-ds-nha-giao/{id}',
        'ExtractController@updateDanhSachDoiNguNhaGiao'
    );

    Route::get('/nganhnghe/{co_so_id}', 'ExtractController@layNganhNgheTheoCoSo')->name('xuatbc.lay-nganh-nghe-theo-co-so');

    Route::get('/chitiet/{co_so_id}', 'ExtractController@chiTietTheoCoSo')->name("xuatbc.chi-tiet-theo-co-so");
    Route::post('export', 'ExtractController@export')->name('doi-ngu-nha-giao.export');
    Route::post('export-bieu-mau', 'ExtractController@exportBieuMau')
        ->name('doi-ngu-nha-giao.export-bieu-mau');
    Route::post('import', 'ExtractController@import')
        ->name('doi-ngu-nha-giao.import');
});
//end phucnv - Tổng hợp đội ngũ nhà giáo


Route::group(['prefix' => 'doi-ngu-quan-ly'], function () {
    Route::get(
        '/tong-hop',
        'ExtractController@danhsachquanly'
    )

        ->name('xuatbc.ds-quan-ly');
});

// cuong nc - tổng hợp sinh viên đang theo học
Route::group(['prefix' => 'so-lieu-sinh-vien-dang-theo-hoc'], function () {
    Route::get('/', 'ExtractController@tonghopsvdanghoc')
        ->name('xuatbc.ds-sv-dang-hoc');

    Route::get('/them-so-lieu-sinh-vien', 'ExtractController@add')
        ->name('xuatbc.them-so-sv');
    Route::post('/them-so-lieu-sinh-vien', 'ExtractController@saveAdd')
        ->name('xuatbc.them-so-sv');
    Route::get('/cap-nhat-so-lieu-sinh-vien/{id}', 'ExtractController@edit')
        ->name('xuatbc.sua-so-sv');
    Route::post(
        '/cap-nhat-so-lieu-sinh-vien/{id}',
        'ExtractController@saveEdit'
    )->name('xuatbc.sua-so-lieu-sv');

    Route::get('/chi-tiet-so-lieu-sinh-vien/{co_so_id}', 'ExtractController@tongHopChiTietSvDangTheoHoc')
        ->name('xuatbc.chi-tiet-so-lieu');


    // thanhnv tai bieu mau
    Route::post('/tai-bieu-mau-hs-dang-ql', 'ExportHsQlController@taiBieuMau')
        ->name('export.bieumau.hsdql');

    Route::post('/xuat-du-lieu-hs-dang-ql', 'ExportHsQlController@exportData')
        ->name('export.data.hsql');
});
// end cuong nc - tổng hợp sinh viên đang theo học

//Xuân - Chính sách sinh viên
Route::group(['prefix' => 'chinh-sach-sinh-vien'], function () {
    Route::get(
        '/tong-hop',
        'ExtractController@tonghopchinhsachsv'
    )
        ->name('xuatbc.ds-chinh-sach-sv');
    Route::get('/tong-hop-chinh-sach-sinh-vien', 'ChinhSachSinhVienController@tonghopchinhsachsinhvien')
        ->name('xuatbc.tong-hop-chinh-sach-sinh-vien');

    Route::get('/them-chinh-sach-sinh-vien', 'ChinhSachSinhVienController@themchinhsachsinhvien')
        ->name('xuatbc.them-chinh-sach-sinh-vien');
    Route::post('/them-chinh-sach-sinh-vien', 'ChinhSachSinhVienController@postthemchinhsachsinhvien')
        ->name('xuatbc.post-them-chinh-sach-sinh-vien');

    Route::get('/sua-chinh-sach-sinh-vien/{id}', 'ChinhSachSinhVienController@suachinhsachsinhvien')
        ->name('xuatbc.sua-chinh-sach-sinh-vien');
    Route::post('/sua-chinh-sach-sinh-vien/{id}', 'ChinhSachSinhVienController@postsuachinhsachsinhvien')
        ->name('xuatbc.post-sua-chinh-sach-sinh-vien');


    // thanhnv import export
    Route::post('export-bieu-mau-chinh-sach-sv','ExportChinhSachSinhVienController@exportBieuMau')
    ->name('layformbieumau.cs.sinhvien');
    Route::post('export-data-chinh-sach-sv','ExportChinhSachSinhVienController@exportData')
    ->name('exportdata.bieumau.cs.sinhvien');

});
//END Xuân - Chính sách sinh viên

Route::group(['prefix' => 'ket-qua-tuyen-sinh'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopkqtuyensinh')
        ->name('xuatbc.ds-ket-qua-ts');
    // thanhnv thêm xuất form nhập cho người dùng nhập Import
    Route::post('form-nhap-sv', 'ExportSVController@exportFormNhapSinhVien')->name('layformbieumausinhvien');
    //  6/1/2000 Xuất dữ liệu data
    Route::post('export-data-sv', 'ExportSVController@exportDataSV')->name('exportdatatuyensinh');
    Route::get('/tong-hop-so-lieu-tuyen-sinh', 'SoLieuTuyenSinhController@index')->name('solieutuyensinh');
    Route::post('/co-so-tuyen-sinh-theo-loai-hinh', 'SoLieuTuyenSinhController@getCoSoTuyenSinhTheoLoaiHinh')->name('csTuyenSinhTheoLoaiHinh');
    Route::post('/xa-phuong-theo-quan-huyen', 'SoLieuTuyenSinhController@getXaPhuongTheoQuanHuyen')->name('getXaPhuongTheoQuanHuyen');
    Route::get('/chi-tiet-so-lieu-tuyen-sinh/{co_so_id}', 'SoLieuTuyenSinhController@chitietsolieutuyensinh')->name('chitietsolieutuyensinh');
    Route::get('/sua-so-lieu-tuyen-sinh/{id}', 'SoLieuTuyenSinhController@edit')->middleware('checkStatusUpdateSoLieuTuyenSinh')->name('suasolieutuyensinh');
    Route::post('/sua-so-lieu-tuyen-sinh/{id}/edit', 'SoLieuTuyenSinhController@update')->name('postsuasolieutuyensinh');
    Route::get('/them-so-lieu-tuyen-sinh', 'SoLieuTuyenSinhController@create')->name('themsolieutuyensinh');
    Route::post('/them-so-lieu-tuyen-sinh', 'SoLieuTuyenSinhController@store')->name('postthemsolieutuyensinh');
    Route::post('/get-ma-nganh-nghe', 'SoLieuTuyenSinhController@getmanganhnghe')->name('get_ma_nganh_nghe');
    Route::post('/check-them-so-lieu-tuyen-sinh', 'SoLieuTuyenSinhController@getCheckTonTaiSoLieuTuyenSinh')->name('so_lieu_tuyen_sinh.check_so_lieu');
    Route::post('/get-nghe-theo-cap-bac', 'SoLieuTuyenSinhController@getNgheTheoCapBac')->name('getNgheTheoCapBac');
    // Route::post('/get-nghe-cap-4-theo-cap-3','SoLieuTuyenSinhController@getNgheCap4TheoCap3')->name('getNgheCap4TheoCap3');


});


Route::group(['prefix' => 'ket-qua-xay-dung-giao-trinh'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopxdchuongtrinh')

        ->name('xuatbc.ds-xd-giao-trinh');
});


Route::group(['prefix' => 'ket-qua-tot-nghiep'], function () {
    Route::get('/', 'SinhVienTotNghiepController@index')
        ->name('xuatbc.ds-tot-nghiep');
    Route::get('/chi-tiet-tong-hop-ket-qua-tot-nghiep/{id}', 'SinhVienTotNghiepController@show')
        ->name('xuatbc.chi-tiet-tong-hop');
    Route::get('/sua-tong-hop-ket-qua-tot-nghiep/{id}', 'SinhVienTotNghiepController@edit')
        ->name('xuatbc.sua-tong-hop');
    Route::post('/sua-tong-hop-ket-qua-tot-nghiep/{id}', 'SinhVienTotNghiepController@update')
        ->name('xuatbc.post_sua-tong-hop');
    Route::get('/them-tong-hop-ket-qua-tot-nghiep', 'SinhVienTotNghiepController@create')
        ->name('xuatbc.them-tong-hop');
    Route::post('/them-tong-hop-ket-qua-tot-nghiep', 'SinhVienTotNghiepController@store')
        ->name('xuatbc.post-them-tong-hop');
    Route::post('/check-them-so-lieu-tot-nghiep', 'SinhVienTotNghiepController@getCheckTonTaiSoLieuTotNghiep')->name('xuatbc.check_so_lieu_tot_nghiep');

    // thanhnv import export
    Route::post('/export-bieu-mau-kqtn', 'ExportKqTotNghiepController@taiBieuMau')
        ->name('layformbieumautotnghiep');
    Route::post('export-data-kq-tot-nghiep', 'ExportKqTotNghiepController@exportDataTotNghiep')
        ->name('exportdatatotnghiep');
});


Route::group(['prefix' => 'dao-tao-nghe-nguoi-khuyet-tat'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaonguoikhuyettat')

        ->name('xuatbc.ds-dao-tao-khuyet-tat');
});

Route::group(['prefix' => 'dao-tao-nghe-thanh-nien'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaothanhnien')

        ->name('xuatbc.ds-dao-tao-thanh-nien');
});


Route::group(['prefix' => 'dao-tao-nghe-thanh-nien'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaothanhnien')

        ->name('xuatbc.ds-dao-tao-thanh-nien');
});


Route::group(['prefix' => 'dao-tao-voi-doanh-nghiep'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaovoidoanhnghiep')

        ->name('xuatbc.ds-dao-tao-voi-doanh-nghiep');
});



// Xuân liên kết đào tạo
Route::group(['prefix' => 'lien-ket-dao-tao'], function () {
    Route::get('/tong-hop-lien-ket-dao-tao', 'LienKetDaoTaoController@tonghoplienketdaotao')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao');
    Route::get('/tong-hop-lien-ket-dao-tao-cao-dang-len-dai-hoc', 'LienKetDaoTaoController@tonghoplienketdaotaocaodanglendaihoc')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao-cao-dang-len-dai-hoc');
    Route::get('/tong-hop-lien-ket-dao-tao-trung-cap-len-dai-hoc', 'LienKetDaoTaoController@tonghoplienketdaotaotrungcaplendaihoc')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao-trung-cap-len-dai-hoc');
});
// End Xuân

//phucnv BM:13 
Route::group(['prefix' => 'hop-tac-quoc-te'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghophoptacquocte')
        ->name('xuatbc.ds-hop-tact-qte');

    Route::get('/chi-tiet/{co_so_id}', 'ExtractController@chiTietTongHopHopTacQuocTe')
        ->name('xuatbc.chi-tiet-ds-hop-tact-qte');

    Route::get('/them', 'ExtractController@themTongHopHopTacQuocTe')
        ->name('xuatbc.them-ds-hop-tact-qte');
    Route::post('/them', 'ExtractController@saveTongHopHopTacQuocTe');    

    Route::get('/sua', 'ExtractController@suaTongHopHopTacQuocTe')
        ->name('xuatbc.sua-ds-hop-tact-qte');
});
//phucnv end BM:13


Route::group(['prefix' => 'chi-tieu-tuyen-sinh'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghoptuyensinh')

        ->name('xuatbc.ds-chi-tieu-ts');
});

// thanhvn import export can bo quan ly
Route::group(['prefix' => 'so-lieu-can-bo-quan-ly'], function () {
    Route::post('export-bieu-mau', 'ExportSoLieuCanBoQlController@taiBieuMau')
        ->name('layformbieumau.solieucanbo.quanly');
    Route::post('export-data-so-lieu-can-bo-quanly', 'ExportSoLieuCanBoQlController@exportDataSoLieuCanBoQuanLy')
        ->name('exportdata.solieucanbo.quanly');
});
