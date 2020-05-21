<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuyMoTuyenSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quy_mo_tuyen_sinh', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('chung_nhan_id');
            $table->integer('ma_cap_loai');
            $table->integer('so_ma');
            $table->integer('quy_mo_tuyen_sinh');
        });
        Schema::table('quy_mo_tuyen_sinh', function(Blueprint $table){
            $table->unsignedBigInteger('chung_nhan_id');
            $table->foreign('chung_nhan_id')->references('id')->on('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quy_mo_tuyen_sinh');
    }
}
