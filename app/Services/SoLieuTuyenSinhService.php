<?php 
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\SoLieuTuyenSinhRepository;
use Carbon\Carbon;
class SoLieuTuyenSinhService extends AppService
{
	//Lay Repository Product
	 public function getRepository()
    {
        return \App\Repositories\SoLieuTuyenSinhRepository::class;
    }

    public function getSoLuongTuyenSinh($limit){
        $data = $this->repository->getSoLuongTuyenSinh($limit);
        foreach ($data as $item) {
           $item->ketquatuyensinh = $item->so_luong_sv_Cao_dang+$item->so_luong_sv_Trung_cap+$item->so_luong_sv_So_cap+$item->so_luong_sv_he_khac;
        }
        return $data;
    }
    
    public function getChiTietSoLuongTuyenSinh($id){
        $data = $this->repository->getChiTietSoLuongTuyenSinh($id);
        $data->ketquatuyensinh = $data->so_luong_sv_Cao_dang+$data->so_luong_sv_Trung_cap+$data->so_luong_sv_So_cap+$data->so_luong_sv_he_khac;
        return $data;
    }
    public function getTenCoSoDaoTao(){
        $data = $this->repository->getTenCoSoDaoTao();
        return $data;
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
        $getdata['nam'] = $dateTime->year;
        $getdata['dot']=1;
        return $data = $this->repository->postthemsolieutuyensinh($getdata);
    }

    public function getsuasolieutuyensinh($id)
    {
        return $this->repository->getsuasolieutuyensinh($id);
    }

}
 ?> 