<?php

namespace App\Services;

use App\Services\AppService;
use App\Repositories\GiaoVienRepositoryInterface;
use App\Repositories\CoSoDaoTaoRepositoryInterface;
use App\Repositories\TrinhDoGiaoVienRepositoryInterface;
use App\Repositories\NganhNgheRepositoryInterface;
use Arr;
use DB;

class GiaoVienService extends AppService
{
    protected $giaoVienRepository;
    protected $csdtRepository;
    protected $trinhDoGVRepository;
    protected $nganhNgheRepository;

    public function __construct(
        GiaoVienRepositoryInterface $giaoVienRepository,
        CoSoDaoTaoRepositoryInterface $csdtRepository,
        TrinhDoGiaoVienRepositoryInterface $trinhDoGVRepository,
        NganhNgheRepositoryInterface $nganhNgheRepository
    ) {
        $this->giaoVienRepository = $giaoVienRepository;
        $this->csdtRepository = $csdtRepository;
        $this->trinhDoGVRepository = $trinhDoGVRepository;
        $this->nganhNgheRepository = $nganhNgheRepository;
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
        $result = $this->giaoVienRepository->getList($params, $limit);
        $result->each(function ($value, $key) {
            if (!empty($value->nghe_giang_day)){
                $value->nghe_giang_day = str_replace(',', '<br>', $value->nghe_giang_day);
            }
        });

        return $result;
    }

    public function getListCoSo()
    {
        return $this->csdtRepository->getAll();
    }

    public function getListTrinhDo()
    {
        return $this->trinhDoGVRepository->getAll();
    }

    public function getListNganhNghe(array $listIds = [], array $selects = [])
    {
        $selects[] = DB::raw("CONCAT(ten_nganh_nghe, ' - ', id) AS ten_nganh_nghe");

        return $this->nganhNgheRepository->getListNganhNghe($listIds, $selects);
    }

    public function store(array $params)
    {
        $data = $this->getData($params);

        return $this->giaoVienRepository->create($data);
    }

    public function updateGiaoVien($id, $params)
    {
        $data = $this->getData($params);

        return $this->giaoVienRepository->update($id, $data);
    }

    protected function getData($params)
    {
        $listNganhNghe = $this->getListNganhNghe($params['nganh_nghe'])->toArray();
        $nganhNghe = implode(',', Arr::pluck($listNganhNghe, 'ten_nganh_nghe'));

        $data = [];
        $data['ten'] = $params['ten_giao_vien'];
        $data['gioi_tinh'] = $params['gioi_tinh'];
        $data['mon_chung'] = $params['mon_chung'];
        $data['dan_toc_it_nguoi'] = $params['dan_toc_thieu_so'];
        $data['loai_hop_dong'] = $params['loai_hop_dong'];
        $data['co_so_id'] = $params['co_so_id'];
        $data['nghe_giang_day'] = $nganhNghe;

        if (!empty($params['chuc_danh'])) {
            $data['giao_su'] = $params['chuc_danh'] ==
                config('common.giao_vien.chuc_danh.giao_su') ? 1 : 0;

            $data['pho_giao_su'] = $params['chuc_danh'] ==
                config('common.giao_vien.chuc_danh.pho_giao_su') ? 1 : 0;
        }

        if (isset($params['nha_giao_nhan_dan'])) {
            $data['nha_giao_nhan_dan'] = 1;
        }

        if (isset($params['nha_giao_uu_tu'])) {
            $data['nha_giao_uu_tu'] = 1;
        }

        if (!empty($params['trinh_do_tien_sy'])) {
            $data['trinh_do_tien_sy'] = $params['trinh_do_tien_sy'];
        }

        if (!empty($params['trinh_do_thac_sy'])) {
            $data['trinh_do_thac_sy'] = $params['trinh_do_thac_sy'];
        }

        if (!empty($params['trinh_do_dai_hoc'])) {
            $data['trinh_do_dai_hoc'] = $params['trinh_do_dai_hoc'];
        }

        if (!empty($params['trinh_do_cao_dang'])) {
            $data['trinh_do_cao_dang'] = $params['trinh_do_cao_dang'];
        }

        if (!empty($params['trinh_do_trung_cap'])) {
            $data['trinh_do_trung_cap'] = $params['trinh_do_trung_cap'];
        }

        if (!empty($params['trinh_do_khac'])) {
            $data['trinh_do_khac'] = $params['trinh_do_khac'];
        }

        if (!empty($params['trinh_do_ngoai_ngu'])) {
            $data['trinh_do_ngoai_ngu'] = $params['trinh_do_ngoai_ngu'];
        }

        if (!empty($params['trinh_do_nghe'])) {
            $data['trinh_do_ky_nang_nghe'] = $params['trinh_do_nghe'];
        }

        if (!empty($params['nghiep_vu_su_pham'])) {
            $data['trinh_do_nghiep_vu_su_pham'] = $params['nghiep_vu_su_pham'];
        }

        if (!empty($params['trinh_do_tin_hoc'])) {
            $data['trinh_do_tin_hoc'] = $params['trinh_do_tin_hoc'];
        }

        return $data;
    }
}
