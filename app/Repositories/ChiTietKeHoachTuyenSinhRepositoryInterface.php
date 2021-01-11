<?php

namespace App\Repositories;

interface ChiTietKeHoachTuyenSinhRepositoryInterface
{
    public function getChiTietKeHoachTuyenSinh($ke_hoach_id);
    public function getOneChiTietKeHoachTuyenSinh($id);
    public function createCtKeHoachTuyenSinh($arrayData);
}
