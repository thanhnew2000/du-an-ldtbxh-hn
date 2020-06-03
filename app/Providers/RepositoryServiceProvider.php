<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\LoaiHinhCoSoRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;

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
