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
            'so_hssv_CD' => 'min:0|integer',
            'so_hssv_TC' => 'min:0|integer',
            'tong_so_hssv' => 'min:0|integer',
            'kinh_phi_CD' => 'min:0|integer',
            'kinh_phi_TC' => 'min:0|integer',
            'kinh_phi' => 'min:0|integer',
        ];
    }
    public function messages()
    {
        return [
            'integer' => 'Vui lòng nhập số nguyên',
            'min' => 'Số liệu nhỏ nhất là 0'
        ];
    }
}
