<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SvTotNghiep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sv_tot_nghiep', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('co_so_id');
            //$table->bigInteger('nghe_id');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');

            $table->integer('Tong_SoNguoi_TN');
            $table->integer('NU_SV_TN');
            $table->integer('DanToc_ThieuSo_ItNguoi');
            $table->integer('HoKhauHN');

            $table->integer('SoSV_NhapHoc_DauKhoa_TrinhDoCD');
            $table->integer('SoSV_Du_DieuKienThi_XetTN_TrinhDoCD');
            $table->integer('SoSV_TN_TrinhDoCD');
            $table->integer('SoLuong_Nu_SV_CD');
            $table->integer('SoSV_HoKhauHN_CD');
            $table->integer('SoLuong_HSSV_TN_Kha_Gioi_CD');
       

            $table->integer('SoSV_NhapHoc_DauKhoa_TrinhDoTC');
            $table->integer('SoSV_Du_DieuKienTHhi_XetTN_TrinhDoTC');
            $table->integer('SoSV_TN_TrinhDoTC');
            $table->integer('SoLuong_Nu_SV_TC');
            $table->integer('SoSV_HoKhauHN_TC');
            $table->integer('SoLuong_HSSV_TN_Kha_Gioi_TC');

            $table->integer('SoSV_NhapHoc_DauKhoa_TrinhDoSC');
            $table->integer('SoSV_Du_DieuKienThi_XetTN_TrinhDoSC');
            $table->integer('SoSV_TN_TrinhDoSC');
            $table->integer('SoLuong_Nu_SV_SC');
            $table->integer('SoSV_HoKhauHN_SC');
            $table->integer('SoLuong_HSSV_TN_Kha_Gioi_SC');

            $table->integer('SoSV_NhapHoc_DauKhoa_NgheKhac');
            $table->integer('SoSV_DuKienThi_XetTN_NgheKhac');
            $table->integer('SoSV_TN_NgheKhac');
            $table->integer('SoLuong_Nu_SV_NgheKhac');
            $table->integer('DanToc_ThieuSo_ItNguoi_NgheKhac');
            $table->integer('SoNguoi_HoKhauHN_NgheKhac');

            $table->integer('SoNguoi_CoViecLamNgay_SauKhi_TN_CD');
            $table->integer('CoViecLam_HoKhauHN_TrinhDoCD');
            $table->integer('SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoTC');
            $table->integer('CoViecLam_HoKhauHN_TrinhDo_TC');
            $table->integer('SV_CoViecLam_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC');
            $table->integer('SV_CoViecLamNgay_SauKhi_TN_TrinhDoTC');
            $table->integer('SoLuong_HoKhauHN_TrinhDoSC');

            $table->integer('SoNguoiHoc_CoViecLamNgay_SauKhi_TN_DaoTao_NgheKhac');
            $table->integer('SoNguoi_HoKhauHN_TrinhDo_DaoTao_NgheKhac');

            $table->float('MucLuong_TB_CD');
            $table->float('MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoCD');

            $table->float('MucLuong_TB_TC');
            $table->float('MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC');

            $table->float('MucLuong_TB_SC');
            $table->float('MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoSC');

            $table->float('MucLuong_TB_NgheKhac');
            $table->float('MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoNgheKhac');
        });
        Schema::table('sv_tot_nghiep', function(Blueprint $table){
            $table->unsignedBigInteger('co_so_id');
            $table->foreign('co_so_id')->references('id')->on('co_so_dao_tao');

            $table->unsignedBigInteger('nghe_id');
            $table->foreign('nghe_id')->references('id')->on('nganh_nghe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sv_tot_nghiep');
    }
}
