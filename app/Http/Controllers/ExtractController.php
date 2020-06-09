<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories;
use App\Services\QlsvService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class ExtractController extends Controller
{
    protected $QlsvService;
    public function __construct(QlsvService $QlsvService)
    {
        $this->QlsvService = $QlsvService;
    }
    // phunv - Chức năng Tổng hợp trích xuất báo cáo - Danh sách đội ngũ nhà giáo
    public function danhsachnhagiao(Request $request)
    {

        $params = $request->all();
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $route_name = Route::current()->action['as'];

        
        $data = DB::table('so_lieu_doi_ngu_quan_ly')
        ->leftjoin('co_so_dao_tao', 'so_lieu_doi_ngu_quan_ly.co_so_id', '=', 'co_so_dao_tao.id')
        ->leftjoin('loai_hinh_co_so', 'co_so_dao_tao.ma_loai_hinh_co_so', '=', 'loai_hinh_co_so.id')
        ->leftjoin('co_quan_chu_quan', 'co_so_dao_tao.co_quan_chu_quan_id', '=', 'co_quan_chu_quan.id')
        ->select('so_lieu_doi_ngu_quan_ly.*', 
        DB::raw('co_so_dao_tao.ten as ten'), 
        DB::raw('loai_hinh_co_so.loai_hinh_co_so as ten_loai_hinh_co_so'),
        DB::raw('co_quan_chu_quan.ten as ten_co_quan_chu_quan')
        )
        ->get();
 
        
        $coquanchoquan = DB::table('co_quan_chu_quan')->get();
        $loaihinhcoso = DB::table('loai_hinh_co_so')->get();
        // dd($data,$coquanchoquan,$loaihinhcoso);
        $param = [
            'coquanchoquan' => $coquanchoquan,
            'loaihinhcoso'=> $loaihinhcoso
        ];
       
        return view('extractreport.danh_sach_doi_ngu_nha_giao',compact('data','param','route_name'));
    }



    public function themDanhSachDoiNguNhaGiao()
    {
        $cosodaotao = DB::table('co_so_dao_tao')->distinct()->get();
        $loaihinhcoso = DB::table('loai_hinh_co_so')->distinct()->get();
        $now = Carbon::now()->year;
        $param = [
            'cosodaotao' => $cosodaotao,
            'loaihinhcoso'=> $loaihinhcoso
        ];
        // dd($coso);
        return view('extractreport.them-moi-danh-sach-gv',compact('param','now'));
    }


    public function suaDanhSachDoiNguNhaGiao()
    {
        return view('extractreport.chinh-sua-danh-sach-doi-ngu-ql');
    }

    // phunv - end

    public function danhsachquanly()
    {
        return view('extractreport.danh_sach_doi_ngu_quan_ly');
    }
    public function add()
    {
        $data = $this ->QlsvService->getQlsv();
        $loaiHinhCs = $this->QlsvService->getLoaiHinh();
        $coso = $this->QlsvService->getCoSo();
        $nganhNghe = $this->QlsvService->getNganhNghe();
        return view('crud.add_quan_ly_sv',['data'=>$data,
                                           'loaiHinh'=>$loaiHinhCs,
                                           'coso'=>$coso,
                                           'nganhNghe'=>$nganhNghe]);
        //  dd($coso);
    }
    public function saveAdd(Request $request)
    
    {
        // $request->validate(
        //     ['co_so_id' => 'required',
        //     'nghe_id' => 'required',
        //     'so_luong_sv_nu_Cao_dang' => 'min:0|integer',
        //     'so_luong_sv_nu_Trung_cap' => 'min:0|integer',
        //     'so_luong_sv_nu_So_cap' => 'min:0|integer',
        //     'so_luong_sv_nu_khac' => 'min:0|integer',
        //     'so_luong_sv_dan_toc_Cao_dang' => 'min:0|integer',
        //     'so_luong_sv_dan_toc_Trung_cap' => 'min:0|integer',
        //     'so_luong_sv_dan_toc_So_cap' => 'min:0|integer',
        //     'so_luong_sv_dan_toc_khac' => 'min:0|integer',
        //     'so_luong_sv_ho_khau_HN_Cao_dang' => 'min:0|integer',
        //     'so_luong_sv_ho_khau_HN_Trung_cap' => 'min:0|integer',
        //     'so_luong_sv_ho_khau_HN_So_cap' => 'min:0|integer',
        //     'so_luong_sv_ho_khau_HN_khac' => 'min:0|integer',
        //     'so_luong_sv_Cao_dang' => 'min:0|integer',
        //     'so_luong_sv_Trung_cap' => 'min:0|integer',
        //     'so_luong_sv_So_cap' => 'min:0|integer',
        //     'so_luong_sv_he_khac' => 'min:0|integer',
        // ], 
        // [
        //     'co_so_id.required' => 'Bạn không được bỏ trống ',
        //     'nghe_id.required' => 'Bạn không được bỏ trống',
          
        //     'so_luong_sv_nu_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_nu_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_nu_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_nu_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_nu_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_nu_So_cap.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_nu_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_nu_khac.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_dan_toc_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_dan_toc_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_dan_toc_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_dan_toc_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_dan_toc_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_dan_toc_So_cap.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_dan_toc_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_dan_toc_khac.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_ho_khau_HN_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_ho_khau_HN_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_ho_khau_HN_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_ho_khau_HN_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
            
        //     'so_luong_sv_ho_khau_HN_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_ho_khau_HN_So_cap.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_ho_khau_HN_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_ho_khau_HN_khac.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_Cao_dang.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_Cao_dang.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_Trung_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_Trung_cap.integer' => 'Vui lòng nhập số nguyên',
           
        //     'so_luong_sv_So_cap.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_So_cap.integer' => 'Vui lòng nhập số nguyên',

        //     'so_luong_sv_he_khac.min' => 'Vui lòng nhập giá trị lớn hơn hoặc bằng 0',
        //     'so_luong_sv_he_khac.integer' => 'Vui lòng nhập số nguyên',
        // ]
        // );
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        $this->QlsvService->create($request);
        // dd($request);
        return redirect('/xuat-bao-cao/so-lieu-sinh-vien-dang-theo-hoc')->withInput();
    }
    public function edit($id)
    {
        $data = $this->QlsvService->suaSoLieuSv($id);
        $nganhNghe = $this->QlsvService->getNganhNghe();
        return view('crud.edit_quan_ly_sv',[ 'data' => $data,'nganhNghe'=> $nganhNghe]);
    }
    public function saveEdit($id, Request $request)
    {
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        // $data = $request->all();
        $getdata = $request->all();
        $this->QlsvService->update($id, $request);
        $dataqlsv = $this->QlsvService->findById($id);
        // dd( $this->QlsvService->update($id, $request));
        return redirect()->route('xuatbc.chi-tiet-so-lieu', ['co_so_id'=>$dataqlsv->co_so_id]);
    }
    public function tonghopsvdanghoc()
    {
        
        $params = request()->all();
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        // dd($params);
        $data = $this->QlsvService->getQlsv($params);
        // $nam = $this->QlsvService->getNamDaoTao();
        $loaiHinhCs = $this->QlsvService->getLoaiHinh();
        $coso = $this->QlsvService->getCoSo();
        return view('extractreport.tong_hop_sinh_vien_dang_theo_hoc',[
            // 'nam' => $nam,
            'data' => $data,
            'loaiHinh' => $loaiHinhCs,
            'coso'=>$coso,
            
        ]);
    }
    public function tongHopChiTietSvDangTheoHoc($coSoId){
        
        $queryData = request()->all();
        $data = $this->QlsvService->chiTietSoLieuQlsv($coSoId,$queryData);
        $loaiHinhCs = $this->QlsvService->getLoaiHinh();
        $coso = $this->QlsvService->getCoSo();
        $nganhNghe = $this->QlsvService->getNganhNghe();
        //  dd($data);
        return view('extractreport.lich_su_sinh_vien_dang_theo_hoc',[
            'data' =>$data,
            'loaiHinh' => $loaiHinhCs,
            'coso'=>$coso,
            'nganhNghe'=> $nganhNghe,
            'query'=>$queryData]);

    }
    
    public function tonghopchinhsachsv()
    {
        return view('extractreport.tong_hop_thuc_hien_chinh_sach_cho_sinh_vien');
    }
    public function tonghopkqtuyensinh()
    {
        return view('extractreport.tong_hop_ket_qua_tuyen_sinh');
    }
    public function chiteittonghopkqtuyensinh()
    {
        return view('extractreport.chi_tiet_tong_hop_ket_qua_tuyen_sinh');
    }

    public function tonghopxdchuongtrinh()
    {
        return view('extractreport.tong_hop_xay_dung_chuong_trinh_giao_trinh');
    }
    public function tonghopdaotaonguoikhuyettat()
    {
        return view('extractreport.tong_hop_dao_tao_nghe_cho_nguoi_khuyet_tat');
    }
    public function tonghopdaotaothanhnien()
    {
        return view('extractreport.tong_hop_dao_tao_nghe_cho_thanh_nien');
    }
    public function tonghopdaotaovoidoanhnghiep()
    {
        return view('extractreport.tong_hop_dao_tao_nghe_gan_voi_doanh_nghiep');
    }
    public function tonghophoptacquocte()
    {
        return view('extractreport.tong_hop_hop_tac_quoc_te');
    }
    public function tonghoptuyensinh()
    {
        return view('solieutuyensinh.tong_hop_so_lieu_tuyen_sinh');
    }
}