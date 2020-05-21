<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChuyenNganhGv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyen_nganh_gv', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('nghe_id');
            //$table->bigInteger('giao_vien_id');
        });
        Schema::table('chuyen_nganh_gv', function(Blueprint $table){
            $table->unsignedBigInteger('nghe_id');
            $table->foreign('nghe_id')->references('id')->on('nganh_nghe');

            $table->unsignedBigInteger('giao_vien_id');
            $table->foreign('giao_vien_id')->references('id')->on('giao_vien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuyen_nganh_gv');
    }
}
