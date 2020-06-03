
@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="title mb-4">
            <h4>Xem tổng hợp số liệu HSSV có mặt</h4>
        </div>
        <section class="fillter-area">
            <div class="fillter-title">
                <h4>Bộ lọc</h4>
            </div>

            <div class="fillter-form">
                <form method="POST" action="saveAdd">
                    <div class="d-flex container pt-3">
                        <div class="form-group col-6 d-flex justify-content-around align-items-center">
                            <label for="" class="fillter-name col-3">Tên Cơ Sở</label>
                            <select class="form-control col-7" name="" id="">
                                <option value="" selected disabled>Chọn cơ sở</option>
                                <option>Trịnh Văn Bô</option>
                                <option>Hàm Nghi</option>
                                <option>Quan Hoa</option>
                            </select>
                        </div>

                        <div class="form-group col-6 d-flex justify-content-around align-items-center">
                            <span for="" class="fillter-name col-3">Loại hình cơ sở </span>
                            <select class=" form-control col-7 " name=" " id=" ">
                                <option value=" " selected disabled>Chọn loại hình cơ sở</option>
                                <option>Cao Đẳng</option>
                                <option>Trung Cấp</option>
                                <option>Sơ Cấp</option>
                            </select>
                        </div>
                    </div>
                </div>

            <div class="d-flex justify-content-between container pt-3 mb-5 col-4 ">
                <button type="submit " class="btn btn-primary btn-fillter ">Tìm kiếm</button>
                <button type="submit " class="btn btn-danger btn-fillter ">hủy</button>
            </div>
            
    </div>
    </section>
    <section class="action-nav d-flex align-items-center justify-content-between mt-4	">
        <div class="action-template col-4 d-flex justify-content-between">
            <a href="#"><i class="fa fa-download" aria-hidden="true"></i>
                    Tải xuống biểu mẫu</a>
            <a href="#"><i class="fa fa-upload" aria-hidden="true"></i>
                    Tải lên file Excel</a>
        </div>
        <div class="btn">
        <a href="{{route('xuatbc.them-so-sv')}}"><p class="btn btn-outline-primary">Thêm mới</p></a>
        </div>
    </section>
    <section class="container pt-3 ">
        <div class="m-section">
            <div class="m-section__content">
                <table class="table table-striped table-bordered " style="width: 100%;">
                    <thead class=" thead-dark">
                        @csrf
                        <tr>
                            <th>STT</th>
                            <th>Tên Cơ Sở</th>
                            <th>Cao Đẳng</th>
                            <th>Trung Cấp </th>
                            <th>Sơ Cấp </th>
                            <th>Khác </th>
                            <th>Chỉnh sửa</th>
                            <th>Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($data as $item => $qlsv)
                        <tr>
                            <th>{{$i++}}</th>
                            <td>{{$qlsv->cs_ten}}</td>
                            <td>{{$qlsv->so_luong_sv_Cao_dang}}</td>
                            <td>{{$qlsv->so_luong_sv_Trung_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_So_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_he_khac}}</td>
                            <td>
                                <a href="{{ route('xuatbc.sua-so-sv', ['id'=>$qlsv->id])}}">Chỉnh sửa</a>
                            </td>
                            <td>
                                <a href="{{ route('xuatbc.chi-tiet-so-lieu',[
                                    'co_so_id' => $qlsv->id,
                                ]) }}">Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </form>
            </div>
            {{-- <div>
                {{$data->links()}}
            </div> --}}
        </div>

    </section>
</div>
@endsection
