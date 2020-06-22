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
            'chi_tieu' => 'min:0|integer',
            'thuc_tuyen' => 'min:0|integer',
            'so_HSSV_tot_nghiep' => 'min:0|integer',

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
