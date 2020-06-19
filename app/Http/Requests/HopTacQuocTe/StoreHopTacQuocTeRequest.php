<?php

namespace App\Http\Requests\HopTacQuocTe;

use Illuminate\Foundation\Http\FormRequest;

class StoreHopTacQuocTeRequest extends FormRequest
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
            'co_so_id' => 'required|numeric|min:0',
            'dot' => 'required|numeric|min:0',
            'nam' => 'required|numeric|min:0',

            'tong_tuyen_sinh_CD' => 'required|numeric|min:0',
            'tong_tuyen_sinh_TC' => 'required|numeric|min:0',
            'tong_tuyen_sinh_SC' => 'required|numeric|min:0',
            'tong_tuyen_sinh' => 'required|numeric|min:0',


            'so_hs_duoc_cac_don_vi_cap_bang' => 'required|numeric|min:0',
            'so_hs_duoc_nha_truong_cap_bang' => 'required|numeric|min:0',
            'tong_so_hs_duoc_cap_bang' => 'required|numeric|min:0',

            'so_gv_duoc_dao_tao_boi_duong' => 'required|numeric|min:0',
            'so_can_bo_quan_ly_duoc_dao_tao_boi_duong' => 'required|numeric|min:0',
            'tong_hop_tac_quoc_te_trong_dao_tao_boi_duong' => 'required|numeric|min:0',
           
            'so_phong_hoc_duoc_dau_tu' => 'required|numeric|min:0',
            'so_nha_xuong_duoc_dau_tu' => 'required|numeric|min:0',
            'tong_kinh_phi' => 'required|numeric|min:0',
            
            'so_hs_co_viec_lam_sau_khi_tot_nghiep' => 'required|numeric|min:0',
            'so_luong_chuong_trinh_xay_dung_phat_trien' => 'required|numeric|min:0'
              
        ];
    }

    public function messages()
    {
        return [
                'required' => 'Vui lòng nhập số liệu',
                'numeric' => 'Hãy điền số',
                'min' => 'Số liệu nhỏ nhất là 0', 

                'co_so_id.min' => 'Vui lòng chọn cơ sở',
                'dot.min' => 'Vui lòng chọn đợt',
                'nam.min' => 'Vui lòng chọn năm'
 
        ];
    }
}
