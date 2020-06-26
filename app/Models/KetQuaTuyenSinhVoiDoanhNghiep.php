<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetQuaTuyenSinhVoiDoanhNghiep extends Model
{
    protected $table = 'ket_qua_tuyen_sinh_gan_voi_doanh_nghiep';
    protected $fillable = [
        'nam',
        'dot',
        'nghe_id',
        'co_so_id',

        'tong_so',
        'ket_qua_CD',
        'ket_qua_TC',
        'ket_qua_SC',
        'ket_qua_duoi_3_thang',
        'ten_doanh_nghiep',
        'so_HSSV_duoc_cam_ket',

        'doanh_nghiep_xay_dung_chuong_trinh',
        'doanh_nghiep_tham_gia_giang_day',
        'doanh_nghiep_bo_tro_trang_thiet_bi',
        'doanh_nghiep_ho_tro_kinh_phi_dao_tao',
        'doanh_nghiep_dat_hang_dao_tao',
        'doanh_nghiep_tiep_nhan_HSSV_thuc_tap',
        'khac',
    ];
}
