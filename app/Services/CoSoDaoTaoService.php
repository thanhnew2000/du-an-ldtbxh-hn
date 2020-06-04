<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\CoSoDaoTaoRepository;


class CoSoDaoTaoService extends AppService
{
    public function getRepository()
    {
        return \App\Repositories\CoSoDaoTaoRepository::class;
    }
    public function getCsdt()
    {
        return $this->repository->getCsdt();
    }

    public function getSingleCsdt($id)
    {
        return $this->repository->getSingleCsdt($id);
    }
}
