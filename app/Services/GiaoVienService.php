<?php

namespace App\Services;

use App\Services\AppService;
use App\Repositories\GiaoVienRepositoryInterface;
use Arr;

class GiaoVienService extends AppService
{
    protected $giaoVienRepository;

    public function __construct(
        GiaoVienRepositoryInterface $giaoVienRepository
    ) {
        $this->giaoVienRepository = $giaoVienRepository;
    }

    public function getFilterConfig()
    {
        $filterConfig = config('filters.quan_ly_giao_vien');
        $filterConfig['url'] = route('ql-giao-vien.index');

        $data = $this->giaoVienRepository->getFilterData()->toArray();

        $filterConfig['partials']['giao_vien_id']['options'] = Arr::pluck($data, 'ten', 'id');
        $filterConfig['partials']['trinh_do_id']['options'] = Arr::pluck($data, 'trinh_do', 'id_trinh_do');
        $filterConfig['partials']['co_so_id']['options'] = Arr::pluck($data, 'ten_co_so', 'id_co_so');
        $listTrinhDo = Arr::pluck($data, 'trinh_do_nghiep_vu_su_pham');
        $filterConfig['partials']['nghiep_vu_su_pham']['options'] = array_combine($listTrinhDo, $listTrinhDo);

        return $filterConfig;
    }

    public function getList($params = [], $limit = 10)
    {
        return $this->giaoVienRepository->getList($params, $limit);
    }
}
