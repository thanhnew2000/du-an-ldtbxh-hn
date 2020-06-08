<?php

namespace App\Http\Controllers;

use App\CoSoDaoTao;
use App\Repositories;
use App\Services\CoSoDaoTaoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class CoSoDaoTaoController extends Controller
{
    protected $CoSoDaoTaoService;
    public function __construct(CoSoDaoTaoService $CoSoDaoTaoService)
    {
        $this->CoSoDaoTaoService = $CoSoDaoTaoService;
    }

    public function danhsachCSDT(Request $request)
    {
        $params = $request->all();
        if (!isset($params['ten_co_so'])) $params['ten_co_so'] = null;
        if (!isset($params['ma_don_vi'])) $params['ma_don_vi'] = null;
        if (!isset($params['loai_hinh_co_so'])) $params['loai_hinh_co_so'] = null;
        if (!isset($params['quanhuyen'])) $params['quanhuyen'] = null;
        $data = $this->CoSoDaoTaoService->getCsdt($params);
        $loaihinh = DB::table('loai_hinh_co_so')->get();
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        return view('coso.danh_sach_co_so_dao_tao', compact('data', 'loaihinh', 'quanhuyen', 'params'));
    }

    public function chitietCSDT($id)
    {
        $data = $this->CoSoDaoTaoService->getSingleCsdt($id);
        return view('coso.chi_tiet_co_so', ['data' => $data]);
    }

    public function themCSDT()
    {
        $qd = DB::table('quyet_dinh_thanh_lap_csdt')->get();
        $coquan = DB::table('co_quan_chu_quan')->get();
        $loaihinh = DB::table('loai_hinh_co_so')->get();
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        $xaphuong = DB::table('devvn_xaphuongthitran')->get();
        return view('coso.them_co_so', [
            'qd' => $qd,
            'coquan' => $coquan,
            'loaihinh' => $loaihinh,
            'quanhuyen' => $quanhuyen,
            'xaphuong' => $xaphuong
        ]);
    }

    public function taomoiCSDT(Request $request)
    {

        $request->validate(
            [
                'ten' => 'required',
                'ma_don_vi' => 'required|unique:co_so_dao_tao',
                'upload_logo' => 'required|mimes:jpeg,png',
                'dien_thoai' => 'required',
                'dia_chi' => 'required',
                'ten_quoc_te' => 'required',
                'co_quan_chu_quan_id' => 'required',
                'ma_loai_hinh_co_so' => 'required',
                'quyet_dinh_id' => 'required'
            ],
            [
                'ten.required' => 'Tên cơ sở đào tạo không được để trống',
                'ma_don_vi.required' => 'Mã đơn vị không được để trống',
                'dien_thoai.required' => 'Điện thoại không được để trống',
                'dia_chi.required' => 'địa chỉ không được để trống',
                'ten_quoc_te.required' => 'Vui lòng điền tên quốc tế của cơ sở',
                'co_quan_chu_quan_id.required' => 'Vui lòng chọn cơ quan chủ quản',
                'ma_loai_hinh_co_so.required' => 'Vui lòng chọn loại hình cơ sở',
                'quyet_dinh_id.required' => 'Vui lòng chọn quyết định của cơ sở'
            ]
        );


        if ($request->hasFile('upload_logo')) {
            $filePath = $request->file('upload_logo')->store('uploads/logoCsdt');
            $request->request->set('logo', $filePath);
        }
        $this->CoSoDaoTaoService->create($request, ['upload_logo']);
        return redirect()->route('csdt.danh-sach')->withInput()->with('mess', 'Thêm cơ sở thành công');
    }

    public function suaCSDT($id)
    {
        $data = $this->CoSoDaoTaoService->getSingleCsdt($id);
        $parent = DB::table('co_quan_chu_quan')->get();
        $loai_coso = DB::table('loai_hinh_co_so')->get();
        $qd = DB::table('quyet_dinh_thanh_lap_csdt')->get();
        $quanhuyen = DB::table('devvn_quanhuyen')->get();
        $xaphuong = DB::table('devvn_xaphuongthitran')->where('');

        return view('coso.sua_co_so', compact('data', 'parent', 'loai_coso', 'qd', 'quanhuyen', 'xaphuong'));
    }

    public function capnhatCSDT($id, Request $request)
    {
        $request->validate(
            [
                'ten' => 'required',
                'ma_don_vi' => 'required',
                'upload_logo' => 'mimes:jpeg,png',
                'dien_thoai' => 'required',
                'dia_chi' => 'required',
                'ten_quoc_te' => 'required',
                'co_quan_chu_quan_id' => 'required',
                'ma_loai_hinh_co_so' => 'required',
                'quyet_dinh_id' => 'required'
            ],
            [
                'ten.required' => 'Tên trường không được để trống',
                'ma_don_vi. required' => 'Mã đơn vị không được để trống',
                'upload_logo.mimes' => 'File ảnh không đúng định dạng',
                'dia_chi.required' => 'Địa chỉ không được để trống',
                'ten_quoc_te.required' => 'Tên quốc tế không được để trống',
            ]
        );

        if ($request->hasFile('upload_logo')) {
            $filePath = $request->file('upload_logo')->store('uploads/logoCsdt');
            $request->request->set('logo', $filePath);
        }
        $this->CoSoDaoTaoService->update($id, $request, ['upload_logo', '_token']);

        return redirect()->route('csdt.cap-nhat', ['id' => $id])->with('mess', 'Đã cập nhật thông tin cơ sở đào tạo')->withInput();
    }
}
