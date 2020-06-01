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
    public function getChiNhanh(){
        return $this->repository->getChiNhanh();
    }

//    public function getSingleCsdt($id){
//    return $this->repository->getSingleCsdt($id);
//    }
}
