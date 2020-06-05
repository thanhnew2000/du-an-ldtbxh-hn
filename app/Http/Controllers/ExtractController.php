<?php

namespace App\Http\Controllers;

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
    public function add()
    {
        $data = $this ->QlsvService->getQlsv();
        return view('crud.add_quan_ly_sv',compact('data'));
    }
    public function saveAdd(Request $request)
    
    {
        $request->validate(
            ['co_so_id' => 'required',
            'nghe_id' => 'required',
            'so_luong_sv_nu_Cao_dang' => 'min:0|integer',
            'so_luong_sv_nu_Trung_cap' => 'min:0|integer',
            'so_luong_sv_nu_So_cap' => 'min:0|integer',
            'so_luong_sv_nu_khac' => 'min:0|integer',
            'so_luong_sv_dan_toc_Cao_dang' => 'min:0|integer',
            'so_luong_sv_dan_toc_Trung_cap' => 'min:0|integer',
            'so_luong_sv_dan_toc_So_cap' => 'min:0|integer',
            'so_luong_sv_dan_toc_khac' => 'min:0|integer',
            'so_luong_sv_ho_khau_HN_Cao_dang' => 'min:0|integer',
            'so_luong_sv_ho_khau_HN_Trung_cap' => 'min:0|integer',
            'so_luong_sv_ho_khau_HN_So_cap' => 'min:0|integer',
            'so_luong_sv_ho_khau_HN_khac' => 'min:0|integer',
            'so_luong_sv_Cao_dang' => 'min:0|integer',
            'so_luong_sv_Trung_cap' => 'min:0|integer',
            'so_luong_sv_So_cap' => 'min:0|integer',
            'so_luong_sv_he_khac' => 'min:0|integer',
        ], 
        [
            'co_so_id.required' => 'Bạn không được bỏ trống ',
            'nghe_id.required' => 'Bạn không được bỏ trống',
          
            'so_luong_sv_nu_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_nu_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_nu_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_nu_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_nu_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_nu_So_cap.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_nu_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_nu_khac.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_dan_toc_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_dan_toc_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_dan_toc_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_dan_toc_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_dan_toc_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_dan_toc_So_cap.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_dan_toc_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_dan_toc_khac.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_ho_khau_HN_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_ho_khau_HN_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_ho_khau_HN_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_ho_khau_HN_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
            
            'so_luong_sv_ho_khau_HN_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_ho_khau_HN_So_cap.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_ho_khau_HN_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_ho_khau_HN_khac.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
           
            'so_luong_sv_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_So_cap.integer' => 'Vui lòng nhập số nguyên',

            'so_luong_sv_he_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
            'so_luong_sv_he_khac.integer' => 'Vui lòng nhập số nguyên',
        ]
        );
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        $this->QlsvService->create($request);
        // dd($request);
        return redirect('/xuat-bao-cao/so-lieu-sinh-vien-dang-theo-hoc')->withInput();
    }
    public function edit($id)
    {
        $data = $this->QlsvService->suaSoLieuSv($id);
        return view('crud.edit_quan_ly_sv',compact('data'));
    }
    public function saveEdit($id, Request $request)
    {
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        // $data = $request->all();
        $this->QlsvService->update($id, $request);
        return redirect('/xuat-bao-cao/so-lieu-sinh-vien-dang-theo-hoc')->with('mess', 'edit thanh cong');
    }
    public function tonghopsvdanghoc()
    {
        $params = request()->all();
        // dd($params);
        $data = $this->QlsvService->getQlsv($params);
        // $nam = $this->QlsvService->getNamDaoTao();
        $loaiHinhCs = $this->QlsvService->getLoaiHinh();
        $coso = $this->QlsvService->getCoSo();
        return view('extractreport.tong_hop_sinh_vien_dang_theo_hoc',[
            // 'nam' => $nam,
            'data' => $data,
            'loaiHinh' => $loaiHinhCs,
            'coso'=>$coso,
        ]);
    }
    public function tongHopChiTietSvDangTheoHoc($coSoId){
    
        $data = $this->QlsvService->chiTietSoLieuQlsv($coSoId);
        return view('extractreport.lich_su_sinh_vien_dang_theo_hoc',['data' =>$data]);
    }
    
    public function tonghopchinhsachsv()
    {
        return view('extractreport.tong_hop_thuc_hien_chinh_sach_cho_sinh_vien');
    }
    public function tonghopkqtuyensinh()
    {
        return view('extractreport.tong_hop_ket_qua_tuyen_sinh');
    }

    public function tonghopxdchuongtrinh()
    {
        return view('extractreport.tong_hop_xay_dung_chuong_trinh_giao_trinh');
    }
    public function tonghopkqtotnghiep()
    {
        return view('extractreport.tong_hop_ket_qua_tot_nghiep');
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