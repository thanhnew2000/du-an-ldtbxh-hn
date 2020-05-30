<?php

namespace App\Http\Requests;

use App\Rules\CheckEmail;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Auth;
class UpdateAccountId extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'name'  => 'required|alpha'

            
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => 'Vui lòng nhập địa chỉ email',
            'email.email'         => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Vui lòng nhập số có độ dài 10 ký tự',  
            'name.required' => 'Vui lòng nhập họ tên', 
            'name.alpha' => 'Tên phải là chữ'
 
        ];
    }
}
