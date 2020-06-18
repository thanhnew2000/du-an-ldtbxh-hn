<?php

namespace App\Services;
use App\Repositories\DoiNguNhaGiaoRepository;

class DoiNguNhaGiaoService extends AppService
{

    public function getRepository()
    {
        return DoiNguNhaGiaoRepository::class;
    }

    public function getDanhSachDoiNguNhaGiao($params){
        return $this->repository->getDanhSachDoiNguNhaGiao($params);
    }

    public function getNganhNgheTheoCoSo($co_so_id){
        return $this->repository->getNganhNgheTheoCoSo($co_so_id);
    }

    public function chiTietTheoCoSo($co_so_id, $params){
        return $this->repository->chiTietTheoCoSo($co_so_id, $params);
    }

    public function checkTonTaiKhiThem($params){
        return $this->repository->checkTonTaiKhiThem($params);
    }
    

}