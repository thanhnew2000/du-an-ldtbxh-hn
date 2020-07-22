<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QuanLyGiayChungNhanDaoTaoNgheRepository;
use Carbon\Carbon;

class QuanLyGiayChungNhanDaoTaoNgheService extends AppService
{

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
        return $this->repository->get_co_so();
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
        $chi_nhanh = $this->repository ->getChiNhanh($giay_phep->co_so_id);
        $giay_phep_chi_tiet = $this->repository->giayPhepChiTiet($id);
        foreach ($chi_nhanh as $item1) {
            $item1->data=[];
            foreach ($giay_phep_chi_tiet as $item2) {

                if($item2->phan_loai_nghe==1)
                {
                    $item2->ten_nghe = $this->repository->getNgheTcSc($item2->nghe_id);
                }else
                {
                    $item2->ten_nghe = $this->repository->getNgheTcCd($item2->nghe_id);
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
        return $this->repository->giayPhepChiTiet($id);
    }

    public function findNghe($id)
    {
        return $this->repository->findNghe($id);
    }

    public function deleteDataNgheTcSc($id)
    {
       return $this->repository->deleteDataNgheTcSc($id);
    }

    public function deleteDataNgheChiTiet($id)
    {
       return $this->repository->deleteDataNgheChiTiet($id);
    }
    public function insertToGiayChungNhanChiTiet($dataInsert){
        return $this->repository->insertToGiayChungNhanChiTiet($dataInsert);
    }

    public function insertNganhNghe2AndGetId($dataInsert){
        return $this->repository->insertNganhNghe2AndGetId($dataInsert);
    }
}

 ?>