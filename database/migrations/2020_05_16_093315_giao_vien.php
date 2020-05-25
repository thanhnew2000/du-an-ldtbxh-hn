<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiaoVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_vien', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ten');
            //$table->bigInteger('co_so_id');
            $table->string('gioi_tinh');
            $table->string('mon_chung');
            $table->integer('dan_toc_it_nguoi');
            $table->integer('giao_su');
            $table->integer('pho_giao_su');
            $table->integer('nha_giao_nhan_dan');
            $table->integer('nha_giao_uu_tu');
            $table->integer('loai_hop_dong');
            //$table->bigInteger('trinh_do_id');
            $table->integer('trinh_do_ngoai_ngu');
            $table->integer('trinh_do_tin_hoc');
            $table->integer('trinh_do_ky_nang_nghe');
            $table->integer('trinh_do_nghiep_vu_su_pham');

        });
        Schema::table('giao_vien', function(Blueprint $table){

            $table->unsignedBigInteger('co_so_id');
            $table->foreign('co_so_id')->references('id')->on('co_so_dao_tao');

            $table->unsignedBigInteger('trinh_do_id');
            $table->foreign('trinh_do_id')->references('id')->on('trinh_do_gv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giao_vien');
    }
}
