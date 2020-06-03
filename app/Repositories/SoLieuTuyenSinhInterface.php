<?php 
namespace App\Repositories;

interface SoLieuTuyenSinhInterface
{
	public function getSoLuongTuyenSinh($params, $limit = 10);
	public function getChiTietSoLuongTuyenSinh($nam, $dot, $coSoId);
	public function getTenCoSoDaoTao();
	public function getmanganhnghe($id);
	public function postthemsolieutuyensinh($getdata);
	public function getsuasolieutuyensinh($id);
	public function getCheckTonTaiSoLieuTuyenSinh($arrcheck);
	public function getDataSeachCoSo($id);
}
