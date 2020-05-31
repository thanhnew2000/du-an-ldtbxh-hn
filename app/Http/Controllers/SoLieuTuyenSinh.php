<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SoLieuTuyenSinhService;
class SoLieuTuyenSinh extends Controller
{

    protected $SoLieuTuyenSinhService;

	public function __construct(SoLieuTuyenSinhService $SoLieuTuyenSinhService){
		$this->SoLieuTuyenSinhService = $SoLieuTuyenSinhService;
        //dd($ProductService);
    }

    public function tonghopsolieutuyensinh()
    {
        $limit =10;
        $data = $this->SoLieuTuyenSinhService->getSoLuongTuyenSinh($limit);
        $data_co_so =  $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();

      
       return view('solieutuyensinh.tong_hop_so_lieu_tuyen_sinh',compact('data','limit','data_co_so'));
    }

    public function searchCoSoTongHopSoLieuTuyenSinh(Request $request)
    {
        $data = $this->SoLieuTuyenSinhService->getDataSeachCoSo($request->co_so_id);  
        $data_co_so =  $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
       return view('solieutuyensinh.search_so_lieu_tuyen_sinh',compact('data','data_co_so'));
    }


    public function chitietsolieutuyensinh($id)
    {

        $data = $this->SoLieuTuyenSinhService->getChiTietSoLuongTuyenSinh($id);
        return view('solieutuyensinh.chi_tiet_so_lieu_tuyen_sinh',compact('data'));
    }


    public function suasolieutuyensinh($id)
    {
        $data = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        $datatuyensinhid = $this->SoLieuTuyenSinhService->getsuasolieutuyensinh($id);
        return view('solieutuyensinh.sua_so_luong_tuyen_sinh',compact('data','datatuyensinhid'));
    }

    public function postsuasolieutuyensinh($id,Request $request)
    {
        $data = $this->SoLieuTuyenSinhService->update($id,$request);
        return redirect()->back()->with('thongbao','Sửa số liệu tuyển sinh thành công');
    }

    public function themsolieutuyensinh()
    {
        $data = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        return view('solieutuyensinh.them_so_lieu_tuyen_sinh',compact('data'));
    }

    public function getmanganhnghe(Request $request)
    {   
        $data = $this->SoLieuTuyenSinhService->getmanganhnghe($request->id);
        return $data;
    }
    public function postthemsolieutuyensinh(Request $request)
    {
        $getdata = $request->all();
        $data = $this->SoLieuTuyenSinhService->postthemsolieutuyensinh($getdata);
        return redirect()->back()->with('thongbao','Thêm số liệu tuyển sinh thành công');
    }
    public function getCheckTonTaiSoLieuTuyenSinh(Request $request)
    {
        $datacheck=  $request->datacheck;
        $getdata = $this->SoLieuTuyenSinhService->getCheckTonTaiSoLieuTuyenSinh($datacheck);
        if($getdata == 'tontai'){
            return 1;
        }else if($getdata == null){
            return 2;
        }else{
            return $urledit = route('suasolieutuyensinh', ['id' => $getdata->id]);
        }
        
    }
}
