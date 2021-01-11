<?php

namespace App\Http\Controllers;

use App\Services\QuanHuyenService;
use Illuminate\Http\Request;

class QuanHuyenController extends Controller
{
    protected $QuanHuyenService;
    public function __construct(
        QuanHuyenService $QuanHuyenService
    ) {
        $this->QuanHuyenService = $QuanHuyenService;
    }
    public function getXaPhuongTheoQuanHuyen(Request $request)
    {
        $id = $request->id;
        $getdata = $this->QuanHuyenService->getXaPhuongTheoQuanHuyen($id);
        return $getdata;
    }
}
