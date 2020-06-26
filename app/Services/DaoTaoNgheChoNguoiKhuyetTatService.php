<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\AppService;
use App\Repositories\DaoTaoNgheChoNguoiKhuyetTatRepository;
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

class DaoTaoNgheChoNguoiKhuyetTatService extends AppService
{
    protected $LoaiHinhCoSoRepositoryInterface;
    protected $DaoTaoNgheChoThanhNienReponsitory;
    use ExcelTraitService;

    public function __construct(
        LoaiHinhCoSoRepositoryInterface $loaiHinhCoSoRepository,
        SoLieuTuyenSinhInterface $soLieuTuyenSinhRepository

    ) {
        parent::__construct();
        $this->loaiHinhCoSoRepository = $loaiHinhCoSoRepository;
        $this->soLieuTuyenSinhRepository = $soLieuTuyenSinhRepository;

    }

    public function getRepository()
    {
        return DaoTaoNgheChoNguoiKhuyetTatRepository::class;
    }

    public function getListLoaiHinh()
    {
        return $this->loaiHinhCoSoRepository->getAll();
    }

    public function index($params = [], $limit)
    {
        $queryData = [];
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : (Carbon::now()->month < 6 ? 1 : 2);
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : Carbon::now()->year;
        $queryData['co_so_id'] = isset($params['co_so_id']) ? $params['co_so_id'] : null;
        $queryData['loai_hinh'] = isset($params['loai_hinh']) ? $params['loai_hinh'] : null;
        $queryData['devvn_quanhuyen'] = isset($params['devvn_quanhuyen']) ? $params['devvn_quanhuyen'] : null;
        $queryData['devvn_xaphuongthitran'] = isset($params['devvn_xaphuongthitran']) ? $params['devvn_xaphuongthitran'] : null;
        $queryData['nghe_cap_2'] = isset($params['nghe_cap_2']) ? $params['nghe_cap_2'] : null;

        if(isset($params['nghe_cap_3'])){
            $queryData['nghe_cap_2']=null;
            $queryData['nghe_cap_3']=$params['nghe_cap_3'];
        }else{
            $queryData['nghe_cap_3']=null;
        }

        if(isset($params['nghe_cap_4'])){
            $queryData['nghe_cap_2']=null;
            $queryData['nghe_cap_3']=null;
            $queryData['nghe_cap_4']=$params['nghe_cap_4'];
        }else{
            $queryData['nghe_cap_4']=null;
        }
        // dd($queryData);
        $data = $this->repository->index($queryData, $limit);

        return $data;
    }
    // quảng - 15/6 lấy tên cở sở đào tạo
    public function getTenCoSoDaoTao()
    {
        return $this->repository->getTenCoSoDaoTao();
    }

     // quảng - 15/6 lấy  cơ sở theo loại hình
     public function getCoSoTuyenSinhTheoLoaiHinh($id)
     {
         $data = $this->repository->getCoSoTuyenSinhTheoLoaiHinh($id);
         return $data;
     }
     public function getTenQuanHuyen()
     {
         return  $this->repository->getTenQuanHuyen();
     }
     public function getXaPhuongTheoQuanHuyen($id)
     {
         return  $this->repository->getXaPhuongTheoQuanHuyen($id);
     }
     
     // quảng - 15/6 lấy tất cả ngành nghề theo từng cấp bậc
     public function getNganhNghe($ma_cap_nghe)
     {
         return  $this->repository->getNganhNghe($ma_cap_nghe);
     }

     // quảng - 15/6  lọc ngành nghề theo từng cấp bậc
     public function getNgheTheoCapBac($id, $cap_nghe)
     {
         return  $this->repository->getNgheTheoCapBac($id, $cap_nghe);
     }

     public function getThongTinCoSo($coSoId)
     {
         return  $this->repository->getThongTinCoSo($coSoId);
     }

     public function getChiTietDaoTaoNgheChoNguoiKhuyetTat($coSoId, $limit, $params)
    {
        $queryData = [];
        $queryData['nam'] = isset($params['nam']) ? $params['nam'] : null;
        $queryData['dot'] = isset($params['dot']) ? $params['dot'] : null;
        $data = $this->repository->getChiTietDaoTaoNgheChoNguoiKhuyetTat($coSoId, $limit, $queryData);
        return $data;
    // dd($data);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function getNganhNgheThuocCoSo($id)
    {
        return $this->repository->getNganhNgheThuocCoSo($id);
    }

    public function getCheckTonTaiDaoTaoChoNguoiKhuyetTat($data, $requestParams)
    {
        $checkResult = $this->getSoLieu($data);
        unset($requestParams['_token']);
        $route = route('nhapbc.dao-tao-khuyet-tat.create');
        $message = $checkResult == 'tontai' ?
            'Số liệu tuyển sinh đã tồn tại và được phê duyệt' :
            'Số liệu tuyển sinh đã tồn tại';
        
        if (!isset($checkResult)) {
            $data = $this->repository->store($requestParams);
            $message = 'Thêm số liệu tuyển sinh thành công';
            $route = route('nhapbc.dao-tao-khuyet-tat.show', [
                'id' => $requestParams['co_so_id'],
            ]);
        }

        return [
            'route' => $route,
            'message' => $message,
        ];
    }

    public function getSoLieu($data)
    {
        $dataCheckNew = $this->constructConditionParams($data);

        return $this->repository->getCheckTonTaiDaoTaoChoNguoiKhuyetTat($dataCheckNew);
    }

    protected function constructConditionParams($params)
    {
        $conditionData = [];
        foreach ($params as $item) {
            $conditionData[] = [
                $item['id'],
                '=',
                $item['value'],
            ];
        }

        return $conditionData;
    }

    // thanhnv import export 6/18/2020


    public function sumRowInExcel($worksheet,$row){
        $worksheet->setCellValue("C{$row}", "=SUM(D{$row}:E{$row})");
        $worksheet->setCellValue("F{$row}", "=SUM(G{$row}:H{$row})");
        $worksheet->setCellValue("I{$row}", "=SUM(J{$row}:L{$row})");
    }

    public function exportFillRow($worksheet, $row, $n_khuyettat){

        $worksheet->setCellValue('B'.$row, $n_khuyettat->ten_nganh_nghe.' - '.$n_khuyettat->nghe_id);
        $worksheet->setCellValue('C'.$row, $n_khuyettat->tong_tuyen_sinh);

        $worksheet->setCellValue('D'.$row, $n_khuyettat->tuyen_sinh_nu);
        $worksheet->setCellValue('E'.$row, $n_khuyettat->tuyen_sinh_ho_khau_HN);
        $worksheet->setCellValue('F'.$row, $n_khuyettat->tong_tot_nghiep);

        $worksheet->setCellValue('G'.$row, $n_khuyettat->tot_nghiep_nu);
        $worksheet->setCellValue('H'.$row, $n_khuyettat->tot_nghiep_ho_khau_HN);
  
        $worksheet->setCellValue('I'.$row, number_format($n_khuyettat->tong_ngan_sach));
        $worksheet->setCellValue('J'.$row, number_format($n_khuyettat->ngan_sach_TW));
        $worksheet->setCellValue('K'.$row, number_format($n_khuyettat->ngan_sach_TP));
        $worksheet->setCellValue('L'.$row, number_format($n_khuyettat->ngan_sach_khac));

    }
    public function exportBieuMau($id_coso){
        $co_so = DB::table('co_so_dao_tao')->where('id', $id_coso)->first();
        $spreadsheet = IOFactory::load('file_excel/bm11/bm11.xlsx');

        $bacDaoTao = $this->bacDaoTaoOfTruong($co_so->loai_truong);

        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValue('B5', $bacDaoTao);
        $worksheet->setCellValue('B6', "Trường: $co_so->ten - $id_coso");
        
        $worksheet->getStyle("B5")->getFont()->setBold(true);
        $worksheet->getStyle("B6")->getFont()->setBold(true);
        // tô nâu nền trường
        $worksheet->getStyle("A5:L5")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');
        $worksheet->getStyle("A6:L6")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');
        $worksheet->getColumnDimension('B')->setAutoSize(true);

        $co_so_nghe = $this->soLieuTuyenSinhRepository->getmanganhnghe($id_coso);
        
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);

        $arrayLock =['C','F','I','B'];
        $this->lockedCellInExcel($worksheet,$arrayLock);

        $row=6;
        foreach($co_so_nghe as $cs_n){
            $row ++;
            $worksheet->setCellValue('B'.$row, $cs_n->ten_nganh_nghe.' - '.$cs_n->id);
            $this->sumRowInExcel($worksheet,$row);
        };

        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
        $writer->save("php://output");


    }

    public function exportData($listCoSoId,$year,$dot){

        $spreadsheet = IOFactory::load('file_excel/bm11/bm11.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(true);
        $worksheet->getColumnDimension('B')->setAutoSize(true);
        $worksheet->getColumnDimension('C')->setAutoSize(true);

        $arrayAphabe=['A','B','C','D','E','F','G','H','I','J','K','L'];

        if(in_array('all',$listCoSoId)){
            $listCoSoDaoTao =  DB::table('co_so_dao_tao')
            ->orderBy('loai_truong', 'asc')
            ->get();
        }else{
            $listCoSoDaoTao =  DB::table('co_so_dao_tao')->whereIn('id', $listCoSoId)
            ->orderBy('loai_truong', 'asc')
            ->get();
        }

        $row=4;  
        $bacDaoTao = 'TRƯỜNG CAO ĐẲNG';
        $bacDaoTaoId = 0;
        foreach($listCoSoDaoTao as $co_s){
        $row++;
        
            $dao_tao_cho_nguoi_khuyet_tat = $this->repository->getKhuyetTatCsNamDot($co_s->id,$year,$dot);
            
            if ($co_s->loai_truong !== $bacDaoTaoId) {
                $bacDaoTaoId = $co_s->loai_truong;

                $bacDaoTao = $this->bacDaoTaoOfTruong($co_s->loai_truong);

              $worksheet->setCellValue('B' . $row, $bacDaoTao);

                $worksheet->getStyle("B{$row}")->getFont()->setBold(true);
                $lockRange = "A{$row}:L{$row}";
                $worksheet->getStyle($lockRange)
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('C7C7C7');

                $worksheet->getStyle($lockRange)
                    ->getProtection()
                    ->setLocked(Protection::PROTECTION_PROTECTED);
            $row++;
          }
          
            $worksheet->setCellValue("B{$row}",'Trường: '.$co_s->ten.' - '.$co_s->id);
            $worksheet->getStyle("B{$row}")->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle("B{$row}")->getFont()->setBold(true);
            // tô nâu nền trường
            $worksheet->getStyle("A{$row}:L{$row}")
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C7C7C7');

            foreach($dao_tao_cho_nguoi_khuyet_tat as $dt_nkhuyettat){
                $row++;
                // border cac o
                foreach($arrayAphabe as $apha){
                    $worksheet->getStyle($apha.$row)
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THIN);
                }
                // fill data
                $this->exportFillRow($worksheet, $row , $dt_nkhuyettat);
                }
                
         }
         $writer =IOFactory::createWriter($spreadsheet, "Xlsx");
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="file-xuat.xlsx"');
         $writer->save("php://output");
    }


    
    public function importFile($fileRead, $duoiFile, $year, $dot){
        $message='';
        $spreadsheet = $this->createSpreadSheet($fileRead,$duoiFile);
        $data =$spreadsheet->getActiveSheet()->toArray();
        
        $truong = explode(' - ', $data[5][1]);
        $id_truong = array_pop($truong);
        
        $arrayApha=['C','D','E','F','G','H','I','J','K','L'];
        $csCheck = DB::table('co_so_dao_tao')->find($id_truong);

        $co_so_nghe = $this->soLieuTuyenSinhRepository->getmanganhnghe($id_truong);

        if($csCheck == null){
            $message='noCorrectIdTruong';
            return $message;  
        }
        $id_nghe_of_cs =[];
        foreach($co_so_nghe as $csn){
          array_push($id_nghe_of_cs,$csn->id);
        }

        $khuyet_tat_da_co = $this->repository->getKhuyetTatCsNamDotNoJoin($id_truong,$year,$dot);

        $id_nghe_nguoi_khuyet_tat_da_co=[];
        for($i=0;$i < count($khuyet_tat_da_co); $i++){
            $id_nghe_nguoi_khuyet_tat_da_co[$khuyet_tat_da_co[$i]->nghe_id] = $khuyet_tat_da_co[$i]->id;
        }
        
        $vitri  = $this->checkError($data,$arrayApha,6,2,11);

        if(count($vitri) > 0 ){
                  $message='errorkitu';
                  return $message;  
         }

         $arrayData=[];
         $insertData=[];
         $updateData=[];
         $soDongNgNhap=(count($data) - 6);
         if($soDongNgNhap == count($co_so_nghe)){
             if($vitri == null || $vitri == ''){
                 for($i = 6; $i < count($data); $i++){ 

                    $nghe = explode(' - ', $data[$i][1]);
                    $id_nghe_nhap = array_pop($nghe);
                       if(in_array($id_nghe_nhap,$id_nghe_of_cs)){
                         $arrayData=[
                             'nam'=>$year,
                             'dot'=>$dot,
                             'nghe_id'=>$id_nghe_nhap,
                             'co_so_id'=>$id_truong,

                             'tong_tuyen_sinh'=>$data[$i][2],
                             'tuyen_sinh_nu'=>$data[$i][3],
                             'tuyen_sinh_ho_khau_HN'=>$data[$i][4],
                             'tong_tot_nghiep'=>$data[$i][5],
                             'tot_nghiep_nu'=>$data[$i][6],
                             'tot_nghiep_ho_khau_HN'=>$data[$i][7],

                             'tong_ngan_sach'=>$data[$i][8],
                             'ngan_sach_TW'=>$data[$i][9],
                             'ngan_sach_TP'=>$data[$i][10],
                             'ngan_sach_khac'=>$data[$i][11],
 
                         ];
                           if(array_key_exists($id_nghe_nhap,$id_nghe_nguoi_khuyet_tat_da_co)){
                             $updateData[$id_nghe_nguoi_khuyet_tat_da_co[$id_nghe_nhap]]=$arrayData;
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
                     DB::table('ket_qua_dao_tao_nguoi_khuyet_tat')->where('id',$key)->update($value);
                    $this->repository->updateDtNguoiKhuyetTat($key,$value);

                 }  
 
                 if (count($insertData) > 0) {
                    $this->repository->createDtNguoiKhuyetTat($insertData);
                    //  DB::table('ket_qua_dao_tao_nguoi_khuyet_tat')->insert($insertData);
                 }    
 
                  $message='ok';
                  return $message;  
             }
         }else if($soDongNgNhap != count($co_so_nghe)){
             $message='NgheUnsign';
             return $message; 
         }
        
    }

    public function importError($fileRead,$duoiFile){

        $spreadsheet = $this->createSpreadSheet($fileRead,$duoiFile);

        $data = $spreadsheet->getActiveSheet()->toArray();

        $truong = explode(' - ', $data[5][1]);
        $id_truong = array_pop($truong);
        $co_so = DB::table('co_so_dao_tao')->where('id',$id_truong)->first();
        $arrayApha=['C','D','E','F','G','H','I','J','K','L'];

        $vitri  = $this->checkError($data,$arrayApha,6,2,11);

        $spreadsheet2 = IOFactory::load('file_excel/bm11/bm11.xlsx');
        $worksheet = $spreadsheet2->getActiveSheet();

        $bacDaoTao = $this->bacDaoTaoOfTruong($co_so->loai_truong);
        // ghi Bac truong va ten truong tren cung
        $worksheet->setCellValue('B5', $bacDaoTao);
        $worksheet->setCellValue('B6', "Trường: $co_so->ten - $co_so->id");
        $worksheet->getStyle("B5")->getFont()->setBold(true);
        $worksheet->getStyle("B6")->getFont()->setBold(true);

        $worksheet->getStyle("A5:L5")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');
        $worksheet->getStyle("A6:L6")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');
        $worksheet->getColumnDimension('B')->setAutoSize(true);

        //  khóa lại không cho sửa
        $spreadsheet2->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet2->getDefaultStyle()->getProtection()->setLocked(false);

        $arrayLock =['C','F','I','B'];
        $this->lockedCellInExcel($worksheet,$arrayLock);

        $stt=6;
        for($i = 6; $i < count($data); $i++){  
            $stt++;
            $worksheet->setCellValue('B'.$stt,$data[$i][1]);

            $keyApha = -1;
             for($j=2; $j <= 11 ;$j++){
                $keyApha++;
                $worksheet->setCellValue($arrayApha[$keyApha].$stt,$data[$i][$j]);
             }
             $this->sumRowInExcel($worksheet,$stt);
            $arrayLock2 =['B'.$stt];
            $this->lockedCellInExcel($worksheet,$arrayLock2);

        }

        for($i = 0; $i < count($vitri);$i++){
            $worksheet->getStyle($vitri[$i])
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);
            // $worksheet->getStyle($vitri[$i])->applyFromArray($styleArray);
            //  màu ô
            $worksheet->getStyle($vitri[$i])->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFF0000');
        }  

        $writer = IOFactory::createWriter($spreadsheet2, "Xlsx"); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="error.xlsx"');
        $writer->save("php://output");
    } 





}

 ?>