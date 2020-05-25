<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KetQuaXayDungChuongTrinhGiaoTrinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_qua_xay_dung_chuong_trinh_giao_trinh',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('co_so_dao_tao_ten');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');
            //$table->bigInteger('nghe_id');
            $table->integer('XD_chuong_trinh_moi_CD');
            $table->integer('XD_chuong_trinh_moi_TC');
            $table->integer('XD_chuong_trinh_moi_SC');
            $table->integer('XD_giao_trinh_moi_CD');
            $table->integer('XD_giao_trinh_moi_TC');
            $table->integer('XD_giao_trinh_moi_SC');
            $table->integer('sua_chuong_trinh_CD');
            $table->integer('sua_chuong_trinh_TC');
            $table->integer('sua_chuong_trinh_SC');
            $table->integer('sua_giao_trinh_CD');
            $table->integer('sua_giao_trinh_TC');
            $table->integer('sua_giao_trinh_SC');
        });
        Schema::table('ket_qua_xay_dung_chuong_trinh_giao_trinh', function(Blueprint $table){
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
        Schema::dropIfExists('ket_qua_xay_dung_chuong_trinh_giao_trinh');
    }
}
