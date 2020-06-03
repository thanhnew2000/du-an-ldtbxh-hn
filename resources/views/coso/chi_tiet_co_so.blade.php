@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <ul class="chi-tiet-co-so">
        @forelse ($data as $item)
        <li>
            <h4>Tên cơ sở đào tạo</h4>
            <h4 class="co-so-info">{{$item->csdt_ten}}</h4>
        </li>

        <li>
            <h4>Mã đơn vị</h4>
            <h4 class="co-so-info">{{ $item->ma_don_vi }}</h4>
        </li>

        <li>
            <h4>Tên cơ quan chủ quản</h4>
            <h4 class="co-so-info">{{ $item->cq_ten }}</h4>
        </li>

        <li>
            <h4>Loại hình cơ sở</h4>
            <h4 class="co-so-info">{{ $item->loai_hinh_co_so }}</h4>
        </li>

        <li>
            <h4>Logo</h4>
            <div class="co-so-info"><img src="{{ $item->logo }}" class="logo-csdt" alt=""></div>
        </li>

        <li>
            <h4>Quyết định</h4>
            <h4 class="co-so-info">{{ $item->qd_ten }}</h4>
        </li>

        <li>
            <h4>Điện thoại</h4>
            <h4 class="co-so-info">{{ $item->dien_thoai}}</h4>
        </li>

        <li>
            <h4>Website</h4>
            <h4 class="co-so-info">{{ $item->website}}</h4>
        </li>
        </li>

        <li>
            <h4>Địa chỉ</h4>
            <h4 class="co-so-info">{{ $item->dia_chi}}</h4>
        </li>
        </li>
        @empty
        <h4>ERRR</h4>
        @endforelse

    </ul>
</div>
@endsection