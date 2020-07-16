<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Giay_chung_nhan extends Model
{
    protected $table = 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao';
    protected $fillable = [
        'co_so_id',
        'so_quyet_dinh',
        'anh_quyet_dinh',
        'ngay_ban_hanh',
        'ngay_hieu_luc',
        'ngay_het_han',
        'mo_ta',
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
    
    
