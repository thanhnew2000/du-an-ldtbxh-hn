<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Services\SoLieuTuyenSinhService;
class SoLieuTuyenSinh extends Controller
{

    protected $SoLieuTuyenSinhService;

	public function __construct(SoLieuTuyenSinhService $SoLieuTuyenSinhService){
		$this->SoLieuTuyenSinhService = $SoLieuTuyenSinhService;
    }

    public function tonghopsolieutuyensinh()
    {
        $params = request()->all();
        $data = $this->SoLieuTuyenSinhService->getSoLuongTuyenSinh($params);
        $loaiHinh = $this->SoLieuTuyenSinhService->getListLoaiHinh();

        $data->appends(request()->input())->links();
        return view('solieutuyensinh.tong_hop_so_lieu_tuyen_sinh', [
            'data' => $data,
            'loaiHinh' => $loaiHinh,
            'limit' => 10,
        ]);
    }

    public function searchCoSoTongHopSoLieuTuyenSinh(Request $request)
    {
        $data = $this->SoLieuTuyenSinhService->getDataSeachCoSo($request->co_so_id);
        $data_co_so =  $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
       return view('solieutuyensinh.search_so_lieu_tuyen_sinh',compact('data','data_co_so'));
    }


    public function chitietsolieutuyensinh($nam, $dot, $coSoId)
    {
        $data = $this->SoLieuTuyenSinhService->getChiTietSoLuongTuyenSinh($nam, $dot, $coSoId);
        return view('solieutuyensinh.chi_tiet_so_lieu_tuyen_sinh', [
            'data' => $data,
        ]);
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
