<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoLieuCanBoQuanLy extends Model
{
    protected $table = 'so_lieu_can_bo_quan_ly';
    protected $primaryKey = 'id';

    protected $fillable = [
        'co_so_dao_tao_id',
        'loai_hinh_co_so_id',
        'trang_thai_id',
        'nam',
        'dot',
        'tong_so_quan_ly',
        'so_cb_quan_ly_nu',
        'so_cb_giang_day',
        'so_cb_da_boi_duong',
        'so_danh_hieu',
        'so_hieu_truong',
        'so_hieu_pho',
        'so_truong_khoa',
        'so_to_truong',
        'so_trinh_do_tien_sy',
        'so_trinh_do_thac_sy',
        'so_trinh_do_dai_hoc',
        'so_trinh_do_cao_dang',
        'so_trinh_do_trung_cap',
        'so_trinh_do_khac',
    ];
}
