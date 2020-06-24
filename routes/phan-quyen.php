<?php

/**
 * Create by Nguyễn Cường
 * Date: 18/02/2020
 * Create Route Phân Quyền
 */

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['permission:xem_so_luong_sinh_vien_dang_theo_hoc
                                |sua_so_luong_sinh_vien_dang_theo_hoc
                                |them_so_luong_sinh_vien_dang_theo_hoc']], function () {
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

Route::group(['middleware' => ['permission:them_moi_quan_ly_giao_vien|cap_nhat_quan_ly_giao_vien|
them_moi_danh_sach_doi_ngu_nha_giao|chi_tiet_danh_sach_doi_ngu_nha_giao|cap_nhat_danh_sach_doi_ngu_nha_giao|
them_moi_danh_sach_doi_ngu_quan_ly|cap_nhat_danh_sach_doi_ngu_quan_ly|xem_chi_tiet_danh_sach_doi_ngu_quan_ly']], function () {
    Route::resource('so-lieu-can-bo-quan-ly', 'SoLieuCanBoQuanLyController');
});

Route::group(['middleware' => ['permission:them_moi_tong_hop_thuc_hien_chinh_sach_cho_sv|
                                cap_nhat_tong_hop_thuc_hien_chinh_sach_cho_sv']], function () {
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
    Route::post('export-bieu-mau-chinh-sach-sv', 'ExportChinhSachSinhVienController@exportBieuMau')
        ->name('layformbieumau.cs.sinhvien');
    Route::post('export-data-chinh-sach-sv', 'ExportChinhSachSinhVienController@exportData')
        ->name('exportdata.bieumau.cs.sinhvien');
});


Route::group(['middleware' => ['permission:them_moi_tong_hop_ket_qua_tuyen_sinh|
                                xem_chi_tiet_tong_hop_ket_qua_tuyen_sinh|
                                sua_chi_tiet_tong_hop_ket_qua_tuyen_sinh']], function () {
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
});


Route::group(['middleware' => ['permission:them_moi_tong_hop_ket_qua_tot_nghiep|
xem_chi_tiet_tong_hop_ket_qua_tot_nghiep']], function () {
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