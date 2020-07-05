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
    <form method="post">
        @csrf
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Sinh Viên Đang Quản Lý <small>Thêm Số Liệu</small>
                        </h3>
                    </div>
                </div>
            </div>
            <form action="{{'xuatbc.them-so-sv'}}" method="POST" class="m-form">
                {{-- <input type="hidden" name="page_size" value="{{$params['page_size']}}"> --}}
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Nghề : <span class="batbuoc">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="form-control"  name="nghe_id" id="nghe_id">
                                            <option value="{{ old('nghe_id') }}">Chọn </option>
                                            @foreach ($nganhNghe as $item)
                                            <option class="form-control " value="{{$item->id}}">
                                                {{$item->ten_nganh_nghe}}
                                                - {{$item->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Tên cơ sở: <span class="batbuoc">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select name="co_so_id" class="form-control "  name="co_so_id"
                                            id="co_so_id">
                                            <option value="{{ old('co_so_id') }}">Chọn </option>
                                            @foreach ($coso as $item)
                                            <option value="{{$item->id}}">{{$item->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Loại Hình Cơ Sở : <span
                                            class="batbuoc">*</span> </label>
                                    <div class="col-lg-8">
                                        <select name="id_loai_hinh" class="form-control" name="id_loai_hinh">
                                            <option value="{{ old('id_loai_hinh') }}">Chọn </option>
                                            @foreach ($loaiHinh as $item)
                                            <option value="{{$item->id}}">{{$item->loai_hinh_co_so}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Năm : <span class="batbuoc">*</span> </label>
                                    <div class="col-lg-8">
                                        <select name="nam" class="form-control" name="nam">
                                            <option value="{{ old('nam') }}">Chọn </option>
                                            @foreach (config('common.nam_tuyen_sinh.list') as $item)
                                            <option @if (isset($params['nam']))
                                                {{( $params['nam'] ==  $item ) ? 'selected' : ''}} @endif
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
                                    <label class="col-lg-2 col-form-label">Đợt : <span class="batbuoc">*</span> </label>
                                    <div class="col-lg-8">
                                        <select class="form-control "  onchange="getdatacheck(this)" name="dot"
                                            id="dot">
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
        <div class="m-portlet">
            <div class="m-portlet__body">
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
                            <td>Tổng số</td>
                            <td><input class="form-control" min="0" name="so_luong_sv_Cao_dang"
                                    value="{{ old('so_luong_sv_Cao_dang') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_Trung_cap"
                                    value="{{ old('so_luong_sv_Trung_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_So_cap"
                                    value="{{ old('so_luong_sv_So_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_he_khac"
                                    value="{{ old('so_luong_sv_he_khac') }}" type="number"></td>
                        </tr>
                        {{-- <tr>
                    <td></td>
                    <td>
                        @if ($errors->has('so_luong_sv_Cao_dang'))
                        <span class="text-danger">{{ $errors->first('so_luong_sv_Cao_dang') }}</span>
                        @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_Trung_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_Trung_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_So_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_So_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_he_khac'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_he_khac') }}</span>
                            @endif
                        </td>
                        </tr> --}}
                        <tr>
                            <td>Số Lượng Sinh Viên Nữ</td>
                            <td><input class="form-control" min="0" name="so_luong_sv_nu_Cao_dang"
                                    value="{{ old('so_luong_sv_nu_Cao_dang') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_nu_Trung_cap"
                                    value="{{ old('so_luong_sv_nu_Trung_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_nu_So_cap"
                                    value="{{ old('so_luong_sv_nu_So_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_nu_khac"
                                    value="{{ old('so_luong_sv_nu_khac') }}" type="number"></td>
                        </tr>
                        {{-- <tr style="font-size: 1rem">
                    <td></td>
                    <td>
                        @if ($errors->has('so_luong_sv_nu_Cao_dang'))
                        <span class="text-danger">{{ $errors->first('so_luong_sv_nu_Cao_dang') }}</span>
                        @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_nu_Trung_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_nu_Trung_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_nu_So_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_nu_So_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_nu_khac'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_nu_khac') }}</span>
                            @endif
                        </td>
                        </tr> --}}
                        <tr>
                            <td>Số Lượng Sinh Viên Dân Tộc</td>
                            <td><input class="form-control" min="0" name="so_luong_sv_dan_toc_Cao_dang"
                                    value="{{ old('so_luong_sv_dan_toc_Cao_dang') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_dan_toc_Trung_cap"
                                    value="{{ old('so_luong_sv_dan_toc_Trung_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_dan_toc_So_cap"
                                    value="{{ old('so_luong_sv_dan_toc_So_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_dan_toc_khac"
                                    value="{{ old('so_luong_sv_dan_toc_khac') }}" type="number"></td>
                        </tr>
                        {{-- <tr>
                    <td></td>
                    <td>
                        @if ($errors->has('so_luong_sv_dan_toc_Cao_dang'))
                        <span class="text-danger">{{ $errors->first('so_luong_sv_dan_toc_Cao_dang') }}</span>
                        @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_dan_toc_Trung_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_dan_toc_Trung_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_dan_toc_So_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_dan_toc_So_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_dan_toc_khac'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_dan_toc_khac') }}</span>
                            @endif
                        </td>
                        </tr> --}}
                        <tr>
                            <td>Số Lượng Sinh Viên Hộ Khẩu Hà Nội</td>
                            <td><input class="form-control" min="0" name="so_luong_sv_ho_khau_HN_Cao_dang"
                                    value="{{ old('so_luong_sv_ho_khau_HN_Cao_dang') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_ho_khau_HN_Trung_cap"
                                    value="{{ old('so_luong_sv_ho_khau_HN_Trung_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_ho_khau_HN_So_cap"
                                    value="{{ old('so_luong_sv_ho_khau_HN_So_cap') }}" type="number"></td>
                            <td><input class="form-control" min="0" name="so_luong_sv_ho_khau_HN_khac"
                                    value="{{ old('so_luong_sv_ho_khau_HN_khac') }}" type="number"></td>
                        </tr>
                        {{-- <tr>
                    <td></td>
                    <td>
                        @if ($errors->has('so_luong_sv_ho_khau_HN_Cao_dang'))
                        <span class="text-danger">{{ $errors->first('so_luong_sv_ho_khau_HN_Cao_dang') }}</span>
                        @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_ho_khau_HN_Trung_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_ho_khau_HN_Trung_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_ho_khau_HN_So_cap'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_ho_khau_HN_So_cap') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($errors->has('so_luong_sv_ho_khau_HN_khac'))
                            <span class="text-danger">{{ $errors->first('so_luong_sv_ho_khau_HN_khac') }}</span>
                            @endif
                        </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
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
                                            <td>Tổng số học sinh, sinh viên nữ</td>
                                            <td><input name="tong_so_nu" type="number" min="0" step="1"
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng số học sinh, sinh viên dân tộc</td>
                                            <td><input name="tong_so_dan_toc_thieu_so" type="number" min="0" step="1"
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng số học sinh, sinh viên hộ khẩu Hà Nội</td>
                                            <td><input name="tong_so_ho_khau_HN" type="number" min="0" step="1"
                                                    class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng số học sinh, sinh viên các trình độ</td>
                                            <td><input name="tong_so_HSSV_co_mat_cac_trinh_do" type="number" step="1"
                                                    class="form-control" min="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4" style="float: right">
                <div class="col-md-12">
                    <button type="button" class="btn btn-danger mr-5"><a style="color: white"
                            href="{{route('xuatbc.ds-sv-dang-hoc')}}">Hủy</a></button>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
            $('#nghe_id').select2();
            $('#co_so_id').select2();
            });
    
</script>
@endsection