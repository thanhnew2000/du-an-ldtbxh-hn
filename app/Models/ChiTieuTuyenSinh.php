<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTieuTuyenSinh extends Model
{
    protected $table = 'dang_ki_chi_tieu_tuyen_sinh';
    protected $fillable = [
        'nam',
        'dot',
        'nghe_id',
        'co_so_id',
        'tong',
        'so_dang_ki_CD',
        'so_dang_ki_TC',
    ];
}
