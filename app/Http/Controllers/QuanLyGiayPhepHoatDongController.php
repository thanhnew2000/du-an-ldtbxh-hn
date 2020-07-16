<?php

namespace App\Http\Controllers;
use App\Services\QuanLyGiayPhepHoatDongService;
use Illuminate\Http\Request;

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
        $data = $this->QuanLyGiayPhepHoatDongService->index($params,$limit);
        return view('quan_ly_giay_phep_hoat_dong.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
