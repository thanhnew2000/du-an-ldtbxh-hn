<?php

namespace App\Rules\TuyenSinh;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class CheckTongTrungCap implements Rule
{
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tong_ts_trung_cap = request()->get('so_luong_sv_Trung_cap');
        $so_Tot_nghiep_THCS = request()->get('so_Tot_nghiep_THCS');
        $so_Tot_nghiep_THPT = request()->get('so_Tot_nghiep_THPT');

        if(($so_Tot_nghiep_THCS + $so_Tot_nghiep_THPT) != $tong_ts_trung_cap){
            $this->message = 'Số THCS cộng THPT phải bằng tổng sinh viên' ;
            return false;
        }else{
            return true;
        }

        

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
