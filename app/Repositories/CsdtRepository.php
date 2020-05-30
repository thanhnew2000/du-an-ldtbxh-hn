<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;


class CsdtRepository extends BaseRepository implements CsdtRepositoryInterface
{
    public function getTable()
    {
        return 'co_so_dao_tao';
    }
    public function getCsdt()
    {
        return $this->table = DB::table($this->getTable())
            ->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'co_so_dao_tao.ma_loai_hinh_co_so')
            ->join('quyet_dinh_thanh_lap_csdt', 'co_so_dao_tao.quyet_dinh_id', 'quyet_dinh_thanh_lap_csdt.id')
            ->select('co_so_dao_tao.*', 'loai_hinh_co_so.loai_hinh_co_so', DB::raw('quyet_dinh_thanh_lap_csdt.ten as qd_ten'))
            ->get();
    }
}
