<?php


namespace App\Repositories;

use App\Models\QuyetDinh;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class QuyetDinhRepository extends BaseRepository implements QuyetDinhRepositoryInterface
{
    protected $model;
    public function __construct(
        QuyetDinh $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'quyet_dinh_thanh_lap_csdt';
    }

    public function createQuyetDinh($attributes = [])
    {
        $arrayInsert = [
            'so_quyet_dinh' => $attributes['so_quyet_dinh'],
            'ngay_ban_hanh' => $attributes['ngay_ban_hanh'],
            'ngay_hieu_luc' => $attributes['ngay_hieu_luc'],
            'ngay_het_han' => $attributes['ngay_het_han'],
            'anh_quyet_dinh' => $attributes['anhQuyetDinh'],
            'co_so_id' => $attributes['co_so_id']
        ];
        return $this->model->create($arrayInsert);
    }
}
