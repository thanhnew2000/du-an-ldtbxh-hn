<?php 
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
class SoLieuTuyenSinhRepository extends BaseRepository implements SoLieuTuyenSinhInterface {

	//lay model
	public function getTable(){
		 //return \App\Products::class;
		return 'tuyen_sinh';

	}

	public function getSoLuongTuyenSinh($limit){
		$nam= Carbon::now()->year;
		return $this->table->where('nam', '=', $nam)->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
		->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
		->select('tuyen_sinh.*', 'co_so_dao_tao.ten','loai_hinh_co_so.loai_hinh_co_so')
		->paginate($limit);
	}

	public function getChiTietSoLuongTuyenSinh($id){
		return $this->table->where('tuyen_sinh.id', '=', $id)->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
		->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
		->select('tuyen_sinh.*', 'co_so_dao_tao.ten','loai_hinh_co_so.loai_hinh_co_so')
		->first();

	}

	public function getTenCoSoDaoTao()
	{
		$tencoso = DB::table('co_so_dao_tao')->select('id','ten')->get();
		return $tencoso;
	}

	public function getmanganhnghe($id)
	{
		$manganhnghe = DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=', $id)
		->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
		->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
		->select('nganh_nghe.id','nganh_nghe.ten_nganh_nghe')->get();
		return $manganhnghe;
	}

	public function postthemsolieutuyensinh($getdata)
	{
		$result  = $this->table->insert($getdata);
        return $result;
	}

	public function getsuasolieutuyensinh($id)
	{
		$result = $this->table->where('tuyen_sinh.id', '=', $id)
		->join('nganh_nghe', 'tuyen_sinh.nghe_id', '=', 'nganh_nghe.id')
		->select('tuyen_sinh.*', 'nganh_nghe.ten_nganh_nghe')->get()->first();
		return $result;
	}

}

 ?>