  
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

@section('content')
<div class="m-content">
    @forelse ($data as $item)
        
    
<form action="{{route('xuatbc.sua-so-sv', ['id'=> $item->id])}}" method="post">
  @csrf
  <div class="m-portlet">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <span class="m-portlet__head-icon">
            <i class="m-menu__link-icon flaticon-web"></i>
          </span>
          <h3 class="m-portlet__head-text">
            Cập nhật<small>Tuyển sinh</small>
          </h3>
        </div>
      </div>
    </div>
    <div class="m-portlet__body">
      <div class="m-form__section m-form__section--first">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Năm </label>
              <div class="col-lg-8">
                <select disabled class=" form-control col-7 ">
                
                  <option {{( $item->nam == '2020' ) ? 'selected' : ''}} value="2020">2020</option>
                  <option {{( $item->nam == '2019' ) ? 'selected' : ''}} value="2019">2019</option>
                  <option {{( $item->nam == '2018' ) ? 'selected' : ''}} value="2018">2018</option>

                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group m-form__group row">
                <label disabled class="col-lg-2 col-form-label">Đợt</label>
                <select disabled class="form-control col-7">
                  
                  <option {{( $item->dot == 1 ) ? 'selected' : ''}} value="1">Đợt 1</option>
                  <option {{( $item->dot == 2 ) ? 'selected' : ''}} value="2">Đợt 2</option>

                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-2">
          <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
      </div>
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

