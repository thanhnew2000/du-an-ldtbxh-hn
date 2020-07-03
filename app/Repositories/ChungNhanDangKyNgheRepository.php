<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;

class ChungNhanDangKyNgheRepository extends BaseRepository implements ChungNhanDangKyNgheRepositoryInterface
{

    public function getTable()
    {
        return 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao';
    }
    public function getCoSoDaoTaoTheoNghe($params)
    {
        $queryBuilder = $this->table
            ->select(
                'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.id as chung_nhan_id',
                'co_so_dao_tao.id as co_so_id',
                'co_so_dao_tao.ten as ten_co_so',
                'co_so_dao_tao.ma_don_vi as ma_don_vi',

                'co_so_dao_tao.logo as logo',
                'loai_hinh_co_so.loai_hinh_co_so as loai_hinh_co_so',
                'co_quan_chu_quan.ten as ten_chu_quan',

                'devvn_quanhuyen.name as ten_qh',
                'devvn_xaphuongthitran.name as ten_xptt',
                'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.ten_quyet_dinh',
                'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.ngay_ban_hanh'
            )
            ->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
            ->join('loai_hinh_co_so', 'loai_hinh_co_so.id', '=', 'co_so_dao_tao.ma_loai_hinh_co_so')
            ->join('co_quan_chu_quan', 'co_quan_chu_quan.id', '=', 'co_so_dao_tao.co_quan_chu_quan_id')
            ->join('devvn_quanhuyen', 'devvn_quanhuyen.maqh', '=', 'co_so_dao_tao.maqh')
            ->join('devvn_xaphuongthitran', 'devvn_xaphuongthitran.xaid', '=', 'co_so_dao_tao.xaid')
            ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', $params['ma_nghe']);
        if (isset($params['keyword']) && $params['keyword'] != null) {
            $queryBuilder->where('co_so_dao_tao.ten', 'like', "%" . $params['keyword'] . "%");
        }
        if (isset($params['loai_hinh_co_so']) && $params['loai_hinh_co_so'] != null) {
            $queryBuilder->where('co_so_dao_tao.ma_loai_hinh_co_so', $params['loai_hinh_co_so']);
        }
        if (isset($params['ma_quan_huyen']) && $params['ma_quan_huyen'] != null) {
            $queryBuilder->where('co_so_dao_tao.maqh', $params['ma_quan_huyen']);
        }
        return $queryBuilder->paginate($params['page_size']);
    }

    public function getNgheTheoCoSoDaoTao($params)
    {
        $queryBuilder = $this->table
            ->select(
                'nganh_nghe.ten_nganh_nghe as ten_nghe',
                'nganh_nghe.id as ma_nghe',
                'nganh_nghe.bac_nghe',

                'quy_mo_tuyen_sinh',
                'trang_thai',

                'giay_phep.ten_giay_phep',
                'giay_phep.ngay_ban_hanh',
                'giay_phep.ngay_het_han',
                'giay_phep.anh_giay_phep'
            )
            ->join('nganh_nghe', 'nganh_nghe.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id')
            ->join('giay_phep', 'giay_phep.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.giay_phep_id')
            ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id', $params['co_so_id']);
        // dd($queryBuilder->toSql());
        return $queryBuilder->paginate($params['page_size']);
    }

    public function getNgheTheoGiayPhep($params)
    {
        $queryBuilder = $this->table->select(
            'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.id as giay_chung_nhan_id',
            'nghe_id',
            'nganh_nghe.ten_nganh_nghe as ten_nghe',
            'nganh_nghe.bac_nghe',
            'quy_mo_tuyen_sinh'
        )
            ->join('nganh_nghe', 'nganh_nghe.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id')
            ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id', $params['co_so_id'])
            ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.giay_phep_id', $params['giay_phep_id']);;
        return $queryBuilder->orderByDesc('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.id')->paginate($params['page_size']);
    }

    public function xoaNgheTrongGiayPhep($params)
    {
        return $this->table
            ->where('co_so_id', $params['co_so_id'])
            ->where('giay_phep_id', $params['giay_phep_id'])
            ->where('nghe_id', $params['nghe_id'])
            ->delete();
    }
    public function getTongSoTuyenSinhTheoNghe($params)
    {
        // dd($params);
        $queryBuilder = $this->table->select(
            'co_so_dao_tao.ten',
            DB::raw('SUM(tuyen_sinh.tong_so_tuyen_sinh) as tong_so_tuyen_sinh')
        )->join('co_so_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
        ->leftJoin('tuyen_sinh', function ($join) {
            $join->on('tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
            ->on('tuyen_sinh.nghe_id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id');
        })
        ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', $params['ma_nghe'])
        ->groupBy('co_so_dao_tao.ten');
        return $queryBuilder->orderByDesc('tong_so_tuyen_sinh')->paginate($params['page_size']);
    }
}
