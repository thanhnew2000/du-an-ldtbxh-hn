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

    public function getNganhNgheTheoCoSo($co_so_id)
    {
        return $this->repository->getNganhNgheTheoCoSo($co_so_id);
    }

    public function chiTietTheoCoSo($co_so_id, $params)
    {
        return $this->repository->chiTietTheoCoSo($co_so_id, $params);
    }
}
