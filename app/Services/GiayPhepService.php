<?php

// 17/06/2020 Tuanbt -thêm Giấy phép service

namespace App\Services;


use App\Repositories\GiayPhepRepository;

class GiayPhepService extends AppService
{
    public function getRepository()
    {
        return GiayPhepRepository::class;
    }

    public function create($request, $unsetColumn = [])
    {
        return $this->repository->create($request);
    }
    public function getGiayPhep($id)
    {
        return $this->repository->getGiayPhep($id);
    }
    public function store($request)
    {
        return $this->repository->store($request);
    }
    public function updateGiayPhep($id, array $params = [])
    {
        return $this->repository->updateGiayPhep($id, $params);
    }
}
