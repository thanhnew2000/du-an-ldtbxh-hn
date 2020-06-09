<?php

namespace App\Http\Requests\GiaoVien;

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
            'ten_giao_vien' => 'required|max:255',
            'co_so_id' => 'required|exists:co_so_dao_tao,id',
            'gioi_tinh' => 'required|in:' . implode(',', config('common.giao_vien.gioi_tinh')),
            'mon_chung' => 'required|max:255',
            'trinh_do' => 'required|exists:trinh_do_gv,id',
            'nganh_nghe' => 'required|exists:nganh_nghe,id',
            'dan_toc_thieu_so' => 'required|in:' . implode(',', config('common.giao_vien.dan_toc_thieu_so')),
            'chuc_danh' => 'required|in:' . implode(',', config('common.giao_vien.chuc_danh')),
            'nha_giao_nhan_dan' => 'required|in:' . implode(',', config('common.giao_vien.nha_giao_nhan_dan')),
            'nha_giao_uu_tu' => 'required|in:' . implode(',', config('common.giao_vien.nha_giao_uu_tu')),
            'loai_hop_dong' => 'required|in:' . implode(',', config('common.giao_vien.loai_hop_dong')) ,
            'trinh_do_ngoai_ngu' => 'required|in:' . implode(',', config('common.giao_vien.trinh_do_ngoai_ngu')),
            'trinh_do_nghe' => 'required|in:' . implode(',', config('common.giao_vien.trinh_do_nghe')),
            'nghiep_vu_su_pham' => 'required|in:' . implode(',', config('common.giao_vien.nghiep_vu_su_pham')),
            'trinh_do_tin_hoc' => 'required|in:' . implode(',', config('common.giao_vien.trinh_do_tin_hoc')),
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute là trường bắt buộc.',
            'exists' => ':attribute không hợp lệ.',
            'in' => ':attribute không hợp lệ.',
            'ten_giao_vien.max' => ':attribute vượt quá 255 kí tự.',
            'mon_chung.max' => ':attribute vượt quá 255 kí tự.',
        ];
    }

    public function attributes()
    {
        return [
            'ten_giao_vien' => 'Tên giáo viên',
            'co_so_id' => 'Cơ sở',
            'gioi_tinh' => 'Giới tính',
            'mon_chung' => 'Môn chung',
            'trinh_do' => 'Trình độ',
            'nganh_nghe' => 'Ngành nghề',
            'dan_toc_thieu_so' => 'Dân tộc thiểu số',
            'chuc_danh' => 'Chức danh',
            'loai_hop_dong' => 'Loại hợp đồng',
            'trinh_do_ngoai_ngu' => 'Trình độ ngoại ngữ',
            'trinh_do_nghe' => 'Trình độ nghề',
            'nghiep_vu_su_pham' => 'Trình độ nghiệp vụ sư phạm',
        ];
    }
}
