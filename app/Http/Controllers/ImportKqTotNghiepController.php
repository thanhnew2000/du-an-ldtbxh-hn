<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class ImportKqTotNghiepController extends Controller
{
    public function importFile(Request $request){
       
        $dot=$request->dot;
        $year=$request->nam;

        $nameFile=$request->file->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);

        if ($duoiFile =='xls') {
           $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
           $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        $data =$spreadsheet->getActiveSheet()->toArray();

        $truong = explode(' - ', $data[8][2]);
        $id_truong = array_pop($truong);
        $arrayApha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC'];
        
  
        $error=[];
        $vitri=[];

        $co_so_nghe = DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=', $id_truong)
        ->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
        ->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
        ->select('nganh_nghe.id')->orderBy('nganh_nghe.id','desc')->get();

        // xem database có những dữ liệu đợt đó chưa
        $tot_nghiep_da_co =  DB::table('sv_tot_nghiep')->where('co_so_id', '=', $id_truong)
        ->where('nam','=',$year)
        ->where('dot','=',$dot)
        ->select('id','nghe_id')->get();



          $id_nghe_tot_nghiep_da_co=[];
          for($i=0;$i < count($tot_nghiep_da_co); $i++){
           $id_nghe_tot_nghiep_da_co[$tot_nghiep_da_co[$i]->nghe_id] = $tot_nghiep_da_co[$i]->id;
          }
          // 

        // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri
        for($i =9; $i < count($data); $i++){ 
           $key_aphabel=-1;
              $rowNumber = $i+1; 
              for($j=7;$j <= 36;$j++){  
                    $key_aphabel++;
                      if(is_string($data[$i][$j])){
                      array_push($error,$data[$i][$j]);
                      array_push($vitri,$arrayApha[$key_aphabel].$rowNumber);
                   }
              }
          }

    

        $key_co_so_nghe=-1;
        $arrayData=[];
        if($vitri == null || $vitri == ''){
            for($i = 9; $i < count($data); $i++){ 
              $key_co_so_nghe++;
                $arrayData=[
                    'nam'=>$year,
                    'dot'=>$dot,
                    'nghe_id'=>$data[$i][1],
                    'co_so_id'=>$id_truong,

                    'Tong_SoNguoi_TN'=>$data[$i][7],
                    'NU_SV_TN'=>$data[$i][8],
                    'DanToc_ThieuSo_ItNguoi'=>$data[$i][9],
                    'HoKhauHN'=>$data[$i][10],

                    'SoSV_NhapHoc_DauKhoa_TrinhDoCD'=>$data[$i][11],
                    'SoSV_Du_DieuKienThi_XetTN_TrinhDoCD'=>$data[$i][12],
                    'SoSV_TN_TrinhDoCD'=>$data[$i][13],
                    'SoLuong_Nu_SV_CD'=>$data[$i][14],
                    'DanToc_ThieuSo_ItNguoi_CD'=>$data[$i][15],
                    'SoSV_HoKhauHN_CD'=>$data[$i][16],
                    'SoLuong_HSSV_TN_Kha_Gioi_CD'=>$data[$i][17],



                    'SoSV_NhapHoc_DauKhoa_TrinhDoTC'=>$data[$i][18],
                    'SoSV_Du_DieuKienTHhi_XetTN_TrinhDoTC'=>$data[$i][19],
                    'SoSV_TN_TrinhDoTC'=>$data[$i][20],
                    'SoLuong_Nu_SV_TC'=>$data[$i][21],
                    'DanToc_ThieuSo_ItNguoi_TC'=>$data[$i][22],
                    'SoSV_HoKhauHN_TC'=>$data[$i][23],
                    'HoKhau_HN_Thuoc_DoiTuong_TN_TC'=>$data[$i][24],
                    'SoLuong_HSSV_TN_Kha_Gioi_TC'=>$data[$i][25],

                    'SoSV_NhapHoc_DauKhoa_TrinhDoSC'=>$data[$i][26],
                    'SoSV_Du_DieuKienThi_XetTN_TrinhDoSC'=>$data[$i][27],
                    'SoSV_TN_TrinhDoSC'=>$data[$i][28],
                    'SoLuong_Nu_SV_SC'=>$data[$i][29],
                    'DanToc_ThieuSo_ItNguoi_SC'=>$data[$i][30],
                    'SoSV_HoKhauHN_SC'=>$data[$i][31],

                    'SoSV_NhapHoc_DauKhoa_NgheKhac'=>$data[$i][32],
                    'SoSV_DuKienThi_XetTN_NgheKhac'=>$data[$i][33],
                    'SoSV_TN_NgheKhac'=>$data[$i][34],
                    'SoLuong_Nu_SV_NgheKhac'=>$data[$i][35],
                    'DanToc_ThieuSo_ItNguoi_NgheKhac'=>$data[$i][36],
                    'SoNguoi_HoKhauHN_NgheKhac'=>$data[$i][37],

                    'SoNguoi_CoViecLamNgay_SauKhi_TN_CD'=>$data[$i][38],
                    'CoViecLam_HoKhauHN_TrinhDoCD'=>$data[$i][39],

                    'SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoTC'=>$data[$i][40],
                    'CoViecLam_HoKhauHN_TrinhDo_TC'=>$data[$i][41],
                    'SV_CoViecLam_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC'=>$data[$i][42],

                    'SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoSC'=>$data[$i][43],
                    'SoLuong_HoKhauHN_TrinhDoSC'=>$data[$i][44],

                    'SoNguoiHoc_CoViecLamNgay_SauKhi_TN_DaoTao_NgheKhac'=>$data[$i][45],
                    'SoNguoi_HoKhauHN_TrinhDo_DaoTao_NgheKhac'=>$data[$i][46],


                    'MucLuong_TB_CD'=>$data[$i][47],
                    'MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoCD'=>$data[$i][48],
                    'MucLuong_TB_TC'=>$data[$i][49],
                    'MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC'=>$data[$i][50],
                    'MucLuong_TB_SC'=>$data[$i][51],
                    'MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoSC'=>$data[$i][52],
                    'MucLuong_TB_NgheKhac'=>$data[$i][53],
                    'MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoNgheKhac'=>$data[$i][54],


                ];
                if(($data[$i][1] != $co_so_nghe[$key_co_so_nghe]->id)){
                  return response()->json('problem',200);
                }else if($key_co_so_nghe > count($co_so_nghe)){
                  return response()->json('problem',200);
                }
                else if(array_key_exists($data[$i][1],$id_nghe_tot_nghiep_da_co)){
                    DB::table('sv_tot_nghiep')->where('id',$id_nghe_tot_nghiep_da_co[$data[$i][1]])->update($arrayData);
                }else{
                  DB::table('sv_tot_nghiep')->insert($arrayData); 
                }
                
            } 
            return response()->json('ok',200);
          }          
        }   

        public function importError(Request $request){


            $nameFile=$request->file_import->getClientOriginalName();
            $nameFileArr=explode('.',$nameFile);
            $duoiFile=end($nameFileArr);

            if ($duoiFile =='xls') {
               $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else {
               $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
             $reader->setReadDataOnly(true);
             $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);
             $data =$spreadsheet->getActiveSheet()->toArray();
          
             $truong = explode(' - ', $data[8][2]);
             $id_truong = array_pop($truong);
  
             $co_so = DB::table('co_so_dao_tao')->where('id',$id_truong)->first();

             $arrayApha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC'];
             $arrayAphaViTri=['H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC'];
             $vitri=[];
 
             // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri
             for($i =9; $i < count($data); $i++){ 
               $key_aphabel=-1;
                  $rowNumber = $i+1; 
                  for($j=7;$j <= 54;$j++){  
                        $key_aphabel++;
                          if(is_string($data[$i][$j])){
                          array_push($vitri,$arrayAphaViTri[$key_aphabel].$rowNumber);
                       }
                  }
              }

             $styleArray = array(
                 'borders' => array(
                     'outline' => array(
                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                         'color' => array('argb' => '475250'),
                     ),
                 ),
                 
             );
       
       
                $spreadsheet2 = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/totnghiep/bieu-mau-tot-nghiep.xlsx');
                $worksheet = $spreadsheet2->getActiveSheet();
                $worksheet->setCellValue('C9', "Trường: $co_so->ten - $co_so->id");

                if($co_so->loai_truong == 1){
                 $worksheet->setCellValue('C8', 'TRƯỜNG CAO ĐẲNG');
                 }elseif($co_so->loai_truong == 2){
                     $worksheet->setCellValue('C8', 'TRƯỜNG TRUNG CẤP');
                 }else{
                     $worksheet->setCellValue('C8', 'TRƯỜNG SƠ CẤP');
                 }
                 
                 $worksheet->getColumnDimension('C')->setAutoSize(true);

                //  khóa lại không cho sửa
                $spreadsheet2->getActiveSheet()->getProtection()->setSheet(true);
                $spreadsheet2->getDefaultStyle()->getProtection()->setLocked(false);
                $worksheet->getStyle('C1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                $worksheet->getStyle('A1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                $stt=9;



                 for($i = 9; $i < count($data); $i++){  
                     $stt++;
                    for($j=1;$j<count($arrayApha); $j++){
                        $worksheet->setCellValue($arrayApha[$j].$stt,$data[$i][$j]);
                    }
           
                     
        
                     $worksheet->getStyle('B'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                     $worksheet->getStyle('C'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                     $worksheet->getStyle('D'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                     $worksheet->getStyle('E'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                     $worksheet->getStyle('F'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                     $worksheet->getStyle('G'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                     
                } 
             
                  for($i = 0; $i < count($vitri);$i++){
       
                   $worksheet->getStyle($vitri[$i])->applyFromArray($styleArray);
                     //  màu ô
                   $worksheet->getStyle($vitri[$i])->getFill()
                     ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                     ->getStartColor()->setARGB('FFFF0000');

                 }  
                 


                 $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet2, "Xlsx"); 
                 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                 header('Content-Disposition: attachment; filename="error.xlsx"');
                 $writer->save("php://output");
        }
}