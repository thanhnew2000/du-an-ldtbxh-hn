@extends('layouts.admin')
@section('title', "Quản lý cơ sở")
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                            <h3 class="m-portlet__head-text">
                                Quản lý cơ sở đào tạo
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-sm-3 offset-sm-3 ">
                            <a href="{{route('mang-luoi.tao-csdt')}}" class="btn m-btn--square  btn-success btn-block">
                                <i class="fas fa-plus"></i> Tạo mới cơ sở đào tạo
                            </a>
                        </div>
                        <div class="col-sm-3 ">
                            <button type="button" class="btn m-btn--square  btn-accent btn-block">
                                <i class="fas fa-pencil-alt"></i> Cập nhật thông tin cơ sở đào tạo
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 offset-sm-3 ">
                            <a href="{{route('giay-phep-hoat-dong.index')}}" class="btn m-btn--square  btn-success btn-block">
                                <i class="fab fa-empire"></i> Quản lý giấy phép hoạt động
                            </a>
                        </div>
                        <div class="col-sm-3 ">
                            <button type="button" class="btn m-btn--square  btn-accent btn-block">
                                <i class="fa fa-bookmark"></i> Quản lý giấy chứng nhận đào tạo nghề
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 offset-sm-3 ">
                            <button type="button" class="btn m-btn--square  btn-info btn-block">
                                <i class="fas fa-file-excel"></i> Kết xuất dữ liệu
                            </button>
                        </div>
                        <div class="col-sm-3 ">
                            <button type="button" class="btn m-btn--square  btn-brand btn-block">
                                <i class="fas fa-chart-pie"></i> Thống kê
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')

@endsection