@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <!-- begin- fillter -->
    <form action="" method="get">
        <div class="fillter">
            <div class="fillter-title">
                <h4>Bộ lọc</h4>
            </div>
            <div class="fillter-form d-flex justify-content-around">
                <div class="col-left col-lg-5">
                    <div class="single-field">
                        <label for="" class="form-name col-4">Tên cơ sở</label>
                        <input class="form-control" type="text" name="ten_co_so" id="">
                    </div>

                    <div class="single-field">
                        <label for="" class="form-name col-4">Mã đơn vị</label>
                        <input class="form-control" type="text" name="ma_don_vi" id="">
                    </div>
                </div>

                <div class="col-right col-lg-5">
                    <div class="single-field">
                        <label for="" class="form-name col-4">Loại hình cơ sở</label>

                        <select class="form-control" name="loai_hinh" id="">
                            <option selected disabled>Loại hình cơ sở</option>
                            <option value="1">Cơ sở công lập</option>
                            <option value="2">Cơ sở tư thục</option>
                            <option value="3">Cơ sở có vốn đầu tư nước ngoài</option>
                        </select>

                    </div>

                    <div class="single-field">
                        <label for="" class="form-name col-4">Quận</label>
                        <select class="form-control" name="loai_hinh" id="">
                            <option selected disabled>Quận/Huyện</option>
                            <option value="001">Cầu Giấy</option>
                            <option value="002">Ba Đình</option>
                            <option value="003">Hoàn Kiếm</option>
                            <option value="004">Thanh Xuân</option>

                        </select>
                    </div>
                </div>


            </div>
            <div class="d-flex justify-content-center mt-3 mb-3">
                <button class="btn btn-primary" type="submit">Tim kiếm</button>
            </div>
        </div>
    </form>

    <!-- end- fillter -->

    <!-- begin- action -->
    <section class="action-nav d-flex align-items-center justify-content-between mt-4	">
        <div class="action-template col-3 d-flex justify-content-between">
            <a href="#"><i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống
                biêu mẫu</a>
            <a href="#"><i class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="btn">
            <a href="{{route('csdt.tao-moi')}}" class="btn btn-outline-primary">Thêm mới</a>
        </div>
    </section>
    <!-- end- action -->

    <section class="table-data container">
        <div class="m-section">
            <div class="m-section__content">
                <table class="table m-table m-table--head-bg-brand">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên cơ sở đào tạo</th>
                            <th>Mã đơn vị</th>
                            <th>Loại hình cơ sở</th>
                            <th>Logo</th>
                            <th>Quyết đinh</th>
                            <th>Địa chỉ</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $csdt)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$csdt->ten}}</td>
                            <td>{{$csdt->ma_don_vi}}</td>
                            <td>{{$csdt->loai_hinh_co_so}}</td>
                            <td><img class="logo-csdt" src="{!! asset('storage/' . $csdt->logo) !!}" alt="">
                            </td>
                            <td>{{$csdt->qd_ten}}</td>
                            <td>{{$csdt->dia_chi}}</td>
                            <td>
                                <a href="{{route('csdt.cap-nhat', ['id'=> $csdt->id])}}"
                                    class="btn btn-outline-primary">Sửa</a>
                            </td>
                            <td>
                                <a href="{{route('csdt.chi-tiet', ['id'=> $csdt->id])}}"
                                    class="btn btn-outline-info">Chi
                                    tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-5 mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">{{$data->links()}}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</div>
@endsection