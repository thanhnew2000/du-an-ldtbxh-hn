<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LienKetQuaTuyenSinh extends Model
{
    protected $table = 'lien_ket_qua_tuyen_sinh';
    protected $fillable = [
        'nam',
        'dot',
        'nghe_id',
        'co_so_id',
        'chi_tieu',
        'thuc_tuyen',
        'so_HSSV_tot_nghiep',
        'don_vi_lien_ket',
        'ghi_chu',
    ];

}
