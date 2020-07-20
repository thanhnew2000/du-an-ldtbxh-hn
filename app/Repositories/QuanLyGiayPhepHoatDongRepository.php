<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\QuyetDinh;
use App\Repositories\QuanLyGiayPhepHoatDongRepositoryInterface;
use Carbon\Carbon;

class QuanLyGiayPhepHoatDongRepository extends BaseRepository implements QuanLyGiayPhepHoatDongRepositoryInterface
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
        return 'giay_phep';
    }


    public function index($params,$limit)
    {
        $queryBulder = $this->model::query();

        if (isset($params['co_so_id']) && $params['co_so_id'] != null) {
			$queryBulder->where('co_so_id', '=', $params['co_so_id']);
        }else{
            $queryBulder->where('co_so_id', '=',0);
        }
        
		if (isset($params['so_quyet_dinh']) && $params['so_quyet_dinh'] != null && isset($params['co_so_id']) && $params['co_so_id'] != null) {
			$queryBulder->where('so_quyet_dinh', 'like', '%'.$params['so_quyet_dinh'].'%');
        }
        return $queryBulder->orderBy("id")->paginate($limit);
    }

    public function get_co_so()
    {
       return DB::table('co_so_dao_tao')->get();
    }

    public function createGiayPhep($data)
    {
        $this->model::create($data);
    }

    public function getGiayPhep($id)
    {
       return $this->model->where('co_so_id',$id)->get();
    }

    public function getGiayPhepId($id)
    {
        return $this->model->find($id)->first();
    }

    public function updateData($id,$data)
    {
        return $this->model->find($id)->update($data);
    }


    
}