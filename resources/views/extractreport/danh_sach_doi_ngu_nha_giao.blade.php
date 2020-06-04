@extends('layouts.admin')
@section('title', "Danh sách đội ngủ giáo")
@section('style')
@endsection
@section('content')
@php
    $stt = 1;
@endphp
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Bộ lọc
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <input type="hidden" name="page_size" value="20">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input" placeholder="Nhập tên cơ sở"
                                        name="keyword">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option selected="" value="6">Chọn loại hình cơ sở</option>
                                        @foreach ($param['loaihinhcoso'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Cơ quan chủ quản</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option selected="" value="6">Chọn cơ quan chủ quản</option>
                                        @foreach ($param['coquanchoquan'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên ngành</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input"
                                        placeholder="Nhập mã hoặc tên ngành nghề" name="keyword">
                                </div>
                            </div>
                        </div> --}}
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
    <div class="row mb-4 bieumau">
        <div class="col-lg-2">
            <a href=""><i class="la la-download">Tải xuống biểu mẫu</i></a>
        </div>
        <div class="col-lg-2">
            <a href=""><i class="la la-upload">Tải lên file excel</i></a>
        </div>
        <div class="col-lg-8 " style="text-align: right">
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        {{-- @foreach(config('common.paginate_size.list') as $size)
                        <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}</option>
                        @endforeach --}}

                    </select>
                </div>
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên cơ sở</th>
                        <th>Loại hình cơ sở</th>
                        <th>Cơ quan chủ quản</th>
                        <th>Tổng số </th>
                        <th>
                            <a href="{{ route('xuatbc.them-ds-nha-giao') }}" class="btn btn-success btn-sm">Thêm mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $item->ten }}</td>
                        <td>{{ $item->ten_loai_hinh_co_so }}</td>
                        <td>{{ $item->ten_co_quan_chu_quan }}</td>
                        <td>{{ $item->tong_so_can_bo }}</td>
                        <td>
                            <a href="{{ route('xuatbc.sua-ds-nha-giao') }}" class="btn btn-info btn-sm">Sửa</a>
                            <a href="" class="btn btn-primary btn-sm">Chi tiết</a>
                        </td>
                    </tr>
                        @php
                            $stt++;
                        @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="m-portlet__foot d-flex justify-content-end">
    <nav>
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=3">3</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=4">4</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=5">5</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=6">6</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=7">7</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=8">8</a></li>
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=27">27</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/danhSach?page=28">28</a></li>

            <li class="page-item">
                <a class="page-link" href="http://127.0.0.1:8000/danhSach?page=2" rel="next" aria-label="Next »">›</a>
            </li>
        </ul>
    </nav>

</div>
</div>
</div>


@endsection
@section('script')
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function () {
        $('#page-size').change(function () {
            // var status = $('[name="status"]').val();
            // var role = $('[name="role"]').val();
            // var keyword = $('[name="keyword"]').val();
            var page_size = $(this).val();
            var reloadUrl =
                // `${currentUrl}?status=${status}&role=${role}&keyword=${keyword}&page_size=${page_size}`;
                `${currentUrl}?page_size=${page_size}`;
            window.location.href = reloadUrl;
        });

    });

</script>
@endsection

