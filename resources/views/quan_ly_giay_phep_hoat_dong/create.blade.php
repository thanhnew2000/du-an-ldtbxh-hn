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
                        Bổ sung giấy phép hoạt động của cơ sở
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label">Tên cơ sở/Mã cơ sở</label>
                            <div class="col-lg-8">
                                <select onchange="setValueQuyetDinh(this)" class="form-control col-12" name="co_so_id"
                                    id="co_so_id">
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
                            <button id="bo_sung" data-toggle="modal" data-target="#myModalThemMoi" disabled
                                class="btn btn-primary">Bổ sung</button>

                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <button  data-toggle="modal" data-target="#myModalThemMoi" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div> --}}
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

                                        <div class="form-group1 m-form__group mb-4">
                                            <input type="hidden" id="get_co_so_id" name="co_so_id" value="">
                                        </div>


                                        <div class="form-group m-form__group mb-4">
                                            <label>Số quết định<span class="text-danger">(*)</span></label>
                                            <input type="text" name="so_quyet_dinh" value=""
                                                class="form-control m-input" placeholder="Nhập số quết định">
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
                                        <label>Ngày hết hạn <span class="text-danger">(*)</span></label>
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
        if ($(e).val()>0) {
            $('#get_co_so_id').val($(e).val())
            $('#bo_sung').attr('disabled',false)
        }else{
            $('#bo_sung').attr('disabled',true)
        }
       
    }
    //them mới giấy phép
    const themGiayPhepUrl = "{{route('giay-phep-hoat-dong.store')}}"
    function showimages(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
       $(element).parents('.modal-body').find('.anh-giay-phep-hoat-dong').attr("src", reader.result);
        // console.log('RESULT', reader.result)
    };
    reader.readAsDataURL(file);

    }
let themGiayPhep = () => {
    let myForm = document.getElementById('myForm');
    var formData = new FormData(myForm)
    axios.post(themGiayPhepUrl,formData)
    .then(function (response) {
        alert('thành công')
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
</script>
@endsection