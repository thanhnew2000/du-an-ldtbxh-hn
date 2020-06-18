<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LienKetDaoTaoService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\validateUpdateLienKetDaoTao;

class LienKetDaoTaoController extends Controller
{
    protected $ChinhSachSinhVienService;

    public function __construct(LienKetDaoTaoService $LienKetDaoTaoService)
    {
        $this->LienKetDaoTaoService = $LienKetDaoTaoService;
    }
    public function tonghoplienketdaotao()
    {

        $limit = 20;
        $params = request()->all();
        $data = $this->LienKetDaoTaoService->getTongHopLienKetDaoTao($params, $limit);
        //dd($data);
        $quanhuyen = $this->LienKetDaoTaoService->getTenQuanHuyen();
        if (isset(request()->devvn_quanhuyen)) {
            $xaphuongtheoquanhuyen = $this->LienKetDaoTaoService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        } else {
            $xaphuongtheoquanhuyen = [];
        }
        $bac_nghe = 0;
        $nghe_cap_2 = $this->LienKetDaoTaoService->getNganhNghe(2);
        $nghe_cap_3 = $this->LienKetDaoTaoService->getNganhNghe(3);
        $nghe_cap_4 = $this->LienKetDaoTaoService->getNganhNghe(4);
        $loai_hinh = $this->LienKetDaoTaoService->getLoaiHinhCoSo();
        $coso = $this->LienKetDaoTaoService->getCoSo();
        $data->appends(request()->input())->links();

        return view('lien-ket-dao-tao.tong-hop-lien-ket-dao-tao', compact(
            'data',
            'quanhuyen',
            'xaphuongtheoquanhuyen',
            'params',
            'limit',
            'nghe_cap_2',
            'nghe_cap_3',
            'nghe_cap_4',
            'loai_hinh',
            'coso',
            'bac_nghe'
        ));
    }
    public function tonghoplienketdaotaotheotrinhdo($id)
    {

        $limit = 20;
        $params = request()->all();
        $data = $this->LienKetDaoTaoService->getTongHopLienKetDaoTaoTheoTrinhDo($params, $limit, $id);
        $quanhuyen = $this->LienKetDaoTaoService->getTenQuanHuyen();
        if (isset(request()->devvn_quanhuyen)) {
            $xaphuongtheoquanhuyen = $this->LienKetDaoTaoService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        } else {
            $xaphuongtheoquanhuyen = [];
        }
        $bac_nghe = $id;
        $nghe_cap_2 = $this->LienKetDaoTaoService->getNganhNghe(2);
        $nghe_cap_3 = $this->LienKetDaoTaoService->getNganhNghe(3);
        $nghe_cap_4 = $this->LienKetDaoTaoService->getNganhNghe(4);
        $loai_hinh = $this->LienKetDaoTaoService->getLoaiHinhCoSo();
        $coso = $this->LienKetDaoTaoService->getCoSo();
        $data->appends(request()->input())->links();
        //dd($loai_hinh);

        return view('lien-ket-dao-tao.tong-hop-lien-ket-dao-tao', compact(
            'data',
            'quanhuyen',
            'xaphuongtheoquanhuyen',
            'params',
            'limit',
            'nghe_cap_2',
            'nghe_cap_3',
            'nghe_cap_4',
            'loai_hinh',
            'coso',
            'bac_nghe'
        ));
    }
    public function getmanganhnghe(Request $request)
    {
        $data = $this->LienKetDaoTaoService->getNganhNghe($request->id);
        return $data;
    }
    public function getNgheTheoCapBac(Request $request)
    {
        $id = $request->id;
        $cap_nghe = $request->cap;
        $getdata = $this->LienKetDaoTaoService->getNgheTheoCapBac($id, $cap_nghe);
        return $getdata;
    }

    public function chitietlienketdaotao($co_so_id, $bac_nghe)
    {
        //dd($bac_nghe . $co_so_id);
        $limit = 20;
        $params = request()->all();
        $data = $this->LienKetDaoTaoService->chitietlienketdaotao($co_so_id, $params, $limit, $bac_nghe);
        $data->appends(request()->input())->links();
        //dd($data);
        $co_so = $this->LienKetDaoTaoService->findCoSoDaoTao($co_so_id);

        return view('lien-ket-dao-tao.chi-tiet-lien-ket-dao-tao', compact('data', 'params', 'limit', 'co_so', 'bac_nghe'));
    }

    public function sualienketdaotao($id, $bac_nghe)
    {
        $data = $this->LienKetDaoTaoService->sualienketdaotao($id);

        return view('lien-ket-dao-tao.chinh-sua-lien-ket-dao-tao', compact('data', 'bac_nghe'));
    }

    public function postsualienketdaotao($id, validateUpdateLienKetDaoTao $request, $bac_nghe)
    {
        //dd($request->all());
        $data = $this->LienKetDaoTaoService->update($id, $request);
        return redirect()->route('xuatbc.sua-lien-ket-dao-tao', ['id' => $id, 'bac_nghe' => $bac_nghe])->with('thongbao', 'Cập nhật số liệu chính sách sinh viên thành công');
    }

    public function themlienketdaotao()
    {
        $data = $this->LienKetDaoTaoService->getCoSo();
        return view('lien-ket-dao-tao.them-moi-lien-ket-dao-tao', compact('data'));
    }

    public function postthemlienketdaotao(Request $request)
    {
        $requestParams = $request->all();
        //dd($requestParams);
        $data = [
            [
                'id' => "co_so_id",
                'value' => $requestParams["co_so_id"],
            ],
            [
                'id' => 'nghe_id',
                'value' => $requestParams["nghe_id"]
            ],
            [
                'id' => 'nam',
                'value' => $requestParams["nam"]
            ],
            [
                'id' => 'dot',
                'value' => $requestParams["dot"]
            ],
        ];

        $result = $this->LienKetDaoTaoService->getCheckTonTaiLienKetDaoTao($data, $requestParams);
        //dd($result);
        return redirect($result['route'])->with('thongbao', $result['message']);
    }

    public function getCheckTonTaiLienKetDaoTao(Request $request)
    {
        $datacheck =  $request->datacheck;
        $getdata = $this->LienKetDaoTaoService->getSoLieu($datacheck);
        if ($getdata == 'tontai') {
            return 1;
        } else if ($getdata == null) {
            return 2;
        } else {
            return $urledit = route('xuatbc.post-sua-lien-ket-dao-tao', ['id' => $getdata->id, 'bac_nghe' => 0]);
        }
    }
}
