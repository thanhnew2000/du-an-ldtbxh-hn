<?php


namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class ChiNhanhRepository extends BaseRepository implements ChiNhanhRepositoryInterface
{
    public function getTable()
    {
        return 'chi_nhanh_dao_tao';
    }

    public function getChiNhanh()
    {
        return $this->table->join('co_so_dao_tao', 'chi_nhanh_dao_tao.co_so_id', '=', 'co_so_dao_tao.id')
            ->select('chi_nhanh_dao_tao.*', 'co_so_dao_tao.ten')
            ->orderByDesc('chi_nhanh_dao_tao.id')
            ->paginate(10);
    }
    public function getSingleChiNhanh($id)
    {
        return $this->table->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'chi_nhanh_dao_tao.co_so_id')
            ->where('chi_nhanh_dao_tao.id', $id)
            ->select('chi_nhanh_dao_tao.*', 'co_so_dao_tao.*')
            ->get();
    }
}
