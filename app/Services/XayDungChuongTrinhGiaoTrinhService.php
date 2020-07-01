<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\XayDungChuongTrinhGiaoTrinhReponsitory;
use App\Repositories\NganhNgheRepository;
use App\Repositories\CoSoDaoTaoRepository;
use App\Repositories\ChiTieuTuyenSinhRepository;
use App\Services\StoreUpdateNotificationService;
class XayDungChuongTrinhGiaoTrinhService extends AppService
{

    protected $nganhngheRepository;
    protected $csdtRepository;
    protected $StoreUpdateNotificationService;

    public function __construct(
        NganhNgheRepository $nganhngheRepository,
        CoSoDaoTaoRepository $csdtRepository,
        StoreUpdateNotificationService $StoreUpdateNotificationService
    ) {
        parent::__construct();
        $this->nganhngheRepository = $nganhngheRepository;
        $this->csdtRepository = $csdtRepository;
        $this->StoreUpdateNotificationService = $StoreUpdateNotificationService;
    }

    public function getRepository()
    {
        return XayDungChuongTrinhGiaoTrinhReponsitory::class;
    }

    public function getDanhSachXayDungChuongTrinhGiaoTrinh($params)
    {
        return $this->repository->getDanhSachXayDungChuongTrinhGiaoTrinh($params);
    }

    public function getNganhNghe()
    {
        return $this->nganhngheRepository->getAll();
    }

    public function getCoSoDaoTao()
    {
        return $this->csdtRepository->getAll();
    }

    public function checkTonTaiKhiThem($params){
        return $this->repository->checkTonTaiKhiThem($params);
    }

    public function findNganhNgheById($id)
    {
        return $this->nganhngheRepository->findById($id);
    }

    public function checkTonTai($id)
    {
        return $this->csdtRepository->checkTonTai($id);
    }

    public function chiTietTheoCoSo($co_so_id, $params)
    {
        return $this->repository->chiTietTheoCoSo($co_so_id, $params);
    }

    public function getSingleCsdt($id)
    {
        return $this->csdtRepository->getSingleCsdt($id);
    }


    public function getNganhNgheTheoCoSo($co_so_id)
    {
        return $this->nganhngheRepository->getNganhNgheTheoCoSo($co_so_id);
    }

    public function store(array $data = [])
    {
        $returnData = $this->repository->store($data);
        if($returnData){
            $thongTinCoSo = $this->repository->getThongTinCoSo($data['co_so_id']);
            $tieude = 'Thêm mới ( '.$thongTinCoSo->ten.' )';
            $noidung = 'Thêm mới số liệu xây dựng giáo trình';
            $route = route('xuatbc.show-ds-xd-giao-trinh',['co_so_id' => $data['co_so_id']]);
            $this->StoreUpdateNotificationService->addContentUp($data['nam'],$data['dot'],$data['co_so_id'],$tieude,$noidung,$route);

        }
        return $returnData;
    }


    public function updateData($id, $request)
    {
        $attributes = $request->all();
        unset($attributes['_token']);
        $resurt = $this->repository->update($id, $attributes);
        $dataFindId = $this->repository->findById($id);
        $getdata = (array)$dataFindId;
        $thongTinCoSo = $this->repository->getThongTinCoSo($getdata['co_so_id']);
        if($resurt){         
            $tieude = 'Cập nhật ( '.$thongTinCoSo->ten.' )';
			$noidung = 'Cập nhật số liệu xây dựng giáo trình';
            $route = route('xuatbc.show-ds-xd-giao-trinh',['co_so_id' => $getdata['co_so_id']]);
			$this->StoreUpdateNotificationService->addContentUp($getdata['nam'],$getdata['dot'],$getdata['co_so_id'],$tieude,$noidung,$route);
        }
        return $resurt;
    }

}
