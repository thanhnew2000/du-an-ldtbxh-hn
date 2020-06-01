@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <!-- begin- fillter -->
    <section class="fillter-area">
        <div class="fillter-title">
            <h4>Bộ lọc</h4>
        </div>

        <div class="fillter-form">
            <form action="">
                <div class="d-flex container pt-3">
                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name">Tên cơ sở</label>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected disabled>Chọn cơ sở</option>
                            <option>FPT Polytecnic</option>
                            <option>Cao Đẳng du lịch</option>
                            <option>Cao đẳng bách khoa</option>
                        </select>
                    </div>

                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name">Loại hình cơ sở</span>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected disabled>Chọn loại hình cơ sở</option>
                            <option>Công lập</option>
                            <option>Có vốn đầu tư nước ngoài</option>
                            <option>Tư thục</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex container pt-3">
                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name">Mã đơn vị</span>
                        <input type="text" class="form-control col-8" name="" id="">
                        </input>
                    </div>
                </div>

                <div class="d-flex justify-content-between container pt-3 mb-5 col-3">
                    <button type="submit" class="btn btn-primary btn-fillter">Tìm kiếm</button>
                    <button type="reset" class="btn btn-danger btn-fillter">Hủy</button>
                </div>

            </form>
        </div>
    </section>
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
            <a href="{{route('csdt.them')}}" class="btn btn-outline-primary">Thêm mới</a>
        </div>
    </section>
    <!-- end- action -->

    <section class="table-data container">
        <div class="m-section">
            <div class="m-section__content">
                <table class="table m-table">
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
                        @php($i=1);
                        @foreach($data as $csdt)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$csdt->ten}}</td>
                            <td>{{$csdt->ma_don_vi}}</td>
                            <td>{{$csdt->loai_hinh_co_so}}</td>
                            <td><img class="logo-csdt" src="{{$csdt->logo}}" alt=""></td>
                            <td>{{$csdt->qd_ten}}</td>
                            <td>{{$csdt->dia_chi}}</td>
                            <td>
                                <a href="{{route('csdt.sua', ['id'=> $csdt->id])}}"
                                    class="btn btn-outline-primary">Sửa</a>
                            </td>
                            <td>
                                <a href="{{route('csdt.chitiet', ['id'=> $csdt->id])}}" class="btn btn-outline-info">Chi
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