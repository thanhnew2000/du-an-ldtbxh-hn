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
        @forelse ($data as $item)
        <form action="{{ route('saveEdit', ['id'=> $item->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Tên cơ sở đào tạo <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="ten_coso" value="{{ $item->csdt_ten }}">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Quyết định <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="quyet_dinh" value="{{ $item->qd_ten}}">
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
                    <label for="" class="form-name">Logo <span class="text-danger">(*)</span></label>
                    <div class="custom-file col-8">
                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>

                {{-- <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Trạng thái <span class="text-danger">(*)</span></label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="status" id="" checked
                                value="checkedValue">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="status" id="" value="checkedValue">
                            Deactive
                        </label>
                    </div>
                </div> --}}
            </div>

            <div class="row d-flex justify-content-start">
                <div class="form-group d-flex justify-content-center align-items-center col-5">
                    <img src="{{ $item->logo }}" class="col-5" alt="">
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