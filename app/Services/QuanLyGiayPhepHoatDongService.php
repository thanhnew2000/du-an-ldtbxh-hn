<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QuanLyGiayPhepHoatDongRepository;
use Carbon\Carbon;
use App\Repositories\CoSoDaoTaoRepositoryInterface;

class QuanLyGiayPhepHoatDongService extends AppService
{

    public function __construct(
        CoSoDaoTaoRepositoryInterface $csdtRepository


    ) {
        $this->csdtRepository = $csdtRepository;
    }
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
        return $this->csdtRepository->get_co_so();
    }

    public function createGiayPhep($data)
    {
        return $this->repository->createGiayPhep($data);
    }

    public function getGiayPhep($id)
    {
        return $this->repository->getGiayPhep($id);
    }

    public function getGiayPhepId($id)
    {
        return $this->repository->getGiayPhepId($id);
    }

    public function updateData($data)
    {
        $id = $data['get_giay_phep_id'];
        unset($data['get_giay_phep_id']);
        return $this->repository->updateData($id,$data);
    }
}

 ?>