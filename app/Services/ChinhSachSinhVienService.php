<?php

namespace App\Services;

use App\Repositories\ChinhSachSinhVienRepository;
use Carbon\Carbon;

class ChinhSachSinhVienService extends AppService
{
    public function getRepository()
    {
        return ChinhSachSinhVienRepository::class;
    }

    public function getChinhSachSinhVien($params = [], $limit)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['chinhsach'] = isset($params['chinhsach']) ? $params['chinhsach'] : 1;
        return $this->repository->getChinhSachSinhVien($queryData, $limit);
    }
    public function postthemChinhSachSinhVien($getDaTa)
    {
        unset($getDaTa['_token']);
        return $this->repository->postthemChinhSachSinhVien($getDaTa);
    }
    public function checktontaiChinhSachSinhVien($data, $requestParams)
    {
        $dataCheckNew = $this->constructConditionParams($data);

        $kqkiemtra = $this->repository->checktontaiChinhSachSinhVien($dataCheckNew);
        //dd($kqkiemtra);
        unset($requestParams['_token']);
        $route = route('xuatbc.them-chinh-sach-sinh-vien');

        if ($kqkiemtra == 'tontai') {
            $mess = 'Số liệu chính sách sinh viên đã tồn tại';
        }
        if (!isset($kqkiemtra)) {

            $data = $this->repository->postthemChinhSachSinhVien($requestParams);
            $route = route('xuatbc.tong-hop-chinh-sach-sinh-vien');
            $mess = 'Thêm số liệu tuyển sinh thành công';
        }

        return ['route' => $route, 'mess' => $mess];
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
    public function getsuaChinhSachSinhVien($id)
    {
        return $this->repository->getsuaChinhSachSinhVien($id);
    }
}
