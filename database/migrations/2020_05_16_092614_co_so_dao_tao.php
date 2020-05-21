<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoSoDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("co_so_dao_tao", function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ten');
            $table->integer('ma_don_vi');
            //$table->bigInteger('loai_hinh_co_so_id');
            $table->string('logo');
            $table->string('dien_thoai');
            $table->string('fax');
            $table->string('website');
            $table->longText('dia_chi');
            $table->string('ten_quoc_te');
            $table->longText('ghi_chu');
        });
        Schema::table('co_so_dao_tao', function(Blueprint $table){
            $table->unsignedBigInteger('co_quan_chu_quan_id');
            $table->foreign('co_quan_chu_quan_id')->references('id')->on('co_quan_chu_quan');

            $table->unsignedBigInteger('ma_loai_hinh_co_so');
            $table->foreign('ma_loai_hinh_co_so')->references('id')->on('loai_hinh_co_so');

            $table->unsignedBigInteger('quyet_dinh_id');
            $table->foreign('quyet_dinh_id')->references('id')->on('quyet_dinh_thanh_lap_csdt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("co_so_dao_tao");
    }
}
