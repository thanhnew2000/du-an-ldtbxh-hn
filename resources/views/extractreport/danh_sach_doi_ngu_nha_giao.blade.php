@extends('layouts.admin')
@section('title', "Danh sách đội ngũ giáo")
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
            <input type="hidden" name="page_size" value="{{$params['page_size']}}">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input" @if(isset($params['keyword']))
                                        value="{{$params['keyword']}}" @endif placeholder="Nhập tên cơ sở"
                                        name="keyword">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở</label>
                                <div class="col-lg-8">
                                    <select name="loaihinhcoso" class="form-control ">
                                        <option value="">-----Chọn loại hình cơ sở-----</option>
                                        @foreach ($getloaihinhcoso as $item)
                                        <option value="{{ $item->id }}" @if(isset($params['loaihinhcoso']) &&
                                            $params['loaihinhcoso']==$item->id)
                                            selected
                                            @endif>
                                            {{ $item->loai_hinh_co_so }}
                                        </option>

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
                                    <select name="coquanchuquan" class="form-control ">
                                        <option value="">-----Chọn cơ quan chủ quản-----</option>
                                        @foreach ($getcoquanchuquan as $item)
                                        <option value="{{ $item->id }}" @if(isset($params['coquanchuquan']) &&
                                            $params['coquanchuquan']==$item->id)
                                            selected
                                            @endif>
                                            {{ $item->ten }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select name="nam" class="form-control ">
                                        <option value="">-----Chọn năm-----</option>

                                        <option value="{{ $nam }}" @if(isset($params['nam']) && $params['nam']==$nam)
                                            selected @endif>
                                            {{ $nam }}
                                        </option>

                                        <option value="{{ $nam-1 }}" @if(isset($params['nam']) &&
                                            $params['nam']==$nam-1) selected @endif>
                                            {{ $nam-1 }}
                                        </option>

                                        <option value="{{ $nam-2 }}" @if(isset($params['nam']) &&
                                            $params['nam']==$nam-2) selected @endif>
                                            {{ $nam-2 }}
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select name="dot" id="" class="form-control ">
                                        <option value="">-----Chọn đợt-----</option>

                                        <option value="1" @if(isset($params['dot']) && $params['dot']==1) selected
                                            @endif>
                                            1
                                        </option>

                                        <option value="2" @if(isset($params['dot']) && $params['dot']==2) selected
                                            @endif>
                                            2
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Ngành nghề</label>
                                <div class="col-lg-8">
                                    <select name="nghe_id" id="" class="form-control ">
                                        <option value="">-----Chọn ngành nghề-----</option>
                                        @forelse ($get_nganh_nghe as $item)
                                        <option value="{{ $item->id }}" @if(isset($params['nghe_id']) &&
                                            $params['nghe_id']==$item->id)
                                            selected
                                            @endif>

                                            {{ $item->id }} --- {{ $item->ten_nganh_nghe }}
                                        </option>

                                        @empty

                                        @endforelse
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
                        @foreach(config('common.paginate_size.list') as $size)
                        <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}</option>
                        @endforeach

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
                        <th>Năm</th>
                        <th>Đợt</th>
                        <th>Ngành Nghề</th>

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

                        <td>{{ $item->nam }}</td>
                        <td>{{ $item->dot }}</td>
                        <td>{{ $item->ten_nghe }}</td>
                        <td>
                            <a href="{{ route('xuatbc.chi-tiet-theo-co-so',['co_so_id'=>$item->co_so_id]) }}"
                                class="btn btn-primary btn-sm">Chi tiết</a>
                        </td>
                    </tr>
                    @php
                    $stt++;
                    @endphp
                    @endforeach

                </tbody>
            </table>
            <div>
                @if ($thongbao)
                <div class="thongbao border" style="color: red; text-align: center;">
                    <h4 class="m-portlet__head-text ">
                        {{$thongbao}}
                    </h4>
                </div>
                @endif
            </div>
            <div class="m-portlet__foot d-flex justify-content-end">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>

</div>
</div>

@endsection
@section('script')
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

@if (session('kq'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Thêm thành công !',
        showConfirmButton: false,
        timer: 3500
    })

</script>
@endif
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function () {
        $('#page-size').change(function () {
            var coquanchuquan = $('[name="coquanchuquan"]').val();
            var loaihinhcoso = $('[name="loaihinhcoso"]').val();
            var keyword = $('[name="keyword"]').val();
            var dot = $('[name="dot"]').val();
            var nam = $('[name="nam"]').val();
            var nghe_id = $('[name="nghe_id"]').val();
            var page_size = $(this).val();
            var reloadUrl =
                `${currentUrl}?coquanchuquan=${coquanchuquan}&
                loaihinhcoso=${loaihinhcoso}&
                dot=${dot}&
                nam=${nam}&
                keyword=${keyword}&
                nghe_id=${nghe_id}&
                page_size=${page_size}`;
            window.location.href = reloadUrl;
        });

        $('[name="coquanchuquan"]').select2();
        $('[name="nghe_id"]').select2();
        $('[name="loaihinhcoso"]').select2();

    });

</script>
@endsection
