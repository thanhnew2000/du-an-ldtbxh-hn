<?php

namespace App\Http\Controllers;

use App\Repositories;
use App\Services\CsdtService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('coso.danh_sach_co_so_dao_tao', compact('data'));
    }

    public function chi_tiet_co_so($id)
    {
        $data = $this->CsdtService->getSingleCsdt($id);
    //    dd($data);
        return view('coso.chi_tiet_co_so',['data' => $data]);
    }

    public function themCsdt(){
        return view('coso.them_co_so');
    }

    public function suaCsdt($id){
        $data = $this->CsdtService->getSingleCsdt($id);
        $parent= DB::table('co_quan_chu_quan')->get();
        $loai_coso = DB::table('loai_hinh_co_so')->get();
        //    dd($data);
            return view('coso.sua_co_so',['data' => $data, 'parent' => $parent], ['loai_coso' => $loai_coso]);
    }

    public function saveEdit($id, Request $request){
        // $data = $request->all();
        $this->CsdtService->update($id,$request);

        return redirect()->route('sua_co_so')->with('mess', 'edit thanh cong');
    }

    
}
