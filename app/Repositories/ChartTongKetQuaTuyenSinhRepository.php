<?php


namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\TuyenSinh;
use Carbon\Carbon;

class ChartTongKetQuaTuyenSinhRepository extends BaseRepository
{
    public function getTable(){
		return 'tuyen_sinh';
	}

    public function getTongKetQuaTuyenSinhChart(){
        
        // $query = $this->table
        // ->where('nam', Carbon::now()->year) 

        // ->whereBetween('nam', [Carbon::now()->year - 4, Carbon::now()->year])
        // ->select('nam',
        // DB::raw('SUM(so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang'),
        // DB::raw('SUM(so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap'),
        // DB::raw('SUM(so_luong_sv_So_cap) as so_luong_sv_So_cap'),
        // DB::raw('SUM(so_luong_sv_he_khac) as so_luong_sv_he_khac')
        // );
       
        // $dataCTTS = (array)$query->first();
        
        
        // $query ->select('nam',
        // DB::raw('SUM(so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang'),
        // DB::raw('SUM(so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap'),
        // DB::raw('SUM(so_luong_sv_So_cap) as so_luong_sv_So_cap'),
        // DB::raw('SUM(so_luong_sv_he_khac) as so_luong_sv_he_khac')
        // );
         $query = $this->table
                ->select('nam', 
                DB::raw('SUM(so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang'),
                DB::raw('SUM(so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap'),
                DB::raw('SUM(so_luong_sv_So_cap) as so_luong_sv_So_cap'),
                DB::raw('SUM(so_luong_sv_he_khac) as so_luong_sv_he_khac'))
                ->groupBy('nam')
                ->get();
                // if($query == []){
                //             $query = [
                //                 'so_luong_sv_Cao_dang'=> 0,
                //                 'so_luong_sv_Trung_cap'=> 0,
                //                 'so_luong_sv_So_cap'=> 0,
                //                 'so_luong_sv_he_khac'=> 0
                //             ];
                //         }
                //         else{
                     
                //             $query['so_luong_sv_Cao_dang'] = isset($query['so_luong_sv_Cao_dang'])  ?  $query['so_luong_sv_Cao_dang'] : 0 ;
                //             $query['so_luong_sv_Trung_cap'] = isset($query['so_luong_sv_Trung_cap'])  ?  $query['so_luong_sv_Trung_cap'] : 0 ;
                //             $query['so_luong_sv_So_cap'] = isset($query['so_luong_sv_So_cap'])  ?  $query['so_luong_sv_So_cap'] : 0 ;
                //             $query['so_luong_sv_he_khac'] = isset($query['so_luong_sv_he_khac'])  ?  $query['so_luong_sv_he_khac'] : 0 ;
                //         }
                        
        return  $query;
        
        
        
        
        
      
        // return $dataTKQTS;

        // if($data == []){
        //         $data = [
        //             'so_luong_sv_Cao_dang'=> 0,
        //             'so_luong_sv_Trung_cap'=> 0,
        //             'so_luong_sv_So_cap'=> 0,
        //             'so_luong_sv_he_khac'=> 0
        //         ];
        //     }
        //     else{
         
        //         $data['so_luong_sv_Cao_dang'] = isset($data['so_luong_sv_Cao_dang'])  ?  $data['so_luong_sv_Cao_dang'] : 0 ;
        //         $data['so_luong_sv_Trung_cap'] = isset($data['so_luong_sv_Trung_cap'])  ?  $data['so_luong_sv_Trung_cap'] : 0 ;
        //         $data['so_luong_sv_So_cap'] = isset($data['so_luong_sv_So_cap'])  ?  $data['so_luong_sv_So_cap'] : 0 ;
        //         $data['so_luong_sv_he_khac'] = isset($data['so_luong_sv_he_khac'])  ?  $data['so_luong_sv_he_khac'] : 0 ;
        //     }
    }

    //in ra màn hình dashboard Biểu đồ thống kê kết quả tuyển sinh 
   

} 