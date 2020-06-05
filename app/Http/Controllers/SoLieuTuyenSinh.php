<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\TuyenSinhValidate;
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
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        
        $data = $this->SoLieuTuyenSinhService->getSoLuongTuyenSinh($params,$limit);
        $coso = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        $quanhuyen = $this->SoLieuTuyenSinhService->getTenQuanHuyen();
        if(isset(request()->devvn_quanhuyen)){
            $xaphuongtheoquanhuyen = $this->SoLieuTuyenSinhService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        }else{
            $xaphuongtheoquanhuyen=[];
        }
        $loaiHinh = $this->SoLieuTuyenSinhService->getListLoaiHinh();
        $data->appends(request()->input())->links();
        return view('solieutuyensinh.tong_hop_so_lieu_tuyen_sinh', [
            'data' => $data,
            'loaiHinh' => $loaiHinh,
            'limit' => 10,
            'coso'=>$coso,
            'quanhuyen'=>$quanhuyen,
            'params'=>$params,
            'xaphuongtheoquanhuyen'=>$xaphuongtheoquanhuyen
        ]);
        
    }

    public function searchCoSoTongHopSoLieuTuyenSinh(Request $request)
    {
        $data = $this->SoLieuTuyenSinhService->getDataSeachCoSo($request->co_so_id);
        $data_co_so =  $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
       return view('solieutuyensinh.search_so_lieu_tuyen_sinh',compact('data','data_co_so'));
    }


    public function chitietsolieutuyensinh($coSoId)
    {
        $limit=10;
        $params = request()->all();
        $data = $this->SoLieuTuyenSinhService->getChiTietSoLuongTuyenSinh($coSoId,$limit,$params);
        $data->appends(request()->input())->links();
        return view('solieutuyensinh.chi_tiet_so_lieu_tuyen_sinh', [
            'data' => $data,
            'limit' => $limit,
            'params'=>$params
        ]);
    }


    public function suasolieutuyensinh($id)
    {
        $datatuyensinhid = $this->SoLieuTuyenSinhService->getsuasolieutuyensinh($id);
        return view('solieutuyensinh.sua_so_luong_tuyen_sinh',compact('datatuyensinhid'));
    }   

    public function postsuasolieutuyensinh($id,TuyenSinhValidate $request)
    {
        $data = $this->SoLieuTuyenSinhService->update($id,$request);
        $datatuyensinh =$this->SoLieuTuyenSinhService->findById($id);
        return redirect()->route('chitietsolieutuyensinh', ['co_so_id' => $datatuyensinh->co_so_id])->with('thongbao','Sửa số liệu tuyển sinh thành công');
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
    public function postthemsolieutuyensinh(TuyenSinhValidate $request)
    {
        $getdata = $request->all();
        $data = $this->SoLieuTuyenSinhService->postthemsolieutuyensinh($getdata);
        return redirect()->route('chitietsolieutuyensinh', ['co_so_id' => $getdata['co_so_id']])->with('thongbao','Thêm số liệu tuyển sinh thành công');
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

    public function getCoSoTuyenSinhTheoLoaiHinh(Request $request)
    {
        $id = $request->id;
        $getdata = $this->SoLieuTuyenSinhService->getCoSoTuyenSinhTheoLoaiHinh($id);
        return $getdata;
    }

    public function getXaPhuongTheoQuanHuyen(Request $request)
    {
        $id = $request->id;
        $getdata = $this->SoLieuTuyenSinhService->getXaPhuongTheoQuanHuyen($id);
        return $getdata;
    }
}
