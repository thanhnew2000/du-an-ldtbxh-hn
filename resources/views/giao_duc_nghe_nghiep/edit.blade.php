@extends('layouts.admin')
@section('title', "Cập nhật quản lý giáo dục nghề nghiệp")
@section('style')
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content container-fluid">
    @csrf
    <div class="m-portlet mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Cập nhật<small>quản lý giáo dục nghề nghiệp</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label ">Tên cơ sở đào tạo </label>
                            <div class="col-lg-9">
                                <select class="form-control " disabled>
                                    <option value="">
                                        {{-- {{$data->ten}} --}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">Năm </label>
                            <div class="col-lg-9">
                                <select class="form-control " id="nam" disabled>
                                    <option value="">
                                        {{-- {{$data->nam}} --}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label ">Tên nghề </label>
                            <div class="col-lg-9">
                                <select class="form-control " disabled>
                                    <option value="">
                                        {{-- {{$data->nghe_id}}- {{$data->ten_nganh_nghe}} --}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">Đợt </label>
                            <div class="col-lg-9">
                                <select class="form-control " disabled>
                                    <option value="">
                                        {{-- {{$data->dot}} --}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="m-portlet mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                       Tên ngành, nghề/ quy mô được cấp trong GCN
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="row col-12">
                    <div class="col-md-4">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label">Mã cấp II</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                    name="ma_cap_2">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label">Quy mô tuyển sinh Trung Cấp</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                    name="quy_mo_tuyen_sinh_TC">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label">Quy mô tuyển sinh Sơ Cấp</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                    name="quy_mo_tuyen_sinh_SC">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-end">
        <div class="col-lg-1 ">
            <button type="submit" class="btn btn-danger">Hủy</button>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#ten_don_vi').select2();
});
</script>
<script>
    $(document).ready(function() {
    $('#ten_con_quan_chu_quan').select2();
});
</script>
<script>
    $(document).ready(function() {
    $('#ten_nganh_nghe').select2();
});
</script>

@endsection