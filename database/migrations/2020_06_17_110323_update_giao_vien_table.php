<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGiaoVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giao_vien', function (Blueprint $table) {
            $table->string('nghe_giang_day', 255);
            $table->text('trinh_do_tien_sy')->default('');
            $table->text('trinh_do_thac_sy')->default('');
            $table->text('trinh_do_dai_hoc')->default('');
            $table->text('trinh_do_cao_dang')->default('');
            $table->text('trinh_do_trung_cap')->default('');
            $table->text('trinh_do_khac')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giao_vien', function (Blueprint $table) {
            $table->dropColumn([
                'nghe_giang_day',
                'trinh_do_tien_sy',
                'trinh_do_thac_sy',
                'trinh_do_dai_hoc',
                'trinh_do_cao_dang',
                'trinh_do_trung_cap',
                'trinh_do_khac',
            ]);
        });
    }
}
