<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExportSVController extends Controller
{
    public function exportFormNhapSinhVien(Request $request){
        $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/bieu-mau-trang.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();

        // $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValue('A1', "Trường : $co_so->ten ");
        $worksheet->mergeCells('A1:B1');


         $worksheet->setCellValue('C1',"Mã: $co_so->id");

        //  khóa lại không cho sửa
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('C1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        $worksheet->getStyle('A1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        // data validation cho Chọn nghề ( Select)

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
        $writer->save("php://output");

      }
    }

