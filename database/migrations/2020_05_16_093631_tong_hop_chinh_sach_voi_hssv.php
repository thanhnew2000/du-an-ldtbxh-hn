<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TongHopChinhSachVoiHssv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tong_hop_chinh_sach_voi_hssv', function(Blueprint $table){
            $table->bigIncrements('id');
            //$table->bigInteger('co_so_id');
            $table->date('thoi_gian_nhap');
            $table->year('nam');
            $table->integer('dot');
            $table->integer('so_sv_mien_hoc_phi');
            $table->integer('so_sv_giam_70');
            $table->integer('so_sv_giam_50');
            $table->integer('so_sv_thuoc_dien_ngheo');
            $table->integer('so_sv_thuoc_dien_pho_thong_dan_toc');
            $table->integer('so_nguoi_Kinh_thuoc_dien_ngheo');
            $table->integer('so_sv_xuat_sac');
            $table->integer('so_sv_gioi');
            $table->integer('so_sv_kha');
            $table->integer('chinh_sach_tin_dung');
            $table->integer('tro_cap_xa_hoi');    
            $table->integer('chinh_sach_khac');
            $table->integer('so_sv_mien_giam_hoc_phi_TC');
            $table->integer('so_sv_giam_70_TC');
            $table->integer('so_sv_giam_50_TC');
            $table->integer('so_sv_thuoc_dien_ngheo_TC');
            $table->integer('so_sv_thuoc_dien_pho_thong_dan_toc_TC');
            $table->integer('so_nguoi_Kinh_thuoc_dien_ngheo_TC');
            $table->integer('so_sv_xuat_sac_TC');
            $table->integer('so_sv_gioi_TC');
            $table->integer('so_sv_kha_TC');
            $table->integer('chinh_sach_tin_dung_TC');
            $table->integer('tro_cap_xa_hoi_TC');
            $table->integer('chinh_sach_khac_TC');
        });

        Schema::table('tong_hop_chinh_sach_voi_hssv', function(Blueprint $table){
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
        Schema::dropIfExists('tong_hop_chinh_sach_voi_hssv');
    }
}
