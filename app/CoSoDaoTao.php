<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiHinhCoSo;
use App\Models\SoLieuCanBoQuanLy;

class CoSoDaoTao extends Model
{
    protected $table = 'co_so_dao_tao';
    protected $fillable = [
        // 'ten', 'ma_don_vi', 'dien_thoai', 'fax', 'website', 'dia_chi',
        // 'ten_quoc_te', 'ghi_chu', 'co_quan_chu_quan_id', 'ma_loai_hinh_co_so',
        // 'quyet_dinh_id'
    ];

    public function loaiHinhCoSo()
    {
        return $this->belongsTo(LoaiHinhCoSo::class, 'ma_loai_hinh_co_so');
    }

    public function soLieuCanBoQuanLy()
    {
        return $this->hasMany(SoLieuCanBoQuanLy::class, 'co_so_dao_tao_id');
    }
}
