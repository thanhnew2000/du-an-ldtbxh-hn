<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function quanlytaikhoan(){
        return view('account.quan_ly_tai_khoan');
    }
    public function quanlyquyentruycap(){
        return view('account.quan_ly_quyen_truy_cap');

    }
    public function phanquyentaikhoan(){
        return view('account.phan_quyen_tai_khoan');

    }
    public function capnhatthongtincanhan(){
        return view('account.cap_nhat_thong_tin_ca_nhan');

    }
    public function thaydoimatkhau(){
        return view('account.doi_mat_khau');

    }
}
