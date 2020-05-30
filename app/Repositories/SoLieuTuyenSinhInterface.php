<?php 
namespace App\Repositories;

interface SoLieuTuyenSinhInterface
{
	public function getSoLuongTuyenSinh($limit);
	public function getChiTietSoLuongTuyenSinh($id);
	public function getTenCoSoDaoTao();
	public function getmanganhnghe($id);
	public function postthemsolieutuyensinh($getdata);
	public function getsuasolieutuyensinh($id);
}



 ?>