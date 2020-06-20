<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
class ExportSoLieuCanBoQlController extends Controller
{
    public function taiBieuMau(Request $request){
        $id_co_so =$request->id_cs;
        $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/quanlycanbo/bieu-mau-quan-ly-can-bo.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        
        $worksheet->setCellValue('A9', "Trường: $co_so->ten - $id_co_so ");

        if($co_so->loai_truong == 1){
            $worksheet->setCellValue('A8', 'TRƯỜNG CAO ĐẲNG');
        }elseif($co_so->loai_truong == 2){
            $worksheet->setCellValue('A8', 'TRƯỜNG TRUNG CẤP');
        }elseif($co_so->loai_truong == 3){
            $worksheet->setCellValue('A8', 'TRƯỜNG SƠ CẤP');
        }
        $worksheet->getColumnDimension('A')->setAutoSize(true);

        //  tạo khóa đê khóa các dòng
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('A9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        $worksheet->getStyle('A8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

            if ($co_so->ma_loai_hinh_co_so == 4) {
                $worksheet->setCellValue('B9', 'x');
            }else if($co_so->ma_loai_hinh_co_so == 15){
                $worksheet->setCellValue('C9', 'x');
            }else if($co_so->ma_loai_hinh_co_so == 9){
            $worksheet->setCellValue('D9', 'x');
            }else if($co_so->ma_loai_hinh_co_so == 14){
            $worksheet->setCellValue('E9', 'x');
            }

            //  khóa dòng ko cho chọn
            $worksheet->getStyle('B9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('C9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('D9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('E9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
           
     

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
        $writer->save("php://output");

    }

    public function exportDataSoLieuCanBoQuanLy(Request $request){

        $styleArray = [
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


        $co_so = DB::table('co_so_dao_tao')->where('id', $request->truong_id)->first();

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/quanlycanbo/bieu-mau-quan-ly-can-bo.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();

        // nhận request về trường , đợt, năm để xuất
        $id_truong = $request->truong_id;
        $nam_muon_xuat = $request->nam_muon_xuat;
        $dot_muon_xuat = $request->dot_muon_xuat;

        $worksheet->setCellValue('A9', "Trường: $co_so->ten - $id_truong ");        
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

        
        // // TẠO KHÓA
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        $worksheet->getStyle('9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        
        $so_lieu_quan_ly_cua_co_so = DB::table('so_lieu_can_bo_quan_ly')
        ->where('co_so_dao_tao_id', $id_truong)
        ->where('nam', $nam_muon_xuat)
        ->where('dot', $dot_muon_xuat)
        ->first();

        // dd($so_lieu_quan_ly_cua_co_so);
        if($so_lieu_quan_ly_cua_co_so != null){
            $worksheet->setCellValue('F9', $so_lieu_quan_ly_cua_co_so->tong_so_quan_ly);
            $worksheet->setCellValue('G9', $so_lieu_quan_ly_cua_co_so->so_cb_quan_ly_nu);
            $worksheet->setCellValue('H9', $so_lieu_quan_ly_cua_co_so->so_dan_toc);
            $worksheet->setCellValue('I9', $so_lieu_quan_ly_cua_co_so->so_cb_giang_day);
            $worksheet->setCellValue('J9', $so_lieu_quan_ly_cua_co_so->so_cb_da_boi_duong);
            $worksheet->setCellValue('K9', $so_lieu_quan_ly_cua_co_so->so_danh_hieu);
            $worksheet->setCellValue('L9', $so_lieu_quan_ly_cua_co_so->so_hieu_truong);
            $worksheet->setCellValue('M9', $so_lieu_quan_ly_cua_co_so->so_hieu_pho);
            $worksheet->setCellValue('N9', $so_lieu_quan_ly_cua_co_so->so_truong_khoa);
            $worksheet->setCellValue('O9', $so_lieu_quan_ly_cua_co_so->so_pho_phong);
            $worksheet->setCellValue('P9', $so_lieu_quan_ly_cua_co_so->so_to_truong);
            $worksheet->setCellValue('Q9', $so_lieu_quan_ly_cua_co_so->so_trinh_do_tien_sy);
            $worksheet->setCellValue('R9', $so_lieu_quan_ly_cua_co_so->so_trinh_do_thac_sy);
            $worksheet->setCellValue('S9', $so_lieu_quan_ly_cua_co_so->so_trinh_do_dai_hoc);
            $worksheet->setCellValue('T9', $so_lieu_quan_ly_cua_co_so->so_trinh_do_cao_dang);
            $worksheet->setCellValue('U9', $so_lieu_quan_ly_cua_co_so->so_trinh_do_trung_cap);
            $worksheet->setCellValue('V9', $so_lieu_quan_ly_cua_co_so->so_trinh_do_khac);
        }
       

        $arrayApha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'];
        foreach($arrayApha as $apha){
            $worksheet->getStyle($apha.'9')->applyFromArray($styleArray);
        }
          
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="file-xuat.xlsx"');
         $writer->save("php://output");

    }
}
