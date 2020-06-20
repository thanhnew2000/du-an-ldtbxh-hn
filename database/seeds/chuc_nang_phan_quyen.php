<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class chuc_nang_phan_quyen extends Seeder
{
    /** Start CườngNC - Tạo Chức Năng Của Quyền - 18/06/2020
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'them_tai_khoan']);
        Permission::create(['name' => 'sua_tai_khoan']);

        Permission::create(['name' => 'them_moi_co_so_dao_tao']);
        Permission::create(['name' => 'xem_chi_tiet_co_so_dao_tao']);
        Permission::create(['name' => 'cap_nhat_co_so_dao_tao']);

        Permission::create(['name' => 'them_moi_dia_diem_dao_tao']);
        Permission::create(['name' => 'cap_nhat_dia_diem_dao_tao']);
        Permission::create(['name' => 'xoa_dia_diem_dao_tao']);

        Permission::create(['name' => 'them_moi_nganh_nghe']);
        Permission::create(['name' => 'xem_chi_tiet_nganh_nghe']);
        Permission::create(['name' => 'cap_nhat_nganh_nghe']);
        Permission::create(['name' => 'xoa_nganh_nghe']);

        Permission::create(['name' => 'them_moi_quan_ly_giao_vien']);
        Permission::create(['name' => 'cap_nhat_quan_ly_giao_vien']);


        Permission::create(['name' => 'them_moi_danh_sach_doi_ngu_nha_giao']);
        Permission::create(['name' => 'chi_tiet_danh_sach_doi_ngu_nha_giao']);
        Permission::create(['name' => 'cap_nhat_danh_sach_doi_ngu_nha_giao']);

        Permission::create(['name' => 'them_moi_danh_sach_doi_ngu_quan_ly']);
        Permission::create(['name' => 'cap_nhat_danh_sach_doi_ngu_quan_ly']);
        Permission::create(['name' => 'xem_chi_tiet_danh_sach_doi_ngu_quan_ly']);

        Permission::create(['name' => 'them_moi_tong_hop_thuc_hien_chinh_sach_cho_sv']);
        Permission::create(['name' => 'cap_nhat_tong_hop_thuc_hien_chinh_sach_cho_sv']);

        Permission::create(['name' => 'them_moi_tong_hop_ket_qua_tuyen_sinh']);
        Permission::create(['name' => 'xem_chi_tiet_tong_hop_ket_qua_tuyen_sinh']);
        Permission::create(['name' => 'sua_chi_tiet_tong_hop_ket_qua_tuyen_sinh']);

        Permission::create(['name' => 'them_moi_tong_hop_ket_qua_tot_nghiep']);
        Permission::create(['name' => 'xem_chi_tiet_tong_hop_ket_qua_tot_nghiep']);
    }
}