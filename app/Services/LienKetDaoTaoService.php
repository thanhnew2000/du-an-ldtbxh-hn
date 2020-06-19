<?php

namespace App\Services;

use App\Repositories\LienKetDaoTaoRepository;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;

class LienKetDaoTaoService extends AppService
{
    public function getRepository()
    {
        return LienKetDaoTaoRepository::class;
    }

    public function getTongHopLienKetDaoTao($params = [], $limit)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['nganh_nghe'] = isset($params['nganh_nghe']) ? $params['nganh_nghe'] : null;
        return $this->repository->getTongHopLienKetDaoTao($queryData, $limit);
    }
    public function getTongHopLienKetDaoTaoTheoTrinhDo($params = [], $limit, $id)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['nganh_nghe'] = isset($params['nganh_nghe']) ? $params['nganh_nghe'] : null;
        return $this->repository->getTongHopLienKetDaoTaoTheoTrinhDo($queryData, $limit, $id);
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

    public function chitietlienketdaotao($co_so_id, $params, $limit, $bac_nghe)
    {
        $queryData = [];
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : null;
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : null;
        $data = $this->repository->chitietlienketdaotao($co_so_id, $queryData, $limit, $bac_nghe);

        return $data;
    }

    public function findCoSoDaoTao($co_so_id)
    {
        return $this->repository->findCoSoDaoTao($co_so_id);
    }
    public function sualienketdaotao($id)
    {
        $data = $this->repository->sualienketdaotao($id);
        return $data;
    }

    public function getCheckTonTaiLienKetDaoTao($data, $requestParams)
    {
        $checkResult = $this->getSoLieu($data);
        unset($requestParams['_token']);
        $route = route('xuatbc.them-lien-ket-dao-tao');
        if ($checkResult == 'tontai') {
            $message = 'Liên kết đào tạo đã tồn tại';
        }
        if (!isset($checkResult)) {
            $data = $this->repository->postthemlienketdaotao($requestParams);
            $message = 'Thêm liên kết đào tạo thành công';
            $route = route('xuatbc.tong-hop-lien-ket-dao-tao');
        }
        return ['route' => $route, 'message' => $message,];
    }
    public function getSoLieu($data)
    {
        $dataCheckNew = $this->constructConditionParams($data);

        return $this->repository->getCheckTonTaiLienKetDaoTao($dataCheckNew);
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
