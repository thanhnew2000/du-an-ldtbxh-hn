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

    public function getNganhNghe($params, $limit = 20){
        $queryBuilder = $this->table
            ->select(
                'id',
                'ten_nganh_nghe',
                'bac_nghe'
            )
            ->where('bac_nghe', $params['bac_nghe']);
        if(isset($params['keyword']) && $params['keyword'] != null){
            $queryBuilder->where(function($query) use ($params) {

                $query->orWhere('ten_nganh_nghe', 'like', "%".$params['keyword']."%")
                    ->orwhere('id', $params['keyword']);
            });
        }
//        dd($queryBuilder->paginate($limit));
        return $queryBuilder->paginate($limit);
    }
}

?>