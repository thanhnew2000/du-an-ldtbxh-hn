<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\NganhNgheChiNhanhRepository;

class NganhNgheChiNhanhService extends AppService
{
    public function getRepository()
    {
        return NganhNgheChiNhanhRepository::class;
    }

    public function boSungNgheVaoChiNhanh($data)
    {
        $this->repository->boSungNgheVaoChiNhanh($data);
    }

    public function getNgheTheoChiNhanh($id)
    {
        return $this->repository->getNgheTheoChiNhanh($id);
    }
}
