<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function danhsachnganhnghe(){
        return view('career.danh_sach_nganh_nghe');
    }
    public function thietlapchitieutuyensinh(){
        return view('career.thiet_lap_chi_tieu_tuyen_sinh');
    }
    public function thietlapnghechocosodaotao(){
        return view('career.thiet_lap_nghe_cho_co_so_dao_tao');
    }
}
