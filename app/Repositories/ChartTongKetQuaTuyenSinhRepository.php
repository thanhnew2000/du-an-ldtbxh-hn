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
        
        
         $query = $this->table
                ->select('nam', 
                DB::raw('SUM(so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang'),
                DB::raw('SUM(so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap'),
                DB::raw('SUM(so_luong_sv_So_cap) as so_luong_sv_So_cap'),
                DB::raw('SUM(so_luong_sv_he_khac) as so_luong_sv_he_khac'))
                ->groupBy('nam')
                ->get();
                
                        
        return  $query;

    }
} 