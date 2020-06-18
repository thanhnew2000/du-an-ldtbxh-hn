<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChinhSachSinhVienValidate extends FormRequest
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
            'so_hssv_CD' => 'required|numeric|min:0',
            'so_hssv_TC' => 'required|numeric|min:0',
            'tong_so_hssv' => 'required|numeric|min:0',
            'kinh_phi_CD' => 'required|numeric|min:0',
            'kinh_phi_TC' => 'required|numeric|min:0',
            'kinh_phi' => 'required|numeric|min:0',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập số liệu',
            'numeric' => 'Hãy điền số',
            'min' => 'Số liệu nhỏ nhất là 0'
        ];
    }
}
