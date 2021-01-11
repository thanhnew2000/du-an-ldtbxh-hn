<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganhNgheTcSc extends Model
{
    protected $table = 'nganh_nghe_tc_sc';
    
    protected $fillable = [
        'ten_nganh_nghe',
        'bac_nghe',
        'ma_cap_nghe',
    ];
}
