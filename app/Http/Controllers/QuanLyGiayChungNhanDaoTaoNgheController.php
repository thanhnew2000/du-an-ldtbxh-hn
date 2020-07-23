<?php

namespace App\Http\Controllers;
use App\Services\QuanLyGiayChungNhanDaoTaoNgheService;
use Illuminate\Http\Request;
use App\Http\Requests\QuanLyGiayPhepNghe\storeQuyetDinh;
use App\Http\Requests\QuanLyGiayPhepNghe\updateQuyetDinh;
class QuanLyGiayChungNhanDaoTaoNgheController extends Controller
{
    private $QuanLyGiayChungNhanDaoTaoNgheService;
    public function __construct(QuanLyGiayChungNhanDaoTaoNgheService $QuanLyGiayChungNhanDaoTaoNgheService)
    {
        $this->QuanLyGiayChungNhanDaoTaoNgheService = $QuanLyGiayChungNhanDaoTaoNgheService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = request()->all();
        $limit =20;
        $co_so = $this->QuanLyGiayChungNhanDaoTaoNgheService->get_co_so();
        $data = $this->QuanLyGiayChungNhanDaoTaoNgheService->index($params,$limit);
        return view('quan_ly_giay_phep_hoat_dong.index',[
            'data'=>$data,
            'co_so'=>$co_so,
            'params'=>$params
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $co_so = $this->QuanLyGiayChungNhanDaoTaoNgheService->get_co_so();
        return view('quan_ly_giay_chung_nhan_dao_tao_nghe.create',['co_so'=>$co_so]);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(storeQuyetDinh $request)
    {  
        $data = $request->all();
        $img_giay_phep_hoat_dong =$request->file("anh_quyet_dinh");
        if($img_giay_phep_hoat_dong){
        $path = $request->file('anh_quyet_dinh')->store('uploads/giay-chung-nhan');
        $data['anh_quyet_dinh']=$path;
        }
        $this->QuanLyGiayChungNhanDaoTaoNgheService->createGiayPhep($data);
        return response()->json('thanh_cong', 200);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit()
    {
        $co_so = $this->QuanLyGiayChungNhanDaoTaoNgheService->get_co_so();
        $bac_nghe = config('common.bac_nghe');
        return view('quan_ly_giay_chung_nhan_dao_tao_nghe.edit',['co_so'=>$co_so,'bac_nghe'=>$bac_nghe]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(updateQuyetDinh $request)
    {
        $data = $request->all();
        $img_giay_phep_hoat_dong =$request->file("anh_quyet_dinh");
        if($img_giay_phep_hoat_dong){
        $path = $request->file('anh_quyet_dinh')->store('uploads/giay-chung-nhan');
        $data['anh_quyet_dinh']=$path;
        }else{
            unset($data['anh_quyet_dinh']);
        }
      return $this->QuanLyGiayChungNhanDaoTaoNgheService->updateData($data);
    }

    public function getGiayPhep(Request $request)
    {
        $id = $request->all();
        return $this->QuanLyGiayChungNhanDaoTaoNgheService->getGiayPhep($id);
    }

    public function getGiayPhepId(Request $request)
    {
        $id = $request->all();
        return $this->QuanLyGiayChungNhanDaoTaoNgheService->getGiayPhepId($id);
    }

    public function updateNghe(Request $request)
    {
       $dataNghe = $request->all();
       $diaDiem = $dataNghe['data'];
       $id_giay_chung_nhan = $dataNghe['id_giay_chung_nhan'];
       $chi_tiet_giay_chung_nhan = $this->QuanLyGiayChungNhanDaoTaoNgheService->giayPhepChiTiet($id_giay_chung_nhan);
       foreach ($chi_tiet_giay_chung_nhan as $item) {
           if($item->phan_loai_nghe==1){
             
             $datatest = $this->QuanLyGiayChungNhanDaoTaoNgheService->deleteDataNgheTcSc((int)$item->nghe_id);
           }

           $this->QuanLyGiayChungNhanDaoTaoNgheService->deleteDataNgheChiTiet((int)$item->id);
       }
       foreach ($diaDiem as $key => $listNghe){
        foreach ($listNghe as $key1 => $data){
         if($data['trinh_do']>=5){
             $dataPost = [
                 'co_so_id'=>$dataNghe['co_so_id'],
                 'chi_nhanh_id'=> (int)substr($key,7),
                 'nghe_id'=> $data['nghe_id'],
                 'giay_chung_nhan_id'=>$id_giay_chung_nhan,
                 'quy_mo'=>$data['quy_mo'],
                 'phan_loai_nghe'=>0
             ];
         // DB::table('giay_chung_nhan_chi_tiet')->insert($dataPost);
                $this->QuanLyGiayChungNhanDaoTaoNgheService->insertToGiayChungNhanChiTiet($dataPost);
                }else
                {
                $dataPost = [
                    'bac_nghe'=>$data['trinh_do'],
                    'ten_nganh_nghe'=> $data['nghe_id'],
                    'ma_cap_nghe'=>4
                ];
                $id_nghe =  $this->QuanLyGiayChungNhanDaoTaoNgheService->insertNganhNghe2AndGetId($dataPost);
                $dataPost2 = [
                'co_so_id'=>$dataNghe['co_so_id'],
                'chi_nhanh_id'=> (int)substr($key,7),
                'nghe_id'=> $id_nghe,
                'giay_chung_nhan_id'=>$id_giay_chung_nhan,
                'quy_mo'=>$data['quy_mo'],
                'phan_loai_nghe'=>1,
                ];
                $this->QuanLyGiayChungNhanDaoTaoNgheService->insertToGiayChungNhanChiTiet($dataPost2);
                }
            }
        }     
    }
}
