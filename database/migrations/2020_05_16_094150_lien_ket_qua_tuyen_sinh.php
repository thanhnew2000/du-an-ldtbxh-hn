<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LienKetQuaTuyenSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lien_ket_qua_tuyen_sinh', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('co_so_dao_tao_ten');
            
            $table->integer('chi_tieu_cao_dang');
            $table->integer('thuc_tuyen_cao_dang');
            $table->integer('so_HSSV_tot_nghiep_cao_dang');
            $table->integer('don_vi_lien_ket_cao_dang');

            $table->integer('chi_tieu_trung_cap');
            $table->integer('thuc_tuyen_trung_cap');
            $table->integer('so_HSSV_tot_trung_cap');
            $table->integer('don_vi_lien_ket_trung_cap');

            $table->longText('ghi_chu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lien_ket_qua_tuyen_sinh');
    }
}
