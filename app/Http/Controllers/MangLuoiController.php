<?php

namespace App\Http\Controllers;

use App\Services\ChiNhanhService;
use App\Services\CoSoDaoTaoService;
use App\Services\QuyetDinhService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function SaveTaoMoiCoSoDaoTao(Request $request){
        // dd($request->all());
        // $request->validate(
        //     [
        //         'ten' => 'required|unique:co_so_dao_tao',
        //         'ma_don_vi' => 'required|unique:co_so_dao_tao',
        //         'upload_logo' => 'required|mimes:jpeg,png',
        //         'dien_thoai' => 'required|numeric |digits_between:10,12',
        //         'website' => 'required|url',
        //         'dia_chi' => 'required|unique:co_so_dao_tao',
        //         // 'ten_quoc_te' => 'required',
        //         'co_quan_chu_quan_id' => 'required',
        //         'ma_loai_hinh_co_so' => 'required',
        //         'quyet_dinh_id' => 'required',
        //         'maqh' => 'required',
        //         'xaid' => 'required'
        //     ],
        //     [
        //         'ten.required' => 'Tên cơ sở đào tạo không được để trống',
        //         'ten.required' => 'Tên cơ sở đào tạo đã tồn tại',
        //         'ma_don_vi.required' => 'Mã đơn vị không được để trống',
        //         'upload_logo.required' => 'Logo không được để trống',
        //         'upload_logo.mimes' => 'Logo không đúng định dạng file ảnh',
        //         'dien_thoai.required' => 'Điện thoại không được để trống',
        //         'dien_thoai.digits_between' => 'Số điện thoại sai định dạng',
        //         'dien_thoai.numeric ' => 'Số điện thoại sai định dạng',
        //         'website.url' => 'Website không đúng định dạng',
        //         'website.required' => 'Website không được để trống',
        //         'dia_chi.required' => 'địa chỉ không được để trống',
        //         'dia_chi.mimes' => 'Địa chỉ đã tồn tại trong hệ thống',
        //         // 'ten_quoc_te.required' => 'Vui lòng điền tên quốc tế của cơ sở',
        //         'co_quan_chu_quan_id.required' => 'Vui lòng chọn cơ quan chủ quản',
        //         'ma_loai_hinh_co_so.required' => 'Vui lòng chọn loại hình cơ sở',
        //         'quyet_dinh_id.required' => 'Vui lòng chọn quyết định của cơ sở',
        //         'maqh.required' => 'Vui lòng chọn Quận/huyện',
        //         'xaid.required' => 'Vui lòng chọn Xã/phường'
        //     ]
        // );

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
