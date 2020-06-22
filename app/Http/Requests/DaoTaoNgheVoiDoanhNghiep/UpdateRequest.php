<?php

namespace App\Http\Requests\DaoTaoNgheVoiDoanhNghiep;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $data = $this->all();
<<<<<<< HEAD
        unset($data['_token'],$data['khac']);
=======
        unset($data['_token'],$data['khac'],$data['ten_doanh_nghiep']);
>>>>>>> 270990d09284d28a74a2cbad390bbd22e27077e5
        foreach ($data as $item=>$value) {
            if($value == null){
                $getDataCheck[$item] = 'min:0|';
            }else{
                $getDataCheck[$item] = 'min:0|integer|';
            }
        }
        return $getDataCheck;
    }

    public function messages()
    {
        return [
            'min' => ':attribute không được nhỏ hơn 0',
            'integer' => ':attribute nguyên',
        ];
    }

    public function attributes()
    {
        $data = $this->all();
        unset($data['_token'],$data['khac']);
        $attributes=[];
        foreach ($data as $item=>$value) {
            $attributes[$item]="Nhập số";
        }
        return $attributes;
    }
}
