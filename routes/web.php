<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
     return view('account.login');
})->name('login')->middleware("CheckLogin");



Route::post('/dang-nhap','AuthController@login')->name('post_login');

Route::get('/logout','AuthController@logout');

Route::post('/quen-mat-khau-gui-mail','AuthController@forgot_pass')->name('forgot_pass');

Route::get('/quen-mat-khau','AuthController@reset_pass')->name('link_reset_password');

Route::post('/quen-mat-khau','AuthController@post_reset_pass');


Route::group(['middleware' => 'auth'], function () {
     Route::get('/dashboard','AnalysisController@index')->name('dashboard');

     Route::get('/tao-tai-khoan','UserController@getdangkytaikhoan')->name("dangkytaikhoan");
     Route::post('/tao-tai-khoan','UserController@dangkytaikhoan');

     Route::get('/doi-mat-khau','UserController@getdoimatkhau')->name("doimatkhau");
     Route::post('/doi-mat-khau','UserController@doimatkhau');
     
     Route::get('/thong-tin-tai-khoan','UserController@getcapnhattaikhoan')->name('capnhattaikhoan');
     Route::post('/thong-tin-tai-khoan','UserController@capnhattaikhoan');

     Route::post('/check-email','UserController@checkemail')->name('check-email');
     Route::post('/check-phone','UserController@checkphone')->name('check-phone');

     Route::get('/tong-hop-so-lieu-tuyen-sinh','SoLieuTuyenSinh@tonghopsolieutuyensinh')->name('solieutuyensinh');
     Route::get('/chi-tiet-so-lieu-tuyen-sinh/{id}','SoLieuTuyenSinh@chitietsolieutuyensinh')->name('chitietsolieutuyensinh');
     Route::get('/sua-so-lieu-tuyen-sinh/{id}','SoLieuTuyenSinh@suasolieutuyensinh')->name('suasolieutuyensinh');
     Route::post('/sua-so-lieu-tuyen-sinh/{id}/edit','SoLieuTuyenSinh@postsuasolieutuyensinh')->name('postsuasolieutuyensinh');
     Route::get('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@themsolieutuyensinh')->name('themsolieutuyensinh');
     Route::post('/them-so-lieu-tuyen-sinh','SoLieuTuyenSinh@postthemsolieutuyensinh')->name('postthemsolieutuyensinh');
     Route::post('/get-ma-nganh-nghe','SoLieuTuyenSinh@getmanganhnghe');

     
});


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'account'], function(){
         Route::get('/quan-ly-tai-khoan', 'AccountController@quanlytaikhoan');
         Route::get('/quan-ly-quyen-truy-cap', 'AccountController@quanlyquyentruycap');
         Route::get('/phan-quyen-tai-khoan', 'AccountController@phanquyentaikhoan');
         Route::get('/cap-nhat-thong-tin-ca-nhan', 'AccountController@capnhatthongtincanhan');
         Route::get('/doi-mat-khau', 'AccountController@thaydoimatkhau');

    });
     Route::group(['prefix' => 'coso'], function(){
     Route::get('/danh-sach-co-so-dao-tao', 'CoSoController@danhsachcosodaotao');
     Route::get('/danh-sach-chi-nhanh', 'CoSoController@danhsachchinhanh');

     });

     Route::group(['prefix' => 'career'], function(){
          Route::get('/danh-sach-nganh-nghe', 'CareerController@danhsachnganhnghe');
          Route::get('/thiet-lap-chi-tieu-tuyen-sinh', 'CareerController@thietlapchitieutuyensinh');
          Route::get('/thiet-lap-nghe-cho-co-so-dao-tao', 'CareerController@thietlapnghechocosodaotao');
 
     });

     Route::group(['prefix' => 'importreport'], function(){
          Route::get('/quan-ly-giao-vien', 'ImportReportController@quanlygiaovien');
          Route::get('/doi-ngu-can-bo-quan-ly', 'ImportReportController@doingucanboquanly');
          Route::get('/thuc-hien-chinh-sach-cho-sinh-vien', 'ImportReportController@chinhsachchosinhvien');
          Route::get('/ket-qua-tuyen-sinh', 'ImportReportController@ketquatuyensinh');
          Route::get('/xay-dung-chuong-trinh-giao-trinh', 'ImportReportController@xaydungchuongtrinh');
          Route::get('/ket-qua-tot-nghiep', 'ImportReportController@ketquatotnghiep');
          Route::get('/dao-tao-nghe-cho-nguoi-khuyet-tat', 'ImportReportController@daotaonguoikhuyetat');
          Route::get('/dao-tao-nghe-cho-thanh-nien', 'ImportReportController@daotaothanhnien');
          Route::get('/ket-qua-dao-tao-nghe-gan-voi-doanh-nghiep', 'ImportReportController@ketquadaotaovoidoanhnghiep');
          Route::get('/lien-ket-dao-tao', 'ImportReportController@lienketdaotao');
          Route::get('/thiet-lap-deadline-bao-cao-theo-dot', 'ImportReportController@deadlinebaocao');
          Route::get('/kiem-soat-tien-do-nop-bao-cao', 'ImportReportController@tiendonopbaocao');
          Route::get('/phe-duyet-bao-cao', 'ImportReportController@pheduyetbaocao');


 
     });

     Route::group(['prefix' => 'extractreport'], function(){
          Route::get('/danh-sach-doi-ngu-nha-giao', 'ExtractReportController@danhsachnhagiao');
          Route::get('/danh-sach-doi-ngu-quan-ly', 'ExtractReportController@danhsachquanly');
          Route::get('/tong-hop-sinh-vien-dang-theo-hoc', 'ExtractReportController@tonghopsvdanghoc');
          Route::get('/tong-hop-thuc-hien-chinh-sach-cho-sinh-vien', 'ExtractReportController@tonghopchinhsachsv');
          Route::get('/tong-hop-ket-qua-tuyen-sinh', 'ExtractReportController@tonghopkqtuyensinh');
          Route::get('/tong-hop-xay-dung-chuong-trinh-giao-trinh', 'ExtractReportController@tonghopxdchuongtrinh');
          Route::get('/tong-hop-ket-qua-tot-nghiep', 'ExtractReportController@tonghopkqtotnghiep');
          Route::get('/tong-hop-dao-tao-nghe-cho-nguoi-khuyet-tat', 'ExtractReportController@tonghopdaotaonguoikhuyettat');
          Route::get('/tong-hop-dao-tao-nghe-cho-thanh-nien', 'ExtractReportController@tonghopdaotaothanhnien');
          Route::get('/tong-hop-dao-tao-nghe-voi-doanh-nghiep', 'ExtractReportController@tonghopdaotaovoidoanhnghiep');
          Route::get('/tong-hop-hop-tac-quoc-te', 'ExtractReportController@tonghophoptacquocte');
          Route::get('/tong-hop-dang-ky-chi-tieu-tuyen-sinh', 'ExtractReportController@tonghoptuyensinh');

 
     });

     Route::group(['prefix' => 'chart'], function(){
          Route::get('/bieu-do-bao-cao-ngan-sach', 'ChartController@bdbaocaongansach');
          Route::get('/bieu-do-ket-qua-tuyen-sinh', 'ChartController@bdkqtuyensinh');
          Route::get('/bieu-do-sinh-vien-dang-theo-hoc', 'ChartController@bdsvdanghoc');
          Route::get('/bieu-do-so-luong-tot-nghiep', 'ChartController@bdsoluongtotnghiep');
          Route::get('/bieu-do-hop-tac-quoc-te', 'ChartController@bdhoptacquocte');
 
     });
     Route::group(['prefix' => 'news'], function(){
          Route::get('/danh-sach-tin-tuc', 'NewsController@danhsachtintuc');
          Route::get('/chi-tiet-tin-tuc', 'NewsController@chitiettintuc');
          Route::get('/quan-ly-tin-tuc', 'NewsController@quanlytintuc');
 
     });
     Route::group(['prefix' => 'feedback'], function(){
          Route::get('/nhan-tin-bao-loi-he-thong', 'FeedbackController@nhantinbaoloi');
 
     });

});



