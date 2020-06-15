<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateAddDoiNguNhaGiao;
use App\Http\Requests\validateUpdateDoiNguNhaGiao;
use Illuminate\Http\Request;
use App\Repositories;
use App\Services\QlsvService;
use App\Services\DoiNguNhaGiaoService;
use App\Services\LoaiHinhCoSoService;
use App\Services\CoQuanChuQuanService;
use App\Services\CoSoDaoTaoService;
use App\Services\NganhNgheService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class ExtractController extends Controller
{
    protected $QlsvService;
    protected $DoiNguNhaGiaoService;
    protected $LoaiHinhCoSoService;
    protected $CoQuanChuQuanService;
    protected $CoSoDaoTaoService;
    protected $NganhNgheService;
    

    public function __construct(
        QlsvService $QlsvService, 
        DoiNguNhaGiaoService $DoiNguNhaGiaoService,
        LoaiHinhCoSoService $LoaiHinhCoSoService,
        CoQuanChuQuanService $CoQuanChuQuanService,
        CoSoDaoTaoService $CoSoDaoTaoService,
        NganhNgheService $NganhNgheService
        )
    {
        $this->QlsvService = $QlsvService;
        $this->DoiNguNhaGiaoService = $DoiNguNhaGiaoService;
        $this->LoaiHinhCoSoService = $LoaiHinhCoSoService;
        $this->CoQuanChuQuanService = $CoQuanChuQuanService;
        $this->CoSoDaoTaoService =$CoSoDaoTaoService;
        $this->NganhNgheService =$NganhNgheService;
    }

    // phunv - Chức năng Tổng hợp trích xuất báo cáo - Danh sách đội ngũ nhà giáo

    /* Danh sách đội ngũ nhà giáo.
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function danhsachnhagiao(Request $request)
    {
        $params = $request->all();
        
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $route_name = Route::current()->action['as'];
     
        $data = $this->DoiNguNhaGiaoService->getDanhSachDoiNguNhaGiao($params);
        $getloaihinhcoso = $this->LoaiHinhCoSoService->getAll();
        $getcoquanchuquan = $this->CoQuanChuQuanService->getAll();
        $get_nganh_nghe = $this->NganhNgheService->getAll();
        $nam = Carbon::now()->year;

        $data->withPath("?coquanchuquan=$request->coquanchuquan&
                          loaihinhcoso=$request->loaihinhcoso&
                          dot=$request->dot&
                          nam=$request->nam&
                          keyword=$request->keyword");  
        if($data->count() < 1){
            return view('extractreport.danh_sach_doi_ngu_nha_giao', 
            compact('data','params','route_name','getcoquanchuquan','getloaihinhcoso','get_nganh_nghe','nam'),
            ['thongbao'=>'Không tìm thấy kết quả !']
        );
        }      
        return view('extractreport.danh_sach_doi_ngu_nha_giao',
        compact('data','params','route_name','getcoquanchuquan','getloaihinhcoso','get_nganh_nghe','nam'),
        ['thongbao'=>'']
    );
    }

    /* Danh sách chi tiết đội ngũ nhà giáo theo cơ sở.
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function chiTietTheoCoSo(Request $request,$co_so_id){
        $params = $request->all();
        if(!isset($params['page_size'])) $params['page_size'] = config('common.paginate_size.default');
        $route_name = Route::current()->action['as'];

        $data = $this->DoiNguNhaGiaoService->chiTietTheoCoSo($co_so_id, $params);
        $thongtincoso = $this->CoSoDaoTaoService->getSingleCsdt($co_so_id);
        $yearTime = Carbon::now()->year;
       
        $data->withPath("?dot=$request->dot&
                          nam=$request->nam"); 

        if($data->count() < 1){
            return view('extractreport.danh_sach_chi_tiet_doi_ngu_nha_giao',
            compact('data','params','thongtincoso','yearTime','route_name'),['thongbao'=>'Không tìm thấy kết quả !']);
        } 
        return view('extractreport.danh_sach_chi_tiet_doi_ngu_nha_giao',
        compact('data','params','thongtincoso','yearTime','route_name'),['thongbao'=>'']);
    }

    /* Màn hình thêm Danh sách đội ngũ nhà giáo
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function themDanhSachDoiNguNhaGiao()
    {
        $cosodaotao = DB::table('co_so_dao_tao')->get();
        $nam = Carbon::now()->year;
        $param = [
            'cosodaotao' => $cosodaotao,
            'nam' => $nam
        ];
        return view('extractreport.them-moi-doi_ngu_nha_giao',compact('param'));
    }

    /* Danh sách ngành nghề theo ID cơ sở.
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function layNganhNgheTheoCoSo($co_so_id){
        $nganhNghe = $this->DoiNguNhaGiaoService->getNganhNgheTheoCoSo($co_so_id);
        return $nganhNghe;
    }

    /* Lưu dữ liệu từ màn hình thêm dữ liệu Danh sách đội ngũ nhà giáo.
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function saveDanhSachDoiNguNhaGiao(validateAddDoiNguNhaGiao $request)
    {
        $params = $request->all();
        $kq = $this->DoiNguNhaGiaoService->checkTonTaiKhiThem($params);
        if($kq){       
            return redirect()->route('xuatbc.them-ds-nha-giao')->with(['kq'=> $kq->id])->withInput();
        }

        $dateTime = Carbon::now();
        $request->request->set('created_at', $dateTime->format('Y-m-d H:i:s'));
 
        $this->DoiNguNhaGiaoService->create($request);
        return redirect()->route('xuatbc.ds-nha-giao')->with(['kq'=> 'thêm thành công']);
    }

    /* Màn hình cập nhật dữ liệu Danh sách đội ngũ nhà giáo.
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function suaDanhSachDoiNguNhaGiao($id)
    {
        $data = $this->DoiNguNhaGiaoService->findById($id);
        if (empty($data)) {
            return redirect()->route('xuatbc.ds-nha-giao');
        }

        $cosodaotao = DB::table('co_so_dao_tao')->get();
        $nganh_nghe_theo_id = $this->NganhNgheService->findById($data->nghe_id);
        $ten_nghe = $nganh_nghe_theo_id->ten_nganh_nghe;
        
        $nam = Carbon::now()->year;
        $params = [
            'cosodaotao' => $cosodaotao,
            'nam' => $nam,
            'ten_nghe' => $ten_nghe
        ];
        return view('extractreport.chinh_sua_doi_ngu_nha_giao',compact('params','data'));
    }
    
    /* Update dữ liệu từ màn hình cập nhật dữ liệu Danh sách đội ngũ nhà giáo.
     * @author: phucnv
     * @created_at 2020-06-_ _ 
     */
    public function updateDanhSachDoiNguNhaGiao($id, validateUpdateDoiNguNhaGiao $request)
    {
        $data = $this->DoiNguNhaGiaoService->findById($id);
        if (empty($data)) {
            return redirect()->route('xuatbc.ds-nha-giao');
        }

        $dateTime = Carbon::now();
        $request->request->set('updated_at', $dateTime->format('Y-m-d H:i:s'));
        $this->DoiNguNhaGiaoService->update($id,$request);

         return redirect()->back()->with(['thongbao'=>'Cập nhật thành công !']);
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
        $nganhNghe = $this->QlsvService->getMaNganhNghe();
        // dd($nganhNghe);
        $nghe_cap_2 = $this->QlsvService->getNganhNghe(2);
        $nghe_cap_3 = $this->QlsvService->getNganhNghe(3);
        $nghe_cap_4 = $this->QlsvService->getNganhNghe(4);
        return view('crud.add_quan_ly_sv',['data'=>$data,
                                           'loaiHinh'=>$loaiHinhCs,
                                           'nganhNghe' => $nganhNghe,
                                           'coso'=>$coso,
                                           'nghe_cap_2' => $nghe_cap_2,
                                           'nghe_cap_3' => $nghe_cap_3,
                                           'nghe_cap_4' => $nghe_cap_4]);
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
        $co_so_id = $request->co_so_id;
      
        $this->QlsvService->create($request);
        // dd($request);
        return redirect()->route('xuatbc.chi-tiet-so-lieu', ['co_so_id' => $co_so_id]);
    }
    public function edit($id)
    {
        $data = $this->QlsvService->suaSoLieuSv($id);
        $nghe_cap_2 = $this->QlsvService->getNganhNghe(2);
        $nghe_cap_3 = $this->QlsvService->getNganhNghe(3);
        $nghe_cap_4 = $this->QlsvService->getNganhNghe(4);
        return view('crud.edit_quan_ly_sv',[ 'data' => $data,  
            'nghe_cap_2' => $nghe_cap_2,
            'nghe_cap_3' => $nghe_cap_3,
            'nghe_cap_4' => $nghe_cap_4]);
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
        $quanhuyen = $this->QlsvService->getTenQuanHuyen();
        $nghe_cap_2 = $this->QlsvService->getNganhNghe(2);
        if(isset(request()->devvn_quanhuyen)){
            $xaphuongtheoquanhuyen = $this->QlsvService->getTenXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        }else{
            $xaphuongtheoquanhuyen=[];
        }
        $data = $this->QlsvService->getQlsv($params);
        $nganhNghe = $this->QlsvService->getMaNganhNghe();
        $data->appends(request()->input())->links();
        $nghe_cap_3 = $this->QlsvService->getNganhNghe(3);
        $nghe_cap_4 = $this->QlsvService->getNganhNghe(4);
        // $nam = $this->QlsvService->getNamDaoTao();
        $loaiHinhCs = $this->QlsvService->getLoaiHinh();
        $coso = $this->QlsvService->getCoSo();
        $route_name = Route::current();
        return view('extractreport.tong_hop_sinh_vien_dang_theo_hoc',[
            // 'limit'=>$limit,
            'route_name'=>$route_name,
            'data' => $data,
            'nganhNghe' => $nganhNghe,
            'loaiHinh' => $loaiHinhCs,
            'coso'=>$coso,
            'quanhuyen'=>$quanhuyen,
            'xaphuongtheoquanhuyen'=>$xaphuongtheoquanhuyen,
            'params' => $params,
            'nghe_cap_2' => $nghe_cap_2,
            'nghe_cap_3' => $nghe_cap_3,
            'nghe_cap_4' => $nghe_cap_4
        ]);
    }
    public function tongHopChiTietSvDangTheoHoc($coSoId){
        
        $params = request()->all();
        $quanhuyen = $this->QlsvService->getTenQuanHuyen();
        if(isset(request()->devvn_quanhuyen)){
            $xaphuongtheoquanhuyen = $this->QlsvService->getTenXaPhuongTheoQuanHuyen(request()->devvn_quanhuyen);
        }else{
            $xaphuongtheoquanhuyen=[];
        }
        $data = $this->QlsvService->chiTietSoLieuQlsv($coSoId,$params);
        $loaiHinhCs = $this->QlsvService->getLoaiHinh();
        $coso = $this->QlsvService->getCoSo();
        $nganhNghe = $this->QlsvService->getMaNganhNghe();
        $nghe_cap_2 = $this->QlsvService->getNganhNghe(2);
        $nghe_cap_3 = $this->QlsvService->getNganhNghe(3);
        $nghe_cap_4 = $this->QlsvService->getNganhNghe(4);
        //  dd($data);
        return view('extractreport.lich_su_sinh_vien_dang_theo_hoc',[
            'data' =>$data,
            'loaiHinh' => $loaiHinhCs,
            'nganhNghe' => $nganhNghe,
            'coso'=>$coso,
            'params'=>$params,
            'quanhuyen'=>$quanhuyen,
            'xaphuongtheoquanhuyen'=>$xaphuongtheoquanhuyen,
            'nghe_cap_2' => $nghe_cap_2,
            'nghe_cap_3' => $nghe_cap_3,
            'nghe_cap_4' => $nghe_cap_4,
            ]);

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
        return view('extractreport.tong_hop_ket_qua_tuyen_sinh');
    }
}