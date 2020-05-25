<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TuyenSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyen_sinh', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('co_so_id');
            //$table->bigInteger('nghe_id');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');
            $table->string('bao_cao_url');

            $table->integer('so_luong_sv_Cao_dang');
            $table->integer('so_luong_sv_nu_Cao_dang');
            $table->integer('so_luong_sv_dan_toc_Cao_dang');
            $table->integer('so_luong_sv_ho_khau_HN_Cao_dang');

            $table->integer('so_tuyen_moi_Cao_dang');
            $table->integer('so_lien_thong_Cao_dang');

            $table->integer('so_luong_sv_Trung_cap');
            $table->integer('so_luong_sv_nu_Trung_cap');
            $table->integer('so_luong_sv_dan_toc_Trung_cap');
            $table->integer('so_luong_sv_ho_khau_HN_Trung_cap');

            $table->integer('so_Tot_nghiep_THCS');
            $table->integer('so_Tot_nghiep_THPT');

            $table->integer('so_luong_sv_So_cap');
            $table->integer('so_luong_sv_nu_So_cap');
            $table->integer('so_luong_sv_dan_toc_So_cap');
            $table->integer('so_luong_sv_ho_khau_HN_So_cap');

            $table->integer('so_luong_sv_he_khac');
            $table->integer('so_luong_sv_nu_khac');
            $table->integer('so_luong_sv_dan_toc_khac');
            $table->integer('so_luong_sv_ho_khau_HN_khac');
        });

        Schema::table('tuyen_sinh', function(Blueprint $table){
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
        Schema::dropIfExists('tuyen_sinh');
    }
}
