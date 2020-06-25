<?php

namespace App\Repositories;

use App\Models\YeuCauHoTro;
use Illuminate\Support\Facades\Auth;

class TuVanHoTroRepository extends BaseRepository implements TuVanHoTroRepositoryInterface
{
    public function __construct(
        YeuCauHoTro $yeuCauHoTro
    ) {
        parent::__construct();
        $this->model = $yeuCauHoTro;
    }

    public function getTable()
    {
        return 'yeu_cau_ho_tro';
    }


    public function clientThemTuVanHoTro($data)
    {
        return $this->model->create($data);
    }

    public function getAll()
    {
//        $queryBuilder = $this->table
//            ->select(
//                'id',
//                'ten_nganh_nghe',
//                'bac_nghe',
//                DB::raw('(select count(dk.id)
//                                from giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao dk
//                                where dk.nghe_id = nganh_nghe.id) as csdt_count')
//            )
//            ->where('bac_nghe', $params['bac_nghe'])
//            ->where('ma_cap_nghe', 4);
//        if (isset($params['keyword']) && $params['keyword'] != null) {
//            $queryBuilder->where(function ($query) use ($params) {
//
//                $query->orWhere('ten_nganh_nghe', 'like', "%" . $params['keyword'] . "%")
//                    ->orwhere('id', $params['keyword']);
//            });
//        }
//        //        dd($queryBuilder->get());
//        return $queryBuilder->paginate($params['page_size']);
    }

    public function findOne($id)
    {
        $model = $this->model->find($id);
        return $model == null ? false : $model;
    }

    public function traLoiYeuCau($id, $data)
    {
        $model = $this->model->find($id);
        $model->phan_hoi_boi = Auth::id();
        $model->noi_dung_phan_hoi = $data['noi_dung_phan_hoi'];
        $model->trang_thai = config('common.trang_thai_ho_tro.da_phan_hoi');
        return $model->save();
    }
}
