<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\CsdtRepository;


class ChiNhanhService extends AppService
{
    public function getRepository()
    {
        return \App\Repositories\ChiNhanhRepository::class;
    }
    public function getChiNhanh()
    {
        return $this->repository->getChiNhanh();
    }

    public function getSingleChiNhanh($id)
    {
        return $this->repository->getSingleChiNhanh($id);
    }

    public function getChiNhanhThuocCSDT($id)
    {
        return $this->repository->getChiNhanhThuocCSDT($id);
    }
}
