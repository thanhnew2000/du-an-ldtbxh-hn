<?php

namespace App\Repositories;

interface QlsvRepositoryInterface
{
    public function getQlsv();
    public function getCoSo();
    // public function suaSoLieuSv();
    // public function themSoLieuSv();
    public function chiTietSoLieuQlsv($coSoId);
    public function getNamDaoTao();
    public function getTenCoSoDaoTao();

}