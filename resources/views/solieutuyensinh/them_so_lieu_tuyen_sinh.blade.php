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
              Thêm mới<small>Tuyển sinh</small>
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Tên cơ sở đào tạo <span class="batbuoc">*</span></label>
                <div class="col-lg-8">
                  <select class="form-control " onchange="getdatacheck(this)" required name="co_so_id"
                    id="co_so_dao_tao">
                    <option value="">Chọn</option>
                    @foreach ($data as $item)
                    <option value="{{$item->id}}">{{$item->ten}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Mã ngành nghề<span class="batbuoc">*</span></label>
                <div class="col-lg-8">
                  <select class="form-control " required disabled onchange="getdatacheck(this)" name="nghe_id"
                    id="ma_nganh_nghe">
                    <option value="" selected>Mã ngành nghề</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Năm tuyển sinh<span class="batbuoc">*</span></label>
                <div class="col-lg-8">
                  <select class="form-control " onchange="getdatacheck(this)" required name="nam" id="nam">
                    <option value="">Chọn</option>
                    @foreach (config('common.nam_tuyen_sinh.list') as $item)
                      <option 
                      @if (isset($params['nam']))
                              {{( $params['nam'] ==  $item ) ? 'selected' : ''}}  
                              @endif
                              value="{{$item}}"> {{$item}}
                          </option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Đợt tuyển sinh<span class="batbuoc">*</span></label>
                <div class="col-lg-8">
                  <select class="form-control " required onchange="getdatacheck(this)" name="dot" id="dot">
                    <option value="" selected>Chọn</option>
                    <option value="1">Đợt 1</option>
                    <option value="2">Đợt 2</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Báo cáo url:</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control m-input" placeholder="Nhập url báo cáo" name="bao_cao_url">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
       {{-- start kế hoạch tuyển sinh --}}
       <div class="row">
        <div class="col-xl-12">
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Kế hoạch tuyển sinh
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
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
                      <td>Kết hoạch tuyển sinh</td>
                      <td><input type="number" min="0" step="1"
                          name="ke_hoach_tuyen_sinh_cao_dang" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                         name="ke_hoach_tuyen_sinh_trung_cap"
                          class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="ke_hoach_tuyen_sinh_so_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="ke_hoach_tuyen_sinh_khac" class="form-control" ></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end kế hoạch tuyển sinh --}}
      {{-- start tuyển sinh theo hệ--}}
      <div class="row">
        <div class="col-xl-12">
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Kết quả tuyển sinh
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
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
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_nu_Cao_dang" class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_nu_Trung_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_nu_So_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                          name="so_luong_sv_nu_khac" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Tổng số dân tộc thiểu số ít người</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_dan_toc_Cao_dang" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                          name="so_luong_sv_dan_toc_Trung_cap"
                          class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_dan_toc_So_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_dan_toc_khac" class="form-control" ></td>
  
                    </tr>
                    <tr>
                      <td>Tống số hộ khẩu Hà Nội</td>
                      <td><input type="number" min="0" step="1"
                          
                          name="so_luong_sv_ho_khau_HN_Cao_dang" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                          
                          name="so_luong_sv_ho_khau_HN_Trung_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                         name="so_luong_sv_ho_khau_HN_So_cap"class="form-control" ></td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_ho_khau_HN_khac" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Tổng số kết quả tuyển sinh</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_luong_sv_Cao_dang" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                          name="so_luong_sv_Trung_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                          name="so_luong_sv_So_cap" class="form-control" ></td>
                      <td><input type="number" min="0" step="1"
                          name="so_luong_sv_he_khac" class="form-control" ></td>
                    </tr>
  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end tuyển sinh theo hệ --}}
      {{-- start trung cấp cao đẳng --}}
      <div class="row">
        <div class="col-xl-6">
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Kết quả tuyển sinh
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
                  <thead>
                    <tr>
                      <th scope="col" colspan="4">Trung cấp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hộ khẩu Hà Nội tốt nghiệp THCS</td>
                      <td><input type="number"  min="0" step="1"
                          name="ho_khau_HN_THCS_Trung_cap" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Số tốt nghiệp THCS</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THCS" class="form-control" ></td>
  
                    </tr>
                    <tr>
                      <td>Số tốt nghiệp THPT</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_Tot_nghiep_THPT" class="form-control" ></td>
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
                    Kết quả tuyển sinh
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
                  <thead>
                    <tr>
                      <th scope="col" colspan="4">Cao đẳng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tuyển mới</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_tuyen_moi_Cao_dang" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Liên thông</td>
                      <td><input type="number" min="0" step="1" 
                          name="so_lien_thong_Cao_dang" class="form-control" ></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end trung cấp cao  đẳng --}}
      {{-- start tổng số trong đó --}}
      <div class="row">
        <div class="col-xl-12">
          <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Tổng số
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="tab-content">
                <table class="table m-table m-table--head-bg-brand">
                  <thead>
                    <tr>
                      <th scope="col">Danh mục</th>
                      <th scope="col">Trong đó</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tổng số tuyển sinh nữ</td>
                      <td><input name="tong_so_nu" type="number" min="0" step="1"
                          class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Tổng số tuyển sinh dân tộc</td>
                      <td><input name="tong_so_dan_toc" type="number"
                          min="0" step="1" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Tổng số tuyển sinh hộ khẩu Hà Nội</td>
                      <td><input  name="tong_ho_khau_HN" type="number"
                          min="0" step="1" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td>Tổng số tuyển sinh các trình độ</td>
                      <td><input 
                          name="tong_so_tuyen_sinh_cac_trinh_do" type="number" min="0" step="1" class="form-control"
                          ></td>
                    </tr>
                    <tr>
                      <td>Tổng số kế hoạch tuyển sinh</td>
                      <td><input  name="tong_so_tuyen_sinh" type="number"
                          min="0" step="1" class="form-control" ></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- end tổng số trong đó --}}
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
        <button type="button" class="btn btn-danger mr-5"><a style="color: white"
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