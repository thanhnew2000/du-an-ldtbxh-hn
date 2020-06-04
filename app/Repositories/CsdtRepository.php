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
        return $this->table->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'co_so_dao_tao.ma_loai_hinh_co_so')
            ->join('quyet_dinh_thanh_lap_csdt', 'co_so_dao_tao.quyet_dinh_id', 'quyet_dinh_thanh_lap_csdt.id')
            ->select('co_so_dao_tao.*', 'loai_hinh_co_so.loai_hinh_co_so', DB::raw('quyet_dinh_thanh_lap_csdt.ten as qd_ten'))
            ->orderByDesc('co_so_dao_tao.id')
            ->paginate(10);
    }

    public function getSingleCsdt($id)
    {
        return $this->table->join('co_quan_chu_quan','co_so_dao_tao.co_quan_chu_quan_id','=', 'co_quan_chu_quan.id' )
        ->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'co_so_dao_tao.ma_loai_hinh_co_so')
        ->join('quyet_dinh_thanh_lap_csdt', 'co_so_dao_tao.quyet_dinh_id', 'quyet_dinh_thanh_lap_csdt.id')
        ->select('co_so_dao_tao.*','loai_hinh_co_so.loai_hinh_co_so', DB::raw('co_quan_chu_quan.ten as cq_ten'), DB::raw('co_so_dao_tao.ten as csdt_ten'), DB::raw('quyet_dinh_thanh_lap_csdt.ten as qd_ten'))
        ->where('co_so_dao_tao.id', $id)
        ->get();
    }
}
