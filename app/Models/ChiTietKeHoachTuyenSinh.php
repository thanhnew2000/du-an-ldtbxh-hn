<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietKeHoachTuyenSinh extends Model
{
    protected $table = 'chi_tiet_ke_hoach_tuyen_sinh';
    protected $fillable = [
        'nam',
        'so_luong_sv_Cao_dang',
        'so_luong_sv_nu_Cao_dang',
        'so_luong_sv_dan_toc_Cao_dang',
        'so_luong_sv_ho_khau_HN_Cao_dang',
        'so_tuyen_moi_Cao_dang',
        'so_lien_thong_Cao_dang',
        'so_luong_sv_Trung_cap',
        'so_luong_sv_nu_Trung_cap',
        'so_luong_sv_dan_toc_Trung_cap',
        'so_luong_sv_ho_khau_HN_Trung_cap',
        'so_Tot_nghiep_THCS',
        'so_Tot_nghiep_THPT',
        'so_luong_sv_So_cap',
        'so_luong_sv_nu_So_cap',
        'so_luong_sv_dan_toc_So_cap',
        'so_luong_sv_ho_khau_HN_So_cap',
        'so_luong_sv_he_khac',
        'so_luong_sv_nu_khac',
        'so_luong_sv_dan_toc_khac',
        'so_luong_sv_ho_khau_HN_khac',
        'nghe',
        'tong_so_tuyen_sinh',
        'ke_hoach_tuyen_sinh_cao_dang',
        'ke_hoach_tuyen_sinh_trung_cap',
        'ke_hoach_tuyen_sinh_so_cap',
        'ke_hoach_tuyen_sinh_khac',
        'thoi_gian_cap_nhat',
        'trang_thai',
        'tong_so_tuyen_sinh_cac_trinh_do',
        'tong_so_nu',
        'tong_so_dan_toc',
        'tong_ho_khau_HN',
        'ho_khau_HN_THCS_Trung_cap',
    ];
}
