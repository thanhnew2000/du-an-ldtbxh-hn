@extends('layouts.admin')
@section('title', "Chi tiết số liệu tuyển sinh")
@section('style')
{{-- <link href="{!! asset('tuyensinh/css/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" /> --}}
<style>
    .m-table.m-table--border-danger, .m-table.m-table--border-danger th, .m-table.m-table--border-danger td{
        border-color: #bcb1b1 ;
    } 
    table thead th[colspan="4"],th[colspan="5"]{
        border-bottom-width:1px;
        border-bottom: 1px solid #bcb1b1 !important;
    }
</style>
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
                        Chi tiết <small>Thông tin tuyển sinh</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <h3>Cơ sở đào tạo: {{$thongtincoso->ten}}</h3>
            <p>Loại hình cơ sở: {{$thongtincoso->loai_hinh_co_so}}</p>
            <p>Địa chỉ: {{$thongtincoso->dia_chi}}</p>
            <p>Phường/Xã: {{$thongtincoso->ten_xa_phuong}}</p>
            <p>Quận/Huyện: {{$thongtincoso->ten_quan_huyen}}</p>
        </div>
    </div>

    <div class="m-portlet">
        <form action="" method="get" class="m-form">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="nam" id="nam">
                                        <option value="" selected >Chọn</option>
                                        @foreach (config('common.nam_tuyen_sinh.list') as $item)
                                        <option 
                                        @if (isset($params['nam']))
                                                {{( $params['nam'] ==  $item ) ? 'selected' : ''}}  
                                                @endif
                                                value="{{$item}}"> {{$item}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="dot" id="dot">
                                        <option value="" >Chọn</option>
                                        <option
                                        @if (isset($params['dot']))
                                            {{( $params['dot'] ==  1 ) ? 'selected' : ''}}  
                                        @endif
                                        value="1" >Đợt 1</option>
                                        <option value="2"
                                        @if (isset($params['dot']))
                                        {{( $params['dot'] ==  2 ) ? 'selected' : ''}}  
                                        @endif
                                        >Đợt 2</option>
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
        @if (session('thongbao')) 
        <div class="alert alert-success">
        {{session('thongbao')}}
        </div>
        @endif   
        <div class="m-portlet__body">
            <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary table-responsive">
                <thead>
                    <tr class=" text-center ">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th rowspan="2">Mã nghề</th>
                        <th rowspan="2">Tên nghề</th>
                        <th colspan="5">Kế hoạch tuyển sinh</th>
                        <th colspan="4">Kết quả tuyển sinh nữ</th>
                        <th colspan="4">Kết quả tuyển sinh <br> dân tộc thiểu số </th>
                        <th colspan="4">Kết quả tuyển sinh <br> hộ khẩu Hà Nội</th>
                        <th rowspan="2">Thao tác</th>
                    </tr>
                    <tr class="pt-3 row2">
                        <th>Tổng</th>
                        <th>CĐ</th>
                        <th>TC</th>
                        <th>SC</th>
                        <th>Khác</th>
                        <th>CĐ</th>
                        <th>TC</th>
                        <th>SC</th>
                        <th>Khác</th>
                        <th>CĐ</th>
                        <th>TC</th>
                        <th>SC</th>
                        <th>Khác</th>
                        <th>CĐ</th>
                        <th>TC</th>
                        <th>SC</th>
                        <th>Khác</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->nam}}</td>
                        <td>{{$item->dot}}</td>
                        <td>{{$item->nghe_id}}</td>
                        <td>{{$item->ten_nganh_nghe}}</td>
                        <td>{{$item->tong_so_tuyen_sinh}}</td>
                        <td>{{$item->ke_hoach_tuyen_sinh_cao_dang}}</td>
                        <td>{{$item->ke_hoach_tuyen_sinh_trung_cap}}</td>
                        <td>{{$item->ke_hoach_tuyen_sinh_so_cap}}</td>
                        <td>{{$item->ke_hoach_tuyen_sinh_khac}}</td>
                        <td>{{$item->so_luong_sv_nu_Cao_dang}}</td>
                        <td>{{$item->so_luong_sv_nu_Trung_cap}}</td>
                        <td>{{$item->so_luong_sv_nu_So_cap}}</td>
                        <td>{{$item->so_luong_sv_nu_khac}}</td>
                        <td>{{$item->so_luong_sv_dan_toc_Cao_dang}}</td>
                        <td>{{$item->so_luong_sv_dan_toc_Trung_cap}}</td>
                        <td>{{$item->so_luong_sv_dan_toc_So_cap}}</td>
                        <td>{{$item->so_luong_sv_dan_toc_khac}}</td>
                        <td>{{$item->so_luong_sv_ho_khau_HN_Cao_dang}}</td>
                        <td>{{$item->so_luong_sv_ho_khau_HN_Trung_cap}}</td>
                        <td>{{$item->so_luong_sv_ho_khau_HN_So_cap}}</td>
                        <td>{{$item->so_luong_sv_ho_khau_HN_khac}}</td>
                        <td>
                            @if ($item->trang_thai<3) <a href="{{route('suasolieutuyensinh',['id'=>$item->id])}}">
                                Sửa</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection