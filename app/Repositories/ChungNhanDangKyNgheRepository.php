<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;

class ChungNhanDangKyNgheRepository extends BaseRepository implements ChungNhanDangKyNgheRepositoryInterface {

    public function getTable()
    {
        return 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao';
    }

    /*public function getNganhNghe($params){
        $queryBuilder = $this->table
            ->select(
                'id',
                'ten_nganh_nghe',
                'bac_nghe',
                DB::raw('(select count(dk.id) 
                                from giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao dk 
                                where dk.nghe_id = nganh_nghe.id) as csdt_count')
            )
            ->where('bac_nghe', $params['bac_nghe']);
        if(isset($params['keyword']) && $params['keyword'] != null){
            $queryBuilder->where(function($query) use ($params) {

                $query->orWhere('ten_nganh_nghe', 'like', "%".$params['keyword']."%")
                    ->orwhere('id', $params['keyword']);
            });
        }
//        dd($queryBuilder->get());
        return $queryBuilder->paginate($params['page_size']);
    }*/

    /*  select
            csdt.id,
            csdt.ten,
            csdt.ma_don_vi,

            csdt.logo,
            lhcs.loai_hinh_co_so,
            cqcq.ten as ten_chu_quan,

            qh.name as ten_qh,
            xptt.name as ten_xptt
        from giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao cndk
        join co_so_dao_tao csdt
            on cndk.co_so_id = csdt.id
        join loai_hinh_co_so lhcs
            on csdt.ma_loai_hinh_co_so = lhcs.id
        join co_quan_chu_quan cqcq
            on cqcq.id = csdt.co_quan_chu_quan_id
        join devvn_quanhuyen qh
            on qh.maqh = csdt.maqh
        join devvn_xaphuongthitran xptt
            on xptt.xaid = csdt.xaid
        where cndk.nghe_id = 6140201
    */
    /* Lấy danh sách cơ sở đào tạo theo mã nghề
     * @author: thienth
     * @date: 2020-06-03
     * @params: []
     * - ma_nghe: int - mã nghề nghiệp
     * - keyword: string - nullable - Tên cơ sở đào tạo
     * - ma_quan_huyen: int - nullable - Mã quận huyện
     * - ma_phuong_xa: int - nullable - Mã xã phường
     * - page_size: int - Page size
     * */
    public function getCoSoDaoTaoTheoNghe($params){
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
        if(isset($params['keyword']) && $params['keyword'] != null){
            $queryBuilder->where('co_so_dao_tao.ten', 'like', "%".$params['keyword']."%");
        }
        if(isset($params['loai_hinh_co_so']) && $params['loai_hinh_co_so'] != null){
            $queryBuilder->where('co_so_dao_tao.ma_loai_hinh_co_so', $params['loai_hinh_co_so']);
        }
        if(isset($params['ma_quan_huyen']) && $params['ma_quan_huyen'] != null){
            $queryBuilder->where('co_so_dao_tao.maqh', $params['ma_quan_huyen']);
        }
//        if(isset($params['ma_phuong_xa']) && $params['ma_phuong_xa'] != null){
//            $queryBuilder->where('co_so_dao_tao.xaid', $params['xaid']);
//        }
        return $queryBuilder->paginate($params['page_size']);
    }

    public function getNgheTheoCoSoDaoTao($params)
    {
        $queryBuilder = $this->table
            ->select(
                'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.id as chung_nhan_id',
                'nghe_id',
                'ten_quyet_dinh',

                'trang_thai',
                'ngay_ban_hanh',

                'nganh_nghe.ten_nganh_nghe',
                'nganh_nghe.bac_nghe'
            )
            ->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
            ->where ('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.trang_thai', config('common.trang_thai_nghe.hoat_dong'))
            ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id', $params['co_so_id']);
        return $queryBuilder->paginate($params['page_size']);

    }
}

?>