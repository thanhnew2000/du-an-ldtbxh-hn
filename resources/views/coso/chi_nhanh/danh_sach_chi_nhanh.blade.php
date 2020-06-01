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

                <div class="d-flex justify-content-between container pt-3 mb-5 col-2">
                    <button type="submit" class="btn btn-primary btn-fillter">Tìm kiếm</button>
                    {{-- <button type="reset" class="btn btn-danger btn-fillter">Hủy</button> --}}
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
            <a name="" id="" class="btn btn-outline-primary" href="{{ route('chinhanh.them') }}" role="button">Thêm</a>
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
                            <th>Địa chỉ</th>
                            <th>Hotline</th>
                            <th>Chi Nhánh</th>
                            <th>Mã chứng nhận</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1);
                        @foreach($data as $items)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$items->ten}}</td>
                            <td>{{$items->dia_chi}}</td>
                            <td>{{$items->hotline}}</td>
                            <td>
                                @if ($items->chi_nhanh_chinh == 1)
                                Chi nhánh chính
                                @else
                                Chi nhánh phụ
                                @endif</td>
                            <td>{{$items->ma_chung_nhan_dang_ki_hoat_dong}}</td>
                            <td>
                                <a href="{{route('chinhanh.sua', ['id'=> $items->id])}}"
                                    class="btn btn-outline-primary">Sửa</a>
                            </td>
                            <td>
                                <a href="{{route('csdt.chitiet', ['id'=> $items->id])}}"
                                    class="btn btn-outline-danger">Xóa</a>
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