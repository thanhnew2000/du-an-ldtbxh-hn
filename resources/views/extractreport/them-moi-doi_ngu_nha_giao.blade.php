@extends('layouts.admin')
@section('title', "Thêm mới danh sách đội ngũ nhà giáo")
@section('style')
<style type="text/css">
    .error {
        color: red;
    }

</style>
@endsection
@section('content')
<div class="m-content container-fluid">

    <form action="" id="validate-form-add" method="post" class="m-form pt-5">
        {{ csrf_field() }}
        <div class="m-portlet mt-5">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Thêm mới danh sách<small>đội ngũ nhà giáo</small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở</label>
                                <div class="col-lg-8">
                                    <select id="co_so_id" name="co_so_id" class="form-control ">
                                        <option value="-1">-----Chọn cơ sở-----</option>
                                        @foreach ($param['cosodaotao'] as $item)
                                        <option 
                                        {{-- {{ old('co_so_id') == $item->id ? 'selected' : '' }} --}}
                                            value="{{ $item->id }}">{{ $item->ten }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('co_so_id'))
                                    <span class="text-danger">{{ $errors->first('co_so_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Ngành nghề</label>
                                <div class="col-lg-8">
                                    <select id="nganh_nghe" name="nghe_id" class="form-control ">
                                        <option value="-1">-----Chọn ngành nghề-----</option>
                                    </select>
                                    @if ($errors->has('nghe_id'))
                                    <span class="text-danger">{{ $errors->first('nghe_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select name="nam" class="form-control ">
                                        <option value="-1">-----Chọn năm-----</option>

                                        <option {{ old('nam') == $param['nam'] ? 'selected' : '' }}
                                            value="{{ $param['nam'] }}">{{ $param['nam'] }}</option>

                                        <option {{ old('nam') == $param['nam']-1 ? 'selected' : '' }}
                                            value="{{ $param['nam']-1 }}">{{ $param['nam']-1 }}</option>

                                        <option {{ old('nam') == $param['nam']-2 ? 'selected' : '' }}
                                            value="{{ $param['nam']-2 }}">{{ $param['nam']-2 }}</option>

                                    </select>
                                    @if ($errors->has('nam'))
                                    <span class="text-danger">{{ $errors->first('nam') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select name="dot" class="form-control ">
                                        <option value="-1">-----Chọn đợt-----</option>

                                        <option {{ old('dot') == 1 ? 'selected' : '' }} value="1">1</option>

                                        <option {{ old('dot') == 2 ? 'selected' : '' }} value="2">2</option>
                                    </select>
                                    @if ($errors->has('dot'))
                                    <span class="text-danger">{{ $errors->first('dot') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tổng số</label>
                                <div class="col-lg-8">
                                    <input type="number" name="tong_so_can_bo" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('tong_so_can_bo')}}">
                                    @if ($errors->has('tong_so_can_bo'))
                                    <span class="text-danger">{{ $errors->first('tong_so_can_bo') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="m-portlet mt-5">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Cơ hữu
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row col-12">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Biên chế</label>
                                <div class="col-lg-10">
                                    <input type="number" name="bien_che" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('bien_che')}}">
                                    @if ($errors->has('bien_che'))
                                    <span class="text-danger">{{ $errors->first('bien_che') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Hợp đồng ( từ 1 năm chở lên )</label>
                                <div class="col-lg-10">
                                    <input type="number" name="hop_dong_1_nam_tro_len" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('hop_dong_1_nam_tro_len')}}">

                                    @if ($errors->has('hop_dong_1_nam_tro_len'))
                                    <span class="text-danger">{{ $errors->first('hop_dong_1_nam_tro_len') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-5">
            <div class="col-lg-6 ">
                <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="m-menu__link-icon flaticon-web"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Trình độ chuyên môn
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row col-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Tiến sỹ</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="so_tien_sy" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('so_tien_sy')}}">

                                            @if ($errors->has('so_tien_sy'))
                                            <span class="text-danger">{{ $errors->first('so_tien_sy') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Thạc sỹ</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="so_thac_si" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('so_thac_si')}}">

                                            @if ($errors->has('so_thac_si'))
                                            <span class="text-danger">{{ $errors->first('so_thac_si') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Đại học</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="so_dai_hoc" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('so_dai_hoc')}}">

                                            @if ($errors->has('so_dai_hoc'))
                                            <span class="text-danger">{{ $errors->first('so_dai_hoc') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Cao đẳng</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="so_cao_dang" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('so_cao_dang')}}">

                                            @if ($errors->has('so_cao_dang'))
                                            <span class="text-danger">{{ $errors->first('so_cao_dang') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Trung cấp</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="so_trung_cap" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('so_trung_cap')}}">

                                            @if ($errors->has('so_trung_cap'))
                                            <span class="text-danger">{{ $errors->first('so_trung_cap') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Trình độ khác</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="so_khac" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('so_khac')}}">

                                            @if ($errors->has('so_khac'))
                                            <span class="text-danger">{{ $errors->first('so_khac') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="m-portlet m-portlet--mobile m-portlet--body-progress-trinhdo h-100">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="m-menu__link-icon flaticon-web"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Trình độ Ngoại Ngữ
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row col-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Bậc 1</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="bac1" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('bac1')}}">

                                            @if ($errors->has('bac1'))
                                            <span class="text-danger">{{ $errors->first('bac1') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Bậc 2</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="bac2" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('bac2')}}">


                                            @if ($errors->has('bac2'))
                                            <span class="text-danger">{{ $errors->first('bac2') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Bậc 3</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="bac3" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('bac3')}}">


                                            @if ($errors->has('bac3'))
                                            <span class="text-danger">{{ $errors->first('bac3') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Bậc 4</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="bac4" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('bac4')}}">


                                            @if ($errors->has('bac4'))
                                            <span class="text-danger">{{ $errors->first('bac4') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Bậc 5</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="bac5" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('bac5')}}">


                                            @if ($errors->has('bac5'))
                                            <span class="text-danger">{{ $errors->first('bac5') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Bậc 6</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="bac6" class="form-control m-input"
                                                placeholder="Nhập vào số" value="{{old('bac6')}}">


                                            @if ($errors->has('bac6'))
                                            <span class="text-danger">{{ $errors->first('bac6') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet mt-5">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Trình độ tin học
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row col-12">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Cơ bản</label>
                                <div class="col-lg-6">
                                    <input type="number" name="trinh_do_tin_hoc_co_ban" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('trinh_do_tin_hoc_co_ban')}}">

                                    @if ($errors->has('trinh_do_tin_hoc_co_ban'))
                                    <span class="text-danger">{{ $errors->first('trinh_do_tin_hoc_co_ban') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nâng Cao</label>
                                <div class="col-lg-6">
                                    <input type="number" name="trinh_do_tin_hoc_nang_cao" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('trinh_do_tin_hoc_nang_cao')}}">

                                    @if ($errors->has('trinh_do_tin_hoc_nang_cao'))
                                    <span class="text-danger">{{ $errors->first('trinh_do_tin_hoc_nang_cao') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-5">
            <div class="col-lg-6">
                <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="m-menu__link-icon flaticon-web"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Trình độ kỹ thuật nghề
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row col-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-8 col-form-label">Chứng chỉ KNN quốc gia bậc 1 (Tương
                                            đương)</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="chung_chi_KNN_quoc_gia_bac_1"
                                                class="form-control m-input" placeholder="Nhập vào số"
                                                value="{{old('chung_chi_KNN_quoc_gia_bac_1')}}">


                                            @if ($errors->has('chung_chi_KNN_quoc_gia_bac_1'))
                                            <span
                                                class="text-danger">{{ $errors->first('chung_chi_KNN_quoc_gia_bac_1') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-8 col-form-label">Chứng chỉ KNN quốc gia bậc 2 (Tương
                                            đương)</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="chung_chi_KNN_quoc_gia_bac_2"
                                                class="form-control m-input" placeholder="Nhập vào số"
                                                value="{{old('chung_chi_KNN_quoc_gia_bac_2')}}">


                                            @if ($errors->has('chung_chi_KNN_quoc_gia_bac_2'))
                                            <span
                                                class="text-danger">{{ $errors->first('chung_chi_KNN_quoc_gia_bac_2') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-8 col-form-label">Chứng chỉ KNN quốc gia bậc 3 (Tương
                                            đương)</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="chung_chi_KNN_quoc_gia_bac_3"
                                                class="form-control m-input" placeholder="Nhập vào số"
                                                value="{{old('chung_chi_KNN_quoc_gia_bac_3')}}">

                                            @if ($errors->has('chung_chi_KNN_quoc_gia_bac_3'))
                                            <span
                                                class="text-danger">{{ $errors->first('chung_chi_KNN_quoc_gia_bac_3') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="m-menu__link-icon flaticon-web"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Trình độ nghiệp vụ sư phạm
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row col-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-8 col-form-label">Chứng chỉ sư phạm dạy trình độ Cao
                                            Đẳng</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="chung_chi_su_pham_day_trinh_do_CD"
                                                class="form-control m-input" placeholder="Nhập vào số"
                                                value="{{old('chung_chi_su_pham_day_trinh_do_CD')}}">

                                            @if ($errors->has('chung_chi_su_pham_day_trinh_do_CD'))
                                            <span
                                                class="text-danger">{{ $errors->first('chung_chi_su_pham_day_trinh_do_CD') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-8 col-form-label">Chứng chỉ sư phạm dạy trình độ Trung
                                            Cấp</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="chung_chi_su_pham_day_trinh_do_TC"
                                                class="form-control m-input" placeholder="Nhập vào số"
                                                value="{{old('chung_chi_su_pham_day_trinh_do_TC')}}">

                                            @if ($errors->has('chung_chi_su_pham_day_trinh_do_TC'))
                                            <span
                                                class="text-danger">{{ $errors->first('chung_chi_su_pham_day_trinh_do_TC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-8 col-form-label">Chứng chỉ sư phạm dạy trình độ Sơ
                                            Cấp</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="chung_chi_su_pham_day_trinh_do_SC"
                                                class="form-control m-input" placeholder="Nhập vào số"
                                                value="{{old('chung_chi_su_pham_day_trinh_do_SC')}}">

                                            @if ($errors->has('chung_chi_su_pham_day_trinh_do_SC'))
                                            <span
                                                class="text-danger">{{ $errors->first('chung_chi_su_pham_day_trinh_do_SC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet mt-5">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Trong đó
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row col-12">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nữ</label>
                                <div class="col-lg-6">
                                    <input type="number" name="so_luong_nu" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('so_luong_nu')}}">

                                    @if ($errors->has('so_luong_nu'))
                                    <span class="text-danger">{{ $errors->first('so_luong_nu') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Dân tộc ít người</label>
                                <div class="col-lg-6">
                                    <input type="number" name="dan_toc_it_nguoi" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('dan_toc_it_nguoi')}}">

                                    @if ($errors->has('dan_toc_it_nguoi'))
                                    <span class="text-danger">{{ $errors->first('dan_toc_it_nguoi') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Giáo sư</label>
                                <div class="col-lg-6">
                                    <input type="number" name="giao_su" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('giao_su')}}">

                                    @if ($errors->has('giao_su'))
                                    <span class="text-danger">{{ $errors->first('giao_su') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Phó giáo sư</label>
                                <div class="col-lg-6">
                                    <input type="number" name="pho_giao_su" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('pho_giao_su')}}">

                                    @if ($errors->has('pho_giao_su'))
                                    <span class="text-danger">{{ $errors->first('pho_giao_su') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nhà giáo nhân dân , nghệ sĩ nhân dân , nghệ nhân
                                    nhân dân , thầy thuốc nhân dân </label>
                                <div class="col-lg-6">
                                    <input type="number" name="NGND_NSND_NNND_TTND" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('NGND_NSND_NNND_TTND')}}">

                                    @if ($errors->has('NGND_NSND_NNND_TTND'))
                                    <span class="text-danger">{{ $errors->first('NGND_NSND_NNND_TTND') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nhà giáo ưu tú , nghệ sĩ ưu tú , nghệ nhân ưu tú
                                    , thầy thuốc ưu tú</label>
                                <div class="col-lg-6">
                                    <input type="number" name="NGUT_NSUT_NNUT_TTUT" class="form-control m-input"
                                        placeholder="Nhập vào số" value="{{old('NGUT_NSUT_NNUT_TTUT')}}">

                                    @if ($errors->has('NGUT_NSUT_NNUT_TTUT'))
                                    <span class="text-danger">{{ $errors->first('NGUT_NSUT_NNUT_TTUT') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nhà giáo giảng dạy môn học chung</label>
                                <div class="col-lg-6">
                                    <input type="number" name="nha_giao_giang_day_mon_hoc_chung"
                                        class="form-control m-input" placeholder="Nhập vào số"
                                        value="{{old('nha_giao_giang_day_mon_hoc_chung')}}">

                                    @if ($errors->has('nha_giao_giang_day_mon_hoc_chung'))
                                    <span
                                        class="text-danger">{{ $errors->first('nha_giao_giang_day_mon_hoc_chung') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="m-portlet mt-5">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Trình độ chuyên môn
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="row col-12">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Số nhà giáo tham gia đào tạo , bồi dưỡng trong
                                    năm</label>
                                <div class="col-lg-6">
                                    <input type="number" name="so_nha_giao_tham_gia_dao_tao"
                                        class="form-control m-input" placeholder="Nhập vào số"
                                        value="{{old('so_nha_giao_tham_gia_dao_tao')}}">
                                    @if ($errors->has('so_nha_giao_tham_gia_dao_tao'))
                                    <span
                                        class="text-danger">{{ $errors->first('so_nha_giao_tham_gia_dao_tao') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-end">
            <div class="col-lg-1 ">
                <a href="{{ route('xuatbc.ds-nha-giao') }}" class="btn btn-danger">Hủy</a>
         
            </div>
            <div class="col-lg-1 ">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
    </form>
    <a href="http://"></a>

</div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#co_so_id").change(function () {
            var op = $("select option:selected").val();
            axios
                .get("/xuat-bao-cao/doi-ngu-nha-giao/nganhnghe/" + op)
                .then(function (response) {
                    var htmldata = '<option value="-1">-----Chọn ngành nghề-----</option>';
                    response.data.forEach((element) => {
                        htmldata +=
                            `<option value="${element.id}" >${element.id} --- ${element.ten_nganh_nghe}</option>`;
                    });
                    $("#nganh_nghe").html(htmldata);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

    });

</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

@if (session('kq'))
<script>
  Swal.fire({
  title: 'Dữ liệu đã tồn tại',
  icon: 'warning',
  text: 'Bạn có thể chuyển tới Chỉnh sửa! ',
  confirmButtonText: 'OK',
  cancelButtonText: '<a href="{{route('xuatbc.sua-ds-nha-giao',['id'=>session('kq')])}}">Edit</a>',
  cancelButtonColor: '#d33',
  showCancelButton: true,
  showCloseButton: true
})
</script>
@endif

<script type="text/javascript">
    $(document).ready(function () {
        const listField = [
            'tong_so_can_bo',
            'bien_che',
            'hop_dong_1_nam_tro_len',
            'so_tien_sy',
            'so_thac_si',
            'so_dai_hoc',
            'so_cao_dang',
            'so_trung_cap',
            'so_khac',
            'bac1',
            'bac2',
            'bac3',
            'bac4',
            'bac5',
            'bac6',
            'chung_chi_KNN_quoc_gia_bac_1',
            'chung_chi_KNN_quoc_gia_bac_2',
            'chung_chi_KNN_quoc_gia_bac_3',
            'chung_chi_su_pham_day_trinh_do_CD',
            'chung_chi_su_pham_day_trinh_do_TC',
            'chung_chi_su_pham_day_trinh_do_SC',
            'so_luong_nu',
            'dan_toc_it_nguoi',
            'giao_su',
            'pho_giao_su',
            'NGND_NSND_NNND_TTND',
            'NGUT_NSUT_NNUT_TTUT',
            'nha_giao_giang_day_mon_hoc_chung',
            'so_nha_giao_tham_gia_dao_tao',
            'trinh_do_tin_hoc_co_ban',
            'trinh_do_tin_hoc_nang_cao'
        ];
        const rule = {
            required: true,
            number: true,
            digits: true
        };

        let rules = {
            co_so_id: {
                min: 0
            },
            nghe_id: {
                min: 0
            },
            nam: {
                min: 0
            },
            dot: {
                min: 0
            }
        };
        listField.forEach(function (value) {
            rules[value] = rule;
        });

        const mess = {
            required: "Vui lòng nhập số liệu",
            number: "Vui lòng nhập liệu hợp lệ",
            digits: "Số liệu nhỏ nhất là 0"
        };

        let messages = {
            co_so_id: {
                min: "Vui lòng chọn cơ sở"
            },
            nghe_id: {
                min: "Vui lòng chọn ngành nghề"
            },
            nam: {
                min: "Vui lòng chọn năm"
            },
            dot: {
                min: "Vui lòng chọn đợt"
            }
        };
        listField.forEach(function (value) {
            messages[value] = mess;
        });
        $("#validate-form-add").validate({
            rules: rules,
            messages: messages

        });



    });

</script>
@endsection
