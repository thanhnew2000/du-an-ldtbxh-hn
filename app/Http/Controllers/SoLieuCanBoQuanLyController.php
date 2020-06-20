<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SoLieuCanBoQuanLyService;
use App\Http\Requests\SoLieuCanBoQuanLy\StoreRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SoLieuCanBoQuanLy\UpdateRequest;
use App\Models\SoLieuCanBoQuanLy;
use App\CoSoDaoTao;

class SoLieuCanBoQuanLyController extends Controller
{
    protected $soLieuCBQLService;

    public function __construct(
        SoLieuCanBoQuanLyService $soLieuCanBoQuanLyService
    ) {
        $this->soLieuCBQLService = $soLieuCanBoQuanLyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filterConfig = $this->soLieuCBQLService->getFilterConfig();
        $params = request()->except(['limit']);
        $limit = request()->get('paginate_size') ?? config('common.paginate_size.default');

        $data = $this->soLieuCBQLService->getList($params, $limit);
        $data->appends(request()->input())->links();

        // thanh
        $co_so = DB::table('co_so_dao_tao')->get();

        $titles = config('tables.so_lieu_can_bo_quan_ly');
        return view('so_lieu_can_bo_quan_ly.index', [
            'filterConfig' => $filterConfig,
            'data' => $data,
            'limit' => $limit,
            'titles' => $titles,
            'route_edit' => 'so-lieu-can-bo-quan-ly.edit',
            'route_show' => 'so-lieu-can-bo-quan-ly.show',
            'coso' => $co_so,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCoSo = $this->soLieuCBQLService->getListCoSo();
        $listNam = config('common.nam.list');
        $listDot = config('common.dot');

        return view('so_lieu_can_bo_quan_ly.create', [
            'listCoSo' => $listCoSo,
            'listNam' => array_combine($listNam, $listNam),
            'listDot' => array_combine($listDot, $listDot),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->except([
            '_token',
            'loai_hinh_co_so_id',
        ]);

        $soLieuQL = $this->soLieuCBQLService->store($params);

        return redirect()->route('so-lieu-can-bo-quan-ly.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($soLieuId)
    {
        $params = request()->except([
            'paginate_size',
        ]);

        $coSoDaoTao = $this->soLieuCBQLService->getCoSo($soLieuId);

        $limit = request()->get('paginate_size') ?? config('common.paginate_size.default');
        $listSoLieu = $this->soLieuCBQLService->getListByCoSo($coSoDaoTao->id, $limit, $params);

        $listSoLieu->appends(request()->input())->links();

        return view('so_lieu_can_bo_quan_ly.show', [
            'coSoDaoTao' => $coSoDaoTao,
            'listSoLieu' => $listSoLieu,
            'limit' => $limit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SoLieuCanBoQuanLy $soLieuCanBoQuanLy)
    {
        $listCoSo = $this->soLieuCBQLService->getListCoSo();
        $listNam = config('common.nam.list');
        $listDot = config('common.dot');
        $data = array_merge($soLieuCanBoQuanLy->getAttributes(), session()->getOldInput());

        return view('so_lieu_can_bo_quan_ly.edit', [
            'listCoSo' => $listCoSo,
            'listNam' => array_combine($listNam, $listNam),
            'listDot' => array_combine($listDot, $listDot),
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $params = $request->except([
            '_method',
            '_token',
            'co_so_dao_tao_id',
            'loai_hinh_co_so_id',
        ]);

        $result = $this->soLieuCBQLService->updateSoLieu($id, $params);
        return redirect()->route('so-lieu-can-bo-quan-ly.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}