<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ImportKqtsController extends Controller
{
    public function importFile(Request $request){
   
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $data =$spreadsheet->getActiveSheet()->toArray();

            $truong = explode(' ', $data[0][2]);
            $id_truong = array_pop($truong);
      
            $error=[];
            $vitri=[];

            // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri, $yeucau
            for($i = 2; $i < count($data); $i++){  
                $rowNumber = $i+1;
                $nghe = explode(' - ', $data[$i][23]);
                $id_nghe = array_pop($nghe);
      
                if($data[$i][0]==null || is_string($data[$i][1]) ){
                  array_push($error,$data[$i][0]);
                  array_push($vitri,'A'.$rowNumber);
                }
                if(is_string($data[$i][1]) || $data[$i][1]==null ){
                    array_push($error,$data[$i][1]);
                    array_push($vitri,'B'.$rowNumber);
                }
                // if($data[$i][2]==null){
                //   array_push($error,$data[$i][2]);
                //   array_push($vitri,'C'.$rowNumber);
                // }
                if($data[$i][3]==null || is_string($data[$i][3])){
                      array_push($error,$data[$i][3]);
                      array_push($vitri,'D'.$rowNumber);
                 }
                 if($data[$i][4]==null || is_string($data[$i][4])){
                    array_push($error,$data[$i][4]);
                    array_push($vitri,'E'.$rowNumber);
                 }
                 if($data[$i][5]==null || is_string($data[$i][5])){
                    array_push($error,$data[$i][5]);
                    array_push($vitri,'F'.$rowNumber);
                 }
                 if($data[$i][6]==null || is_string($data[$i][6])){
                    array_push($error,$data[$i][6]);
                    array_push($vitri,'G'.$rowNumber);
                 }
                 if($data[$i][7]==null || is_string($data[$i][7])){
                    array_push($error,$data[$i][7]);
                    array_push($vitri,'H'.$rowNumber);
                 }
                 if($data[$i][8]==null || is_string($data[$i][8])){
                    array_push($error,$data[$i][8]);
                    array_push($vitri,'I'.$rowNumber);
                 }
                 if($data[$i][9]==null || is_string($data[$i][9])){
                    array_push($error,$data[$i][9]);
                    array_push($vitri,'J'.$rowNumber);
                 }
                 if($data[$i][10]==null || is_string($data[$i][10])){
                    array_push($error,$data[$i][10]);
                    array_push($vitri,'K'.$rowNumber);
                 }
                 if($data[$i][11]==null || is_string($data[$i][11])){
                    array_push($error,$data[$i][11]);
                    array_push($vitri,'L'.$rowNumber);
                 }
                 if($data[$i][12]==null || is_string($data[$i][12])){
                    array_push($error,$data[$i][12]);
                    array_push($vitri,'M'.$rowNumber);
                 }
                 if($data[$i][13]==null || is_string($data[$i][13])){
                    array_push($error,$data[$i][13]);
                    array_push($vitri,'N'.$rowNumber);
                 }
                 if($data[$i][14]==null || is_string($data[$i][14])){
                    array_push($error,$data[$i][14]);
                    array_push($vitri,'O'.$rowNumber);
                 }
                 if($data[$i][15]==null || is_string($data[$i][15])){
                    array_push($error,$data[$i][15]);
                    array_push($vitri,'P'.$rowNumber);
                 }
                 if($data[$i][16]==null || is_string($data[$i][16])){
                    array_push($error,$data[$i][16]);
                    array_push($vitri,'Q'.$rowNumber);
                 }
                 if($data[$i][17]==null || is_string($data[$i][17])){
                    array_push($error,$data[$i][17]);
                    array_push($vitri,'R'.$rowNumber);
                 }
                 if($data[$i][18]==null || is_string($data[$i][18])){
                    array_push($error,$data[$i][18]);
                    array_push($vitri,'S'.$rowNumber);
                 }
                 if($data[$i][19]==null || is_string($data[$i][19])){
                    array_push($error,$data[$i][19]);
                    array_push($vitri,'T'.$rowNumber);
                 }
                 if($data[$i][20]==null || is_string($data[$i][20])){
                    array_push($error,$data[$i][20]);
                    array_push($vitri,'U'.$rowNumber);
                 }
                 if($data[$i][21]==null || is_string($data[$i][21])){
                    array_push($error,$data[$i][21]);
                    array_push($vitri,'V'.$rowNumber);
                 }
                 if($data[$i][22]==null || is_string($data[$i][22])){
                    array_push($error,$data[$i][22]);
                    array_push($vitri,'W'.$rowNumber);
                 }
                 if($id_nghe==null){
                    array_push($error,$id_nghe);
                    array_push($vitri,'X'.$rowNumber);
                 }
                 if($data[$i][24]==null || is_string($data[$i][24])){
                    array_push($error,$data[$i][24]);
                    array_push($vitri,'Y'.$rowNumber);
                 }
                 if($data[$i][25]==null || is_string($data[$i][25])){
                    array_push($error,$data[$i][25]);
                    array_push($vitri,'Z'.$rowNumber);
                 }
                 if($data[$i][26]==null || is_string($data[$i][26])){
                    array_push($error,$data[$i][26]);
                    array_push($vitri,'AA'.$rowNumber);
                 }
                 if($data[$i][27]==null || is_string($data[$i][27])){
                    array_push($error,$data[$i][27]);
                    array_push($vitri,'AB'.$rowNumber);
                 }
                 if($data[$i][28]==null || is_string($data[$i][28])){
                    array_push($error,$data[$i][28]);
                    array_push($vitri,'AC'.$rowNumber);
                 }
                //  if($data[$i][29]==null || is_string($data[$i][29])){
                //     array_push($error,$data[$i][29]);
                //     array_push($vitri,'AD'.$rowNumber);
                //  }   
                
            }

            if($vitri == null || $vitri == ''){
                for($i = 2; $i < count($data); $i++){ 
                    $arrayData=[
                        'nam'=>$data[$i][0],
                        'dot'=>$data[$i][1],
                        'bao_cao_url'=>$data[$i][2],
                        'so_luong_sv_Cao_dang'=>$data[$i][3],
                        'so_luong_sv_nu_Cao_dang'=>$data[$i][4],
                        'so_luong_sv_dan_toc_Cao_dang'=>$data[$i][5],
                        'so_luong_sv_ho_khau_HN_Cao_dang'=>$data[$i][6],
                        'so_tuyen_moi_Cao_dang'=>$data[$i][7],
                        'so_lien_thong_Cao_dang'=>$data[$i][8],
                        'so_luong_sv_Trung_cap'=>$data[$i][9],
                        'so_luong_sv_nu_Trung_cap'=>$data[$i][10],
                        'so_luong_sv_dan_toc_Trung_cap'=>$data[$i][11],
                        'so_luong_sv_ho_khau_HN_Trung_cap'=>$data[$i][12],
                        'so_Tot_nghiep_THCS'=>$data[$i][13],
                        'so_Tot_nghiep_THPT'=>$data[$i][14],
                        'so_luong_sv_So_cap'=>$data[$i][15],
                        'so_luong_sv_nu_So_cap'=>$data[$i][16],
                        'so_luong_sv_dan_toc_So_cap'=>$data[$i][17],
                        'so_luong_sv_ho_khau_HN_So_cap'=>$data[$i][18],
                        'so_luong_sv_he_khac'=>$data[$i][19],
                        'so_luong_sv_nu_khac'=>$data[$i][20],
                        'so_luong_sv_dan_toc_khac'=>$data[$i][21],
                        'so_luong_sv_ho_khau_HN_khac'=>$data[$i][22],
                        'co_so_id'=>$id_truong,
                        'nghe_id'=>$id_nghe,
                        'tong_so_tuyen_sinh'=>$data[$i][24],
                        'ke_hoach_tuyen_sinh_cao_dang'=>$data[$i][25],
                        'ke_hoach_tuyen_sinh_trung_cap'=>$data[$i][26],
                        'ke_hoach_tuyen_sinh_so_cap'=>$data[$i][27],
                        'ke_hoach_tuyen_sinh_khac'=>$data[$i][28],
                    ];
                    DB::table('tuyen_sinh')->insert($arrayData);
                } 
                return response()->json('ok',200);
            }
                          
                        // dd($data);   
                    
                   
            }   
            
            
            public function importError(Request $request){
                // $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $reader->setReadDataOnly(true);
                $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);
                $data =$spreadsheet->getActiveSheet()->toArray();

                $truong = explode(' ', $data[0][2]);
                $id_truong = array_pop($truong);
                $co_so = DB::table('co_so_dao_tao')->where('id',$id_truong)->first();

                
          
                $error=[];
                $vitri=[];
    
                // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri, $yeucau
                for($i = 2; $i < count($data); $i++){  
                    $rowNumber = $i+1;
                    $nghe = explode(' - ', $data[$i][23]);
                    $id_nghe = array_pop($nghe);
          
                    if($data[$i][0]==null || is_string($data[$i][1]) ){
                      array_push($error,$data[$i][0]);
                      array_push($vitri,'A'.$rowNumber);
                    }
                    if(is_string($data[$i][1]) || $data[$i][1]==null ){
                        array_push($error,$data[$i][1]);
                        array_push($vitri,'B'.$rowNumber);
                    }
                    // if($data[$i][2]==null){
                    //   array_push($error,$data[$i][2]);
                    //   array_push($vitri,'C'.$rowNumber);
                    // }
                    if($data[$i][3]==null || is_string($data[$i][3])){
                          array_push($error,$data[$i][3]);
                          array_push($vitri,'D'.$rowNumber);
                     }
                     if($data[$i][4]==null || is_string($data[$i][4])){
                        array_push($error,$data[$i][4]);
                        array_push($vitri,'E'.$rowNumber);
                     }
                     if($data[$i][5]==null || is_string($data[$i][5])){
                        array_push($error,$data[$i][5]);
                        array_push($vitri,'F'.$rowNumber);
                     }
                     if($data[$i][6]==null || is_string($data[$i][6])){
                        array_push($error,$data[$i][6]);
                        array_push($vitri,'G'.$rowNumber);
                     }
                     if($data[$i][7]==null || is_string($data[$i][7])){
                        array_push($error,$data[$i][7]);
                        array_push($vitri,'H'.$rowNumber);
                     }
                     if($data[$i][8]==null || is_string($data[$i][8])){
                        array_push($error,$data[$i][8]);
                        array_push($vitri,'I'.$rowNumber);
                     }
                     if($data[$i][9]==null || is_string($data[$i][9])){
                        array_push($error,$data[$i][9]);
                        array_push($vitri,'J'.$rowNumber);
                     }
                     if($data[$i][10]==null || is_string($data[$i][10])){
                        array_push($error,$data[$i][10]);
                        array_push($vitri,'K'.$rowNumber);
                     }
                     if($data[$i][11]==null || is_string($data[$i][11])){
                        array_push($error,$data[$i][11]);
                        array_push($vitri,'L'.$rowNumber);
                     }
                     if($data[$i][12]==null || is_string($data[$i][12])){
                        array_push($error,$data[$i][12]);
                        array_push($vitri,'M'.$rowNumber);
                     }
                     if($data[$i][13]==null || is_string($data[$i][13])){
                        array_push($error,$data[$i][13]);
                        array_push($vitri,'N'.$rowNumber);
                     }
                     if($data[$i][14]==null || is_string($data[$i][14])){
                        array_push($error,$data[$i][14]);
                        array_push($vitri,'O'.$rowNumber);
                     }
                     if($data[$i][15]==null || is_string($data[$i][15])){
                        array_push($error,$data[$i][15]);
                        array_push($vitri,'P'.$rowNumber);
                     }
                     if($data[$i][16]==null || is_string($data[$i][16])){
                        array_push($error,$data[$i][16]);
                        array_push($vitri,'Q'.$rowNumber);
                     }
                     if($data[$i][17]==null || is_string($data[$i][17])){
                        array_push($error,$data[$i][17]);
                        array_push($vitri,'R'.$rowNumber);
                     }
                     if($data[$i][18]==null || is_string($data[$i][18])){
                        array_push($error,$data[$i][18]);
                        array_push($vitri,'S'.$rowNumber);
                     }
                     if($data[$i][19]==null || is_string($data[$i][19])){
                        array_push($error,$data[$i][19]);
                        array_push($vitri,'T'.$rowNumber);
                     }
                     if($data[$i][20]==null || is_string($data[$i][20])){
                        array_push($error,$data[$i][20]);
                        array_push($vitri,'U'.$rowNumber);
                     }
                     if($data[$i][21]==null || is_string($data[$i][21])){
                        array_push($error,$data[$i][21]);
                        array_push($vitri,'V'.$rowNumber);
                     }
                     if($data[$i][22]==null || is_string($data[$i][22])){
                        array_push($error,$data[$i][22]);
                        array_push($vitri,'W'.$rowNumber);
                     }
                     if($id_nghe==null){
                        array_push($error,$id_nghe);
                        array_push($vitri,'X'.$rowNumber);
                     }
                     if($data[$i][24]==null || is_string($data[$i][24])){
                        array_push($error,$data[$i][24]);
                        array_push($vitri,'Y'.$rowNumber);
                     }
                     if($data[$i][25]==null || is_string($data[$i][25])){
                        array_push($error,$data[$i][25]);
                        array_push($vitri,'Z'.$rowNumber);
                     }
                     if($data[$i][26]==null || is_string($data[$i][26])){
                        array_push($error,$data[$i][26]);
                        array_push($vitri,'AA'.$rowNumber);
                     }
                     if($data[$i][27]==null || is_string($data[$i][27])){
                        array_push($error,$data[$i][27]);
                        array_push($vitri,'AB'.$rowNumber);
                     }
                     if($data[$i][28]==null || is_string($data[$i][28])){
                        array_push($error,$data[$i][28]);
                        array_push($vitri,'AC'.$rowNumber);
                     }
                    //  if($data[$i][29]==null || is_string($data[$i][29])){
                    //     array_push($error,$data[$i][29]);
                    //     array_push($vitri,'AD'.$rowNumber);
                    //  }   
                    
                }
    
    
                $styleArray = array(
                    'borders' => array(
                        'outline' => array(
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => array('argb' => '475250'),
                        ),
                    ),
                    
                );
          
          
                   $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/template_importKqts.xlsx');
                   $worksheet = $spreadsheet->getActiveSheet();
                   $worksheet->setCellValue('A1', "Trường : $co_so->ten");
                   $worksheet->mergeCells('A1:B1');
                   $worksheet->setCellValue('C1',"Mã: $co_so->id");

                   //  khóa lại không cho sửa
                   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                   $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
                   $worksheet->getStyle('C1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                   $worksheet->getStyle('A1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                   $stt=2;

                    for($i = 2; $i < count($data); $i++){  
                        $stt++;
                        $worksheet->setCellValue('A'.$stt,$data[$i][0]);
                        $worksheet->setCellValue('B'.$stt,$data[$i][1]);
                        $worksheet->setCellValue('C'.$stt,$data[$i][2]);
                        $worksheet->setCellValue('D'.$stt,$data[$i][3]);
                        $worksheet->setCellValue('E'.$stt,$data[$i][4]);
                        $worksheet->setCellValue('F'.$stt,$data[$i][5]);
                        $worksheet->setCellValue('G'.$stt,$data[$i][6]);
                        $worksheet->setCellValue('H'.$stt,$data[$i][7]);
                        $worksheet->setCellValue('I'.$stt,$data[$i][8]);
                        $worksheet->setCellValue('J'.$stt,$data[$i][9]);
                        $worksheet->setCellValue('K'.$stt,$data[$i][10]);
                        $worksheet->setCellValue('L'.$stt,$data[$i][11]);
                        $worksheet->setCellValue('M'.$stt,$data[$i][12]);
                        $worksheet->setCellValue('N'.$stt,$data[$i][13]);
                        $worksheet->setCellValue('O'.$stt,$data[$i][14]);
                        $worksheet->setCellValue('P'.$stt,$data[$i][15]);
                        $worksheet->setCellValue('Q'.$stt,$data[$i][16]);
                        $worksheet->setCellValue('R'.$stt,$data[$i][17]);
                        $worksheet->setCellValue('S'.$stt,$data[$i][18]);
                        $worksheet->setCellValue('T'.$stt,$data[$i][19]);
                        $worksheet->setCellValue('U'.$stt,$data[$i][20]);
                        $worksheet->setCellValue('V'.$stt,$data[$i][21]);
                        $worksheet->setCellValue('W'.$stt,$data[$i][22]);
                        $worksheet->setCellValue('X'.$stt,$data[$i][23]);
                        $worksheet->setCellValue('Y'.$stt,$data[$i][24]);
                        $worksheet->setCellValue('Z'.$stt,$data[$i][25]);
                        $worksheet->setCellValue('AA'.$stt,$data[$i][26]);
                        $worksheet->setCellValue('AB'.$stt,$data[$i][27]);
                        $worksheet->setCellValue('AC'.$stt,$data[$i][28]);
                        // $worksheet->setCellValue('AD'.$stt,$data[$i][29]);
          
                        
                   } 
                
                     for($i = 0; $i < count($vitri);$i++){
          
                      $worksheet->getStyle($vitri[$i])->applyFromArray($styleArray);
                        //  màu ô
                      $worksheet->getStyle($vitri[$i])->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FFFF0000');
                      
                    }  
          
                    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx"); 
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment; filename="error.xlsx"');
                
                    $writer->save("php://output");
    }
}



    

