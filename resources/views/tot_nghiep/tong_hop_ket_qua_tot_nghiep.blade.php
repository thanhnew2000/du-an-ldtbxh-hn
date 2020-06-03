@extends('layouts.admin')
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
                        Tổng hợp kết quả<small>tốt nghiệp</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <input type="hidden" name="page_size" value="">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input"
                                    placeholder="Nhập mã hoặc tên ngành nghề" name="keyword">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-4 col-form-label">Loại hình cơ sở:</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option>Chọn tên cơ sở</option>
                                        <option>Trung cấp</option>
                                    </select>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row mt-3">
                                <label class="col-lg-2 col-form-label">Năm :</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option>Chọn đợt</option>
                                        <option>Trung cấp</option>
                                    </select>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row mt-3">
                                <label class="col-lg-4 col-form-label">Đợt:</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option>Chọn đợt</option>
                                        <option>Trung cấp</option>
                                    </select>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        <option value="">50</option>
                        <option value="">100</option>

                    </select>
                </div>
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên cơ sở đào tạo</th>
                    <th>Mã ngành nghề</th>
                    <th>Loại hình cơ sở</th>
                    <th>Hệ đào tạo</th>
                    <th>Tổng số sinh viên tốt nghiệp</th>
                    <th>
                        <a href="#" class="btn btn-success btn-sm">Thêm mới</a>
                    </th>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>CNTT</td>
                        <td>23</td>
                        <td>23</td>
                        <td>23</td>
                        <td>200</td>
                        <td>
                            <a href="{{ route('xuatbc.chi-tiet-tong-hop') }}" class="btn btn-info btn-sm">Chi tiết</a>
                            <a href="{{ route('xuatbc.sua-tong-hop') }}" class="btn btn-primary btn-sm">Cập nhật</a>

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection