<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Carbon\Carbon;


class ChinhSachSinhVienRepository extends BaseRepository implements ChinhSachSinhVienRepositoryInterface
{
    public function getTable()
    {
        return 'tong_hop_chinh_sach_voi_hssv';
    }

    public function getChinhSachSinhVien($params, $limit = 20)
    {

        $query = $this->table
            ->join('co_so_dao_tao', 'tong_hop_chinh_sach_voi_hssv.co_so_id', '=', 'co_so_dao_tao.id')
            ->join('trang_thai', 'tong_hop_chinh_sach_voi_hssv.trang_thai', '=', 'trang_thai.id')
            ->join('chinh_sach', 'tong_hop_chinh_sach_voi_hssv.chinh_sach_id', '=', 'chinh_sach.id')
            ->select([
                'tong_hop_chinh_sach_voi_hssv.*',
                'trang_thai.ten_trang_thai as ten_trang_thai',
                'co_so_dao_tao.ten',
                'co_so_dao_tao.maqh as maqh',
                'co_so_dao_tao.ma_loai_hinh_co_so as ma_loai_hinh_co_so',
                'chinh_sach.ten as ten_chinh_sach'
            ])
            ->where('tong_hop_chinh_sach_voi_hssv.nam', $params['nam'])
            ->where('tong_hop_chinh_sach_voi_hssv.dot', $params['dot']);

        if (isset($params['loai_hinh']) && !empty($params['loai_hinh'])) {
            $query->where('ma_loai_hinh_co_so', $params['loai_hinh']);
        }
        if (isset($params['co_so_id']) && $params['co_so_id'] != null) {
            $query->where('co_so_id', $params['co_so_id']);
        }
        if (isset($params['devvn_quanhuyen']) && $params['devvn_quanhuyen'] != null) {
            $query->where('maqh', $params['devvn_quanhuyen']);
        }
        if (isset($params['chinhsach']) && $params['chinhsach'] != null) {
            $query->where('chinh_sach_id', $params['chinhsach']);
        }
        //dd($query->orderBy('tong_hop_chinh_sach_voi_hssv.id', 'asc')->paginate($limit));

        return $query->orderBy('tong_hop_chinh_sach_voi_hssv.id', 'asc')->paginate($limit);
    }

    public function checktontaiChinhSachSinhVien($arraycheck)
    {

        $check = $this->table->where($arraycheck)->select('co_so_id', 'nam', 'dot', 'trang_thai', 'chinh_sach_id')->first();
        if ($check != null) {
            if ($check->co_so_id) {
                return  'tontai';
            }
        }
        return $check;
    }

    public function postthemChinhSachSinhVien($data)
    {
        $result = $this->table->insert([$data]);
        return $result;
    }
    public function getsuaChinhSachSinhVien($id)
    {
        $data = $this->table
            ->join('co_so_dao_tao', 'tong_hop_chinh_sach_voi_hssv.co_so_id', '=', 'co_so_dao_tao.id')
            ->join('chinh_sach', 'tong_hop_chinh_sach_voi_hssv.chinh_sach_id', '=', 'chinh_sach.id')
            ->select([
                'tong_hop_chinh_sach_voi_hssv.*',
                'co_so_dao_tao.ten',
                'chinh_sach.ten as ten_chinh_sach'
            ])
            ->where('tong_hop_chinh_sach_voi_hssv.id', $id);
        return  $data->get()->first();
    }
}