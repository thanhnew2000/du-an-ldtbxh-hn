<?php

namespace App\Http\Controllers;

use App\Services\ChiNhanhService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiNhanhController extends Controller
{
protected $ChiNhanhService;
    public function __construct(ChiNhanhService $ChiNhanhService)
    {
        $this->ChiNhanhService = $ChiNhanhService;
    }

    public function danhsachChiNhanh(){
        $data = $this->ChiNhanhService->getChiNhanh();
        
//        dd($data);
        return view('coso.chi_nhanh.danh_sach_chi_nhanh', ['data' => $data]);
    }

    public function themchinhanh()
    {
        $csdt = DB::table('co_so_dao_tao')->get();
        return view('coso.chi_nhanh.them_chi_nhanh', ['csdt'=> $csdt]);
    }
    public function suachinhanh($id)
    {
        $data = $this->ChiNhanhService->getSingleChiNhanh($id);
        $csdt = DB::table('co_so_dao_tao')->get();
        $data = DB::table('chi_nhanh_dao_tao')->get();
        return view('coso.chi_nhanh.sua_chi_nhanh', ['csdt'=> $csdt, 'data' => $data]);
    }

    public function saveAddChiNhanh(Request $request)
    {
        
        // dd($request->logo);

        $request->validate([
            'dia_chi' => 'required',
            'chi_nhanh_chinh' => 'required',
            'hotline' => 'required',
            'co_so_id' => 'required',
            'ma_chung_nhan_dang_ki_hoat_dong' => 'required',
            'da_duoc_cap' => 'required',
        ],
        [
            'dia_chi.required' => 'Vui lòng nhập địa chỉ chi nhánh',
            'chi_nhanh_chinh' => 'Vui lòng chọn loại chi nhánh',
            'hotline.required' => 'Vui lòng nhập hotline chi nhánh',
            'co_so_id.required' => 'Vui lòng chọn cơ sở đào tạo',
            'ma_chung_nhan_dang_ki_hoat_dong.required' => 'Vui lòng nhập mã chứng nhận hoạt động',
            'da_duoc_cap.required' => 'Vui lòng chọn trạng thái cấp giấy phép'
        ]
    );
    
        
        
        $this->ChiNhanhService->create($request);
        return redirect()->route('csdt.chi-nhanh');
    }
}
