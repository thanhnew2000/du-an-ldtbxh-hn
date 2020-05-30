@extends('layouts.admin');

@section('style')
<link href="{!! asset('vendors/_customize/csdt.list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="m-content">
    <div class="remote-title mb-4 container">
        Thêm mới cơ sở đào tạo
    </div>

    <section class="add-csdt-area container p-5">
        <form action="">
            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Tên cơ sở đào tạo <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Quyết định <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Mã đơn vị <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Cơ quan chủ quản <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="" id="">
                        <option disabled selected>Chọn cơ quan chủ quản</option>
                        <option>FPT</option>
                        <option>Viettel</option>
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Website</label>
                    <input type="text" class="form-control col-8" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Loại hình cơ sở <span class="text-danger">(*)</span></label>
                    <select class="form-control col-8" name="" id="">
                        <option selected disabled>Chọn loại hình cơ sở</option>
                        <option>Công lập</option>
                        <option>Tư thục</option>
                        <option value="">Có vốn đầu tư nước ngoài</option>
                    </select>
                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Địa chỉ <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control col-8" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="form-group d-flex justify-content-between align-items-center col-5">
                    <label for="" class="form-name">Logo <span class="text-danger">(*)</span></label>
                    <div class="custom-file col-8">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>

                <div class="form-group d-flex justify-content-between align-items-center col-5">
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
                </div>
            </div>
        </form>

        <div class="btn-action d-flex justify-content-center mt-5">
            <a class="btn btn-primary mr-5 col-1" href="#" role="button">Thêm</a>
            <button type="reset" class="btn btn-danger col-1">Hủy</button>
        </div>
    </section>
</div>
@endsection