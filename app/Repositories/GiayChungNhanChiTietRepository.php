<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;
use App\Models\GiayChungNhanChiTiet;

class GiayChungNhanChiTietRepository extends BaseRepository implements GiayChungNhanChiTietRepositoryInterface
{
    public function __construct(
        GiayChungNhanChiTiet $nganhNghe
    ) {
        parent::__construct();
        $this->model = $nganhNghe;
    }

    public function getTable()
    {
        return 'giay_chung_nhan_chi_tiet';
    }

    public function giayPhepChiTiet($id)
    {
       return $this->model->where('giay_chung_nhan_id',$id)->get();
    }
    public function deleteDataNgheChiTiet($id)
    {
      return $this->model->where('id',$id)->delete();
     
    }
    public function insertToGiayChungNhanChiTiet($dataInsert){
       return $this->model->insert($dataInsert);
    }
}
