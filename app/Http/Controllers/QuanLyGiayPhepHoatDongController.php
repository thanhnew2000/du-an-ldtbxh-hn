<?php

namespace App\Http\Controllers;
use App\Services\QuanLyGiayPhepHoatDongService;
use Illuminate\Http\Request;
use App\Http\Requests\QuanLyGiayPhepQuyetDinh\storeQuyetDinh;
use App\Http\Requests\QuanLyGiayPhepQuyetDinh\updateQuyetDinh;
class QuanLyGiayPhepHoatDongController extends Controller
{
    private $QuanLyGiayPhepHoatDongService;
    public function __construct(QuanLyGiayPhepHoatDongService $QuanLyGiayPhepHoatDongService)
    {
        $this->QuanLyGiayPhepHoatDongService = $QuanLyGiayPhepHoatDongService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = request()->all();
        $limit =20;
        $co_so = $this->QuanLyGiayPhepHoatDongService->get_co_so();
        $data = $this->QuanLyGiayPhepHoatDongService->index($params,$limit);
        return view('quan_ly_giay_phep_hoat_dong.index',[
            'data'=>$data,
            'co_so'=>$co_so,
            'params'=>$params
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $co_so = $this->QuanLyGiayPhepHoatDongService->get_co_so();
        return view('quan_ly_giay_phep_hoat_dong.create',['co_so'=>$co_so]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeQuyetDinh $request)
    {  
        $data = $request->all();
        $img_giay_phep_hoat_dong =$request->file("anh_quyet_dinh");
        if($img_giay_phep_hoat_dong){
        $path = $request->file('anh_quyet_dinh')->store('uploads/giay-phep-hoat-dong');
        $data['anh_quyet_dinh']=$path;
        }
        $this->QuanLyGiayPhepHoatDongService->createGiayPhep($data);
        return response()->json('thanh_cong', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $co_so = $this->QuanLyGiayPhepHoatDongService->get_co_so();
        return view('quan_ly_giay_phep_hoat_dong.edit',['co_so'=>$co_so]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateQuyetDinh $request)
    {
        $data = $request->all();
        $img_giay_phep_hoat_dong =$request->file("anh_quyet_dinh");
        if($img_giay_phep_hoat_dong){
        $path = $request->file('anh_quyet_dinh')->store('uploads/giay-phep-hoat-dong');
        $data['anh_quyet_dinh']=$path;
        }else{
            unset($data['anh_quyet_dinh']);
        }
      return $this->QuanLyGiayPhepHoatDongService->updateData($data);
    }

    public function thuHoi()
    {
       dd('thu hồi');
    }

    public function getGiayPhep(Request $request)
    {
        $id = $request->all();
        return $this->QuanLyGiayPhepHoatDongService->getGiayPhep($id);
    }

    public function getGiayPhepId(Request $request)
    {
        $id = $request->all();
        return $this->QuanLyGiayPhepHoatDongService->getGiayPhepId($id);
    }
}
