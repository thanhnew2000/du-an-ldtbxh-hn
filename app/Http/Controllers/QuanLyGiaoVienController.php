<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiaoVienService;
use App\Http\Requests\GiaoVien\StoreRequest;
use App\Http\Requests\GiaoVien\UpdateRequest;
use App\Models\GiaoVien;

class QuanLyGiaoVienController extends Controller
{
    protected $giaoVienService;

    public function __construct(
        GiaoVienService $giaoVienService
    ) {
        $this->giaoVienService = $giaoVienService;
    }

    public function index()
    {

        $filterConfig = $this->giaoVienService->getFilterConfig();
        $limit = request()->get('paginate_size') ?? config('common.paginate_size.default');
        $params = request()->except(['limit']);

        $data = $this->giaoVienService->getList($params, $limit);
        $data->appends(request()->input())->links();

        $titles = config('tables.quan_ly_giao_vien');

        return view('ql_giao_vien.index', [
            'filterConfig' => $filterConfig,
            'data' => $data,
            'limit' => $limit,
            'titles' => $titles,
            'route_edit' => 'ql-giao-vien.edit',
        ]);
    }

    public function create()
    {
        $listCoSo = $this->giaoVienService->getListCoSo();
        $listTrinhDo = $this->giaoVienService->getListTrinhDo();
        $listNganhNghe = $this->giaoVienService->getListNganhNghe();

        return view('ql_giao_vien.create', [
            'listCoSo' => $listCoSo,
            'listTrinhDo' => $listTrinhDo,
            'listNganhNghe' => $listNganhNghe,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $result = $this->giaoVienService->store($data);

        return redirect()->route('ql-giao-vien.index');
    }

    public function edit(GiaoVien $giaoVien)
    {
        $oldInput = session()->getOldInput();

        $chucDanh = $giaoVien->giao_su == 1 ?
            config('common.giao_vien.chuc_danh.giao_su') : ($giaoVien->pho_giao_su ? config('common.giao_vien.chuc_danh.pho_giao_su') :
                config('common.giao_vien.chuc_danh.khong'));

        $giaoVienData = [
            'id_giao_vien' => $giaoVien->id,
            'ten_giao_vien' => $giaoVien->ten,
            'co_so_id' => $giaoVien->co_so_id,
            'gioi_tinh' => $giaoVien->gioi_tinh,
            'mon_chung' => $giaoVien->mon_chung,
            'trinh_do' => $giaoVien->trinh_do_id,
            'nganh_nghe' => $giaoVien->nghe_id,
            'dan_toc_thieu_so' => $giaoVien->dan_toc_it_nguoi,
            'chuc_danh' => $chucDanh,
            'nha_giao_nhan_dan' => $giaoVien->nha_giao_nhan_dan,
            'nha_giao_uu_tu' => $giaoVien->nha_giao_uu_tu,
            'loai_hop_dong' => $giaoVien->loai_hop_dong,
            'trinh_do_ngoai_ngu' => $giaoVien->trinh_do_ngoai_ngu,
            'trinh_do_nghe' => $giaoVien->trinh_do_ky_nang_nghe,
            'nghiep_vu_su_pham' => $giaoVien->trinh_do_nghiep_vu_su_pham,
            'trinh_do_tin_hoc' => $giaoVien->trinh_do_tin_hoc,
        ];

        $data = array_merge($giaoVienData, $oldInput);
        $listCoSo = $this->giaoVienService->getListCoSo();
        $listTrinhDo = $this->giaoVienService->getListTrinhDo();
        $listNganhNghe = $this->giaoVienService->getListNganhNghe();

        return view('ql_giao_vien.update', [
            'listCoSo' => $listCoSo,
            'listTrinhDo' => $listTrinhDo,
            'listNganhNghe' => $listNganhNghe,
            'data' => $data,
        ]);
    }

    public function update(UpdateRequest $request, GiaoVien $giaoVien)
    {
        $data = $request->except('_token');
        $result = $this->giaoVienService->updateGiaoVien($giaoVien->id, $data);

        return redirect()->route('ql-giao-vien.index');
    }
}
