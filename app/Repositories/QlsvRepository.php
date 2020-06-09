<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\QlsvRepositoryInterface;
use Dotenv\Result\Result;

class QlsvRepository extends BaseRepository implements QlsvRepositoryInterface
{

    protected $table;
    public function getTable()
    {
        return 'sv_dang_quan_ly';
    }
    public function getQlsv($params)
    {
       $data = $this->table
        ->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'sv_dang_quan_ly.co_so_id')
        ->join('nganh_nghe', 'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
        ->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
        ->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
        ->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'sv_dang_quan_ly.id_loai_hinh') 
        ->select(
            'sv_dang_quan_ly.*',
            'loai_hinh_co_so.loai_hinh_co_so',
            'co_so_dao_tao.id as cs_id',
            'co_so_dao_tao.ten',
            'nganh_nghe.ten_nganh_nghe',
            'devvn_quanhuyen.name as ten_quan_huyen',
			'devvn_xaphuongthitran.name as ten_xa_phuong'
        );
        // dd($query);
        if(!empty($params['nam'])){
            $data->where('sv_dang_quan_ly.nam', $params['nam']);
        }	
        if($params['dot']!= null){
            $data->where('sv_dang_quan_ly.dot', $params['dot']);
        }
        if (isset($params['loai_hinh']) && !empty($params['loai_hinh'])) {
            $data->where('loai_hinh_co_so.id', $params['loai_hinh']);
            
        }

        if (isset($params['cs_id']) && !empty($params['cs_id'])) {
            $data->where('sv_dang_quan_ly.co_so_id', $params['cs_id']);
        }
        
        if (isset($params['devvn_quanhuyen']) && $params['devvn_quanhuyen'] != null) {
			$data->where('co_so_dao_tao.maqh', $params['devvn_quanhuyen']);
        }
        
		if (isset($params['devvn_xaphuongthitran']) && $params['devvn_xaphuongthitran'] != null) {
			$data->where('co_so_dao_tao.xaid', $params['devvn_xaphuongthitran']);
        }
        
        
        return $data->orderByDesc('sv_dang_quan_ly.id')->paginate($params['page_size']);
            
    }
    public function getCoSo()
	{
		$tencoso = DB::table('co_so_dao_tao')->select('id','ten')->get();
		return $tencoso;
    }
    public function getNganhNghe(){
        $nganhnghe = DB::table('nganh_nghe')->select('id','ten_nganh_nghe')->get();
        // dd($nganhnghe);
        return $nganhnghe;
    }
    public function suaSoLieuQlsv($id){
        return $this->table
        ->join('co_so_dao_tao', 'sv_dang_quan_ly.co_so_id', '=' ,'co_so_dao_tao.id')
        ->join('nganh_nghe', 'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
        ->join('loai_hinh_co_so', 'sv_dang_quan_ly.id_loai_hinh', '=', 'loai_hinh_co_so.id')
        ->where('sv_dang_quan_ly.id', '=', $id)  
        ->select(
            'sv_dang_quan_ly.*',
            'loai_hinh_co_so.loai_hinh_co_so',
            'co_so_dao_tao.ten',
            'nganh_nghe.ten_nganh_nghe',
            // DB::raw('co_so_dao_tao.ten as cs_ten'),
            DB::raw('sv_dang_quan_ly.id as sv_id'))->get();  
    }
    
    public function chiTietSoLieuQlsv($coSoId,$queryData){
        // dd($this->table);
       
       $data = $this->table
            ->where('sv_dang_quan_ly.co_so_id', '=', $coSoId)
            ->join('co_so_dao_tao', 'sv_dang_quan_ly.co_so_id', '=', 'co_so_dao_tao.id')
            ->join('devvn_quanhuyen', 'co_so_dao_tao.maqh', '=', 'devvn_quanhuyen.maqh')
            ->join('devvn_xaphuongthitran', 'co_so_dao_tao.xaid', '=', 'devvn_xaphuongthitran.xaid')
            ->join('loai_hinh_co_so', 'sv_dang_quan_ly.id_loai_hinh', '=', 'loai_hinh_co_so.id')
            ->join('nganh_nghe' ,'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
            ->select(
                'sv_dang_quan_ly.*',
                'co_so_dao_tao.ten',
                'loai_hinh_co_so.loai_hinh_co_so',
                'devvn_quanhuyen.name as ten_quan_huyen',
                'devvn_xaphuongthitran.name as ten_xa_phuong',
                'nganh_nghe.ten_nganh_nghe',
                'nganh_nghe.id',
                DB::raw('sv_dang_quan_ly.id as sv_id')
            );
        //    dd($data);
            if($queryData['nam']!= null){
                $data->where('sv_dang_quan_ly.nam', $queryData['nam']);
            }	
            if($queryData['dot']!= null){
                $data->where('sv_dang_quan_ly.dot', $queryData['dot']);
            }
            
            if($queryData['nghe_id']!= null){
                $data->where('sv_dang_quan_ly.nghe_id', $queryData['nghe_id']);
            }
            // dd($queryData);
            return $data->paginate($queryData['page_size']);
            
    }

    public function getNamDaoTao(){
        $nam = DB::table('sv_dang_quan_ly')->select('id','nam')->get();
        return $nam;
    }

    public function getTenCoSoDaoTao(){
        $co_so_data = DB::table('co_so_dao_tao')->select('id', 'ten')->get();
        return $co_so_data;
    }

    public function getTenQuanHuyen(){
        return DB::table('devvn_quanhuyen')->get();
    }

    public function getTenXaPhuongTheoQuanHuyen($id){
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