<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\XayDungChuongTrinhGiaoTrinhReponsitoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\KetQuaXayDungChuongTrinh;

class XayDungChuongTrinhGiaoTrinhReponsitory extends BaseRepository implements XayDungChuongTrinhGiaoTrinhReponsitoryInterface
{
    protected $model;

    public function __construct(KetQuaXayDungChuongTrinh $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'ket_qua_xay_dung_chuong_trinh_giao_trinh';
    }

    /* Danh sách Tổng hợp kết quả xây dựng chương trình , giáo trình .
     * @author: phucnv
     * @created_at 2020-06-20
     */
    public function getDanhSachXayDungChuongTrinhGiaoTrinh($params){
        $queryBuilder = $this->table
        ->leftjoin('co_so_dao_tao', 'ket_qua_xay_dung_chuong_trinh_giao_trinh.co_so_id', '=', 'co_so_dao_tao.id')
        ->leftjoin('nganh_nghe', 'ket_qua_xay_dung_chuong_trinh_giao_trinh.nghe_id', '=', 'nganh_nghe.id')
        ->select('ket_qua_xay_dung_chuong_trinh_giao_trinh.*',
        DB::raw('co_so_dao_tao.ten as ten'),
        DB::raw('nganh_nghe.id as ma_nghe'),
        DB::raw('nganh_nghe.ten_nganh_nghe as ten_nghe')
        );

        if(isset($params['nam']) && $params['nam'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.nam', $params['nam']);
        }
        if(isset($params['dot']) && $params['dot'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.dot', $params['dot']);
        }
        if(isset($params['co_so_id']) && $params['co_so_id'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.co_so_id', $params['co_so_id']);
        }
        if(isset($params['nghe_id']) && $params['nghe_id'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.nghe_id', $params['nghe_id']);
        }

        return $queryBuilder->orderByDesc('ket_qua_xay_dung_chuong_trinh_giao_trinh.nam')
        ->orderByDesc('ket_qua_xay_dung_chuong_trinh_giao_trinh.dot')->paginate($params['page_size']);
    }

    /* Danh sách ngành nghề theo ID cơ sở.
     * @author: phucnv
     * @created_at 2020-06-20
     */
    public function getNganhNgheTheoCoSo($co_so_id){
        $nganhnghe = DB::table('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao')
        ->join('nganh_nghe','giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id','=','nganh_nghe.id')
        ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id', $co_so_id)
        ->where('nganh_nghe.ma_cap_nghe', 4)
        ->select('nganh_nghe.*')
        ->get();
        return $nganhnghe;
    }

     /* Check tồn tại khi create.
     * @author: phucnv
     * @created_at 2020-06-20
     */
    public function checkTonTaiKhiThem($params){
        $kq = $this->table
        ->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.co_so_id', $params['co_so_id'])
        ->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.nam', $params['nam'])
        ->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.dot', $params['dot'])
        ->select('ket_qua_xay_dung_chuong_trinh_giao_trinh.*')
        ->first();

        return $kq;
    }

    /* Danh sách chi tiết xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-22
     */
    public function chiTietTheoCoSo($co_so_id, $params){
        $queryBuilder = $this->table
        ->leftjoin('co_so_dao_tao', 'ket_qua_xay_dung_chuong_trinh_giao_trinh.co_so_id', '=', 'co_so_dao_tao.id')
        ->leftjoin('nganh_nghe', 'ket_qua_xay_dung_chuong_trinh_giao_trinh.nghe_id', '=', 'nganh_nghe.id')
        ->select('ket_qua_xay_dung_chuong_trinh_giao_trinh.*',
        DB::raw('co_so_dao_tao.ten as ten'),
        DB::raw('nganh_nghe.id as ma_nghe'),
        DB::raw('nganh_nghe.ten_nganh_nghe as ten_nghe')
        )
        ->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.co_so_id', $co_so_id);


        if(isset($params['nam']) && $params['nam'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.nam', $params['nam']);
        }
        if(isset($params['dot']) && $params['dot'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.dot', $params['dot']);
        }
        if(isset($params['nghe_id']) && $params['nghe_id'] != null){
            $queryBuilder->where('ket_qua_xay_dung_chuong_trinh_giao_trinh.nghe_id', $params['nghe_id']);
        }

        return $queryBuilder->orderByDesc('ket_qua_xay_dung_chuong_trinh_giao_trinh.nam')
        ->orderByDesc('ket_qua_xay_dung_chuong_trinh_giao_trinh.dot')->paginate($params['page_size']);

    }

    public function store($data)
    {
        return $this->model->create($data);
    }

}