<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QuanLyGiayChungNhanDaoTaoNgheRepository;
use App\Repositories\GiayChungNhanChiTietRepository;
use App\Repositories\NganhNgheTcScRepository;
use App\Repositories\NganhNgheRepository;
use App\Repositories\CoSoDaoTaoRepository;
use App\Repositories\ChiNhanhRepository;



use Carbon\Carbon;

class QuanLyGiayChungNhanDaoTaoNgheService extends AppService
{
    protected $GiayChungNhanChiTietRepository;
    protected $NganhNgheTcScRepository;
    protected $NganhNgheRepository;
    protected $CoSoDaoTaoRepository;
    protected $ChiNhanhRepository;

    public function __construct(
        GiayChungNhanChiTietRepository $GiayChungNhanChiTietRepository,
        NganhNgheTcScRepository $NganhNgheTcScRepository,
        NganhNgheRepository $NganhNgheRepository,
        CoSoDaoTaoRepository $CoSoDaoTaoRepository,
        ChiNhanhRepository $ChiNhanhRepository
    )
    {
        parent::__construct();
        $this->GiayChungNhanChiTietRepository = $GiayChungNhanChiTietRepository;
        $this->NganhNgheTcScRepository = $NganhNgheTcScRepository;
        $this->NganhNgheRepository = $NganhNgheRepository;
        $this->CoSoDaoTaoRepository = $CoSoDaoTaoRepository;
        $this->ChiNhanhRepository = $ChiNhanhRepository;

    }

    public function getRepository()
    {
        return QuanLyGiayChungNhanDaoTaoNgheRepository::class;
    }
    public function index($params,$limit)
    {
        $queryData = [];
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['so_quyet_dinh'] = isset($params['so_quyet_dinh']) ? $params['so_quyet_dinh'] : null;
        return $this->repository->index($queryData,$limit);
    }

    public function get_co_so()
    {
        return $this->CoSoDaoTaoRepository->get_co_so();
    }

    public function createGiayPhep($data)
    {
        return $this->repository->createGiayPhep($data);
    }

    public function getGiayPhep($id)
    {
        return $this->repository->getGiayPhep($id);
    }

    public function getGiayPhepId($id)
    {
        $giay_phep = $this->repository->getGiayPhepId($id);
        $chi_nhanh = $this->repository->getChiNhanhCoSo($giay_phep->co_so_id);
        $giay_phep_chi_tiet = $this->GiayChungNhanChiTietRepository->giayPhepChiTiet($id);
        foreach ($chi_nhanh as $item1) {
            $item1->data=[];
            foreach ($giay_phep_chi_tiet as $item2) {
                if($item2->phan_loai_nghe==1)
                {
                    $item2->ten_nghe = $this->NganhNgheTcScRepository->getNgheTcSc($item2->nghe_id);
                }else
                {
                    $item2->ten_nghe = $this->NganhNgheRepository->getNgheTcCd($item2->nghe_id);
                }
                if($item1->id == $item2->chi_nhanh_id){       
                    array_push($item1->data,$item2);
                }          
            }
        }
        
        return [
            'giay_phep' => $giay_phep,
            'chi_nhanh' => $chi_nhanh
        ];

    }

    public function updateData($data)
    {
        $id = $data['get_giay_phep_id'];
        unset($data['get_giay_phep_id']);
        return $this->repository->updateData($id,$data);
    }

    public function giayPhepChiTiet($id)
    {
        return $this->GiayChungNhanChiTietRepository->giayPhepChiTiet($id);
    }

    public function findNghe($id)
    {
        return $this->repository->findNghe($id);
    }

    public function deleteDataNgheTcSc($id)
    {
       return $this->NganhNgheTcScRepository->deleteDataNgheTcSc($id);
    }

    public function deleteDataNgheChiTiet($id)
    {
       return $this->GiayChungNhanChiTietRepository->deleteDataNgheChiTiet($id);
    }
     public function insertToGiayChungNhanChiTiet($dataInsert){
        return $this->GiayChungNhanChiTietRepository->insertToGiayChungNhanChiTiet($dataInsert);
    }

    public function insertNganhNghe2AndGetId($dataInsert){
        return $this->NganhNgheTcScRepository->insertNganhNghe2AndGetId($dataInsert);
    }
}

 ?>