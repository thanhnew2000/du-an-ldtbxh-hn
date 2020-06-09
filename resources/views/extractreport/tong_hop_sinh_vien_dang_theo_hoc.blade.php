
@extends('layouts.admin')
@section('title', "Tổng hợp số liệu học sinh")
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
                        Sinh Viên Đang Quản Lý <small>Danh sách</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="GET" class="m-form">
     
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại Hình Cơ Sở: </label>
                                <div class="col-lg-8">
                                    <select name="loai_hinh" class="form-control ">
                                        <option value="" >Chọn </option>
                                        @foreach($loaiHinh as $item)
                                        <option 
                                            @if(isset($params['loai_hinh']) && $params['loai_hinh'] == $item->id)
                                                selected
                                            @endif
                                        value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên Cơ Sở: </label>
                                <div class="col-lg-8">
                                    <select name="cs_id" class="form-control" id="co_so_id">
                                        <option value="" >Chọn </option>
                                        @foreach ($coso as $item)
                                        <option 
                                        @if(isset($params['cs_id']) && $params['cs_id'] == $item->id)
                                            selected
                                        @endif value="{{ $item->id }}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận/Huyện: </label>
                                <div class="col-lg-8">
                                    <select name="devvn_quanhuyen" class="form-control " id="devvn_quanhuyen">
                                        <option value="" >Chọn quận huyện  </option>
                                        @foreach ($quanhuyen as $item)
                                        <option @if (isset($params['devvn_quanhuyen']))
                                            {{( $params['devvn_quanhuyen'] ==  $item->maqh ) ? 'selected' : ''}} 
                                            @endif
                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Phường/Xã: </label>
                                <div class="col-lg-8">
                                    <select name="devvn_xaphuongthitran" class="form-control " id="devvn_xaphuongthitran">
                                        <option value="" >Chọn phường xã </option>
                                        @foreach ($xaphuongtheoquanhuyen as $item)
                                        <option @if (isset($params['devvn_xaphuongthitran']))
                                            {{( $params['devvn_xaphuongthitran'] ==  $item->xaid ) ? 'selected' : ''}}
                                            @endif value="{{$item->xaid}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Năm:  </label>
                            <div class="col-lg-8">
                                <select name="nam" class="form-control" id="nam">
                                    <option value="" >Chọn </option>
                                    @foreach (config('common.nam.list') as $item)
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
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Đợt: </label>
                            <div class="col-lg-8">
                                <select class="form-control" name="dot" id="dot">
                                    <option value="" >Chọn</option>
                                    <option
                                    @if (isset($params['dot']))
                                        {{( $params['dot'] ==  1 ) ? 'selected' : ''}}  
                                    @endif
                                    value="1" >Đợt 1</option>
                                    <option value="2"
                                    @if (isset($params['dot']))
                                    {{( $params['dot'] ==  2 ) ? 'selected' : ''}}  
                                    @endif
                                    >Đợt 2</option>
                                </select>
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
            <a href="" data-toggle="modal">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="" data-toggle="modal" ><i
                    class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="" data-toggle="modal"><i class="fa fa-upload"
                    aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
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
                            @if (isset($params['page_size']) && $params['page_size'] ==  $size)
                                selected 
                            @endif value="{{$size}}">{{$size}}
                        </option>
                        @endforeach
                    </select>
                </div> 
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    @csrf
                    <th>STT</th>
                    <th>Tên Cơ Sở</th>
                    <th>Loại Hình Cơ Sở</th>
                    <th>Năm</th>
                    <th>Đợt</th>
                    <th>Quận/Huyện</th>
                    <th>Xã/Phường</th>
                    <th>Tổng Số HS/SV <br> đang quản lý</th>
                    <th>Cao Đẳng</th>
                    <th>Trung Cấp </th>
                    <th>Sơ Cấp </th>
                    <th>Khác </th>
                    <th>
                        <a href="{{route('xuatbc.them-so-sv')}}" class="btn btn-success btn-sm">Thêm mới</a>
                    </th>
                </thead>
                
                @php($i=1)
                
                @forelse ($data as $qlsv)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$qlsv->ten}}</td>
                        <td>{{$qlsv->loai_hinh_co_so}}</td>
                        <td>{{$qlsv->nam}}</td>
                        <td>{{$qlsv->dot}}</td>
                        <td>{{$qlsv->ten_quan_huyen}}</td>
                        <td>{{$qlsv->ten_xa_phuong}}</td>
                        <td>{{$qlsv->tong_so_HSSV_co_mat_cac_trinh_do}}</td>
                        <td>{{$qlsv->so_luong_sv_Cao_dang}}</td>
                        <td>{{$qlsv->so_luong_sv_Trung_cap}}</td>
                        <td>{{$qlsv->so_luong_sv_So_cap}}</td>
                        <td>{{$qlsv->so_luong_sv_he_khac}}</td>
                        <td>
                            <a href="{{ route('xuatbc.chi-tiet-so-lieu', ['co_so_id'=>$qlsv->cs_id]) }}" class="btn btn-info btn-sm">Chi tiết</a>

                        </td>
                    </tr>
                    @empty
                    @endforelse($item as $data )
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

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>

$(document).ready(function(){
    $('#co_so_id').select2();
    $('#devvn_quanhuyen').select2();
    $('#devvn_xaphuongthitran').select2();
    });


    $("#devvn_quanhuyen" ).change(function() {
    axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id:  $("#devvn_quanhuyen").val(),
    })
    .then(function (response) {
        var htmldata = '<option value="" selected  >Xã / Phường</option>'
            response.data.forEach(element => {
            htmldata+=`<option value="${element.xaid}" >${element.name}</option>`   
        });
        $('#devvn_xaphuongthitran').html(htmldata);
    })
    .catch(function (error) {
        console.log(error);
    });
});

$("#page-size").change(function(){  
    var pageSize = $(this).val();
    
    var url = new URL(window.location.href);
    var search_params = url.searchParams;
    search_params.set('page_size', pageSize);
    url.search = search_params.toString();
    var new_url = url.toString();
    // console.log(new_url);
    window.location.href = new_url
  });
</script>
@endsection