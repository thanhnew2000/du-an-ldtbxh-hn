<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAccount extends FormRequest
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
            'email' => 'required|unique:users,email|email',
            'phone' => 'required|digits:10|unique:users,phone_number',
            'name'  => 'required|regex:/^[\pL\s\-]+$/u|min:6|max:40',
            
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => 'Vui lòng nhập địa chỉ email',
            'email.email'         => 'Vui lòng nhập đúng định dạng email',
            'email.unique'            => 'Địa chỉ email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Vui lòng nhập số có độ dài 10 ký tự',  
            'phone.unique' => 'Số điện thoại đã tồn tại',  
            'name.required' => 'Vui lòng nhập họ tên', 
            'name.regex' => 'Tên không chứa số và ký tự đặc biệt',
            'name.min' => 'Họ tên ít nhất 6 ký tự',  
            'name.max' => 'Họ tên không được vượt quá 40 ký tự', 
        ];
    }
}