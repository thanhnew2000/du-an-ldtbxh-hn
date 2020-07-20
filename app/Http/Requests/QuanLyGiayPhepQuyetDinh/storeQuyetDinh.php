<?php

namespace App\Http\Requests\QuanLyGiayPhepQuyetDinh;

use Illuminate\Foundation\Http\FormRequest;

class storeQuyetDinh extends FormRequest
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
            'so_quyet_dinh' => 'required',
            'anh_quyet_dinh' => 'required|mimes:jpeg,bmp,png,jpg',
            'ngay_ban_hanh' => 'required',
            'ngay_hieu_luc' => 'required|after_or_equal:ngay_ban_hanh',
            'ngay_het_han' => 'required|after_or_equal:ngay_hieu_luc',
        ];
    }

    public function messages()
    {
        return [
            'so_quyet_dinh.required' => 'Chưa nhập số quyết định',
            'anh_quyet_dinh.required' => 'Chưa nhập nhập ảnh',
            'anh_quyet_dinh.mimes' => 'Hãy nhập ảnh đuổi jpeg, bmp, png, jpg',
            'ngay_ban_hanh.required' => 'Chưa nhập ngày ban hành ',
            'ngay_hieu_luc.required' => 'Chưa nhập ngày hiệu lực ',
            'ngay_hieu_luc.after_or_equal' => 'Ngày hiệu lực phải sau ngày ban hành',
            'ngay_het_han.required' => 'Chưa nhập ngày hết hạn ',
            'ngay_het_han.after_or_equal' => 'Ngày hết hạn phải sau ngày hiệu lực',
        ];
    }
}
