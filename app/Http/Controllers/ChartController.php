<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function bdbaocaongansach()
    {
        
        return view('chart.bieu_do_bao_cao_ngan_sach');
    }
    public function getDataKQTS(){
        $data = DB::table('tuyen_sinh')
        ->where('nam',2020)
        ->where('dot',2)
        ->get();
        dd($data);
        return \Arr::pluck($data, 'ke_hoach_tuyen_sinh_cao_dang');
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