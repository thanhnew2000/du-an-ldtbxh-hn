<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KetQuaDaoTaoNguoiKhuyetTat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_qua_dao_tao_nguoi_khuyet_tat', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('co_so_dao_tao_ten');
            $table->date('thoi_gian_cap_nhat');
            $table->year('nam');
            $table->integer('dot');
            $table->integer('tuyen_sinh_nu');
            $table->integer('tuyen_sinh_ho_khau_HN');
            $table->integer('tot_nghiep_nu');
            $table->integer('tot_nghiep_ho_khau_HN');
            $table->integer('ngan_sach_TW');
            $table->integer('ngan_sach_TP');
            $table->integer('ngan_sach_khac');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ket_qua_dao_tao_nguoi_khuyet_tat');
    }
}
