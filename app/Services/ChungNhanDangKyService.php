<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 6/2/20
 * Time: 15:16
 */

namespace App\Services;


use App\Repositories\ChungNhanDangKyNgheRepository;

class ChungNhanDangKyService extends AppService
{
    public function getRepository()
    {
        return ChungNhanDangKyNgheRepository::class;
    }

    public function getCoSoDaoTaoTheoNghe($params){

        return $this->repository->getCoSoDaoTaoTheoNghe($params);
    }

    public function getNgheTheoCoSoDaoTao($params){

        return $this->repository->getNgheTheoCoSoDaoTao($params);
    }
}