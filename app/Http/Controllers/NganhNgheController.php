<?php

namespace App\Http\Controllers;

use App\Services\ChungNhanDangKyService;
use App\Services\CoSoDaoTaoService;
use App\Services\LoaiHinhCoSoService;
use App\Services\NganhNgheService;
use App\Services\PhuongXaService;
use App\Services\QuanHuyenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class NganhNgheController extends Controller
{
    protected $nganhNgheService;
    protected $chungNhanDangKyService;
    protected $phuongXaService;
    protected $quanHuyenService;
    protected $loaiHinhCoSoService;
    protected $coSoDaoTaoService;
    public function __construct(
        NganhNgheService $nganhNgheService,
        ChungNhanDangKyService $chungNhanDangKyService,
        PhuongXaService $phuongXaService,
        LoaiHinhCoSoService $loaiHinhCoSoService,
        CoSoDaoTaoService $coSoDaoTaoService,
        QuanHuyenService $quanHuyenService
    ) {
        $this->nganhNgheService = $nganhNgheService;
        $this->chungNhanDangKyService = $chungNhanDangKyService;
        $this->phuongXaService = $phuongXaService;
        $this->quanHuyenService = $quanHuyenService;
        $this->loaiHinhCoSoService = $loaiHinhCoSoService;
        $this->coSoDaoTaoService = $coSoDaoTaoService;
    }

    /* Danh sách ngành nghề
     * @date 2020-06-03
     * @author: thienth
     * @params: $request
     * */
    public function danhsachnganhnghe(Request $request)
    {

        $params = $request->all();
        if (!isset($params['bac_nghe'])) $params['bac_nghe'] = 6;
        if (!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');

        $data = $this->nganhNgheService->getNganhNghe($params);
        $data->appends(request()->input())->links();

        $route_name = Route::current()->action['as'];
        dd($data);
        return view('nganh-nghe.danh-sach-nghe', compact('data', 'params', 'route_name'));
    }

    /* Danh sách chi tiết các cơ sở đào tạo được phép giảng dạy các nghề
     * @date 2020-06-03
     * @author: thienth
     * @params: $request
     * @params: $manghe - mã nghề cần xem
     * */
    public function chitietnghe($manghe, Request $request)
    {
        $params = $request->all();
        if (!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $params['ma_nghe'] = $manghe;
        dd($params);
        $data = $this->chungNhanDangKyService->getCoSoDaoTaoTheoNghe($params);
        // $data->appends(request()->input())->links();
        // $dsQuanHuyen = $this->quanHuyenService->getAll();
        // $dsLoaiHinhCoSo = $this->loaiHinhCoSoService->getAll();
        // compact('data', 'dsQuanHuyen', 'dsLoaiHinhCoSo', 'params', 'route_name')
        $route_name = Route::current()->action['as'];
        return view('nganh-nghe.chi-tiet-nghe', compact('params', 'route_name', 'data'));
    }

    public function thietlapchitieutuyensinh()
    {
        return view('career.thiet_lap_chi_tieu_tuyen_sinh');
    }

    public function thietlapnghechocosodaotao($csdtid = null, Request $request)
    {
        $dataCoSoDaoTao = $this->coSoDaoTaoService->getSingleCsdt($csdtid);
        $defaultCsdt = count($dataCoSoDaoTao) > 0
            ?   [
                'id' => $dataCoSoDaoTao[0]->id,
                'text' => $dataCoSoDaoTao[0]->ma_don_vi . ' - ' . $dataCoSoDaoTao[0]->ten
            ]
            : [];


        $dsNghe = [];
        $params = $request->all();
        if (!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');

        if (!empty($csdtid)) {
            $params['co_so_id'] = $csdtid;
            $dsNghe = $this->chungNhanDangKyService->getNgheTheoCoSoDaoTao($params);
            $dsNghe->appends(request()->input())->links();
        }

        $route_name = Route::current()->action['as'];

        $allNgheTC = $this->nganhNgheService->getAllNganhNghe(5, $csdtid);

        $allNgheCD = $this->nganhNgheService->getAllNganhNghe(6, $csdtid);

        return view(
            'nganh-nghe.chon-co-so-dao-tao',
            compact('defaultCsdt', 'route_name', 'dsNghe', 'params', 'allNgheCD', 'allNgheTC')
        );
    }



    public function apiCheckNgheCap4(Request $request)
    {
        $params['keyword'] = $request->keyword;
        $params['page'] = $request->page;
        $data = $this->nganhNgheService->apiTimKiemNgheTheoKeyword($params);
        return response()->json($data);
    }

    public function boSungNganhNgheVaoCoSo(Request $request)
    {
        if ($request->hasFile('anh-giay-phep')) {
            $filePath = $request->file('anh-giay-phep')->store('uploads/anh-quyet-dinh');
            $request->request->set('anh_quyet_dinh', $filePath);
        }

        $this->nganhNgheService->boSungNganhNgheVaoCoSo($request, ['_token', 'anh-giay-phep']);
        return redirect()->route('csdt.thiet-lap-nghe-cs', ['csdtid' => $request->get('co_so_id')])->with('mess', 'Thêm nghề vào cơ sở thành công');
    }

    public function capNhatNganhNghe($id)
    {
        $data = $this->nganhNgheService->findById($id);
        return view('nganh-nghe.cap-nhat-nganh-nghe', compact('data'));
    }

    public function search(Request $request)
    {
        $params['keyword'] = $request->get('keyword');
        $params['page'] = $request->get('page');
        $data = $this->nganhNgheService->search($params);

        return response()->json($data);
    }
}
