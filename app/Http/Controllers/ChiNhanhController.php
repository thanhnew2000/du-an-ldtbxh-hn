<?php

namespace App\Http\Controllers;

use App\Services\ChiNhanhService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiNhanhController extends Controller
{
    protected $ChiNhanhService;
    public function __construct(ChiNhanhService $ChiNhanhService)
    {
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
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        return view('coso.chi_nhanh.danh_sach_chi_nhanh', compact('data', 'quanhuyen', 'params'));
    }

    public function themchinhanh()
    {
        $csdt = DB::table('co_so_dao_tao')->get();
        return view('coso.chi_nhanh.them_chi_nhanh', ['csdt' => $csdt]);
    }

    public function savethemchinhanh(Request $request)
    {
        $request->validate(
            [
                'dia_chi' => 'required',
                'chi_nhanh_chinh' => 'required',
                'ma_chung_nhan_dang_ki_hoat_dong' => 'required|unique:chi_nhanh_dao_tao',
                'da_duoc_cap' => 'required',
                'trang_thai' => 'required',
                'co_so_id' => 'required',
                'hotline' => 'required|unique:chi_nhanh_dao_tao'
            ],
            [
                'dia_chi.required' => 'Địa chỉ không được để trống',
                'chi_nhanh_chinh.required' => 'Vui lòng chọn loại chi nhánh',
                'ma_chung_nhan_dang_ki_hoat_dong.required' => 'Mã chứng nhận hoạt động không được để trống',
                'ma_chung_nhan_dang_ki_hoat_dong.unique' => 'Mã chứng nhận hoạt động đã tồn tại',
                'da_duoc_cap.required' => 'Vui lòng chọn tráng thái cấp giấy phép',
                'co_so_id.required' => 'Vui lòng chọn cơ sở cho chi nhánh',
                'hotline.required' => 'Hotline không được để trống'
            ]
        );
        $this->ChiNhanhService->create($request, ['_token']);
        return redirect()->route('csdt.chi-nhanh')->withInput();
    }

    public function suachinhanh($id)
    {
        $data = $this->ChiNhanhService->getSingleChiNhanh($id);
        $csdt = DB::table('co_so_dao_tao')->get();
        return view('coso.chi_nhanh.sua_chi_nhanh', ['data' => $data, 'csdt' => $csdt]);
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
            ],
            [
                'dia_chi.required' => 'Vui lòng nhập địa chỉ chi nhánh',
                'chi_nhanh_chinh' => 'Vui lòng chọn loại chi nhánh',
                'hotline.required' => 'Vui lòng nhập hotline chi nhánh',
                'co_so_id.required' => 'Vui lòng chọn cơ sở đào tạo',
                'ma_chung_nhan_dang_ki_hoat_dong.required' => 'Vui lòng nhập mã chứng nhận hoạt động',
                'da_duoc_cap.required' => 'Vui lòng chọn trạng thái cấp giấy phép'
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
