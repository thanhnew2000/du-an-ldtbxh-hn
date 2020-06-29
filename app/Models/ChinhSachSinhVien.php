<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChinhSachSinhVien extends Model
{
    protected $table = 'tong_hop_chinh_sach_voi_hssv';
    protected $fillable = [
        'chinh_sach_id',
        'nam',
        'dot',
        'co_so_id',
        'tong_so_hssv',
        'kinh_phi',
        'so_hssv_TC',
        'kinh_phi_TC',
        'so_hssv_CD',
        'kinh_phi_CD',
        'ghi_chu',
        'thoi_gian_nhap',
    ];

}
