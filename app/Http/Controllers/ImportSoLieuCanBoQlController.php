<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
class ImportSoLieuCanBoQlController extends Controller
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

         $truong = explode(' - ', $data[8][0]);
         $id_truong = array_pop($truong);
         
         $checkSoLieuCanBo = DB::table('so_lieu_can_bo_quan_ly')
         ->where('co_so_dao_tao_id', $id_truong)
         ->where('nam', '=', $year)
         ->where('dot', '=', $dot)
         ->first();
         
         $coso = DB::table('co_so_dao_tao')
         ->where('id', $id_truong)
         ->select('ma_loai_hinh_co_so')
         ->first();

         $arrayApha=['F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'];
         $vitri=[];
         $key_aphabel = -1;
         for($i=5; $i <= 21 ;$i++){
            $key_aphabel++;
             if(is_string($data[8][$i])){
                array_push($vitri,$arrayApha[$key_aphabel].'');
             }
         }
         
         if($vitri == null || $vitri == ''){
                $arrayData=[
                    "co_so_dao_tao_id"=> $id_truong,
                    'loai_hinh_co_so_id'=> $coso->ma_loai_hinh_co_so,
                    'nam'=>$year,
                    'dot'=>$dot,

                    "tong_so_quan_ly"=> $data[8][5],
                    "so_cb_quan_ly_nu"=> $data[8][6],
                    "so_dan_toc"=> $data[8][7],
                    "so_cb_giang_day"=> $data[8][8],
                    "so_cb_da_boi_duong"=> $data[8][9],
                    "so_danh_hieu"=> $data[8][10],
                    "so_hieu_truong"=> $data[8][11],
                    "so_hieu_pho"=> $data[8][12],
                    "so_truong_khoa"=> $data[8][13],
                    "so_pho_phong"=> $data[8][14],
                    "so_to_truong"=> $data[8][15],
                    "so_trinh_do_tien_sy"=> $data[8][16],
                    "so_trinh_do_thac_sy"=> $data[8][17],
                    "so_trinh_do_dai_hoc"=> $data[8][18],
                    "so_trinh_do_cao_dang"=> $data[8][19],
                    "so_trinh_do_trung_cap"=> $data[8][20],
                    "so_trinh_do_khac"=> $data[8][21],
                ];
                
                if(empty($checkSoLieuCanBo)){
                      DB::table('so_lieu_can_bo_quan_ly')->insert($arrayData);
                }else {
                    DB::table('so_lieu_can_bo_quan_ly')->where('id',$checkSoLieuCanBo->id)->update($arrayData);
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
      
         $truong = explode(' - ', $data[8][0]);
         $id_truong = array_pop($truong);


         $co_so = DB::table('co_so_dao_tao')->where('id',$id_truong)->first();

         $arrayApha=['F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'];
         $vitri=[];
         $key_aphabel = -1;
         for($i=5; $i <= 21 ;$i++){
            $key_aphabel++;
             if(is_string($data[8][$i])){
                array_push($vitri,$arrayApha[$key_aphabel].'9');
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

        $spreadsheet2 = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/quanlycanbo/bieu-mau-quan-ly-can-bo.xlsx');
        $worksheet = $spreadsheet2->getActiveSheet();
        
        $worksheet->setCellValue('A9', "Trường: $co_so->ten - $co_so->id ");  
        if($co_so->loai_truong == 1){
            $worksheet->setCellValue('A8', 'TRƯỜNG CAO ĐẲNG');
        }elseif($co_so->loai_truong == 2){
            $worksheet->setCellValue('A8', 'TRƯỜNG TRUNG CẤP');
        }elseif($co_so->loai_truong == 3){
            $worksheet->setCellValue('A8', 'TRƯỜNG SƠ CẤP');
        }

        $worksheet->getColumnDimension('A')->setAutoSize(true);

        if ($co_so->ma_loai_hinh_co_so == 4) {
            $worksheet->setCellValue('B9', 'x');
        }else if($co_so->ma_loai_hinh_co_so == 15){
            $worksheet->setCellValue('C9', 'x');
        }else if($co_so->ma_loai_hinh_co_so == 9){
        $worksheet->setCellValue('D9', 'x');
        }else if($co_so->ma_loai_hinh_co_so == 14){
        $worksheet->setCellValue('E9', 'x');
        }


        $worksheet->setCellValue('F9', $data[8][5]);
        $worksheet->setCellValue('G9', $data[8][6]);
        $worksheet->setCellValue('H9', $data[8][7]);
        $worksheet->setCellValue('I9', $data[8][8]);
        $worksheet->setCellValue('J9', $data[8][9]);
        $worksheet->setCellValue('K9', $data[8][10]);
        $worksheet->setCellValue('L9', $data[8][11]);
        $worksheet->setCellValue('M9', $data[8][12]);
        $worksheet->setCellValue('N9', $data[8][13]);
        $worksheet->setCellValue('O9', $data[8][14]);
        $worksheet->setCellValue('P9', $data[8][15]);
        $worksheet->setCellValue('Q9', $data[8][16]);
        $worksheet->setCellValue('R9', $data[8][17]);
        $worksheet->setCellValue('S9', $data[8][18]);
        $worksheet->setCellValue('T9', $data[8][19]);
        $worksheet->setCellValue('U9', $data[8][20]);
        $worksheet->setCellValue('V9', $data[8][21]);

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
