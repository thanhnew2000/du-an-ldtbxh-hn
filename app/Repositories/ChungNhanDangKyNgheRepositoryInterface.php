<?php


namespace App\Repositories;


interface ChungNhanDangKyNgheRepositoryInterface
{
    //    public function getCsdt();

    public function getNgheTheoCoSoDaoTao($params);
    public function getNgheTheoGiayPhep($params);
    public function xoaNgheTrongGiayPhep($params);
    public function getTongSoTuyenSinhTheoNghe($params);
}
