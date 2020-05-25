<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiayChungNhanDangKyNgheDuocPhepDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('co_so_id');
            //$table->bigInteger('nghe_id');
        });

        Schema::table('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', function(Blueprint $table){
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
        Schema::dropIfExists('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao');
    }
}
