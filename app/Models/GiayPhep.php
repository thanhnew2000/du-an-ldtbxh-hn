<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiayPhep extends Model
{
    protected $table = 'giay_phep';

    protected $fillable = [
        'co_so_id',
        'ten_giay_phep',
        'anh_giay_phep',
        'ngay_ban_hanh',
        'ngay_hieu_luc',
        'ngay_het_han',
        'mo_ta',
    ];
}
