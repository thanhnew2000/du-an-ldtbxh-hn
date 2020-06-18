@extends('layouts.admin')
@section('title', "Thêm chính sách sinh viên")
@section('style')

<style>
    .batbuoc {
        color: red;
    }

    table input {
        border: 1px solid #000 !important;
    }
</style>
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content container-fluid">
    <form action="{{route('xuatbc.post-them-chinh-sach-sinh-vien')}}" method="POST" class="m-form">
        @csrf
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Chính sách sinh viên <small>Thêm Số Liệu</small>
                        </h3>
                    </div>
                </div>
            </div>


            <div class="m-portlet__body">

                @if (session('thongbao'))

                <div class="alert alert-success" role="alert">
                    <strong>{{session('thongbao')}}</strong>
                </div>
                @endif
                <div class="m-form__section m-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở đào tạo <span class="batbuoc">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <select class="form-control " required name="co_so_id" onchange="getdatacheck(this)"
                                        id="co_so_id">
                                        <option value="">Chọn</option>
                                        @foreach ($coso as $item)
                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm <span class="batbuoc">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <select id="nam" class="form-control " onchange="getdatacheck(this)" required
                                        name="nam">
                                        <option value="">Chọn </option>
                                        @foreach (config('common.nam_tuyen_sinh.list') as $item)
                                        <option @if (isset($params['nam']))
                                            {{( $params['nam'] ==  $item ) ? 'selected' : ''}} @endif value="{{$item}}">
                                            {{$item}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Chính sách<span class="batbuoc">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <select class="form-control " required onchange="getdatacheck(this)"
                                        name="chinh_sach_id" id="chinh_sach_id">
                                        <option value="">Chọn </option>
                                        @foreach ($chinhsach as $item)

                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Đợt <span class="batbuoc">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <select class="form-control " required onchange="getdatacheck(this)" name="dot"
                                        id="dot">
                                        <option value="" selected>Chọn</option>
                                        <option value="1">Đợt 1</option>
                                        <option value="2">Đợt 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                @if (session('thongbao'))

                <div class="alert alert-success" role="alert">
                    <strong>{{session('thongbao')}}</strong>
                </div>
                @endif
                <table class="table m-table m-table--head-bg-brand" id="remove-boder">
                    <thead>
                        <tr>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Cao đẳng</th>
                            <th scope="col">Trung cấp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Số Lượng Sinh Viên</td>
                            <td><input class="form-control" min="0" name="so_hssv_CD" type="number">
                            </td>
                            <td><input class="form-control" min="0" name="so_hssv_TC" type="number">
                            </td>
                        </tr>

                        <tr>
                            <td>Kinh phí</td>
                            <td><input class="form-control" min="0" name="kinh_phi_CD" type="number">
                            </td>
                            <td><input class="form-control" min="0" name="kinh_phi_TC" type="number">
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h5 class="m-portlet__head-text">
                            Tổng số
                        </h5>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">

                <table class="table m-table m-table--head-bg-brand" id="remove-boder">
                    <thead>
                        <tr>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Trong đó</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tổng số lượng sinh viên</td>
                            <td><input name="tong_so_hssv" type="number" min="0" step="1" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Tổng kinh phí</td>
                            <td><input name="kinh_phi" type="number" min="0" step="1" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Ghi chú</td>
                            <td>
                                <textarea class="form-control" name="ghi_chu" rows="3"
                                    style="border: 1px solid #000000"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 d-flex justify-content-end">
                    <a><button type="button" class="btn btn-danger mr-3"><a style="color: white"
                                href="{{route('xuatbc.tong-hop-chinh-sach-sinh-vien')}}">Hủy</button></a>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@section('script')
<script type="text/javascript">
    var routeCheck = "{{ route('xuatbc.check-ton-tai-chinh-sach-sinh-vien') }}";
    $(document).ready(function() {
    $('#co_so_id').select2(); 
    $('#chinh_sach_id').select2();
    $('#nam').select2();
    $('#dot').select2();
});
$("#page-size").change(function() {
    $("#page_size_hide").val($('#page-size').val())
    var url = new URL(window.location.href);
    var search_params = url.searchParams;
    search_params.set('page_size', $("#page_size_hide").val());
    url.search = search_params.toString();
    var new_url = url.toString();
    window.location.href = new_url
});
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{!! asset('chinh_sach_sinh_vien/chinh_sach_sinh_vien.js') !!}"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{!! asset('chinh_sach_sinh_vien/validate-number.js') !!}"></script>
@endsection