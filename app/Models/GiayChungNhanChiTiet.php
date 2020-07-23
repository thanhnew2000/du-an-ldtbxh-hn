<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiayChungNhanChiTiet extends Model
{
    protected $table = 'giay_chung_nhan_chi_tiet';

    protected $fillable = [
        'co_so_id',
        'chi_nhanh_id',
        'nghe_id',
        'giay_chung_nhan_id',
        'ban_ghi_duoc_phe_duyet_id',
        'quy_mo',
        'phan_loai_nghe',
    ];
}
