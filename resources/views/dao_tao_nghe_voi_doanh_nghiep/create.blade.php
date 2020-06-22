@extends('layouts.admin')
@section('title', "Chỉnh sửa kết quả tuyển sinh, đào tạo nghề gắn với doanh nghiệp")
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
  .note-editor.note-frame .note-editing-area .note-editable{
      padding: 20px;
  }
</style>
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content container-fluid">
  <form action="{{route('xuatbc.dao-tao-nghe-doanh-nghiep.store')}}" method="post">
    @csrf
    <div class="m-portlet__body">
      <div class="m-form__section m-form__section--first">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group m-form__group row">
                      <label class="col-lg-5 col-form-label">Tên cơ sở<span class="batbuoc">*</span></label>
                      <div class="col-lg-7">
                          <select class="form-control" onchange="getdatacheck(this)" required name="co_so_id"
                              id="co_so_dao_tao">
                              <option value="">Chọn</option>
                              @foreach ($ten_co_so as $item)
                              <option value="{{$item->id}}">{{$item->ten}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group m-form__group row">
                      <label class="col-lg-2 col-form-label">Năm<span class="batbuoc">*</span></label>
                      <div class="col-lg-10">
                          <select class="form-control " onchange="getdatacheck(this)" required name="nam"
                              id="nam">
                              <option value="">Chọn</option>
                              @foreach (config('common.nam_tuyen_sinh.list') as $item)
                              <option @if (isset($params['nam']))
                                  {{( $params['nam'] ==  $item ) ? 'selected' : ''}} @endif value="{{$item}}">
                                  {{$item}}
                              </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row pt-4">
              <div class="col-md-6">
                  <div class="form-group m-form__group row">
                      <label class="col-lg-5 col-form-label">Nghề<span class="batbuoc">*</span></label>
                      <div class="col-lg-7">
                          <select class="form-control " required disabled onchange="getdatacheck(this)"
                              name="nghe_id" id="ma_nganh_nghe">
                              <option value="" selected>Mã ngành nghề</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group m-form__group row">
                      <label class="col-lg-2 col-form-label">Đợt<span class="batbuoc">*</span></label>
                      <div class="col-lg-10">
                          <select class="form-control " required onchange="getdatacheck(this)" name="dot"
                              id="dot">
                              <option value="" selected>Chọn</option>
                              <option value="1">Đợt 1</option>
                              <option value="2">Đợt 2</option>
                          </select>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row pt-4">
              <div class="col-md-6">
                  <div class="form-group m-form__group row">
                      <label class="col-lg-5 col-form-label">Thời gian đào tạo (Tháng) <span
                              class="batbuoc">*</span></label>
                      <div class="col-lg-7">
                          <input type="number" min="0" required class="form-control m-input" placeholder="Nhập vào số"
                              name="thoi_gian_dao_tao">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <div class="m-portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <span class="m-portlet__head-icon">
              <i class="m-menu__link-icon flaticon-web"></i>
            </span>
            <h3 class="m-portlet__head-text">
              Chỉnh sửa kết quả tuyển sinh, đào tạo nghề gắn với doanh nghiệp
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
          <div class="row">
          <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Ngành/ nghề đào tạo</label>
                <div class="col-lg-6">
                  <select class="form-control " name="" id="nam">
                    <option value="">Chọn</option>
                      <option value=""> </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Kết quả tuyển sinh, đào tạo Cao đẳng gắn với doanh nghiệp </label>
                <div class="col-lg-6">
                <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Kết quả tuyển sinh, đào tạo Trung cấp gắn với doanh nghiệp</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Kết quả tuyển sinh, đào tạo Sơ cấp gắn với doanh nghiệp</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Kết quả tuyển sinh, đào tạo dưới 3 tháng gắn với doanh nghiệp</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Tên doanh nghiệp</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Số HSSV được doanh nghiệp cam kết tuyển dụng sau tốt nghiệp (người)</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Doanh nghiệp tham gia xây dựng chương trình, giáo trình đào tạo (bộ) </label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Doanh nghiệp tham gia giảng dạy (số giờ)</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Doanh nghiệp hỗ trợ trang thiết bị và nguyên, nhiên vật liệu đào tạo (triệu đồng)</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Doanh nghiệp hỗ trợ kinh phí đào tạo (triệu đồng)</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Doanh nghiệp đặt hàng đào tạo (người)</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group m-form__group row">
                <label class="col-lg-5 col-form-label">Doanh nghiệp tiếp nhận HSSV vào thực tập (người)</label>
                <div class="col-lg-6">
                    <input type="number"  min="0" step="1" name="" class="form-control" >
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="m-portlet__body">
                <div class="form-group m-form__group row ">
                    <label cclass="col-lg-5 col-form-label">Khác (Ghi rõ nội dung)</label>
                    <div class="col-lg-9 col-md-9 colư-sm-12">
                        <textarea class="summernote" name="hiee" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>


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
        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>

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
<script src="{!! asset('assets/demo/custom/crud/forms/widgets/summernote.js') !!}" type="text/javascript"></script>
@endsection