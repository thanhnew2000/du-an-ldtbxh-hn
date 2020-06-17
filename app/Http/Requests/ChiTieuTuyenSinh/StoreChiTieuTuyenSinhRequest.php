<?php

namespace App\Http\Requests\ChiTieuTuyenSinh;

use Illuminate\Foundation\Http\FormRequest;

class StoreChiTieuTuyenSinhRequest extends FormRequest
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
            'nghe_id' => 'required|numeric|min:0',

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
                'min' => 'Số liệu nhỏ nhất là 0', 

                'co_so_id.min' => 'Vui lòng chọn đơn vị',
                'dot.min' => 'Vui lòng chọn đợt',
                'nam.min' => 'Vui lòng chọn năm',
                'nghe_id.min' => 'Vui lòng chọn nghề'
 
        ];
    }
}
