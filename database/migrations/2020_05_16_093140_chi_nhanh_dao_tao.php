<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChiNhanhDaoTao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_nhanh_dao_tao', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->longText('dia_chi');
            $table->integer('chi_nhanh_chinh');
            $table->integer('ma_chung_nhan_dang_ki_hoat_dong');
            $table->integer('da_duoc_cap');
            $table->integer('trang_thai');
        });

        Schema::table('chi_nhanh_dao_tao', function(Blueprint $table){

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
        Schema::dropIfExists('chi_nhanh_dao_tao');
    }
}
