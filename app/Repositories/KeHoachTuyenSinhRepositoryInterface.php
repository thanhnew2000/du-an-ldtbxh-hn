<?php

namespace App\Repositories;

interface KeHoachTuyenSinhRepositoryInterface
{
    public function createKeHoach($id_co_so,$nam);
    public function getKeHoachTuyenSinhofCoSo($id_truong, $year);
}
