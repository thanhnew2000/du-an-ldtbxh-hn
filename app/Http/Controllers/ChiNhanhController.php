<?php

namespace App\Http\Controllers;

use App\Services\ChiNhanhService;
use App\Services\CoSoDaoTaoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiNhanhController extends Controller
{
    protected $ChiNhanhService;
    protected $coSoDaoTaoService;
    public function __construct(ChiNhanhService $ChiNhanhService,
    CoSoDaoTaoService $coSoDaoTaoService
    )
    {
        $this->coSoDaoTaoService = $coSoDaoTaoService;
        $this->ChiNhanhService = $ChiNhanhService;
    }

    public function danhsachchinhanh(Request $request, $id = null)
    {
        $params = $request->all();
        if (!isset($params['ten_co_so'])) $params['ten_co_so'] = null;
        if (!isset($params['ma_chung_nhan'])) $params['ma_chung_nhan'] = null;
        if (!isset($params['loai_chi_nhanh'])) $params['ma_don_vi'] = null;
        if (isset($id)) {
            $data = $this->ChiNhanhService->getChiNhanhThuocCSDT($id);
        } else {
            $data = $this->ChiNhanhService->getChiNhanh($params);
        }
        $chiNhanhDefault = $this->coSoDaoTaoService->findById($id);
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        return view('co-so-dao-tao.chi_nhanh.danh_sach_chi_nhanh', compact('data', 'quanhuyen', 'params', 'chiNhanhDefault'));
    }

    public function themchinhanh(Request $request)
    {
        $params = [];
        if(isset($request->co_so_id)){
            $params['co_so_id'] = $request->co_so_id;
        }
        $csdt = DB::table('co_so_dao_tao')->get();
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        $xaphuong = DB::table('devvn_xaphuongthitran')->get();
        return view('co-so-dao-tao.chi_nhanh.them_chi_nhanh', compact('csdt', 'quanhuyen', 'xaphuong', 'params'));
    }

    public function savethemchinhanh(Request $request)
    {
        $request->validate(
            [
                'dia_chi' => 'required',
                'chi_nhanh_chinh' => 'required',
                'ma_chung_nhan_dang_ki_hoat_dong' => 'required|unique:chi_nhanh_dao_tao',
                'da_duoc_cap' => 'required',
                'co_so_id' => 'required',
                'hotline' => 'required|unique:chi_nhanh_dao_tao',
                'maqh' => 'required',
                'xaid' => 'required'
            ],
            [
                'dia_chi.required' => 'Địa chỉ không được để trống',
                'chi_nhanh_chinh.required' => 'Vui lòng chọn loại chi nhánh',
                'ma_chung_nhan_dang_ki_hoat_dong.required' => 'Mã chứng nhận hoạt động không được để trống',
                'ma_chung_nhan_dang_ki_hoat_dong.unique' => 'Mã chứng nhận hoạt động đã tồn tại',
                'da_duoc_cap.required' => 'Vui lòng chọn tráng thái cấp giấy phép',
                'co_so_id.required' => 'Vui lòng chọn cơ sở cho chi nhánh',
                'hotline.required' => 'Hotline không được để trống',
                'maqh.required' => 'Vui lòng chọn quận/huyện',
                'xaid.required' => 'Vui lòng chọn xã/phường'
            ]
        );

        $this->ChiNhanhService->create($request, ['_token']);

        if(isset($request->csdt_id)){
            return redirect()->route('csdt.chi-nhanh', ['id' => $request->csdt_id])->withInput()->with('mess-success', 'Đã thêm thành công');
        } else{
            return redirect()->route('csdt.chi-nhanh')->withInput()->with('mess-success', 'Đã thêm thành công');
        }
    }

    public function suachinhanh($id)
    {
        $data = $this->ChiNhanhService->getSingleChiNhanh($id);
        $csdt = DB::table('co_so_dao_tao')->get();
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        $xaphuong = DB::table('devvn_xaphuongthitran')->where('');
        return view('co-so-dao-tao.chi_nhanh.sua_chi_nhanh', compact('data', 'csdt', 'quanhuyen', 'xaphuong'));
    }

    public function capnhatchinhanh($id, Request $request)
    {

        $request->validate(
            [
                'dia_chi' => 'required',
                'chi_nhanh_chinh' => 'required',
                'hotline' => 'required',
                'co_so_id' => 'required',
                'ma_chung_nhan_dang_ki_hoat_dong' => 'required',
                'da_duoc_cap' => 'required',
                'maqh' => 'required',
                'xaid' => 'required'
            ],
            [
                'dia_chi.required' => 'Vui lòng nhập địa chỉ chi nhánh',
                'chi_nhanh_chinh' => 'Vui lòng chọn loại chi nhánh',
                'hotline.required' => 'Vui lòng nhập hotline chi nhánh',
                'co_so_id.required' => 'Vui lòng chọn cơ sở đào tạo',
                'ma_chung_nhan_dang_ki_hoat_dong.required' => 'Vui lòng nhập mã chứng nhận hoạt động',
                'da_duoc_cap.required' => 'Vui lòng chọn trạng thái cấp giấy phép',
                'maqh.required' => 'Vui lòng chọn quận/huyện',
                'xaid.required' => 'Vui lòng chọn xã/phường'
            ]
        );
        $this->ChiNhanhService->update($id, $request, ['_token']);
        return redirect()->route('chi-nhanh.cap-nhat', ['id' => $id])->withInput()->with('mess', 'Đã cập nhật địa điểm đào tạo');
    }

    public function xoachinhanh($id)
    {
        $this->ChiNhanhService->delete($id);
        return redirect()->route('csdt.chi-nhanh')->with('mess', 'Đã xóa chi nhánh');
    }
}
