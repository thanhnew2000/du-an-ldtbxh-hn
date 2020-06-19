<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XayDungChuongTrinhGiaoTrinhController extends Controller
{

    //phucnv BM:12
    /* Danh sách Tổng hợp xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-19
     */
    public function index(){
        return view('tong-hop-ket-qua-xay-dung-chuong-tring-giao-trinh.index');
    }

    /* Danh sách chi tiết tổng hợp xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-19
     */
    public function show($id){
        return view('tong-hop-ket-qua-xay-dung-chuong-tring-giao-trinh.show');
    }

    /* Màn hình thêm tổng hợp xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-19
     */
    public function create(){
        return view('tong-hop-ket-qua-xay-dung-chuong-tring-giao-trinh.create');
    }

    /* Lưu dữ liệu màn hình thêm tổng hợp xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-19
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /* Màn hình sửa tổng hợp xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-19
     */
    public function edit($id){
        return view('tong-hop-ket-qua-xay-dung-chuong-tring-giao-trinh.edit');
    }


    /* Cập nhật dữ liệu màn hình sửa tổng hợp xây dựng chương trình giáo trình.
     * @author: phucnv
     * @created_at 2020-06-19
     */
    public function update(Request $request, $id)
    {
        dd($id, $request->all());
    }
    
    //phucnv end BM:12
}
