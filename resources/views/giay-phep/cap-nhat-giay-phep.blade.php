@extends('layouts.admin');

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
                        Cập nhật     giấy phép
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <form action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-6 d-flex align-items-stretch">
                            <div class="col-12">
                                <div class="form-group1 m-form__group mb-4">
                                    <label for="exampleInputEmail1">Chọn Trường</label>
                                    <div></div>
                                    <select class="custom-select form-control" name="co_so_id" id="co-so-id-js">
                                        <option value="" selected>-----Chọn trường-----</option>
                                        @foreach ($dsCoSo as $coso)
                                            <option value="{{ $coso->id }}" @if($data->co_so_id == $coso->id) selected @endif>{{ $coso->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group m-form__group mb-4">
                                    <label>Tên giấy phép</label>
                                    <input type="text" name="ten_giay_phep" value="{{old('ten_giay_phep', $data->ten_giay_phep) }}" class="form-control m-input" placeholder="Nhập tên giấy phép">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Ảnh giấy phép</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" name="anh-giay-phep" class="custom-file-input" onchange="SystemUtil.previewImage(this, '#anh-giay-phep', '{!! asset('storage/' . $data->anh_giay_phep) !!}')" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-6">
                            <div class="anh-giay-phep">
                                <img src="" id="anh-giay-phep" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="row col-12 mt-3">
                        <div class="col-4">
                            <div class="form-group m-form__group mb-4">
                                <label>Ngày ban hành</label>
                                <div class="input-group date datepicker">
                                    <input type="text" name="ngay_ban_hanh" value="{{old('ngay_ban_hanh', \Carbon\Carbon::parse($data->ngay_ban_hanh)->format('d-m-Y')) }}" placeholder="Ngày-tháng-năm" class="form-control">
                                    <div class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
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
                                <label>Ngày hiệu lực</label>
                                <div class="input-group date datepicker">
                                    <input type="text" name="ngay_hieu_luc" value="{{old('ngay_hieu_luc', \Carbon\Carbon::parse($data->ngay_hieu_luc)->format('d-m-Y')) }}" placeholder="Ngày-tháng-năm" class="form-control">
                                    <div class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
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
                                <label>Ngày hết hạn</label>
                                <div class="input-group date datepicker">
                                    <input type="text" name="ngay_het_han" value="{{old('ngay_het_han', \Carbon\Carbon::parse($data->ngay_het_han)->format('d-m-Y')) }}" placeholder="Ngày-tháng-năm" class="form-control">
                                    <div class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                        <span><i class="flaticon-calendar-2"></i></span>
                                    </div>
                                </div>
                                <p class="text-danger text-small"> 
                                    @error('ngay_het_han')
                                        {{$message}}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="col-12 form-group m-form__group">
                            <label for="exampleTextarea">Mô tả quyết định</label>
                            <textarea class="form-control m-input" name="mo_ta" placeholder="Mô tả ngắn gọn nội dung giấy phép hoặc ghi chú" rows="4">{{old('mo_ta', $data->mo_ta) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="col-1 btn btn-primary mr-4">Cập nhật</button>
                        <button type="button" class="col-1 btn btn-danger">Huỷ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#co-so-id-js').select2();
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

    $(document).ready(function () {
        var logoImgUrl = $('#anh-giay-phep').attr('src');
        SystemUtil.defaultImgUrl(logoImgUrl, '#anh-giay-phep', "{!! asset('storage/' . $data->anh_giay_phep) !!}");
    }); 
</script> 
@endsection