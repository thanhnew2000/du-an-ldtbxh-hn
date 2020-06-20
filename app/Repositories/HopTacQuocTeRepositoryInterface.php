<?php 
namespace App\Repositories;

interface HopTacQuocTeRepositoryInterface
{
    public function getDanhSachKetQuaHopTacQuocTe($params);
    public function checkTonTaiKhiThem($params);
    public function chiTietTheoCoSo($co_so_id, $params);
	
}
