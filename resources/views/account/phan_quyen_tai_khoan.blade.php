@extends('layouts.admin')
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-users"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Quyền <small>Danh sách quyền</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            {{-- <input type="hidden" name="page_size" value="{{$params['page_size']}}"> --}}
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="form-group m-form__group row ">
                                <label class="col-lg-2 col-form-label">Trạng thái:</label>
                                <div class="col-lg-8">
                                    <select name="status" id="status" class="form-control ">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Từ khóa:</label>
                                <div class="col-lg-8">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quyền hạn:</label>
                                <div class="col-lg-8">
                                    <select name="role" id="role" class="form-control ">

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


                    </select>
                </div>
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên quyền</th>
                    <th>Tên chức năng</th>
                    <th>
                        <a href="" class="btn btn-success btn-sm">Thêm mới</a>
                    </th>
                </thead>
                <tbody>



                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a class="btn btn-primary btn-sm" href="">Sửa</a></td>
                    </tr>


                </tbody>
            </table>
            <div>


            </div>

        </div>
        <div class="m-portlet__foot d-flex justify-content-end">

        </div>
    </div>

</div>
@endsection