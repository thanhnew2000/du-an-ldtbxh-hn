<?php

namespace App\Services;

use App\Services\AppService;
use App\Repositories\SoLieuCanBoQuanLyRepositoryInterface;
use App\Repositories\CoSoDaoTaoRepositoryInterface;
use App\Repositories\TrinhDoGiaoVienRepositoryInterface;
use App\Repositories\LoaiHinhCoSoRepositoryInterface;
use App\Repositories\SoLieuTuyenSinhInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use Carbon\Carbon;
use Storage;
use Arr;

class SoLieuCanBoQuanLyService extends AppService
{
    protected $soLieuCBQLRepository;
    protected $csdtRepository;
    protected $loaiHinhRepository;
    protected $soLieuTuyenSinhRepository;
    use ExcelTraitService;


    public function __construct(
        SoLieuCanBoQuanLyRepositoryInterface $soLieuCanBoQuanLyRepository,
        CoSoDaoTaoRepositoryInterface $csdtRepository,
        LoaiHinhCoSoRepositoryInterface $loaiHinhRepository,
        SoLieuTuyenSinhInterface $soLieuTuyenSinhRepository
    ) {
        $this->soLieuCBQLRepository = $soLieuCanBoQuanLyRepository;
        $this->csdtRepository = $csdtRepository;
        $this->loaiHinhRepository = $loaiHinhRepository;
        $this->soLieuTuyenSinhRepository = $soLieuTuyenSinhRepository;
        // $this->nganhNgheRepository = $nganhNgheRepository;
    }

    public function getFilterConfig()
    {
        $filterConfig = config('filters.so_lieu_can_bo_quan_ly');
        $filterConfig['url'] = route('so-lieu-can-bo-quan-ly.index');

        $filterData = $this->soLieuCBQLRepository->getFilterData()->toArray();

        $filterConfig['partials']['co_so_dao_tao_id']['options'] = Arr::pluck($filterData, 'ten_co_so', 'co_so_dao_tao_id');
        $filterConfig['partials']['loai_hinh_id']['options'] = Arr::pluck($filterData, 'loai_hinh', 'loai_hinh_id');

        $nam = Arr::pluck($filterData, 'nam');
        $dot = Arr::pluck($filterData, 'dot');

        $filterConfig['partials']['nam']['options'] = array_combine($nam, $nam);
        $filterConfig['partials']['dot']['options'] = array_combine($dot, $dot);

        return $filterConfig;
    }

    public function getList($params = [], $limit = 10)
    {
        return $this->soLieuCBQLRepository->getList($params, $limit);
    }

    public function getListCoSo()
    {
        return $this->csdtRepository->getAllWithLoaiHinh();
    }

    public function getListLoaiHinh()
    {
        return $this->loaiHinhRepository->getAll();
    }

    public function store($params)
    {
        $data = array_filter($params);
        return $this->soLieuCBQLRepository->store($data);
    }

    public function updateSoLieu($id, $params)
    {
        $data = array_filter($params);
        return $this->soLieuCBQLRepository->update($id, $data);
    }

    public function getCoSo(int $soLieuId)
    {
        return $this->csdtRepository->getCoSoBySoLieuId($soLieuId);
    }

    public function getListByCoSo($coSoId, int $limit = 20, array $params = [])
    {
        return $this->soLieuCBQLRepository->getListByCoSo($coSoId, $limit, $params);
    }

    // thanhnv update change to service 6/24/2020
    public function exportBieuMau($id_coso){
        $co_so = DB::table('co_so_dao_tao')->where('id', $id_coso)->first();
        $spreadsheet = IOFactory::load('file_excel/quanlycanbo/bieu-mau-quan-ly-can-bo.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        
        $worksheet->setCellValue('A9', "Trường: $co_so->ten - $id_coso ");

        $loai_truong = $this->bacDaoTaoOfTruong($co_so->loai_truong);
        $worksheet->setCellValue('A8', $loai_truong);
        $worksheet->getStyle("A8")->getFont()->setBold(true);
        $worksheet->getStyle("A8:V8")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');

        $worksheet->getColumnDimension('A')->setAutoSize(true);
        //  tạo khóa đê khóa các dòng
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);

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
        $arrayLock =['B9','C9','D9','E9','A9','A8'];
        $this->lockedCellInExcel($worksheet,$arrayLock);

        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file-form-nhap.xlsx"');
        $writer->save("php://output");
    }

    public function exportData($id_truong,$nam_muon_xuat,$dot_muon_xuat){
        $spreadsheet = IOFactory::load('file_excel/quanlycanbo/bieu-mau-quan-ly-can-bo.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
    
        $co_so = DB::table('co_so_dao_tao')->where('id', $id_truong)->first();

        $worksheet->setCellValue('A9', "Trường: $co_so->ten - $id_truong ");        

        $loai_truong = $this->bacDaoTaoOfTruong($co_so->loai_truong);
        $worksheet->setCellValue('A8', $loai_truong);
        $worksheet->getStyle("A8")->getFont()->setBold(true);
        $worksheet->getStyle("A8:V8")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C7C7C7');

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
        $spreadsheet->getDefaultStyle()->getProtection()->setLocked(true);

        $so_lieu_quan_ly_cua_co_so = DB::table('so_lieu_can_bo_quan_ly')
        ->where('co_so_dao_tao_id', $id_truong)
        ->where('nam', $nam_muon_xuat)
        ->where('dot', $dot_muon_xuat)
        ->first();

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
            $worksheet->getStyle($apha.'9')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);
        }
          
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="file-xuat.xlsx"');
         $writer->save("php://output");

    }

    public function importFile($fileRead, $duoiFile, $year, $dot){
        $message='';
        $spreadsheet = $this->createSpreadSheet($fileRead,$duoiFile);
        $data =$spreadsheet->getActiveSheet()->toArray();
        
        $truong = explode(' - ', $data[8][0]);
        $id_truong = trim(array_pop($truong));


        $arrayApha=['F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'];

        $csCheck = DB::table('co_so_dao_tao')->find($id_truong);

        if($csCheck == null){
            $message='noCorrectIdTruong';
            return $message;  
        }

        $checkSoLieuCanBo = DB::table('so_lieu_can_bo_quan_ly')
        ->where('co_so_dao_tao_id', $id_truong)
        ->where('nam', '=', $year)
        ->where('dot', '=', $dot)
        ->first();

        $vitri=$this->checkError($data, $arrayApha, 8 , 5, 21);
        if(count($vitri) > 0 ){
                $message='errorkitu';
                return $message;  
        }

        $arrayData=[];
        if(count($data) == 9){
            if($vitri == null || $vitri == ''){
                        $arrayData=[
                            "co_so_dao_tao_id"=> $id_truong,
                            'loai_hinh_co_so_id'=> $csCheck->ma_loai_hinh_co_so,
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
                            // DB::table('so_lieu_can_bo_quan_ly')->insert($arrayData);
                            $this->soLieuCBQLRepository->createSoLieuCanBoQl($arrayData);
                       }else {
                         //   DB::table('so_lieu_can_bo_quan_ly')->where('id',$checkSoLieuCanBo->id)->update($arrayData);
                          $this->soLieuCBQLRepository->updateSoLieuCanBoQl($checkSoLieuCanBo->id,$arrayData);
                       }

                $message='ok';
                return $message;  
            }
    }else{
        $message='nhapKhongDungDong';
        return $message;  
    }
}

public function importError($fileRead,$duoiFile,$path){
    $fileReadStorage= storage_path('app/public/'.$path);
  
    $spreadsheet = $this->createSpreadSheet($fileReadStorage,$duoiFile);
    $data = $spreadsheet->getActiveSheet()->toArray();
        
    $truong = explode(' - ', $data[8][0]);
    $id_truong = trim(array_pop($truong));


    $arrayApha=['F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'];

    $vitri=$this->checkError($data, $arrayApha, 8 , 5, 21);

    $spreadsheet2 = IOFactory::load($fileReadStorage);
    $worksheet = $spreadsheet2->getActiveSheet();
    Storage::delete($path);

    for($i = 0; $i < count($vitri);$i++){
        $worksheet->getStyle($vitri[$i])
        ->getBorders()
        ->getAllBorders()
        ->setBorderStyle(Border::BORDER_THIN);
        //  màu ô
        $worksheet->getStyle($vitri[$i])->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('FFFF0000');
    }  

    $writer = IOFactory::createWriter($spreadsheet2, "Xlsx"); 
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="error.xlsx"');
    $writer->save("php://output");
} 

}
