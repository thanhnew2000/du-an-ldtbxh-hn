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
        dd($request->all());
        $request->validate(
            [
                'ten' => 'required|unique:co_so_dao_tao',
                'ma_don_vi' => 'required|unique:co_so_dao_tao',
                'ten_nguoi_dai_dien' => 'required',
                'hinh_thuc_so_huu' => 'required',
                'trinh_do_dao_tao' => 'required',
                'hotline' => 'required|numeric |digits_between:10,12',
                'so_quyet_dinh', 'required|uniqie:quyet_dinh_thanh_lap_csdt',
                'anh_quyet_dinh' => 'required|mimes:jpeg,png',
                
                'ngay_ban_hanh' => 'required|date_format:d-m-Y',
                'ngay_hieu_luc' => 'required|date_format:d-m-Y|after_or_equal:ngay_ban_hanh',
                'ngay_het_han' => 'after:ngay_hieu_luc',

                'hotline' => 'required|numeric |digits_between:10,12',
            ],
            [
                'ten.required' => 'Tên cơ sở đào tạo không được để trống',
                'ten.unique' => 'Tên cơ sở đào tạo đã tồn tại',

                'ma_don_vi.required' => 'Mã đơn vị không được để trống',
                'ma_don_vi.unique' => 'Mã đơn vị này đã tồn tại',

                'hotline.required' => 'Điện thoại không được để trống',
                'hotline.digits_between' => 'Số điện thoại sai định dạng',
                'hotline.numeric ' => 'Số điện thoại sai định dạng',
                
                'ten_nguoi_dai_dien.required' => 'Vui Lòng nhập tên người đại diện',
                'hinh_thuc_so_huu.required' => 'Vui lòng chọn hình thức sở hữu của cơ sở',
                'trinh_do_dao_tao.required' => 'Vui lòng chọn trình độ đào tạo của cơ sở',

                'so_quyet_dinh.required' => 'Vui lòng nhập số quyết định',
                'so_quyet_dinh.uniqie' => 'Quyết đinh này đã tồn tại',
                
                'anh_quyet_dinh.required' => 'Vui lòng tải lên ảnh quyết định',
                'anh_quyet_dinh.mimes' => 'File không đúng định dạng ảnh',

                'ngay_ban_hanh.date_format' => 'Ngày không đúng định dạng',
                'ngay_ban_hanh.required' => 'Vui lòng chọn ngày ban hành',

                'ngay_hieu_luc.date_format' => 'Ngày không đúng định dạng',
                'ngay_hieu_luc.required' => 'Vui lòng chọn ngày ban hành',
                'ngay_hieu_luc.after_or_equal' => 'Ngày hiệu lực phải sau hoặc bằng ngày ban hành',

                'ngay_het_han.after' => 'Ngày hết hạn phải sau ngày ban hành',
            ]
        );

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
