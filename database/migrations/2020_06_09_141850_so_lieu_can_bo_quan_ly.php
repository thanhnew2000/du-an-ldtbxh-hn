<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class SoLieuCanBoQuanLy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_lieu_can_bo_quan_ly', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('co_so_dao_tao_id');
            $table->integer('loai_hinh_co_so_id')->default(1);
            $table->integer('trang_thai_id');
            $table->integer('nam')->default(Carbon::now()->year);
            $table->integer('dot');

            $table->integer('tong_so_quan_ly')->default(0);
            $table->integer('so_cb_quan_ly_nu')->default(0);
            $table->integer('so_cb_giang_day')->default(0);
            $table->integer('so_cb_da_boi_duong')->default(0);
            $table->integer('so_danh_hieu')->default(0);
            $table->integer('so_hieu_truong')->default(0);
            $table->integer('so_hieu_pho')->default(0);
            $table->integer('so_truong_khoa')->default(0);
            $table->integer('so_to_truong')->default(0);
            $table->integer('so_trinh_do_tien_sy')->default(0);
            $table->integer('so_trinh_do_thac_sy')->default(0);
            $table->integer('so_trinh_do_dai_hoc')->default(0);
            $table->integer('so_trinh_do_cao_dang')->default(0);
            $table->integer('so_trinh_do_trung_cap')->default(0);
            $table->integer('so_trinh_do_khac')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_lieu_can_bo_quan_ly');
    }
}
