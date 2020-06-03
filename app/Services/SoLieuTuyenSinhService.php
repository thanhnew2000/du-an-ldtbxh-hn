<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\SoLieuTuyenSinhRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use Carbon\Carbon;

class SoLieuTuyenSinhService extends AppService
{
    protected $loaiHinhCoSoRepository;
    protected $soLieuTuyenSinhRepository;

    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository
    )
    {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;
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

    public function getSoLuongTuyenSinh($params = [], $limit = 10)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;

        $data = $this->repository->getSoLuongTuyenSinh($queryData, $limit);

        foreach ($data as $item) {
            $item->ketquatuyensinh = $item->so_luong_sv_Cao_dang +
                $item->so_luong_sv_Trung_cap +
                $item->so_luong_sv_So_cap +
                $item->so_luong_sv_he_khac;
        }

        return $data;
    }

    public function getChiTietSoLuongTuyenSinh($nam, $dot, $coSoId){
        $data = $this->repository->getChiTietSoLuongTuyenSinh($nam, $dot, $coSoId);
        $data->ketquatuyensinh = $data->so_luong_sv_Cao_dang+$data->so_luong_sv_Trung_cap+$data->so_luong_sv_So_cap+$data->so_luong_sv_he_khac;
        return $data;
    }
    public function getTenCoSoDaoTao(){
        return $this->repository->getTenCoSoDaoTao();
    }

    public function getmanganhnghe($id){
        $data = $this->repository->getmanganhnghe($id);
        return $data;
    }

    public function postthemsolieutuyensinh($getdata)
    {
        unset($getdata['_token']);
        $dateTime = Carbon::now();
        $getdata['thoi_gian_cap_nhat']=$dateTime->format('Y-m-d H:i:s');
        return $data = $this->repository->postthemsolieutuyensinh($getdata);
    }

    public function getsuasolieutuyensinh($id)
    {
        return $this->repository->getsuasolieutuyensinh($id);
    }

    public function getCheckTonTaiSoLieuTuyenSinh($datacheck)
    {
        $datachecknew=[];
        foreach ($datacheck as $item) {
            $dataconvest=[$item['id'], '=' ,$item['value']];
            array_push($datachecknew,$dataconvest);
        }
        // dd($datachecknew);
        return $this->repository->getCheckTonTaiSoLieuTuyenSinh($datachecknew);
    }

    public function getDataSeachCoSo($id)
    {
        $data = $this->repository->getDataSeachCoSo($id);
        $data->ketquatuyensinh = $data->so_luong_sv_Cao_dang+$data->so_luong_sv_Trung_cap+$data->so_luong_sv_So_cap+$data->so_luong_sv_he_khac;
        return $data;
    }

}
 ?>
