<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LopDaoTaoBoiDuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_dao_tao_boi_duong', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ten_lop');
            //$table->bigInteger('giang_vien_id');
            $table->year('nam');
            $table->integer('thang');
        });
        Schema::table('lop_dao_tao_boi_duong', function(Blueprint $table){
            $table->unsignedBigInteger('giang_vien_id');
            $table->foreign('giang_vien_id')->references('id')->on('giao_vien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop_dao_tao_boi_duong');
    }
}
