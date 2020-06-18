<?php
namespace App\Repositories;

interface DaoTaoNgheChoNguoiKhuyetTatRepositoryInterface
{
    public function index($params,$limit);
    public function getTenCoSoDaoTao();
    public function getTenQuanHuyen();
    // public function getXaPhuongTheoQuanHuyen($id);
    public function getNganhNghe($ma_cap_nghe);
    public function getChiTietDaoTaoNgheChoNguoiKhuyetTat($coSoId,$limit,$queryData);
    // public function getNgheTheoCapBac($id, $cap_nghe);
    // public function getThongTinCoSo($coSoId);
    // public function getChiTietDaoTaoNgheChoNguoiKhuyetTat($coSoId,$limit,$queryData);
    public function edit($id);
    public function getNganhNgheThuocCoSo($id);
    // public function getCheckDaoTaoNgheChoNguoiKhuyetTat($arrcheck);
    // public function store($getdata);
}
?>
