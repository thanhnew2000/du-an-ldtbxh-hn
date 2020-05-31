<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QlsvRepository;


class QlsvService extends AppService
{
    public function getRepository()
    {
        return \App\Repositories\QlsvRepository::class;
    }

    public function getQlsv()
    {
        $data =  $this->repository->getQlsv();
        // dd($data);
        foreach ($data as $item) {
            $item->tongsinhvien = $item->so_luong_sv_Cao_dang + $item->so_luong_sv_Trung_cap + $item->so_luong_sv_So_cap + $item->so_luong_sv_he_khac;
        }
        // dd($data);
        return $data;
    }
}