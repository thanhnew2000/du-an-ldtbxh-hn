<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetQuaDaoTaoChoThanhNien extends Model
{
    protected $table = 'ket_qua_dao_tao_cho_thanh_nien';
    protected $fillable = [
        'nam',
        'dot',
        'nghe_id',
        'co_so_id',

        'thoi_gian_dao_tao',
        'tong_tuyen_sinh',
        'nu_tuyen_sinh',
        'ho_khau_HN_tuyen_sinh',
        'tong_tuyen_sinh_bo_doi_xuat_ngu',
        'tuyen_sinh_bo_doi_nu',

        'tuyen_sinh_bo_doi_ho_khau_HN',
        'tong_tuyen_sinh_Ca',
        'tuyen_sinh_ca_nu',
        'tuyen_sinh_ca_ho_khau_HN',

        'tong_tuyen_sinh_thanh_nien',
        'tuyen_sinh_thanh_nien_nu',
        'tuyen_sinh_thanh_nien_ho_khau_HN',
        'tong_tot_nghiep',
        'tong_tot_nghiep_nu',
        'tong_tot_nghiep_ho_khau_HN',

        'tong_tot_nghiep_bo_doi',
        'tong_nghiep_bo_doi_nu',
        'tong_nghiep_bo_doi_ho_khau_HN',
        'tong_tot_nghiep_ca',
        'tot_nghiep_ca_nu',

        'tot_nghiep_ca_ho_khau_HN',
        'tong_tot_nghiep_thanh_nien',


        'tot_nghiep_thanh_nien_nu',
        'tot_nghiep_thanh_nien_ho_khau_HN',
        'tong_kinh_phi',

        'ngan_sach_TW',
        'ngan_sach_TP',
        'ngan_sach_khac',
    ];
}
