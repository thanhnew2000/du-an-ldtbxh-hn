<?php
namespace App\Repositories;

interface BieuMauRepositoryInterface
{
    public function createBieuMau($id_co_so,$thoi_gian,$dot,$type);
    public function getBieuMauTuyenSinh($id_truong, $year,$dot);
}
?>