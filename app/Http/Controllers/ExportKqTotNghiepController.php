<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
class ExportKqTotNghiepController extends Controller
{
    public function taiBieuMau(Request $request){

        $id_co_so =$request->id_cs;
        $co_so = DB::table('co_so_dao_tao')->where('id', $request->id_cs)->first();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/totnghiep/bieu-mau-tot-nghiep.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        
        $worksheet->setCellValue('C9', "Trường: $co_so->ten - $id_co_so ");

        if($co_so->loai_truong == 1){
            $worksheet->setCellValue('C8', 'TRƯỜNG CAO ĐẲNG');
        }elseif($co_so->loai_truong == 2){
            $worksheet->setCellValue('C8', 'TRƯỜNG TRUNG CẤP');
        }elseif($co_so->loai_truong == 3){
            $worksheet->setCellValue('C8', 'TRƯỜNG SƠ CẤP');
        }
        $worksheet->getColumnDimension('C')->setAutoSize(true);


        $co_so_nghe = DB::table('co_so_dao_tao')->where('co_so_dao_tao.id', '=', $id_co_so)
		->join('giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao', 'co_so_dao_tao.id', '=', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.co_so_id')
		->join('nganh_nghe', 'giay_chung_nhan_dang_ky_nghe_duoc_phep_dao_tao.nghe_id', '=', 'nganh_nghe.id')
        ->select('co_so_dao_tao.ma_loai_hinh_co_so','co_so_dao_tao.loai_truong','nganh_nghe.id','nganh_nghe.ten_nganh_nghe')
        ->orderBy('nganh_nghe.id','desc')
        ->get();

        //  tạo khóa đê khóa các dòng
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('C8')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
        $worksheet->getStyle('C9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        $row=9;
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
        // thienth
    }

    public function exportDataTotNghiep(Request $request){
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

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('file_excel/totnghiep/bieu-mau-tot-nghiep.xlsx');
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
        $worksheet->setCellValue('C9','Trường: '.$name_truong->ten.' - '.$id_truong);

        // TẠO KHÓA
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
        $worksheet->getStyle('C9')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);


        $arrayNN=[];
        $maloaihinhcs;
        foreach($cs_nganh_nghe as $ng){
            $arrayNN[$ng->id]=$ng->ten_nganh_nghe;
            $maloaihinhcs=$ng->ma_loai_hinh_co_so;
        }
        
        if($name_truong->loai_truong == 1){
            $worksheet->setCellValue('C8', 'TRƯỜNG CAO ĐẲNG');
        }elseif($name_truong->loai_truong == 2){
            $worksheet->setCellValue('C8', 'TRƯỜNG TRUNG CẤP');
        }else{
            $worksheet->setCellValue('C8', 'TRƯỜNG SƠ CẤP');
        }
        $worksheet->getColumnDimension('C')->setAutoSize(true);

        $tot_nghiep_cs= DB::table('sv_tot_nghiep')->where('co_so_id','=',$id_truong)
        ->where('nam','=',$nam_muon_xuat)->where('dot','=',$dot_muon_xuat)->orderBy('nghe_id', 'asc')->get();

         // tạo arrayAphabe để boder đen ô mới setValue
         $arrayAphabe=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC'];

         $row=9;
         foreach($tot_nghiep_cs as $tn_cs){
             $row ++;
 
             // border đen các ô
             foreach($arrayAphabe as $apha){
                 $worksheet->getStyle($apha.$row)->applyFromArray($styleArray);
             }
             // gán giá trị các ô 
             $worksheet->setCellValue('B'.$row, $tn_cs->nghe_id);
             $worksheet->setCellValue('C'.$row, $arrayNN[$tn_cs->nghe_id]);
 
             if ($maloaihinhcs == 9) {
                 $worksheet->setCellValue('F'.$row, 'x');
             }else if($maloaihinhcs == 14){
                 $worksheet->setCellValue('G'.$row, 'x');
             }else if($maloaihinhcs == 15){
                 $worksheet->setCellValue('E'.$row, 'x');
             }else if($maloaihinhcs == 4){
                 $worksheet->setCellValue('D'.$row, 'x');
             }
            
             
             $worksheet->setCellValue('H'.$row, $tn_cs->Tong_SoNguoi_TN);
             $worksheet->setCellValue('I'.$row, $tn_cs->NU_SV_TN);
             $worksheet->setCellValue('J'.$row, $tn_cs->DanToc_ThieuSo_ItNguoi);
             $worksheet->setCellValue('K'.$row, $tn_cs->HoKhauHN);
            
             $worksheet->setCellValue('L'.$row, $tn_cs->SoSV_NhapHoc_DauKhoa_TrinhDoCD);
             $worksheet->setCellValue('M'.$row, $tn_cs->SoSV_Du_DieuKienThi_XetTN_TrinhDoCD);
             $worksheet->setCellValue('N'.$row, $tn_cs->SoSV_TN_TrinhDoCD);
             $worksheet->setCellValue('O'.$row, $tn_cs->SoLuong_Nu_SV_CD);
             $worksheet->setCellValue('P'.$row, $tn_cs->DanToc_ThieuSo_ItNguoi_CD);
             
             $worksheet->setCellValue('Q'.$row, $tn_cs->SoSV_HoKhauHN_CD);
             $worksheet->setCellValue('R'.$row, $tn_cs->SoLuong_HSSV_TN_Kha_Gioi_CD);
             $worksheet->setCellValue('S'.$row, $tn_cs->SoSV_NhapHoc_DauKhoa_TrinhDoTC);
             $worksheet->setCellValue('T'.$row, $tn_cs->SoSV_Du_DieuKienTHhi_XetTN_TrinhDoTC);
             $worksheet->setCellValue('U'.$row, $tn_cs->SoSV_TN_TrinhDoTC);
             $worksheet->setCellValue('V'.$row, $tn_cs->SoLuong_Nu_SV_TC);
             $worksheet->setCellValue('W'.$row, $tn_cs->DanToc_ThieuSo_ItNguoi_TC);
             $worksheet->setCellValue('X'.$row, $tn_cs->SoSV_HoKhauHN_TC);

             
             $worksheet->setCellValue('Y'.$row, $tn_cs->HoKhau_HN_Thuoc_DoiTuong_TN_TC);

             $worksheet->setCellValue('Z'.$row, $tn_cs->SoLuong_HSSV_TN_Kha_Gioi_TC);
             $worksheet->setCellValue('AA'.$row, $tn_cs->SoSV_NhapHoc_DauKhoa_TrinhDoSC);
             $worksheet->setCellValue('AB'.$row, $tn_cs->SoSV_Du_DieuKienThi_XetTN_TrinhDoSC);
             $worksheet->setCellValue('AC'.$row, $tn_cs->SoSV_TN_TrinhDoSC);

             $worksheet->setCellValue('AD'.$row, $tn_cs->SoLuong_Nu_SV_SC);
             $worksheet->setCellValue('AE'.$row, $tn_cs->DanToc_ThieuSo_ItNguoi_SC);
             $worksheet->setCellValue('AF'.$row, $tn_cs->SoSV_HoKhauHN_SC);
 
             $worksheet->setCellValue('AG'.$row, $tn_cs->SoSV_NhapHoc_DauKhoa_NgheKhac);
             $worksheet->setCellValue('AH'.$row, $tn_cs->SoSV_DuKienThi_XetTN_NgheKhac);
             $worksheet->setCellValue('AI'.$row, $tn_cs->SoSV_TN_NgheKhac);
 
             $worksheet->setCellValue('AJ'.$row, $tn_cs->SoLuong_Nu_SV_NgheKhac);
             $worksheet->setCellValue('AK'.$row, $tn_cs->DanToc_ThieuSo_ItNguoi_NgheKhac);
             $worksheet->setCellValue('AL'.$row, $tn_cs->SoNguoi_HoKhauHN_NgheKhac);


             $worksheet->setCellValue('AM'.$row, $tn_cs->SoNguoi_CoViecLamNgay_SauKhi_TN_CD);
             $worksheet->setCellValue('AN'.$row, $tn_cs->CoViecLam_HoKhauHN_TrinhDoCD);
             $worksheet->setCellValue('AO'.$row, $tn_cs->SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoTC);
             $worksheet->setCellValue('AP'.$row, $tn_cs->CoViecLam_HoKhauHN_TrinhDo_TC);
             $worksheet->setCellValue('AQ'.$row, $tn_cs->SV_CoViecLam_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC);
             $worksheet->setCellValue('AR'.$row, $tn_cs->SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoSC);
             $worksheet->setCellValue('AS'.$row, $tn_cs->SoLuong_HoKhauHN_TrinhDoSC);
         

             $worksheet->setCellValue('AT'.$row, $tn_cs->SoNguoiHoc_CoViecLamNgay_SauKhi_TN_DaoTao_NgheKhac);
             $worksheet->setCellValue('AU'.$row, $tn_cs->SoNguoi_HoKhauHN_TrinhDo_DaoTao_NgheKhac);


             $worksheet->setCellValue('AV'.$row, $tn_cs->MucLuong_TB_CD);
             $worksheet->setCellValue('AW'.$row, $tn_cs->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoCD);
             $worksheet->setCellValue('AX'.$row, $tn_cs->MucLuong_TB_TC);
             $worksheet->setCellValue('AY'.$row, $tn_cs->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC);
             $worksheet->setCellValue('AZ'.$row, $tn_cs->MucLuong_TB_SC);
             $worksheet->setCellValue('BA'.$row, $tn_cs->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoSC);
             $worksheet->setCellValue('BB'.$row, $tn_cs->MucLuong_TB_NgheKhac);
             $worksheet->setCellValue('BC'.$row, $tn_cs->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoNgheKhac);

 
             // // KHÓA CÁC DÒNG Ô
 
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