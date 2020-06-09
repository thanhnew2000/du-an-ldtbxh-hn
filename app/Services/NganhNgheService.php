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

    public function getNganhNghe($params){

        return $this->repository->getNganhNghe($params);
    }

    public function apiTimKiemNgheTheoKeyword($params){
        return $this->repository->timKiemNgheTheoKeyword($params);
    }
}