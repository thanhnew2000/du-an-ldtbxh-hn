@extends('layouts.admin')
@section('title', "Tổng hợp số liệu tuyển sinh")
@section('style')
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
<style>
    .m-table.m-table--border-danger, .m-table.m-table--border-danger th, .m-table.m-table--border-danger td{
        border-color: #bcb1b1 ;
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
                        Tuyển Sinh <small>Danh sách</small>
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
                                    <select class="form-control" name="loai_hinh" id="loai_hinh">
                                        <option value="0" selected>Chọn loại hình cơ sở</option>
                                        @foreach($loaiHinh as $item)
                                        <option 
                                            @if (isset($params['loai_hinh']))
                                                {{(  $params['loai_hinh'] ==  $item->id ) ? 'selected' : ''}}
                                            @endif
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
                                    <select class="form-control" name="co_so_id" id="co_so_id">
                                        <option value="" >Chọn cơ sở</option>
                                        @foreach ($coso as $item)
                                        <option
                                            @if (isset($params['co_so_id']))
                                                {{( $params['co_so_id'] ==  $item->id ) ? 'selected' : ''}}  
                                            @endif
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
                                    <select class="form-control" name="nam" id="nam">
                                        <option value="" selected disabled>Chọn</option>
                                       
                                        @foreach (config('common.nam_tuyen_sinh.list') as $item)
                                        <option 
                                        @if (isset($params['nam']))
                                           
                                                {{( $params['nam'] ==  $item ) ? 'selected' : ''}}  
                                                @endif
                                                value="{{$item}}"> {{$item}}
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
                                    <select class="form-control" name="dot" id="dot">
                                        <option value="" selected disabled>Chọn</option>
                                        <option
                                            @if (isset($params['dot']))
                                                {{( $params['dot'] ==  1 ) ? 'selected' : ''}}  
                                            @endif
                                        value="1">Đợt 1</option>
                                        <option 
                                            @if (isset($params['dot']))
                                                {{( $params['dot'] ==  2 ) ? 'selected' : ''}}  
                                            @endif
                                        value="2">Đợt 2</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận\Huyện</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="devvn_quanhuyen" id="devvn_quanhuyen">
                                        <option value="" selected>Chọn</option>
                                        @foreach ($quanhuyen as $item)
                                        <option
                                            @if (isset($params['devvn_quanhuyen']))
                                                {{( $params['devvn_quanhuyen'] ==  $item->maqh ) ? 'selected' : ''}}  
                                            @endif
                                        value="{{$item->maqh}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Xã\Phường</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="devvn_xaphuongthitran"
                                        id="devvn_xaphuongthitran">
                                        <option value="">Chọn xã phường</option>
                                        @foreach ($xaphuongtheoquanhuyen as $item)
                                         <option
                                         @if (isset($params['devvn_xaphuongthitran']))
                                                {{( $params['devvn_xaphuongthitran'] ==  $item->xaid ) ? 'selected' : ''}}  
                                            @endif
                                         value="{{$item->xaid}}" >{{$item->name}}</option>
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
            <a href=""><i class="la la-download">Tải xuống biểu mẫu</i></a>
        </div>
        <div class="col-lg-2">
            <a href=""><i class="la la-upload">Tải lên file excel</i></a>
        </div>
        <div class="col-lg-8 " style="text-align: right">
            <a href="{{route('themsolieutuyensinh')}}"><button type="button" class="btn btn-secondary">Thêm
                    mới</button></a>
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                        <option
                        @if (isset($params['page_size']))
                        {{( $params['page_size'] ==  $size ) ? 'selected' : ''}} 
                        @endif
                                value="{{$size}}">{{$size}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên cơ sở đào tạo</th>
                        <th scope="col">Loại hình cơ sở</th>
                        <th scope="col">Quận Huyện</th>
                        <th scope="col">Xã Phường Thị Trấn</th>
                        <th scope="col">Kết quả tuyển sinh <br> Cao Đẳng</th>
                        <th scope="col">Kết quả tuyển sinh <br> Trung Cấp</th>
                        <th scope="col">Kết quả tuyển sinh <br> Sơ Cấp</th>
                        <th scope="col">Kết quả tuyển sinh <br> Khác</th>
                        <th scope="col">Kết quả tuyển sinh</th>
                        <th scope="col">Kế hoạch tuyển sinh</th>
                        <th scope="col">Trạng thái</th>
                        <!-- <th scope="col">Chỉnh sửa</th> -->
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$item->ten}}</td>
                        <td>{{$item->loai_hinh_co_so}}</td>
                        <td>{{$item->quan_huyen}}</td>
                        <td>{{$item->xa_phuong}}</td>
                        <td>{{$item->so_luong_sv_Cao_dang}}</td>
                        <td>{{$item->so_luong_sv_Trung_cap}}</td>
                        <td>{{$item->so_luong_sv_So_cap}}</td>
                        <td>{{$item->so_luong_sv_he_khac}}</td>
                        <td>{{$item->tong_so_tuyen_sinh_cac_trinh_do}}</td>
                        <td>{{$item->tong_so_tuyen_sinh}}</td>
                        <td>{{$item->trang_thai}}</td>
                        <td>
                            <a href="{{route('chitietsolieutuyensinh',[
                            'co_so_id' => $item->id,
                        ])}}">Chi tiết</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="m-portlet__foot d-flex justify-content-end">
        {{$data->links()}}
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/so_lieu_tuyen_sinh/tong_hop_so_lieu.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#co_so_id').select2();
    $('#devvn_quanhuyen').select2();
    $('#devvn_xaphuongthitran').select2();
});
$("#loai_hinh" ).change(function() {
    axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/co-so-tuyen-sinh-theo-loai-hinh', {
                id:  $("#loai_hinh").val(),
    })
    .then(function (response) {
        var htmldata = '<option value="">Chọn cơ sở</option>'
            response.data.forEach(element => {
            htmldata+=`<option value="${element.id}" >${element.ten}</option>`   
        });
        $('#co_so_id').html(htmldata);
    })
    .catch(function (error) {
        console.log(error);
    });
});

$("#devvn_quanhuyen" ).change(function() {
    axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id:  $("#devvn_quanhuyen").val(),
    })
    .then(function (response) {
        var htmldata = '<option value="" selected  >Chọn</option>'
            response.data.forEach(element => {
            htmldata+=`<option value="${element.xaid}" >${element.name}</option>`   
        });
        $('#devvn_xaphuongthitran').html(htmldata);
    })
    .catch(function (error) {
        console.log(error);
    });
});
function resetInput() {
  document.getElementById("formsearch").reset();
}

  $("#page-size").change(function(){  
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