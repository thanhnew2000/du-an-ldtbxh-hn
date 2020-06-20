@extends('layouts.admin')
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
                        Ngành nghề <small>Danh sách</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <input type="hidden" name="page_size" value="{{$params['page_size']}}">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Bậc nghề:</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option @if($params['bac_nghe']==6) selected @endif value="6">Cao đẳng</option>
                                        <option @if($params['bac_nghe']==5) selected @endif value="5">Trung cấp</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Từ khóa:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input" @if(isset($params['keyword']))
                                        value="{{$params['keyword']}}" @endif placeholder="Nhập mã hoặc tên ngành nghề"
                                        name="keyword">
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
                    <th>Mã Nghề</th>
                    <th>Tên nghề</th>
                    <th>Số trường được cấp</th>
                    @can('them_moi_nganh_nghe')
                    <th>
                        <a href="" class="btn btn-success btn-sm">Thêm mới</a>
                    </th>
                    @endcan
                </thead>
                <tbody>
                    @foreach($data as $cursor)
                    <tr>
                        <td>{{$cursor->id}}</td>
                        <td>{{$cursor->ten_nganh_nghe}}</td>
                        <td>{{$cursor->csdt_count}}</td>
                        <td>

                            @can('xem_chi_tiet_nganh_nghe')
                            <a href="{{route('nghe.chi-tiet-nghe', ['ma_nghe' => $cursor->id])}}"
                                class="btn btn-info btn-sm">Chi tiết</a>
                            @endcan

                            @can('cap_nhat_nganh_nghe')
                            <a href="" class="btn btn-primary btn-sm">Cập nhật</a>
                            @endcan

                            @can('xoa_nganh_nghe')
                            <a href="" class="btn btn-danger btn-sm">Xóa</a>
                            @endcan

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
@section('script')
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function(){
        $('#page-size').change(function(){
            var bac_nghe = $('[name="bac_nghe"]').val();
            var keyword = $('[name="keyword"]').val();
            var page_size = $(this).val();
            var reloadUrl = `${currentUrl}?bac_nghe=${bac_nghe}&keyword=${keyword}&page_size=${page_size}`;
            window.location.href = reloadUrl;
        });

    });
</script>
@endsection