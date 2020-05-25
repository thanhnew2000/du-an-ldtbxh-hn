<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuyetDinhThanhLapCsdt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('quyet_dinh_thanh_lap_csdt', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ten');
            $table->string('van_ban_url');
            $table->date('ngay_ban_hanh');
            $table->date('ngay_hieu_luc');
            $table->date('ngay_het_han');
            $table->integer('loai_quyet_dinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('quyet_dinh_thanh_lap_csdt');
    }
}
