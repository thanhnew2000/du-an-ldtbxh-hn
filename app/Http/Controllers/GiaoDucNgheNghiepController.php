<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\GiaoDucNgheNghiepService;
use Storage;

class GiaoDucNgheNghiepController extends Controller
{
    protected $GiaoDucNgheNghiepService;
    public function __construct(GiaoDucNgheNghiepService $GiaoDucNgheNghiepService)
    {
        $this->GiaoDucNgheNghiepService = $GiaoDucNgheNghiepService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = request()->all();
        if(isset(request()->page_size)){
            $limit = request()->page_size;
        }else{
            $limit = 20;
        }
        $data = $this->GiaoDucNgheNghiepService->index($params,$limit);
        $coso = $this->GiaoDucNgheNghiepService->getTenCoSoDaoTao();
        $quanhuyen = $this->GiaoDucNgheNghiepService->getTenQuanHuyen();
        $nghe_cap_2 = $this->GiaoDucNgheNghiepService->getNganhNghe(2);
        if(isset(request()->devvn_quanhuyen)){
            $xaphuongtheoquanhuyen = $this->GiaoDucNgheNghiepService->getXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        }else{
            $xaphuongtheoquanhuyen=[];
        }
        
            $nghe_cap_3=$this->GiaoDucNgheNghiepService->getNganhNghe(3);
            $nghe_cap_4=$this->GiaoDucNgheNghiepService->getNganhNghe(4);


        $loaiHinh = $this->GiaoDucNgheNghiepService->getListLoaiHinh();
        $data->appends(request()->input())->links();
        return view('giao_duc_nghe_nghiep.index', [
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('giao_duc_nghe_nghiep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('giao_duc_nghe_nghiep.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('giao_duc_nghe_nghiep.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    // thanhnv 6/24/2020

    public function exportBieuMau(Request $request){
        $id_co_so = $request->id_cs;
        $this->GiaoDucNgheNghiepService->exportBieuMau($id_co_so);
    }

    public function exportData(Request $request){
        $listCoSoId = $request->truong_id;
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

        $changeFrom = strtotime($dateFrom); 
        $fromDate = date("Y-m-d", $changeFrom);

        $changeTo = strtotime($dateTo); 
        $toDate = date("Y-m-d", $changeTo);
        $this->GiaoDucNgheNghiepService->exportData($listCoSoId ,$fromDate,$toDate);
    }

    public function importFile(Request $request){
        $dot=$request->dot;
        $year=$request->nam;
        $nameFile=$request->file->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);
        
        $fileRead = $_FILES['file']['tmp_name'];
        $kq =  $this->GiaoDucNgheNghiepService->importFile($fileRead, $duoiFile, $year, $dot);

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
        $path = str_replace('/', '\\', $pathLoad);  
        $this->GiaoDucNgheNghiepService->importError($fileRead, $duoiFile,$path);
    }
}
