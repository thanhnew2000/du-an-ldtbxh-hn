<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function bdbaocaongansach()
    {
        return view('chart.bieu_do_bao_cao_ngan_sach');
    }
    public function bdkqtuyensinh()
    {
        return view('chart.bieu_do_ket_qua_tuyen_sinh');
    }
    public function bdsvdanghoc()
    {
        return view('chart.bieu_do_sinh_vien_dang_theo_hoc');
    }
    public function bdsoluongtotnghiep()
    {
        return view('chart.bieu_do_so_luong_tot_nghiep');
    }
    public function bdhoptacquocte()
    {
        return view('chart.bieu_do_hop_tac_quoc_te');
    }
}