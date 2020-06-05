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
    public function getQlsv()
    {
       return  $this->table
        ->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'sv_dang_quan_ly.co_so_id')
        ->join('nganh_nghe', 'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
        ->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id') 
        ->select(
            'sv_dang_quan_ly.*',
            'loai_hinh_co_so.loai_hinh_co_so',
            'co_so_dao_tao.ten',
            'co_so_dao_tao.id as cs_id',
            DB::raw('co_so_dao_tao.ten as cs_ten'),
            )->groupBy('sv_dang_quan_ly.co_so_id')
             ->orderByDesc('sv_dang_quan_ly.id')
        ->paginate(10);
        
            
    }
    public function getCoSo()
	{
		$tencoso = DB::table('co_so_dao_tao')->select('id','ten')->get();
		return $tencoso;
    }
    public function suaSoLieuQlsv($id){
        return $this->table
        ->join('co_so_dao_tao', 'sv_dang_quan_ly.co_so_id', '=' ,"co_so_dao_tao.id")
        ->join('nganh_nghe', 'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
        ->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
        ->where('sv_dang_quan_ly.id', $id)
        ->select(
            'sv_dang_quan_ly.*',
            'loai_hinh_co_so.loai_hinh_co_so',
            'co_so_dao_tao.ten',
            DB::raw('co_so_dao_tao.ten as cs_ten'),
            DB::raw('sv_dang_quan_ly.id as sv_id'))->get();

           
    }
    // public function getTongHopSvTheoLoaiHinh($id){
    //     if ($id==0) {
    //         $data = DB::table('co_so_dao_tao')
    //         ->select('co_so_dao_tao.id','co_so_dao_tao.ten');
    //         return $data;
    //     }else{
    //         $data = DB::table('co_so_dao_tao')
	// 		->where('ma_loai_hinh_co_so', '=', $id)
	// 		->select('co_so_dao_tao.id', 'co_so_dao_tao.ten')->get();
	// 		return $data;
    //     }
    // }
    public function themSoLieuQlsv($getdata){
        $result = $this->table->insert($getdata);
        return $result;
    }
    public function chiTietSoLieuQlsv($coSoId){
        // dd($this->table);
        // dd($coSoId);
        return $this->table
            ->where('sv_dang_quan_ly.co_so_id', '=', $coSoId)
            ->join('co_so_dao_tao', 'sv_dang_quan_ly.co_so_id', '=', 'co_so_dao_tao.id')
            ->join('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
            ->join('nganh_nghe' ,'nganh_nghe.id', '=', 'sv_dang_quan_ly.nghe_id')
            ->select(
                'sv_dang_quan_ly.*',
                'loai_hinh_co_so.loai_hinh_co_so',
                'nganh_nghe.*',
                'co_so_dao_tao.ten',
                DB::raw('co_so_dao_tao.ten as cs_ten'),
                DB::raw('nganh_nghe.id as nghe_id'),
                DB::raw('sv_dang_quan_ly.id as sv_id')
            )->paginate(10);    
    }

    public function getNamDaoTao(){
        $nam = DB::table('sv_dang_quan_ly')->select('id','nam')->get();
        return $nam;
    }

    public function getTenCoSoDaoTao(){
        $co_so_data = DB::table('co_so_dao_tao')->select('id', 'ten')->get();
        return $co_so_data;
    }

}