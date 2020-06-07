<?php

namespace App\Http\Controllers;

use App\Qlsv;
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
    public function add(Qlsv $qlsv)
    {
        return view('crud.add_quan_ly_sv', [
            'qlsv' => $qlsv
        ]);
    }
    public function saveAdd(Request $request)
    {
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        $this->QlsvService->create($request);
        // dd($request);
        return redirect('/extractreport/tong-hop-sinh-vien-dang-theo-hoc')->with('status', 'Tạo thành công');
    }
    public function edit(Qlsv $qlsv)
    {
        return view('crud.edit_quan_ly_sv', [
            'qlsv' => $qlsv
        ]);
    }
    public function saveEdit($id, Request $request)
    {
        $dateTime = Carbon::now();
        $request->request->set('thoi_gian_cap_nhat', $dateTime->format('Y-m-d H:i:s'));
        $request->request->set('nam', $dateTime->year);
        $request->request->set('dot', 1);
        // $data = $request->all();
        $this->QlsvService->update($id, $request);

        return redirect('/extractreport/tong-hop-sinh-vien-dang-theo-hoc')->with('mess', 'edit thanh cong');
    }
    public function tonghopsvdanghoc()
    {
        $data = $this->QlsvService->getQlsv();
        return view('extractreport.tong_hop_sinh_vien_dang_theo_hoc', compact('data'));
    }
    public function tonghopchinhsachsv()
    {
        return view('extractreport.tong_hop_thuc_hien_chinh_sach_cho_sinh_vien');
    }
    public function tonghopkqtuyensinh()
    {
        return view('extractreport.tong_hop_ket_qua_tuyen_sinh');
    }

    public function tonghopxdchuongtrinh()
    {
        return view('extractreport.tong_hop_xay_dung_chuong_trinh_giao_trinh');
    }
    public function tonghopkqtotnghiep()
    {
        return view('extractreport.tong_hop_ket_qua_tot_nghiep');
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