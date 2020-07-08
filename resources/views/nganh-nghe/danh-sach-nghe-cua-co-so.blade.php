@extends('layouts.admin')
@section('title', "Chi tiết nghề của cơ sở đào tạo")
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
                        Danh sách nghề của cơ sở đào tạo
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
                        <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên nghề</th>
                    <th>Mã Nghề</th>
                    <th>Bậc nghề</th>
                    <th>Quy mô tuyển sinh/năm</th>
                    <th>Quyết định số</th>
                    <th>Ngày ban hành</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái</th>
                    <th>Ảnh giấy phép</th>
                </thead>
                @php
                $i = 1;
                @endphp
                <tbody>
                    @forelse($dsNghe as $cursor)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $cursor->ten_nghe }}</td>
                        <td>{{ $cursor->ma_nghe }}</td>
                        <td>@if($cursor->bac_nghe == 6)
                            Cao Đẳng
                            @elseif($cursor->bac_nghe == 5)
                            Trung Cấp
                            @endif
                        </td>
                        <td>
                            @if (isset($cursor->quy_mo_tuyen_sinh))
                            {{$cursor->quy_mo_tuyen_sinh}}
                            @else
                            <span class="text-danger">Chưa cập nhật</span>
                            @endif
                        </td>
                        <td>{{ $cursor->ten_giay_phep }}</td>
                        <td>{{ \Carbon\Carbon::parse($cursor->ngay_ban_hanh)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($cursor->ngay_het_han)->format('d-m-Y') }}</td>
                        <td>
                            @if ($cursor->trang_thai == 1)
                            Hoạt động
                            @else
                            Đã thu hồi
                            @endif
                        </td>
                        <td><a href="{!! asset('storage/' . $cursor->anh_giay_phep) !!}" target="_blank"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger">Không tìm thấy nghề nào!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(!empty($dsNghe))
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$dsNghe->links()}}
        </div>
        @endif
    </div>
    @if($defaultCsdt['id'] > 0)
    <input type="hidden" name="" id="co_so_id" value="{{$defaultCsdt['id']}}">
    @endif
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function(){
        $('#page-size').change(function(){
            var csdtId = $('#co_so_id').val();
            var page_size = $(this).val();
            var reloadUrl = `${currentUrl}/${csdtId}?page_size=${page_size}`;
            window.location.href = reloadUrl;
        });
    });
</script>


@endsection