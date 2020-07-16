<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\GiayPhep;
use App\Repositories\QuanLyGiayPhepHoatDongRepositoryInterface;
use Carbon\Carbon;

class QuanLyGiayPhepHoatDongRepository extends BaseRepository implements QuanLyGiayPhepHoatDongRepositoryInterface
{
    protected $model;
    public function __construct(
        GiayPhep $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'giay_phep';
    }


    public function index($params,$limit)
    {
        $queryBulder = $this->model
        ->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'giay_phep.co_so_id')
        ->select('giay_phep.*', DB::raw('co_so_dao_tao.ten as ten_co_so'))
        ->where('giay_phep.co_so_id', 27);
         return $queryBulder->orderBy('giay_phep.ngay_ban_hanh')->paginate($limit);
    }
}