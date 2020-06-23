<?php

namespace App\Services;

use App\Repositories\KetQuaTotNghiepGanVoiDoanhNghiepRepository;
use Carbon\Carbon;

class KetQuaTotNghiepGanVoiDoanhNGhiepService extends AppService
{
    public function getRepository()
    {
        return KetQuaTotNghiepGanVoiDoanhNghiepRepository::class;
    }
    public function getKetQuaTotNghiepGanVoiDoanhNghiep($params = [], $limit)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['nganh_nghe'] = isset($params['nganh_nghe']) ? $params['nganh_nghe'] : null;
        return $this->repository->getKetQuaTotNghiepGanVoiDoanhNghiep($queryData, $limit);
    }

    public function getTenQuanHuyen()
    {
        return $this->repository->getTenQuanHuyen();
    }
    public function getXaPhuongTheoQuanHuyen($id)
    {
        return  $this->repository->getXaPhuongTheoQuanHuyen($id);
    }
    public function getCoSo()
    {
        return $this->repository->getCoSo();
    }
    public function getNganhNghe($ma_cap_nghe)
    {
        return $this->repository->getNganhNghe($ma_cap_nghe);
    }

    public function getNgheTheoCapBac($id, $cap_nghe)
    {
        return $this->repository->getNgheTheoCapBac($id, $cap_nghe);
    }

    public function getLoaiHinhCoSo()
    {
        return $this->repository->getLoaiHinhCoSo();
    }

    public function ChiTietKetQuaTotNghiepGanVoiDoanhNghiep($co_so_id, $params, $limit)
    {
        $queryData = [];
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : null;
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : null;
        $data = $this->repository->ChiTietKetQuaTotNghiepGanVoiDoanhNghiep($co_so_id, $queryData, $limit);
        return $data;
    }
    public function findCoSoDaoTao($co_so_id)
    {
        return $this->repository->findCoSoDaoTao($co_so_id);
    }

    public function SuaKetQuaTotNghiepGanVoiDoanhNghiep($id)
    {
        $data = $this->repository->SuaKetQuaTotNghiepGanVoiDoanhNghiep($id);
        return $data;
    }


    public function getCheckTonTai($data, $requestParams)
    {
        $checkResult = $this->getSoLieu($data);
        unset($requestParams['_token']);
        $route = route('xuatbc.them-ket-qua-tot-nghiep-voi-doanh-nghiep');
        if ($checkResult == 'tontai') {
            $message = 'Số liệu đã tồn tại !';
        }
        if (!isset($checkResult)) {
            $data = $this->repository->PostKetQuaTotNghiepGanVoiDoanhNghiep($requestParams);
            $message = 'Thêm số liệu thành công';
            $route = route('xuatbc.ket-qua-tot-nghiep-voi-doanh-nghiep');
        }
        return ['route' => $route, 'message' => $message,];
    }
    public function getSoLieu($data)
    {
        $dataCheckNew = $this->constructConditionParams($data);

        return $this->repository->CheckTonTai($dataCheckNew);
    }

    protected function constructConditionParams($params)
    {
        $conditionData = [];
        foreach ($params as $item) {
            $conditionData[] = [
                $item['id'],
                '=',
                $item['value'],
            ];
        }

        return $conditionData;
    }
}
