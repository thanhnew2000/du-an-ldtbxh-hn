<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KetQuaTuyenSinhGanVoiDoanhNghiep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_qua_tuyen_sinh_gan_voi_doanh_nghiep', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('nghe_id');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');

            $table->integer('ket_qua_CD');
            $table->integer('ket_qua_TC');
            $table->integer('ket_qua_SC');
            $table->integer('ket_qua_duoi_3_thang');
            
            $table->string('ten_doanh_nghiep');
            $table->integer('so_HSSV_duoc_cam_ket');
            $table->integer('doanh_nghiep_xay_dung_chuong_trinh');
            $table->integer('doanh_nghiep_tham_gia_giang_day');
            $table->integer('doanh_nghiep_ho_tro_kinh_phi_dao_tao');
            $table->integer('doanh_nghiep_dat_hang_dao_tao');
            $table->integer('doanh_nghiep_tiep_nhan_HSSV_thuc_tap');
            $table->longText('khac');
        });
        Schema::table('ket_qua_tuyen_sinh_gan_voi_doanh_nghiep', function(Blueprint $table){
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
        Schema::dropIfExists('ket_qua_tuyen_sinh_gan_voi_doanh_nghiep');
    }
}
