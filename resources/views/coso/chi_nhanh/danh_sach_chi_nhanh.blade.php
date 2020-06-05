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
            <input type="hidden" name="page_size" value="">
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
                                    <input type="text" class="form-control m-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở:</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option disabled selected>chọn loại hình cơ sở</option>
                                        {{-- @foreach ($loaihinh as $lh)
                                        <option value="{{ $lh->id }}">{{ $lh->loai_hinh_co_so }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Mã đơn vị:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận</label>
                                <div class="col-lg-8">
                                    <select name="bac_nghe" class="form-control ">
                                        <option disabled selected>Quận / Huyện</option>
                                        {{-- @foreach ($quanhuyen as $qh)
                                        <option value="{{ $qh->maqh }}">{{ $qh->name }}</option>
                                        @endforeach --}}
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

    <!-- end- fillter -->

    <!-- begin- action -->
    {{-- <section class="action-nav d-flex align-items-center justify-content-between mt-4	">
        <div class="action-template col-3 d-flex justify-content-between">
            <a href="#"><i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống
                biêu mẫu</a>
            <a href="#"><i class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="btn">
            <a name="" id="" class="btn btn-outline-primary" href="{{ route('chi-nhanh.tao-moi') }}"
    role="button">Thêm</a>
</div>
</section> --}}
<!-- end- action -->
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-section__content">
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên cơ sở</th>
                    <th>Địa chỉ</th>
                    <th>Hotline</th>
                    <th>Chi Nhánh</th>
                    <th>Mã chứng nhận</th>
                    <th colspan="2"><a href="{{ route('chi-nhanh.tao-moi') }}" class="btn btn-success btn-sm mr-3">Thêm
                            mới</a>
                    </th>
                </thead>
                <tbody>
                    @php($i=1)
                    @forelse($data as $items)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$items->ten}}</td>
                        <td>{{$items->dia_chi}}</td>
                        <td>{{$items->hotline}}</td>
                        <td>
                            @if ($items->chi_nhanh_chinh == 1)
                            Chi nhánh chính
                            @else
                            Chi nhánh phụ
                            @endif</td>
                        <td>{{$items->ma_chung_nhan_dang_ki_hoat_dong}}</td>
                        <td class="d-flex">
                            <a href="{{route('chi-nhanh.cap-nhat', ['id'=> $items->id])}}"
                                class="btn btn-info btn-sm mr-3">Sửa</a>
                            <a href="{{ route('chi-nhanh.xoa', ['id'=>$items->id]) }}"
                                class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger">Không có địa điểm đào tạo khác!</td>
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
</div>
@endsection