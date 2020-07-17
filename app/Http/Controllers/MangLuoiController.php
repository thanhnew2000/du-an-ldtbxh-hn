<?php

namespace App\Http\Controllers;

use App\Services\ChiNhanhService;
use App\Services\CoSoDaoTaoService;
use App\Services\QuyetDinhService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CoSoDaoTao\SaveCoSoRequest;


class MangLuoiController extends Controller
{
    protected $CoSoDaoTaoService;
    protected $QuyetDinhService;
    protected $ChiNhanhService;
    public function __construct(
        CoSoDaoTaoService $CoSoDaoTaoService,
        QuyetDinhService $QuyetDinhService,
        ChiNhanhService $ChiNhanhService
    ) {
        $this->CoSoDaoTaoService = $CoSoDaoTaoService;
        $this->QuyetDinhService = $QuyetDinhService;
        $this->ChiNhanhService = $ChiNhanhService;
    }
    public function index(){
        return view('mang-luoi.index');
    }

    public function ViewTaoMoiCoSoDaoTao(){
        $qd = DB::table('quyet_dinh_thanh_lap_csdt')->get();
        $coquan = DB::table('co_quan_chu_quan')->get();
        $loaihinh = DB::table('loai_hinh_co_so')->get();
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        $xaphuong = DB::table('devvn_xaphuongthitran')->get();
        $user = DB::table('users')->get();
        return view('co-so-dao-tao.them_co_so', compact('qd', 'coquan', 'loaihinh', 'quanhuyen', 'xaphuong', 'user'));
    }
    public function SaveTaoMoiCoSoDaoTao(SaveCoSoRequest $request){
        if ($request->hasFile('anh_quyet_dinh')) {
            $filePath = $request->file('anh_quyet_dinh')->store('uploads/anh-quyet-dinh');
            $request->request->set('anhQuyetDinh', $filePath);
        }
        $quyetDInh = $this->QuyetDinhService->createQuyetDinh($request);
        if (isset($quyetDInh->id)) {
            $request->request->set('quyet_dinh_id', $quyetDInh->id);
        }
        $CoSo =  $this->CoSoDaoTaoService->createCoSo($request);

        if (isset($CoSo->id)) {
            $request->request->set('co_so_id', $CoSo->id);
        }
        $ChiNhanh = $this->ChiNhanhService->createChiNhanh($request);
        return response()->json([
            'QuyetDinh' => $quyetDInh,
            'CoSo' => $CoSo,
            'ChiNhanh' => $ChiNhanh,
            'message' => 'Thêm thành công'
        ]);
    }
}
