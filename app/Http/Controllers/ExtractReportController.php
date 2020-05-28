<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtractReportController extends Controller
{
    public function danhsachnhagiao(){
        return view('extractreport.danh_sach_doi_ngu_nha_giao');
    }
    public function danhsachquanly(){
        return view('extractreport.danh_sach_doi_ngu_quan_ly');
    }
    public function tonghopsvdanghoc(){
        return view('extractreport.tong_hop_sinh_vien_dang_theo_hoc');
    }
    public function tonghopchinhsachsv(){
        return view('extractreport.tong_hop_thuc_hien_chinh_sach_cho_sinh_vien');
    }
    public function tonghopkqtuyensinh(){
        return view('extractreport.tong_hop_ket_qua_tuyen_sinh');
    }

    public function tonghopxdchuongtrinh(){
        return view('extractreport.tong_hop_xay_dung_chuong_trinh_giao_trinh');
    }
    public function tonghopkqtotnghiep(){
        return view('extractreport.tong_hop_ket_qua_tot_nghiep');
    }
    public function tonghopdaotaonguoikhuyettat(){
        return view('extractreport.tong_hop_dao_tao_nghe_cho_nguoi_khuyet_tat');
    }
    public function tonghopdaotaothanhnien(){
        return view('extractreport.tong_hop_dao_tao_nghe_cho_thanh_nien');
    }
    public function tonghopdaotaovoidoanhnghiep(){
        return view('extractreport.tong_hop_dao_tao_nghe_gan_voi_doanh_nghiep');
    }
    public function tonghophoptacquocte(){
        return view('extractreport.tong_hop_hop_tac_quoc_te');
    }
    public function tonghoptuyensinh(){
        return view('extractreport.tong_hop_dang_ky_chi_tieu_tuyen_sinh');
    }
}
