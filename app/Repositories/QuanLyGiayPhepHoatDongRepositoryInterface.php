<?php


namespace App\Repositories;


interface QuanLyGiayPhepHoatDongRepositoryInterface
{
    public function index($params,$limit);
    public function get_co_so();
    public function createGiayPhep($data);
    public function getGiayPhep($id);
    public function getGiayPhepId($id);    
    public function updateData($id,$data);

}
