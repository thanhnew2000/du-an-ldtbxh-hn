<?php

namespace App\Http\Requests\SoLieuCanBoQuanLy;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "co_so_dao_tao_id" => 'required|integer|exists:co_so_dao_tao,id',
            "loai_hinh_co_so_id" => 'required|integer|exists:loai_hinh_co_so,id',
            "nam" => "required|integer|in:" . implode(',', config('common.nam.list')),
            "dot" => "required|integer|in:" . implode(',', config('common.dot')),
            "tong_so_quan_ly" => 'required|integer|min:0',
            "so_cb_quan_ly_nu" => 'nullable|integer|min:0',
            "so_cb_giang_day" => 'nullable|integer|min:0',
            "so_cb_da_boi_duong" => 'nullable|integer|min:0',
            "so_danh_hieu" => 'nullable|integer|min:0',
            "so_hieu_truong" => 'nullable|integer|min:0',
            "so_hieu_pho" => 'nullable|integer|min:0',
            "so_truong_khoa" => 'nullable|integer|min:0',
            "so_to_truong" => 'nullable|integer|min:0',
            "so_trinh_do_tien_sy" => 'nullable|integer|min:0',
            "so_trinh_do_thac_sy" => 'nullable|integer|min:0',
            "so_trinh_do_cao_dang" => 'nullable|integer|min:0',
            "so_trinh_do_trung_cap" => 'nullable|integer|min:0',
            "so_trinh_do_khac" => 'nullable|integer|min:0',
        ];
    }
}
