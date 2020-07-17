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
        $queryData['so_quyet_dinh'] = isset($params['so_quyet_dinh']) ? $params['so_quyet_dinh'] : null;
        return $this->repository->index($queryData,$limit);
    }

    public function get_co_so()
    {
        return $this->repository->get_co_so();
    }

    public function createGiayPhep($data)
    {
        return $this->repository->createGiayPhep($data);
    }
}

 ?>