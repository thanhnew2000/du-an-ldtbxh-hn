<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QuanLyGiayPhepHoatDongRepository;
use Carbon\Carbon;

class QuanLyGiayPhepHoatDongService extends AppService
{

    public function getRepository()
    {
        return QuanLyGiayPhepHoatDongRepository::class;
    }
    public function index($params,$limit)
    {
        $queryData = [];
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['devvn_xaphuongthitran'] = isset($params['devvn_xaphuongthitran']) ? $params['devvn_xaphuongthitran'] : null;
        $data = $this->repository->index($params,$limit);
    }
}

 ?>