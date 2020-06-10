<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SinhVienTotNghiepService;
class SinhVienTotNghiepController extends Controller
{
    protected $SinhVienTotNghiepService;

	public function __construct(SinhVienTotNghiepService $SinhVienTotNghiepService){
		$this->SinhVienTotNghiepService = $SinhVienTotNghiepService;
    }

    public function index()
    {
        $params = request()->all();
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        
        $data = $this->SinhVienTotNghiepService->index($params,$limit);
        $coso = $this->SinhVienTotNghiepService->getTenCoSoDaoTao();
        $quanhuyen = $this->SinhVienTotNghiepService->getTenQuanHuyen();
        $nghe_cap_2 = $this->SinhVienTotNghiepService->getNganhNghe(2);
        if(isset(request()->devvn_quanhuyen)){
            $xaphuongtheoquanhuyen = $this->SinhVienTotNghiepService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        }else{
            $xaphuongtheoquanhuyen=[];
        }
        
            $nghe_cap_3=$this->SinhVienTotNghiepService->getNganhNghe(3);
            $nghe_cap_4=$this->SinhVienTotNghiepService->getNganhNghe(4);


        $loaiHinh = $this->SinhVienTotNghiepService->getListLoaiHinh();
        $data->appends(request()->input())->links();
        // dd($data);
        return view('tot_nghiep.tong_hop_ket_qua_tot_nghiep', [
            'data' => $data,
            'loaiHinh' => $loaiHinh,
            'limit' => 10,
            'coso'=> $coso,
            'quanhuyen' => $quanhuyen,
            'params' => $params,
            'xaphuongtheoquanhuyen' => $xaphuongtheoquanhuyen,
            'nghe_cap_2' => $nghe_cap_2,
            'nghe_cap_3' => $nghe_cap_3,
            'nghe_cap_4' => $nghe_cap_4
        ]);
      
    }
    public function show($coSoId)
    {
        $limit=10;
        $params = request()->all();
        $thongtincoso = $this->SinhVienTotNghiepService->getThongTinCoSo($coSoId);
        $data = $this->SinhVienTotNghiepService->getChiTietTongHopTotNghiep($coSoId,$limit,$params);
        $data->appends(request()->input())->links();
        return view('tot_nghiep.chi_tiet_tong_hop_ket_qua_tot_nghiep', [
            'data' => $data,
            'limit' => $limit,
            'params'=>$params,
            'thongtincoso'=>$thongtincoso 
        ]);
    }
    public function edit()
    {  
        return view('tot_nghiep.sua_tong_hop_ket_qua_tot_nghiep');
    }
    public function create()
    {
        $data = $this->SinhVienTotNghiepService->getTenCoSoDaoTao();
        return view('tot_nghiep.them_tong_hop_ket_qua_tot_nghiep',compact('data'));
    }
}
