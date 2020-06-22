<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\DaoTaoNgheVoiDoanhNghiepService;

use App\Http\Requests\DaoTaoNgheVoiDoanhNghiep\UpdateRequest;

class DaoTaoNgheVoiDoanhNghiepController extends Controller
{
    protected $DaoTaoNgheVoiDoanhNghiepService;
    public function __construct(DaoTaoNgheVoiDoanhNghiepService $DaoTaoNgheVoiDoanhNghiepService)
    {
       $this->DaoTaoNgheVoiDoanhNghiepService = $DaoTaoNgheVoiDoanhNghiepService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = request()->all();
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        $data = $this->DaoTaoNgheVoiDoanhNghiepService->index($params,$limit);
        $coso = $this->DaoTaoNgheVoiDoanhNghiepService->getTenCoSoDaoTao();
        $quanhuyen = $this->DaoTaoNgheVoiDoanhNghiepService->getTenQuanHuyen();
        $nghe_cap_2 = $this->DaoTaoNgheVoiDoanhNghiepService->getNganhNghe(2);
        if(isset(request()->devvn_quanhuyen)){
            $xaphuongtheoquanhuyen = $this->DaoTaoNgheVoiDoanhNghiepService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        }else{
            $xaphuongtheoquanhuyen=[];
        }
        
            $nghe_cap_3=$this->DaoTaoNgheVoiDoanhNghiepService->getNganhNghe(3);
            $nghe_cap_4=$this->DaoTaoNgheVoiDoanhNghiepService->getNganhNghe(4);


        $loaiHinh = $this->DaoTaoNgheVoiDoanhNghiepService->getListLoaiHinh();
        $data->appends(request()->input())->links();
        return view('dao_tao_nghe_voi_doanh_nghiep.index', [
            'data' => $data,
            'loaiHinh' => $loaiHinh,
            'limit' => $limit,
            'coso'=> $coso,
            'quanhuyen' => $quanhuyen,
            'params' => $params,
            'xaphuongtheoquanhuyen' => $xaphuongtheoquanhuyen,
            'nghe_cap_2' => $nghe_cap_2,
            'nghe_cap_3' => $nghe_cap_3,
            'nghe_cap_4' => $nghe_cap_4
        ]);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dao_tao_nghe_voi_doanh_nghiep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        $params = request()->all();
        $thongtincoso = $this->DaoTaoNgheVoiDoanhNghiepService->getThongTinCoSo($id);
        $data = $this->DaoTaoNgheVoiDoanhNghiepService->show($id, $limit, $params);
        $data->appends(request()->input())->links();
        return view('dao_tao_nghe_voi_doanh_nghiep.show', [
            'data' => $data,
            'limit' => $limit,
            'params' => $params,
            'thongtincoso' => $thongtincoso
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->DaoTaoNgheVoiDoanhNghiepService->edit($id);
        return view('dao_tao_nghe_voi_doanh_nghiep.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $this->DaoTaoNgheVoiDoanhNghiepService->updateData($id,$request);
        $get_id = $this->DaoTaoNgheVoiDoanhNghiepService->findById($id);
        return redirect()->route('xuatbc.dao-tao-nghe-doanh-nghiep.show', ['id' => $get_id->co_so_id])->with('thongbao','Sửa số liệu đào tạo nghề với doanh nghiệp thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
