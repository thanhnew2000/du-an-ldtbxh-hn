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
                        Thêm mới cơ sở đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <form action="{{ route('csdt.tao-moi')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="main-form row d-flex justify-content-around">
                        <div class="col-left col-lg-5">
                            <div class="form-group col-lg-12">

                                <label class="form-name mr-3" for="">Tên cơ sở đào tạo <span
                                        class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ten" value="{{ old('ten') }}"
                                    class="form-text text-danger" placeholder="Nhập tên cơ sở đào tạo">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ten')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Mã đơn vị <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ma_don_vi" value="{{ old('ma_don_vi') }}"
                                    placeholder="Nhập mã đơn vị">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ma_don_vi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Tên cơ quan chủ quản <span
                                        class="text-danger">(*)</span></label>
                                <div class="d-flex">
                                    <select class="form-control col-10" name="co_quan_chu_quan_id"
                                        id="co_quan_chu_quan_id">
                                        <option selected disabled>-----Chọn-----</option>
                                        @foreach ($coquan as $cq)
                                        <option value="{{$cq->id}}" @if (old('co_quan_chu_quan_id')==$cq->id )
                                            {{ 'selected' }}
                                            @endif>
                                            {{ $cq->ten }}</option>
                                        @endforeach
                                    </select>
                                    <button class="col-2 btn btn-outline-metal" type="button" class="btn btn-danger"
                                        data-toggle="modal" data-target="#m_modal_5">Thêm</button>
                                </div>
                                <p id="helpId" class="form-text text-m">
                                    @error('co_quan_chu_quan_id')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Loại hình cơ sở <span
                                        class="text-danger">(*)</span></label>
                                <select class="form-control" name="ma_loai_hinh_co_so" id="">
                                    <option selected disabled>Chọn loại hình cơ sở</option>
                                    @foreach ($loaihinh as $lh)
                                    <option value="{{ $lh->id }}" @if (old('ma_loai_hinh_co_so')==$lh->id )
                                        {{ 'selected' }}
                                        @endif>{{ $lh->loai_hinh_co_so }}</option>
                                    @endforeach
                                </select>
                                <p id="helpId" class="form-text text-danger">
                                    @error('ma_loai_hinh_co_so')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Quyết định <span class="text-danger">(*)</span></label>
                                <div class="d-flex">
                                    <select class="form-control col-10" name="quyet_dinh_id" id="quyet_dinh_id">
                                        <option selected disabled>----Chọn----</option>
                                        @foreach ($qd as $quyetdinh)
                                        <option value="{{ $quyetdinh->id }}" @if (old('quyet_dinh_id')==$quyetdinh->id )
                                            {{ 'selected' }}
                                            @endif>{{ $quyetdinh->ten }}</option>
                                        @endforeach
                                    </select>

                                    <button class="col-2 btn btn-outline-metal" type="button" class="btn btn-danger"
                                        data-toggle="modal" data-target="#m_modal_6">Thêm</button>
                                    <p id="helpId" class="form-text text-danger">
                                        @error('quyet_dinh_id')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="" class="form-name">Logo <span class="text-danger">(*)</span></label>
                                <div class="custom-file form-control">
                                    <input type="file" class="custom-file-input" value="{{ old('upload_logo') }}"
                                        id="customFile" name="upload_logo">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <p id="helpId" class="form-text text-danger">
                                    @error('logo')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Hệ đào tạo <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="loai_truong" id="">
                                    <option value="1" selected>Cao Đẳng</option>
                                    <option value="2">Trung Cấp</option>
                                    <option value="3">Sơ cấp</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-right col-lg-5">
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Tên quốc tế <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ten_quoc_te"
                                    value="{{ old('ten_quoc_te') }}" placeholder="Nhập tên quốc tế của cơ sở">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ten_quoc_te')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>


                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Điện thoại <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="dien_thoai"
                                    value="{{ old('dien_thoai') }}" placeholder="Số điện thoại cơ sở">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dien_thoai')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Website</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}"
                                    placeholder="Website">
                                <p id="helpId" class="form-text text-danger">
                                    @error('website')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <div class="form-group d-flex">
                                    <div class="mr-5">
                                        <label for="" class="form-name">Quận/Huyện <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12" name="maqh" id="devvn_quanhuyen">
                                            <option disabled selected>Quận / Huyện</option>
                                            @foreach ($quanhuyen as $qh)
                                            <option value="{{ $qh->maqh }}" @if (old('maqh')==$qh->maqh )
                                                {{ 'selected' }}
                                                @endif>{{ $qh->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="" class="form-name">Xã/ Phường <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12" name="xaid" id="devvn_xaphuongthitran">
                                            <option disabled selected>Chọn</option>
                                            @foreach ($xaphuong as $xp)
                                            <option value="{{ $xp->xaid }}" @if (old('xaid')==$xp->xaid )
                                                {{ 'selected' }}
                                                @endif>{{ $xp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Địa chỉ <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="dia_chi" value="{{ old('dia_chi') }}"
                                    placeholder="Địa chỉ cơ sở">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dia_chi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Fax</label>
                                <input type="text" class="form-control" name="fax" value="{{ old('fax') }}"
                                    placeholder="Mã Fax">
                                <p id="helpId" class="form-text text-danger">
                                </p>
                            </div>
                        </div>

                        <div class="form-group col-lg-11 p-4">
                            <label for="">Ghi chú</label>
                            <textarea class="form-control" name="ghi_chu" id="" rows="5"
                                placeholder="Nội dung.....">{{ old('ghi_chu') }}</textarea>
                        </div>

                        <div class="col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-5 col-1">Thêm</button>
                            <a href="{{route('csdt.danh-sach')}}" class="btn btn-danger col-1">Hủy</a>
                        </div>
                    </div>
                </form>
                {{-- modal cơ quan chủ quản --}}
                <div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm cơ quan chủ quản
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="them-co-quan-chu-quan">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Tên
                                            cơ quan:</label>
                                        <input type="text" class="form-control" name="ten" id="ten-co-quan-chu-quan">
                                        <span class="text-danger" id="Err-ten"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Mã cơ
                                            quan:</label>
                                        <input type="text" class="form-control" name="ma" id="ma-co-quan-chu-quan">
                                        <span class="text-danger" id="Err-ma"></span>
                                    </div>
                                    <h5 class="text-success" id="message"></h5>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary" id="btn-them-co-quan">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal add cơ quan chủ quản --}}

                {{-- modal add quyết định --}}
                <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm quyết định thành
                                    lập cơ sở</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-success" id="messageqd"></h5>
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Tên
                                            quyết định:</label>
                                        <input type="text" class="form-control" id="ten_quyet_dinh">
                                        <span class="text-danger" id="Err-ten_quyet_dinh"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Đường
                                            dẫn văn bản:</label>
                                        <input type="text" class="form-control" id="url_van_ban">
                                        <span class="text-danger" id="Err-url_van_ban"></span>

                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group m-form__group col-4">
                                            <label for="example-date-input" class="col-form-label">Ngày ban hành
                                            </label>
                                            <div class="">
                                                <input class="form-control m-input" type="date" value="2011-08-19"
                                                    id="ngay_ban_hanh">
                                            </div>
                                            <span class="text-danger" id="Err-ngay_ban_hanh"></span>
                                        </div>
                                        <div class="form-group m-form__group col-4">
                                            <label for="example-date-input" class="col-form-label">Ngày hiệu lực
                                            </label>
                                            <div class="">
                                                <input class="form-control m-input" type="date" value="2011-08-19"
                                                    id="ngay_hieu_luc">
                                                <span class="text-danger" id="Err-ngay_hieu_luc"></span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group col-4">
                                            <label for="example-date-input" class="col-form-label">Ngày hết hạn
                                            </label>
                                            <div class="">
                                                <input class="form-control m-input" type="date" value="2020-01-01"
                                                    id="ngay_het_han" placeholder="dd-mm-yyyy">
                                            </div>
                                            <span class="text-danger" id="Err-ngay_het_han"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Loại quyết định <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control" name="loai_truong" id="loai_quyet_dinh">
                                            <option value="1" selected>Thành lập</option>
                                            <option value="2">Đổi tên</option>
                                            <option value="3">Giải thể</option>
                                        </select>
                                        <span class="text-danger" id="Err-loai_quyet_dinh"></span>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" id="btn-them-quyet-dinh-ajax"
                                    class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal add quyết đinh --}}
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function(){
        $('#devvn_quanhuyen').select2();
        $('#devvn_xaphuongthitran').select2();
        $('#co_quan_chu_quan_id').select2();
        $('#quyet_dinh_id').select2();
    });

    $("#devvn_quanhuyen" ).change(function() {
        axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                    id:  $("#devvn_quanhuyen").val(),
        })
        .then(function (response) {
            var htmldata = '<option selected  disabled>Xã / Phường</option>'
                response.data.forEach(element => {
                htmldata+=`<option value="${element.xaid}" >${element.name}</option>`   
            });
            $('#devvn_xaphuongthitran').html(htmldata);
        })
        .catch(function (error) {
            console.log(error);
            });
    });

    
    $("#btn-them-co-quan").click(function(event){
        event.preventDefault();
        $('#Err-ten').addClass('d-none');
        $('#Err-ma').addClass('d-none');
            $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{route('co-quan-chu-quan.them')}}',
            data: {
                ten: $('#ten-co-quan-chu-quan').val(),
                ma: $('#ma-co-quan-chu-quan').val(),
                _token: '{{csrf_token()}}'
            },
            success: function(response){
                var htmldata = '<option selected disabled>---Chọn cơ quan---</option>'
                response.data.forEach(element => {
                    htmldata += `<option value="${element.id}">${element.ten}</option>`
                });
                $('#co_quan_chu_quan_id').html(htmldata);
                $('#message').html(response.message)
            },
            error: function(data){
                var errors = data.responseJSON;
                if($.isEmptyObject(errors) == false){
                    $.each(errors.errors, function(key, value){
                        console.log(value);
                        var ErrorID = '#Err-' + key;
                        $(ErrorID).removeClass('d-none');
                        $(ErrorID).text(value);
                    })
                }
            }
            });
    });

    $("#btn-them-quyet-dinh-ajax").click(function(event){
        event.preventDefault();
        var dataPost = {
                ten: $('#ten_quyet_dinh').val(),
                van_ban_url: $('#url_van_ban').val(),
                ngay_ban_hanh: $('#ngay_ban_hanh').val(),
                ngay_hieu_luc: $('#ngay_hieu_luc').val(),
                ngay_het_han: $('#ngay_het_han').val(),
                loai_quyet_dinh: $('#loai_quyet_dinh').val(),
                _token: $('#token').val(),
            };
            $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{route('quyet-dinh.add')}}',
            data: dataPost,
            success: function(response){
                var htmldata = '<option selected disabled>---Chọn quyết định---</option>'
                response.data.forEach(element => {
                    htmldata += `<option value="${element.id}">${element.ten}</option>`
                });
                $('#quyet_dinh_id').html(htmldata);
                $('#messageqd').html(response.messageqd)
            },
            errors: function(dataErr){
                var errors = dataErr.responseJSON;
                console.log(errors);
                // if($.isEmptyObject(errors) == false){
                //     $.each(errors.errors, function(key, value){
                //         console.log(value);
                //         var ErrorID = '#Err-' + key;
                //         $(ErrorID).removeClass('d-none');
                //         $(ErrorID).text(value);
                //     })
                // }
            }
            });
    });

    
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection