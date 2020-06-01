@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <div class="remote-title mb-4 container">
        Sửa thông tin cơ sở đào tạo
    </div>

    <section class="add-csdt-area container p-5">
        <p>{{$mess ?? ''}}</p>
        @forelse ($data as $item)
        <form action="{{ route('saveEditCsdt', ['id'=> $item->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Tên cơ sở đào tạo <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ten" value="{{ $item->csdt_ten }}">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Quyết định <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="quyet_dinh_id" id="">
                        <option disabled selected {{ $item->quyet_dinh_id }}>{{ $item->qd_ten }}</option>
                        @foreach ($qd as $quyetdinh)
                        <option value="{{ $quyetdinh->id }}">{{ $quyetdinh->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Mã đơn vị <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ma_don_vi" value="{{ $item->ma_don_vi }}">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="dien_thoai" value="{{ $item->dien_thoai }}">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Cơ quan chủ quản <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="coquan_chuquan" id="">
                        <option selected disabled>{{ $item->cq_ten }}</option>
                        @foreach ($parent as $chuquan)
                        <option value="{{ $chuquan->id }}">{{ $chuquan->ten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Website</label>
                    <input type="text" class="form-control col-8" name="website" value="{{ $item->website }}">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Loại hình cơ sở <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="loaihinh_coso" id="">
                        <option selected disabled>{{ $item->loai_hinh_co_so }}</option>
                        @foreach ($loai_coso as $type)
                        <option value="{{ $type->id }}">{{ $type->loai_hinh_co_so }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Địa chỉ <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="dia_chi" value="{{ $item->dia_chi }}">
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Tên quốc tế <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ten_quoc_te" value="{{ $item->ten_quoc_te }}">
                </div>


                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Fax</label>
                    <input type="text" class="form-control col-8" name="Fax" value="{{ $item->fax }}">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Logo <span class="text-danger">(*)</span></label>
                    <div class="custom-file col-8">
                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>

                <div class="form-group d-flex justify-content-end align-items-center col-5">
                    <img src="{{ $item->logo }}" class="col-8" alt="">
                </div>


            </div>

            <div class="row">
                <div class="form-group col-lg-12">
                    <label for="" class="form-name col-1">Ghi chú</label>
                    <textarea class="form-control text-left col-12" name="ghi_chu" placeholder="Nội dung..." rows="4">
                        {{ $item->ghi_chu }}
                    </textarea>
                </div>
            </div>
            @empty

            @endforelse


            <div class="btn-action d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary mr-5 col-1">Lưu</button>
                <button type="reset" class="btn btn-danger col-1">Hủy</button>
            </div>
        </form>
    </section>
</div>
@endsection