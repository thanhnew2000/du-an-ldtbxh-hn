<?php

namespace App\Services;

use App\Repositories\LienKetDaoTaoRepository;
use Carbon\Carbon;

class LienKetDaoTaoService extends AppService
{
    public function getRepository()
    {
        return LienKetDaoTaoRepository::class;
    }

    public function getTongHopLienKetDaoTao($params = [], $limit)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        return $this->repository->getTongHopLienKetDaoTao($queryData, $limit);
    }
}
