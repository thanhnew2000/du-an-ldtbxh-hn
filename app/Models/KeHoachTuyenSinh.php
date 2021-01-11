<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeHoachTuyenSinh extends Model
{
    protected $table = 'ke_hoach_tuyen_sinh';
    protected $fillable = [
        'co_so_id',
        'trang_thai',
        'nam',
    ];

}
