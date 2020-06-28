<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Services\StoreUpdateNotificationService;
use App\Repositories\SoLieuTuyenSinhRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use Carbon\Carbon;
use Auth;

class SoLieuTuyenSinhService extends AppService
{
    protected $loaiHinhCoSoRepository;
    protected $soLieuTuyenSinhRepository;
    protected $StoreUpdateNotificationService;

    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository,
        StoreUpdateNotificationService $StoreUpdateNotificationService
    ) {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;
        $this->StoreUpdateNotificationService = $StoreUpdateNotificationService;
        // $this->soLieuTuyenSinhRepository = $soLieuTuyenSinhRepository;
    }

    //Lay Repository Product
    public function getRepository()
    {
        return SoLieuTuyenSinhRepository::class;
    }

    public function getListLoaiHinh()
    {
        return $this->loaiHinhCoSoRepository->getAll();
    }

    public function getSoLuongTuyenSinh($params = [], $limit)
    {
       
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['devvn_xaphuongthitran'] = isset($params['devvn_xaphuongthitran']) ? $params['devvn_xaphuongthitran'] : null;
        $queryData['nganh_nghe'] = isset($params['nganh_nghe']) ? $params['nganh_nghe'] : null;
        $data = $this->repository->getSoLuongTuyenSinh($queryData, $limit);

        return $data;
    }

    public function getChiTietSoLuongTuyenSinh($coSoId, $limit, $params)
    {
        $queryData = [];
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : null;
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : null;
        $data = $this->repository->getChiTietSoLuongTuyenSinh($coSoId, $limit, $queryData);
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

    public function postthemsolieutuyensinh($getdata)
    {
        $content=[
            'tieu_de' => 'Thêm mới',
            'conntent' => 'Thêm mới số liệu tuyển sinh',
            'module_name' => 'xuatbc.chi-tiet-dang-ky-chi-tieu-tuyen-sinh',
            'nam' => $getdata['nam'],
            'dot' => $getdata['dot'],
            'co_so_id' => $getdata['co_so_id'],
            'sending_user_fullname' => Auth::user()->name
        ];
        unset($getdata['_token']);
        $dateTime = Carbon::now();
        $getdata['thoi_gian_cap_nhat'] = $dateTime->format('Y-m-d H:i:s');
        
        $data = $this->repository->postthemsolieutuyensinh($getdata);
        if($data){
            $this->StoreUpdateNotificationService->StoreUpdateBM($content);
        }
        return $data;
    }

    public function getsuasolieutuyensinh($id)
    {
        return  $this->repository->getsuasolieutuyensinh($id);
    }

    public function updateData($id, $request)
    {
        $attributes = $request->all();
        $getdata =$this->repository->findById($id);
        $content=[
            'tieu_de' => 'Cập nhật',
            'conntent' => 'Cập nhật số liệu tuyển sinh',
            'module_name' => 'xuatbc.chi-tiet-dang-ky-chi-tieu-tuyen-sinh',
            'nam' => $getdata->nam,
            'dot' => $getdata->dot,
            'co_so_id' => $getdata->co_so_id,
            'sending_user_fullname' => Auth::user()->name
        ];
        unset($attributes['_token']);
        $resurt = $this->repository->updateData($id, $attributes);
        if($resurt){
            $this->StoreUpdateNotificationService->StoreUpdateBM($content);
        }
        return $resurt;
    }

    public function getCheckTonTaiSoLieuTuyenSinh($data, $requestParams)
    {
        $checkResult = $this->getSoLieu($data);
        unset($requestParams['_token']);
        $route = route('themsolieutuyensinh');
        $message = $checkResult == 'tontai' ?
            'Số liệu tuyển sinh đã tồn tại và được phê duyệt' :
            'Số liệu tuyển sinh đã tồn tại';
        
        if (!isset($checkResult)) {
            $data = $this->postthemsolieutuyensinh($requestParams);
            $message = 'Thêm số liệu tuyển sinh thành công';
            $route = route('chitietsolieutuyensinh', [
                'co_so_id' => $requestParams['co_so_id'],
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

        return $this->repository->getCheckTonTaiSoLieuTuyenSinh($dataCheckNew);
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

    public function getDataSeachCoSo($id)
    {
        $data = $this->repository->getDataSeachCoSo($id);
        $data->ketquatuyensinh = $data->so_luong_sv_Cao_dang + $data->so_luong_sv_Trung_cap + $data->so_luong_sv_So_cap + $data->so_luong_sv_he_khac;
        return $data;
    }

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

    public function getNganhNghe($ma_cap_nghe)
    {
        return  $this->repository->getNganhNghe($ma_cap_nghe);
    }

    public function getThongTinCoSo($coSoId)
    {
        return  $this->repository->getThongTinCoSo($coSoId);
    }
    public function getNgheTheoCapBac($id, $cap_nghe)
    {
        return  $this->repository->getNgheTheoCapBac($id, $cap_nghe);
    }
}

 ?>