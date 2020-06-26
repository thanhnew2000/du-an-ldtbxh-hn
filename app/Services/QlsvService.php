<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\QlsvRepository;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use App\Repositories\SoLieuTuyenSinhInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use Carbon\Carbon;
use Storage;



class QlsvService extends AppService
{
    protected $loaiHinhCoSoRepository;
    protected $QlsvRepository;
    use ExcelTraitService;

    public function getRepository()
    {
        return \App\Repositories\QlsvRepository::class;
    }
    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository,
        SoLieuTuyenSinhInterface $soLieuTuyenSinhRepository
    )
    {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;
        $this->soLieuTuyenSinhRepository = $soLieuTuyenSinhRepository;
        // $this->soLieuTuyenSinhRepository = $soLieuTuyenSinhRepository;
    }

    public function getQlsv($params = [])
    {
        if(!isset($params['nam'])) $params['nam'] = null;
        if(!isset($params['dot'])) $params['dot'] = null;
        if(!isset($params['co_so_id'])) $params['co_so_id'] = null;
        if(!isset($params['nghe_id'])) $params['nghe_id'] = null;
        if(!isset($params['loai_hinh'])) $params['loai_hinh'] = null;
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');

        
       $data =  $this->repository->getQlsv($params);
    //    dd($data);
       return $data;
    }
    public function suaSoLieuSv($id){
        return $this->repository->suaSoLieuQlsv($id);
    }

    public function getLoaiHinh(){
        return $this->loaiHinhCoSoRepository->getAll();
    }
    public function getCoSo(){
        return $this->repository->getCoSo();
    }
    public function getNganhNghe($ma_cap_nghe){
        return $this->repository->getNganhNghe($ma_cap_nghe);
    }
    public function getTongHopSvTheoLoaiHinh($id){
        $data = $this->repository->getTongHopSvTheoLoaiHinh($id);
        return $data;
    }
    public function chiTietSoLieuQlsv($coSoId,$params){
        
       
        if(!isset($params['nam'])) $params['nam'] = null;
        if(!isset($params['dot'])) $params['dot'] = null;
        if(!isset($params['nghe_id'])) $params['nghe_id'] = null;
        if(!isset($params['devvn_quanhuyen'])) $params['devvn_quanhuyen'] = null;
        if(!isset($params['devvn_xaphuongthitran'])) $params['devvn_xaphuongthitran'] = null;
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        // $queryData['cs_id'] = isset($param['co_so_id']) ? $param['co_so_id'] : null;
        // $queryData['loai_hinh'] = isset($param['loai_hinh']) ? $param['loai_hinh'] : null;
        $data = $this->repository->chiTietSoLieuQlsv($coSoId,$params);
        return $data;
        //  dd($data);
    }
    public function getNamDaoTao(){
        return $this->repository->getNamDaoTao();
    }
    public function getCoSoDaoTao(){
        return $this->repository->getCoSoDaoTao();
    }

    public function getTenQuanHuyen(){
        return $this->repository->getTenQuanHuyen();
    }
    public function getTenXaPhuongTheoQuanHuyen($id){
        return $this->repository->getTenXaPhuongTheoQuanHuyen($id);
    }

    public function getMaNganhNghe(){
        return $this->repository->getMaNganhNghe();
    }

    // thanhv update 6/25/2020

    public function exportBieuMau($id_coso){
    $spreadsheet =IOFactory::load('file_excel/hssv/bieu-mau-hs-dang-ql.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    $co_so = DB::table('co_so_dao_tao')->where('id',$id_coso)->first();
    $worksheet->setCellValue('C8', "Trường: $co_so->ten - $id_coso");

    $loai_truong = $this->bacDaoTaoOfTruong($co_so->loai_truong);
    $worksheet->setCellValue('C7', $loai_truong);

    $worksheet->getStyle("A7:AA7")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');
    $worksheet->getStyle("A8:AA8")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');

    $worksheet->getColumnDimension('C')->setAutoSize(true);
    // lấy nghề của cơ sở đó đăng ký
     //  tạo khóa đê khóa các dòng
     $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
     $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);

     $worksheet->getStyle('C8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
     $worksheet->getStyle('C7')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

     $co_so_nghe = $this->soLieuTuyenSinhRepository->getmanganhnghe($id_coso);

     $row=8;
     foreach($co_so_nghe as $cs_n){
         $row ++;
         $worksheet->setCellValue('B'.$row, $cs_n->id);
         $worksheet->setCellValue('C'.$row, $cs_n->ten_nganh_nghe);    
        
         $keyDanhDau = $this->danhDauloaiHinhCoSo($co_so->ma_loai_hinh_co_so);
         $worksheet->setCellValue($keyDanhDau.$row, 'x');
         //  khóa dòng ko cho chọn
         $arrayLock =['B'.$row,'C'.$row,'D'.$row,'E'.$row,'F'.$row,'G'.$row];
         $this->lockedCellInExcel($worksheet,$arrayLock);

     };

    $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="file-template.xlsx"');
    $writer->save("php://output");
  }


  public function exportData($id_truong,$nam_muon_xuat,$dot_muon_xuat){
    $spreadsheet = IOFactory::load('file_excel/hssv/bieu-mau-hs-dang-ql.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    
    $cs_nganh_nghe=  $this->soLieuTuyenSinhRepository->getmanganhnghe($id_truong);
 
    $co_so = DB::table('co_so_dao_tao')->where('id', $id_truong)->first();
    
    $worksheet->setCellValue('C8','Trường: '.$co_so->ten.' - '.$id_truong);
     // TẠO KHÓA
     $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
     $spreadsheet->getDefaultStyle()->getProtection()->setLocked(true);
   
     $loai_truong = $this->bacDaoTaoOfTruong($co_so->loai_truong);
     $worksheet->setCellValue('C7', $loai_truong);

     $worksheet->getColumnDimension('C')->setAutoSize(true);

     $sv_dang_quan_ly = $this->repository->getSvdqlJoinNganhNgheNamDot($id_truong,$nam_muon_xuat,$dot_muon_xuat);

     $arrayAphabe=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA'];

    $row=8;
    foreach($sv_dang_quan_ly as $sv_d_ql){
        $row ++;
        // border đen các ô
        foreach($arrayAphabe as $apha){
            $worksheet->getStyle($apha.$row)
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);
        }

        $keyDanhDau = $this->danhDauloaiHinhCoSo($co_so->ma_loai_hinh_co_so);
        $worksheet->setCellValue($keyDanhDau.$row, 'x');

        $worksheet->setCellValue('B'.$row, $sv_d_ql->nghe_id);
        $worksheet->setCellValue('C'.$row, $sv_d_ql->ten_nganh_nghe);

        $worksheet->setCellValue('H'.$row, $sv_d_ql->tong_so_HSSV_co_mat_cac_trinh_do);
        $worksheet->setCellValue('I'.$row, $sv_d_ql->tong_so_nu);
        $worksheet->setCellValue('J'.$row, $sv_d_ql->tong_so_dan_toc_thieu_so);
        $worksheet->setCellValue('K'.$row, $sv_d_ql->tong_so_ho_khau_HN);
       
        $worksheet->setCellValue('L'.$row, $sv_d_ql->so_luong_sv_Cao_dang);
        $worksheet->setCellValue('M'.$row, $sv_d_ql->so_luong_sv_nu_Cao_dang);
        $worksheet->setCellValue('N'.$row, $sv_d_ql->so_luong_sv_dan_toc_Cao_dang);
        $worksheet->setCellValue('O'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_Cao_dang);
        $worksheet->setCellValue('P'.$row, $sv_d_ql->so_luong_sv_Trung_cap);
        $worksheet->setCellValue('Q'.$row, $sv_d_ql->so_luong_sv_nu_Trung_cap);

        $worksheet->setCellValue('R'.$row, $sv_d_ql->so_luong_sv_dan_toc_Trung_cap);
        $worksheet->setCellValue('S'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_Trung_cap);
        $worksheet->setCellValue('T'.$row, $sv_d_ql->so_luong_sv_So_cap);
        $worksheet->setCellValue('U'.$row, $sv_d_ql->so_luong_sv_nu_So_cap);
        $worksheet->setCellValue('V'.$row, $sv_d_ql->so_luong_sv_dan_toc_So_cap);
        $worksheet->setCellValue('W'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_So_cap);
        $worksheet->setCellValue('X'.$row, $sv_d_ql->so_luong_sv_he_khac);
        $worksheet->setCellValue('Y'.$row, $sv_d_ql->so_luong_sv_nu_khac);
        $worksheet->setCellValue('Z'.$row, $sv_d_ql->so_luong_sv_dan_toc_khac);
        $worksheet->setCellValue('AA'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_khac);
    }

    $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     header('Content-Disposition: attachment; filename="file-xuat.xlsx"');
     $writer->save("php://output");

}

public function importFile($fileRead, $duoiFile, $year, $dot){
    $message='';
    $spreadsheet = $this->createSpreadSheet($fileRead,$duoiFile);
    $data =$spreadsheet->getActiveSheet()->toArray();

    $truong = explode(' - ', $data[7][2]);
    $id_truong = array_pop($truong);

    $csCheck = DB::table('co_so_dao_tao')->find($id_truong);
    if($csCheck == null){
        $message='noCorrectIdTruong';
        return $message;  
    }
    $error=[];
    $vitri=[];
    $arrayAphabel=['H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA'];

    $co_so_nghe = $this->soLieuTuyenSinhRepository->getmanganhnghe($id_truong);

    $sv_ql_da_co =  DB::table('sv_dang_quan_ly')->where('co_so_id', '=', $id_truong)
    ->where('nam','=',$year)
    ->where('dot','=',$dot)
    ->select('id','nghe_id')->get();

    $id_nghe_svql_da_co=[];
    for($i=0;$i < count($sv_ql_da_co); $i++){
        $id_nghe_svql_da_co[$sv_ql_da_co[$i]->nghe_id] = $sv_ql_da_co[$i]->id;
    }

    $id_nghe_of_cs =[];
    foreach($co_so_nghe as $csn){
    array_push($id_nghe_of_cs,$csn->id);
    }
   
    $vitri=$this->checkError($data, $arrayAphabel, 8 , 7, 26);

    if(count($vitri) > 0 ){
        $message='errorkitu';
        return $message;  
    }

    $arrayData=[];
    $updateData=[];
    $insertData=[];
    $soDongNgNhap=(count($data) - 8);
    if($soDongNgNhap == count($co_so_nghe)){
        if($vitri == null || $vitri == ''){
            for($i = 8; $i < count($data); $i++){ 
                $id_nghe_nhap = $data[$i][1];
                if(in_array($id_nghe_nhap,$id_nghe_of_cs)){
                        $arrayData=[
                        'nam'=>$year,
                        'dot'=>$dot,
                        'nghe_id'=>$data[$i][1],
                        'co_so_id'=>$id_truong,
                        'id_loai_hinh'=>$csCheck->ma_loai_hinh_co_so,

                        'tong_so_HSSV_co_mat_cac_trinh_do'=>$data[$i][7],
                        'tong_so_nu'=>$data[$i][8],
                        'tong_so_dan_toc_thieu_so'=>$data[$i][9],
                        'tong_so_ho_khau_HN'=>$data[$i][10],

                        'so_luong_sv_Cao_dang'=>$data[$i][11],
                        'so_luong_sv_nu_Cao_dang'=>$data[$i][12],
                        'so_luong_sv_dan_toc_Cao_dang'=>$data[$i][13],
                        'so_luong_sv_ho_khau_HN_Cao_dang'=>$data[$i][14],

                        'so_luong_sv_Trung_cap'=>$data[$i][15],
                        'so_luong_sv_nu_Trung_cap'=>$data[$i][16],
                        'so_luong_sv_dan_toc_Trung_cap'=>$data[$i][17],
                        'so_luong_sv_ho_khau_HN_Trung_cap'=>$data[$i][18],

                        'so_luong_sv_So_cap'=>$data[$i][19],
                        'so_luong_sv_nu_So_cap'=>$data[$i][20],
                        'so_luong_sv_dan_toc_So_cap'=>$data[$i][21],
                        'so_luong_sv_ho_khau_HN_So_cap'=>$data[$i][22],
                        
                        'so_luong_sv_he_khac'=>$data[$i][23],
                        'so_luong_sv_nu_khac'=>$data[$i][24],
                        'so_luong_sv_dan_toc_khac'=>$data[$i][25],
                        'so_luong_sv_ho_khau_HN_khac'=>$data[$i][26],

                        'thoi_gian_cap_nhat'=>Carbon::now(),
                        ];

                    if(array_key_exists($data[$i][1],$id_nghe_svql_da_co)){
                        $updateData[$id_nghe_svql_da_co[$data[$i][1]]]=$arrayData;
                    }else{
                        array_push($insertData,$arrayData); 
                    }
                }else if(in_array($id_nghe_nhap,$id_nghe_of_cs) == false){
                    $message='ngheKoThuocTruong';
                    return $message; 
                };
            } 
            if (count($updateData) > 0) {
            foreach($updateData as $key => $value)
                 $this->repository->updateQlSinhVienDangTheoHoc($key,$value);
                // DB::table('sv_dang_quan_ly')->where('id',$key)->update($value);
            }  
            if (count($insertData) > 0) {
                $this->repository->createQlSinhVienDangTheoHoc($insertData);
                // DB::table('sv_dang_quan_ly')->insert($insertData);
            }    
            $message='ok';
            return $message;  
        }
    }else if($soDongNgNhap != count($co_so_nghe)){
        $message='NgheUnsign';
        return $message; 
    }
}

    public function importError($fileRead,$duoiFile,$path){
        $fileReadStorage = storage_path('app\public\\'.$path);
    
        $spreadsheet = $this->createSpreadSheet($fileReadStorage,$duoiFile);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $truong = explode(' - ', $data[7][2]);
        $id_truong = array_pop($truong);

        $arrayAphabel=['H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA'];

        $vitri = $this->checkError($data, $arrayAphabel, 8 , 7, 26);

        $spreadsheet2 = IOFactory::load($fileReadStorage);
        $worksheet = $spreadsheet2->getActiveSheet();
        Storage::delete($path);

        $this->errorRebBackGroud($vitri,$worksheet);
        
        $writer = IOFactory::createWriter($spreadsheet2, "Xlsx"); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="error.xlsx"');
        $writer->save("php://output");
    } 



  
}