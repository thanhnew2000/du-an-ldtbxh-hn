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
                        Thêm mới cơ sở đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <form action="{{ route('csdt.tao-moi')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="main-form row d-flex justify-content-around">
                        <div class="col-left col-lg-5">
                            <div class="form-group col-lg-12">

                                <label class="form-name mr-3" for="">Tên cơ sở đào tạo <span
                                        class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ten" value="{{ old('ten') }}"
                                    class="form-text text-danger">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ten')
                                    {{ $message }}
                                    @enderror
                                </p>

                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Mã đơn vị <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ma_don_vi" value="{{ old('ma_don_vi') }}">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ma_don_vi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Tên cơ quan chủ quản <span
                                        class="text-danger">(*)</span></label>
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
                                <label class="form-name" for="">Loại hình cơ sở <span
                                        class="text-danger">(*)</span></label>
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
                                <label class="form-name" for="">Quyết định <span class="text-danger">(*)</span></label>
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
                                <label for="" class="form-name">Logo <span class="text-danger">(*)</span></label>
                                <div class="custom-file form-control">
                                    <input type="file" class="custom-file-input" value="{{ old('upload_logo') }}"
                                        id="customFile" name="upload_logo">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <p id="helpId" class="form-text text-danger">
                                    @error('logo')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Hệ đào tạo <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="loai_truong" id="">
                                    <option value="1" selected>Cao Đẳng</option>
                                    <option value="2">Trung Cấp</option>
                                    <option value="3">Sơ cấp</option>
                                </select>
                                <p id="helpId" class="form-text text-danger">
                                    @error('ma_don_vi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>

                        <div class="col-right col-lg-5">
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Tên quốc tế <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ten_quoc_te"
                                    value="{{ old('ten_quoc_te') }}">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ten_quoc_te')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>


                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Điện thoại <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="dien_thoai"
                                    value="{{ old('dien_thoai') }}">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dien_thoai')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Website</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}">
                                <p id="helpId" class="form-text text-danger">
                                    @error('website')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <div class="form-group d-flex">
                                    <div class="mr-5">
                                        <label for="" class="form-name">Quận/Huyện <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12" name="maqh" id="devvn_quanhuyen">
                                            <option disabled selected>Quận / Huyện</option>
                                            @foreach ($quanhuyen as $qh)
                                            <option value="{{ $qh->maqh }}">{{ $qh->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="" class="form-name">Xã/ Phường <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12" name="xaid" id="devvn_xaphuongthitran">
                                            <option disabled selected>Chọn</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Địa chỉ <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="dia_chi" value="{{ old('dia_chi') }}">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dia_chi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Fax</label>
                                <input type="text" class="form-control" name="fax" value="{{ old('fax') }}">
                                <p id="helpId" class="form-text text-danger">
                                </p>
                            </div>
                        </div>

                        <div class="form-group col-lg-11 p-4">
                            <label for="">Ghi chú</label>
                            <textarea class="form-control" name="ghi_chu" id="" rows="5">{{ old('ghi_chu') }}</textarea>
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

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $("#devvn_quanhuyen" ).change(function() {
    axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id:  $("#devvn_quanhuyen").val(),
    })
    .then(function (response) {
        var htmldata = '<option value="" selected  >Xã / Phường</option>'
            response.data.forEach(element => {
            htmldata+=`<option value="${element.xaid}" >${element.name}</option>`   
        });
        $('#devvn_xaphuongthitran').html(htmldata);
    })
    .catch(function (error) {
        console.log(error);
    });
});
</script>
@endsection