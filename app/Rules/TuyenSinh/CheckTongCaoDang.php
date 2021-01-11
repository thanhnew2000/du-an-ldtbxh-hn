<?php

namespace App\Rules\TuyenSinh;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class CheckTongCaoDang implements Rule
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
        $tong_ts_cao_dang = request()->get('so_luong_sv_Cao_dang');
        $tuyen_moi_cao_dang = request()->get('so_tuyen_moi_Cao_dang');
        $lien_thong_cao_dang = request()->get('so_lien_thong_Cao_dang');

        if(($tuyen_moi_cao_dang + $lien_thong_cao_dang) != $tong_ts_cao_dang){
            $this->message = 'Tuyển mới cộng liên thông phải bằng tổng sinh viên' ;
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
