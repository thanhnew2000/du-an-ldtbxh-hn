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
            ->join('nganh_nghe', 'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
            ->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
            ->select(
                'sv_dang_quan_ly.*',
                'co_so_dao_tao.ten',
                'loai_hinh_co_so.loai_hinh_co_so',
                DB::raw('co_so_dao_tao.ten as cs_ten'),
            )
            ->paginate(10);
    }
}