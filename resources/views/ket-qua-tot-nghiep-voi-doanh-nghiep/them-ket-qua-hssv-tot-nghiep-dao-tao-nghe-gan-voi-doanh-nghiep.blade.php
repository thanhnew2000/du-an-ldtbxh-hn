@extends('layouts.admin')
@section('title', 'Thêm mới kết quả tốt nghiệp đào tạo nghề gắn với doanh nghiệp')
@section('style')

<style>
    .batbuoc {
        color: red;
    }

    table input {
        border: 1px solid #000 !important;
    }

    th,
    td {
        border-right: 1px solid #fff;
    }

    th {
        text-align: center;
    }
    .error {
        color: red;
    }
</style>
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content container-fluid">
    <form action="{{route('xuatbc.post-them-ket-qua-tot-nghiep-voi-doanh-nghiep')}}" method="post" id="validate-form-add">
        @csrf
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Thêm mới kết quả tốt nghiệp gắn với doanh nghiệp 
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
                                    <select class="form-control select2" onchange="getdatacheck(this)" required
                                        name="co_so_id" id="co_so_dao_tao">
                                        <option value="-1">Chọn</option>
                                        @foreach ($data as $item)
                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                    <label id="co_so_dao_tao-error" class="error" for="co_so_dao_tao"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" onchange="getdatacheck(this)" required
                                        name="nam" id="nam">
                                        <option value="-1">Chọn</option>
                                        @foreach (config('common.nam_tuyen_sinh.list') as $item)
                                        <option @if (isset($params['nam']))
                                            {{( $params['nam'] ==  $item ) ? 'selected' : ''}} @endif value="{{$item}}">
                                            {{$item}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label id="nam-error" class="error" for="nam"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên nghề đào tạo</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" required disabled onchange="getdatacheck(this)"
                                        name="nghe_id" id="ma_nganh_nghe">
                                        <option value="-1" selected>Mã ngành nghề</option>
                                    </select>
                                    <label id="ma_nganh_nghe-error" class="error" for="ma_nganh_nghe"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" required onchange="getdatacheck(this)"
                                        name="dot" id="dot">
                                        <option value="-1" selected>Chọn</option>
                                        <option value="1">Đợt 1</option>
                                        <option value="2">Đợt 2</option>
                                    </select>
                                    <label id="dot-error" class="error" for="dot"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Kết quả HSSV tốt nghiệp gắn với doanh nghiệp
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
                                        <th scope="col">Dưới 3 tháng </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Số HSSV nhập học đầu khóa</td>
                                        <td><input type="number" min="0" step="1" name="nhap_hoc_dau_tot_nghiep_CD"
                                                class="form-control name-field"></td>
                                        <td><input type="number" min="0" step="1" name="nhap_hoc_dau_tot_nghiep_TC"
                                                class="form-control name-field"></td>
                                        <td><input type="number" min="0" step="1" name="nhap_hoc_dau_tot_nghiep_SC"
                                                class="form-control name-field"></td>
                                        <td><input type="number" min="0" step="1"
                                                name="duoi_3_thang_tot_nghiep_nhap_hoc_dau" class="form-control name-field"></td>
                                    </tr>
                                    <td>
                                        <td><label id="nhap_hoc_dau_tot_nghiep_CD-error" class="error" for="nhap_hoc_dau_tot_nghiep_CD"></label></td>
                                        <td><label id="nhap_hoc_dau_tot_nghiep_TC-error" class="error" for="nhap_hoc_dau_tot_nghiep_TC"></label></td>
                                        <td><label id="nhap_hoc_dau_tot_nghiep_SC-error" class="error" for="nhap_hoc_dau_tot_nghiep_SC"></label></td>
                                        <td><label id="duoi_3_thang_tot_nghiep_nhap_hoc_dau-error" class="error" for="duoi_3_thang_tot_nghiep_nhap_hoc_dau"></label></td>
                                    </td>
                                    <tr>
                                        <td>Số HSSV tốt nghiệp</td>
                                        <td><input type="number" min="0" step="1" name="tot_nghiep_CD"
                                                class="form-control name-field"></td>
                                        <td><input type="number" min="0" step="1" name="tot_nghiep_TC"
                                                class="form-control name-field"></td>
                                        <td><input type="number" min="0" step="1" name="tot_nghiep_SC"
                                                class="form-control name-field"></td>
                                        <td><input type="number" min="0" step="1" name="duoi_3_thang_tot_nghiep"
                                                class="form-control name-field"></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><label id="tot_nghiep_CD-error" class="error" for="tot_nghiep_CD"></label></td>
                                        <td><label id="tot_nghiep_TC-error" class="error" for="tot_nghiep_TC"></label></td>
                                        <td><label id="tot_nghiep_SC-error" class="error" for="tot_nghiep_SC"></label></td>
                                        <td><label id="duoi_3_thang_tot_nghiep-error" class="error" for="duoi_3_thang_tot_nghiep"></label></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start kết quả giải quyết việc làm -->
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Kết quả giải quyết việc làm
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <table class="table m-table m-table--head-bg-brand">
                                <tbody>
                                    <tr>
                                        <td>Tên doanh nghiệp</td>
                                        <td><input type="text" name="ten_doanh_nghiep" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Số HSSV được doanh nghiệp tuyển dụng sau tốt nghiệp</td>
                                        <td><input type="number" min="0" step="1" name="so_HSSV_duoc_tuyen_dung"
                                                class="form-control name-field"></td>

                                    </tr>
                                    <tr>
                                        <td>Mức lương doanh nghiệp trả cho HSSV</td>
                                        <td><input type="number" min="0" step="1" name="muc_luong_doanh_nghiep_tra"
                                                class="form-control name-field"></td>
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
                                    Tổng số HSSV tốt nghiệp
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <table class="table m-table m-table--head-bg-brand">
                                <tbody>
                                    <tr>
                                        <td>Tổng số</td>
                                        <td><input type="number" min="0" step="1" name="tong_HSSV_tot_nghiep"
                                                class="form-control name-field"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End kết quả giải quyết việc làm  -->

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
                <a style="color: white;" href="{{route('xuatbc.ket-qua-tot-nghiep-voi-doanh-nghiep')}}"><button
                        type="button" class="btn btn-danger mr-5">Hủy</button></a>
                <button type="submit" class="btn btn-primary">Thêm mới</button>

            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    var routeCheck = "{{ route('xuatbc.check-ton-tai') }}";
var routeGetMaNganhNghe = "{{ route('get_ma_nganh_nghe') }}";
$(document).ready(function(){
  $('.select2').select2();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{!! asset('lien_ket_dao_tao/lien_ket_dao_tao.js') !!}"></script>
<script src="{!! asset('chinh_sach_sinh_vien/validate-number.js') !!}"></script>
@endsection