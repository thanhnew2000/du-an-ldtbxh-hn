<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAccountRoutes();

        $this->mapProfileRoutes();

        $this->mapCoSoDaoTaoRoutes();

        $this->mapNganhNgheRoutes();

        $this->mapXuatBaoCaoRoutes();

        $this->mapNhapBaoCaoRoutes();


        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    // 2020-05-30 - thienth - chia thêm route account
    protected function mapAccountRoutes()
    {
        Route::middleware('web', 'auth')
            ->prefix('account')
            ->namespace($this->namespace)
            ->group(base_path('routes/account.php'));
    }

    // 2020-05-30 - thienth - chia thêm route profile
    protected function mapProfileRoutes()
    {
        Route::middleware('web', 'auth')
            ->prefix('thong-tin-tai-khoan')
            ->namespace($this->namespace)
            ->group(base_path('routes/profile.php'));
    }

    // 2020-05-30 - thienth - chia thêm route co-so-dao-tao
    protected function mapCoSoDaoTaoRoutes()
    {
        Route::middleware('web', 'auth')
            ->prefix('co-so-dao-tao')
            ->namespace($this->namespace)
            ->group(base_path('routes/co-so-dao-tao.php'));
    }

    // 2020-05-30 - thienth - chia thêm route nganh-nghe
    protected function mapNganhNgheRoutes()
    {
        Route::middleware('web', 'auth')
            ->prefix('nganh-nghe')
            ->namespace($this->namespace)
            ->group(base_path('routes/nganh-nghe.php'));
    }

    // 2020-05-30 - thienth - chia thêm route xuat-bao-cao
    protected function mapXuatBaoCaoRoutes()
    {
        Route::middleware('web', 'auth')
            ->prefix('xuat-bao-cao')
            ->namespace($this->namespace)
            ->group(base_path('routes/xuat-bao-cao.php'));
    }

    // 2020-05-30 - thienth - chia thêm route nhap-bao-cao
    protected function mapNhapBaoCaoRoutes()
    {
        Route::middleware('web', 'auth')
            ->prefix('nhap-bao-cao')
            ->namespace($this->namespace)
            ->group(base_path('routes/nhap-bao-cao.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
