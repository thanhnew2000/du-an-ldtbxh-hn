<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoLieuDoiNguQuanLy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_lieu_doi_ngu_quan_ly', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('co_so_id');
            $table->date('thoi_gian_cap_nhat');
            $table->integer('tong_so_can_bo');
            $table->integer('so_luong_nu');
            $table->integer('dan_toc_it_nguoi');
            $table->integer('so_can_bo_quan_li_tham_gia_giang_day');
            $table->integer('so_can_bo_da_boi_duong_nghiep_vu');
            $table->integer('so_nha_giao_nhan_dan_nha_giao_uu_tu');
            $table->integer('hieu_truong');
            $table->integer('hieu_pho');
            $table->integer('so_truong_khoa');
            $table->integer('so_pho_khoa');
            $table->integer('so_to_truong_chuyen_mon');
            $table->integer('so_tien_sy');
            $table->integer('so_thac_si');
            $table->integer('so_dai_hoc');
            $table->integer('so_cao_dang');
            $table->integer('so_trung_cap');
            $table->integer('so_khac');

        });
        Schema::table('so_lieu_doi_ngu_quan_ly', function(Blueprint $table){

            $table->unsignedBigInteger('co_so_id');
            $table->foreign('co_so_id')->references('id')->on('co_so_dao_tao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_lieu_doi_ngu_quan_ly');
    }
}
