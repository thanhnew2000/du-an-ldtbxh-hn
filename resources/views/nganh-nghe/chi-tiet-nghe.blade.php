
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
                    <th>Tên cơ sở đào tạo</th>
                    <th>Tổng số sinh viễn đã tuyển</th>
                </thead>
                <tbody>
                </tbody>
            </table>
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