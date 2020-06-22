@extends('layouts.admin')
@section('title', "Danh sách kết quả hợp tát quốc tế")
@section('style')
@endsection
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
                        Kết quả<small>hợp tác quốc tế</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="GET" class="m-form pt-5">
            <input type="hidden" name="page_size" value="{{ $params['page_size'] }}" disabled>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên đơn vị</label>
                                <div class="col-lg-8">
                                    <select name="co_so_id" class="form-control select2">
                                        <option value="">-----Chọn đơn vị-----</option>

                                        @foreach($params['co_so_dao_tao'] as $item)
                                        <option @if(isset($params['co_so_id']) && $params['co_so_id']==$item->id)
                                            selected
                                            @endif
                                            value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select name="nam" class="form-control select2">
                                        <option value="">-----Chọn năm-----</option>

                                        @foreach(config('common.nam.list') as $nam)
                                        <option @if(isset($params['nam']) && $params['nam']==$nam) selected @endif
                                            value="{{$nam}}">{{$nam}}</option>
                                        @endforeach

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
                                    <select name="dot" class="form-control select2">
                                        <option value="">-----Chọn đợt-----</option>
                                        <option @if(isset($params['dot']) && $params['dot']==config('common.dot.1'))
                                            selected @endif value="{{config('common.dot.1')}}">
                                            {{config('common.dot.1')}}</option>
                                        <option @if(isset($params['dot']) && $params['dot']==config('common.dot.2'))
                                            selected @endif value="{{config('common.dot.2')}}">
                                            {{config('common.dot.2')}}</option>

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
        <div class="m-portlet__body table-responsive">
            <table class="table table-bordered m-table m-table- m-table--head-bg-primary table-boder-white">
                <div class="col-12 form-group m-form__group d-flex justify-content-end">
                    <label class="col-lg-2 col-form-label">Kích thước:</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="page-size">
                            @foreach(config('common.paginate_size.list') as $size)
                            <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}
                            </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <thead>
                    <tr class="text-center">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Tên đơn vị</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th rowspan="2">Tổng số kết quả tuyển sinh theo chương trình hợp tác quốc tế</th>
                        <th rowspan="2">Tổng số học sinh được cấp bằng tốt nghiệp theo hình thức hợp tác quốc tế</th>
                        <th rowspan="2">Tổng số hợp tác quốc tế trong đào tạo , bồi dưỡng giáo viên , cán bộ quản lý
                        </th>
                        <th rowspan="2">Tổng số kinh phí đầu tư trang thiết bị , máy móc <br> ( triệu đồng)</th>
                        <th rowspan="2">Trạng thái</th>
                        <th rowspan="2">
                            <a target="_blank" href="{{ route('xuatbc.them-ds-hop-tac-qte') }}" class="btn btn-success btn-sm">Thêm mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                     $stt = 1;   
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $item->ten }}</td>
                        <td>{{ $item->nam }}</td>
                        <td>{{ $item->dot }}</td>
                        
                        <td>{{ $item->tong_tuyen_sinh }}</td>
                        <td>{{ $item->tong_so_hs_duoc_cap_bang }}</td>
                        <td>{{ $item->tong_hop_tac_quoc_te_trong_dao_tao_boi_duong }}</td>
                        <td>{{ ($item->tong_kinh_phi / 1000000) }}</td>
                        <td>{{ $item->ten_trang_thai }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('xuatbc.chi-tiet-ds-hop-tac-qte',['co_so_id' => $item->co_so_id]) }}" target="_blank">Chi tiết</a>
                        </td>
                    </tr>
                    @php
                    $stt ++;   
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
@endsection


@section('script')
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function () {
        $('#page-size').change(function () {
            var co_so_id = $('[name="co_so_id"]').val();
            var dot = $('[name="dot"]').val();
            var nam = $('[name="nam"]').val();
            var page_size = $(this).val();
            var reloadUrl =
                `${currentUrl}?co_so_id=${co_so_id}&dot=${dot}&nam=${nam}&page_size=${page_size}`;
            window.location.href = reloadUrl;
        });
        $('.select2').select2();
    });
</script>
@endsection
