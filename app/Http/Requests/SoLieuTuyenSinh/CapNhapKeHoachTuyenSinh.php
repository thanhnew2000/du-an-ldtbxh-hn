<?php

namespace App\Http\Requests\SoLieuTuyenSinh;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TuyenSinh\CheckTongCaoDang;
use App\Rules\TuyenSinh\CheckTongTrungCap;

class CapNhapKeHoachTuyenSinh extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'co_so_id' => 'required',

            'ke_hoach_tuyen_sinh_cao_dang' => 'required|min:0|integer',
            'ke_hoach_tuyen_sinh_trung_cap' => 'required|min:0|integer',
            'ke_hoach_tuyen_sinh_so_cap' => 'required|min:0|integer',
            'ke_hoach_tuyen_sinh_khac' => 'required|min:0|integer',

            'so_luong_sv_Cao_dang' => 'required|min:0|integer',
            'so_luong_sv_nu_Cao_dang' => 'required|min:0|lte:so_luong_sv_Cao_dang|integer',
            'so_luong_sv_dan_toc_Cao_dang' => 'required|min:0|lte:so_luong_sv_Cao_dang|integer',
            'so_luong_sv_ho_khau_HN_Cao_dang' => 'required|min:0|lte:so_luong_sv_Cao_dang|integer',
            'so_tuyen_moi_Cao_dang' => 'required|min:0|lte:so_luong_sv_Cao_dang|integer',
            'so_lien_thong_Cao_dang' => [
                'required',
                'min:0',
                'integer',
                'lte:so_luong_sv_Cao_dang', 
                app()->make(CheckTongCaoDang::class),
            ],

            'so_luong_sv_Trung_cap' => 'required|min:0|integer',
            'so_luong_sv_nu_Trung_cap' => 'required|min:0|lte:so_luong_sv_Trung_cap|integer',
            'so_luong_sv_dan_toc_Trung_cap' => 'required|min:0|lte:so_luong_sv_Trung_cap|integer',
            'so_luong_sv_ho_khau_HN_Trung_cap' => 'required|min:0|lte:so_luong_sv_Trung_cap|integer',
            'ho_khau_HN_THCS_Trung_cap' => 'required|min:0|lte:so_luong_sv_Trung_cap|integer',
            'so_Tot_nghiep_THCS' => 'required|min:0|lte:so_luong_sv_Trung_cap|integer',
            'so_Tot_nghiep_THPT' => [
                'required',
                'min:0',
                'lte:so_luong_sv_Trung_cap', 
                'integer', 
                app()->make(CheckTongTrungCap::class),
            ],

            'so_luong_sv_So_cap' => 'required|min:0|integer',
            'so_luong_sv_nu_So_cap' => 'required|min:0|lte:so_luong_sv_So_cap|integer',
            'so_luong_sv_dan_toc_So_cap' => 'required|min:0|lte:so_luong_sv_So_cap|integer',
            'so_luong_sv_ho_khau_HN_So_cap' => 'required|min:0|lte:so_luong_sv_So_cap|integer',

            'so_luong_sv_he_khac' => 'required|min:0|integer',
            'so_luong_sv_nu_khac' => 'required|min:0|lte:so_luong_sv_he_khac|integer',
            'so_luong_sv_dan_toc_khac' => 'required|min:0|lte:so_luong_sv_he_khac|integer',
            'so_luong_sv_ho_khau_HN_khac' => 'required|min:0|lte:so_luong_sv_he_khac|integer',
         
        ];
    }

    public function messages()
    {
        return [
            'co_so_id.required' => 'Hãy chọn trường',
            'required' => 'Không được để trống',
            'min' => 'Không được nhỏ hơn 0',
            'integer' => 'Không nhập số âm',
            'lte' => 'Gía trị phải nhỏ hơn số lượng tổng',
            
        ];
    }
}
