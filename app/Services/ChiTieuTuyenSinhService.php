<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\ChiTieuTuyenSinhRepository;

class ChiTieuTuyenSinhService extends AppService
{
    public function getRepository()
    {
        return ChiTieuTuyenSinhRepository::class;
    }

    public function getDanhSachChiTieuTuyenSinh($params)
    {
        return $this->repository->getDanhSachChiTieuTuyenSinh($params);
    }

    public function checkTonTaiKhiThem($params)
    {
        return $this->repository->checkTonTaiKhiThem($params);
    }
}
