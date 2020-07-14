@extends('layouts.admin')
@section('title', 'Thêm mới cơ sở đào tạo')
@section('style')
<style>
.removediachi{
line-height: 90px
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
                                <p id="helpId" class="form-text text-danger">
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
                                </div>
                                <p id="helpId" class="form-text text-danger">
                                    @error('quyet_dinh_id')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="" class="form-name">Logo <span class="text-danger">(*)</span></label>
                                <div class="form-group col-lg-12 mt-2">
                                    <img id="logo-co-so" class="col-6" src="" alt="">
                                </div>
                                <div class="custom-file form-control">
                                    <input type="file"
                                        onchange="SystemUtil.previewImage(this, '#logo-co-so', '{!! asset('uploads/avatars/default-img.png') !!}')"
                                        class="custom-file-input" value="{{ old('upload_logo') }}" id="customFile"
                                        name="upload_logo">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <p id="helpId" class="form-text text-danger">
                                    @error('upload_logo')
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
                                <label class="form-name" for="">Tên quốc tế</label>
                                <input type="text" class="form-control" name="ten_quoc_te"
                                    value="{{ old('ten_quoc_te') }}" placeholder="Nhập tên quốc tế của cơ sở">
                                {{-- <p id="helpId" class="form-text text-danger">
                                    @error('ten_quoc_te')
                                    {{ $message }}
                                    @enderror
                                </p> --}}
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
                                        <p id="helpId" class="form-text text-danger">
                                            @error('maqh')
                                            {{ $message }}
                                            @enderror
                                        </p>
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
                                        <p id="helpId" class="form-text text-danger">
                                            @error('xaid')
                                            {{ $message }}
                                            @enderror
                                        </p>
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
                                <form method="post" action="">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Tên
                                            quyết định: <span class="text-danger">(*)</span></label></label>
                                        <input type="text" class="form-control" id="ten_quyet_dinh">
                                        <p class="text-danger" id="Err_ten"></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Đường
                                            dẫn văn bản: <span class="text-danger">(*)</span></label></label>
                                        <input type="text" class="form-control" id="url_van_ban">
                                        <p class="text-danger" id="Err_van_ban_url"></p>

                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-4 col-lg-5">
                                            <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_ban_hanh" id="ngay_ban_hanh"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger" id="Err_ngay_ban_hanh"></p>
                                        </div>
                                        <div class="form-group mb-4 col-lg-5">
                                            <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_hieu_luc" id="ngay_hieu_luc"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger" id="Err_ngay_hieu_luc"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-4 col-lg-10">
                                            <label>Ngày hết hạn <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_het_han" id="ngay_het_han"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger" id="Err_ngay_het_han"></p>
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
                                        <p class="text-danger" id="Err_loai_quyet_dinh"></p>
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
                {{-- end modal add quyết đinh --}}
            </div>
            {{-- end modal add quyết đinh --}}
        </div>
    </div>
</div>
<div class="m-content container-fluid">
    <div class="m-portlet m-portlet--full-height">

        <!--begin: Portlet Head-->
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Thêm mới cơ sở đào tạo
                        
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="#" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Get help with filling up this form">
                            <i class="flaticon-info m--icon-font-size-lg3"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!--end: Portlet Head-->

        <!--begin: Form Wizard-->
        <div class="m-wizard m-wizard--2 m-wizard--success" id="m_wizard">

            <!--begin: Message container -->
            <div class="m-portlet__padding-x">

                <!-- Here you can put a message or alert -->
            </div>

            <!--end: Message container -->

            <!--begin: Form Wizard Head -->
            <div class="m-wizard__head m-portlet__padding-x">

                <!--begin: Form Wizard Progress -->
                <div class="m-wizard__progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <!--end: Form Wizard Progress -->

                <!--begin: Form Wizard Nav -->
                <div class="m-wizard__nav">
                    <div class="m-wizard__steps">
                        <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                            <a href="#" class="m-wizard__step-number">
                                <span><i class="fa  flaticon-placeholder"></i></span>
                            </a>
                            <div class="m-wizard__step-info">
                                <div class="m-wizard__step-title">
                                    1. Thông tin cơ sở
                                </div>
                                {{-- <div class="m-wizard__step-desc">
                                    Lorem ipsum doler amet elit<br>
                                    sed eiusmod tempors
                                </div> --}}
                            </div>
                        </div>
                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                            <a href="#" class="m-wizard__step-number">
                                <span><i class="fa  flaticon-layers"></i></span>
                            </a>
                            <div class="m-wizard__step-info">
                                <div class="m-wizard__step-title">
                                    2. Account Setup
                                </div>
                                <div class="m-wizard__step-desc">
                                    Lorem ipsum doler amet elit<br>
                                    sed eiusmod tempors
                                </div>
                            </div>
                        </div>
                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                            <a href="#" class="m-wizard__step-number">
                                <span><i class="fa  flaticon-layers"></i></span>
                            </a>
                            <div class="m-wizard__step-info">
                                <div class="m-wizard__step-title">
                                    3. Confirmation
                                </div>
                                <div class="m-wizard__step-desc">
                                    Lorem ipsum doler amet elit<br>
                                    sed eiusmod tempors
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end: Form Wizard Nav -->
            </div>

            <!--end: Form Wizard Head -->

            <!--begin: Form Wizard Form-->
            <div class="m-wizard__form">

                <!--
1) Use m-form--label-align-left class to alight the form input lables to the right
2) Use m-form--state class to highlight input control borders on form validation
-->
                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">

                    <!--begin: Form Body -->
                    <div class="m-portlet__body">

                        <!--begin: Form Wizard Step 1-->
                        <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                            <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Thông tin</h3>
                            </div>
                            <div class="main-form row d-flex justify-content-around">
                                {{-- <div class="col-xl-8 offset-xl-2">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Thông tin</h3>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Tên cơ sở:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="name" class="form-control m-input" placeholder="" value="Nick Stone">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Mã cơ sở:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="email" name="email" class="form-control m-input" placeholder="" value="nick.stone@gmail.com">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Cấp quản lý</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <select name="country" class="form-control m-input">
                                                    <option value="">Select</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Loại hình sở hữu:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <select name="country" class="form-control m-input">
                                                    <option value="">Select</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Trình độ đào tạo:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <select name="country" class="form-control m-input">
                                                    <option value="">Select</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="m-form__section">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">
                                               Quyết định số:
                                                <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
                                            </h3>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Address Line 1:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="address1" class="form-control m-input" placeholder="" value="Headquarters 1120 N Street Sacramento 916-654-5266">
                                                <span class="m-form__help">Street address, P.O. box, company name, c/o</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="address2" class="form-control m-input" placeholder="" value="P.O. Box 942873 Sacramento, CA 94273-0001">
                                                <span class="m-form__help">Appartment, suite, unit, building, floor, etc</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* City:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="city" class="form-control m-input" placeholder="" value="Polo Alto">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* State:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <input type="text" name="state" class="form-control m-input" placeholder="" value="California">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Country:</label>
                                            <div class="col-xl-9 col-lg-9">
                                                <select name="country" class="form-control m-input">
                                                    <option value="">Select</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KR">Korea, Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US" selected>United States</option>
                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Viet Nam</option>
                                                    <option value="VG">Virgin Islands, British</option>
                                                    <option value="VI">Virgin Islands, U.S.</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                
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
                                    <label class="form-name" for="">Cấp quản lý<span
                                            class="text-danger">(*)</span></label>
                                    <div class="d-flex">
                                        <select class="form-control col-12" name=""
                                            id="co_quan_chu_quan_id">
                                            <option selected disabled>-----Chọn-----</option>
                                            
                                            <option value="" >Trung ương</option>
                                            <option value="" >Địa phương</option>
                                                
                                           
                                        </select>
                                        
                                    </div>
                                    <p id="helpId" class="form-text text-danger">
                                        @error('co_quan_chu_quan_id')
                                        {{ $message }}  
                                        @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="col-right col-lg-5">
                                <div class="form-group col-lg-12">
                                    
                                    <label class="form-name" for="">Hình thức sở hữu<span
                                            class="text-danger">(*)</span></label>
                                    <div class="d-flex">
                                        <select class="form-control col-12" name=""
                                            id="co_quan_chu_quan_id">
                                            <option selected disabled>-----Chọn-----</option>
                                            
                                            <option value="">Tư thục</option>
                                            <option value="">Có vốn đầu tư nước ngoài</option>
                                            
                                            
                                        </select>
                                        
                                    </div>
                                    <p id="helpId" class="form-text text-danger">
                                        @error('co_quan_chu_quan_id')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
    
                               
                                <div class="form-group col-lg-12">
                                    <label class="form-name" for="">Trình độ đào tạo<span
                                            class="text-danger">(*)</span></label>
                                    <div class="d-flex">
                                        <select class="form-control col-12" name="co_quan_chu_quan_id"
                                            id="co_quan_chu_quan_id">
                                            <option selected disabled>-----Chọn-----</option>
                                            <option value="">Cao Đẳng</option>
                                            
                                            <option value="">Trung Cấp</option>
                                            <option value="">TTGDTX</option>
                                            <option value="">Doanh Nghiệp</option>
                                            <option value="">Khác</option>
                                        </select>
                                        
                                    </div>
                                    <p id="helpId" class="form-text text-danger">
                                        @error('co_quan_chu_quan_id')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                            </div>
                            <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Quyết định</h3>
                            </div>
                            <div class="main-form row d-flex justify-content-around">
                                
                                
                            <div class="col-left col-lg-5">
                                
                                <div class="form-group col-lg-12">
                                    
                                    <label class="form-name mr-3" for="">Số quyết định <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="ten" value=""
                                        class="form-text text-danger" placeholder="Nhập quyết định">
                                    <p id="helpId" class="form-text text-danger">
                                        @error('ten')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
    
                                <div class="form-group col-lg-12">
                                    <label for="" class="form-name">Ảnh quyết định <span class="text-danger">(*)</span></label>
                                    <div class="form-group col-lg-12 mt-2">
                                        <img id="logo-co-so" class="col-6" src="" alt="">
                                    </div>
                                    <div class="custom-file form-control">
                                        <input type="file"
                                            onchange="SystemUtil.previewImage(this, '#logo-co-so', '{!! asset('uploads/avatars/default-img.png') !!}')"
                                            class="custom-file-input" value="{{ old('upload_logo') }}" id="customFile"
                                            name="upload_logo">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <p id="helpId" class="form-text text-danger">
                                        @error('upload_logo')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <div class="form-group mb-4 col-lg-6">
                                        <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                        <div class="input-group date datepicker">
                                            <input type="text" name="ngay_ban_hanh" id="ngay_ban_hanh"
                                                placeholder="Ngày-tháng-năm" class="form-control">
                                            <div
                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                <span><i class="flaticon-calendar-2"></i></span>
                                            </div>
                                        </div>
                                        <p class="text-danger" id="Err_ngay_ban_hanh"></p>
                                    </div>
                                    <div class="form-group mb-4 col-lg-6">
                                        <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                        <div class="input-group date datepicker">
                                            <input type="text" name="ngay_hieu_luc" id="ngay_hieu_luc"
                                                placeholder="Ngày-tháng-năm" class="form-control">
                                            <div
                                                class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                <span><i class="flaticon-calendar-2"></i></span>
                                            </div>
                                        </div>
                                        <p class="text-danger" id="Err_ngay_hieu_luc"></p>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-8 col-lg-12">
                                            <label>Ngày hết hạn <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_het_han" id="ngay_het_han"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger" id="Err_ngay_het_han"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-right col-lg-5">
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
                                            <p id="helpId" class="form-text text-danger">
                                                @error('maqh')
                                                {{ $message }}
                                                @enderror
                                            </p>
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
                                            <p id="helpId" class="form-text text-danger">
                                                @error('xaid')
                                                {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group col-lg-12">
                                    <label class="form-name" for="">Địa chỉ đăng ký <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="dia_chi" value=""
                                        placeholder="Địa chỉ đăng ký">
                                        <p id="helpId" class="form-text text-danger">
                                            @error('xaid')
                                            {{ $message }}
                                            @enderror
                                        </p>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="form-name" for="">Người đại diện <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="dia_chi" value=""
                                        placeholder="Người đại diện">
                                        <p id="helpId" class="form-text text-danger">
                                            @error('xaid')
                                            {{ $message }}
                                            @enderror
                                        </p>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="form-group d-flex">
                                        <div class="mr-5">
                                            <label for="" class="form-name">Số điện thoại <span
                                                    class="text-danger">(*)</span></label>
                                                    <input type="text" class="form-control" name="dia_chi" value=""
                                                    placeholder="Số điện thoại người đại diện">
                                                    <p id="helpId" class="form-text text-danger">
                                                        @error('xaid')
                                                        {{ $message }}
                                                        @enderror
                                                    </p>
                                        </div>
    
                                        <div class="">
                                            <label for="" class="form-name">Email <span
                                                    class="text-danger">(*)</span></label>
                                                    <input type="text" class="form-control" name="dia_chi" value=""
                                                    placeholder="Email người đại diện">
                                                    <p id="helpId" class="form-text text-danger">
                                                        @error('xaid')
                                                        {{ $message }}
                                                        @enderror
                                                    </p>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="form-name" for="">Người phụ trách<span
                                            class="text-danger">(*)</span></label>
                                    <div class="d-flex">
                                        <select class="form-control col-12" name="co_quan_chu_quan_id"
                                            id="co_quan_chu_quan_id">
                                            <option selected disabled>-----Chọn-----</option>
                                            
                                            <option value="">Ông A </option>
                                            <option value="">Ông B </option>

                                                
                                               
                                            
                                        </select>
                                        
                                    </div>
                                    <p id="helpId" class="form-text text-danger">
                                        @error('co_quan_chu_quan_id')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                            </div>
                            <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Địa điểm đào tạo <i onclick="addDiaChi()" class="fa fa-plus"></i></h3>
                            </div>
                            <div class="main-form list_dia_chi ">
                                
                                <div class="dia_diem_dao_tao row">
                                    <div class="form-group col-md-4">
                                        
                                        <label class="form-name mr-3" for="">Địa chỉ <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="ten" value=""
                                            class="form-text text-danger" placeholder="Nhập địa chỉ">
                                        
                                    </div>
                                    <div class="form-group col-md-4">
                                        
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
                                    <p id="helpId" class="form-text text-danger">
                                        @error('maqh')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        
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
                                    <p id="helpId" class="form-text text-danger">
                                        @error('xaid')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                        
                                    </div>
                                    <div class="col-md-1 removediachi">
                                        <i  onclick='removeDiaChi(this)'  class="fa fa-times"></i>
                                    </div>
                                </div>    
                               
                               
                            
                            
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Account Details</h3>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-12">
                                                <label class="form-control-label">* URL:</label>
                                                <input type="url" name="account_url" class="form-control m-input" placeholder="" value="http://sinortech.vertoffice.com">
                                                <span class="m-form__help">Please enter your preferred URL to your dashboard</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Username:</label>
                                                <input type="text" name="account_username" class="form-control m-input" placeholder="" value="nick.stone">
                                                <span class="m-form__help">Your username to login to your dashboard</span>
                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Password:</label>
                                                <input type="password" name="account_password" class="form-control m-input" placeholder="" value="qwerty">
                                                <span class="m-form__help">Please use letters and at least one number and symbol</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="m-form__section">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Client Settings</h3>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* User Group:</label>
                                                <div class="m-radio-inline">
                                                    <label class="m-radio m-radio--solid m-radio--brand">
                                                        <input type="radio" name="account_group" checked="" value="2"> Sales Person
                                                        <span></span>
                                                    </label>
                                                    <label class="m-radio m-radio--solid m-radio--brand">
                                                        <input type="radio" name="account_group" value="2"> Customer
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <span class="m-form__help">Please select user group</span>
                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Communications:</label>
                                                <div class="m-checkbox-inline">
                                                    <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                        <input type="checkbox" name="account_communication[]" checked value="email"> Email
                                                        <span></span>
                                                    </label>
                                                    <label class="m-checkbox m-checkbox--solid  m-checkbox--brand">
                                                        <input type="checkbox" name="account_communication[]" value="sms"> SMS
                                                        <span></span>
                                                    </label>
                                                    <label class="m-checkbox m-checkbox--solid  m-checkbox--brand">
                                                        <input type="checkbox" name="account_communication[]" value="phone"> Phone
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <span class="m-form__help">Please select user communication options</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="m-form__section">
                                        <div class="m-form__heading">
                                            <h3 class="m-form__heading-title">Delivery Type</h3>
                                        </div>
                                        <div class="form-group m-form__group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="m-option">
                                                        <span class="m-option__control">
                                                            <span class="m-radio m-radio--state-brand">
                                                                <input type="radio" name="billing_delivery" value="">
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="m-option__label">
                                                            <span class="m-option__head">
                                                                <span class="m-option__title">
                                                                    Standart Delevery
                                                                </span>
                                                                <span class="m-option__focus">
                                                                    Free
                                                                </span>
                                                            </span>
                                                            <span class="m-option__body">
                                                                Estimated 14-20 Day Shipping
                                                                (&nbsp;Duties end taxes may be due
                                                                upon delivery&nbsp;)
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="m-option">
                                                        <span class="m-option__control">
                                                            <span class="m-radio m-radio--state-brand">
                                                                <input type="radio" name="billing_delivery" value="">
                                                                <span></span>
                                                            </span>
                                                        </span>
                                                        <span class="m-option__label">
                                                            <span class="m-option__head">
                                                                <span class="m-option__title">
                                                                    Fast Delevery
                                                                </span>
                                                                <span class="m-option__focus">
                                                                    $&nbsp;8.00
                                                                </span>
                                                            </span>
                                                            <span class="m-option__body">
                                                                Estimated 2-5 Day Shipping
                                                                (&nbsp;Duties end taxes may be due
                                                                upon delivery&nbsp;)
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="m-form__help">

                                                <!--must use this helper element to display error message for the options-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">

                                    <!--begin::Section-->
                                    <ul class="nav nav-tabs m-tabs-line--2x m-tabs-line m-tabs-line--danger" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_form_confirm_1" role="tab">1. Client Information</a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_2" role="tab">2. Account Setup</a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_3" role="tab">3. Billing Setup</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content m--margin-top-40">
                                        <div class="tab-pane active" id="m_form_confirm_1" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Client Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Name:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Nick Stone</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">nick.stone@gmail.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">+206-78-55034890</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Corresponding Address <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i></h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line 1:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Headquarters 1120 N Street Sacramento 916-654-5266</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">P.O. Box 942873 Sacramento, CA 94273-0001</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">City:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Polo Alto</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">State:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">California</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Country:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">USA</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="m_form_confirm_2" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Account Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">URL:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.vertoffice.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.admin</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">*********</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h4 class="m-form__heading-title">Account Details</h4>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">URL:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.vertoffice.com</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Username:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">sinortech.admin</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">*********</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="m_form_confirm_3" role="tabpanel">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__section">
                                                    <div class="m-form__heading">
                                                        <h4 class="m-form__heading-title">Client Settings</h4>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">User Group:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static">Customer</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group m-form__group--sm row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Communications:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <span class="m-form__control-static">Phone, Email</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Section-->

                                    <!--end::Section-->
                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                    <div class="form-group m-form__group m-form__group--sm row">
                                        <div class="col-xl-12">
                                            <div class="m-checkbox-inline">
                                                <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                    <input type="checkbox" name="accept" value="1">
                                                    Click here to indicate that you have read and agree to the terms presented in the Terms and Conditions agreement
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 3-->
                    </div>

                    <!--end: Form Body -->

                    <!--begin: Form Actions -->
                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4 m--align-left">
                                    <a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev">
                                        <span>
                                            <i class="la la-arrow-left"></i>&nbsp;&nbsp;
                                            <span>Back</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-lg-4 m--align-right">
                                    <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
                                        <span>
                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                            <span>Submit</span>
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-warning m-btn m-btn--custom m-btn--icon" data-wizard-action="next">
                                        <span>
                                            <span>Save & Continue</span>&nbsp;&nbsp;
                                            <i class="la la-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </div>

                    <!--end: Form Actions -->
                </form>
            </div>

            <!--end: Form Wizard Form-->
        </div>

        <!--end: Form Wizard-->
    </div>
</div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
        $('#devvn_quanhuyen').select2();
        $('#devvn_xaphuongthitran').select2();
        $('#co_quan_chu_quan_id').select2();
        $('#quyet_dinh_id').select2();

        $('.form-control').attr('autocomplete', 'off');
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

    $('.datepicker').css('width', '100%');

    $("#devvn_quanhuyen").change(function() {
        axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id: $("#devvn_quanhuyen").val(),
            })
            .then(function(response) {
                var htmldata = '<option selected  disabled>Xã / Phường</option>'
                response.data.forEach(element => {
                    htmldata += `<option value="${element.xaid}" >${element.name}</option>`
                });
                $('#devvn_xaphuongthitran').html(htmldata);
            })
            .catch(function(error) {
                console.log(error);
            });
    });


    $("#btn-them-co-quan").click(function(event) {
        event.preventDefault();
        $('#Err-ten').addClass('d-none');
        $('#Err-ma').addClass('d-none');

        $(document).ajaxStart(function(){
        $(".loading").css("display", "block");
        });

        $(document).ajaxComplete(function(){
            $(".loading").css("display", "none");
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('co-quan-chu-quan.them')}}",
            data: {
                ten: $('#ten-co-quan-chu-quan').val(),
                ma: $('#ma-co-quan-chu-quan').val(),
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                var htmldata = '<option selected disabled>---Chọn cơ quan---</option>'
                response.data.forEach(element => {
                    htmldata += `<option value="${element.id}">${element.ten}</option>`
                });
                $('#co_quan_chu_quan_id').html(htmldata);
                Swal.fire({
                title: response.message,
                icon: 'success'
                });
                $('#m_modal_5').modal('hide');
            },
            error: function(data) {
                var errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        console.log(value);
                        var ErrorID = '#Err-' + key;
                        $(ErrorID).removeClass('d-none');
                        $(ErrorID).text(value);
                    })
                }
            }
        });
    });

    $("#btn-them-quyet-dinh-ajax").click(function(event) {
        event.preventDefault();
        
        $('#Err_ten').addClass('d-none');
        $('#Err_ngay_ban_hanh').addClass('d-none');
        $('#Err_van_ban_url').addClass('d-none');
        $('#Err_ngay_hieu_luc').addClass('d-none');
        $('#Err_ngay_het_han').addClass('d-none');
        $('#Err_loai_quyet_dinh').addClass('d-none');


        $(document).ajaxStart(function(){
        $(".loading").css("display", "block");
        });

        $(document).ajaxComplete(function(){
            $(".loading").css("display", "none");
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('quyet-dinh.add')}}",
            data: {
            ten: $('#ten_quyet_dinh').val(),
            van_ban_url: $('#url_van_ban').val(),
            ngay_ban_hanh: $('#ngay_ban_hanh').val(),
            ngay_hieu_luc: $('#ngay_hieu_luc').val(),
            ngay_het_han: $('#ngay_het_han').val(),
            loai_quyet_dinh: $('#loai_quyet_dinh').val(),
            _token: $('#token').val()
        },
            success: function(response) {
                var htmldata = '<option selected disabled>---Chọn quyết định---</option>'
                response.data.forEach(element => {
                    htmldata += `<option value="${element.id}">${element.ten}</option>`
                });
                $('#quyet_dinh_id').html(htmldata);
                Swal.fire({
                title: response.messageqd,
                icon: 'success'
                });
                $('#m_modal_6').modal('hide');
            },
            error: function(data) {
                var errors = data.responseJSON;
                if($.isEmptyObject(errors) == false){
                    $.each(errors.errors, function(key, value){
                        var ErrorID = '#Err_' + key;
                        $(ErrorID).removeClass('d-none');
                        $(ErrorID).text(value);
                        console.log(ErrorID);
                    })
                }
            }
        });
    });

    $(document).ready(function() {
        var logoImgUrl = $('#logo-co-so').attr('src');
        SystemUtil.defaultImgUrl(logoImgUrl, '#logo-co-so', "{!! asset('uploads/avatars/default-img.png') !!}");
    });

    function addDiaChi() {
        var htmlDiachi = `
        <div class="dia_diem_dao_tao row">
                                    <div class="form-group col-md-4">
                                        
                                        <label class="form-name mr-3" for="">Địa chỉ <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="ten" value=""
                                            class="form-text text-danger" placeholder="Nhập địa chỉ">
                                        
                                    </div>
                                    <div class="form-group col-md-4">
                                        
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
                                    <p id="helpId" class="form-text text-danger">
                                        @error('maqh')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        
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
                                    <p id="helpId" class="form-text text-danger">
                                        @error('xaid')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                        
                                    </div>
                                    <div class="col-md-1 removediachi">
                                        <i onclick='removeDiaChi(this)' class="fa fa-times"></i>
                                    </div>
                                </div>   
        `
        $('.list_dia_chi').append(htmlDiachi)
    }

    function removeDiaChi(e) {
        $(e).parents('.dia_diem_dao_tao').remove()
    }
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection