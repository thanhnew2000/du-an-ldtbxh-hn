@extends('layouts.admin')
@section('title', "Sửa số liệu học sinh sinh viên")
@section('style')
{{-- <link href="{!! asset('tuyensinh/css/suatuyensinh.css') !!}" rel="stylesheet" type="text/css" /> --}}
<style>
  .batbuoc {
    color: red;
  }

  table input {
    border: 1px solid #000 !important;
  }
</style>
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="title mb-4">
            <h4>Chỉnh sửa số liệu sinh viên</h4>
        </div>
        </section>
        <section class="container pt-3 ">
            <div class="m-section ">
                <div class="m-section__content ">
                    <form method="post" action="{{route('xuatbc.sua-so-sv', ['id'=> $qlsv->id])}}">
                        <div class="d-flex container pt-3">
                            <div class="form-group col-6 d-flex justify-content-around align-items-center">
                                <label for="" class="fillter-name col-3">Tên Cơ Sở</label>
                                <select class="form-control col-7" name="co_so_id" id="">
                                    <option selected>Chọn cơ sở</option>
                                    <option value="4">Mississippi</option>
                                    <option value="2">Indiana</option>
                                    <option value="8">Minnesota</option>
                                </select>
                            </div>

                            <div class="form-group col-6 d-flex justify-content-around align-items-center">
                                <span for="" class="fillter-name col-3">Nghề</span>
                                <select class=" form-control col-7 " name="nghe_id" id="">
                                    <option value=" " selected>Chọn loại hình cơ sở</option>
                                    <option value="5210101">Kỹ thuật điêu khắc gỗ</option>
                                    <option value="5210102">Điêu khắc</option>
                                    <option value="5210103">Hội họa</option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-bordered thead-bluedark " style="width: 100%; ">
                            @csrf
                            <thead>
                                <tr class=" text-center ">
                                    <th>#</th>
                                    <th>Cao Đẳng</th>
                                    <th>Trung Cấp</th>
                                    <th>Sơ Cấp</th>
                                    <th>Khác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tổng số nữ</td>
                                    <td><input required min="0" step="1" name="so_luong_sv_nu_Cao_dang" type="number"
                                            value="{{$qlsv->so_luong_sv_nu_Cao_dang}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_nu_Trung_cap" type="number"
                                            value="{{$qlsv->so_luong_sv_nu_Trung_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_nu_So_cap" type="number"
                                            value="{{$qlsv->so_luong_sv_nu_So_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_nu_khac" type="number"
                                            value="{{$qlsv->so_luong_sv_nu_khac}}"></td>
                                </tr>
                                <tr>
                                    <td>Tổng số dân tộc thiểu số ít người</td>
                                    <td><input required min="0" step="1" name="so_luong_sv_dan_toc_Cao_dang"
                                            type="number" value="{{$qlsv->so_luong_sv_dan_toc_Cao_dang}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_dan_toc_Trung_cap"
                                            type="number" value="{{$qlsv->so_luong_sv_dan_toc_Trung_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_dan_toc_So_cap" type="number"
                                            value="{{$qlsv->so_luong_sv_dan_toc_So_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_dan_toc_khac" type="number"
                                            value="{{$qlsv->so_luong_sv_dan_toc_khac}}"></td>
                                </tr>
                                <tr>
                                    <td>Tổng số hộ khẩu Hà Nội</td>
                                    <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_Cao_dang"
                                            type="number" value="{{$qlsv->so_luong_sv_ho_khau_HN_Cao_dang}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_Trung_cap"
                                            type="number" value="{{$qlsv->so_luong_sv_ho_khau_HN_Trung_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_So_cap"
                                            type="number" value="{{$qlsv->so_luong_sv_ho_khau_HN_So_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_khac"
                                            type="number" value="{{$qlsv->so_luong_sv_ho_khau_HN_khac}}"></td>
                                </tr>
                                <tr>
                                    <td>Tổng số</td>
                                    <td><input required min="0" step="1" name="so_luong_sv_Cao_dang" type="number"
                                            value="{{$qlsv->so_luong_sv_Cao_dang}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_Trung_cap" type="number"
                                            value="{{$qlsv->so_luong_sv_Trung_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_So_cap" type="number"
                                            value="{{$qlsv->so_luong_sv_So_cap}}"></td>
                                    <td><input required min="0" step="1" name="so_luong_sv_he_khac" type="number"
                                            value="{{$qlsv->so_luong_sv_he_khac}}"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mr-5 ">
                            <button type="submit" class="btn btn-danger btn-fillter ml-5">Hủy</button>
                            <button type="submit" class="btn btn-primary btn-fillter ml-5">Sửa</button>
                        </div>
                </div>
            </div>
        </section>
        </form>
    </div>
  </div>
  
  <div class="m-portlet">
    <div class="m-portlet__body">

        <table class="table m-table m-table--head-bg-brand">
            <thead>
                <tr class=" text-center ">
                   <th></th>
                   <th>Cao Đẳng</th>
                   <th>Trung Cấp</th>
                   <th>Sơ Cấp</th>
                   <th>Khác</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                  <td>Số Lượng Sinh Viên</td>
                  <td><input class="form-control" name="so_luong_sv_Cao_dang" type="number" value="{{$item ->so_luong_sv_Cao_dang}}"></td>
                  <td><input class="form-control" name="so_luong_sv_Trung_cap" type="number" value="{{$item ->so_luong_sv_Trung_cap}}"></td>
                  <td><input class="form-control" name="so_luong_sv_So_cap" type="number" value="{{$item ->so_luong_sv_So_cap}}"></td>
                  <td><input class="form-control" name="so_luong_sv_he_khac" type="number" value="{{$item ->so_luong_sv_he_khac}}"></td>
                </tr>
               <tr>
                   <td>Số Lượng Sinh Viên Nữ</td>
                   <td><input class="form-control" name="so_luong_sv_nu_Cao_dang" type="number" value="{{$item ->so_luong_sv_nu_Cao_dang}}"></td>
                   <td><input class="form-control" name="so_luong_sv_nu_Trung_cap" type="number"  value="{{$item ->so_luong_sv_nu_Trung_cap}}"></td>
                   <td><input class="form-control" name="so_luong_sv_nu_So_cap" type="number"  value="{{$item ->so_luong_sv_nu_So_cap}}"></td>
                   <td><input class="form-control" name="so_luong_sv_nu_khac" type="number"  value="{{$item ->so_luong_sv_nu_khac}}"></td>
               </tr>
               <tr>
                   <td>Số Lượng Sinh Viên Dân Tộc</td>
                   <td><input class="form-control" name="so_luong_sv_dan_toc_Cao_dang" type="number" value="{{$item ->so_luong_sv_dan_toc_Cao_dang}}"></td>
                   <td><input class="form-control" name="so_luong_sv_dan_toc_Trung_cap" type="number" value="{{$item ->so_luong_sv_dan_toc_Trung_cap}}"></td>
                   <td><input class="form-control" name="so_luong_sv_dan_toc_So_cap" type="number" value="{{$item ->so_luong_sv_dan_toc_So_cap}}"></td>
                   <td><input class="form-control" name="so_luong_sv_dan_toc_khac" type="number" value="{{$item ->so_luong_sv_dan_toc_khac}}"></td>
               </tr>
               <tr>
                   <td>Số Lượng Sinh Viên Hộ Khẩu Hà Nội</td>
                   <td><input class="form-control" name="so_luong_sv_ho_khau_HN_Cao_dang" type="number" value="{{$item ->so_luong_sv_ho_khau_HN_Cao_dang}}"></td>
                   <td><input class="form-control" name="so_luong_sv_ho_khau_HN_Trung_cap" type="number" value="{{$item ->so_luong_sv_ho_khau_HN_Trung_cap}}"></td>
                   <td><input class="form-control" name="so_luong_sv_ho_khau_HN_So_cap" type="number" value="{{$item ->so_luong_sv_ho_khau_HN_So_cap}}"></td>
                   <td><input class="form-control" name="so_luong_sv_ho_khau_HN_khac" type="number" value="{{$item ->so_luong_sv_ho_khau_HN_khac}}"></td>
               </tr>
           </tbody>
       </table>
   <div class="d-flex justify-content-center mr-5 ">
       <button type="submit" class="btn btn-danger btn-fillter ml-5">Hủy</button>
       <button type="submit" class="btn btn-primary btn-fillter ml-5">Sửa</button>
   </div>
  
</div>
</div>
</form>
@empty
        
    @endforelse
</div>
@endsection
@section('script')
@endsection