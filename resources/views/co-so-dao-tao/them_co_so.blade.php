@extends('layouts.admin')
@section('title', 'Thêm mới cơ sở đào tạo')
@section('style')
<style>
    .removediachi {
        line-height: 90px
    }
    .m-demo__preview {
        border: none !important
    }
    .messageNoNghe {
        color: red;
    }
    .messageNoTrinhDo {
        color: red;
    }
    .name_address{
        font-size: 15px;
        color: #df3333
    }
    .fa-plus:before,.fa-times{
        color: blue;
        cursor: pointer;
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
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100"></div>
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
                            <div class="m-portlet__head mb-5">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Thêm mới cơ sở đào tạo
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="main-form row d-flex justify-content-around">
                                <div class="col-left col-lg-5">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    @if (isset($activeUser))
                                        <input type="hidden" name="id_nguoi_phu_trach" value="{{$activeUser}}">
                                    @endif
                                    <input type="hidden" name="co_so_id">
                                    <div class="form-group col-lg-12">

                                        <label class="form-name mr-3" for="">Tên cơ sở đào tạo <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="ten" value="{{ old('ten') }}"
                                            class="form-text text-danger" placeholder="Nhập tên cơ sở đào tạo">
                                        <p class="text-danger" id="Err_ten"></p>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Mã đơn vị <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="ma_don_vi"
                                            value="{{ old('ma_don_vi') }}" placeholder="Nhập mã đơn vị">
                                        <p class="text-danger" id="Err_ma_don_vi"></p>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Cấp quản lý<span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12" name="cap_quan_ly" id="co_quan_chu_quan_id">
                                            <option value="" selected>-----Chọn-----</option>
                                            @foreach (config('common.cap_quan_ly') as $cap)
                                            <option value="{{ $cap['ma_cap'] }}">
                                                {{ $cap['ten_cap'] }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger" id="Err_cap_quan_ly"></p>
                                    </div>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Người đại diện</legend>
                                        <div class="form-group col-lg-12">
                                            <label class="form-name" for="">Họ và tên <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="ten_nguoi_dai_dien" value=""
                                                placeholder="Người đại diện">
                                            <p class="text-danger" id="Err_ten_nguoi_dai_dien"></p>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <div class="form-group d-flex">
                                                <div class="mr-5">
                                                    <label for="" class="form-name">Số điện thoại</label>
                                                    <input type="text" class="form-control" name="sdt_nguoi_dai_dien"
                                                        value="" placeholder="Số điện thoại người đại diện">
                                                </div>

                                                <div class="">
                                                    <label for="" class="form-name">Email</label>
                                                    <input type="text" class="form-control" name="email_nguoi_dai_dien"
                                                        value="" placeholder="Email người đại diện">
                                                </div>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-right col-lg-5">
                                    <div class="form-group col-lg-12">

                                        <label class="form-name" for="">Hình thức sở hữu<span
                                                class="text-danger">(*)</span></label>
                                        <div class="d-flex">
                                            <select class="form-control col-12" name="hinh_thuc_so_huu"
                                                id="hinh_thuc_so_huu">
                                                <option value="" selected>Chọn</option>
                                                @foreach (config('common.hinh_thuc_so_huu') as $hinh_thuc)
                                                <option value="{{ $hinh_thuc['ma_hinh_thuc'] }}">
                                                    {{ $hinh_thuc['ten_hinh_thuc'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="text-danger" id="Err_hinh_thuc_so_huu"></p>
                                    </div>


                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Trình độ đào tạo<span
                                                class="text-danger">(*)</span></label>
                                        <div class="d-flex">
                                            <select class="form-control col-12" name="trinh_do_dao_tao"
                                                id="co_quan_chu_quan_id">
                                                <option value="">Chọn</option>
                                                @foreach (config('common.trinh_do_dao_tao') as $trinh_do)
                                                <option value="{{ $trinh_do['ma_trinh_do'] }}">
                                                    {{ $trinh_do['ten_trinh_do'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="text-danger" id="Err_trinh_do_dao_tao"></p>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Hotline <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="hotline" value=""
                                            placeholder="Nhập số điện thoại">
                                        <p class="text-danger" id="Err_hotline"></p>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Người phụ trách<span
                                                class="text-danger">(*)</span></label>
                                        <div class="d-flex">
                                            <select class="form-control col-12 select2" name="nguoi_phu_trach">
                                                <option value="" selected>-----Chọn-----</option>
                                                @foreach ($user as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="text-danger" id="Err_nguoi_phu_trach"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="m-portlet__head mb-5">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Quyết định
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="main-form row d-flex justify-content-around">
                                <div class="col-left col-lg-5">
                                    <div class="form-group col-lg-12">
                                        <label class="form-name mr-3" for="">Số quyết định <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="so_quyet_dinh" value=""
                                            class="form-text text-danger" placeholder="Nhập quyết định">
                                        <p class="text-danger" id="Err_so_quyet_dinh"></p>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="" class="form-name">Ảnh quyết định <span
                                                class="text-danger">(*)</span></label>
                                        <div class="form-group col-lg-12 mt-2">
                                            <img id="logo-co-so" class="col-6" src="" alt="">
                                        </div>
                                        <div class="custom-file form-control">
                                            <input type="file"
                                                onchange="SystemUtil.previewImage(this, '#logo-co-so', '{!! asset('uploads/avatars/default-img.png') !!}')"
                                                class="custom-file-input anh_quyet_dinh" value="" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <p class="text-danger mt-3" id="Err_anh_quyet_dinh"></p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_ban_hanh" value=""
                                                    placeholder="Ngày-tháng-năm" class="form-control"
                                                    onchange="hasValue(this.value)">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger" id="Err_ngay_ban_hanh"></p>
                                        </div>
                                    </div>

                                    <div class="">
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
                                            <p class="text-danger" id="Err_ngay_hieu_luc"></p>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hết hạn</label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_het_han" value=""
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

                            {{-- begin: Địa điểm đào tạo --}}
                            <div class="m-portlet__head mb-5">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Địa điểm đào tạo &nbsp; <i onclick="addDiaChi()"
                                                class="fa fa-plus icon-plus"></i>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="main-form list_dia_chi ">
                                <p class="text-danger" id="Err_chi_nhanh"></p>
                                <div class="dia_diem_dao_tao row">
                                    <div class="form-group col-md-4">
                                        <label class="form-name mr-3" for="">Địa chỉ <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control dia_chi_chi_nhanh"
                                            name="dia_chi_chi_nhanh" value="" class="form-text text-danger"
                                            placeholder="Nhập địa chỉ">
                                        <p class="text-danger Err-dia_chi"></p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="" class="form-name">Quận/Huyện <span
                                                class="text-danger">(*)</span></label>
                                        <select onchange='changQuanHuyen(this)'
                                            class="form-control col-12 maqh select2 devvn_quanhuyen" name="maqh">
                                            <option disabled selected>Quận / Huyện</option>
                                            @foreach ($quanhuyen as $qh)
                                            <option value="{{ $qh->maqh }}">{{ $qh->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger Err-quan_huyen"></p>
                                    </div>
                                    <div class="form-group col-md-3">

                                        <label for="" class="form-name">Xã/ Phường <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12 xaid select2 devvn_xaphuongthitran"
                                            name="xaid">
                                            <option disabled selected>Chọn</option>
                                            @foreach ($xaphuong as $xp)
                                            <option value="{{ $xp->xaid }}">{{ $xp->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger Err-xa_phuong"></p>
                                    </div>
                                    <div class="col-md-1 removediachi">
                                        <i onclick='removeDiaChi(this)' class="fa fa-times"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- End: Địa điểm đào tạo --}}
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
                                            <form action="" name="yourformname" id="giay_chung_nhan" method="POST"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-6 d-flex align-items-stretch">
                                                        <div class="col-12">
                                                            @if (isset($Csdt))
                                                            <div class="form-group1 m-form__group mb-4">
                                                                <label for="">Tên trường: <b></b></label>
                                                            </div>
                                                            @endif


                                                            <div class="form-group m-form__group mb-4">
                                                                <label>Số quyết định <span
                                                                        class="text-danger">(*)</span></label>
                                                                <input type="text" name="so_quyet_dinh_giay_phep"
                                                                    value="{{old('ten_giay_phep')}}"
                                                                    class="form-control m-input"
                                                                    placeholder="Nhập số quết định">
                                                            </div>

                                                            <span class="text-danger" id="so_quyet_dinh_error"></span>

                                                            <div class="form-group m-form__group">
                                                                <label for="exampleInputEmail1">Ảnh giấy phép <span
                                                                        class="text-danger">(*)</span></label>
                                                                <div class="custom-file">
                                                                    <input type="file" value="{{old('anh-giay-phep')}}"
                                                                        name="anh_giay_phep" class="custom-file-input"
                                                                        onchange="showimages(this)"
                                                                        id="customFileGiayPhep">
                                                                    <label class="custom-file-label"
                                                                        for="customFileGiayPhep">Choose file</label>
                                                                </div>
                                                                <p class="text-danger text-small"
                                                                    id="anh_giay_phep_error">
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
                                                            <label>Ngày ban hành <span
                                                                    class="text-danger">(*)</span></label>
                                                            <div class="input-group date datepicker">
                                                                <input  onchange="chuyenNgayHieuLuc(this)" type="text" name="ngay_ban_hanh_giay_phep"
                                                                    value="{{old('ngay_ban_hanh')}}"
                                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                                <div
                                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger text-small"
                                                                id="ngay_ban_hanh_giay_phep_error">
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group m-form__group mb-4">
                                                            <label>Ngày hiệu lực <span
                                                                    class="text-danger">(*)</span></label>
                                                            <div class="input-group date datepicker">
                                                                <input type="text" name="ngay_hieu_luc_giay_phep"
                                                                    value="{{old('ngay_hieu_luc')}}"
                                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                                <div
                                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger text-small"
                                                                id="ngay_hieu_luc_giay_phep_error">
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group m-form__group mb-4">
                                                            <label>Ngày hết hạn <span
                                                                    class="text-danger">(*)</span></label>
                                                            <div class="input-group date datepicker">
                                                                <input type="text"  name="ngay_het_han_giay_phep"
                                                                    value="{{old('ngay_het_han')}}"
                                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                                <div
                                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger text-small"
                                                                id="ngay_het_han_giay_phep_error">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row col-12">
                                                    <div class="col-12 form-group m-form__group">
                                                        <label for="exampleTextarea">Mô tả quyết định</label>
                                                        <textarea class="form-control m-input" id="summernote"
                                                            name="mo_ta"
                                                            placeholder="Mô tả ngắn gọn nội dung giấy phép hoặc ghi chú"
                                                            rows="4"></textarea>
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

                                    </div>
                                    <p class="text-danger ml-5" id="error_duplicate_nghe_id"></p>

                                    <!--end::Form-->
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
                                        <a class="nav-link m-tabs__link active" data-toggle="tab"
                                            href="#m_form_confirm_1" role="tab">1. Client Information</a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_2"
                                            role="tab">2.
                                            Account Setup</a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_form_confirm_3"
                                            role="tab">3.
                                            Billing Setup</a>
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
                                                <h4 class="m-form__heading-title">Corresponding Address <i
                                                        data-toggle="m-tooltip" data-width="auto"
                                                        class="m-form__heading-help-icon flaticon-info"
                                                        title="Some help text goes here"></i></h4>
                                            </div>
                                            <div class="form-group m-form__group m-form__group--sm row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Address Line
                                                    1:</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <span class="m-form__control-static">Headquarters 1120 N Street
                                                        Sacramento 916-654-5266</span>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group m-form__group--sm row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Address Line
                                                    2:</label>
                                                <div class="col-xl-9 col-lg-9">
                                                    <span class="m-form__control-static">P.O. Box 942873 Sacramento,
                                                        CA 94273-0001</span>
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
                                                    <label class="col-xl-3 col-lg-3 col-form-label">User
                                                        Group:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <span class="m-form__control-static">Customer</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group m-form__group--sm row">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label">Communications:</label>
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
                                                Click here to indicate that you have read and agree to the terms
                                                presented in the Terms and Conditions agreement
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
                <div class="m-form__actions p-5">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4 m--align-left">
                            <a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
                                data-wizard-action="prev">
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
                            <a href="#" id="submit-co-so-ajax" class="btn btn-warning m-btn m-btn--custom m-btn--icon">
                                <span>
                                    <span>Save &amp; Continue</span>&nbsp;&nbsp;
                                    <i class="la la-arrow-right"></i>
                                </span>
                            </a>
                            <button class="d-none" id="btn-next-wizard" data-wizard-action="next">next</button>
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
        $('.select2').select2();
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
    let changQuanHuyen = function(e) {
        axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id: $(e).val(),
            })
            .then(function(response) {
                var htmldata = '<option selected  disabled>Xã / Phường</option>'
                response.data.forEach(element => {
                    htmldata += `<option value="${element.xaid}" >${element.name}</option>`
                });
                $(e).parents('.dia_diem_dao_tao').find('.devvn_xaphuongthitran').html(htmldata);
            })
            .catch(function(error) {
                console.log(error);
            });
    };
    $('#submit-co-so-ajax').click(function(event){
        event.preventDefault();
        $('#Err_ten').addClass('d-none');
        $('#Err_ma_don_vi').addClass('d-none');
        $('#Err_cap_quan_ly').addClass('d-none');
        $('#Err_ten_nguoi_dai_dien').addClass('d-none');
        $('#Err_hinh_thuc_so_huu').addClass('d-none');
        $('#Err_trinh_do_dao_tao').addClass('d-none');
        $('#Err_hotline').addClass('d-none');
        $('#Err_nguoi_phu_trach').addClass('d-none');
        $('#Err_so_quyet_dinh').addClass('d-none');
        $('#Err_anh_quyet_dinh').addClass('d-none');
        $('#Err_ngay_ban_hanh').addClass('d-none');
        $('#Err_ngay_hieu_luc').addClass('d-none');
        $('#Err_ngay_het_han').addClass('d-none');
        $('#Err_chi_nhanh').addClass('d-none');
        ChiNhanhObj = {}
        let dia_chi_chi_nhanh = [];
        let chi_nhanh = document.querySelectorAll('.dia_diem_dao_tao');
        let flag = true;
        for (let i = 0; i < chi_nhanh.length; i++) {
            let checkDiaChi = $(chi_nhanh[i]).find('.dia_chi_chi_nhanh').val();
            let checkQuanHuyen = $(chi_nhanh[i]).find('.devvn_quanhuyen').val();
            let checkXaPhuong = $(chi_nhanh[i]).find('.devvn_xaphuongthitran').val();
            if(checkDiaChi == ''){
                $(chi_nhanh[i]).find('.Err-dia_chi').text('Vui lòng nhập địa chỉ');
                flag = false;
            }else{
                $(chi_nhanh[i]).find('.Err-dia_chi').text('');
            }
                
            if(checkQuanHuyen == null){
                $(chi_nhanh[i]).find('.Err-quan_huyen').text('Vui lòng chọn quận/huyện');
                flag = false;
            }else{
                $(chi_nhanh[i]).find('.Err-quan_huyen').text('');
            }
                    
            if(checkXaPhuong == null){
                $(chi_nhanh[i]).find('.Err-xa_phuong').text('Vui lòng chọn xã/phường');
                flag = false;
            } else{
                $(chi_nhanh[i]).find('.Err-xa_phuong').text('');
            }
            if(flag == false){
                return false;
            }
            
            ChiNhanhObj = {
                dia_chi: $(chi_nhanh[i]).find('.dia_chi_chi_nhanh').val(),
                maqh: $(chi_nhanh[i]).find('.devvn_quanhuyen').val(),
                xaid: $(chi_nhanh[i]).find('.devvn_xaphuongthitran').val()    
            }
            dia_chi_chi_nhanh.push(ChiNhanhObj);
        }
        
        let Data = new FormData();
        let anh_quyet_dinh = $('.anh_quyet_dinh')[0].files[0];
        if(typeof(anh_quyet_dinh) != "undefined"){
            anh_quyet_dinh = $('.anh_quyet_dinh')[0].files[0];
        } else{
            anh_quyet_dinh = ''
        }
        Data.append('anh_quyet_dinh',anh_quyet_dinh);
        Data.append('ten', $('input[name=ten]').val());
        Data.append('ma_don_vi', $('input[name=ma_don_vi]').val());
        Data.append('cap_quan_ly', $('select[name=cap_quan_ly]').val());
        Data.append('ten_nguoi_dai_dien',$('input[name=ten_nguoi_dai_dien]').val());
        Data.append('sdt_nguoi_dai_dien',$('input[name=sdt_nguoi_dai_dien]').val());
        Data.append('email_nguoi_dai_dien',$('input[name=email_nguoi_dai_dien]').val());
        Data.append('hinh_thuc_so_huu',$('#hinh_thuc_so_huu').val());
        Data.append('trinh_do_dao_tao',$('select[name=trinh_do_dao_tao]').val());
        Data.append('hotline',$('input[name=hotline]').val());
        Data.append('so_quyet_dinh',$('input[name=so_quyet_dinh]').val());
        Data.append('ngay_ban_hanh',$('input[name=ngay_ban_hanh]').val());
        Data.append('ngay_hieu_luc',$('input[name=ngay_hieu_luc]').val());
        Data.append('ngay_het_han',$('input[name=ngay_het_han]').val());
        Data.append('nguoi_phu_trach', $('select[name=nguoi_phu_trach]').val());
        Data.append('id_nguoi_phu_trach', $('input[name=id_nguoi_phu_trach]').val());
        Data.append('dia_chi_chi_nhanh',JSON.stringify(dia_chi_chi_nhanh));
        Data.append('_token', $('#token').val());
        $(document).ajaxStart(function(){
        $(".loading").css("display", "block");
        });
        $(document).ajaxComplete(function(){
            $(".loading").css("display", "none");
        });
        
        $.ajax({
            type: "Post",
            contentType: false,
            processData: false,
            url: "{{route('mang-luoi.tao-csdt')}}",
            data: Data,
            success: function(response){
                
                getDataDiaDiem(response.CoSo.id);
                $('input[name=co_so_id]').val(response.CoSo.id);
                Swal.fire({
                title: 'Thêm mới thành công',
                text: "Tiếp tục thêm giấy phép",
                icon: 'success',
                showCancelButton: true,
                showConfirmButton: true,
                cancelButtonText: 'Quay lại',
                confirmButtonText: 'Thêm giấy phép',
                reverseButtons: true
                }).then((dd)=>{
                    if(dd.dismiss == "cancel"){
                        console.log('haha')
                    } else{
                        $('#btn-next-wizard').trigger('click')
                    }
                })
            },
            error: function(data){
                var errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        var ErrorID = '#Err_' + key;
                        $(ErrorID).removeClass('d-none');
                        $(ErrorID).text(value);
                    })
                }
            }
        })
    });
    function hasValue(value){
        $('input[name=ngay_hieu_luc]').val(value)
    }
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
                    <input type="text" class="form-control dia_chi_chi_nhanh" name="dia_chi_chi_nhanh" value=""
                        class="form-text text-danger" placeholder="Nhập địa chỉ">
                        <p class="text-danger Err-dia_chi"></p>
                </div>
                <div class="form-group col-md-4">
                    
                    <label for="" class="form-name">Quận/Huyện <span
                        class="text-danger">(*)</span></label>
                <select onchange ='changQuanHuyen(this)'  class="form-control maqh col-12 select2 devvn_quanhuyen" name="maqh">
                    <option disabled selected>Quận / Huyện</option>
                    @foreach ($quanhuyen as $qh)
                    <option value="{{ $qh->maqh }}" @if (old('maqh')==$qh->maqh )
                        {{ 'selected' }}
                        @endif>{{ $qh->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger Err-quan_huyen"></p>
                </div>
                <div class="form-group col-md-3">
                    
                    <label for="" class="form-name">Xã/ Phường <span
                        class="text-danger">(*)</span></label>
                <select class="form-control col-12 xaid select2 devvn_xaphuongthitran" name="xaid">
                    <option disabled selected>Chọn</option>
                    @foreach ($xaphuong as $xp)
                    <option value="{{ $xp->xaid }}">{{ $xp->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger Err-xa_phuong"></p>
                </div>
                <div class="col-md-1 removediachi">
                    <i onclick='removeDiaChi(this)' class="fa fa-times"></i>
                </div>
            </div>   
        `
        $('.list_dia_chi').append(htmlDiachi)
        $('.select2').select2();
    }
    function removeDiaChi(e) {
        $(e).parents('.dia_diem_dao_tao').remove()
    }
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
{{-- start quang-add-them-giay-phep-nghe --}}
<script>
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
@endsection