<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateLienKetDaoTao extends FormRequest
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
            'chi_tieu' => 'required|numeric|min:0',
            'thuc_tuyen' => 'required|numeric|min:0',
            'so_HSSV_tot_nghiep' => 'required|numeric|min:0',
            'don_vi_lien_ket' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập liệu',
            'numeric' => 'Hãy điền số',
            'min' => 'Số liệu nhỏ nhất là 0'
        ];
    }
}
