<?php

namespace App\Http\Controllers;

use App\Services\ChungNhanDangKyService;
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
    public function __construct(NganhNgheService $nganhNgheService,
                                ChungNhanDangKyService $chungNhanDangKyService,
                                PhuongXaService $phuongXaService,
                                LoaiHinhCoSoService $loaiHinhCoSoService,
                                QuanHuyenService $quanHuyenService)
    {
        $this->nganhNgheService = $nganhNgheService;
        $this->chungNhanDangKyService = $chungNhanDangKyService;
        $this->phuongXaService = $phuongXaService;
        $this->quanHuyenService = $quanHuyenService;
        $this->loaiHinhCoSoService = $loaiHinhCoSoService;
    }

    /* Danh sách ngành nghề
     * @date 2020-06-03
     * @author: thienth
     * @params: $request
     * */
    public function danhsachnganhnghe(Request $request){

        $params = $request->all();
        if(!isset($params['bac_nghe'])) $params['bac_nghe'] = 6;
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');

        $data = $this->nganhNgheService->getNganhNghe($params);
        $data->appends(request()->input())->links();

        $route_name = Route::current();
        dd($route_name);
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
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $params['ma_nghe'] = $manghe;

        $data = $this->chungNhanDangKyService->getCoSoDaoTaoTheoNghe($params);
        $data->appends(request()->input())->links();
        $dsQuanHuyen = $this->quanHuyenService->getAll();
        $dsLoaiHinhCoSo = $this->loaiHinhCoSoService->getAll();

        $route_name = Route::current()->action['as'];
        return view('nganh-nghe.chi-tiet-nghe', compact('data','dsQuanHuyen', 'dsLoaiHinhCoSo', 'params', 'route_name'));
    }

    public function thietlapchitieutuyensinh(){
      return view('career.thiet_lap_chi_tieu_tuyen_sinh');
    }
    public function thietlapnghechocosodaotao(){
      return view('career.thiet_lap_nghe_cho_co_so_dao_tao');
    }
}
