<?php

namespace App\Http\Controllers;

use App\CoSoDaoTao;
use App\Repositories;
use App\Services\CsdtService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class CsdtController extends Controller
{
    protected $CsdtService;
    public function __construct(CsdtService $CsdtService)
    {
        $this->CsdtService = $CsdtService;
    }

    public function danhsachcosodaotao()
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
        $qd = DB::table('quyet_dinh_thanh_lap_csdt')->get();
        $coquan = DB::table('co_quan_chu_quan')->get();
        $loaihinh = DB::table('loai_hinh_co_so')->get();
        return view('coso.them_co_so', ['qd'=>$qd, 'coquan'=>$coquan, 'loaihinh'=>$loaihinh]);
    }

    public function saveAddCsdt(Request $request)
    {
        
        // dd($request->logo);

        $request->validate([
            'ten' => 'required',
            'ma_don_vi' => 'required|unique:co_so_dao_tao',
            // 'logo' => 'required',
            'dien_thoai' => 'required',
            'dia_chi' => 'required',
            'ten_quoc_te' => 'required',
            'co_quan_chu_quan_id' => 'required',
            'ma_loai_hinh_co_so' => 'required',
            'quyet_dinh_id' => 'required'
        ],
        [
            'ten.required' => 'Tên cơ sở đào tạo không được để trống',
            'ma_don_vi.required' => 'Mã đơn vị không được để trống',
            'dien_thoai.required' => 'Điện thoại không được để trống',
            'dia_chi.required' => 'địa chỉ không được để trống',
            'ten_quoc_te.required' => 'Vui lòng điền tên quốc tế của cơ sở',
            'co_quan_chu_quan_id.required' => 'Vui lòng chọn cơ quan chủ quản',
            'ma_loai_hinh_co_so.required' => 'Vui lòng chọn loại hình cơ sở',
            'quyet_dinh_id.required' => 'Vui lòng chọn quyết định của cơ sở'
        ]
    );
    
    $filePath = "";
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $fileName= uniqid().'-'.$file->getClientOriginalName();
        $file->move('uploads/logoCsdt', $fileName);
        $filePath = 'public/uploads/logoCsdt/'.$fileName;  
    }
    $requestAll = $request->all();
    $requestAll['logo']= $filePath;
    // dd($requestAll);
    
        
        
        $this->CsdtService->create($request);
        return redirect()->route('csdt.danh-sach');
    }

    public function suaCsdt($id){
        $data = $this->CsdtService->getSingleCsdt($id);
        $parent= DB::table('co_quan_chu_quan')->get();
        $loai_coso = DB::table('loai_hinh_co_so')->get();
        $qd = DB::table('quyet_dinh_thanh_lap_csdt')->get();
        //    dd($data);
        return view('coso.sua_co_so',[
            'data' => $data,
            'parent' => $parent,
            'loai_coso' => $loai_coso,
            'qd'=>$qd]);
    }

    public function saveEditCsdt($id, Request $request){
        // $data = $request->all();
        $this->CsdtService->update($id,$request);
        $request->validate([
            'ten' => 'required',
            'ma_don_vi' => 'required|unique:co_so_dao_tao',
            'logo' => 'mimes:jpeg,png|required',
            'dien_thoai' => 'required',
            'dia_chi' => 'required',
            'ten_quoc_te' => 'required',
            'co_quan_chu_quan_id' => 'required',
            'ma_loai_hinh_co_so' => 'required',
            'quyet_dinh_id' => 'required'
        ]);

        // dd($request->file('img'));
        return redirect()->route('csdt.sua', ['id'=> $id])->with('mess', 'Đã cập nhật thông tin cơ sở đào tạo');
    }


}
