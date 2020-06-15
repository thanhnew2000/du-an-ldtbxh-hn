<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class LienKetDaoTaoRepository extends BaseRepository implements LienKetDaoTaoRepositoryInterface
{
    public function getTable()
    {
        return 'lien_ket_qua_tuyen_sinh';
    }

    public function getTongHopLienKetDaoTao($params, $limit = 20)
    {
        $query = $this->table
            ->join('co_so_dao_tao', 'lien_ket_qua_tuyen_sinh.co_so_id', '=', 'co_so_dao_tao.id')
            ->join('nganh_nghe', 'lien_ket_qua_tuyen_sinh.nghe_id', '=', 'nganh_nghe.id')
            ->join('trang_thai', 'lien_ket_qua_tuyen_sinh.trang_thai', '=', 'trang_thai.id')
            ->select([
                'lien_ket_qua_tuyen_sinh.*',
                'co_so_dao_tao.ten',
                'co_so_dao_tao.maqh as maqh',
                'co_so_dao_tao.ma_loai_hinh_co_so as ma_loai_hinh_co_so',
                'nganh_nghe.bac_nghe',
                'trang_thai.ten_trang_thai as ten_trang_thai',
            ])
            ->where('lien_ket_qua_tuyen_sinh.nam', $params['nam'])
            ->where('lien_ket_qua_tuyen_sinh.dot', $params['dot']);

        if (isset($params['loai_hinh']) && !empty($params['loai_hinh'])) {
            $query->where('ma_loai_hinh_co_so', $params['loai_hinh']);
        }
        if (isset($params['co_so_id']) && $params['co_so_id'] != null) {
            $query->where('co_so_id', $params['co_so_id']);
        }
        if (isset($params['devvn_quanhuyen']) && $params['devvn_quanhuyen'] != null) {
            $query->where('maqh', $params['devvn_quanhuyen']);
        }

        //dd($query->orderBy('lien_ket_qua_tuyen_sinh.id', 'asc')->paginate($limit));

        return $query->orderBy('lien_ket_qua_tuyen_sinh.id', 'asc')->paginate($limit);
    }

    public function getTenQuanHuyen()
    {
        return DB::table('devvn_quanhuyen')->get();
    }

    public function getNganhNghe($ma_cap_nghe)
    {
        $data = DB::table('nganh_nghe')->where('ma_cap_nghe', $ma_cap_nghe)->orderBy('ten_nganh_nghe')->get();
        return $data;
    }

    public function getNgheTheoCapBac($id, $cap_nghe)
    {
        $data = DB::table('nganh_nghe')->where('id', 'like', $id . '%')->where('ma_cap_nghe', $cap_nghe)->orderBy('ten_nganh_nghe')->get();
        return $data;
    }
}
