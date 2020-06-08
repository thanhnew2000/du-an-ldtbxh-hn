<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CoSoDaoTaoRepository extends BaseRepository implements CoSoDaoTaoRepositoryInterface
{
    public function getTable()
    {
        return 'co_so_dao_tao';
    }
    public function getCsdt($params)
    {
        $query = $this->table->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'co_so_dao_tao.ma_loai_hinh_co_so')
            ->join('quyet_dinh_thanh_lap_csdt', 'co_so_dao_tao.quyet_dinh_id', 'quyet_dinh_thanh_lap_csdt.id')
            ->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
            ->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
            ->select(
                'co_so_dao_tao.*',
                'loai_hinh_co_so.loai_hinh_co_so',
                DB::raw('quyet_dinh_thanh_lap_csdt.ten as qd_ten'),
                DB::raw('devvn_xaphuongthitran.name as tenxaphuong'),
                DB::raw('devvn_quanhuyen.name as tenquanhuyen')
            );
        if (isset($params['ten_co_so']) && $params['ten_co_so'] != null) {
            $name = '%' . $params['ten_co_so'] . '%';
            $query->where('co_so_dao_tao.ten', 'like', $name);
        }
        if (isset($params['ma_don_vi']) && $params['ma_don_vi'] != null) {
            $query->where('co_so_dao_tao.ma_don_vi', $params['ma_don_vi']);
        }
        if (isset($params['loai_hinh_co_so']) && $params['loai_hinh_co_so'] != null) {
            $query->where('co_so_dao_tao.ma_loai_hinh_co_so', $params['loai_hinh_co_so']);
        }
        if (isset($params['quanhuyen']) && $params['quanhuyen'] != null) {
            $query->where('co_so_dao_tao.maqh', $params['quanhuyen']);
        }
        return $query->orderByDesc('co_so_dao_tao.id')
            ->paginate(10);
    }

    public function getSingleCsdt($id)
    {
        return $this->table->join('co_quan_chu_quan', 'co_so_dao_tao.co_quan_chu_quan_id', '=', 'co_quan_chu_quan.id')
            ->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'co_so_dao_tao.ma_loai_hinh_co_so')
            ->join('quyet_dinh_thanh_lap_csdt', 'co_so_dao_tao.quyet_dinh_id', 'quyet_dinh_thanh_lap_csdt.id')
            ->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
            ->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
            ->select(
                'co_so_dao_tao.*',
                'loai_hinh_co_so.loai_hinh_co_so',
                DB::raw('co_quan_chu_quan.ten as cq_ten'),
                DB::raw('co_so_dao_tao.ten as csdt_ten'),
                DB::raw('quyet_dinh_thanh_lap_csdt.ten as qd_ten'),
                DB::raw('devvn_xaphuongthitran.name as tenxaphuong'),
                DB::raw('devvn_quanhuyen.name as tenquanhuyen')
            )
            ->where('co_so_dao_tao.id', $id)
            ->get();
    }
}
