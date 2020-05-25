<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KetQuaTotNghiepGanVoiDoanhNghiep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_qua_tot_nghiep_gan_voi_doanh_nghiep', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('nghe_id');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');
            
            $table->string('ten_doanh_nghiep');
            $table->integer('nhap_hoc_dau_tot_nghiep_CD');
            $table->integer('tot_nghiep_CD');
            $table->integer('nhap_hoc_dau_tot_nghiep_TC');
            $table->integer('tot_nghiep_TC');
            $table->integer('nhap_hoc_dau_tot_nghiep_SC');
            $table->integer('tot_nghiep_SC');
            $table->integer('duoi_3_thang_tot_nghiep_nhap_hoc_dau');
            $table->integer('duoi_3_thang_tot_nghiep');
            $table->integer('kq_viec_lam_sau_tot_nghiep');
            $table->float('muc_luong_doanh_nghiep_tra');

        });
        Schema::table('ket_qua_tot_nghiep_gan_voi_doanh_nghiep', function(Blueprint $table){
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
        Schema::dropIfExists('ket_qua_tot_nghiep_gan_voi_doanh_nghiep');
    }
}
