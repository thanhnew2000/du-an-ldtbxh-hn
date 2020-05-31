<?php

namespace App\Http\Controllers;

use App\Repositories;
use App\Services\CsdtService;
use Illuminate\Http\Request;

class CsdtController extends Controller
{
    protected $CsdtService;
    public function __construct(CsdtService $CsdtService)
    {
        $this->CsdtService = $CsdtService;
    }

    public function index()
    {
        $data = $this->CsdtService->getCsdt();
        //        dd($data);
        return view('pages.co_so_dao_tao.list', compact('data'));
    }
}