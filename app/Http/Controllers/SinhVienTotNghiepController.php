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
    public function edit($id)
    {  
        $data_tuyen_sinh_id = $this->SinhVienTotNghiepService->getSuaSoLieuTotNghiep($id);
        return view('tot_nghiep.sua_tong_hop_ket_qua_tot_nghiep',['data_tuyen_sinh_id'=>$data_tuyen_sinh_id]);
    }

    public function update($id,Request $request)
    {
        $data = $this->SinhVienTotNghiepService->update($id,$request);
        $data_tot_nghiep =$this->SinhVienTotNghiepService->findById($id);
        return redirect()->route('xuatbc.chi-tiet-tong-hop', ['id' => $data_tot_nghiep->co_so_id])->with('thongbao','Sửa số liệu tuyển sinh thành công');
    }

    public function create()
    {
        $data = $this->SinhVienTotNghiepService->getTenCoSoDaoTao();
        return view('tot_nghiep.them_tong_hop_ket_qua_tot_nghiep',compact('data'));
    }
    public function store(Request $request)
    {
        $requestParams = $request->all();
        $data = [
            [
                'id' => "co_so_id",
                'value' => $requestParams["co_so_id"],
            ],
            [
                'id'=>'nghe_id',
                'value'=>$requestParams["nghe_id"]
            ],
            [
                'id'=>'nam',
                'value'=>$requestParams["nam"]
            ],
            [
                'id'=>'dot',
                'value'=>$requestParams["dot"]
            ],
        ];

        $result = $this->SinhVienTotNghiepService->getCheckTonTaiSoLieuTotNghiep($data, $requestParams);
        return redirect($result['route'])->with('thongbao', $result['message']);
    }


    public function getCheckTonTaiSoLieuTotNghiep(Request $request)
    {
        $datacheck=  $request->datacheck;
        $getdata = $this->SinhVienTotNghiepService->getSoLieu($datacheck);
        if($getdata == 'tontai'){
            return 1;
        }else if($getdata == null){
            return 2;
        }else{
            return $urledit = route('xuatbc.sua-tong-hop', ['id' => $getdata->id]);
        }
    }
}