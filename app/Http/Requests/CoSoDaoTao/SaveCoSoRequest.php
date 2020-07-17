<?php

namespace App\Http\Requests\CoSoDaoTao;

use Illuminate\Foundation\Http\FormRequest;

class SaveCoSoRequest extends FormRequest
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
            'ten' => 'required|unique:co_so_dao_tao',
            'ma_don_vi' => 'required|unique:co_so_dao_tao',
            'cap_quan_ly' => 'required',
            'ten_nguoi_dai_dien' => 'required',
            'hinh_thuc_so_huu' => 'required',
            'trinh_do_dao_tao' => 'required',
            'nguoi_phu_trach' => 'required',
            'hotline' => 'required|numeric|digits_between:10,12',
            'so_quyet_dinh' => 'required|unique:quyet_dinh_thanh_lap_csdt',
            'anh_quyet_dinh' => 'required|mimes:jpeg,png',

            'ngay_ban_hanh' => 'required|date_format:d-m-Y',
            'ngay_hieu_luc' => 'required|date_format:d-m-Y|after_or_equal:ngay_ban_hanh',
            'ngay_het_han' => 'after:ngay_hieu_luc',

            'hotline' => 'required|numeric |digits_between:10,12',
        ];
    }


    public function messages()
    {
        return [
            'ten.required' => 'Tên cơ sở đào tạo không được để trống',
            'ten.unique' => 'Tên cơ sở đào tạo đã tồn tại',

            'ma_don_vi.required' => 'Mã đơn vị không được để trống',
            'ma_don_vi.unique' => 'Mã đơn vị này đã tồn tại',

            'cap_quan_ly' => 'Vui Lòng chọn cấp quản lý',

            'hotline.required' => 'Điện thoại không được để trống',
            'hotline.digits_between' => 'Số điện thoại sai định dạng',
            'hotline.numeric ' => 'Số điện thoại sai định dạng',

            'ten_nguoi_dai_dien.required' => 'Vui Lòng nhập tên người đại diện',
            'hinh_thuc_so_huu.required' => 'Vui lòng chọn hình thức sở hữu của cơ sở',
            'trinh_do_dao_tao.required' => 'Vui lòng chọn trình độ đào tạo của cơ sở',
            'nguoi_phu_trach.required' => 'Vui lòng chọn người phụ trách',

            'so_quyet_dinh.required' => 'Vui lòng nhập số quyết định',
            'so_quyet_dinh.uniqie' => 'Quyết đinh này đã tồn tại',

            'anh_quyet_dinh.required' => 'Vui lòng tải lên ảnh quyết định',
            'anh_quyet_dinh.mimes' => 'File không đúng định dạng ảnh',

            'ngay_ban_hanh.date_format' => 'Ngày không đúng định dạng',
            'ngay_ban_hanh.required' => 'Vui lòng chọn ngày ban hành',

            'ngay_hieu_luc.date_format' => 'Ngày không đúng định dạng',
            'ngay_hieu_luc.required' => 'Vui lòng chọn ngày ban hành',
            'ngay_hieu_luc.after_or_equal' => 'Ngày hiệu lực phải sau hoặc bằng ngày ban hành',

            'ngay_het_han.after' => 'Ngày hết hạn phải sau ngày ban hành',
        ];
    }
}
