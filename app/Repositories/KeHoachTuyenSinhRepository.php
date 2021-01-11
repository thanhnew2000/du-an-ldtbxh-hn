<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\KeHoachTuyenSinh;
use Carbon\Carbon;

class KeHoachTuyenSinhRepository extends BaseRepository implements KeHoachTuyenSinhRepositoryInterface
{
    protected $model;

	public function __construct(KeHoachTuyenSinh $model)
	{
		parent::__construct();
		$this->model = $model;
    }

    public function getTable()
    {
        return 'ke_hoach_tuyen_sinh';
    }

    public function createKeHoach($id_co_so,$nam){
		return  $this->model->insertGetId([
				'co_so_id' => $id_co_so,
				'nam' =>$nam,
		]);
    }
    
    public function getKeHoachTuyenSinhofCoSo($id_truong, $year)
	{
		$data = $this->model->where('co_so_id', '=',$id_truong)
		->where('nam',$year)->select('id')
        ->first();
		return $data;
	}

}
