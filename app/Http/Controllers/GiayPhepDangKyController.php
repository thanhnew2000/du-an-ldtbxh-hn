<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CoSoDaoTao\StoreRequest;
use App\Giay_chung_nhan;
use App\Services\GiayPhepDangKyService;

class GiayPhepDangKyController extends Controller
{

    protected $GiayPhepDangKyService;

    public function __construct(GiayPhepDangKyService $GiayPhepDangKyService)
    {
        $this->GiayPhepDangKyService = $GiayPhepDangKyService;
    }


   public function getDiaChiCoSo(Request $request)
   {
       $data = $request->all();
    //    DB::table('chi_nhanh_dao_tao')->where('co_so_id',$data['id'])->get();
       $chi_nhanh = $this->GiayPhepDangKyService->getChiNhanhTheoCoSo($data['id']);
       return $chi_nhanh;
   }

   public function getNghe(Request $request)
   {
       $id = $request->id;
       if($id>4){
             $data = $this->GiayPhepDangKyService->getNganhNgheMaCap($id,4);
       }else{
             $data = $this->GiayPhepDangKyService->getNganhNgheMaCap(6,4);
       }
       return $data;
   }

   public function storeAddNghe(Request $request)
   {
        $getData = $request->all();
        $diaDiem = $getData['data'];
        // dd($getData);
        foreach ($diaDiem as $key => $listNghe){
           foreach ($listNghe as $key1 => $data){
            if($data['trinh_do']>=5){
                $dataPost = [
                    'co_so_id'=>$getData['co_so_id'],
                    'chi_nhanh_id'=> (int)substr($key,7),
                    'nghe_id'=> $data['nghe_id'],
                    'giay_chung_nhan_id'=>$getData['id_giay_chung_nhan'],
                    'quy_mo'=>$data['quy_mo_tuyen_sinh']
                ];
            // DB::table('giay_chung_nhan_chi_tiet')->insert($dataPost);
            $this->GiayPhepDangKyService->insertToGiayChungNhanChiTiet($dataPost);
        }else{
            $dataPost = [
                'bac_nghe'=>$data['trinh_do'],
                'ten_nganh_nghe'=> $data['nghe_id'],
                'ma_cap_nghe'=>4
            ];
            $id_nghe =  $this->GiayPhepDangKyService->insertNganhNghe2AndGetId($dataPost);
            $dataPost2 = [
                'co_so_id'=>$getData['co_so_id'],
                'chi_nhanh_id'=> (int)substr($key,7),
                'nghe_id'=> $id_nghe,
                'giay_chung_nhan_id'=>$getData['id_giay_chung_nhan'],
                'quy_mo'=>$data['quy_mo_tuyen_sinh']
            ];
            $this->GiayPhepDangKyService->insertToGiayChungNhanChiTiet($dataPost2);
        }
        }
          
    }
   }

   public function addGiayChungNhan(StoreRequest $request)
   {
        $data = $request->all();
        $img_giay_chung_nhan =$request->file("anh_quyet_dinh");
        if($img_giay_chung_nhan){
        $path = $request->file('anh_quyet_dinh')->store('uploads/giay-chung-nhan');
        
        $data['anh_quyet_dinh']=$path;
    }
        $id_giay_chung_nhan = Giay_chung_nhan::create($data);
        return response()->json($id_giay_chung_nhan->id, 200);
   }
}
