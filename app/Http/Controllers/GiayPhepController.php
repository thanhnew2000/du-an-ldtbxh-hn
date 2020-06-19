<?php

namespace App\Http\Controllers;

use App\Services\CoSoDaoTaoService;
use App\Services\GiayPhepService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class GiayPhepController extends Controller
{
    protected $GiayPhepService;
    protected $CoSoDaoTaoService;
    public function __construct(
        GiayPhepService $GiayPhepService,
        CoSoDaoTaoService $CoSoDaoTaoService
    ) {
        $this->GiayPhepService = $GiayPhepService;
        $this->CoSoDaoTaoService = $CoSoDaoTaoService;
    }

    public function danhSachGiayPhep($id = null)
    {
        $dataCoSoDaoTao = $this->CoSoDaoTaoService->getSingleCsdt($id);
        $defaultCsdt = count($dataCoSoDaoTao) > 0
            ?   [
                'id' => $dataCoSoDaoTao[0]->id,
                'text' => $dataCoSoDaoTao[0]->ma_don_vi . ' - ' . $dataCoSoDaoTao[0]->ten
            ]
            : [];
        $dsCoSo = $this->CoSoDaoTaoService->getAll();
        $data = $this->GiayPhepService->getGiayPhep($id);
        $route_name = Route::current()->action['as'];
        return view('giay-phep.danh-sach-giay-phep', compact('data', 'dsCoSo', 'route_name', 'defaultCsdt'));
    }

    public function themGiayPhep($id = null)
    {
        $co_so_id = $id;
        $dsCoSo = $this->CoSoDaoTaoService->getAll();
        return view('giay-phep.them-giay-phep', compact('dsCoSo', 'co_so_id'));
    }

    public function taoMoiGiayPhep(Request $request)
    {
        // $request->validate(
        //     [
        //         'co_so_id' => 'required',
        //         'ten_giay_phep' => 'required',
        //         'ngay_ban_hanh' => 'required|date_format:d/m/Y',
        //         'ngay_hieu_luc' => 'required|date_format:d/m/Y|after_or_equal:ngay_ban_hanh',
        //         'ngay_het_han' => 'required|date_format:d/m/Y|after:ngay_hieu_luc',
        //         'anh-giay-phep' => 'required|mimes:jpeg,png'
        //     ],
        //     [
        //         'co_so_id.required' => 'Vui lòng chọn cơ sở đào tạo',
        //         'ten_giay_phep.required' => 'Tên giấy phép không được để trống',
        //         'ngay_ban_hanh.require' => 'Vui lòng chọn ngày ban hành',
        //         'ngay_hieu_luc.required' => 'Vui lòng chọn ngày ban hành',
        //         'ngay_hieu_luc.after_or_equal' => 'Ngày hiệu lực phải sau hoặc bằng ngày ban hành',
        //         'ngay_het_han.after' => 'Ngày hết hạn phải sau ngày ban hành'
        //     ]
        // );
        if ($request->hasFile('anh-giay-phep')) {
            $filePath = $request->file('anh-giay-phep')->store('uploads/anh-giay-phep');
            $request->request->set('anh_giay_phep', $filePath);
        }
        $this->GiayPhepService->create($request->except([
            'anh-giay-phep',
            '_token',
        ]));
        return redirect()->route('giay-phep.danh-sach', ['id' => $request->get('co_so_id')])->with('mess-success', 'Đã thêm giấy phép thành công')->withInput();
    }

    public function suaGiayPhep($id)
    {
        $dsCoSo = $this->CoSoDaoTaoService->getAll();
        $data = $this->GiayPhepService->findById($id);
        return view('giay-phep.cap-nhat-giay-phep', compact('dsCoSo', 'data'));
    }

    public function capNhatGiayPhep($id, Request $request)
    {
        $data = $this->GiayPhepService->findById($id);
        if ($request->hasFile('anh-giay-phep')) {
            $filePath = $request->file('anh-giay-phep')->store('uploads/anh-giay-phep');
            $request->request->set('anh_giay_phep', $filePath);
        } else {
            $request->request->set('anh_giay_phep', $data->anh_giay_phep);
        }
        dd($data);
        $this->GiayPhepService->update($id, $request, ['anh-giay-phep', '_token']);
        return redirect()->route('giay-phep.cap-nhat', ['id' => $id]);
    }
}
