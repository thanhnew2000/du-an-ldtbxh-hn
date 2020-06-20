<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;

trait ExcelTraitService
{

    public function createSpreadSheet($fileRead,$duoiFile){
        if ($duoiFile =='xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
         }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
         }
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($fileRead);
        return $spreadsheet;
    }



    public function lockedCellInExcel($worksheet,$arrayLock){
        foreach($arrayLock as $cellLock){
            $worksheet->getStyle($cellLock)->getProtection()->setLocked(Protection::PROTECTION_PROTECTED);
        }
    }
    
    public function checkError($data, $arrayApha, $dongstart, $cotstart, $cotend){
        $vitri=[];
        for($i = $dongstart ; $i < count($data); $i++){ 
            $key_aphabel=-1;
               $rowNumber = $i+1; 
               for($j=  $cotstart ; $j <= $cotend ; $j++){  
                     $key_aphabel++;
                       if( (is_string($data[$i][$j])) || ($data[$i][$j] < 0) ){
                       array_push($vitri,$arrayApha[$key_aphabel].$rowNumber);
                    }
               }
           }
        return $vitri;
    }
    
    public function bacDaoTaoOfTruong($loaitruong){
        $loai_truong ='';
        switch ($loaitruong) {
            case 3:
                $loai_truong = 'TRƯỜNG SƠ CẤP';
                break;
            case 2:
                $loai_truong = 'TRƯỜNG TRUNG CẤP';
                break;
            case 1:
                $loai_truong = 'TRƯỜNG CAO ĐẲNG';
                break;
        } 
      return $loai_truong;
    }

}
?>