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
                        Danh sách cơ sở đào tạo
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
                                    <input type="text" value="{{ $params['ten_co_so'] }}" name="ten_co_so"
                                        class="form-control m-input" placeholder="từ khóa tên cơ sở">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở:</label>
                                <div class="col-lg-8">
                                    <select name="loai_hinh_co_so" class="form-control ">
                                        <option disabled selected>chọn loại hình cơ sở</option>
                                        @foreach ($loaihinh as $lh)
                                        <option value="{{ $lh->id }}" @if ($params['loai_hinh_co_so']==$lh->id )
                                            {{ 'selected' }}
                                            @endif">{{ $lh->loai_hinh_co_so }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Mã đơn vị:</label>
                                <div class="col-lg-8">
                                    <input type="text" name="ma_don_vi" value="{{ $params['ma_don_vi'] }}"
                                        class="form-control m-input" placeholder="mã đơn vị">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận</label>
                                <div class="col-lg-8">
                                    <select name="quanhuyen" class="form-control" id="devvn_quanhuyen">
                                        <option disabled selected>Quận / Huyện</option>
                                        @foreach ($quanhuyen as $qh)
                                        <option value="{{ $qh->maqh}}" @if ($params['quanhuyen']==$qh->maqh )
                                            {{ 'selected' }}
                                            @endif>{{ $qh->name }}</option>
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
            @if (\Session::has('mess'))
            <div class="alert alert-success" role="alert">
                <strong>{!! \Session::get('mess') !!}</strong>
            </div>
            @endif
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên cơ sở đào tạo</th>
                    <th>Mã đơn vị</th>
                    <th>Loại hình cơ sở</th>
                    <th>Logo</th>
                    <th>Quyết định</th>
                    <th>Địa chỉ</th>
                   @can('them_moi_co_so_dao_tao')
                   <th><a href="{{route('csdt.tao-moi')}}" class="btn btn-success btn-sm mr-3">Thêm mới</a>
                   </th>
                   @endcan
                    
                    
                </thead>
                <tbody>
                    @php($i=1)
                    @forelse($data as $csdt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$csdt->ten}}</td>
                        <td>{{$csdt->ma_don_vi}}</td>
                        <td>{{$csdt->loai_hinh_co_so}}</td>
                        <td><img class="img-size-70" src="{!! asset('storage/' . $csdt->logo) !!}" alt="">
                        </td>
                        <td>{{$csdt->qd_ten}}</td>
                        <td>{{$csdt->dia_chi}}</td>
                        <td>
                            <div class="d-flex">
                                
                                <div>
                                    @can('xem_chi_tiet_co_so_dao_tao')
                                    <a href="{{route('csdt.chi-tiet', ['id'=> $csdt->id])}}"
                                        class="btn btn-info btn-sm mr-3">Chi
                                        tiết</a>
                                    @endcan
                                </div>
                               
                               
                                <div>
                                    @can('cap_nhat_co_so_dao_tao')
                                    <a href="{{route('csdt.cap-nhat', ['id'=> $csdt->id])}}"
                                        class="btn btn-primary btn-sm">Cập
                                        nhật</a>
                                    @endcan
                                </div>
                                
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-danger">
                            Không tìm thấy cơ sở nào phù hợp
                        </td>
                    </tr>
                    @endforelse
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
    $(document).ready(function() {
            $('#devvn_quanhuyen').select2();
        });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection