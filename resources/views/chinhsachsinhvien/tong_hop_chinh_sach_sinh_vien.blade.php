@extends('layouts.admin')
@section('title', "Tổng hợp chính sách sinh viên")
@section('style')
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
<style>
    .m-table.m-table--border-danger,
    .m-table.m-table--border-danger th,
    .m-table.m-table--border-danger td {
        border-color: #bcb1b1;
    }

    table thead th[colspan="2"] {
        border-bottom-width: 1px;
        border-bottom: 1px solid #bcb1b1 !important;
    }
</style>
@endsection
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
                        Chính sách sinh viên <small>Danh sách</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <input type="hidden" name="page_size" id="page_size_hide" value="20">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" name="loai_hinh" id="loai_hinh">
                                        <option value="">Chọn</option>
                                        @foreach($loaihinh as $item)
                                        <option @if (isset($params['loai_hinh']))
                                            {{(  $params['loai_hinh'] ==  $item->id ) ? 'selected' : ''}} @endif
                                            value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Tên cơ sở</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" name="co_so_id" id="co_so_id">
                                        <option value="">Chọn</option>
                                        @foreach ($coso as $item)
                                        <option @if (isset($params['co_so_id']))
                                            {{( $params['co_so_id'] ==  $item->id ) ? 'selected' : ''}} @endif
                                            value="{{ $item->id }}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <<<<<<< HEAD <select class="form-control" name="nam" id="nam">

                                        =======
                                        <select class="form-control select2" name="nam" id="nam">
                                            <option value="">Chọn</option>
                                            >>>>>>> master
                                            @foreach (config('common.nam.list') as $item)
                                            <option @if (isset($params['nam']))
                                                {{( $params['nam'] ==  $item ) ? 'selected' : ''}} @endif
                                                value="{{$item}}">
                                                {{$item}}
                                            </option>
                                            @endforeach

                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <<<<<<< HEAD <select class="form-control" name="dot" id="dot">

                                        =======
                                        <select class="form-control select2" name="dot" id="dot">
                                            <option value="" selected disabled>Chọn</option>
                                            >>>>>>> master
                                            <option @if (isset($params['dot']))
                                                {{( $params['dot'] ==  1 ) ? 'selected' : ''}} @endif value="1">Đợt 1
                                            </option>
                                            <option @if (isset($params['dot']))
                                                {{( $params['dot'] ==  2 ) ? 'selected' : ''}} @endif value="2">Đợt 2
                                            </option>
                                        </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận/Huyện</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" name="devvn_quanhuyen " id="devvn_quanhuyen">
                                        <option value="" selected>Chọn</option>
                                        @foreach ($quanhuyen as $item)
                                        <option @if (isset($params['devvn_quanhuyen']))
                                            {{( $params['devvn_quanhuyen'] ==  $item->maqh ) ? 'selected' : ''}} @endif
                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Chính sách</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2" name="chinhsach" id="chinhsach">
                                        <option value="" selected>Chọn</option>
                                        @foreach ($chinhsach as $item)
                                        <option @if (isset($params['chinhsach']))
                                            {{( $params['chinhsach'] ==  $item->id ) ? 'selected' : ''}} @endif
                                            value="{{$item->id}}">{{$item->ten}}</option>
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
    <div class="row mb-5 bieumau">
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#exampleModalImport"><i
                    class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exampleModalExportData"><i class="fa fa-upload"
                    aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
        <div class="col-lg-6 " style="text-align: right">
            @can('them_moi_tong_hop_thuc_hien_chinh_sach_cho_sv')
            <a href="{{route('xuatbc.them-chinh-sach-sinh-vien')}}"><button type="button" class="btn btn-secondary">Thêm
                    mới</button></a>
            @endcan
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">

            @if (session('thongbao'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('thongbao')}}</strong>
            </div>
            @endif
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                        <option @if (isset($params['page_size']))
                            {{( $params['page_size'] ==  $size ) ? 'selected' : ''}} @endif value="{{$size}}">{{$size}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary">
                <thead>
                    <tr class=" text-center ">
                        <th rowspan="2">STT</th>

                        <th rowspan="2">Tên cơ sở đào tạo</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th rowspan="2">Loại hình cơ sở</th>
                        <th rowspan="2">Quận/Huyện</th>
                        <th rowspan="2">Chính sách</th>

                        <th colspan="2">Số lượng sinh viên</th>
                        <th rowspan="2">Tổng số lượng <br> sinh viên</th>
                        <th colspan="2">Kinh phí</th>
                        <th rowspan="2">Tổng kinh phí </th>
                        <th rowspan="2">Ghi chú </th>
                        <th rowspan="2">Trạng thái</th>
                        <th rowspan="2">Thao tác</th>

                    </tr>
                    <tr class="pt-3 row2">
                        <th>Cao đẳng</th>
                        <th>Trung cấp</th>
                        <th>Cao đẳng</th>
                        <th>Trung cấp</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1)
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->ten}}</td>
                        <td>{{$item->nam}}</td>
                        <td>{{$item->dot}}</td>
                        <td>{{$item->loai_hinh_co_so}}</td>
                        <td>{{$item->quan_huyen}}</td>
                        <td>{{$item->ten_chinh_sach}}</td>
                        <td>{{$item->so_hssv_CD}}</td>
                        <td>{{$item->so_hssv_TC}}</td>
                        <td>{{$item->tong_so_hssv}}</td>
                        <td>{{number_format($item->kinh_phi_CD,'0',',','.')}} </td>
                        <td>{{number_format($item->kinh_phi_TC,'0',',','.')}} </td>
                        <td>{{number_format($item->kinh_phi,'0',',','.')}} </td>
                        <td>{{$item->ghi_chu}}</td>
                        <td>{{$item->ten_trang_thai}}</td>
                        <td>
                            @can('cap_nhat_tong_hop_thuc_hien_chinh_sach_cho_sv')
                            @if ($item->trang_thai<3) <a
                                href="{{route('xuatbc.sua-chinh-sach-sinh-vien', ['id' => $item->id])}}">
                                Cập nhật</a>
                                @endif
                                @endcan
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-end  mt-3">{{$data->links()}}</div>
        </div>

    </div>

    <form action="{{route('layformbieumau.cs.sinhvien')}}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hãy chọn trường</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <button type="submit" onclick="clickDownloadTemplate()" class="btn btn-primary">Tải</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('import-error-chinh-sach-sinh-vien')}}" id="my_form_kqts_import" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="modal fade " id="exampleModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import file</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                @foreach (config('common.nam.list') as $nam)
                                <option value="{{$nam}}">{{$nam}}</option>
                                @endforeach
                                {{-- <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                              <option value="2016">2016</option> --}}
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
                            <button type="submit" hidden class="btn btn-primary" id="submitTaiok">Tải ok</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('exportdata.bieumau.cs.sinhvien')}}" id="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade " id="exampleModalExportData" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xuất dữ liệu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Chọn năm xuất</label>
                            <select name="nam_muon_xuat" id="nam_id_xuat" class="form-control">
                                @foreach (config('common.nam.list') as $nam)
                                <option value="{{$nam}}">{{$nam}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn đợt xuất</label>
                            <select name="dot_muon_xuat" id="dot_id_xuat" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn Trường</label>
                            <select name="truong_id" id="truong_id_xuat" class="form-control">
                                @foreach($coso as $csdt)
                                <option value="{{$csdt->id}}">{{$csdt->ten}}</option>
                                @endforeach
                            </select>
                        </div>

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
</div>

@endsection
@section('script')

{{-- thanhnv script import export --}}
<script>
    $("#file_import_id").change(function() {
    var fileExtension = ['xlsx','xls'];
    if($("#file_import_id")[0].files.length === 0){
        $('#echoLoi').text('Hãy nhập file excel');
    }else if($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $message = "Hãy nhập file excel : "+fileExtension.join(', ');
        $('#echoLoi').text($message);
        return false;
    }else{
        $('#echoLoi').text('');
}
});


$("#submitTai").click(function(event){
var fileExtension = ['xlsx', 'xls'];
   if($("#file_import_id")[0].files.length === 0){
         console.log('không có file');    
   }else if($.inArray($('#file_import_id').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
         console.log('chưa file không đúng định dạng');
   }else{
    $('#exampleModalImport').modal('hide');
    $('.loading').css('display','block');
    var formData = new FormData();
    var fileExcel = document.querySelector('#file_import_id');
    formData.append("file", fileExcel.files[0]);
    formData.append("dot", $('#dot_id').val());
    formData.append("nam", $('#nam_id').val());

    axios.post("{{route('import-chinh-sach-sinh-vien')}}", formData,{
        headers: {
                'Content-Type': 'multipart/form-data',
            }
        }).then(function (response) {
            console.log(response)
            if(response.data == 'ok'){
                $('.loading').css('display','none');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cập nhập thành công',
                        showConfirmButton: false,
                        timer: 1700
                    })
                window.location.reload();
                console.log('Đã insert vào database');
            }else if(response.data == 'problem'){
                $('.loading').css('display','none');
                console.log('Có vấn đề về thông tin muốn nhập');
                Swal.fire({
                    title: 'Có vấn đề về thông tin muốn nhập !',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Xác nhận'
                    }).then((result) => {
                    if (result.value) {  
                        window.location.reload();
                    }else{
                        window.location.reload();
                    }
                    })
            }else{
                $('.loading').css('display','none');
                $('#submitTaiok').trigger('click');
                $('#my_form_kqts_import')[0].reset();
            }

        }).catch(function (error) {
          console.log(error);
          $('.loading').css('display','none');
          Swal.fire({
                    title: 'Lỗi về file muốn nhập !',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Xác nhận'
                    }).then((result) => {
                    if (result.value) {  
                        window.location.reload();
                    }else{
                        window.location.reload();
                    }
                    })
        });
    }   
});

function clickDownloadTemplate(){
        $('#exampleModal').modal('hide');
}
</script>

<script src="{{ asset('js/chinh_sach_sinh_vien/chinh-sach-sinh-vien.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2();
   
});
$("#page-size").change(function() {
    $("#page_size_hide").val($('#page-size').val())
    var url = new URL(window.location.href);
    var search_params = url.searchParams;
    search_params.set('page_size', $("#page_size_hide").val());
    url.search = search_params.toString();
    var new_url = url.toString();
    window.location.href = new_url
});
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

@endsection