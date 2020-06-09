@extends('layouts.admin');

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
                                    class="form-text text-danger" placeholder="Nhập tên cơ sở đào tạo">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ten')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Mã đơn vị <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ma_don_vi" value="{{ old('ma_don_vi') }}"
                                    placeholder="Nhập mã đơn vị">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ma_don_vi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Tên cơ quan chủ quản <span
                                        class="text-danger">(*)</span></label>
                                <div class="d-flex">
                                    <select class="form-control col-10" name="co_quan_chu_quan_id"
                                        id="co_quan_chu_quan_id">
                                        <option selected disabled>Chọn cơ quan chủ quản</option>
                                        @foreach ($coquan as $cq)
                                        <option value="{{$cq->id}}" @if (old('co_quan_chu_quan_id')==$cq->id )
                                            {{ 'selected' }}
                                            @endif>
                                            {{ $cq->ten }}</option>
                                        @endforeach
                                    </select>
                                    <button class="col-2 btn btn-outline-metal" type="button" class="btn btn-danger"
                                        data-toggle="modal" data-target="#m_modal_5">Thêm</button>
                                    {{-- modal --}}
                                    <div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm cơ quan chủ quản
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="form-control-label">Tên
                                                                cơ quan:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="form-control-label">Mã cơ
                                                                quan:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-primary">Thêm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
                                </div>
                                <p id="helpId" class="form-text text-m">
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
                                    <option value="{{ $lh->id }}" @if (old('ma_loai_hinh_co_so')==$lh->id )
                                        {{ 'selected' }}
                                        @endif>{{ $lh->loai_hinh_co_so }}</option>
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
                                <div class="d-flex">
                                    <select class="form-control col-10" name="quyet_dinh_id" id="quyet_dinh_id">
                                        <option selected disabled>Quyết định</option>
                                        @foreach ($qd as $quyetdinh)
                                        <option value="{{ $quyetdinh->id }}" @if (old('quyet_dinh_id')==$quyetdinh->id )
                                            {{ 'selected' }}
                                            @endif>{{ $quyetdinh->ten }}</option>
                                        @endforeach
                                    </select>

                                    <button class="col-2 btn btn-outline-metal" type="button" class="btn btn-danger"
                                        data-toggle="modal" data-target="#m_modal_6">Thêm</button>
                                    {{-- modal --}}
                                    <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm quyết định thành
                                                        lập cơ sở</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="form-control-label">Tên
                                                                quyết định:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="form-control-label">Đường
                                                                dẫn văn bản:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>

                                                        <div class="d-flex">
                                                            <div class="form-group m-form__group col-4">
                                                                <label for="example-date-input"
                                                                    class="col-form-label">Ngày ban hành
                                                                </label>
                                                                <div class="">
                                                                    <input class="form-control m-input" type="date"
                                                                        value="2011-08-19" id="example-date-input">
                                                                </div>
                                                            </div>

                                                            <div class="form-group m-form__group col-4">
                                                                <label for="example-date-input"
                                                                    class="col-form-label">Ngày hiệu lực
                                                                </label>
                                                                <div class="">
                                                                    <input class="form-control m-input" type="date"
                                                                        value="2011-08-19" id="example-date-input">
                                                                </div>
                                                            </div>

                                                            <div class="form-group m-form__group col-4">
                                                                <label for="example-date-input"
                                                                    class="col-form-label">Ngày hết hạn
                                                                </label>
                                                                <div class="">
                                                                    <input class="form-control m-input" type="date"
                                                                        value="2020-01-01" id="example-date-input"
                                                                        placeholder="dd-mm-yyyy">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-12">
                                                            <label class="form-name" for="">Loại quyết định <span
                                                                    class="text-danger">(*)</span></label>
                                                            <select class="form-control" name="loai_truong" id="">
                                                                <option value="1" selected>Thành lập</option>
                                                                <option value="2">Đổi tên</option>
                                                                <option value="3">Giải thể</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <button type="button" class="btn btn-primary">Thêm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            </div>
                        </div>

                        <div class="col-right col-lg-5">
                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Tên quốc tế <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ten_quoc_te"
                                    value="{{ old('ten_quoc_te') }}" placeholder="Nhập tên quốc tế của cơ sở">
                                <p id="helpId" class="form-text text-danger">
                                    @error('ten_quoc_te')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>


                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Điện thoại <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="dien_thoai"
                                    value="{{ old('dien_thoai') }}" placeholder="Số điện thoại cơ sở">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dien_thoai')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Website</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}"
                                    placeholder="Website">
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
                                            <option value="{{ $qh->maqh }}" @if (old('maqh')==$qh->maqh )
                                                {{ 'selected' }}
                                                @endif>{{ $qh->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="" class="form-name">Xã/ Phường <span
                                                class="text-danger">(*)</span></label>
                                        <select class="form-control col-12" name="xaid" id="devvn_xaphuongthitran">
                                            <option disabled selected>Chọn</option>
                                            @foreach ($xaphuong as $xp)
                                            <option value="{{ $xp->xaid }}" @if (old('xaid')==$xp->xaid )
                                                {{ 'selected' }}
                                                @endif>{{ $xp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Địa chỉ <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="dia_chi" value="{{ old('dia_chi') }}"
                                    placeholder="Địa chỉ cơ sở">
                                <p id="helpId" class="form-text text-danger">
                                    @error('dia_chi')
                                    {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-name" for="">Fax</label>
                                <input type="text" class="form-control" name="fax" value="{{ old('fax') }}"
                                    placeholder="Mã Fax">
                                <p id="helpId" class="form-text text-danger">
                                </p>
                            </div>
                        </div>

                        <div class="form-group col-lg-11 p-4">
                            <label for="">Ghi chú</label>
                            <textarea class="form-control" name="ghi_chu" id="" rows="5"
                                placeholder="Nội dung.....">{{ old('ghi_chu') }}</textarea>
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
    $(document).ready(function(){
    $('#devvn_quanhuyen').select2();
    $('#devvn_xaphuongthitran').select2();
    $('#co_quan_chu_quan_id').select2();
    $('#quyet_dinh_id').select2();
    });

    $("#devvn_quanhuyen" ).change(function() {
    axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id:  $("#devvn_quanhuyen").val(),
    })
    .then(function (response) {
        var htmldata = '<option selected  disabled>Xã / Phường</option>'
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
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection