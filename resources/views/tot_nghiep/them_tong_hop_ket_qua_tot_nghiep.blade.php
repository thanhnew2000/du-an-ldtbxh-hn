@extends('layouts.admin')
@section('title', "Tổng hợp kết quả tốt nghiệp")
@section('style')
<link href="{!! asset('tuyensinh/css/showtuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="m-content">

    <div class="col-md-12 mb-4">
        <div class="titile-head">
            <h2>Thêm mới kết quả tốt nghiệp</h2>
        </div>
    </div>
    <div class="content p-5" style="background-color: #ffffff ; ">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <label for="tenCoSo" class="col-3" style="font-size: 1rem">Tên cơ sở</label>
                <input type="text" name="" id="test" class="form-control col-6 ">
            </div>

            <div class="col-6 d-flex align-items-center">

                <label for="tenCoSo" class="col-6" style="font-size: 1rem">Số sinh viên nhập học đầu khóa</label>
                <input type="number" name="" id="test" class="form-control col-6 ">
            </div>

            <div class="col-6 d-flex align-items-center mt-3">
                <label for="tenCoSo" class="col-3" style="font-size: 1rem">Mã ngành nghề</label>
                <input type="text" name="" id="test" class="form-control col-6 ">
            </div>

            <div class="col-6 d-flex align-items-center">

                <label for="tenCoSo" class="col-6" style="font-size: 1rem">Số sinh viên đủ điều kiện thi TN</label>
                <input type="number" name="" id="test" class="form-control col-6 ">
            </div>

            <div class="col-6 d-flex align-items-center mt-3">
                <label for="tenCoSo" class="col-3" style="font-size: 1rem">Loại hình cơ sở</label>
                <select class="form-control col-6" >
                    <option value="">Chọn loại hình cơ sở</option>
                    <option value="">100</option>
                </select>
            </div>

            <div class="col-6 d-flex align-items-center mt-3">

                <label for="tenCoSo" class="col-6" style="font-size: 1rem">Số sinh viên TN nữ</label>
                <input type="number" name="" id="test" class="form-control col-6 ">
            </div>

            <div class="col-6 d-flex align-items-center mt-3">
                <label for="tenCoSo" class="col-3" style="font-size: 1rem">Năm</label>
                <select class="form-control col-6" >
                    <option value="">2020</option>
                    <option value="">2019</option>
                </select>
            </div>

            <div class="col-6 d-flex align-items-center mt-3">

                <label for="tenCoSo" class="col-6" style="font-size: 1rem">Số sinh viên TN dân tộc thiểu số </label>
                <input type="number" name="" id="test" class="form-control col-6 ">
            </div>

            <div class="col-6 d-flex align-items-center mt-3">
                <label for="tenCoSo" class="col-3" style="font-size: 1rem">Đợt</label>
                <select class="form-control col-6" >
                    <option value="">Đợt I</option>
                    <option value="">Đợt II</option>
                </select>
            </div>

            <div class="col-6 d-flex align-items-center mt-3">

                <label for="tenCoSo" class="col-6" style="font-size: 1rem">Số sinh viên TN hộ khẩu Hà Nội</label>
                <input type="number" name="" id="test" class="form-control col-6 ">
            </div>

        </div>
        <div class="d-flex justify-content-center mt-5">

            <button type="reset" class="col-1 btn btn-danger mr-5">Hủy</button>

            <button type="submit" class="col-1 btn btn-primary ">Thêm mới</button>

        </div>
    </div>

</div>

@endsection