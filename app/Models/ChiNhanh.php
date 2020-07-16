<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiNhanh extends Model
{
    protected $table = 'chi_nhanh_dao_tao';
    protected $fillable = [
        'co_so_id', 'dia_chi', 'ma_chung_nhan_dang_ky_hoat_dong', 'maqh', 'xaid'
    ];
}
