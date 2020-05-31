<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportKqtsController extends Controller
{
    public function importFile(Request $request){

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $data =$spreadsheet->getActiveSheet()->toArray();
            $truong = explode(' ', $data[0][2]);
            $id_truong = array_pop($truong);
      
            // $arrayError=[];
            $error=[];
            $vitri=[];
            $yeucau=[];
            // vòng for này để check lỗi nếu có thì cho hết lỗi vào các array $error, $vitri, $yeucau
            for($i = 2; $i < count($data); $i++){  
      
                $mon_chuyen = explode(' - ', $data[$i][3]);
                $id_mon_chuyen = array_pop($mon_chuyen);
      
                $rowNumber = $i+1;
      
                if($data[$i][0]==null){
                  // $array[$i]=
                  array_push($error,$data[$i][0]);
                  array_push($vitri,'A'.$rowNumber);
                  array_push($yeucau, 'Không được rỗng');
                }
                if(!is_numeric($data[$i][1]) || $data[$i][1]==null ){
                    array_push($error,$data[$i][1]);
                    array_push($vitri,'B'.$rowNumber);
                    array_push($yeucau, 'Không được rỗng và phải là số');
                }
                if($data[$i][2]==null){
                  array_push($error,$data[$i][2]);
                  array_push($vitri,'C'.$rowNumber);
                  array_push($yeucau, 'Không được rỗng');
                }
                if($id_mon_chuyen==null){
                  array_push($error,$id_mon_chuyen);
                  array_push($vitri,'D'.$rowNumber);
                  array_push($yeucau, 'Chọn môn');
                }
            }
      
            
            if($vitri == null || $vitri == '' ){

              $truong = explode(' ', $data[0][2]);
              $id_truong = array_pop($truong);
      
      
              for($i = 2; $i < count($data); $i++){ 
                $rowNumber = $i+1;
                $mon_chuyen = explode(' - ', $data[$i][3]);
                $id_mon_chuyen = array_pop($mon_chuyen);
                         $arrayData=[
                                'ten'=> $data[$i][0],
                                'gioi_tinh'=> $data[$i][1],
                                'mon_chung'=>$data[$i][2],
                                'nghe_id'=>$id_mon_chuyen,
                                'dan_toc_it_nguoi'=>$data[$i][4],
                                'giao_su'=>$data[$i][5],
                                'pho_giao_su'=>$data[$i][6],
                                'nha_giao_nhan_dan'=>$data[$i][7],
                                'nha_giao_uu_tu'=>$data[$i][8],
                                'loai_hop_dong'=>$data[$i][9],
                                'trinh_do_ngoai_ngu'=>$data[$i][10],
                                'trinh_do_tin_hoc'=>$data[$i][11],
                                'trinh_do_ky_nang_nghe'=>$data[$i][12],
                                'trinh_do_nghiep_vu_su_pham'=>$data[$i][13],
                                'co_so_id'=>$id_truong,
                                'trinh_do_id'=>$data[$i][14],
                              ];
                             Teacher::insert($arrayData);
              }
             return response()->json('ok',200); 
      
            }       
        }
}
