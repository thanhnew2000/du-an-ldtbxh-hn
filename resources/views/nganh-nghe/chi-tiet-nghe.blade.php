
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
                        Ngành nghề <small>Chi tiết nghề</small>
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
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở:</label>
                                <div class="col-lg-8">
                                    <select name="loai_hinh_co_so" class="form-control ">
                                        <option value="">------------- Lựa chọn loại hình cơ sở -------------</option>
                                        @foreach($dsLoaiHinhCoSo as $cursor)
                                            <option
                                                    @if(isset($params['loai_hinh_co_so']) && $params['loai_hinh_co_so'] == $cursor->id)
                                                    selected
                                                    @endif
                                                    value="{{$cursor->id}}">{{$cursor->loai_hinh_co_so}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Từ khóa:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input"
                                           @if(isset($params['keyword']))
                                           value="{{$params['keyword']}}"
                                           @endif
                                           placeholder="Nhập tên cơ sở đào tạo cần tìm" name="keyword">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận/Huyện:</label>
                                <div class="col-lg-8">
                                    <select name="ma_quan_huyen" class="form-control ">
                                        <option value="">------------- Lựa chọn quận/huyện -------------</option>
                                        @foreach($dsQuanHuyen as $cursor)
                                            <option
                                                    @if(isset($params['ma_quan_huyen']) && $params['ma_quan_huyen'] == $cursor->ma_quan_huyen)
                                                    selected
                                                    @endif
                                                    value="{{$cursor->ma_quan_huyen}}">{{$cursor->ten_quan_huyen}}</option>
                                        @endforeach
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
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                            <option
                                    @if($params['page_size'] == $size)
                                        selected
                                    @endif
                                    value="{{$size}}">{{$size}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>Tên cơ sở <br> đào tạo</th>
                    <th>Mã cơ sở <br/> đào tạo</th>
                    <th>Logo</th>
                    <th>Quyết định</th>
                    <th>Ngày ban hành</th>
                    <th>Loại hình <br> cơ sở</th>
                    <th>Đơn vị <br> chủ quản</th>
                    <th>Quận/huyện</th>
                    <th>Phường/xã</th>
                    <th>
                        
                    </th>
                </thead>
                <tbody>
                @foreach($data as $cursor)
                    <tr>
                        <td>{{$cursor->ten_co_so}}</td>
                        <td>{{$cursor->ma_don_vi}}</td>
                        <td>
                            <img src="{{asset($cursor->logo)}}" style="width: 75px;" class="m--img-rounded m--marginless">
                        </td>
                        <td>{{$cursor->ten_quyet_dinh}}</td>
                        <td>{{$cursor->ngay_ban_hanh}}</td>
                        <td>{{$cursor->loai_hinh_co_so}}</td>
                        <td>{{$cursor->ten_chu_quan}}</td>
                        <td>{{$cursor->ten_qh}}</td>
                        <td>{{$cursor->ten_xptt}}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Cập nhật</a>
                            <a href="" class="btn btn-danger btn-sm">Thu hồi</a>
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
    var currentUrl = '{{route($route_name, ['ma_nghe' => $params['ma_nghe']])}}';
    $(document).ready(function(){
        $('#page-size').change(function(){
            var loai_hinh_co_so = $('[name="loai_hinh_co_so"]').val();
            var quan_huyen = $('[name="ma_quan_huyen"]').val();
            var keyword = $('[name="keyword"]').val();
            var page_size = $(this).val();
            var reloadUrl = `${currentUrl}?loai_hinh_co_so=${loai_hinh_co_so}&quan_huyen=${quan_huyen}&keyword=${keyword}&page_size=${page_size}`;
            window.location.href = reloadUrl;
        });

    });
    </script>
@endsection