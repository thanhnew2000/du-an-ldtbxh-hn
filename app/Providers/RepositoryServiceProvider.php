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
use App\Repositories\DotRepositoryInterface;
use App\Repositories\DotRepository;
use App\Repositories\PheDuyetBaoCaoRepository;
use App\Repositories\PheDuyetBaoCaoRepositoryInterface;
use App\Repositories\ChiTieuTuyenSinhRepository;
use App\Repositories\ChiTieuTuyenSinhRepositoryInterface;
use App\Repositories\AccountRepository;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\BieuMauRepository;
use App\Repositories\BieuMauRepositoryInterface;
use App\Repositories\NganhNgheTcScRepository;
use App\Repositories\NganhNgheTcScRepositoryInterface;
use App\Repositories\GiayChungNhanChiTietRepository;
use App\Repositories\GiayChungNhanChiTietRepositoryInterface;
use App\Repositories\GiayPhepDangKyRepository;
use App\Repositories\GiayPhepDangKyRepositoryInterface;
use App\Repositories\ChiTietKeHoachTuyenSinhRepository;
use App\Repositories\ChiTietKeHoachTuyenSinhRepositoryInterface;
use App\Repositories\KeHoachTuyenSinhRepository;
use App\Repositories\KeHoachTuyenSinhRepositoryInterface;

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
        $this->app->bind(DotRepositoryInterface::class, DotRepository::class);
        $this->app->bind(PheDuyetBaoCaoRepositoryInterface::class, PheDuyetBaoCaoRepository::class);
        $this->app->bind(ChiTieuTuyenSinhRepositoryInterface::class, ChiTieuTuyenSinhRepository::class);
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(BieuMauRepositoryInterface::class, BieuMauRepository::class);
        $this->app->bind(NganhNgheTcScRepositoryInterface::class, NganhNgheTcScRepository::class);
        $this->app->bind(GiayChungNhanChiTietRepositoryInterface::class, GiayChungNhanChiTietRepository::class);
        $this->app->bind(GiayPhepDangKyRepositoryInterface::class, GiayPhepDangKyRepository::class);
        $this->app->bind(ChiTietKeHoachTuyenSinhRepositoryInterface::class, ChiTietKeHoachTuyenSinhRepository::class);
        $this->app->bind(KeHoachTuyenSinhRepositoryInterface::class, KeHoachTuyenSinhRepository::class);
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
