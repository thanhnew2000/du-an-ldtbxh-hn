<?php


namespace App\Repositories;


interface CoSoDaoTaoRepositoryInterface
{
    public function getCsdt($params);

    /**
     * @param $id
     * @return mixed
     */
    public function getSingleCsdt($id);

    public function apiSearchCoSoDaoTao($params);

    public function addCoQuanChuQuan($attributes = []);

    public function addQuyetDinh($attributes = []);
    public function getCoSoBySoLieuId($soLieuId);

    public function getAllWithLoaiHinh();
}