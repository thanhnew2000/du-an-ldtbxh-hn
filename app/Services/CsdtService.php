<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\CsdtRepository;


class CsdtService extends AppService
{
    public function getRepository()
    {
         return \App\Repositories\CsdtRepository::class;
    }
    public function getCsdt(){
        return $this->repository->getCsdt();
    }

    public function getSingleCsdt($id){
    return $this->repository->getSingleCsdt($id);
    }
}
