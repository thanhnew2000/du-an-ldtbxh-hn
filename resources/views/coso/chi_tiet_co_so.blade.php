@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        {{-- <i class="m-menu__link-icon flaticon-web"></i> --}}
                    </span>
                    <h3 class="m-portlet__head-text text-primary">
                        Thông tin chi tiết cơ sở đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <ul class="list-highlight-row ul-chi-tiet-csdt p-4">
                @forelse ($data as $item)
                <li>
                    <h5>Tên cơ sở đào tạo</h5>
                    <h5 class="co-so-info">{{$item->csdt_ten}}</h5>
                </li>

                <li>
                    <h5>Mã đơn vị</h5>
                    <h5 class="co-so-info">{{ $item->ma_don_vi }}</h5>
                </li>

                <li>
                    <h5>Tên cơ quan chủ quản</h5>
                    <h5 class="co-so-info">{{ $item->cq_ten }}</h5>
                </li>

                <li>
                    <h5>Loại hình cơ sở</h5>
                    <h5 class="co-so-info">{{ $item->loai_hinh_co_so }}</h5>
                </li>

                <li>
                    <h5>Logo</h5>
                    <div class="co-so-info"><img src="{!! asset('storage/' . $item->logo) !!}" class="img-size-100"
                            alt="">
                    </div>
                </li>

                <li>
                    <h5>Quyết định</h5>
                    <h5 class="co-so-info">{{ $item->qd_ten }}</h5>
                </li>

                <li>
                    <h5>Điện thoại</h5>
                    <h5 class="co-so-info">{{ $item->dien_thoai}}</h5>
                </li>

                <li>
                    <h5>Website</h5>
                    <h5 class="co-so-info">{{ $item->website}}</h5>
                </li>
                </li>

                <li>
                    <h5>Địa chỉ</h5>
                    <h5 class="co-so-info">{{ $item->dia_chi}}</h5>
                </li>
                <li>
                    <a href="{{ route('csdt.chi-nhanh', ['id'=>$item->id]) }}" class="btn btn-outline-info">Xem danh
                        sách chi nhánh</a>
                    <a href="" class="btn btn-outline-info">Xem danh sách ngành nghê</a>
                    <a href="" class="btn btn-outline-info">Xem danh sách nhân sự</a>
                </li>
                @empty
                <h5>ERRR</h5>
                @endforelse

            </ul>
        </div>
    </div>
    @endsection