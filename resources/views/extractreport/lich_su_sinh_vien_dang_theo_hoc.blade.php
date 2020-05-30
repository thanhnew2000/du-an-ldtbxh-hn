@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="title mb-4">
            <h4>Xem Tổng Hợp Số Liệu HSSV có mặt</h4>
        </div>
        <section class="fillter-area">
            <div class="fillter-title">
                <h4>Bộ lọc</h4>
            </div>

            <div class="fillter-form">
                <form action="">
                    <div class="d-flex container pt-3">
                        <div class="form-group col-6 d-flex justify-content-around align-items-center">
                            <label for="" class="fillter-name col-3">Năm</label>
                            <select class="form-control col-7" name="" id="">
                                <option value="" selected disabled>Chọn năm</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                            </select>
                        </div>

                        <div class="form-group col-6 d-flex justify-content-around align-items-center">
                            <span for="" class="fillter-name col-3">Đợt</span>
                            <select class=" form-control col-7 " name=" " id=" ">
                                <option value=" " selected disabled>Chọn đợt</option>
                                <option>Đợt I</option>
                                <option>Đợt II</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex container pt-3 ">
                        <div class="form-group col-6 d-flex justify-content-around align-items-center ">
                            <span for=" " class="fillter-name col-3 ">Loại hình cơ sở</span>
                            <select class="form-control col-7 " name=" " id=" ">
                                <option value=" " selected disabled>Chọn loại hình cơ sở</option>
                                <option>Cao Đẳng</option>
                                <option>Trung Cấp</option>
                                <option>Sơ Cấp</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between container pt-3 mb-5 col-4 ">
                        <button type="submit " class="btn btn-primary btn-fillter ">Tìm kiếm</button>
                        <button type="submit " class="btn btn-danger btn-fillter ">hủy</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="action-nav d-flex align-items-center justify-content-between mt-4	">
            <div class="action-template col-4 d-flex justify-content-between">
                <a href="#"><i class="fa fa-download" aria-hidden="true"></i>
                    Tải xuống
                    biêu mẫu</a>
                <a href="#"><i class="fa fa-upload" aria-hidden="true"></i>
                    Tải lên file Excel</a>
            </div>
        </section>
        <section class="container pt-3 ">
            <div class="m-section ">
                <div class="m-section__content " style="overflow-x:auto" ;>
                    <table class="table table-bordered  thead-bluedark  ">
                        <thead>
                            <tr class=" text-center ">
                                <th rowspan="2 ">STT</th>
                                <th rowspan="2 ">Mã Ngành Nghề</th>
                                <th rowspan="2 ">Tên Cơ Sở</th>
                                <th rowspan="2 ">Loại hình cơ sở</th>
                                <th colspan="3 ">Cao Đẳng</th>
                                <th colspan="3 ">Trung Cấp</th>
                                <th colspan="3 ">Sơ Cấp</th>
                                <th colspan="3 ">Khác</th>
                            </tr>
                            <tr class="pt-3 ">

                                <th>Nữ</th>
                                <th>Hộ Khẩu Hà Nội</th>
                                <th>Dân Tộc Thiểu Số</th>
                                <th>Nữ</th>
                                <th>Hộ Khẩu Hà Nội</th>
                                <th>Dân Tộc Thiểu Số</th>
                                <th>Nữ</th>
                                <th>Hộ Khẩu Hà Nội</th>
                                <th>Dân Tộc Thiểu Số</th>
                                <th>Nữ</th>
                                <th>Hộ Khẩu Hà Nội</th>
                                <th>Dân Tộc Thiểu Số</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($data as $item => $qlsv)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$qlsv->so_luong_sv_nu_Cao_dang}}</td>
                                <td>Cao Đẳng FPT</td>
                                <td>Cao Đẳng</td>
                                <td>1000</td>
                                <td>2000</td>
                                <td>3000</td>
                                <td>1000</td>
                                <td>2000</td>
                                <td>3000</td>
                                <td>1000</td>
                                <td>2000</td>
                                <td>3000</td>
                                <td>1000</td>
                                <td>2000</td>
                                <td>3000</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection