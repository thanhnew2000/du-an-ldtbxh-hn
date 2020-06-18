@extends('layouts.admin')
@section('title', "Thêm liên kết đào tạo")
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
  <form action="{{route('xuatbc.post-them-lien-ket-dao-tao')}}" method="post">
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
                <label class="col-lg-2 col-form-label">Năm</label>
                <div class="col-lg-8">
                  <select class="form-control " onchange="getdatacheck(this)" required name="nam" id="nam">
                    <option value="">Chọn</option>
                    @foreach (config('common.nam_tuyen_sinh.list') as $item)
                    <option @if (isset($params['nam'])) {{( $params['nam'] ==  $item ) ? 'selected' : ''}} @endif
                      value="{{$item}}"> {{$item}}
                    </option>
                    @endforeach
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
                  <select class="form-control " required disabled onchange="getdatacheck(this)" name="nghe_id"
                    id="ma_nganh_nghe">
                    <option value="" selected>Mã ngành nghề</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Đợt</label>
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

        </div>
      </div>
    </div>

    {{-- start liên kết --}}
    <div class="row">
      <div class="col-xl-12">
        <div class="m-portlet m-portlet--full-height ">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Liên kết đào tạo
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="tab-content">
              <table class="table m-table m-table--head-bg-brand">
                <tbody>
                  <tr>
                    <td>Chỉ tiêu</td>
                    <td><input type="number" min="0" step="1" name="chi_tieu" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Thực tuyển</td>
                    <td><input type="number" min="0" step="1" name="thuc_tuyen" class="form-control"></td>

                  </tr>
                  <tr>
                    <td>Số HSSV tốt nghiệp</td>
                    <td><input type="number" min="0" step="1" name="so_HSSV_tot_nghiep" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Đơn vị liên kết </td>
                    <td><input type="text" min="0" step="1" name="don_vi_lien_ket" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Ghi chú </td>
                    <td>
                      <textarea class="form-control" name="ghi_chu" rows="3"
                        style="border: 1px solid #000000"></textarea>
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
            href="{{route('xuatbc.tong-hop-lien-ket-dao-tao')}}">Hủy</a></button>
        <button type="submit" class="btn btn-primary">Thêm mới</button>

      </div>
    </div>
  </form>
</div>
@endsection
@section('script')
<script>
  var routeCheck = "{{ route('xuatbc.check-ton-tai-lien-ket-dao-tao') }}";
 var routeGetMaNganhNghe = "{{ route('get_ma_nganh_nghe') }}";

$(document).ready(function(){
  $('#co_so_dao_tao').select2();
  $('#ma_nganh_nghe').select2();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{!! asset('chinh_sach_sinh_vien/validate-number.js') !!}"></script>
<script src="{!! asset('tong_hop_ket_qua_tot_nghiep/tong_hop_ket_qua_tot_nghiep.js') !!}"></script>
@endsection