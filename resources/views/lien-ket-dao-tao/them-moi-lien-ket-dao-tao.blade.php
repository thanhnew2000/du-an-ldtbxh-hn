@extends('layouts.admin')
@section('title', "Thêm số liệu tuyển sinh")
@section('style')
{{-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<link href="{!! asset('tuyensinh/css/themtuyensinh.css') !!}" rel="stylesheet" type="text/css" /> --}}
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
<div class="m-content container-fluid">
  <form action="{{route('postthemsolieutuyensinh')}}" method="post">
    @csrf
    <div class="m-portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <span class="m-portlet__head-icon">
              <i class="m-menu__link-icon flaticon-web"></i>
            </span>
            <h3 class="m-portlet__head-text">
              Thêm mới liên kết đào tạo
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
          <div class="row">
          <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Tên cơ sở đào tạo</label>
                <div class="col-lg-8">
                  <select class="form-control " name="nam" id="nam">
                    <option value="">Chọn</option>
                    
                      <option value=""> </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Năm</label>
                <div class="col-lg-8">
                  <select class="form-control " name="nam" id="nam">
                    <option value="">Chọn</option>
                      <option value=""> </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Tên nghề đào tạo</label>
                <div class="col-lg-8">
                  <select class="form-control " name="nam" id="nam">
                    <option value="">Chọn</option>
                      <option value=""> </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Đợt</label>
                <div class="col-lg-8">
                  <select class="form-control " name="dot" id="dot">
                    <option value="" selected>Chọn</option>
                    <option value="1">Đợt 1</option>
                    <option value="2">Đợt 2</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

      {{-- start liên kết --}}
      <div class="row">
        <div class="col-xl-6">
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Liên kết Cao đẳng lên Đại học
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
                  <tbody>
                    <tr>
                      <td>Chỉ tiêu Cao đẳng</td>
                      <td><input type="number"  min="0" step="1"
                          name="ho_khau_HN_THCS_Trung_cap" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Thực tuyển Cao đẳng</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THCS" class="form-control" ></td>
  
                    </tr>
                    <tr>
                      <td>Số HSSV tốt nghiệp Cao đẳng</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THPT" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Đơn vị liên kết Cao đẳng </td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THPT" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Ghi chú </td>
                      <td>
                        <textarea class="form-control" rows="3" style="border: 1px solid #000000"></textarea>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Liên kết Trung cấp lên Đại học
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
                  <tbody>
                    <tr>
                      <td>Chỉ tiêu Cao đẳng</td>
                      <td><input type="number"  min="0" step="1"
                          name="ho_khau_HN_THCS_Trung_cap" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Thực tuyển Cao đẳng</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THCS" class="form-control" ></td>
  
                    </tr>
                    <tr>
                      <td>Số HSSV tốt nghiệp Cao đẳng</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THPT" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Đơn vị liên kết Cao đẳng </td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THPT" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Ghi chú </td>
                      <td>
                        <textarea class="form-control"  rows="3"  style="border: 1px solid #000000"></textarea>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end liên kết --}}

    @if (session('thongbao'))
    <div class="thongbao" style="color: red; text-align: center;">
      {{session('thongbao')}}
    </div>
    @endif
    @if ($errors->any())
    <ul class="col-md-10 mx-auto">
      @foreach ($errors->all() as $error)
      <li class="thongbao " style="color: red;">
        {{ $error }}
      </li>
      @endforeach
    </ul>
    @endif
    <div class="row mt-4" style="float: right">
      <div class="col-md-12">
        <button type="button" class="btn btn-danger mr-5" style="width:90.28px"><a style="color: white;"
            href="{{route('solieutuyensinh')}}">Hủy</a></button>
        <button type="submit" class="btn btn-primary">Thêm mới</button>

      </div>
    </div>
  </form>
</div>
@endsection
@section('script')
<script>
var routeCheck = "{{ route('so_lieu_tuyen_sinh.check_so_lieu') }}";
var routeGetMaNganhNghe = "{{ route('get_ma_nganh_nghe') }}";

$(document).ready(function(){
  $('#co_so_dao_tao').select2();
  $('#ma_nganh_nghe').select2();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{!! asset('tuyensinh/js/tuyensinh.js') !!}"></script>
@endsection