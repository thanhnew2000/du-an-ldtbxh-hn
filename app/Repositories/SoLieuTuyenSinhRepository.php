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

	public function getSoLuongTuyenSinh($params, $limit = 10)
	{
		// dd($params);
		$query = $this->table
			->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
			->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
			->join('trang_thai', 'tuyen_sinh.trang_thai', '=', 'trang_thai.id')
			->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
			->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
			->select([
				DB::raw("
					SUM(tuyen_sinh.so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang,
					SUM(tuyen_sinh.so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap,
					SUM(tuyen_sinh.so_luong_sv_So_cap) as so_luong_sv_So_cap,
					SUM(tuyen_sinh.so_luong_sv_he_khac) as so_luong_sv_he_khac,
					SUM(tuyen_sinh.tong_so_tuyen_sinh) as tong_so_tuyen_sinh,
					SUM(tuyen_sinh.tong_so_tuyen_sinh_cac_trinh_do) as tong_so_tuyen_sinh_cac_trinh_do
				"),
				'trang_thai.ten_trang_thai as trang_thai',
				'trang_thai.id as trang_thai_id',
				'co_so_dao_tao.id',
				'co_so_dao_tao.ten',
				'loai_hinh_co_so.loai_hinh_co_so',
				'devvn_quanhuyen.name as quan_huyen',
				'devvn_xaphuongthitran.name as xa_phuong',
			])
			->where('tuyen_sinh.nam', $params['nam'])
			->where('tuyen_sinh.dot', $params['dot']);

		if (isset($params['loai_hinh']) && $params['loai_hinh'] != 0) {
			$query->where('loai_hinh_co_so.id', $params['loai_hinh']);
		}

		if (isset($params['co_so_id']) && $params['co_so_id'] != null) {
			$query->where('tuyen_sinh.co_so_id', $params['co_so_id']);
		}
		if (isset($params['devvn_quanhuyen']) && $params['devvn_quanhuyen'] != null) {
			$query->where('co_so_dao_tao.maqh', $params['devvn_quanhuyen']);
		}
		if (isset($params['devvn_xaphuongthitran']) && $params['devvn_xaphuongthitran'] != null) {
			$query->where('co_so_dao_tao.xaid', $params['devvn_xaphuongthitran']);
		}

		// dd($query->groupBy('co_so_id')->toSql());

		return $query->groupBy('co_so_id')->paginate($limit);
	}

	public function getChiTietSoLuongTuyenSinh($coSoId,$limit)
	{
		return $this->table
			->where('tuyen_sinh.co_so_id', '=', $coSoId)
			->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
			->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
			->select('tuyen_sinh.*', 'co_so_dao_tao.ten','loai_hinh_co_so.loai_hinh_co_so')
			->paginate($limit);


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
		->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
		->select('tuyen_sinh.*', 'nganh_nghe.ten_nganh_nghe','co_so_dao_tao.ten')->get()->first();
		return $result;
	}
	public function getCheckTonTaiSoLieuTuyenSinh($arrcheck)
	{
			$kiem_tra = $this->table->where($arrcheck)->select('tuyen_sinh.id','tuyen_sinh.trang_thai')->first();
			if($kiem_tra!=null){
				if($kiem_tra->trang_thai >= 3){
					return 'tontai';
				};
			}
			return $kiem_tra;
	}

	public function getDataSeachCoSo($id)
	{
		return $this->table->where('tuyen_sinh.co_so_id', '=', $id)->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
		->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
		->select('tuyen_sinh.co_so_id',
				 'co_so_dao_tao.ten',
				 'loai_hinh_co_so.loai_hinh_co_so',
				 DB::raw('SUM(so_luong_sv_Cao_dang) AS so_luong_sv_Cao_dang'),
				 DB::raw('SUM(so_luong_sv_Trung_cap) AS so_luong_sv_Trung_cap'),
				 DB::raw('SUM(so_luong_sv_So_cap) AS so_luong_sv_So_cap'),
				 DB::raw('SUM(so_luong_sv_he_khac) AS so_luong_sv_he_khac'),
				 DB::raw('SUM(tong_so_tuyen_sinh) AS tong_so_tuyen_sinh')
				 )
		->groupBy('tuyen_sinh.co_so_id',
					'co_so_dao_tao.ten',
					'loai_hinh_co_so.loai_hinh_co_so'
					)->first();
	}

	public function getCoSoTuyenSinhTheoLoaiHinh($id)
	{	
		if($id==0){
			$data = DB::table('co_so_dao_tao')
			->select('co_so_dao_tao.id', 'co_so_dao_tao.ten')->get();
			return $data;
		}else{
			$data = DB::table('co_so_dao_tao')
			->where('ma_loai_hinh_co_so', '=', $id)
			->select('co_so_dao_tao.id', 'co_so_dao_tao.ten')->get();
			return $data;
		}
	}

	public function getTenQuanHuyen()
	{
		return DB::table('devvn_quanhuyen')->get();
	}

	public function getXaPhuongTheoQuanHuyen($id)
	{	
		if($id==0){
			$data = DB::table('devvn_xaphuongthitran')
			->select('devvn_xaphuongthitran.xaid', 'devvn_xaphuongthitran.name')->get();
			return $data;
		}else{
			$data = DB::table('devvn_xaphuongthitran')
			->where('maqh', '=', $id)
			->select('devvn_xaphuongthitran.xaid', 'devvn_xaphuongthitran.name')->get();
			return $data;
		}
	}

}
