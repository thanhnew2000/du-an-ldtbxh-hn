<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChuongTrinhDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuong_trinh_dao_tao', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('co_so_dao_tao_id');
            //$table->bigInteger('nghe_id');
            $table->date('thoi_gian_bao_cao');
            $table->integer('tong_so');
            $table->integer('so_chuong_trinh_cao_dang');
            $table->integer('so_chuong_trinh_trung_cap');
            $table->integer('so_chuong_trinh_so_cap');
            $table->integer('hinh_thuc');
            $table->integer('loai_tai_nguyen');
            $table->float('kinh_phi');
        });

        Schema::table('chuong_trinh_dao_tao', function(Blueprint $table){
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
        Schema::dropIfExists('chuong_trinh_dao_tao');
    }
}
