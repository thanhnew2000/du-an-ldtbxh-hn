<?php

namespace App\Repositories;

interface QlsvRepositoryInterface
{
    public function getQlsv($params);
    public function getCoSo();
    // public function suaSoLieuSv();
    // public function themSoLieuSv();
    public function chiTietSoLieuQlsv($coSoId,$queryData);
    public function getNamDaoTao();
    public function getTenCoSoDaoTao();

}