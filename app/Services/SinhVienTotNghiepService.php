<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\SinhVienTotNghiepRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;

use Carbon\Carbon;

class SinhVienTotNghiepService extends AppService
{
    
    protected $loaiHinhCoSoRepository;

    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository
    ) {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;
    }
    public function getRepository()
    {
        return SinhVienTotNghiepRepository::class;
    }
    public function getListLoaiHinh()
    {
        return $this->loaiHinhCoSoRepository->getAll();
    }

    public function index($params = [], $limit)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['devvn_xaphuongthitran'] = isset($params['devvn_xaphuongthitran']) ? $params['devvn_xaphuongthitran'] : null;
        $queryData['nganh_nghe'] = isset($params['nganh_nghe']) ? $params['nganh_nghe'] : null;
        $data = $this->repository->index($queryData, $limit);

        return $data;
    }
    public function getTenCoSoDaoTao()
    {
        return $this->repository->getTenCoSoDaoTao();
    }
    public function getmanganhnghe($id)
    {
        $data = $this->repository->getmanganhnghe($id);
        return $data;
    }
    public function getTenQuanHuyen()
    {
        return  $this->repository->getTenQuanHuyen();
    }
    public function getXaPhuongTheoQuanHuyen($id)
    {
        return  $this->repository->getXaPhuongTheoQuanHuyen($id);
    }
    public function getNganhNghe($ma_cap_nghe)
    {
        return  $this->repository->getNganhNghe($ma_cap_nghe);
    }
    public function getNgheTheoCapBac($id, $cap_nghe)
    {
        return  $this->repository->getNgheTheoCapBac($id, $cap_nghe);
    }
    public function getThongTinCoSo($coSoId)
    {
        return  $this->repository->getThongTinCoSo($coSoId);
    }
    public function getChiTietTongHopTotNghiep($coSoId, $limit, $params)
    {
        $queryData = [];
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : null;
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : null;
        $data = $this->repository->getChiTietTongHopTotNghiep($coSoId, $limit, $queryData);
        return $data;
    // dd($data);
    }
    public function getSuaSoLieuTotNghiep($id)
    {
        return $this->repository->getSuaSoLieuTotNghiep($id);
    }

    public function getCheckTonTaiSoLieuTotNghiep($data, $requestParams)
    {
        $checkResult = $this->getSoLieu($data);
        unset($requestParams['_token']);
        $route = route('xuatbc.them-tong-hop');
        $message = $checkResult == 'tontai' ?
            'Số liệu tốt nghiệp đã tồn tại và được phê duyệt' :
            'Số liệu tốt nghiệp đã tồn tại';
        
        if (!isset($checkResult)) {
            $data = $this->repository->postThemSoLieuTotNghiep($requestParams);
            $message = 'Thêm số liệu tốt nghiệp thành công';
            $route = route('xuatbc.chi-tiet-tong-hop', [
                'id' => $requestParams['co_so_id'],
            ]);
        }

        return [
            'route' => $route,
            'message' => $message,
        ];
    }
    public function getSoLieu($data)
    {
        $dataCheckNew = $this->constructConditionParams($data);

        return $this->repository->getCheckTonTaiSoLieuTotNghiep($dataCheckNew);
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

 ?>