<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoSoController extends Controller
{
    public function danhsachcosodaotao()
    {
        return view('coso.danh_sach_co_so_dao_tao');
    }
    public function danhsachchinhanh()
    {
        return view('coso.danh_sach_chi_nhanh');
    }
}