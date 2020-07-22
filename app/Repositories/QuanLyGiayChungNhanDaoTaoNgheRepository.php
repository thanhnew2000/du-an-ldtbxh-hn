<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Giay_chung_nhan;
use App\Repositories\QuanLyGiayChungNhanDaoTaoNgheRepositoryInterface;
use Carbon\Carbon;

class QuanLyGiayChungNhanDaoTaoNgheRepository extends BaseRepository implements QuanLyGiayChungNhanDaoTaoNgheRepositoryInterface
{
    protected $model;
    public function __construct(
        Giay_chung_nhan $model
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

    public function giayPhepChiTiet($id)
    {
       return DB::table('giay_chung_nhan_chi_tiet')->where('giay_chung_nhan_id',$id)->get();
    }

    public function getNgheTcSc($id)
    {
        return DB::table('nganh_nghe_tc_sc')->select(['nganh_nghe_tc_sc.ten_nganh_nghe','nganh_nghe_tc_sc.bac_nghe'])->where('id',$id)->first();
    }

    public function getNgheTcCd($id)
    {
        return DB::table('nganh_nghe')->select(['nganh_nghe.ten_nganh_nghe','nganh_nghe.bac_nghe'])->where('id',$id)->first();
    }

    public function getChiNhanh($co_so_id)
    {
        return DB::table('chi_nhanh_dao_tao')->where('co_so_id',$co_so_id)->get();
    }

   public function deleteDataNgheTcSc($id)
   {
     return DB::table('nganh_nghe_tc_sc')->where('id',$id)->delete();
   }

   public function deleteDataNgheChiTiet($id)
   {
    return DB::table('giay_chung_nhan_chi_tiet')->where('id',$id)->delete();
    
   }
    public function insertToGiayChungNhanChiTiet($dataInsert){
        $data =  DB::table('giay_chung_nhan_chi_tiet')->insert($dataInsert);
        return $data;
    }

    public function insertNganhNghe2AndGetId($dataInsert){
        $data =  DB::table('nganh_nghe_tc_sc')->insertGetId($dataInsert);
        return $data;
    }
    
}