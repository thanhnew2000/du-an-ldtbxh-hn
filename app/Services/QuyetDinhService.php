<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QuyetDinhRepository;


class QuyetDinhService extends AppService
{
    public function getRepository()
    {
        return QuyetDinhRepository::class;
    }
    public function createQuyetDinh($request)
    {
        $attributes = $request->all();
        return $this->repository->createQuyetDinh($attributes);
    }
}
