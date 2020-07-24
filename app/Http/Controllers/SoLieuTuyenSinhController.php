<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\SoLieuTuyenSinh\StoreRequest;
use App\Http\Requests\SoLieuTuyenSinh\UpdateRequest;
use App\Services\SoLieuTuyenSinhService;


use App\Http\Requests\Excel\ExportDuLieu;
use Storage;

class SoLieuTuyenSinhController extends Controller
{

    protected $SoLieuTuyenSinhService;

    public function __construct(SoLieuTuyenSinhService $SoLieuTuyenSinhService)
    {
        $this->SoLieuTuyenSinhService = $SoLieuTuyenSinhService;
    }

    public function index()
    {
        $params = request()->all();
        if (isset(request()->page_size)) {
            $limit = request()->page_size;
        } else {
            $limit = 20;
        }

        $data = $this->SoLieuTuyenSinhService->getSoLuongTuyenSinh($params, $limit);
        // dd($data);
        $coso = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        $quanhuyen = $this->SoLieuTuyenSinhService->getTenQuanHuyen();
        $nghe_cap_2 = $this->SoLieuTuyenSinhService->getNganhNghe(2);
        if (isset(request()->devvn_quanhuyen)) {
            $xaphuongtheoquanhuyen = $this->SoLieuTuyenSinhService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        } else {
            $xaphuongtheoquanhuyen = [];
        }

        $nghe_cap_3 = $this->SoLieuTuyenSinhService->getNganhNghe(3);
        $nghe_cap_4 = $this->SoLieuTuyenSinhService->getNganhNghe(4);

        $loaiHinh = $this->SoLieuTuyenSinhService->getListLoaiHinh();
        $data->appends(request()->input())->links();
        // dd($params);
        return view('solieutuyensinh.tong_hop_so_lieu_tuyen_sinh', [
            'data' => $data,
            'loaiHinh' => $loaiHinh,
            'limit' => $limit,
            'coso'=> $coso,
            'quanhuyen' => $quanhuyen,
            'params' => $params,
            'xaphuongtheoquanhuyen' => $xaphuongtheoquanhuyen,
            'nghe_cap_2' => $nghe_cap_2,
            'nghe_cap_3' => $nghe_cap_3,
            'nghe_cap_4' => $nghe_cap_4
        ]);
    }

    public function exportBieuMau(Request $request){
        $id_co_so = $request->id_cs;
        $this->SoLieuTuyenSinhService->exportBieuMau($id_co_so);
    }

    public function exportData(ExportDuLieu $request){
        $listCoSoId = $request->truong_id;
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

        $changeFrom = strtotime($dateFrom); 
        $fromDate = date("Y-m-d", $changeFrom);

        $changeTo = strtotime($dateTo); 
        $toDate = date("Y-m-d", $changeTo);
        $this->SoLieuTuyenSinhService->exportData($listCoSoId ,$fromDate,$toDate);
    }

    public function importFile(Request $request){
        $dot=$request->dot;
        $year=$request->nam;
        $nameFile=$request->file->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);
        
        $fileRead = $_FILES['file']['tmp_name'];
        $kq =  $this->SoLieuTuyenSinhService->importFile($fileRead, $duoiFile, $year, $dot);

        if($kq=='errorkitu'){
                return response()->json('exportError',200);   
        }else if($kq=='ok'){
                return response()->json('ok',200); 
        }else if($kq=='NgheUnsign'){
                return response()->json(['messageError' => ' Số lượng nghề không phù hợp với nghề đã đăng kí' ],200);   
        }else if($kq=='noCorrectIdTruong'){
            return response()->json(['messageError' => ' Trường không đúng hãy nhập lại' ],200);   
        }else if($kq=='ngheKoThuocTruong'){
            return response()->json(['messageError' => 'Có nghề không thuộc trong trường' ],200);   
        }else{
            return response()->json(['messageError' => $kq ],200);   
        }
    }

    public function importError(Request $request){
        $dot=$request->dot;
        $year=$request->nam;

        $nameFile=$request->file_import->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);

        $fileRead = $_FILES['file_import']['tmp_name'];
        $pathLoad = Storage::putFile(
            'uploads/excels',
            $request->file('file_import')
        );
        $this->SoLieuTuyenSinhService->importError($fileRead, $duoiFile,$pathLoad);
    }

    
    public function exportFollowSreach(Request $request){
        $params = $request->all();
        $data = $this->SoLieuTuyenSinhService->exportFollowSreach($params);
    }

    public function themSoLieuTuyenSinh(){
        $co_so = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        return view('solieutuyensinh.them_so_lieu_tuyen_sinh',compact('co_so'));
    }

    public function getNganhNgheHavePhanLoaiFolowCoSo(Request $request){
        $id = $request->id;
        $datanghe = $this->SoLieuTuyenSinhService->getNganhNgheHavePhanLoaiFolowCoSo($id);
        // dd($datanghe);
        return $datanghe;
    }

    public function getNganhNgheDaNhapOfCoSo(Request $request){
        $id_co_so = $request->id;
        $dot = $request->dot;
        $year = $request->year;
        $datanghe =  $this->SoLieuTuyenSinhService->getNganhNgheDaNhapOfCoSo($id_co_so,$dot,$year);
        return $datanghe;
    }

    public function getNganhNgheOneOfCoSo(Request $request){
        $id_co_so = $request->id;
        $nghe_id = $request->id_nghe_chon;
        $year = $request->year;
        $dot = $request->dot;
        $datanghe =  $this->SoLieuTuyenSinhService->getNganhNgheOneOfCoSo($id_co_so,$nghe_id,$year,$dot);
        return $datanghe;
    }

    public function store(StoreRequest $request){
        // dd($request->all());
        $id_co_so = $request->co_so_id;
        $nghe_id = $request->nghe_id;
        $year = $request->year;
        $dot = $request->dot;
        $attributes = $request->all();

        $resurt = $this->SoLieuTuyenSinhService->updateAndCreateTuyenSinh($id_co_so,$nghe_id,$year,$dot,$attributes);
        // $co_so = $this->SoLieuTuyenSinhService->getTenCoSoDaoTao();
        return redirect()->route('tuyen-sinh.them-so-lieu-tuyen-sinh')->with('thongbao', 'Cập nhập thành công');;
        // return view('solieutuyensinh.them_so_lieu_tuyen_sinh',compact('co_so'));
    }

    public function getTuyenSinhByNghe(Request $request){
        $id_co_so = $request->id;
        $datanghe =  $this->SoLieuTuyenSinhService->getNganhNgheDaNhapOfCoSo($id_co_so);
        return $datanghe;
    }


}
