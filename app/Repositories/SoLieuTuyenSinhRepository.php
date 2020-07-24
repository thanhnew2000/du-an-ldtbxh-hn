<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\TuyenSinh;
use App\Models\ChiTietTuyenSinh;
use Carbon\Carbon;

class SoLieuTuyenSinhRepository extends BaseRepository implements SoLieuTuyenSinhInterface
{
	// thanhnv 6/26/2020 them
	protected $model;

	public function __construct(ChiTietTuyenSinh $model)
	{
		parent::__construct();
		$this->model = $model;
	}

	//lay model
	public function getTable(){
		return 'chi_tiet_tuyen_sinh';
	}

	public function getSoLuongTuyenSinh($params, $limit = 10)
	{	
		$dateStart=0;
		$dateEnd=0;
		if($params['dot'] == 1){
			$dateStart=1;
			$dateEnd=6;
		}else if($params['dot'] == 2){
			$dateStart=7;
			$dateEnd=12;
		}else if($params['dot'] == 3){
			$dateStart=1;
			$dateEnd=12;
		}
		
		$query =
		//  $this->table
			DB::table('chi_tiet_tuyen_sinh')
			->join('bieu_mau', 'bieu_mau.id', '=', 'chi_tiet_tuyen_sinh.bieu_mau_id')
			->join('co_so_dao_tao', 'bieu_mau.co_so_id', '=', 'co_so_dao_tao.id')
			->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
			->join('trang_thai', 'bieu_mau.trang_thai', '=', 'trang_thai.id')
			->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
			->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
			->select(
				[
				DB::raw("
					SUM(chi_tiet_tuyen_sinh.so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang,
					SUM(chi_tiet_tuyen_sinh.so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap,
					SUM(chi_tiet_tuyen_sinh.so_luong_sv_So_cap) as so_luong_sv_So_cap,
					SUM(chi_tiet_tuyen_sinh.so_luong_sv_he_khac) as so_luong_sv_he_khac,
					SUM(chi_tiet_tuyen_sinh.tong_so_tuyen_sinh) as tong_so_tuyen_sinh,
					SUM(chi_tiet_tuyen_sinh.tong_so_tuyen_sinh_cac_trinh_do) as tong_so_tuyen_sinh_cac_trinh_do
				"),
				'trang_thai.ten_trang_thai as trang_thai',
				'trang_thai.id as trang_thai_id',
				'co_so_dao_tao.id',
				'co_so_dao_tao.ten',
				'loai_hinh_co_so.loai_hinh_co_so',
				'devvn_quanhuyen.name as quan_huyen',
				'devvn_xaphuongthitran.name as xa_phuong',
			]
				)
		->whereIn(DB::raw("year(bieu_mau.thoi_gian)"), $params['nam'])
		->WhereMonth('bieu_mau.thoi_gian','>=', $dateStart)
		->WhereMonth('bieu_mau.thoi_gian','<=' ,$dateEnd);

		if (isset($params['loai_hinh']) && $params['loai_hinh'] != 0) {
			$query->where('loai_hinh_co_so.id', $params['loai_hinh']);
		}

		if (isset($params['co_so_id']) && $params['co_so_id'] != null) {
			$query->where('bieu_mau.co_so_id', $params['co_so_id']);
		}
		if (isset($params['devvn_quanhuyen']) && $params['devvn_quanhuyen'] != null) {
			$query->where('co_so_dao_tao.maqh', $params['devvn_quanhuyen']);
		}
		if (isset($params['devvn_xaphuongthitran']) && $params['devvn_xaphuongthitran'] != null) {
			$query->where('co_so_dao_tao.xaid', $params['devvn_xaphuongthitran']);
		}
		if (isset($params['nganh_nghe']) && $params['nganh_nghe'] != null) {
			$query->where('chi_tiet_tuyen_sinh.nghe_id', 'like', $params['nganh_nghe'].'%');
		}

		return $query->groupBy('co_so_id')->paginate($limit);
		// dd($query->groupBy('co_so_id')->paginate($limit));
		// dd( $query->groupBy('co_so_id')->paginate($limit));
		// return $query->get();
	}


	public function getChiTietSoLuongTuyenSinh($coSoId,$limit,$queryData)
	{
		$data = $this->table
			->where('tuyen_sinh.co_so_id', '=', $coSoId)
			->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
			->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
			->join('nganh_nghe', 'tuyen_sinh.nghe_id', '=', 'nganh_nghe.id')
            ->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
            ->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
			->select(
						'tuyen_sinh.*',
						'co_so_dao_tao.ten',
						'co_so_dao_tao.dia_chi',
						'loai_hinh_co_so.loai_hinh_co_so',
						'nganh_nghe.ten_nganh_nghe',
						'devvn_quanhuyen.name as ten_quan_huyen',
						'devvn_xaphuongthitran.name as ten_xa_phuong'
					);

		if($queryData['nam']!= null){
			$data->where('tuyen_sinh.nam', $queryData['nam']);
		}
		if($queryData['dot']!=null){
			$data->where('tuyen_sinh.dot', $queryData['dot']);
		}
		return $data->orderBy('nam','desc')
		->orderBy('dot', 'desc')
		->paginate($limit);
	}


	public function getTenCoSoDaoTao()
	{
		$tencoso = DB::table('co_so_dao_tao')->select('id','ten')->get();
		return $tencoso;
	}

	public function getmanganhnghe($id)
	{
		$manganhnghe = DB::table('giay_chung_nhan_chi_tiet')->where('giay_chung_nhan_chi_tiet.co_so_id', '=', $id)	
		->join('nganh_nghe', 'giay_chung_nhan_chi_tiet.nghe_id', '=', 'nganh_nghe.id')	
		->groupBy('giay_chung_nhan_chi_tiet.nghe_id')
		->select('nganh_nghe.id','nganh_nghe.ten_nganh_nghe')
		->get();
		return $manganhnghe;
	}

	public function postthemsolieutuyensinh($getdata)
	{
		return $this->model->create($getdata);
	}

	public function getsuasolieutuyensinh($id)
	{
		$result = $this->table->where('tuyen_sinh.id', '=', $id)
		->join('nganh_nghe', 'tuyen_sinh.nghe_id', '=', 'nganh_nghe.id')
		->join('co_so_dao_tao', 'tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
		->select('tuyen_sinh.*', 'nganh_nghe.ten_nganh_nghe','co_so_dao_tao.ten')->get()->first();
		return $result;
	}

	public function updateData($id,$attributes)
	{
		return $this->table
            ->where('id', $id)
            ->update($attributes);
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
				 )->groupBy('tuyen_sinh.co_so_id',
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

	public function getNganhNghe($ma_cap_nghe){
		$data = DB::table('nganh_nghe')->where('ma_cap_nghe',$ma_cap_nghe)->orderBy('ten_nganh_nghe')->get();
		return $data;
	}

	public function getNgheTheoCapBac($id, $cap_nghe)
	{
		$data = DB::table('nganh_nghe')->where('id', 'like', $id.'%')->where('ma_cap_nghe', $cap_nghe)->orderBy('ten_nganh_nghe')->get();
		return $data;
	}

	// thanh change to service 6/26/2020
	public function getSvTuyenSinhTimeFromTo($id_truong, $fromDate,$toDate){
		$data = DB::table('bieu_mau')
		->where('bieu_mau.type',2)
		->where('bieu_mau.co_so_id', '=',$id_truong)
		->where('bieu_mau.thoi_gian','>=',$fromDate)
		->where('bieu_mau.thoi_gian','<=',$toDate)
		->join('chi_tiet_tuyen_sinh','chi_tiet_tuyen_sinh.bieu_mau_id','=','bieu_mau.id')
		->join('nganh_nghe','nganh_nghe.id','=','chi_tiet_tuyen_sinh.nghe_id')
		// ->orderBy('chi_tiet_tuyen_sinh.id','desc')
		->max('bieu_mau.thoi_gian')
		->orderBy('bieu_mau.thoi_gian','desc')
		->select('chi_tiet_tuyen_sinh.*','nganh_nghe.ten_nganh_nghe')
		->get();

		dd($data);
		// return $data;
	}
	public function getTuyenSinhCsNamDot($id_truong, $year,$dot)
	{
		$data =  DB::table('tuyen_sinh')->where('co_so_id', '=', $id_truong)
		->where('nam','=',$year)
		->where('dot','=',$dot)
		->select('id','nghe_id')->get();
		return $data;
	}

	// thanhnv 6/26/2020 sửa model create update
	// public function createTuyenSinh($arrayData){
	// 	return $this->model->create($arrayData);
	// }
	// public function updateTuyenSinh($key,$arrayData){
	// 	return $this->model->where('id',$key)->update($arrayData);
	// }

	// public function createBieuMau($id_co_so,$thoi_gian,$dot){
	// 	return DB::table('bieu_mau')->insertGetId([
	// 			'co_so_id' => $id_co_so,
	// 			'type' => 2,
	// 			'dot' =>$dot,
	// 			'thoi_gian' =>$thoi_gian,
	// 	]);
	// }
	
	public function createTuyenSinh($arrayData){
		// return $this->model->create($arrayData);
		// return DB::table('chi_tiet_tuyen_sinh')->insert($arrayData);
		return $this->model->insert($arrayData);
	}
	public function updateTuyenSinh($bieu_mau_id,$key,$arrayData){
		// return $this->model->where('id',$key)->update($arrayData);
		return $this->model->where('bieu_mau_id',$bieu_mau_id)->where('id',$key)->update($arrayData);
	}
	

	
	public function getTuyenSinhExportSreach($params,$oneYear)
	{
		$dateStart=0;
		$dateEnd=0;
		if($params['dot'] == 1){
			$dateStart=1;
			$dateEnd=6;
		}else if($params['dot'] == 2){
			$dateStart=7;
			$dateEnd=12;
		}else if($params['dot'] == 3){
			$dateStart=1;
			$dateEnd=12;
		}
		$query =
		$this->model
		// DB::table('chi_tiet_tuyen_sinh')
			->join('bieu_mau', 'bieu_mau.id', '=', 'chi_tiet_tuyen_sinh.bieu_mau_id')
			->join('co_so_dao_tao', 'bieu_mau.co_so_id', '=', 'co_so_dao_tao.id')
			->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
			->join('trang_thai', 'bieu_mau.trang_thai', '=', 'trang_thai.id')
			->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
			->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
			->join('nganh_nghe', 'chi_tiet_tuyen_sinh.nghe_id', '=', 'nganh_nghe.id')
			->select([
				DB::raw('
				SUM(chi_tiet_tuyen_sinh.ke_hoach_tuyen_sinh_cao_dang) as ke_hoach_tuyen_sinh_cao_dang,
				SUM(chi_tiet_tuyen_sinh.ke_hoach_tuyen_sinh_trung_cap) as ke_hoach_tuyen_sinh_trung_cap,
				SUM(chi_tiet_tuyen_sinh.ke_hoach_tuyen_sinh_so_cap) as ke_hoach_tuyen_sinh_so_cap,
				SUM(chi_tiet_tuyen_sinh.ke_hoach_tuyen_sinh_khac) as ke_hoach_tuyen_sinh_khac,
				SUM(chi_tiet_tuyen_sinh.tong_so_tuyen_sinh_cac_trinh_do) as tong_so_tuyen_sinh_cac_trinh_do,
				SUM(chi_tiet_tuyen_sinh.tong_so_nu) as tong_so_nu,
				SUM(chi_tiet_tuyen_sinh.tong_so_dan_toc) as tong_so_dan_toc,
				SUM(chi_tiet_tuyen_sinh.tong_ho_khau_HN) as tong_ho_khau_HN,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_Cao_dang) as so_luong_sv_Cao_dang,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_nu_Cao_dang) as so_luong_sv_nu_Cao_dang,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_dan_toc_Cao_dang) as so_luong_sv_dan_toc_Cao_dang,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_ho_khau_HN_Cao_dang) as so_luong_sv_ho_khau_HN_Cao_dang,
				SUM(chi_tiet_tuyen_sinh.so_tuyen_moi_Cao_dang) as so_tuyen_moi_Cao_dang,
				SUM(chi_tiet_tuyen_sinh.so_lien_thong_Cao_dang) as so_lien_thong_Cao_dang,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_Trung_cap) as so_luong_sv_Trung_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_nu_Trung_cap) as so_luong_sv_nu_Trung_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_dan_toc_Trung_cap) as so_luong_sv_dan_toc_Trung_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_ho_khau_HN_Trung_cap) as so_luong_sv_ho_khau_HN_Trung_cap,
				SUM(chi_tiet_tuyen_sinh.ho_khau_HN_THCS_Trung_cap) as ho_khau_HN_THCS_Trung_cap,
				SUM(chi_tiet_tuyen_sinh.so_Tot_nghiep_THCS) as so_Tot_nghiep_THCS,
				SUM(chi_tiet_tuyen_sinh.so_Tot_nghiep_THPT) as so_Tot_nghiep_THPT,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_So_cap) as so_luong_sv_So_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_nu_So_cap) as so_luong_sv_nu_So_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_dan_toc_So_cap) as so_luong_sv_dan_toc_So_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_ho_khau_HN_So_cap) as so_luong_sv_ho_khau_HN_So_cap,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_he_khac) as so_luong_sv_he_khac,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_nu_khac) as so_luong_sv_nu_khac,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_dan_toc_khac) as so_luong_sv_dan_toc_khac,
				SUM(chi_tiet_tuyen_sinh.so_luong_sv_ho_khau_HN_khac) as so_luong_sv_ho_khau_HN_khac
				'),
				'nganh_nghe.ten_nganh_nghe as ten_nganh_nghe',
				'chi_tiet_tuyen_sinh.nghe_id as nghe_id',
				'co_so_dao_tao.id as id_co_so',
				'co_so_dao_tao.loai_truong',
				'co_so_dao_tao.ma_loai_hinh_co_so',
				'co_so_dao_tao.ten',
				'bieu_mau.thoi_gian',
				DB::raw('YEAR(bieu_mau.thoi_gian) as yearNam'),
		
			])
			// ->whereIn(DB::raw("year(bieu_mau.thoi_gian)"), $params['nam'])
			->where(DB::raw("year(bieu_mau.thoi_gian)"), $oneYear)
			->WhereMonth('bieu_mau.thoi_gian','>=', $dateStart)
			->WhereMonth('bieu_mau.thoi_gian','<=' ,$dateEnd);
	
			if (isset($params['loai_hinh']) && $params['loai_hinh'] != 0) {
				$query->where('loai_hinh_co_so.id', $params['loai_hinh']);
			}
	
			if (isset($params['co_so_id']) && $params['co_so_id'] != null) {
				$query->where('bieu_mau.co_so_id', $params['co_so_id']);
			}
			if (isset($params['devvn_quanhuyen']) && $params['devvn_quanhuyen'] != null) {
				$query->where('co_so_dao_tao.maqh', $params['devvn_quanhuyen']);
			}
			if (isset($params['devvn_xaphuongthitran']) && $params['devvn_xaphuongthitran'] != null) {
				$query->where('co_so_dao_tao.xaid', $params['devvn_xaphuongthitran']);
			}
			if (isset($params['nganh_nghe']) && $params['nganh_nghe'] != null) {
				$query->where('chi_tiet_tuyen_sinh.nghe_id', 'like', $params['nganh_nghe'].'%');
			}
	
				// $query->groupBy('id_co_so');
				// $query->groupBy('nghe_id');
				// return	$query->get()->groupBy('yearNam');
			return $query->groupBy('id_co_so')->groupBy('nghe_id')->get();
			// return	$query->get()->groupBy('yearNam');
	}



	// public function getBieuMauTuyenSinh($id_truong, $year,$dot)
	// {
	// 	$data =  DB::table('bieu_mau')->where('co_so_id', '=', $id_truong)
	// 	->where('type', '=', 2)
	// 	->where(DB::raw('YEAR(bieu_mau.thoi_gian)'),$year)
	// 	->where('dot',$dot)
	// 	->first();
	// 	return $data;
	// }


	public function getTuyenSinhFromIdBieuMau($id_bieu_mau)
	{
		$data =  DB::table('chi_tiet_tuyen_sinh')->where('bieu_mau_id', '=', $id_bieu_mau)
		->select('id','nghe_id')
		->get();
		return $data;
	}

	public function getTuyenSinhFromIdBieuMauOnlyOneNghe($id_bieu_mau,$nghe_id)
	{
		$data =  DB::table('chi_tiet_tuyen_sinh')->where('bieu_mau_id', '=', $id_bieu_mau)
		->where('nghe_id','=',$nghe_id)
		->get();
		return $data;
	}


	public function getNgheCoSo($id_co_so){
		$manganhnghe = DB::table('giay_chung_nhan_chi_tiet')->where('giay_chung_nhan_chi_tiet.co_so_id', '=', $id_co_so)
		->groupBy('giay_chung_nhan_chi_tiet.nghe_id')
		->orderBy('giay_chung_nhan_chi_tiet.phan_loai_nghe','asc')	
		->select('giay_chung_nhan_chi_tiet.id','giay_chung_nhan_chi_tiet.nghe_id','giay_chung_nhan_chi_tiet.phan_loai_nghe')
		->get();
		return $manganhnghe;
	}

	public function getNganhNgheCaoDangTrungCap($arrayNghe){
		$data = DB::table('nganh_nghe')->whereIn('nganh_nghe.id',$arrayNghe)
		->get()->groupBy('bac_nghe');
		return $data;
	}

	public function getNganhNgheSoCapDuoi3Thang($arrayNghe){
		$data = DB::table('nganh_nghe_tc_sc')->whereIn('nganh_nghe_tc_sc.id',$arrayNghe)
		->get()->groupBy('bac_nghe');
		return $data;
	}

}
