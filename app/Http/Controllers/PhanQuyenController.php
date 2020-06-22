<?php

namespace App\Http\Controllers;

use App\Repositories;
use App\Services\PhanQuyenService;
use Illnuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhanQuyenService as GlobalPhanQuyenService;

class PhanQuyenController extends Controller
{

    protected $PhanQuyenService;
    public function __construct(PhanQuyenService $PhanQuyenService)
    {
        $this->PhanQuyenService = $PhanQuyenService;
    }

    public function getQuyen()
    {
        $data = $this->PhanQuyenService->getQuyen();
        // dd($data);
        return view('account.phan_quyen_tai_khoan', compact('data'));
    }

    public function themQuyen()
    {
        return view('account.them-quyen');
    }
}