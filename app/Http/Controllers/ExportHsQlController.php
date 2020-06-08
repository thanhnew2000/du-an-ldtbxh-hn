<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ExportHsQlController extends Controller
{
  public function taiBieuMau(Request $request){
    $id_cs=$request->id_cs;
    // dd($id_cs);
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/hssv/bieu-mau-hs-dang-ql.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();

    $co_so = DB::table('co_so_dao_tao')->where('id',$id_cs)->first();
    $worksheet->setCellValue('C8', "Trường: $co_so->ten - $id_cs");


        if($co_so->loai_truong == 1){
            $worksheet->setCellValue('C7', 'TRƯỜNG CAO ĐẲNG');
        }elseif($co_so->loai_truong == 2){
            $worksheet->setCellValue('C7', 'TRƯỜNG TRUNG CẤP');
        }elseif($co_so->loai_truong == 3){
            $worksheet->setCellValue('C7', 'TRƯỜNG SƠ CẤP');
        }   


    $worksheet->getColumnDimension('C')->setAutoSize(true);
    // lấy nghề của cơ sở đó đăng ký
     //  tạo khóa đê khóa các dòng
     $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
     $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
     $worksheet->getStyle('C8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
     $worksheet->getStyle('C7')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

     $co_so_nghe = DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=', $id_cs)
     ->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
     ->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
     ->select('co_so_dao_tao.ma_loai_hinh_co_so','co_so_dao_tao.loai_truong','nganh_nghe.id','nganh_nghe.ten_nganh_nghe')->get();


     $row=8;
     foreach($co_so_nghe as $cs_n){

         $row ++;
         $worksheet->setCellValue('B'.$row, $cs_n->id);
         $worksheet->setCellValue('C'.$row, $cs_n->ten_nganh_nghe);    
         if ($cs_n->ma_loai_hinh_co_so == 9) {
             $worksheet->setCellValue('F'.$row, 'x');
         }else if($cs_n->ma_loai_hinh_co_so == 4){
             $worksheet->setCellValue('D'.$row, 'x');
         }else if($cs_n->ma_loai_hinh_co_so == 15){
             $worksheet->setCellValue('E'.$row, 'x');
         }else if($cs_n->ma_loai_hinh_co_so == 14){
             $worksheet->setCellValue('G'.$row, 'x');
         }
         //  khóa dòng ko cho chọn
         $worksheet->getStyle('B'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
         $worksheet->getStyle('C'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
         $worksheet->getStyle('D'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
         $worksheet->getStyle('E'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
         $worksheet->getStyle('F'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
         $worksheet->getStyle('G'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

     };


    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment; filename="file-template.xlsx"');
   $writer->save("php://output");
  }
  


  public function exportData(Request $request){ 
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

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/hssv/bieu-mau-hs-dang-ql.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    
    $id_truong = $request->truong_id;
    $nam_muon_xuat = $request->nam_muon_xuat;
    $dot_muon_xuat = $request->dot_muon_xuat;

    $cs_nganh_nghe= DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=',$id_truong)
    ->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
    ->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
    ->select('co_so_dao_tao.ma_loai_hinh_co_so','co_so_dao_tao.loai_truong','nganh_nghe.id','nganh_nghe.ten_nganh_nghe')
    ->orderBy('nganh_nghe.id', 'desc')->get();
 

    $name_truong = DB::table('co_so_dao_tao')->where('id', $id_truong)->select('co_so_dao_tao.ten','co_so_dao_tao.loai_truong')->first();
    $worksheet->setCellValue('C8','Trường: '.$name_truong->ten.' - '.$id_truong);

     // TẠO KHÓA
     $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
     $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
     $worksheet->getStyle('C8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
     $worksheet->getStyle('C7')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
   
     $arrayNN=[];
     $maloaihinhcs;
     foreach($cs_nganh_nghe as $ng){
        $arrayNN[$ng->id]=$ng->ten_nganh_nghe;
        $maloaihinhcs=$ng->ma_loai_hinh_co_so;  
     }
     
    if($name_truong->loai_truong == 1){
        $worksheet->setCellValue('C7', 'TRƯỜNG CAO ĐẲNG');
    }elseif($name_truong->loai_truong == 2){
        $worksheet->setCellValue('C7', 'TRƯỜNG TRUNG CẤP');
    }else{
        $worksheet->setCellValue('C7', 'TRƯỜNG SƠ CẤP');
    }
    $worksheet->getColumnDimension('C')->setAutoSize(true);

     $sv_dang_quan_ly= DB::table('sv_dang_quan_ly')->where('co_so_id','=',$id_truong)
       ->where('nam','=',$nam_muon_xuat)->where('dot','=',$dot_muon_xuat)->orderBy('nghe_id', 'asc')->get();

    $arrayAphabe=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA'];


    $row=8;
    foreach($sv_dang_quan_ly as $sv_d_ql){
        $row ++;
        // border đen các ô
        foreach($arrayAphabe as $apha){
            $worksheet->getStyle($apha.$row)->applyFromArray($styleArray);
        }

        $worksheet->setCellValue('B'.$row, $sv_d_ql->nghe_id);
        $worksheet->setCellValue('C'.$row, $arrayNN[$sv_d_ql->nghe_id]);

        if ($maloaihinhcs == 9) {
            $worksheet->setCellValue('F'.$row, 'x');
        }else if($maloaihinhcs == 14){
            $worksheet->setCellValue('G'.$row, 'x');
        }else if($maloaihinhcs == 15){
            $worksheet->setCellValue('E'.$row, 'x');
        }else if($maloaihinhcs == 4){
            $worksheet->setCellValue('D'.$row, 'x');
        }


        $worksheet->setCellValue('H'.$row, $sv_d_ql->tong_so_HSSV_co_mat_cac_trinh_do);
        $worksheet->setCellValue('I'.$row, $sv_d_ql->tong_so_nu);
        $worksheet->setCellValue('J'.$row, $sv_d_ql->tong_so_dan_toc_thieu_so);
        $worksheet->setCellValue('K'.$row, $sv_d_ql->tong_so_ho_khau_HN);
       
        $worksheet->setCellValue('L'.$row, $sv_d_ql->so_luong_sv_Cao_dang);
        $worksheet->setCellValue('M'.$row, $sv_d_ql->so_luong_sv_nu_Cao_dang);
        $worksheet->setCellValue('N'.$row, $sv_d_ql->so_luong_sv_dan_toc_Cao_dang);
        $worksheet->setCellValue('O'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_Cao_dang);
        $worksheet->setCellValue('P'.$row, $sv_d_ql->so_luong_sv_Trung_cap);

        $worksheet->setCellValue('Q'.$row, $sv_d_ql->so_luong_sv_nu_Trung_cap);

        $worksheet->setCellValue('R'.$row, $sv_d_ql->so_luong_sv_dan_toc_Trung_cap);
        $worksheet->setCellValue('S'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_Trung_cap);
        $worksheet->setCellValue('T'.$row, $sv_d_ql->so_luong_sv_So_cap);
        $worksheet->setCellValue('U'.$row, $sv_d_ql->so_luong_sv_nu_So_cap);
        $worksheet->setCellValue('V'.$row, $sv_d_ql->so_luong_sv_dan_toc_So_cap);
        $worksheet->setCellValue('W'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_So_cap);
        $worksheet->setCellValue('X'.$row, $sv_d_ql->so_luong_sv_he_khac);
        $worksheet->setCellValue('Y'.$row, $sv_d_ql->so_luong_sv_nu_khac);
        $worksheet->setCellValue('Z'.$row, $sv_d_ql->so_luong_sv_dan_toc_khac);
        $worksheet->setCellValue('AA'.$row, $sv_d_ql->so_luong_sv_ho_khau_HN_khac);



        // KHÓA CÁC DÒNG 
        foreach($arrayAphabe as $apha){
        $worksheet->getStyle($apha.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        }
    }

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     header('Content-Disposition: attachment; filename="file-xuat.xlsx"');
     $writer->save("php://output");
  }
}
