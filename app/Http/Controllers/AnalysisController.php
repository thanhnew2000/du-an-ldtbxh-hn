<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\ChartTongSoLuongTruongService;
use App\Services\ChartTongKetQuaTuyenSinhService;

class AnalysisController extends Controller
{
    // hieupt chart 
    protected $ChartTongSoLuongTruongService;
    protected $ChartTongKetQuaTuyenSinhService;
    


    public function __construct(
        ChartTongSoLuongTruongService $ChartTongSoLuongTruongService,
        ChartTongKetQuaTuyenSinhService $ChartTongKetQuaTuyenSinhService


    ){
        $this->ChartTongSoLuongTruongService = $ChartTongSoLuongTruongService;
        $this->ChartTongKetQuaTuyenSinhService = $ChartTongKetQuaTuyenSinhService;


    }
    // end hieupt chart

    function index(){
        
    
        // thống kê cơ sở đào tạo
        $data=[];
        $cs_dao_tao = DB::table('loai_hinh_co_so')->get();
        foreach ($cs_dao_tao as $item) {
            $count_loaihinh = DB::table('co_so_dao_tao')->where('ma_loai_hinh_co_so',$item->id)->count();
            $object = new \stdClass();
            $object->label = $item->loai_hinh_co_so;
            $object->data = $count_loaihinh;
            array_push($data,$object);
        }
        $data_return =json_encode($data);
        // thống kế tuyển sinh và tốt nghiệp
        // tuyển sinh
        // $data_tuyen_sinh = [];
        // $data_tot_nghiep = [];
        // $tuyensinh = DB::table('tuyen_sinh')->select('nam','so_luong_sv_Cao_dang','so_luong_sv_So_cap','so_luong_sv_he_khac')->limit(5)->orderBy('nam')->get();
        // $totnghiep = DB::table('sv_tot_nghiep')->select('nam','Tong_SoNguoi_TN')->limit(5)->orderBy('nam')->get();
        // dd($totnghiep, $tuyensinh);
        // for ($i=0; $i < count($tuyensinh) ; $i++) {
        //     $array_tuyensinh = [$tuyensinh[$i]->nam,$tuyensinh[$i]->so_luong_sv_Cao_dang+$tuyensinh[$i]->so_luong_sv_So_cap+$tuyensinh[$i]->so_luong_sv_he_khac];
        //     array_push($data_tuyen_sinh,$array_tuyensinh);
        //     $array_totnghiep = [$totnghiep[$i]->nam,$totnghiep[$i]->Tong_SoNguoi_TN];
        //     array_push($data_tot_nghiep,$array_totnghiep);
        // }
        // $data_json_tot_nghiep =json_encode($data_tot_nghiep);
        // $data_json_tuyen_sinh =json_encode($data_tuyen_sinh);


        // return view('index',['data'=>$data_return,'data_json_tot_nghiep'=>$data_json_tot_nghiep,'data_json_tuyen_sinh'=>$data_json_tuyen_sinh]);
        
        
        



        // $query = DB::table('tuyen_sinh')
        // ->where('nam', Carbon::now()->year) 
        // ->select('nam',
        // DB::raw('SUM(so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang'),
        // DB::raw('SUM(so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap'),
        // DB::raw('SUM(so_luong_sv_So_cap) as so_luong_sv_So_cap'),
        // DB::raw('SUM(so_luong_sv_he_khac) as so_luong_sv_he_khac')
        // );
       
        // $dataCTTS = (array)$query->first();
        

        // if($dataCTTS ==[]){
        //     $dataCTTS = [
        //         'so_luong_sv_Cao_dang'=> 0,
        //         'so_luong_sv_Trung_cap'=> 0,
        //         'so_luong_sv_So_cap'=> 0,
        //         'so_luong_sv_he_khac'=> 0
        //     ];
        // }
        // else{
        //     $dataCTTS['so_luong_sv_Cao_dang'] = isset($dataCTTS['so_luong_sv_Cao_dang'])  ?  $dataCTTS['so_luong_sv_Cao_dang'] : 0 ;
        //     $dataCTTS['so_luong_sv_Trung_cap'] = isset($dataCTTS['so_luong_sv_Trung_cap'])  ?  $dataCTTS['so_luong_sv_Trung_cap'] : 0 ;
        //     $dataCTTS['so_luong_sv_So_cap'] = isset($dataCTTS['so_luong_sv_So_cap'])  ?  $dataCTTS['so_luong_sv_So_cap'] : 0 ;
        //     $dataCTTS['so_luong_sv_he_khac'] = isset($dataCTTS['so_luong_sv_he_khac'])  ?  $dataCTTS['so_luong_sv_he_khac'] : 0 ;
        // }   




        // HIEUPT CHART 7/2/2020
        $tongkqtuyensinh = $this->ChartTongKetQuaTuyenSinhService->getTongKetQuaTuyenSinhChart();
        $tongsoluongtruong = $this->ChartTongSoLuongTruongService->getTongSoLuongTruongChart();
  
        // dd($kq[0]->so_luong_sv_So_cap);
       

       


        return view('index',['data'=>$data_return],compact('tongkqtuyensinh','tongsoluongtruong'));
    }
}