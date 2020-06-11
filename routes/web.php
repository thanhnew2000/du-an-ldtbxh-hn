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

// begin - authenticate
Route::redirect('login', '/');
Route::get('/', function () {
     return view('account.login');
})->name('login')->middleware("CheckLogin");
Route::post('dang-nhap', 'AuthController@login')->name('post_login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('quen-mat-khau-gui-mail', 'AuthController@forgot_pass')->name('forgot_pass');
Route::get('quen-mat-khau', 'AuthController@reset_pass')->name('link_reset_password');
Route::post('quen-mat-khau', 'AuthController@post_reset_pass');
// end - authenticate


Route::view('create_kq_tot_nghiep', 'danhsachyeucau.create_kq_tot_nghiep');
Route::view('view_kq_tot_nghiep', 'danhsachyeucau.view_kq_tot_nghiep');


Route::get('/dashboard', 'AnalysisController@index')
     ->middleware('auth')
     ->name('dashboard');


Route::group(['middleware' => 'auth'], function () {


     Route::group(['prefix' => 'chart'], function () {
          Route::get('/bieu-do-bao-cao-ngan-sach', 'ChartController@bdbaocaongansach');
          Route::get('/bieu-do-ket-qua-tuyen-sinh', 'ChartController@bdkqtuyensinh');
          Route::get('/bieu-do-sinh-vien-dang-theo-hoc', 'ChartController@bdsvdanghoc');
          Route::get('/bieu-do-so-luong-tot-nghiep', 'ChartController@bdsoluongtotnghiep');
          Route::get('/bieu-do-hop-tac-quoc-te', 'ChartController@bdhoptacquocte');
     });

     Route::group(['prefix' => 'news'], function () {
          Route::get('/danh-sach-tin-tuc', 'NewsController@danhsachtintuc');
          Route::get('/chi-tiet-tin-tuc', 'NewsController@chitiettintuc');
          Route::get('/quan-ly-tin-tuc', 'NewsController@quanlytintuc');
     });

     Route::group(['prefix' => 'feedback'], function () {
          Route::get('/nhan-tin-bao-loi-he-thong', 'FeedbackController@nhantinbaoloi');
     });  
     Route::get('danh-sach-doi-ngu-nha-giao',function(){
          return view('danhsachdoingunhagioa.danh-sach-doi-ngu-nha-giao');
     })->name('danh');
     Route::get('them-moi-danh-sach-doi-ngu-nha-giao',function(){
          return view('danhsachdoingunhagioa.them-moi-danh-sach-gv');
     })->name('them_ds');
     Route::get('chinh-sua-danh-sach-doi-ngu-ql',function(){
          return view('danhsachdoingunhagioa.chinh-sua-danh-sach-doi-ngu-ql');
     })->name('chinh_sua_ql');
     Route::get('them_ket_qua_hop_tac_qt',function(){
          return view('ketquatonghopqt.them_ket_qua_hop_tac_qt');
     })->name('them_kq_qt');
     Route::get('views_ct_kq_hop_tac_qt',function(){
          return view('ketquatonghopqt.views_ct_kq_hop_tac_qt');
     })->name('views_kq_qt');
     Route::get('views_kq_hop_tac_qt',function(){
          return view('ketquatonghopqt.views_kq_hop_tac_qt');
     })->name('views_kq_qt');
});
 