<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImportKqtsController extends Controller
{
    public function importFile(Request $request){
            $dot=$request->dot;
            $year=$request->nam;

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $data =$spreadsheet->getActiveSheet()->toArray();

            $truong = explode(' - ', $data[7][2]);
            $id_truong = array_pop($truong);
            $arrayApha=['H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK'];
            
      
            $error=[];
            $vitri=[];

            // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri, $yeucau
  
            for($i = 8; $i < count($data); $i++){  
                $rowNumber = $i+1; 
                if(is_string($data[$i][7])){
                    array_push($error,$data[$i][7]);
                    array_push($vitri,'H'.$rowNumber);
                 }
                 if(is_string($data[$i][8])){
                    array_push($error,$data[$i][8]);
                    array_push($vitri,'I'.$rowNumber);
                 }
                 if(is_string($data[$i][9])){
                    array_push($error,$data[$i][9]);
                    array_push($vitri,'J'.$rowNumber);
                 }
                 if(is_string($data[$i][10])){
                   array_push($error,$data[$i][10]);
                   array_push($vitri,'K'.$rowNumber);
                }
                if(is_string($data[$i][11])){
                   array_push($error,$data[$i][11]);
                   array_push($vitri,'L'.$rowNumber);
                }
                if(is_string($data[$i][12])){
                   array_push($error,$data[$i][12]);
                   array_push($vitri,'M'.$rowNumber);
                }
                if(is_string($data[$i][13])){
                   array_push($error,$data[$i][13]);
                   array_push($vitri,'N'.$rowNumber);
                }
                if(is_string($data[$i][14])){
                   array_push($error,$data[$i][14]);
                   array_push($vitri,'O'.$rowNumber);
                }
                if(is_string($data[$i][15])){
                   array_push($error,$data[$i][15]);
                   array_push($vitri,'P'.$rowNumber);
                }
                if(is_string($data[$i][16])){
                   array_push($error,$data[$i][16]);
                   array_push($vitri,'Q'.$rowNumber);
                }
                if(is_string($data[$i][17])){
                   array_push($error,$data[$i][17]);
                   array_push($vitri,'R'.$rowNumber);
                }
                if(is_string($data[$i][18])){
                   array_push($error,$data[$i][18]);
                   array_push($vitri,'S'.$rowNumber);
                }
                if(is_string($data[$i][19])){
                   array_push($error,$data[$i][19]);
                   array_push($vitri,'T'.$rowNumber);
                }
                if(is_string($data[$i][20])){
                   array_push($error,$data[$i][20]);
                   array_push($vitri,'U'.$rowNumber);
                }
                if(is_string($data[$i][21])){
                   array_push($error,$data[$i][21]);
                   array_push($vitri,'V'.$rowNumber);
                }
                if(is_string($data[$i][22])){
                   array_push($error,$data[$i][22]);
                   array_push($vitri,'W'.$rowNumber);
                }
                if(is_string($data[$i][23])){
                   array_push($error,$data[$i][23]);
                   array_push($vitri,'X'.$rowNumber);
                }
                if(is_string($data[$i][24])){
                   array_push($error,$data[$i][24]);
                   array_push($vitri,'Y'.$rowNumber);
                }
                if(is_string($data[$i][25])){
                   array_push($error,$data[$i][25]);
                   array_push($vitri,'Z'.$rowNumber);
                }
                if(is_string($data[$i][26])){
                   array_push($error,$data[$i][26]);
                   array_push($vitri,'AA'.$rowNumber);
                }
                if(is_string($data[$i][27])){
                   array_push($error,$data[$i][27]);
                   array_push($vitri,'AB'.$rowNumber);
                }
                if(is_string($data[$i][28])){
                   array_push($error,$data[$i][28]);
                   array_push($vitri,'AC'.$rowNumber);
                }
                if(is_string($data[$i][29])){
                   array_push($error,$data[$i][29]);
                   array_push($vitri,'AD'.$rowNumber);
                }
                if(is_string($data[$i][31])){
                   array_push($error,$data[$i][31]);
                   array_push($vitri,'AF'.$rowNumber);
                }
                if(is_string($data[$i][32])){
                   array_push($error,$data[$i][32]);
                   array_push($vitri,'AG'.$rowNumber);
                }
                if(is_string($data[$i][33])){
                   array_push($error,$data[$i][33]);
                   array_push($vitri,'AH'.$rowNumber);
                }
                if(is_string($data[$i][34])){
                   array_push($error,$data[$i][34]);
                   array_push($vitri,'AI'.$rowNumber);
                }
                if(is_string($data[$i][35])){
                   array_push($error,$data[$i][35]);
                   array_push($vitri,'AJ'.$rowNumber);
                }
                if(is_string($data[$i][36])){
                   array_push($error,$data[$i][36]);
                   array_push($vitri,'AK'.$rowNumber);
                }
                
            }
            $arrayData=[];
            if($vitri == null || $vitri == ''){
                for($i = 8; $i < count($data); $i++){ 
                    // array_push($arrayData,$data[$i]);
                    $arrayData=[
                        
                        'nam'=>$year,
                        'dot'=>$dot,
                        'nghe_id'=>$data[$i][1],
                        'co_so_id'=>$id_truong,

                        'tong_so_tuyen_sinh'=>$data[$i][7],
                        'ke_hoach_tuyen_sinh_cao_dang'=>$data[$i][8],
                        'ke_hoach_tuyen_sinh_trung_cap'=>$data[$i][9],
                        'ke_hoach_tuyen_sinh_so_cap'=>$data[$i][10],
                        'ke_hoach_tuyen_sinh_khac'=>$data[$i][11],

                        'tong_so_tuyen_sinh_cac_trinh_do'=>$data[$i][12],
                        'tong_so_nu'=>$data[$i][13],
                        'tong_so_dan_toc'=>$data[$i][14],
                        'tong_ho_khau_HN'=>$data[$i][15],

                        'so_luong_sv_Cao_dang'=>$data[$i][16],
                        'so_luong_sv_nu_Cao_dang'=>$data[$i][17],
                        'so_luong_sv_dan_toc_Cao_dang'=>$data[$i][18],
                        'so_luong_sv_ho_khau_HN_Cao_dang'=>$data[$i][19],
                        'so_tuyen_moi_Cao_dang'=>$data[$i][20],
                        'so_lien_thong_Cao_dang'=>$data[$i][21],

                        'so_luong_sv_Trung_cap'=>$data[$i][22],
                        'so_luong_sv_nu_Trung_cap'=>$data[$i][23],
                        'so_luong_sv_dan_toc_Trung_cap'=>$data[$i][24],
                        'so_luong_sv_ho_khau_HN_Trung_cap'=>$data[$i][25],
                        'ho_khau_HN_THCS_Trung_cap'=>$data[$i][26],

                        'so_Tot_nghiep_THCS'=>$data[$i][27],
                        'so_Tot_nghiep_THPT'=>$data[$i][28],

    
                        'so_luong_sv_So_cap'=>$data[$i][29],
                        'so_luong_sv_nu_So_cap'=>$data[$i][30],
                        'so_luong_sv_dan_toc_So_cap'=>$data[$i][31],
                        'so_luong_sv_ho_khau_HN_So_cap'=>$data[$i][32],
                        'so_luong_sv_he_khac'=>$data[$i][33],
                        'so_luong_sv_nu_khac'=>$data[$i][34],
                        'so_luong_sv_dan_toc_khac'=>$data[$i][35],
                        'so_luong_sv_ho_khau_HN_khac'=>$data[$i][36],
                        'thoi_gian_cap_nhat'=>Carbon::now(),

                    ];

                    DB::table('tuyen_sinh')->insert($arrayData); 
                } 
                return response()->json('ok',200);
              }          
            }   
            
            
            public function importError(Request $request){


                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $reader->setReadDataOnly(true);
                $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);
                $data =$spreadsheet->getActiveSheet()->toArray();
                // dd($data);
                $truong = explode(' - ', $data[7][2]);
                $id_truong = array_pop($truong);

                // $arrayApha=['H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK'];
                $co_so = DB::table('co_so_dao_tao')->where('id',$id_truong)->first();

               
                $error=[];
                $vitri=[];
    
                // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri, $yeucau
         
                for($i =8; $i < count($data); $i++){ 
                    $rowNumber = $i+1; 
                         if(is_string($data[$i][7])){
                             array_push($error,$data[$i][7]);
                             array_push($vitri,'H'.$rowNumber);
                          }
                          if(is_string($data[$i][8])){
                             array_push($error,$data[$i][8]);
                             array_push($vitri,'I'.$rowNumber);
                          }
                          if(is_string($data[$i][9])){
                             array_push($error,$data[$i][9]);
                             array_push($vitri,'J'.$rowNumber);
                          }
                          if(is_string($data[$i][10])){
                            array_push($error,$data[$i][10]);
                            array_push($vitri,'K'.$rowNumber);
                         }
                         if(is_string($data[$i][11])){
                            array_push($error,$data[$i][11]);
                            array_push($vitri,'L'.$rowNumber);
                         }
                         if(is_string($data[$i][12])){
                            array_push($error,$data[$i][12]);
                            array_push($vitri,'M'.$rowNumber);
                         }
                         if(is_string($data[$i][13])){
                            array_push($error,$data[$i][13]);
                            array_push($vitri,'N'.$rowNumber);
                         }
                         if(is_string($data[$i][14])){
                            array_push($error,$data[$i][14]);
                            array_push($vitri,'O'.$rowNumber);
                         }
                         if(is_string($data[$i][15])){
                            array_push($error,$data[$i][15]);
                            array_push($vitri,'P'.$rowNumber);
                         }
                         if(is_string($data[$i][16])){
                            array_push($error,$data[$i][16]);
                            array_push($vitri,'Q'.$rowNumber);
                         }
                         if(is_string($data[$i][17])){
                            array_push($error,$data[$i][17]);
                            array_push($vitri,'R'.$rowNumber);
                         }
                         if(is_string($data[$i][18])){
                            array_push($error,$data[$i][18]);
                            array_push($vitri,'S'.$rowNumber);
                         }
                         if(is_string($data[$i][19])){
                            array_push($error,$data[$i][19]);
                            array_push($vitri,'T'.$rowNumber);
                         }
                         if(is_string($data[$i][20])){
                            array_push($error,$data[$i][20]);
                            array_push($vitri,'U'.$rowNumber);
                         }
                         if(is_string($data[$i][21])){
                            array_push($error,$data[$i][21]);
                            array_push($vitri,'V'.$rowNumber);
                         }
                         if(is_string($data[$i][22])){
                            array_push($error,$data[$i][22]);
                            array_push($vitri,'W'.$rowNumber);
                         }
                         if(is_string($data[$i][23])){
                            array_push($error,$data[$i][23]);
                            array_push($vitri,'X'.$rowNumber);
                         }
                         if(is_string($data[$i][24])){
                            array_push($error,$data[$i][24]);
                            array_push($vitri,'Y'.$rowNumber);
                         }
                         if(is_string($data[$i][25])){
                            array_push($error,$data[$i][25]);
                            array_push($vitri,'Z'.$rowNumber);
                         }
                         if(is_string($data[$i][26])){
                            array_push($error,$data[$i][26]);
                            array_push($vitri,'AA'.$rowNumber);
                         }
                         if(is_string($data[$i][27])){
                            array_push($error,$data[$i][27]);
                            array_push($vitri,'AB'.$rowNumber);
                         }
                         if(is_string($data[$i][28])){
                            array_push($error,$data[$i][28]);
                            array_push($vitri,'AC'.$rowNumber);
                         }
                         if(is_string($data[$i][29])){
                            array_push($error,$data[$i][29]);
                            array_push($vitri,'AD'.$rowNumber);
                         }
                         if(is_string($data[$i][31])){
                            array_push($error,$data[$i][31]);
                            array_push($vitri,'AF'.$rowNumber);
                         }
                         if(is_string($data[$i][32])){
                            array_push($error,$data[$i][32]);
                            array_push($vitri,'AG'.$rowNumber);
                         }
                         if(is_string($data[$i][33])){
                            array_push($error,$data[$i][33]);
                            array_push($vitri,'AH'.$rowNumber);
                         }
                         if(is_string($data[$i][34])){
                            array_push($error,$data[$i][34]);
                            array_push($vitri,'AI'.$rowNumber);
                         }
                         if(is_string($data[$i][35])){
                            array_push($error,$data[$i][35]);
                            array_push($vitri,'AJ'.$rowNumber);
                         }
                         if(is_string($data[$i][36])){
                            array_push($error,$data[$i][36]);
                            array_push($vitri,'AK'.$rowNumber);
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
          
          
                   $spreadsheet2 = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/form-export-data-tuyen-sinh.xlsx');
                   $worksheet = $spreadsheet2->getActiveSheet();
                   $worksheet->setCellValue('C8', "Trường: $co_so->ten - $co_so->id");

                   //  khóa lại không cho sửa
                   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                   $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
                   $worksheet->getStyle('C1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                   $worksheet->getStyle('A1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                   $stt=8;



                    for($i = 8; $i < count($data); $i++){  
                        $stt++;
  
                        $worksheet->setCellValue('B'.$stt,$data[$i][1]);
                        $worksheet->setCellValue('C'.$stt,$data[$i][2]);

               // IN LOAI CO SO
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
                        $worksheet->setCellValue('AD'.$stt,$data[$i][29]);

                        $worksheet->setCellValue('AE'.$stt,$data[$i][30]);
                        $worksheet->setCellValue('AF'.$stt,$data[$i][31]);
                        $worksheet->setCellValue('AG'.$stt,$data[$i][32]);
                        $worksheet->setCellValue('AH'.$stt,$data[$i][33]);
                        $worksheet->setCellValue('AI'.$stt,$data[$i][34]);
                        $worksheet->setCellValue('AJ'.$stt,$data[$i][35]);
                        $worksheet->setCellValue('AK'.$stt,$data[$i][36]);
           
                        $worksheet->getStyle('B'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                        $worksheet->getStyle('C'.$stt)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
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



    

