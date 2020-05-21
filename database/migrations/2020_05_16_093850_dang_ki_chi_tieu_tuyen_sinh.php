<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DangKiChiTieuTuyenSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_ki_chi_tieu_tuyen_sinh', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('nghe_id');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');
            $table->string('co_so_dao_tao_ten');
            $table->integer('so_dang_ki_CD');
            $table->integer('so_dang_ki_TC');
        });
        Schema::table('dang_ki_chi_tieu_tuyen_sinh', function(Blueprint $table){
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
        Schema::dropIfExists('dang_ki_chi_tieu_tuyen_sinh');
    }
}
