<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;
use App\Models\NganhNghe;

class NganhNgheRepository extends BaseRepository implements NganhNgheRepositoryInterface
{
    public function __construct(
        NganhNghe $nganhNghe
    ) {
        parent::__construct();
        $this->model = $nganhNghe;
    }

    public function getTable()
    {
        return 'nganh_nghe';
    }

    public function getNganhNghe($params)
    {
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
        if (isset($params['keyword']) && $params['keyword'] != null) {
            $queryBuilder->where(function ($query) use ($params) {

                $query->orWhere('ten_nganh_nghe', 'like', "%" . $params['keyword'] . "%")
                    ->orwhere('id', $params['keyword']);
            });
        }
        //        dd($queryBuilder->get());
        return $queryBuilder->paginate($params['page_size']);
    }

    public function timKiemNgheTheoKeyword($params)
    {
        $resultCount = 25;

        $offset = ($params['page'] - 1) * $resultCount;
        $queryBuilder = $this->table
            ->select(
                'id',
                DB::raw('concat(id, " - ", ten_nganh_nghe) as text')
            )
            ->where('ma_cap_nghe', 4)
            ->where(function ($query) use ($params) {
                $query->where('ten_nganh_nghe', 'like', "%" . $params['keyword'] . "%")
                    ->orWhere('id', 'like', $params['keyword'] . "%");
            });

        $count = $queryBuilder->count();

        $endCount = $offset + $resultCount;
        $morePages = $count > $endCount;

        $data = $queryBuilder
            ->skip($offset)
            ->take($resultCount)
            ->get()
            ->toArray();

        $results = array(
            "results" => $data,
            "pagination" => array(
                "more" => $morePages
            )
        );
        return $results;
    }

    public function getAllNganhNghe($bac_nghe, $co_so_id = null)
    {
        $query = $this->model->select('nganh_nghe.*')
            ->where('bac_nghe', $bac_nghe)
            ->where('ma_cap_nghe', 4);

        if (!empty($co_so_id)) {
            $query->whereNotIn('id', function ($q) use ($co_so_id) {
                $q->select('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id')
                    ->from('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao')
                    ->where('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id', $co_so_id + 0);
            });
        }
        return $query->get();
    }

    public function boSungNganhNgheVaoCoSo($attributes, $nghe_cao_dang = [], $nghe_trung_cap = [])
    {
        // dd($attributes);
        $arrayInsert = [];
        if (isset($nghe_cao_dang)) {
            for ($i = 0; $i < count($nghe_cao_dang); $i++) {
                $arrayInsert[] = [
                    'co_so_id' => $attributes['co_so_id'],
                    'nghe_id' => $nghe_cao_dang[$i],
                    'ten_quyet_dinh' => $attributes['ten_quyet_dinh'],
                    'trang_thai' => '1',
                    'ngay_ban_hanh' => $attributes['ngay_ban_hanh'],
                    'anh_quyet_dinh' => $attributes['anh_quyet_dinh']
                ];
            }
        }

        if (isset($nghe_trung_cap)) {
            for ($i = 0; $i < count($nghe_trung_cap); $i++) {
                $arrayInsert[] = [
                    'co_so_id' => $attributes['co_so_id'],
                    'nghe_id' => $nghe_trung_cap[$i],
                    'ten_quyet_dinh' => $attributes['ten_quyet_dinh'],
                    'trang_thai' => '1',
                    'ngay_ban_hanh' => $attributes['ngay_ban_hanh'],
                    'anh_quyet_dinh' => $attributes['anh_quyet_dinh']
                ];
            }
        }
        return DB::table('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao')
            ->insert($arrayInsert);
    }
}
