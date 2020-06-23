@extends('layouts.admin')
@section('title', "Thêm mới thông tin đăng kí nghề nghiệp")
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
                       Thêm<small>thông tin đăng kí nghề nghiệp</small>
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
                            <label class="col-lg-2 col-form-label">Tên đơn vị</label>
                            <div class="col-lg-8">
                                <select name="bac_nghe" class="form-control " id="ten_don_vi">
                                    <option selected="" value="6">Chọn đơn vị</option>
                                    <option value="5">FU</option>
                                    <option selected="" value="6">Fpoly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Cơ quan chủ quản</label>
                            <div class="col-lg-8">
                                <select name="bac_nghe" class="form-control " id="ten_con_quan_chu_quan">
                                    <option selected="" value="6">Chọn đơn vị</option>
                                    <option value="5">FU</option>
                                    <option selected="" value="6">Fpoly</option>
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
                       Giấy chứng nhận<small>đăng ký hoạt động GDNN</small>
                    </h3>
                </div>
            </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row col-12">
                            <div class="col-md-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Số ngày tháng năm cấp</label>
                                    <div class="col-lg-7">
                                        <input type="date" class="form-control m-input" 
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Địa điểm đào tạo</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control m-input" placeholder="Nhập địa điểm đào tạo"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Quận/Huyện</label>
                                    <div class="col-lg-7">
                                        <select name="bac_nghe" class="form-control " >
                                            <option selected="" value="6">Fpoly</option>
                                            <option value="5">FU</option>
                                            <option selected="" value="6">Chọn quận/huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Phường/Xã</label>
                                    <div class="col-lg-7">
                                        <select name="bac_nghe" class="form-control " >
                                            <option selected="" value="6">Fpoly</option>
                                            <option value="5">FU</option>
                                            <option selected="" value="6">Chọn phường/xã</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Giấy chứng nhận</label>
                                    <div class="col-lg-7">
                                        <select name="bac_nghe" class="form-control " >
                                            <option selected="" value="6">Fpoly</option>
                                            <option value="5">FU</option>
                                            <option selected="" value="6">Chọn giấy chứng nhận</option>
                                        </select>
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
                               Tên ngành, nghề<small>quy mô được cấp trong GCN</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="row col-12">
                            <div class="col-md-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Tên ngành nghề</label>
                                    <div class="col-lg-7">
                                        <select name="bac_nghe" class="form-control " id="ten_nganh_nghe">
                                            <option selected="" value="6">Btec</option>
                                            <option value="5">FU</option>
                                            <option selected="" value="6">Chọn tên ngành nghề</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Mã cấp</label>
                                    <div class="col-lg-7">
                                        <select name="bac_nghe" class="form-control " >
                                            <option selected="" value="6">2</option>
                                            <option value="5">1</option>
                                            <option selected="" value="6">Chọn tên mã cấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Quy mô tuyển sinh TC</label>
                                    <div class="col-lg-7">
                                        <input type="number" class="form-control m-input" placeholder="Nhập vào số"
                                            name="keyword">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-5 col-form-label">Quy mô tuyển sinh SC</label>
                                    <div class="col-lg-7">
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