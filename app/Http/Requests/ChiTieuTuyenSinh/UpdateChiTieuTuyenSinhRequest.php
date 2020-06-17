<?php

namespace App\Http\Requests\ChiTieuTuyenSinh;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChiTieuTuyenSinhRequest extends FormRequest
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
            'so_dang_ki_CD' => 'required|numeric|min:0',
            'so_dang_ki_TC' => 'required|numeric|min:0',
            'tong' => 'required|numeric|min:0'
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
