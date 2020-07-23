@extends('layouts.admin')
@section('title', 'Danh sách giấy phép')
@section('style')
<style>
    .modal-xl {
        max-width: 1140px;
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
                        Danh sách giấy phép hoạt động của cơ sở
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-4 col-form-label">Tên cơ sở/Mã cơ sở</label>
                                <div class="col-lg-8">
                                    <select onchange="setValueQuyetDinh(this)" class="form-control col-12"
                                        name="co_so_id" id="co_so_id">
                                        <option value="0" selected disabled>Chọn trường</option>
                                        @foreach ($co_so as $item)
                                        <option @if (isset($params['co_so_id']))
                                            {{ $params['co_so_id'] ==$item->id? 'selected' : '' }} @endif
                                            value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-4 col-form-label">Số quyết đinh</label>
                                <div class="col-lg-8">
                                    <input type="text" {{ isset($params['co_so_id'])?'':'disabled' }}
                                        name="so_quyet_dinh" id="so_quyet_dinh"
                                        value="{{ isset($params['so_quyet_dinh'])?$params['so_quyet_dinh']:'' }}"
                                        class="form-control m-input" placeholder="mã đơn vị">
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
    <div class="m-portlet">
        <div class="m-portlet__body">


            <table class="table m-table m-table--head-bg-brand table-reponsive">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số quyết định</th>
                        <th>Ngày ban hành</th>
                        <th>Ngày hiệu lực</th>
                        <th>Ngày hết hạn</th>
                        <th>Ảnh giấy phép</th>
                        <th>
                            @if (isset($params['co_so_id']))
                            <button href="" data-toggle="modal" data-target="#myModalThemMoi"
                                class="btn btn-success btn-sm">Thêm mới</button>
                            @endif
                        </th>
                    </tr>
                </thead>
                @if (count($data)>0)
                @php
                $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                @endphp
                @foreach ($data as $item)
                <tbody>
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $item->so_quyet_dinh }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngay_ban_hanh)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngay_hieu_luc)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngay_het_han)->format('d-m-Y') }}</td>
                        <td><a href="{!! asset('storage/'.$item->anh_quyet_dinh) !!}" target="_blank"><i
                                    class="fas fa-eye"></i> xem ảnh</a></td>
                        <td><button type="button" data-toggle="modal" data-target="#myModalCapNhat{{$item->id}}" class="btn btn-primary">Yêu cầu cập nhật</button></td>
                    </tr>
                </tbody>
            <div class="modal fade" id="myModalCapNhat{{$item->id}}">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Cập nhật giấy phép đào tạo</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="POST" id="myFormCapNhat" enctype="multipart/form-data">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row">
                                                <div class="col-6 d-flex align-items-stretch">
                                                    <div class="col-12">
                                                        <div class="form-group m-form__group mb-4">
                                                            <label>Số quết định<span class="text-danger">(*)</span></label>
                                                            <input type="text" name="so_quyet_dinh" value="{{ $item->so_quyet_dinh }}" class="form-control m-input"
                                                                placeholder="Nhập số quết định">
                                                        </div>
                
                                                        <div class="form-group m-form__group">
                                                            <label for="exampleInputEmail1">Ảnh giấy phép <span
                                                                    class="text-danger">(*)</span></label>
                                                            <div class="custom-file">
                                                                <input type="file" value="" name="anh_quyet_dinh"
                                                                    class="custom-file-input" onchange="showimages(this)"
                                                                    id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                </div>
                
                                                <div class="col-6">
                                                    <div class="anh-giay-phep">
                                                        <img src="{!! asset('storage/'.$item->anh_quyet_dinh) !!}" class="anh-giay-phep-hoat-dong" alt="">
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="row col-12 mt-3">
                                                <div class="col-4">
                                                    <div class="form-group m-form__group mb-4">
                                                        <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                                        <div class="input-group date datepicker">
                                                            <input type="text" name="ngay_ban_hanh" value="{{ \Carbon\Carbon::parse($item->ngay_ban_hanh)->format('d-m-Y') }}"
                                                                placeholder="Ngày-tháng-năm" class="form-control">
                                                            <div
                                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                <span><i class="flaticon-calendar-2"></i></span>
                                                            </div>
                                                        </div>
                                                        <p class="text-danger text-small">
                                                            @error('ngay_ban_hanh')
                                                            {{$message}}
                                                            @enderror
                                                        </p>
                                                    </div>
                                                </div>
                
                                                <div class="col-4">
                                                    <div class="form-group m-form__group mb-4">
                                                        <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                                        <div class="input-group date datepicker">
                                                            <input type="text" name="ngay_hieu_luc" value="{{ \Carbon\Carbon::parse($item->ngay_hieu_luc)->format('d-m-Y') }}"
                                                                placeholder="Ngày-tháng-năm" class="form-control">
                                                            <div
                                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                <span><i class="flaticon-calendar-2"></i></span>
                                                            </div>
                                                        </div>
                                                        <p class="text-danger text-small">
                                                            @error('ngay_hieu_luc')
                                                            {{$message}}
                                                            @enderror
                                                        </p>
                                                    </div>
                                                </div>
                
                                                <div class="col-4">
                                                    <div class="form-group m-form__group mb-4">
                                                        <label>Ngày hết hạn <span class="text-danger"></span></label>
                                                        <div class="input-group date datepicker">
                                                            <input type="text" name="ngay_het_han" value="{{ \Carbon\Carbon::parse($item->ngay_het_han)->format('d-m-Y') }}" placeholder="Ngày-tháng-năm"
                                                                class="form-control">
                                                            <div
                                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                <span><i class="flaticon-calendar-2"></i></span>
                                                            </div>
                                                        </div>
                
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                                        <button type="button" onclick="CapNhatGiayPhep({{$item->id}})" class="btn btn-danger">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                @if (isset($params['co_so_id']))
                <tr>
                    <td colspan="8" class="text-center text-danger">Không có giấy phép nào</td>
                </tr>
                @endif
                @endif


            </table>
            @if (!isset($params['co_so_id']))
            <h5 class="text-center text-danger">Vui lòng chọn trường</h5>
            @endif
        </div>
    </div>
</div>


<div class="modal fade" id="myModalThemMoi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm mới giấy phép đào tạo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="myForm" enctype="multipart/form-data">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <div class="row">
                                <div class="col-6 d-flex align-items-stretch">
                                    <div class="col-12">
                                        @if (isset($params['co_so_id']))
                                        <div class="form-group1 m-form__group mb-4">
                                            <input type="hidden" name="co_so_id" value="{{$params['co_so_id']}}">
                                        </div>
                                        @endif


                                        <div class="form-group m-form__group mb-4">
                                            <label>Số quết định<span class="text-danger">(*)</span></label>
                                            <input type="text" name="so_quyet_dinh" value="" class="form-control m-input"
                                                placeholder="Nhập số quết định">
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label for="exampleInputEmail1">Ảnh giấy phép <span
                                                    class="text-danger">(*)</span></label>
                                            <div class="custom-file">
                                                <input type="file" value="" name="anh_quyet_dinh"
                                                    class="custom-file-input" onchange="showimages(this)"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="anh-giay-phep">
                                        <img src="" class="anh-giay-phep-hoat-dong" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row col-12 mt-3">
                                <div class="col-4">
                                    <div class="form-group m-form__group mb-4">
                                        <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                        <div class="input-group date datepicker">
                                            <input type="text" name="ngay_ban_hanh" value=""
                                                placeholder="Ngày-tháng-năm" class="form-control">
                                            <div
                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                <span><i class="flaticon-calendar-2"></i></span>
                                            </div>
                                        </div>
                                        <p class="text-danger text-small">
                                            @error('ngay_ban_hanh')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group m-form__group mb-4">
                                        <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                        <div class="input-group date datepicker">
                                            <input type="text" name="ngay_hieu_luc" value=""
                                                placeholder="Ngày-tháng-năm" class="form-control">
                                            <div
                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                <span><i class="flaticon-calendar-2"></i></span>
                                            </div>
                                        </div>
                                        <p class="text-danger text-small">
                                            @error('ngay_hieu_luc')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group m-form__group mb-4">
                                        <label>Ngày hết hạn <span class="text-danger"></span></label>
                                        <div class="input-group date datepicker">
                                            <input type="text" name="ngay_het_han" value="" placeholder="Ngày-tháng-năm"
                                                class="form-control">
                                            <div
                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                <span><i class="flaticon-calendar-2"></i></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        <button type="button" onclick="themGiayPhep()" class="btn btn-danger">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    @endsection
    @section('script')
    <script>
        $('#co_so_id').select2()

    function setValueQuyetDinh(e) {
        // alert(1)
        if ($(e).val()>0) {
            $('#so_quyet_dinh').attr('disabled',false)
        }else{
            $('#so_quyet_dinh').attr('disabled',true)
        }
       
    }
    $('#summernote').summernote({
            height: 150,
            toolbar: 
            [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen']],
            ]
        });
        $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });
    function showimages(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
       $(element).parents('.modal-body').find('.anh-giay-phep-hoat-dong').attr("src", reader.result);
        // console.log('RESULT', reader.result)
    };
    reader.readAsDataURL(file);

    }
        //them mới giấy phép
        const themGiayPhepUrl = "{{route('giay-phep-hoat-dong.store')}}"

let themGiayPhep = () => {
    let myForm = document.getElementById('myForm');
    var formData = new FormData(myForm)
    axios.post(themGiayPhepUrl,formData)
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })
    .then(function () {
        // always executed
    });
}
 //end them mới giấy phép

 // Cập nhật giấy phép 
 let CapNhatGiayPhep =(e)=>{
    alert(e);
 }
    </script>
    @endsection