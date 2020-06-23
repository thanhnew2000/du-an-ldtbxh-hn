<?php
namespace App\Repositories;

interface GiaoDucNgheNghiepRepositoryInterface
{
    public function index($params,$limit);
    public function getTenCoSoDaoTao();
    public function getTenQuanHuyen();
    public function getXaPhuongTheoQuanHuyen($id);
    public function getNganhNghe($ma_cap_nghe);
    public function edit($id);
    public function getNganhNgheThuocCoSo($id);
    public function getCheckTonTaiGiaoDucNgheNghiep($arrcheck);
}
?>
