<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\PhanQuyenRepository;



class PhanQuyenService extends AppService
{
    protected $PhanQuyenRepository;
    public function getRepository()
    {
        return \App\Repositories\PhanQuyenRepository::class;
    }

    public function getQuyen()
    {
        $data =  $this->repository->getQuyen();
        // dd($data);
        return $data;
    }
}