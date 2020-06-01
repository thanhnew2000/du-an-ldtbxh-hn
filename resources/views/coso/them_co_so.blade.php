@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <div class="remote-title mb-4 container">
        Thêm mới cơ sở đào tạo
    </div>

    <form action="{{ route('saveAddCsdt')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="main-form row d-flex justify-content-around">
            <div class="col-left col-lg-5">
                <div class="form-group col-lg-12">

                    <label class="form-name mr-3" for="">Tên cơ sở đào tạo</label>
                    <input type="text" class="form-control" name="ten">
                    <p class="form-text text-danger">
                        @error('ten')
                        {{ $message }}
                        @enderror
                    </p>

                </div>

                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Mã đơn vị</label>
                    <input type="text" class="form-control" name="ma_don_vi" id="" aria-describedby="helpId"
                        placeholder="">
                    <p id="helpId" class="form-text text-danger">
                        @error('ma_don_vi')
                        {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Tên cơ quan chủ quản</label>
                    <select class="form-control" name="co_quan_chu_quan_id" id="">
                        <option disabled selected>Chọn cơ quan chủ quản</option>
                        @foreach ($coquan as $cq)
                        <option value="{{ $cq->id }}">{{ $cq->ten }}</option>
                        @endforeach
                    </select>
                    <p id="helpId" class="form-text text-danger">
                        @error('co_quan_chu_quan_id')
                        {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Loại hình cơ sở</label>
                    <select class="form-control" name="ma_loai_hinh_co_so" id="">
                        <option selected disabled>Chọn loại hình cơ sở</option>
                        @foreach ($loaihinh as $lh)
                        <option value="{{ $lh->id }}">{{ $lh->loai_hinh_co_so }}</option>
                        @endforeach
                    </select>
                    <p id="helpId" class="form-text text-danger">
                        @error('ma_loai_hinh_co_so')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Quyết định</label>
                    <select class="form-control" name="quyet_dinh_id" id="">
                        <option selected disabled>Quyết định</option>
                        @foreach ($qd as $quyetdinh)
                        <option value="{{ $quyetdinh->id }}">{{ $quyetdinh->ten }}</option>
                        @endforeach
                    </select>
                    <p id="helpId" class="form-text text-danger">
                        @error('quyet_dinh_id')
                        {{ $message }}
                        @enderror
                    </p>
                </div>



                <div class="form-group col-lg-12">
                    <label for="" class="form-name">Logo</label>
                    <div class="custom-file form-control">
                        <input type="file" class="custom-file-input" id="customFile" name="img">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <p id="helpId" class="form-text text-danger">
                        @error('logo')
                        {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="col-right col-lg-5">
                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Tên quốc tế</label>
                    <input type="text" class="form-control" name="ten_quoc_te">
                    <p id="helpId" class="form-text text-danger">
                        @error('ten_quoc_te')
                        {{ $message }}
                        @enderror
                    </p>
                </div>


                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Điện thoại</label>
                    <input type="text" class="form-control" name="dien_thoai" id="" aria-describedby="helpId"
                        placeholder="">
                    <p id="helpId" class="form-text text-danger">
                        @error('dien_thoai')
                        {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Website</label>
                    <input type="text" class="form-control" name="website" id="" aria-describedby="helpId"
                        placeholder="">
                    <p id="helpId" class="form-text text-danger">
                        @error('website')
                        {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" id="" aria-describedby="helpId"
                        placeholder="">
                    <p id="helpId" class="form-text text-danger">
                        @error('dia_chi')
                        {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group col-lg-12">
                    <label class="form-name" for="">Fax</label>
                    <input type="text" class="form-control" name="fax" id="" aria-describedby="helpId" placeholder="">
                    <p id="helpId" class="form-text text-danger">
                    </p>
                </div>
            </div>

            <div class="form-group col-lg-11 p-4">
                <label for="">Ghi chú</label>
                <textarea class="form-control" name="ghi_chu" id="" rows="3"></textarea>
            </div>

            <div class="col-lg-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mr-5 col-1">Thêm</button>
                <button type="reset" class="btn btn-danger col-1">Hủy</button>
            </div>
        </div>
    </form>
</div>
@endsection