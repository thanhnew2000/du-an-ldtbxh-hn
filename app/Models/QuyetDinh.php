<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class QuyetDinh extends Model
{
    protected $table = 'quyet_dinh_thanh_lap_csdt';
    protected $fillable = [
        'so_quyet_dinh', 'ngay_ban_hanh', 'ngay_hieu_luc', 'ngay_het_han', 'anh_quyet_dinh'
    ];
    public function setNgayBanHanhAttribute($value)
    {
        $this->attributes['ngay_ban_hanh'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setNgayHieuLucAttribute($value)
    {
        $this->attributes['ngay_hieu_luc'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setNgayHetHanAttribute($value)
    {
        $this->attributes['ngay_het_han'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
}
