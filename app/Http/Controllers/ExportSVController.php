<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Services\SoLieuTuyenSinhService;
class ExportSVController extends Controller
{
    // protected $SoLieuTuyenSinhService;

	// public function __construct(SoLieuTuyenSinhService $SoLieuTuyenSinhService){
	// 	$this->SoLieuTuyenSinhService = $SoLieuTuyenSinhService;
    //     //dd($ProductService);
    // }


    public function exportFormNhapSinhVien(Request $request){
        $id_co_so =$request->id_cs;
        $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/bieu-mau-trang.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        // $co_so_nghe = $this->SoLieuTuyenSinhService->getmanganhnghe($id_co_so);
        // dd($co_so_nghe);
        // $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValue('A1', "Trường : $co_so->ten ");
        $worksheet->mergeCells('A1:B1');


         $worksheet->setCellValue('C1',"Mã: $co_so->id");

        //  khóa lại không cho sửa
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('C1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        $worksheet->getStyle('A1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        $co_so_nghe = DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=', $id_co_so)
		->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
		->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
		->select('nganh_nghe.id','nganh_nghe.ten_nganh_nghe')->get();

        $arr=[];
        foreach($co_so_nghe as $n){
            array_push( $arr,$n->ten_nganh_nghe.' - '.$n->id);
        };
        $stringNghe  = implode(", ",$arr);
        // dd($stringNghe);

        // data validation cho Chọn nghề ( Select)
        for($i=3;$i<=100;$i++){
            $validation = $spreadsheet->getActiveSheet()->getCell('X'.$i)
            ->getDataValidation();
               $validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
               $validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
               $validation->setAllowBlank(false);
               $validation->setShowInputMessage(true);
               $validation->setShowErrorMessage(true);
               $validation->setShowDropDown(true);
               $validation->setErrorTitle('Input error');
               $validation->setError('Value is not in list.');
               $validation->setPromptTitle('Pick from list');
               $validation->setPrompt('Please pick a value from the drop-down list.');
               $validation->setFormula1('"'.$stringNghe.'"');
      }


        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
        $writer->save("php://output");

      }
    }

