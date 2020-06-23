<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\GiaoDucNgheNghiepRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use Carbon\Carbon;

class GiaoDucNgheNghiepService extends AppService
{
    protected $LoaiHinhCoSoRepositoryInterface;

    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository

    ) {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;

    }

    public function getRepository()
    {
        return GiaoDucNgheNghiepRepository::class;
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
        $queryData['nghe_cap_2'] = isset($params['nghe_cap_2']) ? $params['nghe_cap_2'] : null;

        if(isset($params['nghe_cap_3'])){
            $queryData['nghe_cap_2']=null;
            $queryData['nghe_cap_3']=$params['nghe_cap_3'];
        }else{
            $queryData['nghe_cap_3']=null;
        }

        if(isset($params['nghe_cap_4'])){
            $queryData['nghe_cap_2']=null;
            $queryData['nghe_cap_3']=null;
            $queryData['nghe_cap_4']=$params['nghe_cap_4'];
        }else{
            $queryData['nghe_cap_4']=null;
        }
        // dd($queryData);
        $data = $this->repository->index($queryData, $limit);

        return $data;
    }
    // quảng - 15/6 lấy tên cở sở đào tạo
    public function getTenCoSoDaoTao()
    {
        return $this->repository->getTenCoSoDaoTao();
    }

     // quảng - 15/6 lấy  cơ sở theo loại hình
     public function getCoSoTuyenSinhTheoLoaiHinh($id)
     {
         $data = $this->repository->getCoSoTuyenSinhTheoLoaiHinh($id);
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
     
     // quảng - 15/6 lấy tất cả ngành nghề theo từng cấp bậc
     public function getNganhNghe($ma_cap_nghe)
     {
         return  $this->repository->getNganhNghe($ma_cap_nghe);
     }

     // quảng - 15/6  lọc ngành nghề theo từng cấp bậc
     public function getNgheTheoCapBac($id, $cap_nghe)
     {
         return  $this->repository->getNgheTheoCapBac($id, $cap_nghe);
     }

     public function getThongTinCoSo($coSoId)
     {
         return  $this->repository->getThongTinCoSo($coSoId);
     }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function getNganhNgheThuocCoSo($id)
    {
        return $this->repository->getNganhNgheThuocCoSo($id);
    }

    public function getCheckTonTaiGiaoDucNgheNghiep($data, $requestParams)
    {
        $checkResult = $this->getSoLieu($data);
        unset($requestParams['_token']);
        $route = route('xuatbc.quan-ly-giao-duc-nghe-nghiep.create');
        $message = $checkResult == 'tontai' ?
            'Số liệu đã tồn tại và được phê duyệt' :
            'Số liệu đã tồn tại';
        
        if (!isset($checkResult)) {
            $data = $this->repository->store($requestParams);
            $message = 'Thêm số liệu thành công';
            $route = route('xuatbc.quan-ly-giao-duc-nghe-nghiep', [
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

        return $this->repository->getCheckTonTaiGiaoDucNgheNghiep($dataCheckNew);
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