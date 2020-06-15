<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LienKetDaoTaoService;
use Illuminate\Support\Facades\DB;

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

        return view('lien-ket-dao-tao.tong-hop-lien-ket-dao-tao');
    }
}
