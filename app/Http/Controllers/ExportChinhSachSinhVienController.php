<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Protection;

class ExportChinhSachSinhVienController extends Controller
{
    public function useLike(){
        return  [
              'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
               ],
              'borders' => [
                'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
              ],
          ];
      }
  
  
      public function exportBieuMau(Request $request){
          $styleArray =  $this->useLike();
          $id_co_so =$request->id_cs;
          $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();
          $spreadsheet = IOFactory::load('file_excel/chinhsachsv/cs-sinhvien.xlsx');
          $worksheet = $spreadsheet->getActiveSheet();
          
          $worksheet->setCellValue('B9', "Trường: $co_so->ten - $id_co_so ");
  
          if($co_so->loai_truong == 1){
              $worksheet->setCellValue('B8', 'TRƯỜNG CAO ĐẲNG');
          }elseif($co_so->loai_truong == 2){
              $worksheet->setCellValue('B8', 'TRƯỜNG TRUNG CẤP');
          }elseif($co_so->loai_truong == 3){
              $worksheet->setCellValue('B8', 'TRƯỜNG SƠ CẤP');
          }
  
          $worksheet->getColumnDimension('B')->setAutoSize(true);
          //   tạo khóa khóa các dòng
          $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
          $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
          
           $chinh_sach = DB::table('chinh_sach')->orderby('id','asc')->get();
              $arrayAphabe=['A','B','C','D','E','F','G','H','I'];
           $rowNumber=9;
           foreach($chinh_sach as $cs){
               $rowNumber++;
               $worksheet->setCellValue('B'.$rowNumber, $cs->ten);
               $worksheet->getStyle('B'.$rowNumber)->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
  
              foreach($arrayAphabe as $apha){
                  $worksheet->getStyle($apha.$rowNumber)->applyFromArray($styleArray);
              }
  
           }
  
           $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
           header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
           $writer->save("php://output");
      }
  
      public function exportData(Request $request){
          
          $styleArray =  $this->useLike();
          $arrayAphabe=['A','B','C','D','E','F','G','H','I'];
          
          $spreadsheet =IOFactory::load('file_excel/chinhsachsv/cs-sinhvien.xlsx');
          $worksheet = $spreadsheet->getActiveSheet();
  
          // nhận request về trường , đợt, năm để xuất
          $id_truong = $request->truong_id;
          $nam_muon_xuat = $request->nam_muon_xuat;
          $dot_muon_xuat = $request->dot_muon_xuat;
  
          $co_so =  DB::table('co_so_dao_tao')->where('id', '=', $id_truong)->first();
          $worksheet->setCellValue('B9', 'Trường: '.$co_so->ten.' - '.$id_truong);
  
          $tong_hop_chinh_sach =  DB::table('tong_hop_chinh_sach_voi_hssv')->where('co_so_id', '=', $id_truong)
          ->where('nam','=',$nam_muon_xuat)
          ->where('dot','=',$dot_muon_xuat)
          ->orderBy('chinh_sach_id', 'asc')->get();
          
          $worksheet->getColumnDimension('B')->setAutoSize(true);
          $worksheet->getColumnDimension('C')->setAutoSize(true);
          $worksheet->getColumnDimension('D')->setAutoSize(true);
          $worksheet->getColumnDimension('E')->setAutoSize(true);
          $worksheet->getColumnDimension('F')->setAutoSize(true);
          $worksheet->getColumnDimension('G')->setAutoSize(true);
          $worksheet->getColumnDimension('H')->setAutoSize(true);
  
          $chinh_sach = DB::table('chinh_sach')->orderby('id','asc')->get();
          
          $rowNumber=9;
          foreach($chinh_sach as $cs){
              $rowNumber++;
              $worksheet->setCellValue('B'.$rowNumber, $cs->ten);
          }

          $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        //   $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);

          $dong=9;
          for($i=0 ; $i < count($tong_hop_chinh_sach); $i++){
              $dong++;
              $worksheet->setCellValue('C'.$dong, $tong_hop_chinh_sach[$i]->tong_so_hssv);
              $worksheet->setCellValue('D'.$dong, number_format($tong_hop_chinh_sach[$i]->kinh_phi));
              $worksheet->setCellValue('E'.$dong, $tong_hop_chinh_sach[$i]->so_hssv_TC);
              $worksheet->setCellValue('F'.$dong, number_format($tong_hop_chinh_sach[$i]->kinh_phi_TC));
              $worksheet->setCellValue('G'.$dong, $tong_hop_chinh_sach[$i]->so_hssv_CD);
              $worksheet->setCellValue('H'.$dong, number_format($tong_hop_chinh_sach[$i]->kinh_phi_CD));
              $worksheet->setCellValue('I'.$dong, $tong_hop_chinh_sach[$i]->ghi_chu);

              foreach($arrayAphabe as $apha){
                   $worksheet->getStyle($apha.$dong)->applyFromArray($styleArray);
                 }

             $worksheet->getStyle($dong)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

          }
  
          // KHÓA
        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        //   $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
  
          $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="file-xuat-data.xlsx"');
          $writer->save("php://output");
  
      }
}
