@extends('layouts.admin');

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
                        Danh sách địa điểm đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở:</label>
                                <div class="col-lg-8">
                                    <input type="text" name="ten_co_so" value="{{ $params['ten_co_so'] }}" class="
                                        form-control m-input" placeholder="Nhập từu khóa tên cơ sở">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Mã chứng nhận</label>
                                <div class="col-lg-8">
                                    <input type="text" name="ma_chung_nhan"
                                        placeholder="Mã chứng nhận đăng kí hoạt động"
                                        value="{{ $params['ma_chung_nhan'] }}" class="form-control m-input">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại chi nhánh</label>
                                <div class="col-lg-8">
                                    <select name="loai_chi_nhanh" class="form-control ">
                                        <option disabled selected>chọn loại chi nhánh</option>
                                        @if (isset($params['loai_chi_nhanh']))
                                        @if ($params['loai_chi_nhanh'] == 1)
                                        <option value="1" selected>Chi nhánh chính</option>
                                        <option value="0">Chi nhánh phụ</option>
                                        @elseif($params['loai_chi_nhanh'] == 0)
                                        <option value="0" selected>Chi nhánh phụ</option>
                                        <option value="1">Chi nhánh chính</option>
                                        @endif
                                        @else
                                        <option value="0">Chi nhánh phụ</option>
                                        <option value="1">Chi nhánh chính</option>
                                        @endif
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
        <div class="m-portlet__body">
            <div class="m-section__content">
                @if (\Session::has('mess'))
                <div class="alert alert-danger" role="alert">
                    <strong>{!! \Session::get('mess') !!}</strong>
                </div>
                @endif

                @if (\Session::has('mess-success'))
                <div class="alert alert-success" role="alert">
                    <strong>{!! \Session::get('mess-success') !!}</strong>
                </div>
                @endif
                <div class="m-portlet__head-caption mt-3">
                    @if (isset($chiNhanhDefault))
                    <div class="m-portlet__head-title pt-3 pb-3">
                        <h5 class="m-portlet__head-text">
                            Danh sách địa điểm đào tạo trường:
                            <b>{{ $chiNhanhDefault->ten }}</b>

                        </h5>
                    </div>
                    @endif
                </div>

                <table class="table m-table m-table--head-bg-brand">
                    <thead>
                        <th>STT</th>
                        @if (!isset($chiNhanhDefault))
                        <th>Tên cơ sở</th>
                        @endif
                        <th>Địa chỉ</th>
                        <th>Hotline</th>
                        <th>Loại chi nhánh</th>
                        <th>Mã chứng nhận</th>
                        @can('them_moi_dia_diem_dao_tao')
                        <th>
                            @if (isset($chiNhanhDefault))
                            <form action="{{ route('chi-nhanh.tao-moi') }}" method="get">
                                <input type="hidden" name="co_so_id" value="{{ $chiNhanhDefault->id }}">
                                <button type="submit" class="btn btn-success btn-sm mr-3">Thêm mới</button>
                            </form>
                            @else
                            <a href="{{ route('chi-nhanh.tao-moi') }}" class="btn btn-success btn-sm mr-3">Thêm
                                mới</a>
                            @endif
                        </th>
                        @endcan
                    </thead>
                    <tbody>
                        @if (isset($chiNhanhDefault))
                        <tr>
                            <td>0</td>
                            <td>{{ $chiNhanhDefault->dia_chi }}</td>
                            <td>{{ $chiNhanhDefault->dien_thoai }}</td>
                            <td>Chi nhánh chính</td>
                        </tr>
                        @endif

                        @php($i=1)

                        @forelse($data as $items)
                        <tr>
                            <td>{{$i++}}</td>
                            @if (!isset($chiNhanhDefault))
                            <td>{{$items->ten}}</td>
                            @endif
                            <td>{{$items->dia_chi}}</td>
                            <td>{{$items->hotline}}</td>
                            <td>
                                @if ($items->chi_nhanh_chinh == 1)
                                Chi nhánh chính
                                @elseif($items->chi_nhanh_chinh == 0)
                                Chi nhánh phụ
                                @endif
                            </td>
                            <td>{{$items->ma_chung_nhan_dang_ki_hoat_dong}}</td>
                            <td class="d-flex">
                                @can('cap_nhat_dia_diem_dao_tao')
                                <a href="{{route('chi-nhanh.cap-nhat', ['id'=> $items->id])}}"
                                    class="btn btn-primary btn-sm mr-3">Cập nhật</a>
                                @endcan
                                @can('xoa_dia_diem_dao_tao')
                                <button type="button" class="btn btn-danger btn-sm" onclick="Confirm({{$items->id}})"
                                    data-toggle="modal" data-target="#m_modal_3">Xóa</button>
                                <form action="{{ route('chi-nhanh.xoa',['id'=> $items->id ]) }}" method="post"
                                    id="xoa_chi_nhanh_{{ $items->id }}">
                                    @csrf
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        <div class="modal fade" id="m_modal_3" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <H4 class="text-danger">Bạn muốn xóa địa điểm này?</H4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Hủy</button>
                                        <a id="btn-xoa" href="" class="btn btn-danger btn-sm">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
            <div class="m-portlet__foot d-flex justify-content-end">
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var selectedId = -1;
    function Confirm(id){
        selectedId = id;
    }
    $("#btn-xoa").click(function (event) {
        event.preventDefault();
        $("#xoa_chi_nhanh_" + selectedId).submit();
    });
</script>
@endsection