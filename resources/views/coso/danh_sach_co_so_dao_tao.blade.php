@extends('layouts.admin');

@section('content')
<div class="m-content container-fluid">
    <!-- begin- fillter -->


    <!-- end- fillter -->

    <!-- begin- action -->
    <section class="action-nav d-flex align-items-center justify-content-between mt-4	">
        <div class="action-template col-3 d-flex justify-content-between">
            <a href="#"><i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống
                biêu mẫu</a>
            <a href="#"><i class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="btn">
            <a href="{{route('csdt.tao-moi')}}" class="btn btn-outline-primary">Thêm mới</a>
        </div>
    </section>
    <!-- end- action -->

    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        {{-- @foreach(config('common.paginate_size.list') as $size)
                        <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên cơ sở đào tạo</th>
                    <th>Mã đơn vị</th>
                    <th>Loại hình cơ sở</th>
                    <th>Logo</th>
                    <th>Quyết đinh</th>
                    <th>Địa chỉ</th>
                    <th colspan="2">Thao tác</th>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($data as $csdt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$csdt->ten}}</td>
                        <td>{{$csdt->ma_don_vi}}</td>
                        <td>{{$csdt->loai_hinh_co_so}}</td>
                        <td><img class="size-100" src="{!! asset('storage/' . $csdt->logo) !!}" alt="">
                        </td>
                        <td>{{$csdt->qd_ten}}</td>
                        <td>{{$csdt->dia_chi}}</td>
                        <td>
                            <a href="{{route('csdt.cap-nhat', ['id'=> $csdt->id])}}"
                                class="btn btn-outline-primary">Sửa</a>
                        </td>
                        <td>
                            <a href="{{route('csdt.chi-tiet', ['id'=> $csdt->id])}}" class="btn btn-outline-info">Chi
                                tiết</a>
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