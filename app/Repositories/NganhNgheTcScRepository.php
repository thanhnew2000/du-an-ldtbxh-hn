<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;
use App\Models\NganhNgheTcSc;

class NganhNgheTcScRepository extends BaseRepository implements NganhNgheTcScRepositoryInterface
{
    public function __construct(
        NganhNgheTcSc $nganhNghe
    ) {
        parent::__construct();
        $this->model = $nganhNghe;
    }

    public function getTable()
    {
        return 'nganh_nghe_tc_sc';
    }

    public function getNgheTcSc($id)
    {
      $data = $this->model->select(['nganh_nghe_tc_sc.ten_nganh_nghe','nganh_nghe_tc_sc.bac_nghe'])->where('id','=',$id)->first();
      return $data;
    }

    public function deleteDataNgheTcSc($id)
    {
      return $this->model->where('id',$id)->delete();
    }

    public function insertNganhNghe2AndGetId($dataInsert){
        $data = $this->model->insertGetId($dataInsert);
        return $data;
    }

    public function getNganhNgheSoCapDuoi3Thang($arrayNghe){
        $data =  $this->model->whereIn('nganh_nghe_tc_sc.id',$arrayNghe)
        ->get()->groupBy('bac_nghe');
        return $data;
    }
    
    public function getNganhNgheSoCapDuoi3ThangName($arrayNghe){
        $data =  $this->model->whereIn('nganh_nghe_tc_sc.id',$arrayNghe)
        ->select('nganh_nghe_tc_sc.ten_nganh_nghe','nganh_nghe_tc_sc.id')
        ->get();
        return $data;
	}

}
