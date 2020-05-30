<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qlsv extends Model
{
    protected $table = 'sv_dang_quan_ly';
    protected $fillable = [
        // 'so_luong_sv_nu_Cao_dang', 'so_luong_sv_dan_toc_Cao_dang', 'so_luong_sv_ho_khau_HN_Cao_dang',
        // 'so_luong_sv_nu_Trung_cap', 'so_luong_sv_dan_toc_Trung_cap', 'so_luong_sv_ho_khau_HN_Trung_cap',
        // 'so_luong_sv_nu_So_cap', 'so_luong_sv_dan_toc_So_cap', 'so_luong_sv_ho_khau_HN_So_cap',
        // 'so_luong_sv_nu_khac', 'so_luong_sv_dan_toc_khac', 'so_luong_sv_ho_khau_HN_khac'
    ];
}