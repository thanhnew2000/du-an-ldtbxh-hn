<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
class ExportSVController extends Controller
{


 
    public function exportFormNhapSinhVien(Request $request){
        $id_co_so =$request->id_cs;
        $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/form-export-data-tuyen-sinh.xls');
        $worksheet = $spreadsheet->getActiveSheet();
        
        $worksheet->setCellValue('C8', "Trường: $co_so->ten - $id_co_so ");

        if($co_so->loai_truong == 1){
            $worksheet->setCellValue('C7', 'TRƯỜNG CAO ĐẲNG');
        }elseif($co_so->loai_truong == 2){
            $worksheet->setCellValue('C7', 'TRƯỜNG TRUNG CẤP');
        }elseif($co_so->loai_truong == 3){
            $worksheet->setCellValue('C7', 'TRƯỜNG SƠ CẤP');
        }



        $co_so_nghe = DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=', $id_co_so)
		->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
		->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
		->select('co_so_dao_tao.ma_loai_hinh_co_so','co_so_dao_tao.loai_truong','nganh_nghe.id','nganh_nghe.ten_nganh_nghe')->get();

        //  tạo khóa đê khóa các dòng
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('C7')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        $worksheet->getStyle('C8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

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
        header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
        $writer->save("php://output");

      }


      public function exportDataSV(Request $request){

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


        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/form-export-data-tuyen-sinh.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();

        // nhận request về trường , đợt, năm để xuất
        $id_truong = $request->truong_id;
        $nam_muon_xuat = $request->nam_muon_xuat;
        $dot_muon_xuat = $request->dot_muon_xuat;

        // lấy các tên nghề ,cơ sở đào tạo join bảng giấy phép đăng kí nghề (với id cơ sở đào tạo nhận từ request)
        $cs_nganh_nghe= DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=',$id_truong)
        ->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
        ->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
        ->select('co_so_dao_tao.ma_loai_hinh_co_so','co_so_dao_tao.loai_truong','nganh_nghe.id','nganh_nghe.ten_nganh_nghe')->orderBy('nganh_nghe.id', 'desc')->get();
     
        
        // lấy tên trường gán cho ô C8
        $name_truong = DB::table('co_so_dao_tao')->where('id', $id_truong)->select('co_so_dao_tao.ten','co_so_dao_tao.loai_truong')->first();
        $worksheet->setCellValue('C8','Trường: '.$name_truong->ten.' - '.$id_truong);

        // TẠO KHÓA
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('C8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);


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

        $tuyen_sinh_cs= DB::table('tuyen_sinh')->where('co_so_id','=',$id_truong)
        ->where('nam','=',$nam_muon_xuat)->where('dot','=',$dot_muon_xuat)->orderBy('nghe_id', 'asc')->get();

        // tạo arrayAphabe để boder đen ô mới setValue
        $arrayAphabe=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK'];
        $row=8;
        foreach($tuyen_sinh_cs as $ts_cs){
            $row ++;

            // border đen các ô
            foreach($arrayAphabe as $apha){
                $worksheet->getStyle($apha.$row)->applyFromArray($styleArray);
            }
            // gán giá trị các ô 
            $worksheet->setCellValue('B'.$row, $ts_cs->nghe_id);
            $worksheet->setCellValue('C'.$row, $arrayNN[$ts_cs->nghe_id]);

            if ($maloaihinhcs == 9) {
                $worksheet->setCellValue('F'.$row, 'x');
            }else if($maloaihinhcs == 14){
                $worksheet->setCellValue('G'.$row, 'x');
            }else if($maloaihinhcs == 15){
                $worksheet->setCellValue('E'.$row, 'x');
            }else if($maloaihinhcs == 4){
                $worksheet->setCellValue('D'.$row, 'x');
            }

            $worksheet->setCellValue('H'.$row, $ts_cs->tong_so_tuyen_sinh);
            $worksheet->setCellValue('I'.$row, $ts_cs->ke_hoach_tuyen_sinh_cao_dang);
            $worksheet->setCellValue('J'.$row, $ts_cs->ke_hoach_tuyen_sinh_trung_cap );
            $worksheet->setCellValue('K'.$row, $ts_cs->ke_hoach_tuyen_sinh_so_cap);
           
            $worksheet->setCellValue('L'.$row, $ts_cs->ke_hoach_tuyen_sinh_khac);
            $worksheet->setCellValue('M'.$row, $ts_cs->tong_so_tuyen_sinh_cac_trinh_do);
            $worksheet->setCellValue('N'.$row, $ts_cs->tong_so_nu);
            $worksheet->setCellValue('O'.$row, $ts_cs->tong_so_dan_toc);
            $worksheet->setCellValue('P'.$row, $ts_cs->tong_ho_khau_HN);

            $worksheet->setCellValue('Q'.$row, $ts_cs->so_luong_sv_Cao_dang);

            $worksheet->setCellValue('R'.$row, $ts_cs->so_luong_sv_nu_Cao_dang);
            $worksheet->setCellValue('S'.$row, $ts_cs->so_luong_sv_dan_toc_Cao_dang);
            $worksheet->setCellValue('T'.$row, $ts_cs->so_luong_sv_ho_khau_HN_Cao_dang);
            $worksheet->setCellValue('U'.$row, $ts_cs->so_tuyen_moi_Cao_dang);
            $worksheet->setCellValue('V'.$row, $ts_cs->so_lien_thong_Cao_dang);
            $worksheet->setCellValue('W'.$row, $ts_cs->so_luong_sv_Trung_cap);
            $worksheet->setCellValue('X'.$row, $ts_cs->so_luong_sv_nu_Trung_cap);
            $worksheet->setCellValue('Y'.$row, $ts_cs->so_luong_sv_dan_toc_Trung_cap);
            $worksheet->setCellValue('Z'.$row, $ts_cs->so_luong_sv_ho_khau_HN_Trung_cap);

            $worksheet->setCellValue('AA'.$row, $ts_cs->ho_khau_HN_THCS_Trung_cap);
            $worksheet->setCellValue('AB'.$row, $ts_cs->so_Tot_nghiep_THCS);
            $worksheet->setCellValue('AC'.$row, $ts_cs->so_Tot_nghiep_THPT);
            $worksheet->setCellValue('AD'.$row, $ts_cs->so_luong_sv_So_cap);

            $worksheet->setCellValue('AE'.$row, $ts_cs->so_luong_sv_nu_So_cap);
            $worksheet->setCellValue('AF'.$row, $ts_cs->so_luong_sv_dan_toc_So_cap);
            $worksheet->setCellValue('AG'.$row, $ts_cs->so_luong_sv_ho_khau_HN_So_cap);

            $worksheet->setCellValue('AH'.$row, $ts_cs->so_luong_sv_he_khac);
            $worksheet->setCellValue('AI'.$row, $ts_cs->so_luong_sv_nu_khac);
            $worksheet->setCellValue('AJ'.$row, $ts_cs->so_luong_sv_dan_toc_khac);
            $worksheet->setCellValue('AK'.$row, $ts_cs->so_luong_sv_ho_khau_HN_khac);


            // // KHÓA CÁC DÒNG Ô
            $worksheet->getStyle('B'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('C'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('D'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('E'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('F'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
            $worksheet->getStyle('G'.$row)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
      
        }

  
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="file-xuat.xlsx"');
         $writer->save("php://output");
      }
    }


