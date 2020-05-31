<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\QlsvRepositoryInterface;

class QlsvRepository extends BaseRepository implements QlsvRepositoryInterface
{
    public function getTable()
    {
        return 'sv_dang_quan_ly';
    }
    public function getQlsv()
    {
        return $this->table
            ->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'sv_dang_quan_ly.co_so_id')
            // ->join('nganh_nghe', 'nganh_nghe.id', '=', 'sv_dang_quan_li.nghe_id')
            // ->join('co_so_dao_tao', 'loai_hinh_co_so.ma_loai_hinh_co_so', '=', 'sv_dang_quan_ly.')
            ->select(
                'sv_dang_quan_ly.*',
                'co_so_dao_tao.ten',
                DB::raw('co_so_dao_tao.ten as cs_ten')
            )
            ->get();
    }
}