<?php

// 17/06/2020 Tuanbt -thêm Giấy phép service

namespace App\Services;

use App\Repositories\GiayPhepDangKyRepository;

class GiayPhepDangKyService extends AppService
{
    public function getRepository()
    {
        return GiayPhepDangKyRepository::class;
    }

    public function create($request, $unsetColumn = [])
    {
        return $this->repository->create($request);
    }
    public function getGiayPhep($params)
    {
        return $this->repository->getGiayPhep($params);
    }
    public function store($request)
    {
        return $this->repository->store($request);
    }
    public function updateGiayPhep($id, array $params = [])
    {
        return $this->repository->updateGiayPhep($id, $params);
    }

    public function getGiayPhepThepCoSo($params){
        return $this->repository->getGiayPhepThepCoSo($params);
    }

    public function getNganhNgheMaCap($id,$ma_cap){
        return $this->repository->getNganhNgheMaCap($id,$ma_cap);
    }

    public function getChiNhanhTheoCoSo($id_co_so){
        return $this->repository->getChiNhanhTheoCoSo($id_co_so);
    }

    public function insertToGiayChungNhanChiTiet($dataInsert){
        return $this->repository->insertToGiayChungNhanChiTiet($dataInsert);
    }

    public function insertNganhNghe2AndGetId($dataInsert){
        return $this->repository->insertNganhNghe2AndGetId($dataInsert);
    }


    
}
