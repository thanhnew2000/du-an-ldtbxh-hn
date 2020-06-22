<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\XayDungChuongTrinhGiaoTrinhReponsitory;
use App\Repositories\NganhNgheRepository;
use App\Repositories\CoSoDaoTaoRepository;
use App\Repositories\ChiTieuTuyenSinhRepository;

class XayDungChuongTrinhGiaoTrinhService extends AppService
{

    protected $nganhngheRepository;
    protected $csdtRepository;

    public function __construct(
        NganhNgheRepository $nganhngheRepository,
        CoSoDaoTaoRepository $csdtRepository
    ) {
        parent::__construct();
        $this->nganhngheRepository = $nganhngheRepository;
        $this->csdtRepository = $csdtRepository;
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



}
