@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
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
                        Thêm địa điểm đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <form action="{{ route('chi-nhanh.tao-moi')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="main-form row d-flex justify-content-around">
                        <div class="col-left col-lg-5">
                            <div class="form-group col-lg-12">

                                <label class="form-name mr-3" for="">Tên cơ sở đào tạo</label>
                                <select class="form-control" name="co_so_id">
                                    <option disabled selected>Chọn cơ sở đào tạo</option>
                                    @foreach ($csdt as $cs)
                                    <option value=" {{ $cs->id }}" @if (old('co_so_id')==$cs->id )
                                        {{ 'selected' }}
                                        @endif>{{ $cs->ten }}</option>
                                    @endforeach
                                </select>
                                <p class="form-text text-danger">
                                    @error('co_so_id')
                                    {{ $message }}
                                    @enderror
                                </p>

                            </div>

                            <div class="form-group col-lg-12">
                                <label for="" class="col-4 form-name">Địa Chỉ</label>
                                <input type="text" name="dia_chi" id="" value="{{ old('dia_chi') }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dia_chi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="" class="col-4 form-name">Chi Nhánh</label>
                                <select class="form-control" name="chi_nhanh_chinh">
                                    <option value="1">Chi nhánh chính</option>
                                    <option value="0">Chi nhánh phụ</option>
                                </select>
                                <p id="helpId" class="form-text text-danger">
                                    @error('chi_nhanh_chinh')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            {{-- <div class="form-group col-lg-12">
                    <label for="" class="col-6 form-name">Trạng thái chi nhánh</label>

                    <div class="form-group d-flex justify-content-around">
                        <label class="form-check-label mr-4">
                            <input type="radio" class="form-check-input" name="trang_thai" value="1" checked>
                            Hoạt động
                        </label>

                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="trang_thai" value="0">
                            Không hoạt động
                        </label>
                    </div>
                </div> --}}


                        </div>

                        <div class="col-right col-lg-5">
                            <div class="form-group col-lg-12">
                                <label for="" class="col-6 form-name">Mã chứng nhận hoạt động</label>
                                <input type="text" name="ma_chung_nhan_dang_ki_hoat_dong" id=""
                                    value="{{ old('ma_chung_nhan_dang_ki_hoat_dong') }}" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ma_chung_nhan_dang_ki_hoat_dong')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="" class="col-4 form-name">Trạng thái cấp cấp</label>
                                <select class="form-control" name="da_duoc_cap" id="">
                                    <option value="1" selected>Đã cấp</option>
                                    <option value="0">Chưa cấp</option>
                                </select>
                                <p id="helpId" class="form-text text-danger">
                                    @error('da_duoc_cap')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>





                            <div class="form-group col-lg-12">
                                <label for="" class="col-4 form-name">Hotline</label>
                                <input type="text" name="hotline" id="" value="{{ old('hotline') }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                <p id="helpId" class="form-text text-danger">
                                    @error('hotline')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-5 col-1">Thêm</button>
                            <button type="reset" class="btn btn-danger col-1">Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection