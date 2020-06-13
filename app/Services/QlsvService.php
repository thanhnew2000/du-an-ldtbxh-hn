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

    public function getQlsv($params = [])
    {
        if(!isset($params['nam'])) $params['nam'] = null;
        if(!isset($params['dot'])) $params['dot'] = null;
        if(!isset($params['co_so_id'])) $params['co_so_id'] = null;
        if(!isset($params['nghe_id'])) $params['nghe_id'] = null;
        if(!isset($params['loai_hinh'])) $params['loai_hinh'] = null;
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');

        
       $data =  $this->repository->getQlsv($params);
    //    dd($data);
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
    public function getNganhNghe($ma_cap_nghe){
        return $this->repository->getNganhNghe($ma_cap_nghe);
    }
    public function getTongHopSvTheoLoaiHinh($id){
        $data = $this->repository->getTongHopSvTheoLoaiHinh($id);
        return $data;
    }
    public function chiTietSoLieuQlsv($coSoId,$params){
        
       
        if(!isset($params['nam'])) $params['nam'] = null;
        if(!isset($params['dot'])) $params['dot'] = null;
        if(!isset($params['devvn_quanhuyen'])) $params['devvn_quanhuyen'] = null;
        if(!isset($params['devvn_xaphuongthitran'])) $params['devvn_xaphuongthitran'] = null;
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        // $queryData['cs_id'] = isset($param['co_so_id']) ? $param['co_so_id'] : null;
        // $queryData['loai_hinh'] = isset($param['loai_hinh']) ? $param['loai_hinh'] : null;
        $data = $this->repository->chiTietSoLieuQlsv($coSoId,$params);
        return $data;
        //  dd($data);
    }
    public function getNamDaoTao(){
        return $this->repository->getNamDaoTao();
    }
    public function getCoSoDaoTao(){
        return $this->repository->getCoSoDaoTao();
    }

    public function getTenQuanHuyen(){
        return $this->repository->getTenQuanHuyen();
    }
    public function getTenXaPhuongTheoQuanHuyen($id){
        return $this->repository->getTenXaPhuongTheoQuanHuyen($id);
    }

    public function getMaNganhNghe(){
        return $this->repository->getMaNganhNghe();
    }
}