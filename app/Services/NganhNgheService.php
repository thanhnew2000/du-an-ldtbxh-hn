<?php

/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 6/2/20
 * Time: 15:16
 */

namespace App\Services;


use App\Repositories\NganhNgheRepository;

class NganhNgheService extends AppService
{
    public function getRepository()
    {
        return NganhNgheRepository::class;
    }

    public function getNganhNghe($params)
    {

        return $this->repository->getNganhNghe($params);
    }

    public function apiTimKiemNgheTheoKeyword($params)
    {
        return $this->repository->timKiemNgheTheoKeyword($params);
    }

    public function getAllNganhNghe($bac_nghe, $co_so_id)
    {
        return $this->repository->getAllNganhNghe($bac_nghe, $co_so_id);
    }

    public function boSungNganhNgheVaoCoSo($request, $unsetColums = [])
    {
        $nghe_cao_dang = $request->get('nghe_cao_dang');
        $nghe_trung_cap = $request->get('nghe_trung_cap');
        $attributes = $request->all();
        if (count($unsetColums) > 0) {
            foreach ($unsetColums as $col) {
                unset($attributes[$col]);
            }
        }
        return $this->repository->boSungNganhNgheVaoCoSo($attributes, $nghe_cao_dang, $nghe_trung_cap);
    }
}
