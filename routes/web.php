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

Route::view('create_kq_tot_nghiep', 'danhsachyeucau.create_kq_tot_nghiep');
Route::view('view_kq_tot_nghiep', 'danhsachyeucau.view_kq_tot_nghiep');

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
});


Route::group(['middleware' => 'auth'], function () {

     


     Route::group(['prefix' => 'coso'], function(){
     Route::get('/danh-sach-co-so-dao-tao', 'CsdtController@index');
     Route::get('/them-co-so-dao-tao', 'CsdtController@themCsdt')->name('them_co_so');
     Route::get('/danh-sach-chi-nhanh', 'CoSoController@danhsachchinhanh');
     Route::get('/chi-tiet-co-so/{id}', 'CsdtController@chi_tiet_co_so')->name('chi_tiet_co_so');
     Route::get('/sua-co-so/{id}', 'CsdtController@suaCsdt')->name('sua_co_so');
     Route::any('/saveEdit/{id}', 'CsdtController@saveEdit')->name('saveEdit');

     });

     Route::group(['prefix' => 'career'], function(){
          Route::get('/danh-sach-nganh-nghe', 'CareerController@danhsachnganhnghe');
          Route::get('/thiet-lap-chi-tieu-tuyen-sinh', 'CareerController@thietlapchitieutuyensinh');
          Route::get('/thiet-lap-nghe-cho-co-so-dao-tao', 'CareerController@thietlapnghechocosodaotao');
     });

     Route::group(['prefix' => 'extractreport'], function(){
          Route::get('/danh-sach-doi-ngu-nha-giao', 'ExtractReportController@danhsachnhagiao');
          Route::get('/danh-sach-doi-ngu-quan-ly', 'ExtractReportController@danhsachquanly');

          // cuong nc - tổng hợp sinh viên đang theo học
          Route::get('/tong-hop-sinh-vien-dang-theo-hoc', 'ExtractController@tonghopsvdanghoc');
          Route::get('/them-so-lieu-sinh-vien', 'ExtractController@add')->name('Extract.add');
          Route::post('/saveAdd', 'ExtractController@saveAdd')->name('saveadd');
          Route::get('/sua-so-lieu-sinh-vien/{qlsv}',  'ExtractController@edit')->name('Extract.edit');
          Route::post('/saveEdit/{id}', 'ExtractController@saveEdit')->name('Edit');
          // end cuong nc - tổng hợp sinh viên đang theo học

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

