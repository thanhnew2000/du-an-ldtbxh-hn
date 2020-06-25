<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateKetQuaTotNghiepGanVoiDoanhNghiep extends FormRequest
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
            'nhap_hoc_dau_tot_nghiep_CD' => 'min:0',
            'nhap_hoc_dau_tot_nghiep_TC' => 'min:0',
            'nhap_hoc_dau_tot_nghiep_SC' => 'min:0',
            'duoi_3_thang_tot_nghiep_nhap_hoc_dau' => 'min:0',

            'tot_nghiep_CD' => 'min:0',
            'tot_nghiep_TC' => 'min:0',
            'tot_nghiep_SC' => 'min:0',
            'duoi_3_thang_tot_nghiep' => 'min:0',

            'tong_HSSV_tot_nghiep' => 'min:0',
            'so_HSSV_duoc_tuyen_dung' => 'min:0',
            'muc_luong_doanh_nghiep_tra' => 'min:0',

        ];
    }

    public function messages()
    {
        return [

            'min' => 'Số liệu nhỏ nhất là 0'
        ];
    }
}
