<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        /**
         * Thanh NV
         * $limit =10;
         * $data = $this->SoLieuTuyenSinhService->getSoLuongTuyenSinh($limit);
         * $co_so_dao_tao =  DB::table('co_so_dao_tao')->get();
         * return view('solieutuyensinh.tong_hop_so_lieu_tuyen_sinh',compact('data','limit','co_so_dao_tao'));
         * 
         */
        $params = request()->all();
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        
        $data = $this->SoLieuTuyenSinhService->getSoLuongTuyenSinh($params,$limit);
        $coso = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        $quanhuyen = $this->SoLieuTuyenSinhService->getTenQuanHuyen();
        $nganhnghe = $this->SoLieuTuyenSinhService->getNganhNghe();
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
            'xaphuongtheoquanhuyen'=>$xaphuongtheoquanhuyen,
            'nganhnghe'=>$nganhnghe
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
        $thongtincoso = $this->SoLieuTuyenSinhService->getThongTinCoSo($coSoId);
        $data = $this->SoLieuTuyenSinhService->getChiTietSoLuongTuyenSinh($coSoId,$limit,$params);
        $data->appends(request()->input())->links();
        return view('solieutuyensinh.chi_tiet_so_lieu_tuyen_sinh', [
            'data' => $data,
            'limit' => $limit,
            'params'=>$params,
            'thongtincoso'=>$thongtincoso 
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
        $datacheck=[
            ['id'=>"co_so_id",'value'=>$getdata["co_so_id"]],
            ['id'=>'nghe_id','value'=>$getdata["nghe_id"]],
            ['id'=>'nam','value'=>$getdata["nam"]],
            ['id'=>'dot','value'=>$getdata["dot"]],
        ];
        $getdata = $this->SoLieuTuyenSinhService->getCheckTonTaiSoLieuTuyenSinh($datacheck);
        if($getdata == 'tontai'){
            return redirect()->route('themsolieutuyensinh')->with('thongbao', 'Số liệu tuyển sinh đã tồn tại và được phê duyệt');
        }else if($getdata == null){
            return redirect()->route('chitietsolieutuyensinh', ['co_so_id' => $getdata['co_so_id']])->with('thongbao','Thêm số liệu tuyển sinh thành công');
        }else{
            return redirect()->route('themsolieutuyensinh')->with('thongbao', 'Số liệu tuyển sinh đã tồn tại');
        }
        $data = $this->SoLieuTuyenSinhService->postthemsolieutuyensinh($getdata);

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
