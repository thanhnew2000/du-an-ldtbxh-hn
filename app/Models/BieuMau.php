<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BieuMau extends Model
{
    protected $table = 'bieu_mau';
    protected $fillable = [
        'co_so_id',
        'type',
        'trang_thai',
        'thoi_gian',
        'nguoi_duyet',
        'dot',
    ];
}
