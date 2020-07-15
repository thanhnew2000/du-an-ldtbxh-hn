@extends('layouts.admin')
@section('title', 'Thêm mới cơ sở đào tạo')
@section('style')
<style>
.removediachi{
line-height: 90px
}

.fa-plus,
.fa-times {
    cursor: pointer;
    /* font-size: 25px; */
    color: rgb(90, 92, 211);
    line-height: 40px;
    text-align: center
}
.m-demo__preview{
    border: none !important
}
</style>
<link href="{!! asset('css_loading/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

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
                                    2. Giấy phép
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

                        {{-- start quang add giay chung nhan nghe --}}
                        <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                            <div class="m-content container-fluid">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="m-menu__link-icon flaticon-web"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Thêm mới giấy chứng nhận
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <form action="" name="yourformname" id="giay_chung_nhan" method="POST"  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-6 d-flex align-items-stretch">
                                                        <div class="col-12">
                                                            @if (isset($Csdt))
                                                            <div class="form-group1 m-form__group mb-4">
                                                                <label for="">Tên trường: <b></b></label>
                                                                <input type="hidden" name="co_so_id" value="">
                                                            </div>
                                                            @endif
                            
                            
                                                            <div class="form-group m-form__group mb-4">
                                                                <label>Số quyết định <span class="text-danger">(*)</span></label>
                                                                <input type="text" name="so_quyet_dinh" value="{{old('ten_giay_phep')}}"
                                                                    class="form-control m-input" placeholder="Nhập số quết định">
                                                            </div>
                                                            <p class="text-danger text-small">
                                                                @error('ten_giay_phep')
                                                                {{$message}}
                                                                @enderror
                                                            </p>
                                                            <div class="form-group m-form__group">
                                                                <label for="exampleInputEmail1">Ảnh giấy phép <span
                                                                        class="text-danger">(*)</span></label>
                                                                <div class="custom-file">
                                                                    <input type="file" value="{{old('anh-giay-phep')}}" name="anh-giay-phep"
                                                                        class="custom-file-input"
                                                                        onchange="showimages(this)"
                                                                        id="customFileGiayPhep">
                                                                    <label class="custom-file-label" for="customFileGiayPhep">Choose file</label>
                                                                </div>
                                                                <p class="text-danger text-small">
                                                                    {{-- @error('anh-giay-phep')
                                                                    {{$message}}
                                                                    @enderror --}}
                                                                </p>
                                                            </div>
                                                        </div>
                            
                                                    </div>
                            
                                                    <div class="col-6">
                                                        <div class="anh-giay-phep">
                                                            <img src="" id="showimg" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="row col-12 mt-3">
                                                    <div class="col-4">
                                                        <div class="form-group m-form__group mb-4">
                                                            <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                                            <div class="input-group date datepicker">
                                                                <input type="text" name="ngay_ban_hanh_giay_phep" value="{{old('ngay_ban_hanh')}}"
                                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                                <div
                                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger text-small">
                                                                {{-- @error('ngay_ban_hanh')
                                                                {{$message}}
                                                                @enderror --}}
                                                            </p>
                                                        </div>
                                                    </div>
                            
                                                    <div class="col-4">
                                                        <div class="form-group m-form__group mb-4">
                                                            <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                                            <div class="input-group date datepicker">
                                                                <input type="text" name="ngay_hieu_luc_giay_phep" value="{{old('ngay_hieu_luc')}}"
                                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                                <div
                                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger text-small">
                                                            </p>
                                                        </div>
                                                    </div>
                            
                                                    <div class="col-4">
                                                        <div class="form-group m-form__group mb-4">
                                                            <label>Ngày hết hạn <span class="text-danger">(*)</span></label>
                                                            <div class="input-group date datepicker">
                                                                <input type="text" name="ngay_het_han_giay_phep" value="{{old('ngay_het_han')}}"
                                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                                <div
                                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger text-small">
                                                                {{-- @error('ngay_het_han[]')
                                                                {{$message}}
                                                                @enderror --}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="row col-12">
                                                    <div class="col-12 form-group m-form__group">
                                                        <label for="exampleTextarea">Mô tả quyết định</label>
                                                        <textarea class="form-control m-input" id="summernote" name="mo_ta"
                                                            placeholder="Mô tả ngắn gọn nội dung giấy phép hoặc ghi chú" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                            <p><span class="text-danger">(*)</span> Mục không được để trống</p>
                                        </div>
                            
                                </div>
                                <div id="preload" class="preload-container text-center" style="display: none">
                                    <img id="gif-load" src="{!! asset('images/loading1.gif') !!}" alt="">
                                </div>
                                
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="la la-gear"></i>
                                                    </span>
                                                    <h3 class="m-portlet__head-text">
                                                        Thêm nghề cho cơ sở
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                            <div class="danh_sach_co_so">
                                        <!--begin::Form-->
                                        {{-- @foreach ($chi_nhanh as $item)
                                        <div class="m-section__content chi_nhanh{{$item->id}}" chi_nhanh='{{$item->id}}'>
                                            <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                                <div class="m-demo__preview m-demo__preview--btn">
                                                    <span class="btn btn-brand">{{$item->dia_chi}}</span> <i onclick="addForm(this)"
                                                        class="fa fa-plus"></i>
                                                    <div class="form_add_nghe">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach --}}
                                    </div>
                            
                            
                                        <!--end::Form-->
                                    </div>
                                    <div class="d-flex justify-content-end mr-5">
                                        <button type="button" onclick="getDataDiaDiem(12)" class="btn btn-success">Địa Điểm</button>
                                        <button type="button" onclick="addDuLieuGiayChungNhan()" class="btn btn-success">Đăng ký</button>
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
                                    <span onclick="addDuLieuGiayChungNhan()" href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
                                        <span>
                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                            <span>Đăng ký</span>
                                        </span>
                                    </span>
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
{{-- start quang-add-them-giay-phep-nghe --}}
<script >
$(document).ready(function() {
    $(".select2").select2();
});
var getDiaChiCoSo = "{{route('getDiaChiCoSo')}}";
var storeUrl = "{{route('store-nganh-nghe')}}";
var addGiayChungNhan = "{{route('addGiayChungNhan')}}";
var urlNganhNghe = "{{route('getNghe')}}";
var config = <?php echo json_encode(config('common.bac_nghe')) ?>;
</script>
<script src="{!! asset('add_giay_chung_nhan_nghe/add_giay_chung_nhan_nghe.js') !!}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- end quang-add-them-giay-phep-nghe --}}
@endsection