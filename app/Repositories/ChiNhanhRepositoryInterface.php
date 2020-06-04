<?php


namespace App\Repositories;


interface ChiNhanhRepositoryInterface
{
    public function getChiNhanh();

    public function getSingleChiNhanh($id);

    public function getChiNhanhThuocCSDT($id);
}
