<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\GiayPhepDangKyNghe;
use Carbon\Carbon;

class ChartTongSoLuongTruongRepository extends BaseRepository
{
    protected $model;

    public function __construct(GiayPhepDangKyNghe $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable(){
        
        return 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao';
    }
    

    public function getTongSoLuongTruongChart(){
        $cao_dang = 6;
        $trung_cap = 5;
        $query['cao_dang'] = $this->model
        ->where('nghe_id','like', $cao_dang .'%')->count();

        $query['trung_cap'] = $this->model
        ->where('nghe_id','like', $trung_cap .'%')->count();
       
        return $query;
    }
}