@extends('layouts.admin')
@section('content')
<div class="m-content">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Tạo mới danh sách đội ngũ cán bộ quản lý
                    </h3>
                </div>
            </div>
        </div>
        <div class="content p-5" style="background-color: #FFFFFF ; ">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('so-lieu-can-bo-quan-ly.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="co_so_dao_tao_id" class="col-4">
                            Tên cơ sở đào tạo
                            <span class="required">*</span>
                        </label>
                        <select
                            name="co_so_dao_tao_id"
                            id="co_so_dao_tao_id"
                            class="form-control col-8 select2">
                            @foreach ($listCoSo as $coSo)
                            <option
                                value="{{ $coSo->id }}"
                                {{ old('co_so_dao_tao_id') == $coSo->id ? 'selected' : ''}}
                                >
                                {{ $coSo->ten }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="loai_hinh_dao_tao_id" class="col-4">
                            Loại hình đào tạo
                            <span class="required">*</span>
                        </label>
                        <select
                            name="loai_hinh_co_so_id"
                            id="loai_hinh_co_so_id"
                            class="form-control col-8 select2">
                            @foreach ($listLoaiHinh as $loaiHinh)
                            <option
                                value="{{ $loaiHinh->id }}"
                                {{ old('loai_hinh_co_so_id') == $loaiHinh->id ? 'selected' : ''}}
                                >
                                {{ $loaiHinh->loai_hinh_co_so }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="nam" class="col-4">
                            Năm
                            <span class="required">*</span>
                        </label>
                        <select
                            name="nam"
                            id="nam"
                            class="form-control col-8 select2">
                            @foreach ($listNam as $key => $value)
                            <option
                                value="{{ $key }}"
                                {{ old('nam') == $key ? 'selected' : ''}}
                                >
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="dot" class="col-4">
                            Đợt
                            <span class="required">*</span>
                        </label>
                        <select
                            name="dot"
                            id="dot"
                            class="form-control col-8 select2">
                            @foreach ($listDot as $key => $value)
                            <option
                                value="{{ $key }}"
                                {{ old('dot') == $key ? 'selected' : ''}}
                                >
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="tong_so_quan_ly" class="col-4">
                            Tổng số cán bộ
                            <span class="required">*</span>
                        </label>
                        <input
                            type="number"
                            name="tong_so_quan_ly"
                            id="tong_so_quan_ly"
                            class="form-control col-8"
                            value="{{ old('tong_so_quan_ly') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_cb_quan_ly_nu" class="col-4">
                            Số cán bộ nữ
                        </label>
                        <input
                            type="number"
                            name="so_cb_quan_ly_nu"
                            id="so_cb_quan_ly_nu"
                            class="form-control col-8"
                            value="{{ old('so_cb_quan_ly_nu') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_cb_giang_day" class="col-4">
                            Số cán bộ tham gia giảng dạy
                        </label>
                        <input
                            type="number"
                            name="so_cb_giang_day"
                            id="so_cb_giang_day"
                            class="form-control col-8"
                            value="{{ old('so_cb_giang_day') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_cb_da_boi_duong" class="col-4">
                            Số cán bộ đã qua bồi dưỡng
                        </label>
                        <input
                            type="number"
                            name="so_cb_da_boi_duong"
                            id="so_cb_da_boi_duong"
                            class="form-control col-8"
                            value="{{ old('so_cb_da_boi_duong') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_danh_hieu" class="col-4">
                            Số danh hiệu <br>nhà giáo nhân dân/ưu tú
                        </label>
                        <input
                            type="number"
                            name="so_danh_hieu"
                            id="so_danh_hieu"
                            class="form-control col-8"
                            value="{{ old('so_danh_hieu') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_hieu_truong" class="col-4">
                            Số hiệu trưởng
                        </label>
                        <input
                            type="number"
                            name="so_hieu_truong"
                            id="so_hieu_truong"
                            class="form-control col-8"
                            value="{{ old('so_hieu_truong') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_hieu_pho" class="col-4">
                            Số hiệu phó
                        </label>
                        <input
                            type="number"
                            name="so_hieu_pho"
                            id="so_hieu_pho"
                            class="form-control col-8"
                            value="{{ old('so_hieu_pho') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_truong_khoa" class="col-4">
                            Số trưởng khoa/phòng
                        </label>
                        <input
                            type="number"
                            name="so_truong_khoa"
                            id="so_truong_khoa"
                            class="form-control col-8"
                            value="{{ old('so_truong_khoa') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_to_truong" class="col-4">
                            Số tổ trưởng
                        </label>
                        <input
                            type="number"
                            name="so_to_truong"
                            id="so_to_truong"
                            class="form-control col-8"
                            value="{{ old('so_to_truong') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_trinh_do_tien_sy" class="col-4">
                            Số Tiến sỹ
                        </label>
                        <input
                            type="number"
                            name="so_trinh_do_tien_sy"
                            id="so_trinh_do_tien_sy"
                            class="form-control col-8"
                            value="{{ old('so_trinh_do_tien_sy') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_trinh_do_thac_sy" class="col-4">
                            Số Thạc sỹ
                        </label>
                        <input
                            type="number"
                            name="so_trinh_do_thac_sy"
                            id="so_trinh_do_thac_sy"
                            class="form-control col-8"
                            value="{{ old('so_trinh_do_thac_sy') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_trinh_do_cao_dang" class="col-4">
                            Số Cao đẳng
                        </label>
                        <input
                            type="number"
                            name="so_trinh_do_cao_dang"
                            id="so_trinh_do_cao_dang"
                            class="form-control col-8"
                            value="{{ old('so_trinh_do_cao_dang') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_trinh_do_trung_cap" class="col-4">
                            Số Trung cấp
                        </label>
                        <input
                            type="number"
                            name="so_trinh_do_trung_cap"
                            id="so_trinh_do_trung_cap"
                            class="form-control col-8"
                            value="{{ old('so_trinh_do_trung_cap') }}">
                    </div>
                    <div class="col-6 d-flex align-items-center mt-3">
                        <label for="so_trinh_do_khac" class="col-4">
                            Số Trình độ khác
                        </label>
                        <input
                            type="number"
                            name="so_trinh_do_khac"
                            id="so_trinh_do_khac"
                            class="form-control col-8"
                            value="{{ old('so_trinh_do_khac') }}">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 col-12">
                    <button type="reset" class="col-2 btn btn-danger mr-5">Hủy</button>
                    <button type="submit" class="col-2 btn btn-primary ">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('title', "Tạo mới danh sách đội ngũ cán bộ quản lý")

@section('style')
<style>
    .required {
        color: red;
    }
</style>
@endsection

@section('script')
<script>
    $(".select2").select2();
</script>
@endsection
