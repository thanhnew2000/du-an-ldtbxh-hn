<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Giay_chung_nhan;


class GiayPhepDangKyRepository extends BaseRepository implements GiayPhepDangKyRepositoryInterface
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
        return 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao';
    }

    public function getNganhNgheMaCap($id,$ma_cap){
       $data = DB::table('nganh_nghe')->where('id', 'like', $id.'%')->where('ma_cap_nghe', $ma_cap)->orderBy('ten_nganh_nghe')->get();
       return  $data ;
    }

    public function getChiNhanhTheoCoSo($id_co_so){
        $data = DB::table('chi_nhanh_dao_tao')->where('co_so_id',$id_co_so)->get();
        return  $data ;
     }

     public function insertToGiayChungNhanChiTiet($dataInsert){
        $data =  DB::table('giay_chung_nhan_chi_tiet')->insert($dataInsert);
        return $data;
     }

     public function insertNganhNghe2AndGetId($dataInsert){
        $data =  DB::table('nganh_nghe_tc_sc')->insertGetId($dataInsert);
        return $data;
     }

     public function getNgheCoSo($id_co_so){
        $manganhnghe =$this->model
        ->join('giay_chung_nhan_chi_tiet','giay_chung_nhan_chi_tiet.giay_chung_nhan_id','=','giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.id')
        ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id', '=', $id_co_so)
        ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.trang_thai',1)
		->groupBy('giay_chung_nhan_chi_tiet.nghe_id')
		->orderBy('giay_chung_nhan_chi_tiet.phan_loai_nghe','asc')	
		->select('giay_chung_nhan_chi_tiet.id','giay_chung_nhan_chi_tiet.nghe_id','giay_chung_nhan_chi_tiet.phan_loai_nghe')
		->get();
		return $manganhnghe;
    }
    
    public function getNgheofAllCoSo(){
        $manganhnghe =$this->model
        ->join('giay_chung_nhan_chi_tiet','giay_chung_nhan_chi_tiet.giay_chung_nhan_id','=','giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.id')
        ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.trang_thai',1)
        ->groupBy('giay_chung_nhan_chi_tiet.nghe_id')
		->orderBy('giay_chung_nhan_chi_tiet.phan_loai_nghe','asc')	
		->select('giay_chung_nhan_chi_tiet.id','giay_chung_nhan_chi_tiet.nghe_id','giay_chung_nhan_chi_tiet.phan_loai_nghe')
        // ->distinct()
        ->get();
		return $manganhnghe;
	}
}
