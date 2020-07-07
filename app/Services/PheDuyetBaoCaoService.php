<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\PheDuyetBaoCaoRepositoryInterface;
use App\Models\TrangThai;
use Arr;

class PheDuyetBaoCaoService extends AppService
{
    protected $pheDuyetBaoCaoRepository;

    public function __construct(
        PheDuyetBaoCaoRepositoryInterface $pheDuyetBaoCaoRepository
    ) {
        $this->pheDuyetBaoCaoRepository = $pheDuyetBaoCaoRepository;
    }

    public function getRepository()
    {
        return $this->pheDuyetBaoCaoRepository;
    }

    public function getDanhSachBaoCao()
    {
        $params = [];
        if (!empty(auth()->user()->co_so_dao_tao_id)) {
            $params['co_so_dao_tao_id'] = auth()->user()->co_so_dao_tao_id;
        }

        $listBaoCao = $this->pheDuyetBaoCaoRepository->getDanhSachBaoCao($params);
        $listBaoCao->load([
            'pheDuyetBaoCao',
            'pheDuyetBaoCao.coSoDaoTao',
            'nguoiPheDuyetLan1',
            'nguoiPheDuyetLan2',
        ]);

        return $listBaoCao;
    }

    public function pheDuyetBaoCao($baoCao, $params = [])
    {
        return $this->pheDuyetBaoCaoRepository->updateBaoCao($baoCao->id, $params);
    }

    public function getListTrangThai($baoCao, $selects = ['*'])
    {
        $listTrangThaiId = $this->getListTrangThaiCoTheThayDoi($baoCao->trang_thai);

        return app(TrangThai::class)
            ->whereIn('id', $listTrangThaiId)
            ->select($selects)
            ->get();
    }

    public function getListTrangThaiCoTheThayDoi($trangThaiBaoCao)
    {
        $trangThai = config('common.phe_duyet.trang_thai');
        $listTrangThaiId = [];
        $user->hasPermission('');
        switch ($trangThaiBaoCao) {
            case $trangThai['cho_phe_duyet']:
                $listTrangThaiId = Arr::only($trangThai, [
                    'tu_choi',
                    'phe_duyet_lan_1',
                    'phe_duyet_lan_2',
                ]);
                break;
            case $trangThai['tu_choi']:
                $listTrangThaiId = Arr::only($trangThai, [
                    'cho_phe_duyet',
                ]);
                break;
            case $trangThai['phe_duyet_lan_1']:
                $listTrangThaiId = Arr::only($trangThai, [
                    'tu_choi',
                    'phe_duyet_lan_2',
                ]);
                break;
            case $trangThai['phe_duyet_lan_2']:
                $listTrangThaiId = Arr::only($trangThai, [
                    'cho_phe_duyet',
                    'phe_duyet_lan_1',
                    'phe_duyet_lan_2',
                ]);
                break;
            default:
                $listTrangThaiId = Arr::only($trangThai, [
                    'cho_phe_duyet',
                ]);
                break;
        }

        return $listTrangThaiId;
    }
}
