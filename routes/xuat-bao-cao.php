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
    Route::post('/check-ton-tai-chinh-sach-sinh-vien', 'ChinhSachSinhVienController@checktontaichinhsachsinhvien')
        ->name('xuatbc.check-ton-tai-chinh-sach-sinh-vien');
    Route::post('/get-chinh-sach', 'ChinhSachSinhVienController@getchinhsach')
        ->name('get-chinh-sach');

    Route::get('/sua-chinh-sach-sinh-vien/{id}', 'ChinhSachSinhVienController@suachinhsachsinhvien')
        ->name('xuatbc.sua-chinh-sach-sinh-vien');
    Route::post('/sua-chinh-sach-sinh-vien/{id}', 'ChinhSachSinhVienController@postsuachinhsachsinhvien')
        ->name('xuatbc.post-sua-chinh-sach-sinh-vien');


    // thanhnv import export
    Route::post('export-bieu-mau-chinh-sach-sv', 'ExportChinhSachSinhVienController@exportBieuMau')
        ->name('layformbieumau.cs.sinhvien');
    Route::post('export-data-chinh-sach-sv', 'ExportChinhSachSinhVienController@exportData')
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

//phucnv BM:12
Route::group(['prefix' => 'ket-qua-xay-dung-giao-trinh'], function () {
    Route::get('/tong-hop', 'XayDungChuongTrinhGiaoTrinhController@index')
        ->name('xuatbc.ds-xd-giao-trinh');

    Route::get('/show/{co_so_id}', 'XayDungChuongTrinhGiaoTrinhController@show')
        ->name('xuatbc.show-ds-xd-giao-trinh');

    Route::get('/create', 'XayDungChuongTrinhGiaoTrinhController@create')
        ->name('xuatbc.create-ds-xd-giao-trinh');
    Route::post('/store', 'XayDungChuongTrinhGiaoTrinhController@store')
        ->name('xuatbc.store-ds-xd-giao-trinh');

    Route::get('/{id}/edit', 'XayDungChuongTrinhGiaoTrinhController@edit')
        ->name('xuatbc.edit-ds-xd-giao-trinh');
    Route::post('/update/{id}', 'XayDungChuongTrinhGiaoTrinhController@update')
        ->name('xuatbc.update-ds-xd-giao-trinh');
        
});
//end phuc BM:12


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
    // thanhnv export 6/18/2020
    Route::post('export-form-nhap-dao-tao-khuyet-tat', 'DaoTaoNgheChoNguoiKhuyetTatController@exportForm')->name('layformbieumau-dao-tao-khuyet-tat');
    Route::post('export-data-dao-tao-khuyet-tat', 'DaoTaoNgheChoNguoiKhuyetTatController@exportData')->name('exportdata-dao-tao-khuyet-tat');
});

Route::group(['prefix' => 'dao-tao-nghe-thanh-nien'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaothanhnien')
        ->name('xuatbc.ds-dao-tao-thanh-nien');

    // thanhnv import export dao tao nghe thanh nien

    Route::post('export-form-nhap-dao-tao-thanh-nien', 'DaoTaoNgheThanhNienController@exportForm')->name('layformbieumau-dao-tao-thanh-nien');
    Route::post('export-data-dao-tao-thanh-nien', 'DaoTaoNgheThanhNienController@exportData')->name('exportdata-dao-tao-thanh-nien');
});


Route::group(['prefix' => 'dao-tao-nghe-thanh-nien'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghopdaotaothanhnien')

        ->name('xuatbc.ds-dao-tao-thanh-nien');
});

// quảng tuyển sinh đòa tạo với doanh nghiệp
Route::group(['prefix' => 'dao-tao-voi-doanh-nghiep'], function () {
    Route::get('/tong-hop', 'DaoTaoNgheVoiDoanhNghiepController@index')

        ->name('xuatbc.ds-dao-tao-voi-doanh-nghiep');
    Route::get('create', 'DaoTaoNgheVoiDoanhNghiepController@create')->name('xuatbc.dao-tao-nghe-doanh-nghiep.create');
    Route::post('store', 'DaoTaoNgheVoiDoanhNghiepController@store')->name('xuatbc.dao-tao-nghe-doanh-nghiep.store');
    Route::get('edit/{id}', 'DaoTaoNgheVoiDoanhNghiepController@edit')->name('xuatbc.dao-tao-nghe-doanh-nghiep.edit');
    Route::post('update/{id}', 'DaoTaoNgheVoiDoanhNghiepController@update')->name('xuatbc.dao-tao-nghe-doanh-nghiep.update');
    Route::get('show/{id}', 'DaoTaoNgheVoiDoanhNghiepController@show')->name('xuatbc.dao-tao-nghe-doanh-nghiep.show');

    // thanhnv 6/22/2020
    Route::post('export-bieu-mau-dao-tao-nghe-gan-voi-doanh-nghiep', 'DaoTaoNgheVoiDoanhNghiepController@exportBieuMau')
        ->name('layformbieumau.dao-tao-nghe-gan-voi-doanh-nghiep');
    Route::post('export-data-dao-tao-nghe-gan-voi-doanh-nghiep', 'DaoTaoNgheVoiDoanhNghiepController@exportData')
        ->name('exportdata.dao-tao-nghe-gan-voi-doanh-nghiep');
    // quang
    Route::post('/check-them-dao-tao-cho-nghe-voi-doanh-nghiep', 'DaoTaoNgheVoiDoanhNghiepController@getCheckTonTaiDaoTaoGanVoiDoanhNghiep')->name('xuatbc.dao-tao-nghe-doanh-nghiep.check_so_lieu');
});



// Xuân liên kết đào tạo
Route::group(['prefix' => 'lien-ket-dao-tao'], function () {
    Route::get('/tong-hop-lien-ket-dao-tao', 'LienKetDaoTaoController@tonghoplienketdaotao')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao');
    Route::get('/tong-hop-lien-ket-dao-tao-trinh-do-cao-dang-len-dai-hoc/bac_nghe{id}', 'LienKetDaoTaoController@tonghoplienketdaotaotheotrinhdo')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao-cao-dang');
    Route::get('/tong-hop-lien-ket-dao-tao-trinh-do-trung-cap-len-dai-hoc/bac_nghe{id}', 'LienKetDaoTaoController@tonghoplienketdaotaotheotrinhdo')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao-trung-cap');

    Route::get('/them-lien-ket-dao-tao', 'LienKetDaoTaoController@themlienketdaotao')
        ->name('xuatbc.them-lien-ket-dao-tao');
    Route::post('/them-lien-ket-dao-tao', 'LienKetDaoTaoController@postthemlienketdaotao')
        ->name('xuatbc.post-them-lien-ket-dao-tao');
    Route::post('/check-ton-tai-lien-ket-dao-tao', 'LienKetDaoTaoController@getCheckTonTaiLienKetDaoTao')
        ->name('xuatbc.check-ton-tai-lien-ket-dao-tao');

    Route::get('/chi-tiet-lien-ket-dao-tao/{co_so_id}/{bac_nghe}', 'LienKetDaoTaoController@chitietlienketdaotao')
        ->name('xuatbc.chi-tiet-lien-ket-dao-tao');

    Route::get('/sua-lien-ket-dao-tao/{id}/{bac_nghe}', 'LienKetDaoTaoController@sualienketdaotao')
        ->name('xuatbc.sua-lien-ket-dao-tao');
    Route::post('/sua-lien-ket-dao-tao/{id}/{bac_nghe}/{co_so_id}', 'LienKetDaoTaoController@postsualienketdaotao')
        ->name('xuatbc.post-sua-lien-ket-dao-tao');

    Route::post('/tong-hop-lien-ket-dao-tao-get-ma-nganh-nghe', 'LienKetDaoTaoController@getmanganhnghe')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao-get-ma-nganh-nghe');
    Route::post('/tong-hop-lien-ket-dao-tao-get-nghe-theo-cap-bac', 'LienKetDaoTaoController@getNgheTheoCapBac')
        ->name('xuatbc.tong-hop-lien-ket-dao-tao-get-nghe-theo-cap-bac');

    // thanhvn export 6/19/2020

    Route::post('export-form-nhap-lien-ket-dao-tao', 'LienKetDaoTaoController@exportForm')->name('layformbieumau-lien-ket-dao-tao');
    Route::post('export-data-lien-ket-dao-tao', 'LienKetDaoTaoController@exportData')->name('exportdata-lien-ket-dao-tao');
});
// End Xuân

//phucnv BM:13 
Route::group(['prefix' => 'hop-tac-quoc-te'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghophoptacquocte')
        ->name('xuatbc.ds-hop-tact-qte');

    Route::get('/chi-tiet/{co_so_id}', 'ExtractController@chiTietTongHopHopTacQuocTe')
        ->name('xuatbc.chi-tiet-ds-hop-tac-qte');

    Route::get('/them', 'ExtractController@themTongHopHopTacQuocTe')
        ->name('xuatbc.them-ds-hop-tac-qte');
    Route::post('/them', 'ExtractController@saveTongHopHopTacQuocTe');

    Route::get('/sua/{id}', 'ExtractController@suaTongHopHopTacQuocTe')
        ->name('xuatbc.sua-ds-hop-tac-qte');
    Route::post('/sua/{id}', 'ExtractController@updateTongHopHopTacQuocTe');

    // thanhnv 6/21/2020

    Route::post('export-bieu-mau-hop-tac-quoc-te', 'ExtractController@exportBieuMaubm13')
        ->name('layformbieumau.hop-tac-quoc-te');
    Route::post('export-data-chinh-sach-sv', 'ExtractController@exportDatabm13')
        ->name('exportdata.bieumau.hop-tac-quoc-ten');
});
//phucnv end BM:13


//phucnv BM:8 
Route::group(['prefix' => 'chi-tieu-tuyen-sinh'], function () {
    Route::get('/tong-hop', 'ExtractController@tonghoptuyensinh')
        ->name('xuatbc.ds-chi-tieu-ts');

    Route::get('/them', 'ExtractController@themChiTieuTuyenSinh')
        ->name('xuatbc.them-dang-ky-chi-tieu-tuyen-sinh');
    Route::post('/them', 'ExtractController@saveChiTieuTuyenSinh');

    Route::get('/sua/{id}', 'ExtractController@suaChiTieuTuyenSinh')
        ->name('xuatbc.sua-dang-ky-chi-tieu-tuyen-sinh');
    Route::post('/sua/{id}', 'ExtractController@updateChiTieuTuyenSinh');

    Route::get('/chi-tiet/{co_so_id}', 'ExtractController@chitietChiTieuTuyenSinh')
        ->name('xuatbc.chi-tiet-dang-ky-chi-tieu-tuyen-sinh'); 

    // thanhnv export bm8
    Route::post('export-form-dang-ky-chi-tieu-tuyen-sinh', 'ExtractController@exportFormBm8')->name('layformbieumau-dang-ky-chi-tieu-tuyen-sinh');
    Route::post('export-data-dang-ky-chi-tieu-tuyen-sinh', 'ExtractController@exportDataBm8')->name('exportdata-dang-ky-chi-tieu-tuyen-sinh');
});
//phucnv end BM:8

// thanhvn import export can bo quan ly
Route::group(['prefix' => 'so-lieu-can-bo-quan-ly'], function () {
    Route::post('export-bieu-mau', 'ExportSoLieuCanBoQlController@taiBieuMau')
        ->name('layformbieumau.solieucanbo.quanly');
    Route::post('export-data-so-lieu-can-bo-quanly', 'ExportSoLieuCanBoQlController@exportDataSoLieuCanBoQuanLy')
        ->name('exportdata.solieucanbo.quanly');
});

//Xuân Kết quả tốt nghiệp gắn với doanh nghiệp BM:15
Route::group(['prefix' => 'ket-qua-tot-nghiep-gan-voi-doanh-nghiep'], function () {
    Route::get('/', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@index')
        ->name('xuatbc.ket-qua-tot-nghiep-voi-doanh-nghiep');
    Route::get('show/{co_so_id}', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@show')
        ->name('xuatbc.chi-tiet-ket-qua-tot-nghiep-voi-doanh-nghiep');

    Route::get('edit/{id}', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@edit')
        ->name('xuatbc.sua-ket-qua-tot-nghiep-voi-doanh-nghiep');
    Route::post('update/{id}/{co_so_id}', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@update')
        ->name('xuatbc.post-sua-ket-qua-tot-nghiep-voi-doanh-nghiep');

    Route::get('create', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@create')
        ->name('xuatbc.them-ket-qua-tot-nghiep-voi-doanh-nghiep');
    Route::post('store', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@store')
        ->name('xuatbc.post-them-ket-qua-tot-nghiep-voi-doanh-nghiep');

    Route::post('checktontai', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@getCheckTonTai')
        ->name('xuatbc.check-ton-tai');


        // thanhnv 6/22/2020 tot nghiep va doanh nghiep 
    Route::post('export-bieu-mau-ket-qua-tot-nghiep-gan-voi-doanh-nghiep', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@exportBieuMau')
        ->name('layformbieumau.ket-qua-tot-nghiep-gan-voi-doanh-nghiep');
    Route::post('export-data-ket-qua-tot-nghiep-gan-voi-doanh-nghiep', 'KetQuaTotNghiepGanVoiDoanhNGhiepController@exportData')
        ->name('exportdata.ket-qua-tot-nghiep-gan-voi-doanh-nghiep');
});
//End Xuân

// thanhvn import export quan-ly-giao-vien
Route::group(['prefix' => 'quan-ly-giao-vien'], function () {
    Route::post('/export-bieu-mau-doi-ngu-nha-giao', 'QuanLyGiaoVienController@exportBieuMau')
        ->name('export-bieu-mau-doi-ngu-nha-giao');
    Route::post('export-data-doi-ngu-nha-giao', 'QuanLyGiaoVienController@exportData')
        ->name('export-data-doi-ngu-nha-giao');
});
  // thanhnv import export doi ngu nha giao bm-9

  // quang quan ly giao duc nghe nghiep
Route::group(['prefix' => 'quan-ly-giao-duc-nghe-nghiep'], function () {
    Route::get('/', 'GiaoDucNgheNghiepController@index')->name('xuatbc.quan-ly-giao-duc-nghe-nghiep');   
    Route::get('/create', 'GiaoDucNgheNghiepController@create')->name('xuatbc.quan-ly-giao-duc-nghe-nghiep.create');   
    Route::post('/store', 'GiaoDucNgheNghiepController@store')->name('xuatbc.quan-ly-giao-duc-nghe-nghiep.store');   
    Route::get('/edit/{id}', 'GiaoDucNgheNghiepController@edit')->name('xuatbc.quan-ly-giao-duc-nghe-nghiep.edit'); 
    Route::post('/update/{id}', 'GiaoDucNgheNghiepController@update')->name('xuatbc.quan-ly-giao-duc-nghe-nghiep.update');   
    Route::post('/check-them-giao-duc-nghe-nghiep', 'GiaoDucNgheNghiepController@getCheckTonTaiGiaoDucNgheNghiep')->name('xuatbc.quan-ly-giao-duc-nghe-nghiep.check_so_lieu');
});
 // quang quan ly giao duc nghe nghiep

