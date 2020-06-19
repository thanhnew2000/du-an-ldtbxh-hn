<?php

namespace App\Services;
use App\Repositories\HopTacQuocTeRepository;

class HopTacQuocTeService extends AppService
{
    public function getRepository()
    {
        return HopTacQuocTeRepository::class;
    }


    public function getDanhSachKetQuaHopTacQuocTe($params){
        return $this->repository->getDanhSachKetQuaHopTacQuocTe($params);
    }

    
    public function checkTonTaiKhiThem($params){
        return $this->repository->checkTonTaiKhiThem($params);
    }

    public function chiTietTheoCoSo($co_so_id, $params){
        return $this->repository->chiTietTheoCoSo($co_so_id, $params);
    }




}