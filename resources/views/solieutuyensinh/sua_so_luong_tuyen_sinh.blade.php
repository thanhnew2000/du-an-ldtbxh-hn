@extends('layouts.admin')
@section('title', "Sửa số liệu tuyển sinh")
@section('style')
<link href="{!! asset('tuyensinh/css/suatuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
<form action="{{route('postsuasolieutuyensinh',['id'=>$datatuyensinhid->id])}}" id="validate-form" method="post">
  @csrf
  <div class="row mb-5">
    <div class="col-md-12 mb-4">
      <div class="titile-head">
        <p>Sửa kết quả tuyển sinh</p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="form-group col-6 p-2 d-flex justify-content-around align-items-center">
          <label for="" class="fillter-name col-3">Tên cơ sở đào tạo <span class="batbuoc">*</span></label>
          <select class="form-control col-9" disabled name="" id="co_so_dao_tao">
            <option value="">Chọn</option>
            @foreach ($data as $item)
            <option {{($item->id == $datatuyensinhid->co_so_id ) ? 'selected' : ''}} value="{{$item->id}}" >{{$item->ten}}</option>
            @endforeach
           
          </select>
        </div>
        <div class="form-group col-6 p-2 d-flex justify-content-around align-items-center">
          <label for="" class="fillter-name col-3">Mã ngành nghề <span class="batbuoc">*</span></label>
          <select disabled class="form-control col-9"  name="" id="ma_nganh_nghe">
          <option value="" selected >{{$datatuyensinhid->ten_nganh_nghe}}</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6  p-2 d-flex justify-content-around align-items-center">
          <label for="" class="fillter-name col-3">Năm tuyển sinh<span class="batbuoc">*</span></label>
          <select class="form-control col-9" disabled required name="nam" id="nam">
            <option value="">Chọn</option>
            <option {{( $datatuyensinhid->nam ==2020 ) ? 'selected' : ''}} value="2020">2020</option>
            <option {{( $datatuyensinhid->nam ==2019 ) ? 'selected' : ''}} value="2019">2019</option>
            <option {{( $datatuyensinhid->nam ==2018 ) ? 'selected' : ''}}value="2018">2018</option>
          </select>
        </div>
        <div class="form-group col-6  p-2 d-flex justify-content-around align-items-center">
          <label for="" class="fillter-name col-3">Đợt tuyển sinh<span class="batbuoc">*</span></label>
          <select class="form-control col-9" disabled name="" id="dot">
            <option value="" selected>Chọn</option>
            <option {{( $datatuyensinhid->dot ==1 ) ? 'selected' : ''}} value="1">Đợt 1</option>
            <option {{( $datatuyensinhid->dot ==2 ) ? 'selected' : ''}} value="2">Đợt 2</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6 p-2 d-flex justify-content-around align-items-center">
          <label for="" class="fillter-name col-3">Báo cáo url<span class="batbuoc">*</span></label>
          <input type="text"class="form-control col-9" required  value="{{$datatuyensinhid->bao_cao_url}}" name="bao_cao_url" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Danh mục</th>
              <th scope="col">Cao đẳng</th>
              <th scope="col">Trung cấp</th>
              <th scope="col">Sơ cấp</th>
              <th scope="col">Khác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tổng số nữ</td>
            <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_nu_Cao_dang}}" name="so_luong_sv_nu_Cao_dang" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_nu_Trung_cap}}" name="so_luong_sv_nu_Trung_cap" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_nu_So_cap}}" name="so_luong_sv_nu_So_cap" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_nu_khac}}" name="so_luong_sv_nu_khac" class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Tổng số dân tộc thiểu số ít người</td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_dan_toc_Cao_dang}}" name="so_luong_sv_dan_toc_Cao_dang"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_dan_toc_Trung_cap}}" name="so_luong_sv_dan_toc_Trung_cap"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_dan_toc_So_cap}}" name="so_luong_sv_dan_toc_So_cap"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_dan_toc_khac}}" name="so_luong_sv_dan_toc_khac"  class="form-control" id="inputEmail4"></td>

            </tr>
            <tr>
              <td>Tống số hộ khẩu Hà Nội</td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_ho_khau_HN_Cao_dang}}" name="so_luong_sv_ho_khau_HN_Cao_dang" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_ho_khau_HN_Trung_cap}}" name="so_luong_sv_ho_khau_HN_Trung_cap" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_ho_khau_HN_So_cap}}" name="so_luong_sv_ho_khau_HN_So_cap" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_ho_khau_HN_khac}}" name="so_luong_sv_ho_khau_HN_khac" class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Số tốt nghiệp THCS</td>
              <td><input type="number" required min="0" step="1"   disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_Tot_nghiep_THCS}}" name="so_Tot_nghiep_THCS" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Số tốt nghiệp THPT</td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_Tot_nghiep_THPT}}"  name="so_Tot_nghiep_THPT" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Tuyển mới</td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_tuyen_moi_Cao_dang}}" name="so_tuyen_moi_Cao_dang"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Liên thông</td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_lien_thong_Cao_dang}}" name="so_lien_thong_Cao_dang"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" disabled class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Tổng số kết quả tuyển sinh</td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_Cao_dang}}" name="so_luong_sv_Cao_dang" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_Trung_cap}}" name="so_luong_sv_Trung_cap" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_So_cap}}" name="so_luong_sv_So_cap"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->so_luong_sv_he_khac}}" name="so_luong_sv_he_khac"  class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td>Kết hoạch tuyển sinh</td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->ke_hoach_tuyen_sinh_cao_dang}}" name="ke_hoach_tuyen_sinh_cao_dang"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->ke_hoach_tuyen_sinh_trung_cap}}" name="ke_hoach_tuyen_sinh_trung_cap" class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->ke_hoach_tuyen_sinh_so_cap}}" name="ke_hoach_tuyen_sinh_so_cap"  class="form-control" id="inputEmail4"></td>
              <td><input type="number" required min="0" step="1" value="{{$datatuyensinhid->ke_hoach_tuyen_sinh_khac}}" name="ke_hoach_tuyen_sinh_khac"  class="form-control" id="inputEmail4"></td>
            </tr>
            <tr>
              <td colspan="2">Tổng số kế hoạch tuyển sinh</td>
              <td colspan="3"><input style="width: 300px;" value="{{$datatuyensinhid->tong_so_tuyen_sinh}}" name="tong_so_tuyen_sinh" type="number" required min="0" step="1"  class="form-control" id="inputEmail4"></td>
            </tr>
          </tbody>
        </table>
   
    </div>
  </div>
  @if (session('thongbao'))
  <div class="thongbao" style="color: green; text-align: center;">
    {{session('thongbao')}}
  </div>
  @endif
<div class="row mt-4" style="float: right">
  <div class="col-md-12">
    <button type="button" class="btn btn-danger mr-5"><a style="color: white" href="{{route('solieutuyensinh')}}">Hủy</a></button>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
  
</div>
</div>
</form>
</div>
@endsection
@section('script')
@endsection