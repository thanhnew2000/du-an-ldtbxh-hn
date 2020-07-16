<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CoSoDaoTao\StoreRequest;
use App\Giay_chung_nhan;
class GiayPhepDangKyController extends Controller
{
   public function getDiaChiCoSo(Request $request)
   {
       $data = $request->all();
       $chi_nhanh =DB::table('chi_nhanh_dao_tao')->where('co_so_id',$data['id'])->get();
       return $chi_nhanh;
   }

   public function getNghe(Request $request)
   {
       $id = $request->id;
       if($id>4){
       $data = DB::table('nganh_nghe')->where('id', 'like', $id.'%')->where('ma_cap_nghe', 4)->orderBy('ten_nganh_nghe')->get();
       }else{
        $data = DB::table('nganh_nghe')->where('id', 'like', '6%')->where('ma_cap_nghe', 4)->orderBy('ten_nganh_nghe')->get();
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
            DB::table('giay_chung_nhan_chi_tiet')->insert($dataPost);
        }else{
            $dataPost = [
                'bac_nghe'=>$data['trinh_do'],
                'ten_nganh_nghe'=> $data['nghe_id'],
                'ma_cap_nghe'=>4
            ];
            $id_nghe = DB::table('nganh_nghe_2')->insertGetId($dataPost);
            $dataPost2 = [
                'co_so_id'=>$getData['co_so_id'],
                'chi_nhanh_id'=> (int)substr($key,7),
                'nghe_id'=> $id_nghe,
                'giay_chung_nhan_id'=>$getData['id_giay_chung_nhan'],
                'quy_mo'=>$data['quy_mo_tuyen_sinh']
            ];
            DB::table('giay_chung_nhan_chi_tiet')->insert($dataPost2);
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
