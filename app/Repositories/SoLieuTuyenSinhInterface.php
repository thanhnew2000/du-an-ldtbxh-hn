<?php 
namespace App\Repositories;

interface SoLieuTuyenSinhInterface
{
	public function getSoLuongTuyenSinh($params, $limit = 10);
	public function getChiTietSoLuongTuyenSinh($coSoId,$limit);
	public function getTenCoSoDaoTao();
	public function getmanganhnghe($id);
	public function postthemsolieutuyensinh($getdata);
	public function getsuasolieutuyensinh($id);
	public function getCheckTonTaiSoLieuTuyenSinh($arrcheck);
	public function getDataSeachCoSo($id);
	public function getCoSoTuyenSinhTheoLoaiHinh($id);
	public function getTenQuanHuyen();
	public function getXaPhuongTheoQuanHuyen($id);
}