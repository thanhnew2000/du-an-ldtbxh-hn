<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QlsvRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use Carbon\Carbon;



class QlsvService extends AppService
{
    protected $loaiHinhCoSoRepository;
    protected $QlsvRepository;
    public function getRepository()
    {
        return \App\Repositories\QlsvRepository::class;
    }
    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository
    )
    {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;
        // $this->soLieuTuyenSinhRepository = $soLieuTuyenSinhRepository;
    }

    public function getQlsv($param = [])
    {
        $queryData = [];
        // $queryData['dot'] = isset($param['dot']) ? $param['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        // $queryData['nam'] = isset($param['nam']) ? $param['nam'] : Carbon::now()->year;
        $queryData['cs_id'] = isset($param['co_so_id']) ? $param['co_so_id'] : null;
        $queryData['loai_hinh'] = isset($param['loai_hinh']) ? $param['loai_hinh'] : null;

       $data =  $this->repository->getQlsv($queryData);
       return $data;
    }
    public function suaSoLieuSv($id){
        return $this->repository->suaSoLieuQlsv($id);
    }

    public function getLoaiHinh(){
        return $this->loaiHinhCoSoRepository->getAll();
    }
    public function getCoSo(){
        return $this->repository->getCoSo();
    }
    public function getTongHopSvTheoLoaiHinh($id){
        $data = $this->repository->getTongHopSvTheoLoaiHinh($id);
        return $data;
    }
    public function chiTietSoLieuQlsv($coSoId,$param){
        
        $queryData = [];
        $queryData['nam'] = isset($param['nam']) ? $param['nam'] : null;
        $queryData['dot'] = isset($param['dot']) ? $param['dot'] : null;
        // $queryData['cs_id'] = isset($param['co_so_id']) ? $param['co_so_id'] : null;
        // $queryData['loai_hinh'] = isset($param['loai_hinh']) ? $param['loai_hinh'] : null;
        $data = $this->repository->chiTietSoLieuQlsv($coSoId,$queryData);
        return $data;
        // dd($data);
    }
    public function getNamDaoTao(){
        return $this->repository->getNamDaoTao();
    }
    public function getCoSoDaoTao(){
        return $this->repository->getCoSoDaoTao();
    }
}