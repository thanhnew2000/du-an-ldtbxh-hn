<?php

namespace App\Http\Controllers;

use App\Services\NganhNgheService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class NganhNgheController extends Controller
{
    protected $nganhNgheService;
    public function __construct(NganhNgheService $nganhNgheService)
    {
        $this->nganhNgheService = $nganhNgheService;
    }
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
  public function thietlapchitieutuyensinh(){
      return view('career.thiet_lap_chi_tieu_tuyen_sinh');
  }
  public function thietlapnghechocosodaotao(){
      return view('career.thiet_lap_nghe_cho_co_so_dao_tao');
  }
}
