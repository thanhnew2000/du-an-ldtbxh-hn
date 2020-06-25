<?php

namespace App\Providers;

use App\Repositories\TuVanHoTroRepository;
use App\Repositories\TuVanHoTroRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\LoaiHinhCoSoRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use App\Repositories\GiaoVienRepository;
use App\Repositories\GiaoVienRepositoryInterface;
use App\Repositories\CoSoDaoTaoRepository;
use App\Repositories\CoSoDaoTaoRepositoryInterface;
use App\Repositories\TrinhDoGiaoVienRepository;
use App\Repositories\TrinhDoGiaoVienRepositoryInterface;
use App\Repositories\NganhNgheRepository;
use App\Repositories\NganhNgheRepositoryInterface;
use App\Repositories\SoLieuCanBoQuanLyRepository;
use App\Repositories\SoLieuCanBoQuanLyRepositoryInterface;
use App\Repositories\DoiNguNhaGiaoInterface;
use App\Repositories\DoiNguNhaGiaoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoaiHinhCoSoRepositoryInterface::class, LoaiHinhCoSoRepository::class);
        $this->app->bind(GiaoVienRepositoryInterface::class, GiaoVienRepository::class);
        $this->app->bind(CoSoDaoTaoRepositoryInterface::class, CoSoDaoTaoRepository::class);
        $this->app->bind(TrinhDoGiaoVienRepositoryInterface::class, TrinhDoGiaoVienRepository::class);
        $this->app->bind(NganhNgheRepositoryInterface::class, NganhNgheRepository::class);
        $this->app->bind(SoLieuCanBoQuanLyRepositoryInterface::class, SoLieuCanBoQuanLyRepository::class);
        $this->app->bind(DoiNguNhaGiaoInterface::class, DoiNguNhaGiaoRepository::class);
        $this->app->bind(TuVanHoTroRepositoryInterface::class, TuVanHoTroRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
