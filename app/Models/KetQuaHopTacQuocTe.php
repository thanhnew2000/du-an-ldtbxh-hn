<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetQuaHopTacQuocTe extends Model
{
    protected $table = 'ket_qua_hop_tac_quoc_te';
    protected $fillable = [
            'nam',
            'dot',
            'co_so_id',
            'tong_tuyen_sinh',
            'tong_tuyen_sinh_CD',
            'tong_tuyen_sinh_TC',
            'tong_tuyen_sinh_SC',
            'tong_so_hs_duoc_cap_bang',
            'so_hs_duoc_cac_don_vi_cap_bang',

            'so_hs_duoc_nha_truong_cap_bang',
            'so_hs_co_viec_lam_sau_khi_tot_nghiep',
            'so_luong_chuong_trinh_xay_dung_phat_trien',
            'tong_hop_tac_quoc_te_trong_dao_tao_boi_duong',

            'so_gv_duoc_dao_tao_boi_duong',
            'so_can_bo_quan_ly_duoc_dao_tao_boi_duong',
            'so_phong_hoc_duoc_dau_tu',
            'so_nha_xuong_duoc_dau_tu',
            'tong_kinh_phi',
    ];
}
