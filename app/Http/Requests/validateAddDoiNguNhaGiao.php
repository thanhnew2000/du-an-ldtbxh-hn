<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateAddDoiNguNhaGiao extends FormRequest
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
            'nghe_id' => 'required|numeric|min:0',
            'dot' => 'required|numeric|min:0',
            'nam' => 'required|numeric|min:0',
            'tong_so_can_bo' => 'required|numeric|min:0',
            'bien_che' => 'required|numeric|min:0',
            'hop_dong_1_nam_tro_len' => 'required|numeric|min:0',
            'so_tien_sy' => 'required|numeric|min:0',
            'so_thac_si' => 'required|numeric|min:0',
            'so_dai_hoc' => 'required|numeric|min:0',
            'so_cao_dang' => 'required|numeric|min:0',

            'so_trung_cap' => 'required|numeric|min:0',
            'so_khac' => 'required|numeric|min:0',
            'bac1' => 'required|numeric|min:0',
            'bac2' => 'required|numeric|min:0',
            'bac3' => 'required|numeric|min:0',
            'bac4' => 'required|numeric|min:0',
            'bac5' => 'required|numeric|min:0',
            'bac6' => 'required|numeric|min:0',
            'chung_chi_KNN_quoc_gia_bac_1' => 'required|numeric|min:0',
            'chung_chi_KNN_quoc_gia_bac_2' => 'required|numeric|min:0',
            'chung_chi_KNN_quoc_gia_bac_3' => 'required|numeric|min:0',
            'chung_chi_su_pham_day_trinh_do_CD' => 'required|numeric|min:0',
            'chung_chi_su_pham_day_trinh_do_TC' => 'required|numeric|min:0',

            'chung_chi_su_pham_day_trinh_do_SC' => 'required|numeric|min:0',
            'so_luong_nu' => 'required|numeric|min:0',
            'dan_toc_it_nguoi' => 'required|numeric|min:0',
            'giao_su' => 'required|numeric|min:0',
            'pho_giao_su' => 'required|numeric|min:0',
            'NGND_NSND_NNND_TTND' => 'required|numeric|min:0',
            'NGUT_NSUT_NNUT_TTUT' => 'required|numeric|min:0',
            'nha_giao_giang_day_mon_hoc_chung' => 'required|numeric|min:0',
            'so_nha_giao_tham_gia_dao_tao' => 'required|numeric|min:0',

            'trinh_do_tin_hoc_co_ban' => 'required|numeric|min:0',
            'trinh_do_tin_hoc_nang_cao' => 'required|numeric|min:0'       
        ];
    }

    public function messages()
    {
        return [
                'required' => 'Vui lòng nhập số liệu',
                'numeric' => 'Hãy điền số',
                'min' => 'Số liệu nhỏ nhất là 0', 

                'co_so_id.min' => 'Vui lòng chọn cơ sở',
                'nghe_id.min' => 'Vui lòng chọn ngành nghề',
                'dot.min' => 'Vui lòng chọn đợt',
                'nam.min' => 'Vui lòng chọn năm'
        ];
    }
}
