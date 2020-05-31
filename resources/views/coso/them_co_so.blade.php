@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <div class="remote-title mb-4 container">
        Thêm mới cơ sở đào tạo
    </div>

    <div class="add-csdt-area container p-5">
        <form action="">
            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Tên cơ sở đào tạo <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ten" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Quyết định <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="quyet_dinh_id" id="">
                        <option disabled selected>Quyết định</option>
                        @foreach ($qd as $item)
                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Mã đơn vị <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ma_don_vi" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="dien_thoai" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Cơ quan chủ quản <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="co_quan_chu_quan_id" id="">
                        <option disabled selected>Chọn cơ quan chủ quản</option>
                        @foreach ($coquan as $cq)
                        <option value="{{ $cq->id }}">{{ $cq->ten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Website</label>
                    <input type="text" class="form-control col-8" name="website" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Loại hình cơ sở <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="ma_loai_hinh_co_so" id="">
                        <option selected disabled>Chọn loại hình cơ sở</option>
                        @foreach ($loaihinh as $lh)
                        <option value="{{ $lh->id }}">{{ $lh->loai_hinh_co_so }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Địa chỉ <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="dia_chi" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Tên quốc tế <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ten_quoc_te" id="" aria-describedby="helpId"
                        placeholder="">
                </div>


                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Fax</label>
                    <input type="text" class="form-control col-8" name="Fax" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-lg-12">
                    <label for="" class="form-name col-lg-2">Logo <span class="text-danger">(*)</span></label>
                    <div class="custom-file col-lg-12">
                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12">
                    <label for="" class="form-name col-1">Ghi chú</label>
                    <textarea class="form-control col-12" name="ghi_chu" placeholder="Nội dung..." rows="4"></textarea>
                </div>
            </div>

            <div class="btn-action d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary mr-5 col-1">Thêm</button>
                <button type="reset" class="btn btn-danger col-1">Hủy</button>
            </div>
        </form>
    </div>
</div>
@endsection