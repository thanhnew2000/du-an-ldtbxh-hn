<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Protection;

class ImportChinhSachSinhVienController extends Controller
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

        $truong = explode(' - ', $data[8][1]);
        $id_truong = array_pop($truong);


        $checkChinhSachDaCo =  DB::table('tong_hop_chinh_sach_voi_hssv')->where('co_so_id', '=', $id_truong)
        ->where('nam','=',$year)
        ->where('dot','=',$dot)
        ->get();
        
        $arrayApha=['A','B','C','D','E','F','G','H','I'];
        $vitri=[];
        $rowNumbers=9;
        for($i =9; $i < count($data); $i++){ 
            $key_aphabel=1;
               $rowNumbers++;
               for($j=2;$j <= 7;$j++){  
                     $key_aphabel++;
                       if(is_string($data[$i][$j])){
                       array_push($vitri,$arrayApha[$key_aphabel].$rowNumbers);
                    }
               }
           }

        $chinh_sach_da_co_id=[];
        for($i=0;$i < count($checkChinhSachDaCo); $i++){
            $chinh_sach_da_co_id[$checkChinhSachDaCo[$i]->chinh_sach_id] = $checkChinhSachDaCo[$i]->id;
        }

        
         $arrayToInsert=[];
         if($vitri == null || $vitri == ''){

            $arrayData=[];
            $id_chinhsach=0;
            $key_chinhs=-1; 
                for($i=9;$i <= 20 ;$i++){
                            $id_chinhsach++;
                            $key_chinhs++;
                                $arrayData=[
                                    'chinh_sach_id'=>$id_chinhsach,
                                    'nam'=>$year,
                                    'dot'=>$dot,
                                    'co_so_id'=>$id_truong,
                                    'tong_so_hssv'=>$data[$i][2],
                                    'kinh_phi'=>$data[$i][3],
                                    'so_hssv_TC'=>$data[$i][4],
                                    'kinh_phi_TC'=>$data[$i][5],
                                    'so_hssv_CD'=>$data[$i][6],
                                    'kinh_phi_CD'=>$data[$i][7],
                                    'ghi_chu'=>$data[$i][8],
                                    'thoi_gian_nhap'=>Carbon::now(),
                                ];
                                
                            if(array_key_exists($id_chinhsach,$chinh_sach_da_co_id)){
                                DB::table('tong_hop_chinh_sach_voi_hssv')->where('id',$chinh_sach_da_co_id[$id_chinhsach])->update($arrayData);
                            }else { 
                                array_push($arrayToInsert,$arrayData);
                            }
                    } 
                    DB::table('tong_hop_chinh_sach_voi_hssv')->insert($arrayToInsert);
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
       
          $truong = explode(' - ', $data[8][1]);
          $id_truong = array_pop($truong);

          $arrayApha=['A','B','C','D','E','F','G','H','I'];
          $vitri=[];
          $rowNumbers=9;
          for($i =9; $i < count($data); $i++){ 
              $key_aphabel=1;
                 $rowNumbers++;
                 for($j=2;$j <= 7;$j++){  
                       $key_aphabel++;
                         if(is_string($data[$i][$j])){
                         array_push($vitri,$arrayApha[$key_aphabel].$rowNumbers);
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

            $spreadsheet2 =IOFactory::load('file_excel/chinhsachsv/cs-sinhvien.xlsx');
            $worksheet = $spreadsheet2->getActiveSheet();
            $worksheet->setCellValue('B9',  $data[8][1]);
            $stt=9;
            for($i = 9; $i < count($data); $i++){  
                $stt++;
                $worksheet->setCellValue('B'.$stt,$data[$i][1]);
                $worksheet->setCellValue('C'.$stt,$data[$i][2]);
                $worksheet->setCellValue('D'.$stt,$data[$i][3]);
                $worksheet->setCellValue('E'.$stt,$data[$i][4]);
                $worksheet->setCellValue('F'.$stt,$data[$i][5]);
                $worksheet->setCellValue('G'.$stt,$data[$i][6]);
                $worksheet->setCellValue('H'.$stt,$data[$i][7]);
                $worksheet->setCellValue('I'.$stt,$data[$i][8]);
            }
          
            for($i = 0; $i < count($vitri);$i++){
                $worksheet->getStyle($vitri[$i])->applyFromArray($styleArray);
                  //  màu ô
                $worksheet->getStyle($vitri[$i])->getFill()
                  ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                  ->getStartColor()->setARGB('FFFF0000');
              }  

              
              $writer =IOFactory::createWriter($spreadsheet2, "Xlsx"); 
              header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
              header('Content-Disposition: attachment; filename="error.xlsx"');
              $writer->save("php://output");
    }
}
