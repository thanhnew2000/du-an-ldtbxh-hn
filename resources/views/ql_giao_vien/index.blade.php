@extends('layouts.admin')
@section('content')
<div class="m-content">
    @include('layouts.partials.filter', [
        'config' => $filterConfig,
    ])

    <div class="row mb-5 bieumau">
        <div class="col-lg-2">
            <a href=""><i class="la la-download">Tải xuống biểu mẫu</i></a>
        </div>
        <div class="col-lg-2">
            <a href=""><i class="la la-upload">Tải lên file excel</i></a>
        </div>
        <div class="col-lg-8 " style="text-align: right">
        <a href=""><button type="button" class="btn btn-secondary">Thêm mới</button></a>
        </div>
    </div>

    @include('layouts.partials.table', [
        'titles' => $titles,
        'data' => $data
    ])
</div>
@endsection

@section('title', "Danh sách giáo viên")

@section('style')
<link href="{!! asset('css/main.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
<script src="{{ asset('js/common/index_table.js') }}"></script>
<script src="{{ asset('js/common/filter.js') }}"></script>
@endsection
