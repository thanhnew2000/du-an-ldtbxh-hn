@extends('layouts.admin')
@section('title', 'Thêm mới cơ sở đào tạo')
@section('style')
<style>
    .removediachi {
        line-height: 90px
    }
</style>

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

                                    <div class="form-group col-lg-12">

                                        <label class="form-name mr-3" for="">Tên cơ sở đào tạo <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="ten" value="{{ old('ten') }}"
                                            class="form-text text-danger" placeholder="Nhập tên cơ sở đào tạo">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Mã đơn vị <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="ma_don_vi"
                                            value="{{ old('ma_don_vi') }}" placeholder="Nhập mã đơn vị">
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
                                    </div>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Người đại diện</legend>
                                        <div class="form-group col-lg-12">
                                            <label class="form-name" for="">Họ và tên <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="ten_nguoi_dai_dien" value=""
                                                placeholder="Người đại diện">
                                            <p id="helpId" class="form-text text-danger">
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
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Hotline <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" name="hotline"
                                            value="{{ old('ma_don_vi') }}" placeholder="Nhập số điện thoại">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label class="form-name" for="">Người phụ trách<span
                                                class="text-danger">(*)</span></label>
                                        <div class="d-flex">
                                            <select class="form-control col-12 select2" name="nguoi_phu_trach"
                                                id="hinh_thuc_so_huu">
                                                <option selected disabled>-----Chọn-----</option>
                                                @foreach ($user as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
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
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_ban_hanh" value=""
                                                    placeholder="Ngày-tháng-năm" class="form-control" onchange="hasValue(this.value)">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_hieu_luc" value="{{old('ngay_hieu_luc')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hết hạn</label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_het_han" value="{{old('ngay_het_han')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
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
                            {{-- <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Địa điểm đào tạo <i onclick="addDiaChi()"
                                        class="fa fa-plus"></i></h3>
                            </div> --}}
                            <div class="main-form list_dia_chi ">

                                <div class="dia_diem_dao_tao row">
                                    <div class="form-group col-md-4">

                                        <label class="form-name mr-3" for="">Địa chỉ <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control dia_chi_chi_nhanh"
                                            name="dia_chi_chi_nhanh" value="" class="form-text text-danger"
                                            placeholder="Nhập địa chỉ">

                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="" class="form-name">Quận/Huyện <span
                                                class="text-danger">(*)</span></label>
                                        <select onchange ='changQuanHuyen(this)' class="form-control col-12 maqh select2 devvn_quanhuyen" name="maqh">
                                            <option disabled selected>Quận / Huyện</option>
                                            @foreach ($quanhuyen as $qh)
                                            <option value="{{ $qh->maqh }}">{{ $qh->name }}</option>
                                            @endforeach
                                        </select>

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
                                                <input type="url" name="account_url" class="form-control m-input"
                                                    placeholder="" value="http://sinortech.vertoffice.com">
                                                <span class="m-form__help">Please enter your preferred URL to your
                                                    dashboard</span>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Username:</label>
                                                <input type="text" name="account_username" class="form-control m-input"
                                                    placeholder="" value="nick.stone">
                                                <span class="m-form__help">Your username to login to your
                                                    dashboard</span>
                                            </div>
                                            <div class="col-lg-6 m-form__group-sub">
                                                <label class="form-control-label">* Password:</label>
                                                <input type="password" name="account_password"
                                                    class="form-control m-input" placeholder="" value="qwerty">
                                                <span class="m-form__help">Please use letters and at least one number
                                                    and symbol</span>
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
                                                        <input type="radio" name="account_group" checked="" value="2">
                                                        Sales Person
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
                                                        <input type="checkbox" name="account_communication[]" checked
                                                            value="email">
                                                        Email
                                                        <span></span>
                                                    </label>
                                                    <label class="m-checkbox m-checkbox--solid  m-checkbox--brand">
                                                        <input type="checkbox" name="account_communication[]"
                                                            value="sms"> SMS
                                                        <span></span>
                                                    </label>
                                                    <label class="m-checkbox m-checkbox--solid  m-checkbox--brand">
                                                        <input type="checkbox" name="account_communication[]"
                                                            value="phone"> Phone
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <span class="m-form__help">Please select user communication
                                                    options</span>
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
                                    <ul class="nav nav-tabs m-tabs-line--2x m-tabs-line m-tabs-line--danger"
                                        role="tablist">
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
                                                        <span
                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
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
                                                        <span
                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
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
                        <div class="m-form__actions">
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
                                    <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="submit">
                                        <span>
                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                            <span>Submit</span>
                                        </span>
                                    </a>
                                    <button class="btn btn-warning m-btn m-btn--custom m-btn--icon"
                                        data-wizard-action="next" id="submit-co-so-ajax">
                                        <span>
                                            <span>Save & Continue</span>&nbsp;&nbsp;
                                            <i class="la la-arrow-right"></i>
                                        </span>
                                    </button>
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

        ChiNhanhObj = {}
        let dia_chi_chi_nhanh = [];

        let chi_nhanh = document.querySelectorAll('.dia_diem_dao_tao');
        for (let i = 0; i < chi_nhanh.length; i++) {
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
        console.log(anh_quyet_dinh)
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
        Data.append('dia_chi_chi_nhanh',JSON.stringify(dia_chi_chi_nhanh));
        Data.append('_token', $('#token').val());
        
        $.ajax({
            type: "Post",
            contentType: false,
            processData: false,
            url: "{{route('mang-luoi.tao-csdt')}}",
            data: Data,
            success: function(response){
                console.log(response.CoSo.id)
            },
            error: function(data){
                var errors = data.responseJSON;
                console.log(errors)
            }
        })
    });

    function hasValue(value){
        $('input[name=ngay_hieu_luc]').val(value)
    }

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
                    <input type="text" class="form-control dia_chi_chi_nhanh" name="dia_chi_chi_nhanh" value=""
                        class="form-text text-danger" placeholder="Nhập địa chỉ">
                    
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
@endsection