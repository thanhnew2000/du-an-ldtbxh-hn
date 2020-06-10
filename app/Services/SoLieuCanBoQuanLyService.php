<?php

namespace App\Services;

use App\Services\AppService;
use App\Repositories\SoLieuCanBoQuanLyRepositoryInterface;
use App\Repositories\CoSoDaoTaoRepositoryInterface;
use App\Repositories\TrinhDoGiaoVienRepositoryInterface;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use Arr;

class SoLieuCanBoQuanLyService extends AppService
{
    protected $soLieuCBQLRepository;
    protected $csdtRepository;
    protected $loaiHinhRepository;

    public function __construct(
        SoLieuCanBoQuanLyRepositoryInterface $soLieuCanBoQuanLyRepository,
        CoSoDaoTaoRepositoryInterface $csdtRepository,
        LoaiHinhCoSoRepositoryInterface $loaiHinhRepository
    ) {
        $this->soLieuCBQLRepository = $soLieuCanBoQuanLyRepository;
        $this->csdtRepository = $csdtRepository;
        $this->loaiHinhRepository = $loaiHinhRepository;
        // $this->nganhNgheRepository = $nganhNgheRepository;
    }

    public function getFilterConfig()
    {
        $filterConfig = config('filters.so_lieu_can_bo_quan_ly');
        $filterConfig['url'] = route('so-lieu-can-bo-quan-ly.index');

        $filterData = $this->soLieuCBQLRepository->getFilterData()->toArray();

        $filterConfig['partials']['co_so_dao_tao_id']['options'] = Arr::pluck($filterData, 'ten_co_so', 'co_so_dao_tao_id');
        $filterConfig['partials']['loai_hinh_id']['options'] = Arr::pluck($filterData, 'loai_hinh', 'loai_hinh_id');

        $nam = Arr::pluck($filterData, 'nam');
        $dot = Arr::pluck($filterData, 'dot');

        $filterConfig['partials']['nam']['options'] = array_combine($nam, $nam);
        $filterConfig['partials']['dot']['options'] = array_combine($dot, $dot);

        return $filterConfig;
    }

    public function getList($params = [], $limit = 10)
    {
        return $this->soLieuCBQLRepository->getList($params, $limit);
    }

    public function getListCoSo()
    {
        return $this->csdtRepository->getAll();
    }

    public function getListLoaiHinh()
    {
        return $this->loaiHinhRepository->getAll();
    }

    public function store($params)
    {
        $data = array_filter($params);
        return $this->soLieuCBQLRepository->store($data);
    }
}
