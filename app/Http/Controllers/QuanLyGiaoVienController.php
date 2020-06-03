<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiaoVienService;

class QuanLyGiaoVienController extends Controller
{
    protected $giaoVienService;

    public function __construct(
        GiaoVienService $giaoVienService
    ) {
        $this->giaoVienService = $giaoVienService;
    }

    public function index()
    {
        $filterConfig = $this->giaoVienService->getFilterConfig();
        $limit = request()->get('paginate_size') ?? config('common.paginate_size.default');
        $params = request()->except(['limit']);

        $data = $this->giaoVienService->getList($params, $limit);
        $data->appends(request()->input())->links();

        $titles = config('tables.quan_ly_giao_vien');

        return view('ql_giao_vien.index', [
            'filterConfig' => $filterConfig,
            'data' => $data,
            'limit' => $limit,
            'titles' => $titles,
        ]);
    }
}
