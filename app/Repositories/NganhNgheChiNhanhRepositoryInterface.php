<?php


namespace App\Repositories;


interface NganhNgheChiNhanhRepositoryInterface
{
    public function boSungNgheVaoChiNhanh($data);
    public function getNgheTheoChiNhanh($id);
}
