@extends('layouts.admin')
@section('title', "Tổng hợp số lượng đăng ký chỉ tiêu tuyển sinh")
@section('style')
{{-- <link href="{!! asset('tuyensinh/css/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" /> --}}
<style>
    .m-table.m-table--border-danger, .m-table.m-table--border-danger th, .m-table.m-table--border-danger td{
        border-color: #BCB1B1 ;
    }
    table thead th[colspan="4"]{
        border-bottom-width:1px;
        border-bottom: 1px solid #BCB1B1 !important;
    }
</style>
@endsection
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet mt-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Tổng  hợp<small>số lượng đăng ký chỉ tiêu tuyển sinh</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form pt-5">
            <input type="hidden" name="page_size" value="{{$params['page_size']}}">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở</label>
                                <div class="col-lg-10">
                                    <select name="co_so_id" class="form-control select2">
                                        <option value="">-----Chọn cơ sở-----</option>
                                        @foreach ($params['get_co_so'] as $item)
                                        <option value="{{ $item->id }}" @if(isset($params['co_so_id']) &&
                                            $params['co_so_id']==$item->id)
                                            selected
                                            @endif>
                                            {{ $item->ten }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-10">
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
                                <label class="col-lg-2 col-form-label">Tên ngành nghề</label>
                                <div class="col-lg-10">
                                    <select name="nghe_id" id="" class="form-control select2">
                                        <option value="">-----Chọn ngành nghề-----</option>
                                        @forelse ($params['get_nganh_nghe'] as $item)
                                        <option value="{{ $item->id }}" @if(isset($params['nghe_id']) &&
                                            $params['nghe_id']==$item->id)
                                            selected
                                            @endif>

                                            {{ $item->id }} --- {{ $item->ten_nganh_nghe }}
                                        </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-10">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở</label>
                                <div class="col-lg-10">
                                    <select name="loaihinhcoso" class="form-control select2">
                                        <option value="">-----Chọn loại hình cơ sở-----</option>
                                        @foreach ($params['get_loai_hinh_co_so'] as $item)
                                        <option value="{{ $item->id }}" @if(isset($params['loaihinhcoso']) &&
                                            $params['loaihinhcoso']==$item->id)
                                            selected
                                            @endif>
                                            {{ $item->loai_hinh_co_so }}
                                        </option>

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

    <section class="action-nav d-flex align-items-center justify-content-between mt-4 mb-4">
    
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#moDal">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#moDalImport"><i
                    class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excell</a>
        </div>
        <div class="col-lg-6">
            <a href="javascript:" data-toggle="modal" data-target="#moDalExportData"><i class="fa fa-file-excel"
                    aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
        <div class="col-lg-2 text-center">
            @can('them_moi_tong_hop_dang_ky_chi_tieu_tuyen_sinh')
                <a target="_blank" href="{{ route('xuatbc.them-dang-ky-chi-tieu-tuyen-sinh') }}" class="btn btn-success btn-sm">Thêm mới</a>
            @endcan
        </div>
</section>

    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
            <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary table-boder-white">
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
                <thead>
                    <tr class="text-center">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Tên cơ sở</th>
                        <th rowspan="2">Loại hình cơ sở</th>
                        <th rowspan="2">Mã nghề</th>
                        <th rowspan="2">Tên nghề</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th colspan="3">Đăng ký chỉ tiêu tuyển sinh</th>
                        <th rowspan="2"></th>
                    </tr>
                    <tr class="text-center">
                        <th rowspan="2">Tổng số</th>
                        <th rowspan="2">Cao đẳng</th>
                        <th rowspan="2">Trung cấp</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($params['page_size'] * ($_GET['page']-1) + 1);
                    @endphp
                  @foreach ($data as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->ten }}</td>
                        <td>{{ $item->ten_loai_hinh_co_so }}</td>
                        <td>{{ $item->ma_nghe }}</td>
                        <td>{{ $item->ten_nghe }}</td>

                        <td>{{ $item->nam }}</td>
                        <td>{{ $item->dot }}</td>

                        <td>{{ $item->tong }}</td>
                        <td>{{ $item->so_dang_ki_CD }}</td>
                        <td>{{ $item->so_dang_ki_TC }}</td>
                      
                        <td>
                            @can('chi_tiet_tong_hop_dang_ky_chi_tieu_tuyen_sinh')
                            <a target="_blank"
                                href="{{ route('xuatbc.chi-tiet-dang-ky-chi-tieu-tuyen-sinh',['co_so_id'=>$item->co_so_id]) }}"
                                class="btn btn-info btn-sm">Chi tiết
                            </a>
                            @endcan
                        </td>
                    </tr>

                      
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
        </div>
        <div class="m-portlet__foot d-flex justify-content-end">
            {!! $data->links() !!}
        </div>
    </div>



    <form action="{{route('layformbieumau-dang-ky-chi-tieu-tuyen-sinh')}}" method="post">
        @csrf
        <div class="modal fade" id="moDal" tabindex="-1" role="dialog" aria-labelledby="moDalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="moDalLabel">Hãy chọn trường</h5>
                        <button type="button" id="closeFileBieuMau" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select name="id_cs" class="form-control">
                            @foreach($coso as $csdt)
                            <option value="{{$csdt->id}}">{{$csdt->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" onclick="closeModal('closeFileBieuMau')" class="btn btn-primary">Tải</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('import.error.dang-ky-chi-tieu-tuyen-sinh')}}" id="form_import_file" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="modal fade " id="moDalImport" tabindex="-1" role="dialog" aria-labelledby="moDalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="moDalLabel">Import file</h5>
                        <button type="button" id="closeImportFile" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" id="file_import_id" name="file_import">
                        </div>
                        <div class="form-group">
                            <label for="">Chọn năm</label>
                            <select name="nam" id="nam_id" class="form-control">
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                              <option value="2016">2016</option>
                            </select>
                       </div>

                        <div class="form-group">
                            <label for="">Chọn đợt</label>
                            <select name="dot" id="dot_id" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <p class="pt-1" style="color:red;margin-right: 119px" id="echoLoi">
                        </p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="submitTai">Tải</a>
                            <button type="submit" hidden  class="btn btn-primary" id="submitTaiok">Tải ok</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('exportdata-dang-ky-chi-tieu-tuyen-sinh')}}" id="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade " id="moDalExportData" tabindex="-1" role="dialog"
            aria-labelledby="moDalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="moDalLabel">Xuất dữ liệu</h5>
                        <button type="button" id='closeXuatDuLieu' class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="form-group">
                            <label for="">Chọn năm xuất</label>
                            <select name="nam_muon_xuat" id="nam_id_xuat" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                              </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Chọn ngày xuất</label>
                            {{-- <select name="dot_muon_xuat" id="dot_id_xuat" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select> --}}
                            <div class='input-group date datepicker' name="datepicker" >
                            <p>From: <input type="text" class="form-control" name="dateFrom" id="datepickerFrom"> </p>
                                @error('dateFrom')
                                     <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            <p>To: <input type="text" class="form-control" name="dateTo" id="datepickerTo"></p>
                                @error('dateTo')
                                    <div class="alert alert-danger">{{$message}}</div>
                                 @enderror
                                   {{-- <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-calendar">
                                         </span>
                                  </span> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn Trường</label>
                            <select multiple name="truong_id[]" id="truong_id_xuat" class="form-control select2">
                                @foreach($coso as $csdt)
                                <option value="{{$csdt->id}}">{{$csdt->ten}}</option>
                                @endforeach
                                <option value="all">Tất cả</option>
                            </select>
                        </div>

                        @error('truong_id')
                             <div class="alert alert-danger">{{$message}}</div>
                       @enderror

                    </div>
                    <div class="modal-footer">
                        <p class="pt-1" style="color:red;margin-right: 119px" id="echoLoiXuat">
                        </p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" id="submitXuatData">Tải</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('script')
<script>
    var currentUrl = '{{route($route_name)}}';
    $(document).ready(function () {
        $('#page-size').change(function () {
            var loaihinhcoso = $('[name="loaihinhcoso"]').val();
            var co_so_id = $('[name="co_so_id"]').val();
            var dot = $('[name="dot"]').val();
            var nam = $('[name="nam"]').val();
            var nghe_id = $('[name="nghe_id"]').val();
            var page_size = $(this).val();
            var reloadUrl =
                `${currentUrl}?loaihinhcoso=${loaihinhcoso}&dot=${dot}&nam=${nam}&co_so_id=${co_so_id}&nghe_id=${nghe_id}&page_size=${page_size}`;
            window.location.href = reloadUrl;
        });

        // thanhnv
        $( function() {
            $( "#datepickerFrom" ).datepicker();
            $( "#datepickerTo" ).datepicker();
        });

    });
</script>
@if (session('success'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Thêm mới thành công !',
        showConfirmButton: false,
        timer: 3500
    })
</script>
@endif
{{-- thanhnv update change to service 6/26/2020 --}}
<script>
    var routeImport = "{{route('import.dang-ky-chi-tieu-tuyen-sinh')}}" ;
</script>
<script src="{!! asset('excel-js/js-xuat-time.js') !!}"></script>
<script src="{!! asset('excel-js/js-form.js') !!}"></script>
{{-- end --}}
@endsection
