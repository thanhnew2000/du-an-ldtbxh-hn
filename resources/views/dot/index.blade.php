@extends('layouts.admin')
@section('title', "Đợt")
@section('content')

<div class="container">
    <div class="m-portlet mt-5">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="m-menu__link-icon flaticon-web"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Danh sách đợt
                </h3>
            </div>
        </div>
    </div>

    <table class="table table-bordered m-table  m-table--head-bg-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Thời gian bắt đầu</th>
                <th scope="col">Thời gian kết thúc</th>
                <th scope="col">Mô tả </th>
                <th scope="col-2" colspan="2"> <a href="{{ route('nhapdot.create.new') }}"><button type="button" class="btn btn-info btn-sm">Thêm
                    mới</button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{ \Carbon\Carbon::parse($item->time_start)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->time_end)->format('d-m-Y') }}</td>
                <td>{{$item->mo_ta}}</td>
                <td>
                    <a href="{{route('nhapdot.edit-dot',['id'=>$item->id])}}" class="btn btn-primary btn-sm">Sửa</a>
                    <button type="button" data-toggle="modal" data-target="#m_modal_3" class="btn btn-danger btn-sm">Xóa</button>
                </td>
            </tr> 
            @endforeach
        </tbody>
     </table>
    </div>

        <div class="modal fade" id="m_modal_3" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <H4 class="text-danger">Xóa sẽ bay forever nhé bạn !?</H4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm"
                            data-dismiss="modal">Hủy</button>
                            @isset($item->id)
                            <a href="{{route('remove.dot',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xóa</a>
                            @endisset
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

{{-- @section('style')

@endsection --}}
@section('script')
@endsection