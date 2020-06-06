<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    protected $table = 'giao_vien';

    public function getDanhHieuAttribute()
    {
        $danhHieu = '';
        if ($this->attributes['nha_giao_nhan_dan'] == 1) {
            $danhHieu .= "Nhà giáo nhân dân";
        }

        if ($this->attributes['nha_giao_uu_tu'] == 1) {
            if ($danhHieu !== '') {
                $danhHieu .= '<br>';
            }

            $danhHieu .= "Nhà giáo ưu tú";
        }

        return $danhHieu;
    }
}
