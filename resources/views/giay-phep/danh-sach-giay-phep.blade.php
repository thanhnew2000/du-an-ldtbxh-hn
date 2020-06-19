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
                        Danh sách giấy phép
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="">
                <div class="d-flex justify-content-center">
                    <div class="col-6">
                        <div class="form-group m-form__group mb-4 d-flex align-items-center">
                            <label for="exampleInputEmail1" class="col-3">Cơ sở đào tạo: </label>
                            <select class="custom-select form-control" name="co_so_id" id="co-so-id-js">
                                @if(count($defaultCsdt) > 0)
                                <option value="{{$defaultCsdt['id']}}" selected="selected">
                                    {{$defaultCsdt['text']}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            @if (\Session::has('mess-success'))
            <div class="alert alert-success" role="alert">
                <strong>{!! \Session::get('mess-success') !!}</strong>
            </div>
            @endif

            @if (count($defaultCsdt) > 0)
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên trường</th>
                        <th>Tên giấy phép</th>
                        <th>Ngày ban hành</th>
                        <th>Ngày hiệu lực</th>
                        <th>Ngày hết hạn</th>
                        <th>Ảnh giấy phép</th>
                        <th>@if (count($defaultCsdt) > 0)
                            <a href="{{ route('giay-phep.tao-moi', ['id' => $defaultCsdt['id']] )}}" class="btn btn-success btn-sm">Thêm mới</a>
                        @endif</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $id = 1;
                    @endphp
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td>{{ $item->ten_co_so }}</td>
                        <td>{{ $item->ten_giay_phep }}</td>
                        <td>{{ $item->ngay_ban_hanh }}</td>
                        <td>{{ $item->ngay_hieu_luc }}</td>
                        <td>{{ $item->ngay_het_han }}</td>
                        <td><a href="{!! asset('storage/' . $item->anh_giay_phep) !!}" target="_blank"><i
                                    class="fas fa-eye"></i> xem ảnh</a></td>
                        <td>
                            <a href="{{ route('giay-phep.cap-nhat', ['id'=>$item->id]) }}"
                                class="btn btn-primary btn-sm">Cập nhật</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-danger">Cơ sở hiện không có giấy phép nào</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
            @else
                <h5 class="text-center text-danger">Vui lòng chọn trường</h5>
            @endif
            
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function(){
        $('#co-so-id-js').select2({
            ajax: {
                url: '{{route('co-so-dao-tao.api-search-co-so-dao-tao')}}',
                method: 'POST',
                data: function(params){
                    var query = {
                        keyword: params.term || '',
                        page: params.page || 1
                    }
                    return query;
                },
                cache: true,
                dataType: 'json',
                processResults: function (data, params) {
                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                }
            }
        });
        $('#co-so-id-js').on('change', function(){
            var csdtId = $(this).val();
            window.location.href = `${currentUrl}/${csdtId}`;
        });
    }); 
</script>
@endsection
