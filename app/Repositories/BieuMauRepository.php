<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\BieuMauRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\BieuMau;
class BieuMauRepository extends BaseRepository implements BieuMauRepositoryInterface
{
    protected $model;
    public function __construct(
        BieuMau $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'bieu_mau';
    }

    public function createBieuMau($id_co_so,$thoi_gian,$dot,$type){
		return  $this->model->insertGetId([
				'co_so_id' => $id_co_so,
				'type' => $type,
				'dot' =>$dot,
				'thoi_gian' =>$thoi_gian,
		]);
    }
    
    public function getBieuMauTuyenSinh($id_truong, $year,$dot)
	{
		$data =  $this->model->where('co_so_id', '=', $id_truong)
		->where('type', '=', 2)
		->where(DB::raw('YEAR(bieu_mau.thoi_gian)'),$year)
		->where('dot',$dot)
		->first();
		return $data;
	}
}