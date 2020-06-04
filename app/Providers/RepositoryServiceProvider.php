<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\LoaiHinhCoSoRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use App\Repositories\GiaoVienRepository;
use App\Repositories\GiaoVienRepositoryInterface;

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
