@extends('layouts.admin')
@section('title', "Thêm kết quả xây dựng chương trình , giáo trình")
@section('style')
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Thêm<small>tổng hợp kết quả xây dựng chương trình , giáo trình</small>
                    </h3>
                </div>
            </div>
        </div>
    <form action="" method="get" class="m-form pt-5">
        <input type="hidden" name="page_size" value="20">
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Tên cơ sở</label>
                            <div class="col-lg-8">
                                <select name="bac_nghe" class="form-control " id="ten_co_so">
                                    <option selected="" value="6">Chọn đơn vị</option>
                                    <option value="5">FU</option>
                                    <option selected="" value="6">Fpoly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Năm</label>
                            <div class="col-lg-8">
                                <select name="bac_nghe" class="form-control ">
                                    <option selected="" value="6">Chọn năm</option>
                                    <option value="5">2018</option>
                                    <option selected="" value="6">2019</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Tên nghề</label>
                            <div class="col-lg-8">
                                <select name="bac_nghe" class="form-control " id="ten_nghe">
                                    <option selected="" value="6">Chọn đơn vị</option>
                                    <option value="5">FU</option>
                                    <option selected="" value="6">Fpoly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Đợt</label>
                            <div class="col-lg-8">
                                <select name="bac_nghe" class="form-control ">
                                    <option selected="" value="6">Chọn năm</option>
                                    <option value="5">2018</option>
                                    <option selected="" value="6">2019</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-5">
            <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                       Xây dựng mới
                    </h3>
                </div>
            </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row col-12">
                            <div class="col-md-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Tổng số</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng xây dựng mới chương chình CĐ</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng xây dựng mới chương chình CT</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng xây dựng mới chương chình SC</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng mới xây dựng giáo trình CĐ</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng mới xây dựng giáo trình TC</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng mới xây dựng giáo trình SC</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Kinh phí thực hiện</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-5">
            <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                       Chỉnh sửa
                    </h3>
                </div>
            </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row col-12">
                            <div class="col-md-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Tổng số</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng xây dựng mới chương chình CĐ</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng xây dựng mới chương chình CT</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng xây dựng mới chương chình SC</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng mới xây dựng giáo trình CĐ</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng mới xây dựng giáo trình TC</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Số lượng mới xây dựng giáo trình SC</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-7 col-form-label">Kinh phí thực hiện</label>
                                    <div class="col-lg-5">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
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
        <div >
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
</div>
    @endsection
    @section('script')
<script>
    $(document).ready(function() {
    $('#ten_co_so').select2();
});
</script>
<script>
    $(document).ready(function() {
    $('#ten_nghe').select2();
});
</script>
    @endsection
