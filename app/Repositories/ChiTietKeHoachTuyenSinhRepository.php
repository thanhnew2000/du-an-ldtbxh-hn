<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\ChiTietKeHoachTuyenSinh;
use Carbon\Carbon;

class ChiTietKeHoachTuyenSinhRepository extends BaseRepository implements ChiTietKeHoachTuyenSinhRepositoryInterface
{
    protected $model;

	public function __construct(ChiTietKeHoachTuyenSinh $model)
	{
		parent::__construct();
		$this->model = $model;
    }

    public function getTable()
    {
        return 'chi_tiet_ke_hoach_tuyen_sinh';
    }

    public function getChiTietKeHoachTuyenSinh($ke_hoach_id){
        $data = $this->model->where('ke_hoach_tuyen_sinh_id',$ke_hoach_id)
        ->get();
        return $data;
    }

    public function getOneChiTietKeHoachTuyenSinh($id){
        $data = $this->model->find($id);
        return $data;
    }

    public function createCtKeHoachTuyenSinh($arrayData){
		return $this->model->insertGetId($arrayData);
    }
    public function updateCtKeHoachTuyenSinh($ke_hoach_id,$key,$arrayData){
		return $this->model->where('ke_hoach_tuyen_sinh_id',$ke_hoach_id)->where('id',$key)->update($arrayData);
	}
}
