<?php

namespace App\Http\Controllers;

use App\Qlsv;
use Illuminate\Http\Request;
use App\Repositories;
use App\Services\QlsvService;
use Carbon\Carbon;

class ExtractController extends Controller
{
    protected $QlsvService;
    public function __construct(QlsvService $QlsvService)
    {
        $this->QlsvService = $QlsvService;
    }

    public function danhsachnhagiao()
    {
        return view('extractreport.danh_sach_doi_ngu_nha_giao');
    }
    public function danhsachquanly()
    {
        return view('extractreport.danh_sach_doi_ngu_quan_ly');
    }
    public function add(Qlsv $qlsv)
    {
        return view('crud.add_quan_ly_sv', [
            'qlsv' => $qlsv
        ]);
    }
    public function saveAdd(Request $request)
    {
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        $this->QlsvService->create($request);
        // dd($request);
        return redirect('/extractreport/tong-hop-sinh-vien-dang-theo-hoc')->with('status', 'Tạo thành công');
    }
    public function edit(Qlsv $qlsv)
    {
        return view('crud.edit_quan_ly_sv', [
            'qlsv' => $qlsv
        ]);
    }
    public function saveEdit($id, Request $request)
    {
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        // $data = $request->all();
        $this->QlsvService->update($id, $request);

        return redirect('/extractreport/tong-hop-sinh-vien-dang-theo-hoc')->with('mess', 'edit thanh cong');
    }
    public function tonghopsvdanghoc()
    {
        $data = $this->QlsvService->getQlsv();
        return view('extractreport.tong_hop_sinh_vien_dang_theo_hoc', compact('data'));
    }
    public function tonghopchinhsachsv()
    {
        return view('extractreport.tong_hop_thuc_hien_chinh_sach_cho_sinh_vien');
    }
    public function tonghopkqtuyensinh()
    {
        return view('extractreport.tong_hop_ket_qua_tuyen_sinh');
    }
    public function chiteittonghopkqtuyensinh()
    {
        return view('extractreport.chi_tiet_tong_hop_ket_qua_tuyen_sinh');
    }

    public function tonghopxdchuongtrinh()
    {
        return view('extractreport.tong_hop_xay_dung_chuong_trinh_giao_trinh');
    }
    public function tonghopkqtotnghiep()
    {
        return view('tot_nghiep.tong_hop_ket_qua_tot_nghiep');
    }
    public function chitiettonghopkqtotnghiep()
    {
        return view('tot_nghiep.chi_tiet_tong_hop_ket_qua_tot_nghiep');
    }
    public function suatonghopkqtotnghiep()
    {
        return view('tot_nghiep.sua_tong_hop_ket_qua_tot_nghiep');
    }
    public function themtonghopkqtotnghiep()
    {
        return view('tot_nghiep.them_tong_hop_ket_qua_tot_nghiep');
    }
    public function tonghopdaotaonguoikhuyettat()
    {
        return view('extractreport.tong_hop_dao_tao_nghe_cho_nguoi_khuyet_tat');
    }
    public function tonghopdaotaothanhnien()
    {
        return view('extractreport.tong_hop_dao_tao_nghe_cho_thanh_nien');
    }
    public function tonghopdaotaovoidoanhnghiep()
    {
        return view('extractreport.tong_hop_dao_tao_nghe_gan_voi_doanh_nghiep');
    }
    public function tonghophoptacquocte()
    {
        return view('extractreport.tong_hop_hop_tac_quoc_te');
    }
    public function tonghoptuyensinh()
    {
        return view('extractreport.tong_hop_dang_ky_chi_tieu_tuyen_sinh');
    }
}