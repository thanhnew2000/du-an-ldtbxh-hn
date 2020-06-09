<?php

namespace App\Repositories;
use App\Repositories\BaseRepository;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;

class NganhNgheRepository extends BaseRepository implements NganhNgheRepositoryInterface {

    public function getTable()
    {
        return 'nganh_nghe';
    }

    public function getNganhNghe($params){
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
    }

    public function timKiemNgheTheoKeyword($params){
        $resultCount = 25;

        $offset = ($params['page'] - 1) * $resultCount;
        $queryBuilder = $this->table
            ->select(
                'id',
                DB::raw('concat(id, " - ", ten_nganh_nghe) as text')
            )
            ->where('ma_cap_nghe', 4)
            ->where(function($query) use ($params){
                $query->where('ten_nganh_nghe', 'like', "%".$params['keyword']."%")
                    ->orWhere('id', 'like', $params['keyword']."%");
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

}

?>