<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\GiayPhep;

class GiayPhepRepository extends BaseRepository implements GiayPhepRepositoryInterface
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

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }
    public function getGiayPhep($id)
    {
        return $this->table
            ->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'giay_phep.co_so_id')
            ->select('giay_phep.*', DB::raw('co_so_dao_tao.ten as ten_co_so'))
            ->where('giay_phep.co_so_id', $id)
            ->paginate(10);
    }
}
