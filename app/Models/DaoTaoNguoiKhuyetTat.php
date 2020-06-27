<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaoTaoNguoiKhuyetTat extends Model
{
    protected $table = 'ket_qua_dao_tao_nguoi_khuyet_tat';
    protected $fillable = [
        'nam',
        'dot',
        'nghe_id',
        'co_so_id',
        'tong_tuyen_sinh',
        'tuyen_sinh_nu',
        'tuyen_sinh_ho_khau_HN',
        'tong_tot_nghiep',
        'tot_nghiep_nu',
        'tot_nghiep_ho_khau_HN',

        'tong_ngan_sach',
        'ngan_sach_TW',
        'ngan_sach_TP',
        'ngan_sach_khac',
    ];
}
