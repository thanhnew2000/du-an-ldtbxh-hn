@extends('layouts.admin')
@section('title', "Chinh sửa kết quả xây dựng chương trình , giáo trình")
@section('style')
<style type="text/css">
    .error {
        color: red;
    }
</style>
@endsection
@section('content')
<div class="m-content container-fluid">
    <form action="{{ route('xuatbc.update-ds-xd-giao-trinh',['id' => 1]) }}" method="post" id="validate-form-update">
        @csrf
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="m-menu__link-icon flaticon-web"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Sửa<small>tổng hợp kết quả xây dựng chương trình , giáo trình</small>
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
                                <div class="col-lg-10">
                                    <select name="" class="form-control " disabled>
                                        @foreach ($params['co_so_dao_tao'] as $item)
                                        <option {{ $data->co_so_id == $item->id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên nghề</label>
                                <div class="col-lg-10">
                                    <select name="" class="form-control " disabled>
                                        <option>{{ $params['ten_nghe']}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-10">
                                    <select name="" class="form-control " disabled>
                                        <option>{{ $data->nam }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-10">
                                    <select name="" class="form-control " disabled>
                                        <option>{{ $data->dot }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="m-menu__link-icon flaticon-web"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Xây dựng
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row col-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Tổng số xây dựng chương chình</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="tong_so_XD_chuong_trinh_moi"
                                                value="{{ old('tong_so_XD_chuong_trinh_moi') }}">

                                            @if ($errors->has('tong_so_XD_chuong_trinh_moi'))
                                            <span
                                                class="text-danger">{{ $errors->first('tong_so_XD_chuong_trinh_moi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng xây dựng chương chình CĐ</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="XD_chuong_trinh_moi_CD"
                                                value="{{ old('XD_chuong_trinh_moi_CD') }}">

                                            @if ($errors->has('XD_chuong_trinh_moi_CD'))
                                            <span
                                                class="text-danger">{{ $errors->first('XD_chuong_trinh_moi_CD') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng xây dựng chương chình CT</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="XD_chuong_trinh_moi_TC"
                                                value="{{ old('XD_chuong_trinh_moi_TC') }}">

                                            @if ($errors->has('XD_chuong_trinh_moi_TC'))
                                            <span
                                                class="text-danger">{{ $errors->first('XD_chuong_trinh_moi_TC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng xây dựng chương chình SC</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="XD_chuong_trinh_moi_SC"
                                                value="{{ old('XD_chuong_trinh_moi_SC') }}">

                                            @if ($errors->has('XD_chuong_trinh_moi_SC'))
                                            <span
                                                class="text-danger">{{ $errors->first('XD_chuong_trinh_moi_SC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Tổng số xây dựng giáo trình</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="tong_so_XD_giao_trinh_moi"
                                                value="{{ old('tong_so_XD_giao_trinh_moi') }}">

                                            @if ($errors->has('tong_so_XD_giao_trinh_moi'))
                                            <span
                                                class="text-danger">{{ $errors->first('tong_so_XD_giao_trinh_moi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng xây dựng giáo trình CĐ</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="XD_giao_trinh_moi_CD"
                                                value="{{ old('XD_giao_trinh_moi_CD') }}">

                                            @if ($errors->has('XD_giao_trinh_moi_CD'))
                                            <span
                                                class="text-danger">{{ $errors->first('XD_giao_trinh_moi_CD') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng xây dựng giáo trình TC</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="XD_giao_trinh_moi_TC"
                                                value="{{ old('XD_giao_trinh_moi_TC') }}">

                                            @if ($errors->has('XD_giao_trinh_moi_TC'))
                                            <span
                                                class="text-danger">{{ $errors->first('XD_giao_trinh_moi_TC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng xây dựng giáo trình SC</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="XD_giao_trinh_moi_SC"
                                                value="{{ old('XD_giao_trinh_moi_SC') }}">

                                            @if ($errors->has('XD_giao_trinh_moi_SC'))
                                            <span
                                                class="text-danger">{{ $errors->first('XD_giao_trinh_moi_SC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Kinh phí thực hiện xây dựng</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="kinh_phi_thuc_hien_xd_moi"
                                                value="{{ old('kinh_phi_thuc_hien_xd_moi') }}">

                                            @if ($errors->has('kinh_phi_thuc_hien_xd_moi'))
                                            <span
                                                class="text-danger">{{ $errors->first('kinh_phi_thuc_hien_xd_moi') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="m-portlet m-portlet--mobile m-portlet--body-progress- h-100">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="m-menu__link-icon flaticon-web"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Chỉnh sửa
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row col-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Tổng số sửa chương trình</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="tong_so_chuong_trinh_chinh_sua"
                                                value="{{ old('tong_so_chuong_trinh_chinh_sua') }}">

                                            @if ($errors->has('tong_so_chuong_trinh_chinh_sua'))
                                            <span
                                                class="text-danger">{{ $errors->first('tong_so_chuong_trinh_chinh_sua') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng sửa chương chình CĐ</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="sua_chuong_trinh_CD"
                                                value="{{ old('sua_chuong_trinh_CD') }}">

                                            @if ($errors->has('sua_chuong_trinh_CD'))
                                            <span class="text-danger">{{ $errors->first('sua_chuong_trinh_CD') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng sửa chương chình CT</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="sua_chuong_trinh_TC"
                                                value="{{ old('sua_chuong_trinh_TC') }}">

                                            @if ($errors->has('sua_chuong_trinh_TC'))
                                            <span class="text-danger">{{ $errors->first('sua_chuong_trinh_TC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng sửa chương chình SC</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="sua_chuong_trinh_SC"
                                                value="{{ old('sua_chuong_trinh_SC') }}">

                                            @if ($errors->has('sua_chuong_trinh_SC'))
                                            <span class="text-danger">{{ $errors->first('sua_chuong_trinh_SC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Tổng số sửa giáo trình</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="tong_so_giao_trinh_chinh_sua"
                                                value="{{ old('tong_so_giao_trinh_chinh_sua') }}">

                                            @if ($errors->has('tong_so_giao_trinh_chinh_sua'))
                                            <span
                                                class="text-danger">{{ $errors->first('tong_so_giao_trinh_chinh_sua') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng sửa giáo trình CĐ</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="sua_giao_trinh_CD"
                                                value="{{ old('sua_giao_trinh_CD') }}">

                                            @if ($errors->has('sua_giao_trinh_CD'))
                                            <span class="text-danger">{{ $errors->first('sua_giao_trinh_CD') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng sửa giáo trình TC</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="sua_giao_trinh_TC"
                                                value="{{ old('sua_giao_trinh_TC') }}">

                                            @if ($errors->has('sua_giao_trinh_TC'))
                                            <span class="text-danger">{{ $errors->first('sua_giao_trinh_TC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Số lượng sửa giáo trình SC</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="sua_giao_trinh_SC"
                                                value="{{ old('sua_giao_trinh_SC') }}">

                                            @if ($errors->has('sua_giao_trinh_SC'))
                                            <span class="text-danger">{{ $errors->first('sua_giao_trinh_SC') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-7 col-form-label">Kinh phí thực hiện sửa</label>
                                        <div class="col-lg-5">
                                            <input type="number" min="0" class="form-control m-input"
                                                placeholder="Nhập vào số" name="kinh_phi_thuc_hien_chinh_sua"
                                                value="{{ old('kinh_phi_thuc_hien_chinh_sua') }}">

                                            @if ($errors->has('kinh_phi_thuc_hien_chinh_sua'))
                                            <span
                                                class="text-danger">{{ $errors->first('kinh_phi_thuc_hien_chinh_sua') }}</span>
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
        <div class="d-flex justify-content-end">
            <div class="col-lg-1 ">
                <a class="btn btn-danger">Hủy</a>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
                    $("#nghe_id").html(htmldata);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        const listField = [
            'tong_so_XD_chuong_trinh_moi',
            'XD_chuong_trinh_moi_CD',
            'XD_chuong_trinh_moi_TC',
            'XD_chuong_trinh_moi_SC',

            'tong_so_XD_giao_trinh_moi',
            'XD_giao_trinh_moi_CD',
            'XD_giao_trinh_moi_TC',
            'XD_giao_trinh_moi_SC',

            'kinh_phi_thuc_hien_xd_moi',

            'tong_so_chuong_trinh_chinh_sua',
            'sua_chuong_trinh_CD',
            'sua_chuong_trinh_TC',
            'sua_chuong_trinh_SC',

            'tong_so_giao_trinh_chinh_sua',
            'sua_giao_trinh_CD',
            'sua_giao_trinh_TC',
            'sua_giao_trinh_SC',

            'kinh_phi_thuc_hien_chinh_sua'
        ];
        const rule = {
            number: true,
            digits: true,
            min:0
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
            number: "Vui lòng nhập liệu hợp lệ",
            digits: "Số liệu nhỏ nhất là 0",
            min: "Số liệu nhỏ nhất là 0"
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
@if (session('edit'))
<script>
    Swal.fire({
        title: 'Dữ liệu đã tồn tại',
        text: "Bạn có thể chuyển tới Chỉnh sửa!",
        icon: 'warning',
        showCancelButton: true,
        showconfirmButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<a class="text-white" href="{{ route('xuatbc.sua-dang-ky-chi-tieu-tuyen-sinh',['id'=>session('edit')]) }}">Edit</a>'
        })
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Thêm thành công !',
        showConfirmButton: false,
        timer: 3500
    })

</script>
@endif
@endsection


